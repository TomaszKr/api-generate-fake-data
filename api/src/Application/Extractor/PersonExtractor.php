<?php

declare(strict_types=1);

namespace Application\Extractor;

use Domain\Person\Aggregate\PersonAggregate;

final class PersonExtractor
{
    public function extract(PersonAggregate $person): array
    {
        $data = [
            'firstname' => $person->getFirstname(),
            'lastname' => $person->getLastname(),
        ];

        if ($person->getEmail()) {
            $data['email'] = $person->getEmail();
        }

        return $data;
    }
}
