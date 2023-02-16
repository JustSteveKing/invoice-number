<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber;

use DateTimeInterface;
use Hashids\HashidsInterface;
use JustSteveKing\InvoiceNumber\Contracts\GeneratorContract;
use JustSteveKing\InvoiceNumber\ValueObjects\InvoiceNumber;
use JustSteveKing\InvoiceNumber\ValueObjects\StringValue;

final readonly class Generator implements GeneratorContract
{
    public function __construct(
        private HashidsInterface $hash,
    ) {
    }

    public function generate(
        string $value,
        DateTimeInterface $date,
        int $identifier,
    ): InvoiceNumber {
        return new InvoiceNumber(
            value: new StringValue(
                value: $value,
            ),
            date: $date,
            identifier: $identifier,
            hash: $this->hash,
        );
    }
}
