<?php

declare(strict_types=1);

namespace FoxitESign\Event;

use FoxitESign\Model\Webhook\ViewedEventData;

final class FolderViewedEvent extends WebhookEvent
{
    public const NAME = 'folder_viewed';

    private ViewedEventData $data;

    public function __construct(ViewedEventData $data)
    {
        $this->data = $data;
    }

    public function getData(): ViewedEventData
    {
        return $this->data;
    }
}
