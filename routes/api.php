<?php

use Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', 'Api\RestaurantController@index')->name('restaurants.index');

Route::get('/restaurants/{id}', 'Api\RestaurantController@filtered')->name('restaurants.filtered');

Route::get('/restaurant/{id}', 'Api\RestaurantController@show')->name('restaurants.show');

Route::get('/restaurant/dishes/{id}', 'Api\RestaurantController@dishes')->name('restaurants.dishes');

Route::get('/dishes', 'Api\DishController@index')->name('dishes.index');

Route::get('/categories', 'Api\CategoryController@index')->name('category.index');

Route::get('/user/{id}', 'Api\UserController@getUserEmail');

// per popolare la tabella ordini
Route::post("/payment","Api\OrderController@payment");

// Route::get('orders/generate', 'Api\OrderController@generate')->name('order.generate');
Route::get('orders/generate', 'Api\OrderController@generate');

// Route::post('orders/make/payment', 'Api\OrderController@makePayment')->name('order.makepayment');
Route::post('orders/make/payment', 'Api\OrderController@makePayment');

// Route::post('orders/make/payment', 'Api\OrderController@makePayment');


