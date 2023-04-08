<?php

declare(strict_types=1);

namespace Infrastructure\FakerPHP\Factory;

use Infrastructure\FakerPHP\Service\FakerService;

final class FakerServiceFactory
{
    public function __invoke(): FakerService
    {
        return new FakerService();
    }
}
