<?php

declare(strict_types=1);

namespace JustSteveKing\InvoiceNumber\Providers;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use JustSteveKing\InvoiceNumber\Contracts\GeneratorContract;
use JustSteveKing\InvoiceNumber\Generator;

final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes(
            paths: [__DIR__ . '/../../config/invoice-number.php'],
            groups: 'invoice-number',
        );
    }

    public function register(): void
    {
        $this->app->singleton(
            abstract: GeneratorContract::class,
            concrete: fn () => new Generator(
                hash: new Hashids(
                    minHashLength: intval(config('invoice-number.hasher.min-length')),
                )
            )
        );
    }
}
