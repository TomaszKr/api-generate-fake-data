<?php

declare(strict_types=1);

namespace Infrastructure\Symfony\Controller;

use Application\Query\Person\GetPersonQuery;
use Application\Service\Person\PersonService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class PersonController
{
    public function __construct(
        private readonly PersonService $personService
    ) {
    }

    public function handle(Request $request): JsonResponse
    {
        $person = $this->personService->handle(new GetPersonQuery(
            json_decode($request->query->get('withEmail', 'false'))
        ));

        $data = [
            'firstname' => $person->getFirstname(),
            'lastname' => $person->getLastname(),
        ];

        if ($person->getEmail()) {
            $data['email'] = $person->getEmail();
        }

        return new JsonResponse($data, JsonResponse::HTTP_OK);
    }
}
