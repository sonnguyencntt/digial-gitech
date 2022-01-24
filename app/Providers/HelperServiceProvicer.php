<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\QueryHelper;

class HelperServiceProvicer extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("App\Helpers\QueryHelper", function ($app) {
            return new QueryHelper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('', function () {
        //     //
        // });
    }
}
