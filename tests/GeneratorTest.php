<?php

declare(strict_types=1);

use Hashids\Hashids;
use JustSteveKing\InvoiceNumber\Generator;
use JustSteveKing\InvoiceNumber\Contracts\GeneratorContract;
use JustSteveKing\InvoiceNumber\ValueObjects\InvoiceNumber;

it('can be created with a custom hasher', function (int $min): void {
    expect(
        new Generator(
            hash: new Hashids(
                minHashLength: $min,
            ),
        ),
    )->toBeInstanceOf(GeneratorContract::class);
})->with('numbers');

it('generates an invoice number', function (string $value): void {
    $generator = new Generator(
        hash: new Hashids(
            minHashLength: 5,
        ),
    );

    expect(
        $generator->generate(
            value: $value,
            date: new DateTimeImmutable(),
            identifier: 1,
        ),
    )->toBeInstanceOf(InvoiceNumber::class);
})->with('values');
