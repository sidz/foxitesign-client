<?php

declare(strict_types=1);

namespace FoxitESign\Event;

final class FolderCompletedEvent extends WebhookEvent
{
    public const NAME = 'folder_completed';
}
