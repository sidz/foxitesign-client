<?php

declare(strict_types=1);

namespace FoxitESign\Response;

use FoxitESign\Contracts\Response;
use FoxitESign\Model\Folder;

/**
 * @psalm-immutable
 */
final class CreateFolderResponse implements Response
{
    public Folder $folder;

    public ?string $embeddedToken = null;

    public ?string $embeddedSessionURL = null;
}
