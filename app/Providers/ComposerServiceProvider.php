<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\ViewComposer;
use App\Http\Composers\ThemeComposer;
use App\Http\Composers\User\BadgesComposer as UserBadgesComposer;
use App\Http\Composers\User\StoreComposer ;
use App\Http\Composers\BadgesComposer as CusTomerBadgesComposer;
use App\Http\Composers\User\TitleSideBarComposer as UserTitleSideBarComposer;
use App\Http\Composers\Admin\TitleSideBarComposer as AdminTitleSideBarComposer;



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
        View::composer(['pages.user.*' , "errors.user.404"], UserBadgesComposer::class);
        View::composer(['pages.user.*' , 'errors.user.404'], StoreComposer::class );
        View::composer(['pages.user.*' , 'errors.user.404'], UserTitleSideBarComposer::class);
        View::composer(['pages.admin.*' , 'errors.admin.404'], AdminTitleSideBarComposer::class);

        View::composer(['pages.*' , "errors.404"], CusTomerBadgesComposer::class);



    }
}
