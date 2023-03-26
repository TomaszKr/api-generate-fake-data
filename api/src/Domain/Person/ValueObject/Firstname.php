<?php

declare(strict_types=1);

namespace Domain\Person\ValueObject;

final class Firstname {
    
    public function __construct(
        private readonly string $value
    ) {
        
    }
    
    public function getValue(): string
    {
        return $this->value;
    }
}
