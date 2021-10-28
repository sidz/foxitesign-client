<?php

declare(strict_types=1);

namespace FoxitESign\Event;

use FoxitESign\Model\Webhook\CancelEventData;

final class FolderCancelledEvent extends WebhookEvent
{
    public const NAME = 'folder_cancelled';

    private CancelEventData $data;

    public function __construct(CancelEventData $data)
    {
        $this->data = $data;
    }

    public function getData(): CancelEventData
    {
        return $this->data;
    }
}
