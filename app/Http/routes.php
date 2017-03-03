<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'client'], function () {
  // Authentication Routes...
  Route::get('login', 'AuthClient\AuthController@showLoginForm');
  Route::post('login', 'AuthClient\AuthController@login');
  Route::get('logout', 'AuthClient\AuthController@logout');

  // Registration Routes...
  Route::get('register', 'AuthClient\AuthController@showRegistrationForm');
  Route::post('register', 'AuthClient\AuthController@register');

  // Password Reset Routes...
  Route::get('password/reset/{token?}', 'AuthClient\PasswordController@showResetForm');
  Route::post('password/email', 'AuthClient\PasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'AuthClient\PasswordController@reset');
});

Route::get('/client', 'ClientsController@index');
