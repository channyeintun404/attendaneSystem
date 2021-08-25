<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/employeelist', function () {
    return view('admin.employeelist');
});

Route::get('/employee/profile', function () {
    return view('employee.profile');
});


Auth::routes();

Route::get('/home', 'AttendanceController@index');
Route::post('/employees/store', 'EmployeeController@store')->name('store');
Route::post('/employees/update', 'EmployeeController@update')->name('update');
Route::post('/employees/destory', 'EmployeeController@destory')->name('delete');
// Route::get('/employees/destroy/{id}', ['uses' => 'EmployeeController@destroy']);
Route::resource('attendances', 'AttendanceController');
Route::resource('employees', 'EmployeeController');
Route::resource('employeeAttendances', 'EmployeeAttendanceController');
Route::post('/employeeAttendancesfilter','EmployeeAttendanceController@getFilter')->name('attendaceFilter');

//for user 
Route::post('check', 'UserAuthController@check')->name('auth.check');
Route::post('login', 'UserAuthController@login');