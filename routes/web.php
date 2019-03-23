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

Route::get('login', 'UserController@getLogin')->name('login');
Route::post('login', 'UserController@postLogin');

Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');

Route::get('forget-password', 'UserController@getForgetPassword');
Route::post('send-email-forgetpassword','UserController@sendMailForgetpassword');

Route::get('reset-password/{token}', 'UserController@getResetPassword');
Route::post('reset-password', 'UserController@postResetPassword');


Route::get('login/{provider}', 'UserController@redirectToProvider');
Route::get('login/{provider}/callback', 'UserController@handleProviderCallback'); /// ***



Route::group(['middleware'=>'auth'],function(){
    Route::get('logout','UserController@logout');
    Route::get('/','PageController@index');
});



// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


// php artisan make:auth
// php artisan route:list