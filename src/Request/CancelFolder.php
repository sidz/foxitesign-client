<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Response\CancelFolderResponse;

final class CancelFolder extends PostRequest
{
    use ParamRequest;

    private int $folderId;

    private string $reason_for_cancellation;

    public function __construct(int $folderId, string $reason_for_cancellation)
    {
        $this->folderId = $folderId;
        $this->reason_for_cancellation = $reason_for_cancellation;
    }

    public function uri(): string
    {
        return '/api/folders/cancelFolder';
    }

    public function responseClass(): string
    {
        return CancelFolderResponse::class;
    }
}
