<?php

declare(strict_types=1);

namespace FoxitESign\Model;

use DateTimeImmutable;

class ActivityHistory
{
    private string $action;

    private DateTimeImmutable $time;

    private string $user;

    private ?string $ipAddress;

    public function __construct(string $action, DateTimeImmutable $time, string $user, ?string $ipAddress)
    {
        $this->action = $action;
        $this->time = $time;
        $this->user = $user;
        $this->ipAddress = $ipAddress;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->time;
    }

    public function getUser(): string
    {
        return $this->user;
    }
}
