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

    return view('welcome');
})->name('home');


Route::group(['prefix' => 'admin'], function(){
    Route::resource('user', 'RegController');
    Route::get('login', 'SessionController@create')->name('login');
    Route::post('login', 'SessionController@store');
    Route::get('logout', 'SessionController@destroy')->name('destroy');
    Route::resource('slide', 'SlidesController');
    Route::resource('catagory', 'CatagoryController');
    Route::resource('item', 'ItemController');
});