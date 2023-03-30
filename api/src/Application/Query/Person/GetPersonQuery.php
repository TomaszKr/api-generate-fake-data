<?php

namespace Application\Query\Person;

final class GetPersonQuery
{
    public function __construct(
        private readonly bool $hasEmail
    ) {
    }

    public function hasEmail(): bool
    {
        return $this->hasEmail;
    }
}
