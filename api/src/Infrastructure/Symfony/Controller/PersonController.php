<?php

declare(strict_types=1);

namespace Infrastructure\Symfony\Controller;

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
        $person = $this->personService->handle();

        return new JsonResponse([
            'firstname' => $person->getFirstname(),
            'lastname' => $person->getLastname(),
        ], JsonResponse::HTTP_OK);
    }
}
