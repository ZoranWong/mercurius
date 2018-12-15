<?php

namespace App\Providers;

use App\Utils\SnowFlake;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Carbon::setLocale(config('app.timezone'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
        $this->app->singleton('snowFlake', function () {
            return new SnowFlake(
                config('database.business_id'),
                config('database.data_center_id'),
                config('database.machine_id')
            );
        });
    }
}
