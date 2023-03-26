<?php

declare(strict_types=1);

namespace Infrastructure\FakerPHP\Service;

use Faker\Factory;
use Faker\Generator;
use Application\Service\FakeData\GenerateFakeDataInterface;

final class Faker implements GenerateFakeDataInterface 
{
    private readonly Generator $fackerFactory;

    public function __construct() 
    {
        $this->fackerFactory = Factory::create();
    }
    
    public function getFirstname(): string {
        return $this->fackerFactory->firstname();
    }

    public function getLastname(): string {
        return $this->fackerFactory->lastname();
    }

}
