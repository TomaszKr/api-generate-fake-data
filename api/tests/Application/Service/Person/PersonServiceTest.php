<?php

declare(strict_types=1);

namespace Tests\Application\Service\Person;

use Application\Service\FakeData\GenerateFakeDataServiceInterface;
use Application\Service\Person\PersonService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class PersonServiceTest extends TestCase
{
    private PersonService $personService;

    private GenerateFakeDataServiceInterface|MockObject $generateFakeData;

    protected function setUp(): void
    {
        $this->generateFakeData = $this->createStub(GenerateFakeDataServiceInterface::class);
        $this->generateFakeData->method('getFirstname')->willReturn('Firstname');
        $this->generateFakeData->method('getLastname')->willReturn('Lastname');

        $this->personService = new PersonService($this->generateFakeData);
    }

    protected function tearDown(): void
    {
        unset(
            $this->personService,
            $this->generateFakeData
        );
    }

    public function testMethodHandleThatReturnPersonAggregateThatReturnFirstname(): void
    {
        $this->assertSame('Firstname', $this->personService->handle()->getFirstname());
    }

    public function testMethodHandleThatReturnPersonAggregateThatReturnLastname(): void
    {
        $this->assertSame('Lastname', $this->personService->handle()->getLastname());
    }
}
