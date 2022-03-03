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


Route::get('/.well-known/acme-challenge/{token}', function (string $token) {
    \Log::channel("jobs")->info("well-know");
    return \Illuminate\Support\Facades\Storage::get('public/.well-known/acme-challenge/' . $token);
});

Route::group([
    'domain'    => config('app.short_url'),
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
        'middleware' => ['auth', "registerVerifyEmail"],
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
            'middleware' => ["CheckForExsitStore", "CheckForStatusStore"]

        ], function () {
            Route::get('/dashboard', 'User\DashboardController@index')->name('user.dashboard.index');

            Route::group(['prefix' => 'category'], function () {
                Route::get('/', 'User\CategoryController@index')->name('user.category.index');
                Route::post('/', 'User\CategoryController@store')->name('user.category.store');
                Route::get('/create', 'User\CategoryController@create')->name('user.category.create');
                Route::get('/{category}/edit', 'User\CategoryController@edit')->name('user.category.edit');
                Route::put('/{category}', 'User\CategoryController@update')->name('user.category.update');
                Route::delete('/{category}', 'User\CategoryController@destroy')->name('user.category.destroy');
                Route::get('/{category}', 'User\CategoryController@show')->name('user.category.show');
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
                Route::post('/', 'User\ThemeController@store')->name('user.theme.store');

            });
            Route::group(['prefix' => 'order'], function () {
                Route::get('/', 'User\OrderController@index')->name('user.order.index');
                Route::post('/accept-order/{order}', 'User\OrderController@accept')->name('user.order.accept');


            });
            Route::group(['prefix' => 'service'], function () {
                Route::group(['prefix' => 'category'], function () {
                    Route::get('/', 'User\CategoryController@index')->name('user.category.index');
                    Route::get('/{category}/edit', 'User\CategoryController@edit')->name('user.category.edit');
                    Route::put('/{category}', 'User\CategoryController@update')->name('user.category.update');
                });
                Route::group(['prefix' => 'internet'], function () {
                    Route::get('/', 'User\ServiceInternetController@index')->name('user.service_internet.index');
                    Route::post('/', 'User\ServiceInternetController@store')->name('user.service_internet.store');
                    Route::get('/create', 'User\ServiceInternetController@create')->name('user.service_internet.create');
                    Route::get('/{category}/edit', 'User\ServiceInternetController@edit')->name('user.service_internet.edit');
                    Route::put('/{category}', 'User\ServiceInternetController@update')->name('user.service_internet.update');
                    Route::delete('/{category}', 'User\ServiceInternetController@destroy')->name('user.service_internet.destroy');
                    Route::get('/{category}', 'User\ServiceInternetController@show')->name('user.service_internet.show');
                });
                Route::group(['prefix' => 'camera'], function () {
                    Route::get('/', 'User\ServiceCameraController@index')->name('user.service_camera.index');
                    Route::post('/', 'User\ServiceCameraController@store')->name('user.service_camera.store');
                    Route::get('/create', 'User\ServiceCameraController@create')->name('user.service_camera.create');
                    Route::get('/{camera}/edit', 'User\ServiceCameraController@edit')->name('user.service_camera.edit');
                    Route::put('/{camera}', 'User\ServiceCameraController@update')->name('user.service_camera.update');
                    Route::delete('/{camera}', 'User\ServiceCameraController@destroy')->name('user.service_camera.destroy');
                    Route::get('/{camera}', 'User\ServiceCameraController@show')->name('user.service_camera.show');
                });
                Route::group(['prefix' => 'play'], function () {
                    Route::get('/', 'User\ServicePlayController@index')->name('user.service_play.index');
                    Route::post('/', 'User\ServicePlayController@store')->name('user.service_play.store');
                    Route::get('/create', 'User\ServicePlayController@create')->name('user.service_play.create');
                    Route::get('/{play}/edit', 'User\ServicePlayController@edit')->name('user.service_play.edit');
                    Route::put('/{play}', 'User\ServicePlayController@update')->name('user.service_play.update');
                    Route::delete('/{play}', 'User\ServicePlayController@destroy')->name('user.service_play.destroy');
                    Route::get('/{play}', 'User\ServicePlayController@show')->name('user.service_play.show');
                });
            });
          
        });
    });
    Route::fallback('User\FallBackController@notfound')->name('user.fallback.notfound');

 
});


//admin
Route::group([
    'domain'    => 'admin.' . config('app.short_url'),
], function () {

    Route::get('/login', 'Admin\Auth\LoginController@index')->name('admin.login.index');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.store');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::post('/forget-password', 'Admin\Auth\ForgetPasswordController@postForgetPass')->name('admin.forget_password.store');
    Route::get('/forget-password', 'Admin\Auth\ForgetPasswordController@index')->name('admin.forget_password.index');

    Route::get('/reset-password/{admin}/{token}', 'Admin\Auth\ForgetPasswordController@resetPassword')->name('admin.reset_password.index');
    Route::post('/reset-password/{admin}/{token}', 'Admin\Auth\ForgetPasswordController@postResetPassword')->name('admin.reset_password.store');

    Route::group([
        'middleware' => ['auth:admin']
    ], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Admin\UserController@index')->name('admin.user.index');
        });
        Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard.index');
        Route::get('/config-general', 'Admin\ConfigController@index')->name('admin.config.index');
        Route::post('/config-general', 'Admin\ConfigController@store')->name('admin.config.store');

        Route::put('/config-general/{config}', 'Admin\ConfigController@update')->name('admin.config.update');




        Route::group(['prefix' => 'store'], function () {
            Route::get('/', 'Admin\StoreController@index')->name('admin.store.index');
            Route::put('/{store}', 'Admin\StoreController@update')->name('admin.store.update');
            Route::delete('/{store}', 'Admin\StoreController@destroy')->name('admin.store.destroy');

            Route::put('/change-rent-shop/{store}', 'Admin\StoreController@changeRentShop')->name('admin.change_rent_shop.update');

            Route::post('/active-store/{store}', 'Admin\StoreController@active')->name('admin.store.active_store');
            Route::post('/stop-store/{store}', 'Admin\StoreController@stop')->name('admin.store.stop_store');
            Route::post('/active-for-paid/{store}', 'Admin\StoreController@activeForPaid')->name('admin.store.active_for_paid');

        });

        


        Route::group(['prefix' => 'rent_shop'], function () {
            Route::get('/', 'Admin\RentShopController@index')->name('admin.rent_shop.index');
            Route::post('/', 'Admin\RentShopController@store')->name('admin.rent_shop.store');
            Route::get('/create', 'Admin\RentShopController@create')->name('admin.rent_shop.create');
            Route::get('/{rent_shop}/edit', 'Admin\RentShopController@edit')->name('admin.rent_shop.edit');
            Route::put('/{rent_shop}', 'Admin\RentShopController@update')->name('admin.rent_shop.update');
            Route::delete('/{rent_shop}', 'Admin\RentShopController@destroy')->name('admin.rent_shop.destroy');
            Route::get('/{rent_shop}', 'Admin\RentShopController@show')->name('admin.rent_shop.show');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'Admin\ProfileController@index')->name('admin.profile.index');
            Route::put('/{user}', 'Admin\ProfileController@update')->name('admin.profile.update');
        });
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
            Route::post('/', 'Admin\CategoryController@store')->name('admin.category.store');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
            Route::get('/{category}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
            Route::put('/{category}', 'Admin\CategoryController@update')->name('admin.category.update');
            Route::delete('/{category}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
            Route::get('/{category}', 'Admin\CategoryController@show')->name('admin.category.show');
        });
        Route::group(['prefix' => 'payment_history'], function () {
            Route::get('/', 'Admin\PaymentHistoryController@index')->name('admin.payment_history.index');
            Route::post('/', 'Admin\PaymentHistoryController@store')->name('admin.payment_history.store');
            Route::get('/create', 'Admin\PaymentHistoryController@create')->name('admin.payment_history.create');
            Route::get('/{payment_history}/edit', 'Admin\PaymentHistoryController@edit')->name('admin.payment_history.edit');
            Route::put('/{payment_history}', 'Admin\PaymentHistoryController@update')->name('admin.payment_history.update');
            Route::delete('/{payment_history}', 'Admin\PaymentHistoryController@destroy')->name('admin.payment_history.destroy');
            Route::get('/{payment_history}', 'Admin\PaymentHistoryController@show')->name('admin.payment_history.show');
        });
   

    });
    Route::fallback('Admin\FallBackController@notfound')->name('admin.fallback.notfound');

});

//User


Route::group([
    "domain" => "{domain}",
    'middleware' => ["customDomain" , "checkForCustomerStoreCode"]

],function () {

    Route::get('/', 'HomeController@index')->name('home.index');


    Route::group(['prefix' => 'service'], function () {
        Route::group(['prefix' => 'internet'], function () {
            Route::get('/', 'ServiceInternetController@index')->name('service_internet.index');
            Route::post('/', 'ServiceInternetController@store')->name('service_internet.store');
            Route::get('/create', 'ServiceInternetController@create')->name('service_internet.create');
            Route::get('/{internet}/edit', 'ServiceInternetController@edit')->name('service_internet.edit');
            Route::put('/{internet}', 'ServiceInternetController@update')->name('service_internet.update');
            Route::delete('/{internet}', 'ServiceInternetController@destroy')->name('service_internet.destroy');
            Route::get('/{internet}', 'ServiceInternetController@show')->name('service_internet.show');
        });
        Route::group(['prefix' => 'camera'], function () {
            Route::get('/', 'ServiceCameraController@index')->name('service_camera.index');
            Route::post('/', 'ServiceCameraController@store')->name('service_camera.store');
            Route::get('/create', 'ServiceCameraController@create')->name('service_camera.create');
            Route::get('/{camera}/edit', 'ServiceCameraController@edit')->name('service_camera.edit');
            Route::put('/{camera}', 'ServiceCameraController@update')->name('service_camera.update');
            Route::delete('/{camera}', 'ServiceCameraController@destroy')->name('service_camera.destroy');
            Route::get('/{camera}', 'ServiceCameraController@show')->name('service_camera.show');
        });
        Route::group(['prefix' => 'play'], function () {
            Route::get('/', 'ServicePlayController@index')->name('service_play.index');
            Route::post('/', 'ServicePlayController@store')->name('service_play.store');
            Route::get('/create', 'ServicePlayController@create')->name('service_play.create');
            Route::get('/{play}/edit', 'ServicePlayController@edit')->name('service_play.edit');
            Route::put('/{play}', 'ServicePlayController@update')->name('service_play.update');
            Route::delete('/{play}', 'ServicePlayController@destroy')->name('service_play.destroy');
            Route::get('/{play}', 'ServicePlayController@show')->name('service_play.show');
        });
    });


    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostsController@index')->name('posts.index');
        Route::post('/', 'PostsController@store')->name('posts.store');
        Route::get('/create', 'PostsController@create')->name('posts.create');
        Route::get('/{posts}/edit', 'PostsController@edit')->name('posts.edit');
        Route::put('/{posts}', 'PostsController@update')->name('posts.update');
        Route::delete('/{posts}', 'PostsController@destroy')->name('posts.destroy');
        Route::get('/{posts}', 'PostsController@show')->name('posts.show');
    });

    Route::group(['prefix' => 'contact'], function () {

        Route::get('/', 'ContactController@index')->name('contact.index');
        Route::post('/', 'ContactController@store')->name('contact.store');

        Route::get('/create', 'ContactController@create')->name('contact.create');
        Route::get('/{contact}/edit', 'ContactController@edit')->name('contact.edit');
        Route::put('/{contact}', 'ContactController@update')->name('contact.update');
        Route::delete('/{contact}', 'ContactController@destroy')->name('contact.destroy');
        Route::get('/{contact}', 'ContactController@show')->name('contact.show');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::post('/', 'OrderController@store')->name('order.store');
    });

    Route::fallback('FallBackController@notfound')->name('fallback.notfound');

});
