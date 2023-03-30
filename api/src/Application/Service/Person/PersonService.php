<?php

declare(strict_types=1);

namespace Application\Service\Person;

use Application\Query\Person\GetPersonQuery;
use Application\Service\FakeData\GenerateFakeDataServiceInterface;
use Domain\Person\Aggregate\PersonAggregate;
use Domain\Person\ValueObject\Email;
use Domain\Person\ValueObject\Firstname;
use Domain\Person\ValueObject\Lastname;

final class PersonService
{
    public function __construct(
        private readonly GenerateFakeDataServiceInterface $generateFakeData
    ) {
    }

    public function handle(
        GetPersonQuery $personQuery
    ): PersonAggregate {
        return new PersonAggregate(
            new Firstname($this->generateFakeData->getFirstname()),
            new Lastname($this->generateFakeData->getLastname()),
            $personQuery->hasEmail() ? new Email($this->generateFakeData->getEmail()) : null
        );
    }
}
