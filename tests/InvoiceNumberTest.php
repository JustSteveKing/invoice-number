<?php

declare(strict_types=1);

use Hashids\Hashids;
use JustSteveKing\InvoiceNumber\ValueObjects\InvoiceNumber;
use JustSteveKing\InvoiceNumber\ValueObjects\StringValue;

it('can turn the data into an invoice number', function (string $value): void {
    $invoiceNumber = new InvoiceNumber(
        value: $word = new StringValue(
            value: $value,
        ),
        date: $date = new DateTimeImmutable(),
        identifier: 1,
        hash: new Hashids(
            minHashLength: 5,
        ),
    );

    expect(
        $invoiceNumber
    )->toBeInstanceOf(InvoiceNumber::class)->and(
        (string) $invoiceNumber,
    )->toBeString()->toContain('#')->toContain($word->initials())->toContain($date->format('Y'))->toContain($date->format('W'));
})->with('values');

it('matches a regex value', function (string $value): void {
    $invoiceNumber = new InvoiceNumber(
        value: new StringValue(
            value: $value,
        ),
        date: new DateTimeImmutable(),
        identifier: 1,
        hash: new Hashids(
            minHashLength: 5,
        ),
    );

    expect(
        (bool) preg_match(
            pattern: '/^#[A-Z]{2}-[0-9]{4}-[0-9]{2}-[A-Za-z0-9]{5,}$/',
            subject: (string) $invoiceNumber,
        ),
    )->toBeTrue();
})->with('values');
