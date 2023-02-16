<?php

declare(strict_types=1);

return [
    'hasher' => [
        'min-length' => env('INVOICE_NUMBER_HASH_MIN_LENGTH', 5),
    ]
];
