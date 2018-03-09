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

// Authentication Routes 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/superadmin', 'Admin\SuperAdminController@index');


Route::group(['prefix' => 'api',  'middleware' => 'cors'], function ()
{
  # code...
  Route::resource('helps', 'HelpController',
    array('only' => array('index','store', 'show', 'destroy' )));

  Route::resource('notifications', 'NotificationController',
    array('only' => array('index','store', 'show')));  


  Route::resource('investments', 'InvestmentController',
    array('only' => array('index','store', 'update', 'show')));

  Route::resource('orders', 'OrderController',
    array('only' => array('index','store', 'show')));

  Route::resource('profile', 'ProfileController',
    array('only' => array('index', 'show', 'update'))); 

  Route::resource('roles', 'RoleController',
    array('only' => array('index', 'show', 'update')));  

  Route::resource('users', 'Admin\UserManagementController',
    array('only' => array('index', 'show', 'store', 'update'))); 

});

