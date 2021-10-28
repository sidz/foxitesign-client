<?php

declare(strict_types=1);

namespace FoxitESign;

use FoxitESign\Contracts\Client;
use FoxitESign\Contracts\Request;
use FoxitESign\Contracts\Response;
use FoxitESign\Exception\BadResponseException;
use function array_key_exists;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException as HttpBadResponseException;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Utils;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class HttpClient implements Client
{
    private ClientInterface $http;
    private DenormalizerInterface $denormalizer;
    private LoggerInterface $logger;

    public function __construct(
        ClientInterface $http,
        DenormalizerInterface $denormalizer,
        LoggerInterface $logger
    ) {
        $this->http = $http;
        $this->denormalizer = $denormalizer;
        $this->logger = $logger;
    }

    public function send(Request $request): Response
    {
        try {
            $httpRequest = new HttpRequest($request->method(), $request->uri());

            $httpResponse = $this->http->send($httpRequest, $this->buildOptions($request));

            /** @var array<string, mixed> $decodedResponse */
            $decodedResponse = Utils::jsonDecode($httpResponse->getBody()->getContents(), true);

            // FoxitESign returns 200 OK in case of bad request.
            // @see https://developers.esigngenie.com/#error_handling
            if (array_key_exists('result', $decodedResponse) && $decodedResponse['result'] === 'error') {
                $message = (string) ($decodedResponse['error_description'] ?? 'Something went wrong');

                throw new HttpBadResponseException($message, $httpRequest, $httpResponse);
            }

            /** @var Response $response */
            $response = $this->denormalizer->denormalize($decodedResponse, $request->responseClass(), JsonEncoder::FORMAT);

            return $response;
        } catch (HttpBadResponseException $e) {
            $this->logger->debug('FoxitESign API responded with an HTTP error code {error_code}', [
                'exception' => $e,
                'error_code' => (string) $e->getCode(),
            ]);

            throw new BadResponseException($e->getMessage(), (int) $e->getCode(), $e);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function buildOptions(Request $request): array
    {
        $options = [];

        if ($request->method() === 'GET') {
            $options[RequestOptions::QUERY] = $request->params();
        }

        if ($request->method() === 'POST') {
            $options[RequestOptions::JSON] = $request->params();
            $options[RequestOptions::HEADERS] = [
                'Content-Type' => 'application/json',
            ];
        }

        return $options;
    }
}
