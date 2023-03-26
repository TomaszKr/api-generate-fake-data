<?php

declare(strict_types=1);

namespace Domain\Person\Aggregate;

use Domain\Person\ValueObject\Firstname;
use Domain\Person\ValueObject\Lastname;

final class PersonAggregate {
    public function __construct(
      private readonly Firstname $firstname,
      private readonly Lastname $lastname
) {
    }
    
    public function getFirstname(): string
    {
        return $this->firstname->getValue();
    }
    
    public function getLastname():string
    {
        return $this->lastname->getValue();
    }
}
