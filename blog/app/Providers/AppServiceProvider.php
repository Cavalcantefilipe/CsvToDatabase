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
        $this->app->bind(
            'App\Repositories\Order\OrderRepositoryInterface',
            'App\Repositories\Order\OrderRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\Client\ClientRepositoryInterface',
            'App\Repositories\Client\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\Deal\DealRepositoryInterface',
            'App\Repositories\Deal\DealRepositoryEloquent'
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
