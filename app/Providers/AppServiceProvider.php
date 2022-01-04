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
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Posts\PostsRepositoryInterface::class,
            \App\Repositories\Posts\PostsRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Banner\BannerRepositoryInterface::class,
            \App\Repositories\Banner\BannerRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contact\ContactRepositoryInterface::class,
            \App\Repositories\Contact\ContactRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
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
