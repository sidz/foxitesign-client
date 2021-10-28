<?php

declare(strict_types=1);

namespace FoxitESign\Response;

use FoxitESign\Contracts\Response;
use FoxitESign\Model\ActivityHistoryDetails;

/**
 * @psalm-immutable
 */
final class ActivityHistoryResponse implements Response
{
    private ActivityHistoryDetails $details;

    public function __construct(ActivityHistoryDetails $details)
    {
        $this->details = $details;
    }

    public function getDetails(): ActivityHistoryDetails
    {
        return $this->details;
    }
}
