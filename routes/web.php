<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//  administrator

Route::group([
    'domain'    => 'administrator.' . config('app.short_url'),
], function () {

    Route::get('/login', 'Auth\LoginController@index')->name('manage.login.index');
    Route::post('/login', 'Auth\LoginController@login')->name('manage.login.store');
    Route::get('/register', 'Auth\RegisterController@index')->name('manage.register.index');
    Route::post('/register', 'Auth\RegisterController@store')->name('manage.register.store');
    Route::get('/register/verify', 'Auth\RegisterController@verifyEmail')->name('manage.register.verify_email');
    Route::post('/register/verify', 'Auth\RegisterController@sendMailVerifyRegister')->name('manage.register.send_verify_email');
    Route::get('/register/active/{user}/{token}', 'Auth\RegisterController@checkTokenVerifyRegister')->name('manage.register.accept');
    Route::post('/forget-password', 'Auth\ForgetPasswordController@postForgetPass')->name('manage.forget_password.store');
    Route::get('/forget-password', 'Auth\ForgetPasswordController@index')->name('manage.forget_password.index');

    Route::get('/reset-password/{user}/{token}', 'Auth\ForgetPasswordController@resetPassword')->name('manage.reset_password.index');
    Route::post('/reset-password/{user}/{token}', 'Auth\ForgetPasswordController@postResetPassword')->name('manage.reset_password.store');

    Route::post('/logout', 'Auth\LoginController@logout')->name('manage.logout');
    Route::group([
        //  'middleware' => ['auth' , "registerVerifyEmail" ]

    ], function () {
        Route::get('/', 'Manage\DashboardController@index')->name('manage.dashboard.index');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'Manage\CategoryController@index')->name('category.index');
            Route::post('/', 'Manage\CategoryController@store')->name('category.store');
            Route::get('/create', 'Manage\CategoryController@create')->name('category.create');
            Route::get('/{Category}/edit', 'Manage\CategoryController@edit')->name('category.edit');
            Route::put('/{Category}', 'Manage\CategoryController@update')->name('category.update');
            Route::delete('/{Category}', 'Manage\CategoryController@destroy')->name('category.destroy');
            Route::get('/{Category}', 'Manage\CategoryController@show')->name('category.show');
        });
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', 'Manage\PostsController@index')->name('manage.posts.index');
            Route::post('/', 'Manage\PostsController@store')->name('manage.posts.store');
            Route::get('/create', 'Manage\PostsController@create')->name('manage.posts.create');
            Route::get('/{posts}/edit', 'Manage\PostsController@edit')->name('manage.posts.edit');
            Route::put('/{posts}', 'Manage\PostsController@update')->name('manage.posts.update');
            Route::delete('/{posts}', 'Manage\PostsController@destroy')->name('manage.posts.destroy');
            Route::get('/{posts}', 'Manage\PostsController@show')->name('manage.posts.show');
        });

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', 'Manage\BannerController@index')->name('manage.banner.index');
            Route::post('/', 'Manage\BannerController@store')->name('manage.banner.store');
            Route::get('/create', 'Manage\BannerController@create')->name('manage.banner.create');
            Route::get('/{banner}/edit', 'Manage\BannerController@edit')->name('manage.banner.edit');
            Route::put('/{banner}', 'Manage\BannerController@update')->name('manage.banner.update');
            Route::delete('/{banner}', 'Manage\BannerController@destroy')->name('manage.banner.destroy');
            Route::get('/{banner}', 'Manage\BannerController@show')->name('manage.banner.show');
        });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'Manage\CustomerController@index')->name('manage.customer.index');
        });
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'Manage\ProfileController@index')->name('manage.profile.index');
            Route::put('/{user}', 'Manage\ProfileController@update')->name('manage.profile.update');
        });
        Route::group(['prefix' => 'theme'], function () {
            Route::get('/', 'Manage\ThemeController@index')->name('manage.theme.index');
            Route::put('/{theme}', 'Manage\ThemeController@update')->name('manage.theme.update');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'Manage\OrderController@index')->name('manage.order.index');
           
        });
        Route::group(['prefix' => 'service'], function () {
            Route::group(['prefix' => 'internet'], function () {
                Route::get('/', 'Manage\ServiceInternetController@index')->name('manage.service_internet.index');
                Route::post('/', 'Manage\ServiceInternetController@store')->name('manage.service_internet.store');
                Route::get('/create', 'Manage\ServiceInternetController@create')->name('manage.service_internet.create');
                Route::get('/{Category}/edit', 'Manage\ServiceInternetController@edit')->name('manage.service_internet.edit');
                Route::put('/{Category}', 'Manage\ServiceInternetController@update')->name('manage.service_internet.update');
                Route::delete('/{Category}', 'Manage\ServiceInternetController@destroy')->name('manage.service_internet.destroy');
                Route::get('/{Category}', 'Manage\ServiceInternetController@show')->name('manage.service_internet.show');
            });
            Route::group(['prefix' => 'camera'], function () {
                Route::get('/', 'Manage\ServiceCameraController@index')->name('manage.service_camera.index');
                Route::post('/', 'Manage\ServiceCameraController@store')->name('manage.service_camera.store');
                Route::get('/create', 'Manage\ServiceCameraController@create')->name('manage.service_camera.create');
                Route::get('/{Category}/edit', 'Manage\ServiceCameraController@edit')->name('manage.service_camera.edit');
                Route::put('/{Category}', 'Manage\ServiceCameraController@update')->name('manage.service_camera.update');
                Route::delete('/{Category}', 'Manage\ServiceCameraController@destroy')->name('manage.service_camera.destroy');
                Route::get('/{Category}', 'Manage\ServiceCameraController@show')->name('manage.service_camera.show');
            });
            Route::group(['prefix' => 'play'], function () {
                Route::get('/', 'Manage\ServicePlayController@index')->name('manage.service_play.index');
                Route::post('/', 'Manage\ServicePlayController@store')->name('manage.service_play.store');
                Route::get('/create', 'Manage\ServicePlayController@create')->name('manage.service_play.create');
                Route::get('/{Category}/edit', 'Manage\ServicePlayController@edit')->name('manage.service_play.edit');
                Route::put('/{Category}', 'Manage\ServicePlayController@update')->name('manage.service_play.update');
                Route::delete('/{Category}', 'Manage\ServicePlayController@destroy')->name('manage.service_play.destroy');
                Route::get('/{Category}', 'Manage\ServicePlayController@show')->name('manage.service_play.show');
            });
        });
    });
});


//super
Route::group([
    'domain'    => 'super.' . config('app.short_url'),
], function () {

    Route::get('/login', 'Super\Auth\LoginController@index')->name('super.login.index');
    Route::post('/login', 'Super\Auth\LoginController@login')->name('super.login.store');
    Route::post('/logout', 'Super\Auth\LoginController@logout')->name('super.logout');
    Route::post('/forget-password', 'Super\Auth\ForgetPasswordController@postForgetPass')->name('super.forget_password.store');
    Route::get('/forget-password', 'Super\Auth\ForgetPasswordController@index')->name('super.forget_password.index');

    Route::get('/reset-password/{admin}/{token}', 'Super\Auth\ForgetPasswordController@resetPassword')->name('super.reset_password.index');
    Route::post('/reset-password/{admin}/{token}', 'Super\Auth\ForgetPasswordController@postResetPassword')->name('super.reset_password.store');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Super\UserController@index')->name('super.user.index');
    });
    Route::group([
        'middleware' => ['auth:admin']
    ], function () {
        Route::get('/', 'Super\DashboardController@index')->name('super.dashboard.index');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'Super\CategoryController@index')->name('super.category.index');
            Route::post('/', 'Super\CategoryController@store')->name('super.category.store');
            Route::get('/create', 'Super\CategoryController@create')->name('super.category.create');
            Route::get('/{Category}/edit', 'Super\CategoryController@edit')->name('super.category.edit');
            Route::put('/{Category}', 'Super\CategoryController@update')->name('super.category.update');
            Route::delete('/{Category}', 'Super\CategoryController@destroy')->name('super.category.destroy');
            Route::get('/{Category}', 'Super\CategoryController@show')->name('super.category.show');
        });
    });
});

//User


Route::domain(config('app.short_url'))->group(function () {

    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['prefix' => 'service'], function () {
        Route::group(['prefix' => 'internet'], function () {
            Route::get('/', 'ServiceInternetController@index')->name('service_internet.index');
            Route::post('/', 'ServiceInternetController@store')->name('service_internet.store');
            Route::get('/create', 'ServiceInternetController@create')->name('service_internet.create');
            Route::get('/{Category}/edit', 'ServiceInternetController@edit')->name('service_internet.edit');
            Route::put('/{Category}', 'ServiceInternetController@update')->name('service_internet.update');
            Route::delete('/{Category}', 'ServiceInternetController@destroy')->name('service_internet.destroy');
            Route::get('/{Category}', 'ServiceInternetController@show')->name('service_internet.show');
        });
        Route::group(['prefix' => 'camera'], function () {
            Route::get('/', 'ServiceCameraController@index')->name('service_camera.index');
            Route::post('/', 'ServiceCameraController@store')->name('service_camera.store');
            Route::get('/create', 'ServiceCameraController@create')->name('service_camera.create');
            Route::get('/{Category}/edit', 'ServiceCameraController@edit')->name('service_camera.edit');
            Route::put('/{Category}', 'ServiceCameraController@update')->name('service_camera.update');
            Route::delete('/{Category}', 'ServiceCameraController@destroy')->name('service_camera.destroy');
            Route::get('/{Category}', 'ServiceCameraController@show')->name('service_camera.show');
        });
        Route::group(['prefix' => 'play'], function () {
            Route::get('/', 'ServicePlayController@index')->name('service_play.index');
            Route::post('/', 'ServicePlayController@store')->name('service_play.store');
            Route::get('/create', 'ServicePlayController@create')->name('service_play.create');
            Route::get('/{Category}/edit', 'ServicePlayController@edit')->name('service_play.edit');
            Route::put('/{Category}', 'ServicePlayController@update')->name('service_play.update');
            Route::delete('/{Category}', 'ServicePlayController@destroy')->name('service_play.destroy');
            Route::get('/{Category}', 'ServicePlayController@show')->name('service_play.show');
        });
    });


    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostsController@index')->name('posts.index');
        Route::post('/', 'PostsController@store')->name('posts.store');
        Route::get('/create', 'PostsController@create')->name('posts.create');
        Route::get('/{Category}/edit', 'PostsController@edit')->name('posts.edit');
        Route::put('/{Category}', 'PostsController@update')->name('posts.update');
        Route::delete('/{Category}', 'PostsController@destroy')->name('posts.destroy');
        Route::get('/{Category}', 'PostsController@show')->name('posts.show');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'ContactController@index')->name('contact.index');
        Route::post('/', 'ContactController@store')->name('contact.store');
        Route::get('/create', 'ContactController@create')->name('contact.create');
        Route::get('/{Category}/edit', 'ContactController@edit')->name('contact.edit');
        Route::put('/{Category}', 'ContactController@update')->name('contact.update');
        Route::delete('/{Category}', 'ContactController@destroy')->name('contact.destroy');
        Route::get('/{Category}', 'ContactController@show')->name('contact.show');
    });
});
