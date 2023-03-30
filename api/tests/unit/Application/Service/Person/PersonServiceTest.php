<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Service\Person;

use Application\Query\Person\GetPersonQuery;
use Application\Service\FakeData\GenerateFakeDataServiceInterface;
use Application\Service\Person\PersonService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class PersonServiceTest extends TestCase
{
    private PersonService $personService;

    private GetPersonQuery $personQuery;

    private GenerateFakeDataServiceInterface|MockObject $generateFakeData;

    protected function setUp(): void
    {
        $this->generateFakeData = $this->createStub(GenerateFakeDataServiceInterface::class);
        $this->generateFakeData->method('getFirstname')->willReturn('Firstname');
        $this->generateFakeData->method('getLastname')->willReturn('Lastname');
        $this->generateFakeData->method('getEmail')->willReturn('Email');

        $this->personQuery = $this->createStub(GetPersonQuery::class);

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
        $this->assertSame('Firstname', $this->personService->handle($this->personQuery)->getFirstname());
    }

    public function testMethodHandleThatReturnPersonAggregateThatReturnLastname(): void
    {
        $this->assertSame('Lastname', $this->personService->handle($this->personQuery)->getLastname());
    }

    public function testMethodHandleThatReturnPersonAggregateThatReturnEmail(): void
    {
        $this->personQuery->method('hasEmail')->willReturn(true);

        $this->assertSame('Email', $this->personService->handle($this->personQuery)->getEmail());
    }

    public function testMethodHandleThatReturnPersonAggregateThatEmailNotExist(): void
    {
        $this->personQuery->method('hasEmail')->willReturn(false);

        $this->assertNull($this->personService->handle($this->personQuery)->getEmail());
    }
}
