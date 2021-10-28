<?php

declare(strict_types=1);

namespace FoxitESign\Model\Webhook;

use FoxitESign\Model\Folder;
use FoxitESign\Model\PartyDetail;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class ViewedEventData extends EventData
{
    #[SerializedName('viewing_party')]
    private PartyDetail $viewingParty;

    public function __construct(Folder $folder, PartyDetail $viewingParty)
    {
        parent::__construct($folder);

        $this->viewingParty = $viewingParty;
    }

    public function getViewingParty(): PartyDetail
    {
        return $this->viewingParty;
    }
}
