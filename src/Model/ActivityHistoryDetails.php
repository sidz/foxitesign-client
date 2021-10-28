<?php

declare(strict_types=1);

namespace FoxitESign\Model;

class ActivityHistoryDetails
{
    /**
     * @var array<array-key, ActivityHistory>
     */
    private array $activities;

    public function __construct(ActivityHistory ...$activities)
    {
        $this->activities = $activities;
    }

    /**
     * @return array<array-key, ActivityHistory>
     */
    public function getActivities(): array
    {
        return $this->activities;
    }
}
