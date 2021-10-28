<?php

declare(strict_types=1);

namespace FoxitESign\Api;

use FoxitESign\Contracts\Client;
use FoxitESign\Request\CancelFolder;
use FoxitESign\Request\CreateFolder;
use FoxitESign\Request\DeleteFolders;
use FoxitESign\Request\DownloadDocument;
use FoxitESign\Request\SignatureReminder;
use FoxitESign\Request\ViewActivityHistory;
use FoxitESign\Response\ActivityHistoryResponse;
use FoxitESign\Response\CreateFolderResponse;
use FoxitESign\Response\DownloadDocumentResponse;

final class FolderApi
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @see https://developers.esigngenie.com/#createfolderfrompdfs
     */
    public function createFolder(CreateFolder $createFolderRequest): CreateFolderResponse
    {
        /** @var CreateFolderResponse $response */
        $response = $this->client->send($createFolderRequest);

        return $response;
    }

    /**
     * @see https://developers.esigngenie.com/#getFolderHistory
     */
    public function viewActivityHistory(int $folderId): ActivityHistoryResponse
    {
        /** @var ActivityHistoryResponse $response */
        $response = $this->client->send(new ViewActivityHistory($folderId));

        return $response;
    }

    /**
     * @see https://developers.esigngenie.com/#sendsignaturereminder
     */
    public function signatureReminder(int $folderId): void
    {
        $this->client->send(new SignatureReminder($folderId));
    }

    /**
     * @see https://developergit ss.esigngenie.com/#cancelfolder
     */
    public function cancelFolder(int $folderId, string $reasonForCancellation): void
    {
        $this->client->send(new CancelFolder($folderId, $reasonForCancellation));
    }

    /**
     * @see https://developers.esigngenie.com/#downloaddoc
     */
    public function downloadDocument(int $folderId, int $docNumber): DownloadDocumentResponse
    {
        /** @var DownloadDocumentResponse $response */
        $response = $this->client->send(new DownloadDocument($folderId, $docNumber));

        return $response;
    }

    /**
     * @see https://developers.esigngenie.com/#deletefolder
     */
    public function deleteFolders(int ...$folderIds): void
    {
        $this->client->send(new DeleteFolders(...$folderIds));
    }
}
