<?php

declare(strict_types=1);

namespace Application\Factory\Extractor;

use Application\Extractor\PersonExtractor;

final class PersonExtractorFactory
{
    public function __invoke(): PersonExtractor
    {
        return new PersonExtractor();
    }
}
