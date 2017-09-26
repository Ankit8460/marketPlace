<?php

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where all API routes are defined.
  |
 */
  Route::post('admin/login', 'UserAPIController@login');
  Route::post('admin/register', 'UserAPIController@register');
  Route::post('admin/forgotpassword', 'UserAPIController@forgotpassword');
  Route::post('admin/changePassword', 'UserAPIController@changePassword');
  Route::post('admin/update', 'UserAPIController@update');

  Route::post('employee/list', 'EmployeeAPIController@index');
  Route::post('bank/list', 'EmployeeAPIController@bankList');
  Route::post('employee/add', 'EmployeeAPIController@store');
  Route::post('employee/update', 'EmployeeAPIController@update');
  Route::post('employee/addBankAccount', 'EmployeeAPIController@addBankAccount');
  Route::post('employee/managePayslip', 'EmployeeAPIController@managePayslip');

  Route::post('runpay/list', 'RunpayAPIController@index');
  Route::post('runpay/employeeList', 'RunpayAPIController@employeeList');
  Route::post('runpay/addNewPayment', 'RunpayAPIController@addNewPayment');



