<?php

declare(strict_types=1);

namespace FoxitESign\Response;

use FoxitESign\Contracts\Response;

/**
 * @psalm-immutable
 */
final class DownloadDocumentResponse implements Response
{
    public string $base64FileString;
}
