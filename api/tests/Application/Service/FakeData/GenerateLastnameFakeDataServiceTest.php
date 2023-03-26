<?php

declare(strict_types=1);

namespace Tests\Application\Service\FakeData;

use Application\Service\FakeData\GenerateLastnameFakeDataServiceInterface;
use PHPUnit\Framework\TestCase;

final class GenerateLastnameFakeDataServiceTest extends TestCase {
    private GenerateLastnameFakeDataServiceInterface $generateFakeDataService;
    
    protected function setUp(): void {
        $this->generateFakeDataService = $this->getMockBuilder(GenerateLastnameFakeDataServiceInterface::class)
                ->disableOriginalConstructor()
                ->getMockForAbstractClass();
        
        $this->generateFakeDataService->method('getLastname')->willReturn('Lastname');
    }

    protected function tearDown(): void {
        unset(
            $this->generateFakeDataService
        );
    }
     
    public function testMethodGetLastnameThatReturnLastname(): void
    {
        $this->assertSame('Lastname', $this->generateFakeDataService->getLastname());
    }
}
