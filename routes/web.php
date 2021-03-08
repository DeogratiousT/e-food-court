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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('customers','CustomerController');
    Route::resource('dishes','DishController');
    Route::resource('customers.orders','OrderController');
    Route::resource('orders','AdminOrderController');
    Route::get('custom-order','HomeController@dashboard');

    Route::get('unavailable-dishes','DishOrderFunctionsController@unavailableDishes')->name('unavailable-dishes');
});