<?php

declare(strict_types=1);

namespace FoxitESign\Request;

use FoxitESign\Model\File;
use FoxitESign\Request\Type\Party;
use FoxitESign\Response\CreateFolderResponse;

final class CreateFolder extends PostRequest
{
    use ParamRequest;

    private string $inputType = 'base64';

    private string $folderName;

    /**
     * An array of the file names whose encoded content are given in the `base64FileString` parameter.
     *
     * @var list<string>
     */
    private array $fileNames = [];

    /**
     * An array of BASE64 to PDF documents you are sending.
     *
     * @var list<string>
     */
    private array $base64FileString = [];

    /**
     * If `true` then an embedded token will be generated in the response,
     * for an embedded sending session, where you can directly open the eSign Genie document preparing view
     * in your application for dragging and dropping various fields on your document.
     */
    private bool $createEmbeddedSendingSession = false;

    /**
     * If `true` then in the embedded sending view you won't be able to change the parties for the folder
     * which are already added as a part of this API request.
     */
    private bool $fixRecipientParties = false;

    /**
     * If `true` then in the embedded sending view you won't be able to change the documents for the folder
     * which are already added as a part of this API request.
     */
    private bool $fixDocuments = false;

    private ?string $sendSuccessUrl = null;

    private ?string $sendErrorUrl = null;

    private bool $hideSendButton = false;

    private bool $createEmbeddedSigningSession = false;

    private bool $createEmbeddedSigningSessionForAllParties = false;

    /**
     * @var list<string>
     */
    private array $embeddedSignersEmailIds = [];

    private ?string $signSuccessUrl = null;

    private ?string $signDeclineUrl = null;

    private ?string $signLaterUrl = null;

    private ?string $signErrorUrl = null;

    private bool $hideNextRequiredFieldBtn = false;

    /**
     * @var list<Party>
     */
    private array $parties = [];

    /**
     * Use this field to determine whether eSign Genie should parse your documents for Text Tags to convert them into eSign Genie fields.
     */
    private bool $processTextTags = false;

    /**
     * Use this field to determine whether eSign Genie should parse your documents for AcroFields to convert them into eSign Genie fields.
     */
    private bool $processAcroFields = false;

    /**
     * If `false`, then all the recipients receive invitation email simultaneously.
     * When `true`, then each recipient receives invitation email successively after previous recipient completes the required task,
     * like signing the documents or filling fields, etc.
     */
    private bool $signInSequence = false;

    /**
     * Use this field to initiate the in-person signing process which can be easily completed on any device in a matter of minutes and avoids email based signatures where required.
     * If `false`, then all the recipients receive the invitation email simultaneously. When `true`, then in-person administrator receives an invitation email to initiate the signing process for the signer.
     */
    private bool $inPersonEnable = false;

    /**
     * If `true`, It will generate the embedded sending and signing URL's together.
     */
    private bool $requiredBothEmbeddedSession = false;

    private ?string $folderPassword = null;

    private bool $sendNow = false;

    private bool $signSuccessUrlAllParties = false;

    private ?int $emailTemplateId = null;

    private ?int $signerInstructionId = null;

    private ?int $confirmationInstructionId = null;

    private bool $allowAdvancedEmailValidation = false;

    private bool $sessionExpire = false;

    private ?int $expiry = null;

    private ?string $senderEmail = null;

    private ?string $themeColor = null;

    private bool $hideDeclineToSign = false;

    private bool $hideMoreAction = false;

    private bool $hideAddPartiesOption = false;

    private bool $hideSignerSelectOption = false;

    private bool $hideSignerActions = false;

    /**
     * If `true`, it will hide the sender name on Recipient Parties in an embedded sending session.
     */
    private bool $hideSenderName = false;

    private bool $hideFolderName = false;

    private bool $hideDocumentsName = false;

    private bool $hideAddMeButton = false;

    private bool $hideAddNewButton = false;

    /**
     * If `true`, it will hide the "Add Group" button on Recipient Parties in an embedded sending session.
     */
    private bool $hideAddGroupButton = false;

    public function __construct(string $folderName)
    {
        $this->folderName = $folderName;
    }

    public function addFile(File $file): void
    {
        $this->fileNames[] = $file->name();
        $this->base64FileString[] = $file->base64Content();
    }

    public function addParty(Party $party): void
    {
        $this->parties[] = $party;
    }

    /**
     * @return list<Party>
     */
    public function getParties(): array
    {
        return $this->parties;
    }

    public function enableCreateEmbeddedSendingSession(): void
    {
        $this->createEmbeddedSendingSession = true;
    }

    public function enableFixRecipientParties(): void
    {
        $this->fixRecipientParties = true;
    }

    public function enableFixDocuments(): void
    {
        $this->fixDocuments = true;
    }

    public function setSendSuccessUrl(string $sendSuccessUrl): void
    {
        $this->sendSuccessUrl = $sendSuccessUrl;
    }

    public function setSendErrorUrl(string $sendErrorUrl): void
    {
        $this->sendErrorUrl = $sendErrorUrl;
    }

    public function hideSendButton(): void
    {
        $this->hideSendButton = true;
    }

    public function enableCreateEmbeddedSigningSession(): void
    {
        $this->createEmbeddedSigningSession = true;
    }

    public function enableCreateEmbeddedSigningSessionForAllParties(): void
    {
        $this->createEmbeddedSigningSessionForAllParties = true;
    }

    public function addEmbeddedSignersEmailIds(string $signerEmailId): void
    {
        $this->embeddedSignersEmailIds[] = $signerEmailId;
    }

    public function enableSignInSequence(): void
    {
        $this->signInSequence = true;
    }

    public function enableProcessTextTags(): void
    {
        $this->processTextTags = true;
    }

    public function enableProcessAcroFields(): void
    {
        $this->processAcroFields = true;
    }

    public function enableInPersonEnable(): void
    {
        $this->inPersonEnable = true;
    }

    public function enableRequiredBothEmbeddedSession(): void
    {
        $this->requiredBothEmbeddedSession = true;
    }

    public function setFolderPassword(string $folderPassword): void
    {
        $this->folderPassword = $folderPassword;
    }

    public function hideSenderName(): void
    {
        $this->hideSenderName = true;
    }

    public function hideAddGroupButton(): void
    {
        $this->hideAddGroupButton = true;
    }

    public function uri(): string
    {
        return '/api/folders/createfolder';
    }

    public function responseClass(): string
    {
        return CreateFolderResponse::class;
    }
}
