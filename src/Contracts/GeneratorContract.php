<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber\Contracts;

use DateTimeInterface;
use JustSteveKing\InvoiceNumber\ValueObjects\InvoiceNumber;

interface GeneratorContract
{
    public function generate(
        string $value,
        DateTimeInterface $date,
        int $identifier,
    ): InvoiceNumber;
}
