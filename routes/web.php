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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::get('/', 'EmployeeController@index');
Route::post('/employee', 'EmployeeController@store');
Route::get('/employee/delete/{id}', 'EmployeeController@destroy');
Route::post('/employee/update/', 'EmployeeController@update');
});