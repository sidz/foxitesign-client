<?php

declare(strict_types=1);

namespace FoxitESign;

use FoxitESign\Contracts\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use kamermans\OAuth2\Signer\ClientCredentials\PostFormData;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Webmozart\Assert\Assert;

final class ClientBuilder
{
    private string $baseUri;
    private string $clientId;
    private string $clientSecret;
    private DenormalizerInterface $denormalizer;
    private LoggerInterface $logger;

    public function __construct(
        string $baseUri,
        string $clientId,
        string $clientSecret,
        DenormalizerInterface $denormalizer,
        LoggerInterface $logger
    ) {
        Assert::allNotEmpty([$baseUri, $clientId, $clientSecret]);

        $this->baseUri = $baseUri;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->denormalizer = $denormalizer;
        $this->logger = $logger;
    }

    public function build(): Client
    {
        $stack = HandlerStack::create();
        $stack->push($this->buildOAuthMiddleware());

        $http = new GuzzleClient([
            'base_uri' => $this->baseUri,
            'auth' => 'oauth',
            'handler' => $stack,
        ]);

        return new HttpClient($http, $this->denormalizer, $this->logger);
    }

    private function buildOAuthMiddleware(): OAuth2Middleware
    {
        $authClient = new GuzzleClient([
            'base_uri' => $this->baseUri . '/api/oauth2/access_token',
        ]);

        $config = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => 'read-write',
        ];

        return new OAuth2Middleware(
            new ClientCredentials($authClient, $config),
            null,
            new PostFormData()
        );
    }
}
