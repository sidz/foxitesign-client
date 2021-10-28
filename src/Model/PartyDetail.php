<?php

declare(strict_types=1);

namespace FoxitESign\Model;

/**
 * @psalm-immutable
 */
class PartyDetail
{
    public int $partyId;

    public string $firstName;

    public string $lastName;

    public string $emailId;

    public string $address;

    public int $dateCreated;

    public string $signerAuthLevel;
}
