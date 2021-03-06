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

Route::get('about', function() {
  return view('about');
});



Route::group(['middleware' => ['cors', 'auth'], 'prefix' => 'api'], function ()
{
  # code...
  Route::resource('helps', 'HelpController',
    array('only' => array('index','store', 'show', 'destroy')));

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

  Route::resource('referrals', 'ReferralController',
    array('only' => array('index')));  

  Route::resource('users', 'Admin\UserManagementController',
    array('only' => array('index', 'show', 'store', 'update', 'destroy')));

  Route::resource('subscriptions', 'Admin\SubscriptionController',
    array('only' => array('index', 'show', 'store', 'update', 'destroy'))); 

  Route::resource('investors', 'Admin\AdminInvestmentController',
    array('only' => array('index', 'show', 'update', 'destroy'))); 

  Route::resource('orders', 'Admin\AdminOrder',
    array('only' => array('index', 'show', 'update', 'destroy'))); 

  Route::resource('payouts', 'Admin\AdminPayout',
    array('only' => array('index', 'show', 'update', 'destroy'))); 

});

