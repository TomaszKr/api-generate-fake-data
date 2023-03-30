<?php

declare(strict_types=1);

namespace Application\Service\FakeData;

interface GenerateEmailFakeDataServiceInterface
{
    public function getEmail(): string;
}
