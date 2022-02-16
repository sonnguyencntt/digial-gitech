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
            \App\Repositories\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Customer\CustomerRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Internet\InternetRepositoryInterface::class,
            \App\Repositories\Internet\InternetRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Camera\CameraRepositoryInterface::class,
            \App\Repositories\Camera\CameraRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Play\PlayRepositoryInterface::class,
            \App\Repositories\Play\PlayRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Theme\ThemeRepositoryInterface::class,
            \App\Repositories\Theme\ThemeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Store\StoreRepositoryInterface::class,
            \App\Repositories\Store\StoreRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RentShop\RentShopRepositoryInterface::class,
            \App\Repositories\RentShop\RentShopRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191); //Update defaultStringLength
    }
}
