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
        //
        $this->app->singleton('snowFlake', function () {
            return new SnowFlake(
                config('app.business_id'),
                config('app.data_center_id'),
                config('app.machine_id')
            );
        });
    }
}
