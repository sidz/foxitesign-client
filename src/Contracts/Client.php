<?php

declare(strict_types=1);

namespace FoxitESign\Contracts;

interface Client
{
    /**
     * Send a HTTP request.
     */
    public function send(Request $request): Response;
}
