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

//============================================================== -->
// Routes > Auth 
//============================================================== -->

Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm')->name('dashboard.welcome');

//============================================================== -->
// Routes > Administration
//============================================================== -->


/* 
* [name] = dashboard.admin.* 
* [prefix] = /dashboard/administration/*
* [namespace] = auth
* [middleware] = web 
*/

Route::name('dashboard.admin')->namespace('Auth')->prefix('dashboard/administration')->group(function () {

	Route::get ('/'      , 'AdminLoginController@showLoginForm')->name('.login');
	Route::get ('/login' , 'AdminLoginController@showLoginForm')->name('.login');
	Route::post('/login' , 'AdminLoginController@login' )->name('.login');
	Route::get ('/logout', 'AdminLoginController@logout')->name('.logout');

});

/* 
* [name] = dashboard.* 
* [prefix] = /dashboard/*
* [middleware] = auth
*/
 
Route::name('dashboard.')->middleware('auth:admin')->prefix('dashboard')->group(function () {

	/* 
	* [name] = dashboard.admin.* 
	* [prefix] = /dashboard/administration/*
	* [namespace] = admin
	* [middleware] = auth:admin 
	*/

	Route::name('admin.')->namespace('Admin')->prefix('administration')->group(function () {

		Route::get('/welcome','DashboardController@index')->name('welcome');
		Route::get('/customers','CustomerController@index')->name('customers');


		/* 
		* [name] = dashboard.admin.customer.* 
		* [prefix] = /dashboard/administration/customer/*
		* [namespace] = admin
		* [middleware] = auth:admin 
		*/

		Route::name('customer.')->prefix('customer')->group(function () {

			Route::get ('/busqueda' ,'CustomerController@index' )->name('search'); 			
			Route::post('/busqueda' ,'CustomerController@search')->name('search'); 			
			Route::get ('/importar' ,'CustomerController@import')->name('imports');
			Route::post('/importar' ,'CustomerController@importsStore')->name('imports');
			Route::post('/loading' ,'CustomerController@loadingStore')->name('loadings');
			Route::get ('/editar/{customer}' ,'CustomerController@edit')->name('edit');
			Route::put ('/editar/{customer}' ,'CustomerController@update')->name('update');

		});


	});

});


//============================================================== -->
// Routes > Customer
//============================================================== -->

/* 
* [name] = dashboard.customer.* 
* [prefix] = /dashboard/customer
* [namespace] = auth
* [middleware] = web 
*/

Route::name('dashboard.customer')->namespace('Auth')->prefix('dashboard/customer')->group(function () {

	Route::get ('/'      , 'LoginController@showLoginForm')->name('.login');
	Route::get ('/login' , 'LoginController@showLoginForm')->name('.login');
	Route::post('/login' , 'LoginController@login' )->name('.login');
	Route::get ('/logout', 'LoginController@logout')->name('.logout');

});

/* 
* [name] = dashboard.* 
* [prefix] = /dashboard
* [middleware] = auth:customer 
*/

Route::name('dashboard.')->middleware('auth:customer')->prefix('dashboard')->group(function () {

	/* 
	* [name] = dashboard.customer.* 
	* [prefix] = /dashboard/customer
	* [namespace] = customer
	* [middleware] = auth:customer 
	*/

	Route::name('customer.')->namespace('Customer')->prefix('customer')->group(function () {

		Route::get('/welcome'  ,'DashboardController@index' )->name('welcome');
		Route::get('/profile'  ,'DashboardController@edit'  )->name('edit');
		Route::put('/profile'  ,'DashboardController@update')->name('update');
		Route::get('/password' ,'DashboardController@passwordEdit'  )->name('password');
		Route::put('/password' ,'DashboardController@passwordUpdate')->name('password');

		/* 
		* [name] = dashboard.customer.transaction.* 
		* [prefix] = /dashboard/customer/transaction
		* [namespace] = customer
		* [middleware] = auth:customer 
		*/

		Route::name('transaction.')->prefix('transaction')->group(function () {

			Route::get('/{id}', 'TransactionController@show')->name('show');
			Route::get('/{id}/export', 'TransactionController@export')->name('export');
			Route::get('/{id}/payment', 'TransactionController@payment')->name('payment');
			Route::post('/{id}/payment', 'TransactionController@paymentProcess')->name('payment');

		});

	});

});

