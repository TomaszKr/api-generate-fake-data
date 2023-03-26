<?php

declare(strict_types=1);

namespace Tests\Application\Service\FakeData;

use Application\Service\FakeData\GenerateFirstnameFakeDataServiceInterface;
use PHPUnit\Framework\TestCase;

final class GenerateFirstnameFakeDataServiceTest extends TestCase
{
    private GenerateFirstnameFakeDataServiceInterface $generateFakeDataService;

    protected function setUp(): void
    {
        $this->generateFakeDataService = $this->getMockBuilder(GenerateFirstnameFakeDataServiceInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->generateFakeDataService->method('getFirstname')->willReturn('Firstname');
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
}
