<?php

declare(strict_types=1);

namespace FoxitESign\Model;

use Webmozart\Assert\Assert;

class File
{
    private string $name;
    private string $base64Content;

    public function __construct(string $name, string $base64Content)
    {
        Assert::stringNotEmpty($name);

        $this->name = $name;
        $this->base64Content = $base64Content;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function base64Content(): string
    {
        return $this->base64Content;
    }
}
