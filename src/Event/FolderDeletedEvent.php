<?php

declare(strict_types=1);

namespace FoxitESign\Event;

final class FolderDeletedEvent extends WebhookEvent
{
    public const NAME = 'folder_deleted';
}
