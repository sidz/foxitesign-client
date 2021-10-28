<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Response\ActivityHistoryResponse;

final class ViewActivityHistory extends GetRequest
{
    use ParamRequest;

    private int $folderId;

    public function __construct(int $folderId)
    {
        $this->folderId = $folderId;
    }

    public function uri(): string
    {
        return '/api/folders/viewActivityHistory';
    }

    public function responseClass(): string
    {
        return ActivityHistoryResponse::class;
    }
}
