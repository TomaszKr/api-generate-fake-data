<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Service\FakeData;

use Application\Service\FakeData\GenerateEmailFakeDataServiceInterface;
use PHPUnit\Framework\TestCase;

final class GenerateEmailFakeDataServiceTest extends TestCase
{
    private GenerateEmailFakeDataServiceInterface $generateFakeDataService;

    protected function setUp(): void
    {
        $this->generateFakeDataService = $this->getMockBuilder(GenerateEmailFakeDataServiceInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->generateFakeDataService->method('getEmail')->willReturn('example@mail.com');
    }

    protected function tearDown(): void
    {
        unset(
            $this->generateFakeDataService
        );
    }

    public function testMethodGetLastnameThatReturnLastname(): void
    {
        $this->assertSame('example@mail.com', $this->generateFakeDataService->getEmail());
    }
}
