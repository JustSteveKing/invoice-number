<?php

declare(strict_types=1);

use JustSteveKing\InvoiceNumber\ValueObjects\StringValue;

it('returns a string', function (string $value): void {
    $object = new StringValue(
        value: $value,
    );

    expect(
        $object->initials(),
    )->toBeString();
})->with('values');

it('returns two characters', function (string $value): void {
    $object = new StringValue(
        value: $value,
    );

    $string = $object->initials();

    expect(
        mb_strlen($string),
    )->toBeInt()->toEqual(2);
})->with('values');

it('throws an exception if the string is not long enough', function (): void {
    $object = new StringValue(
        value: 'A',
    );

    $string = $object->initials();
})->throws(InvalidArgumentException::class);
