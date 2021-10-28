<?php

declare(strict_types=1);

namespace FoxitESign\SignatureVerifier;

final class SignatureVerifier implements SignatureVerifierInterface
{
    private const ENCODE_ALGORITHM = 'sha256';

    private string $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function encode(string $content): string
    {
        return base64_encode(hash_hmac(self::ENCODE_ALGORITHM, $content, $this->secret, true));
    }

    public function isValid(string $content, string $signature): bool
    {
        $hash = hash_hmac(self::ENCODE_ALGORITHM, $content, $this->secret, true);

        return $signature === base64_encode($hash);
    }
}
