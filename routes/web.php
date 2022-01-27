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
    'domain'    =>config('app.short_url'),
], function () {

    Route::get('/login', 'Auth\LoginController@index')->name('user.login.index');
    Route::post('/login', 'Auth\LoginController@login')->name('user.login.store');
    Route::get('/register', 'Auth\RegisterController@index')->name('user.register.index');
    Route::post('/register', 'Auth\RegisterController@store')->name('user.register.store');
    Route::get('/register/verify/{user}', 'Auth\RegisterController@verifyEmail')->name('user.register.verify_email');
    Route::post('/register/verify', 'Auth\RegisterController@sendMailVerifyRegister')->name('user.register.send_verify_email');
    Route::get('/register/active/{user}/{token}', 'Auth\RegisterController@checkTokenVerifyRegister')->name('user.register.accept');
    Route::post('/forget-password', 'Auth\ForgetPasswordController@postForgetPass')->name('user.forget_password.store');
    Route::get('/forget-password', 'Auth\ForgetPasswordController@index')->name('user.forget_password.index');

    Route::get('/reset-password/{user}/{token}', 'Auth\ForgetPasswordController@resetPassword')->name('user.reset_password.index');
    Route::post('/reset-password/{user}/{token}', 'Auth\ForgetPasswordController@postResetPassword')->name('user.reset_password.store');

    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
  

    Route::group([
        'middleware' => ['auth' , "registerVerifyEmail" ],
    ], function () {
 
        Route::get('/', 'User\HomeController@index')->name('user.home.index');
        Route::get('/home', 'User\HomeController@showStores')->name('user.home.show_stores');
        Route::group(['prefix' => 'store'], function () {
            Route::post('/', 'User\StoreController@store')->name('user.store.store');
            Route::get('/create', 'User\StoreController@create')->name('user.store.create');
            Route::get('/{store}/edit', 'User\StoreController@edit')->name('user.store.edit');
            Route::put('/{store}', 'User\StoreController@update')->name('user.store.update');
         
        });
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'User\ProfileController@index')->name('user.profile.index');
            Route::put('/{user}', 'User\ProfileController@update')->name('user.profile.update');
        });
        Route::group([
            'prefix' => '/store/{store_code}',
            'middleware' => ["CheckForExsitStore" , "CheckForStatusStore"]
        
        ], function () {
        Route::get('/dashboard', 'User\DashboardController@index')->name('user.dashboard.index');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'User\CategoryController@index')->name('category.index');
            Route::post('/', 'User\CategoryController@store')->name('category.store');
            Route::get('/create', 'User\CategoryController@create')->name('category.create');
            Route::get('/{Category}/edit', 'User\CategoryController@edit')->name('category.edit');
            Route::put('/{Category}', 'User\CategoryController@update')->name('category.update');
            Route::delete('/{Category}', 'User\CategoryController@destroy')->name('category.destroy');
            Route::get('/{Category}', 'User\CategoryController@show')->name('category.show');
        });
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', 'User\PostsController@index')->name('user.posts.index');
            Route::post('/', 'User\PostsController@store')->name('user.posts.store');
            Route::get('/create', 'User\PostsController@create')->name('user.posts.create');
            Route::get('/{posts}/edit', 'User\PostsController@edit')->name('user.posts.edit');
            Route::put('/{posts}', 'User\PostsController@update')->name('user.posts.update');
            Route::delete('/{posts}', 'User\PostsController@destroy')->name('user.posts.destroy');
            Route::get('/{posts}', 'User\PostsController@show')->name('user.posts.show');
        });

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', 'User\BannerController@index')->name('user.banner.index');
            Route::post('/', 'User\BannerController@store')->name('user.banner.store');
            Route::get('/create', 'User\BannerController@create')->name('user.banner.create');
            Route::get('/{banner}/edit', 'User\BannerController@edit')->name('user.banner.edit');
            Route::put('/{banner}', 'User\BannerController@update')->name('user.banner.update');
            Route::delete('/{banner}', 'User\BannerController@destroy')->name('user.banner.destroy');
            Route::get('/{banner}', 'User\BannerController@show')->name('user.banner.show');
        });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'User\CustomerController@index')->name('user.customer.index');
        });
     
        Route::group(['prefix' => 'theme'], function () {
            Route::get('/', 'User\ThemeController@index')->name('user.theme.index');
            Route::put('/{theme}', 'User\ThemeController@update')->name('user.theme.update');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'User\OrderController@index')->name('user.order.index');
           
        });
        Route::group(['prefix' => 'service'], function () {
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', 'User\CategoryController@index')->name('user.category.index');
                Route::get('/{Category}/edit', 'User\CategoryController@edit')->name('user.category.edit');
                Route::put('/{Category}', 'User\CategoryController@update')->name('user.category.update');
            });
            Route::group(['prefix' => 'internet'], function () {
                Route::get('/', 'User\ServiceInternetController@index')->name('user.service_internet.index');
                Route::post('/', 'User\ServiceInternetController@store')->name('user.service_internet.store');
                Route::get('/create', 'User\ServiceInternetController@create')->name('user.service_internet.create');
                Route::get('/{Category}/edit', 'User\ServiceInternetController@edit')->name('user.service_internet.edit');
                Route::put('/{Category}', 'User\ServiceInternetController@update')->name('user.service_internet.update');
                Route::delete('/{Category}', 'User\ServiceInternetController@destroy')->name('user.service_internet.destroy');
                Route::get('/{Category}', 'User\ServiceInternetController@show')->name('user.service_internet.show');
            });
            Route::group(['prefix' => 'camera'], function () {
                Route::get('/', 'User\ServiceCameraController@index')->name('user.service_camera.index');
                Route::post('/', 'User\ServiceCameraController@store')->name('user.service_camera.store');
                Route::get('/create', 'User\ServiceCameraController@create')->name('user.service_camera.create');
                Route::get('/{Category}/edit', 'User\ServiceCameraController@edit')->name('user.service_camera.edit');
                Route::put('/{Category}', 'User\ServiceCameraController@update')->name('user.service_camera.update');
                Route::delete('/{Category}', 'User\ServiceCameraController@destroy')->name('user.service_camera.destroy');
                Route::get('/{Category}', 'User\ServiceCameraController@show')->name('user.service_camera.show');
            });
            Route::group(['prefix' => 'play'], function () {
                Route::get('/', 'User\ServicePlayController@index')->name('user.service_play.index');
                Route::post('/', 'User\ServicePlayController@store')->name('user.service_play.store');
                Route::get('/create', 'User\ServicePlayController@create')->name('user.service_play.create');
                Route::get('/{Category}/edit', 'User\ServicePlayController@edit')->name('user.service_play.edit');
                Route::put('/{Category}', 'User\ServicePlayController@update')->name('user.service_play.update');
                Route::delete('/{Category}', 'User\ServicePlayController@destroy')->name('user.service_play.destroy');
                Route::get('/{Category}', 'User\ServicePlayController@show')->name('user.service_play.show');
            });
        });
    });
});

});


//super
Route::group([
    'domain'    => 'admin.' . config('app.short_url'),
], function () {

    Route::get('/login', 'Super\Auth\LoginController@index')->name('super.login.index');
    Route::post('/login', 'Super\Auth\LoginController@login')->name('super.login.store');
    Route::post('/logout', 'Super\Auth\LoginController@logout')->name('super.logout');
    Route::post('/forget-password', 'Super\Auth\ForgetPasswordController@postForgetPass')->name('super.forget_password.store');
    Route::get('/forget-password', 'Super\Auth\ForgetPasswordController@index')->name('super.forget_password.index');

    Route::get('/reset-password/{admin}/{token}', 'Super\Auth\ForgetPasswordController@resetPassword')->name('super.reset_password.index');
    Route::post('/reset-password/{admin}/{token}', 'Super\Auth\ForgetPasswordController@postResetPassword')->name('super.reset_password.store');

    Route::group([
        'middleware' => ['auth:admin']
    ], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Super\UserController@index')->name('super.user.index');
        });
        Route::get('/', 'Super\DashboardController@index')->name('super.dashboard.index');
        Route::group(['prefix' => 'store'], function () {
            Route::get('/', 'Super\StoreController@index')->name('super.store.index');
            Route::put('/{store}', 'Super\StoreController@update')->name('super.store.update');
            Route::post('/active-store/{store}', 'Super\StoreController@active')->name('super.store.active_store');
            Route::post('/stop-store/{store}', 'Super\StoreController@stop')->name('super.store.stop_store');

        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'Super\ProfileController@index')->name('super.profile.index');
            Route::put('/{user}', 'Super\ProfileController@update')->name('super.profile.update');
        });
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


Route::domain("{store_code}." . config('app.short_url'))->group(function () {

    Route::get('/', 'HomeController@index')->name('home.index');
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
