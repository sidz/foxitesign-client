<?php

declare(strict_types=1);

namespace FoxitESign\Contracts;

interface Request
{
    public function method(): string;

    public function uri(): string;

    /**
     * @return array<string, mixed>
     */
    public function params(): array;

    public function responseClass(): string;
}
