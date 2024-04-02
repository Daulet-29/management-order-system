<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CartRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CartRepositoryInterface::class,
            \App\Domain\Repositories\CartRepository::class,
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
