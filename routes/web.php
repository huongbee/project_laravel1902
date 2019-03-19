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

Route::get('login', 'PageController@getLogin')->name('login');
Route::post('login', 'PageController@postLogin');

Route::get('register', 'PageController@getRegister');
Route::post('register', 'PageController@postRegister');

Route::group(['middleware'=>'auth'],function(){
    Route::get('logout','PageController@logout');
    Route::get('/','PageController@index');
});






// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


// php artisan make:auth
// php artisan route:list