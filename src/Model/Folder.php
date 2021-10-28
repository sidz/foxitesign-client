<?php

declare(strict_types=1);

namespace FoxitESign\Model;

/**
 * @psalm-immutable
 */
class Folder
{
    public int $folderId;

    public string $folderName;

    public int $folderAuthorId;

    public string $folderAuthorFirstName;

    public string $folderAuthorLastName;

    public string $folderAuthorEmail;

    public string $folderAuthorRole;
    
    public int $folderCompanyId;

    public int $folderCreationDate;

    public int $folderSentDate;

    public string $folderStatus;

    /**
     * @var array<int>
     */
    public array $folderDocumentIds = [];

    public array $documentsList = [];

    /**
     * @var array<FolderRecipientParty>
     */
    public array $folderRecipientParties = [];

    public string $folderAccessURLForAuthor;

    public int $bulkId;

    public bool $enforceSignWorkflow;

    public int $currentWorkflowStep;

    public string $transactionSource;

    public bool $editable;
}
