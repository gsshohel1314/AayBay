<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'],function(){
  Route::get('', 'AdminController@index');

  Route::resource('user', 'UserController');
  Route::put('user/status/{id}', 'UserController@status');
  Route::get('recycle/user', 'UserRecycleBinController@index');
  Route::get('recycle/user/show/{id}', 'UserRecycleBinController@show');
  Route::get('recycle/user/restore/{id}', 'UserRecycleBinController@restore');
  Route::delete('recycle/user/delete/{id}', 'UserRecycleBinController@delete');

  Route::resource('income/category', 'IncomeCategoryController');
  Route::resource('income', 'IncomeController');
  Route::get('recycle/income', 'IncomeRecycleBinController@index');
  Route::get('recycle/income/show/{id}', 'IncomeRecycleBinController@show');
  Route::get('recycle/income/restore/{id}', 'IncomeRecycleBinController@restore');
  Route::delete('recycle/income/delete/{id}', 'IncomeRecycleBinController@delete');

  Route::resource('expense/category', 'ExpenseCategoryController');
  Route::resource('expense', 'ExpenseController');
  Route::get('recycle/expense', 'ExpenseRecycleBinController@index');
  Route::get('recycle/expense/show/{id}', 'ExpenseRecycleBinController@show');
  Route::get('recycle/expense/restore/{id}', 'ExpenseRecycleBinController@restore');
  Route::delete('recycle/expense/delete/{id}', 'ExpenseRecycleBinController@delete');

  Route::get('summary', 'SummaryController@index');
  Route::get('summary/search/{from}/{to}', 'SummaryController@search');

  Route::get('manage', 'ManageController@index');

  Route::resource('loaner', 'LoanerController');
  Route::put('loaner/status/{id}', 'LoanerController@status');
  Route::get('recycle/loaner', 'LoanerRecycleBinController@index');
  Route::get('recycle/loaner/show/{id}', 'LoanerRecycleBinController@show');
  Route::get('recycle/loaner/restore/{id}', 'LoanerRecycleBinController@restore');
  Route::delete('recycle/loaner/delete/{id}', 'LoanerRecycleBinController@delete');

  Route::get('loan/given', 'LoanGivenController@index');
  Route::get('loan/given/{id}', 'LoanGivenController@show');
  Route::post('loan/given/create', 'LoanGivenController@create');
  Route::delete('loan/given/{id}', 'LoanGivenController@delete');

  Route::get('loan/receive', 'LoanReceiveController@index');
  Route::get('loan/receive/{id}', 'LoanReceiveController@show');
  Route::post('loan/receive/create', 'LoanReceiveController@receive');
  Route::delete('loan/receive/{id}', 'LoanReceiveController@delete');

  // Route::get('chart', 'ChartController@index');

});
