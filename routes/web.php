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

Route::get('/', function () {
    Route::get('/','HomeController@index')->name('home.index');
});

Route::group(['prefix'=> 'category'], function(){
    Route::get('/','Manage\CategoryController@index')->name('manage.category.index');
        Route::post('/','Manage\CategoryController@store')->name('manage.category.store');
        Route::get('/create','Manage\CategoryController@create')->name('manage.category.create');
        Route::get('/{Category}/edit','Manage\CategoryController@edit')->name('manage.category.edit');
        Route::put('/{Category}','Manage\CategoryController@update')->name('manage.category.update');
        Route::delete('/{Category}','Manage\CategoryController@destroy')->name('manage.category.destroy');
        Route::get('/{Category}','Manage\CategoryController@show')->name('manage.category.show');
});

Route::group(['prefix'=> 'combo'], function(){
    Route::get('/','Manage\ComboController@index')->name('manage.combo.index');
        Route::post('/','Manage\ComboController@store')->name('manage.combo.store');
        Route::get('/create','Manage\ComboController@create')->name('manage.combo.create');
        Route::get('/{Category}/edit','Manage\ComboController@edit')->name('manage.combo.edit');
        Route::put('/{Category}','Manage\ComboController@update')->name('manage.combo.update');
        Route::delete('/{Category}','Manage\ComboController@destroy')->name('manage.combo.destroy');
        Route::get('/{Category}','Manage\ComboController@show')->name('manage.combo.show');
});
