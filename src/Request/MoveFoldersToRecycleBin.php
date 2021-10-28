<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Response\MoveFoldersToRecycleBinResponse;

final class MoveFoldersToRecycleBin extends PostRequest
{
    use ParamRequest;

    /**
     * @var list<int>
     */
    private array $folderIds;

    public function __construct(int ...$folderIds)
    {
        $this->folderIds = $folderIds;
    }

    public function uri(): string
    {
        return '/api/folders/movetorecyclebin';
    }

    public function responseClass(): string
    {
        return MoveFoldersToRecycleBinResponse::class;
    }
}
