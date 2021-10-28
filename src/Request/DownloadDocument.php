<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Response\DownloadDocumentResponse;
use Webmozart\Assert\Assert;

final class DownloadDocument extends GetRequest
{
    use ParamRequest;

    private string $responseFormat = 'base64';

    private int $folderId;
    private int $docNumber;

    public function __construct(int $folderId, int $docNumber)
    {
        Assert::greaterThan($folderId, 0);
        Assert::greaterThan($docNumber, 0);

        $this->docNumber = $docNumber;
        $this->folderId = $folderId;
    }

    public function uri(): string
    {
        return '/api/folders/document/download';
    }

    public function responseClass(): string
    {
        return DownloadDocumentResponse::class;
    }
}
