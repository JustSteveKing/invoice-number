<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber\ValueObjects;

use DateTimeInterface;
use Hashids\HashidsInterface;
use Stringable;

final readonly class InvoiceNumber implements Stringable
{
    public function __construct(
        private StringValue $value,
        private DateTimeInterface $date,
        private int $identifier,
        private HashidsInterface $hash,
    ) {
    }

    /**
     * Generate an Invoice Number in the following format:
     * #{2 CHARACTERS}-{Full numeric representation of the year}-{ISO-8610 Week Number}-{HashID of Identifier}
     *
     * @return string
     */
    public function __toString(): string
    {
        return '#' . $this->value->initials()
            . '-' . $this->date->format('Y')
            . '-' . $this->date->format('W')
            . '-' . $this->hash->encode([(string) $this->identifier]);
    }
}
