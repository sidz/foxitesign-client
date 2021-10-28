<?php

declare(strict_types=1);

namespace FoxitESign\Model\Webhook;

use FoxitESign\Model\Folder;

class EventData
{
    private Folder $folder;

    public function __construct(Folder $folder)
    {
        $this->folder = $folder;
    }

    public function getFolder(): Folder
    {
        return $this->folder;
    }
}
