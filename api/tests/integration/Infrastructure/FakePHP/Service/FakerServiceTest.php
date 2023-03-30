<?php

declare(strict_types=1);

namespace Tests\Integration\Infrastructure\FakePHP\Service;

use Infrastructure\FakerPHP\Service\FakerService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class FakePHPServiceTest extends KernelTestCase
{
    public function testMethodGetFirstnameExist(): void
    {
        // (1) boot the Symfony kernel
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $container = static::getContainer();

        // (3) run some service & test the result
        $fakePHPService = $container->get(FakerService::class);

        $this->assertTrue(method_exists($fakePHPService, 'getFirstname'));
    }

    public function testMethodGetLastnameExist(): void
    {
        // (1) boot the Symfony kernel
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $container = static::getContainer();

        // (3) run some service & test the result
        $fakePHPService = $container->get(FakerService::class);

        $this->assertTrue(method_exists($fakePHPService, 'getLastname'));
    }

    public function testMethodGetEmailExist(): void
    {
        // (1) boot the Symfony kernel
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $container = static::getContainer();

        // (3) run some service & test the result
        $fakePHPService = $container->get(FakerService::class);

        $this->assertTrue(method_exists($fakePHPService, 'getEmail'));
    }
}
