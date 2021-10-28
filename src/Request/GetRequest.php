<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Contracts\Request;

abstract class GetRequest implements Request
{
    public function method(): string
    {
        return 'GET';
    }

    abstract public function uri(): string;

    abstract public function responseClass(): string;
}
