<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ProductRepositoryInterface::class,
            \App\Domain\Repositories\ProductRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
