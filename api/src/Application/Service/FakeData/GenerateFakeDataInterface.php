<?php

declare(strict_types=1);

namespace Application\Service\FakeData;

interface GenerateFakeDataInterface 
{
    public function getFirstname(): string;
    public function getLastname(): string;
}
