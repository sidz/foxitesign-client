<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Response\SignatureReminderResponse;

final class SignatureReminder extends PostRequest
{
    use ParamRequest;

    private int $folderId;

    public function __construct(int $folderId)
    {
        $this->folderId = $folderId;
    }

    public function uri(): string
    {
        return '/api/folders/signaturereminder';
    }

    public function responseClass(): string
    {
        return SignatureReminderResponse::class;
    }
}
