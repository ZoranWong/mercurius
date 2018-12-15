<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\StoreRepository::class, \App\Repositories\StoreRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StoreUserRepository::class, \App\Repositories\StoreUserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RegionRepository::class, \App\Repositories\RegionRepositoryEloquent::class);
        //:end-bindings:
    }
}
