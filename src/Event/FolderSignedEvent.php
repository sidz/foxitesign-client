<?php

declare(strict_types=1);

namespace FoxitESign\Event;

use FoxitESign\Model\Webhook\SignedEventData;

final class FolderSignedEvent extends WebhookEvent
{
    public const NAME = 'folder_signed';

    private SignedEventData $data;

    public function __construct(SignedEventData $data)
    {
        $this->data = $data;
    }

    public function getData(): SignedEventData
    {
        return $this->data;
    }
}
