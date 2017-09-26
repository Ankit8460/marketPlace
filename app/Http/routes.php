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

Route::group(['middleware' => ['web','auth'], 'prefix' => 'admin', 'namespace' => 'admin'], function () {

	Route::resource('dashboard', 'DashboardController');
	Route::resource('adminusers', 'UsersController');

  Route::resource('employee', 'EmployeeController');
  Route::get('/employee/view', 'EmployeeController@index');
  Route::get('/employee/add', 'EmployeeController@add');
  Route::get('employeeDetails/{id}', 'EmployeeController@employeeDetails');
  Route::post('/employee/{employeeId}', 'EmployeeController@update');
  Route::post('/addAccount/{employeeId}', 'EmployeeController@addAccount');
  Route::post('/addPaymentdetails/{employeeId}', 'EmployeeController@addPaymentdetails');

  Route::resource('paymentdetails', 'PaymentdetailsController');
  Route::get('/paymentdetails/view', 'PaymentdetailsController@index');
  Route::get('/paymentdetails/add', 'PaymentdetailsController@add');
  Route::get('paymentDetails/{id}', 'PaymentdetailsController@paymentDetails');
  Route::get('/paymentData/{id}', 'PaymentdetailsController@paymentData');
  Route::post('/addPaydetails', 'PaymentdetailsController@addPaydetails');

  Route::get('/tax/view', 'TaxController@index');
  Route::get('/tax/add', 'TaxController@add');
  Route::post('/tax/{taxId}', 'TaxController@update');
  Route::resource('tax', 'TaxController');

  Route::resource('currency', 'CurrencyController');
  Route::resource('countryflag', 'CountryFlagController');

  Route::get('/fundAccount', 'BanksController@fundAccount');
  Route::get('/payHistory', 'BanksController@payHistory');
  Route::get('/retirementFund', 'BanksController@retirementFund');

  Route::get('/banks/view', 'BanksController@index');
  Route::get('/banks/add', 'BanksController@add');
  Route::post('/banks/{BankId}', 'BanksController@update');
  Route::resource('banks', 'BanksController');

  Route::post('uploadflag', 'CountryFlagController@uploadFlagImage');
  Route::get('profile', 'UsersController@Profile');
  Route::get('profile/edit', 'UsersController@ProfileEdit');
  Route::patch('profile/update', 'UsersController@ProfileUpdate');
  Route::get('Changepassword', 'UsersController@ChangePassword');
  Route::post('Password', 'UsersController@Password');
  Route::get('changeCountryStatus/{id}/{dtatus}', 'CurrencyController@changeStatus');

});


Route::auth();

Route::get('/admin/home', 'HomeController@index');

Route::get('/admin', 'HomeController@index');

/*
  |--------------------------------------------------------------------------
  | API routes
  |--------------------------------------------------------------------------
 */


Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'API'], function () {
        require config('laravel_generator.path.api_routes');
});
