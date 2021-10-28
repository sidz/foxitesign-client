<?php

declare(strict_types=1);

namespace FoxitESign\Model\Webhook;

use FoxitESign\Model\Folder;
use FoxitESign\Model\PartyDetail;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class SignedEventData extends EventData
{
    #[SerializedName('signing_party')]
    private PartyDetail $signingParty;

    public function __construct(Folder $folder, PartyDetail $signingParty)
    {
        parent::__construct($folder);

        $this->signingParty = $signingParty;
    }

    public function getSigningParty(): PartyDetail
    {
        return $this->signingParty;
    }
}
