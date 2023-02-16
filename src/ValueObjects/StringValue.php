<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber\ValueObjects;

use InvalidArgumentException;

final readonly class StringValue
{
    public function __construct(
        private string $value,
    ) {
    }

    public function initials(): string
    {
        if (mb_strlen(trim($this->value)) <= 1) {
            throw new InvalidArgumentException(
                message: "Value must be at least 2 characters or more, passed in [$this->value].",
            );
        }

        $words = explode(' ', trim($this->value));

        if (count($words) >= 2) {
            return mb_strtoupper(
                string: mb_substr(
                    string: $words[0],
                    start: 0,
                    length: 1,
                    encoding: 'UTF-8',
                ) . mb_substr(
                    string: $words[1],
                    start: 0,
                    length: 1,
                    encoding: 'UTF-8',
                ),
                encoding: 'UTF-8',
            );
        }

        preg_match_all(
            pattern: '#([A-Z]+)#',
            subject: $this->value,
            matches: $capitals,
        );

        if (count($capitals[1]) >= 2) {
            return mb_substr(
                string: implode('', $capitals[1]),
                start: 0,
                length: 2,
                encoding: 'UTF-8',
            );
        }

        return mb_strtoupper(
            string: mb_substr(
                string: $this->value,
                start: 0,
                length: 2,
                encoding: 'UTF-8',
            ),
            encoding: 'UTF-8',
        );
    }
}
