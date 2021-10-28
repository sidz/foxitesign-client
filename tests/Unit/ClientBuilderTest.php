<?php

declare(strict_types=1);

namespace FoxitESign\Tests\Unit;

use FoxitESign\ClientBuilder;
use FoxitESign\Contracts\Client;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class ClientBuilderTest extends TestCase
{
    public function test_it_builds(): void
    {
        $builder = new ClientBuilder(
            'www.esigngenie.com/esign',
            'clientId',
            'clientSecret',
            $this->createMock(DenormalizerInterface::class),
            $this->createMock(LoggerInterface::class)
        );

        $client = $builder->build();

        self::assertInstanceOf(Client::class, $client);
    }

    public function test_it_throws_an_exception_when_base_uri_is_an_empty_string(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a non-empty value. Got: ""');

        new ClientBuilder(
            '',
            'clientId',
            'clientSecret',
            $this->createMock(DenormalizerInterface::class),
            $this->createMock(LoggerInterface::class)
        );
    }

    public function test_it_throws_an_exception_when_base_client_id_is_an_empty_string(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a non-empty value. Got: ""');

        new ClientBuilder(
            'www.esigngenie.com/esign',
            '',
            'clientSecret',
            $this->createMock(DenormalizerInterface::class),
            $this->createMock(LoggerInterface::class)
        );
    }

    public function test_it_throws_an_exception_when_base_client_secret_is_an_empty_string(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a non-empty value. Got: ""');

        new ClientBuilder(
            'www.esigngenie.com/esign',
            'clientId',
            '',
            $this->createMock(DenormalizerInterface::class),
            $this->createMock(LoggerInterface::class)
        );
    }
}
