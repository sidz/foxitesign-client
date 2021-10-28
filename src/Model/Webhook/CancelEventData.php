<?php

declare(strict_types=1);

namespace FoxitESign\Model\Webhook;

use FoxitESign\Model\Folder;
use FoxitESign\Model\PartyDetail;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class CancelEventData extends EventData
{
    #[SerializedName('cancelling_party')]
    private PartyDetail $cancellingParty;

    #[SerializedName('reason_for_cancelling')]
    private string $reasonForCancelling;

    public function __construct(Folder $folder, PartyDetail $cancellingParty, string $reasonForCancelling)
    {
        parent::__construct($folder);

        $this->cancellingParty = $cancellingParty;
        $this->reasonForCancelling = $reasonForCancelling;
    }

    public function getCancellingParty(): PartyDetail
    {
        return $this->cancellingParty;
    }

    public function getReasonForCancelling(): string
    {
        return $this->reasonForCancelling;
    }
}
