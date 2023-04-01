<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Extrator;

use Application\Extractor\PersonExtractor;
use Domain\Person\Aggregate\PersonAggregate;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class PersonExtractorTest extends TestCase
{
    private PersonExtractor $personExtractor;

    private PersonAggregate|MockObject $personAggregate;

    protected function setUp(): void
    {
        $this->personAggregate = $this->createStub(PersonAggregate::class);
        $this->personAggregate->method('getFirstname')->willReturn('firstname');
        $this->personAggregate->method('getLastname')->willReturn('lastname');

        $this->personExtractor = new PersonExtractor();
    }

    protected function tearDown(): void
    {
        unset(
            $this->personExtractor,
            $this->personAggregate
        );
    }

    public function testMethodExtractThatReturnArrayHasKeyFirstname()
    {
        $this->assertArrayHasKey('firstname', $this->personExtractor->extract($this->personAggregate));
    }

    public function testMethodExtractThatReturnArrayHasKeyLastname()
    {
        $this->assertArrayHasKey('lastname', $this->personExtractor->extract($this->personAggregate));
    }

    public function testMethodExtractThatReturnArrayNotHasKeyEmail()
    {
        $this->assertArrayNotHasKey('email', $this->personExtractor->extract($this->personAggregate));
    }

    public function testMethodExtractThatReturnArrayHasKeyEmail()
    {
        $this->personAggregate->method('getEmail')->willReturn('email');

        $this->assertArrayHasKey('email', $this->personExtractor->extract($this->personAggregate));
    }
}
