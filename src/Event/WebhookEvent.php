<?php

declare(strict_types=1);

namespace FoxitESign\Event;

use FoxitESign\Model\Webhook\EventData;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(
    'event_name',
    [
        FolderSentEvent::NAME => FolderSentEvent::class,
        FolderViewedEvent::NAME => FolderViewedEvent::class,
        FolderSignedEvent::NAME => FolderSignedEvent::class,
        FolderCancelledEvent::NAME => FolderCancelledEvent::class,
        FolderCompletedEvent::NAME => FolderCompletedEvent::class,
        FolderExecutedEvent::NAME => FolderExecutedEvent::class,
        FolderDeletedEvent::NAME => FolderDeletedEvent::class,
    ]
)]
abstract class WebhookEvent
{
    private EventData $data;

    public function __construct(EventData $data)
    {
        $this->data = $data;
    }

    public function getData(): EventData
    {
        return $this->data;
    }
}
