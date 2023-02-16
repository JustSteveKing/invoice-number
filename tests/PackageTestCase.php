<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber\Tests;

use JustSteveKing\InvoiceNumber\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}
