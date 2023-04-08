<?php

declare(strict_types=1);

namespace Application\Factory\Service\Person;

use Application\Service\FakeData\GenerateFakeDataServiceInterface;
use Application\Service\Person\PersonService;

final class PersonServiceFactory
{
    public function __invoke(
        GenerateFakeDataServiceInterface $generateFakeData
    ): PersonService {
        return new PersonService(
            $generateFakeData
        );
    }
}
