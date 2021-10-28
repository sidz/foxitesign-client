<?php

declare(strict_types=1);

namespace FoxitESign\Request;

trait ParamRequest
{
    /**
     * @return array<string, mixed>
     */
    public function params(): array
    {
        return get_object_vars($this);
    }
}
