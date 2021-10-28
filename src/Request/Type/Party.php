<?php

declare(strict_types=1);

namespace FoxitESign\Request\Type;

use JsonSerializable;
use Webmozart\Assert\Assert;

class Party implements JsonSerializable
{
    private string $firstName;

    private string $lastName;

    private string $emailId;

    private string $permission;

    private int $sequence;

    public function __construct(string $firstName, string $lastName, string $emailId, string $permission, int $sequence)
    {
        $permission = strtoupper($permission);

        Assert::greaterThan($sequence, 0);
        Assert::inArray($permission, ['FILL_FIELDS_AND_SIGN', 'FILL_FIELDS_ONLY', 'SIGN_ONLY', 'VIEW_ONLY', 'PARTY_ASSIGNER']);

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailId = $emailId;
        $this->permission = $permission;
        $this->sequence = $sequence;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
