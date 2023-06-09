<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Service\FakeData;

use Application\Service\FakeData\GenerateFakeDataServiceInterface;
use PHPUnit\Framework\TestCase;

final class GenerateFakeDataServiceTest extends TestCase
{
    private GenerateFakeDataServiceInterface $generateFakeDataService;

    protected function setUp(): void
    {
        $this->generateFakeDataService = $this->getMockBuilder(GenerateFakeDataServiceInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->generateFakeDataService->method('getFirstname')->willReturn('Firstname');
        $this->generateFakeDataService->method('getLastname')->willReturn('Lastname');
        $this->generateFakeDataService->method('getEmail')->willReturn('Email');
    }

    protected function tearDown(): void
    {
        unset(
            $this->generateFakeDataService
        );
    }

    public function testMethodGetFirstnameThatReturnFirstname(): void
    {
        $this->assertSame('Firstname', $this->generateFakeDataService->getFirstname());
    }

    public function testMethodGetLastnameThatReturnLastname(): void
    {
        $this->assertSame('Lastname', $this->generateFakeDataService->getLastname());
    }

    public function testMethodGetLastnameThatReturnEmail(): void
    {
        $this->assertSame('Email', $this->generateFakeDataService->getEmail());
    }
}
