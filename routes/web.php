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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');

Route::get('/superadmin', 'AdminController@index');

Route::group(array('prefix' => 'api'), function ()
{
  # code...
  Route::resource('helps', 'HelpController',
    array('only' => array('index','store', 'show' )));

  Route::resource('notifications', 'NotificationController',
    array('only' => array('index','store', 'show')));  


  Route::resource('investments', 'InvestmentController',
    array('only' => array('index','store', 'update', 'show')));

  Route::resource('orders', 'OrderController',
    array('only' => array('index','store', 'show')));

  Route::resource('user', 'UserController',
    array('only' => array('index','store', 'show', 'update')));  

});
