<?php

declare(strict_types=1);

namespace Application\Service\Person;

use Application\Service\FakeData\GenerateFakeDataInterface;
use Domain\Person\Aggregate\PersonAggregate;
use Domain\Person\ValueObject\Firstname;
use Domain\Person\ValueObject\Lastname;

final class PersonService {

    public function __construct(
        private readonly GenerateFakeDataInterface $generateFakeData
    ) {}

    public function handle(): PersonAggregate {
        return new PersonAggregate(
                new Firstname($this->generateFakeData->getFirstname()),
                new Lastname($this->generateFakeData->getLastname())
        );
    }

}
