<?php

declare(strict_types=1);

namespace FoxitESign\Model;

/**
 * @psalm-immutable
 */
class FolderRecipientParty
{
    public int $partyId;

    public PartyDetail $partyDetails;

    public string $contractPermissions;

    public int $partySequence;

    public int $workflowSignSequence;

    public int $envelopeId;

    public string $sharingMode;

    public string $folderAccessURL;
}
