<?php

declare(strict_types=1);

namespace FoxitESign\Event;

final class FolderSentEvent extends WebhookEvent
{
    public const NAME = 'folder_sent';
}
