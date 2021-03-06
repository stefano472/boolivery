<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware('auth')
    ->namespace('User')
    ->name('user.')
    ->prefix('user')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('/restaurant', 'RestaurantController');
        Route::resource('/dishes', 'DishController');
        Route::resource('/orders', 'OrderController');
    });

Route::get('{any}', function(){
        return view('guests.home');
    })->where('any', '.*');
