<?php

declare(strict_types=1);

namespace FoxitESign\Event;

final class FolderExecutedEvent extends WebhookEvent
{
    public const NAME = 'folder_executed';
}
