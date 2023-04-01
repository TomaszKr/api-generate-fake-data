<?php

declare(strict_types=1);

namespace Infrastructure\Symfony\Controller;

use Application\Extractor\PersonExtractor;
use Application\Query\Person\GetPersonQuery;
use Application\Service\Person\PersonService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class PersonController
{
    public function __construct(
        private readonly PersonService $personService,
        private readonly PersonExtractor $personExtrator
    ) {
    }

    public function handle(Request $request): JsonResponse
    {
        $person = $this->personService->handle(new GetPersonQuery(
            $this->detectValue($request->query->all('options'), 'email')
        ));

        return new JsonResponse(
            $this->personExtrator->extract($person),
            JsonResponse::HTTP_OK
        );
    }

    private function detectValue(?array $list, $element): bool
    {
        if (null === $list) {
            return false;
        }

        return isset(array_flip($list)[$element]) ?? false;
    }
}
