<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\interfaces\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\TypeRepositoryInterface::class,
            \App\Repositories\TypeEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\ProductRepositoryInterface::class,
            \App\Repositories\ProductEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
