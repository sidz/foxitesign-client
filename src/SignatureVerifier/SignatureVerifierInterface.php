<?php

declare(strict_types=1);

namespace FoxitESign\SignatureVerifier;

interface SignatureVerifierInterface
{
    public function encode(string $content): string;

    public function isValid(string $content, string $signature): bool;
}
