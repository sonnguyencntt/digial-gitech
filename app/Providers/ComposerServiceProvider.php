<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\ViewComposer;
use App\Http\Composers\ThemeComposer;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.*', ViewComposer::class);
        View::composer('components.*', ThemeComposer::class);
        View::composer('pages.*', ThemeComposer::class);
    }
}
