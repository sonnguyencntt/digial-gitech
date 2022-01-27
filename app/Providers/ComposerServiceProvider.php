<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\ViewComposer;
use App\Http\Composers\ThemeComposer;
use App\Http\Composers\User\BadgesComposer as UserBadgesComposer;
use App\Http\Composers\User\StoreComposer ;

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
        View::composer('pages.user.*', UserBadgesComposer::class);
        View::composer('pages.user.*', StoreComposer::class);


    }
}
