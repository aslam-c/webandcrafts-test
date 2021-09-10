<?php

use App\Http\Controllers\EmployeeController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/employees/add-new',[EmployeeController::class,'addEmployee']);
Route::post('/employees/add-new',[EmployeeController::class,'storeEmployeeDetails']);

Route::get('/employees/update/{id}',[EmployeeController::class,'editEmployeeDetails']);
Route::post('/employees/update/{id}',[EmployeeController::class,'updateEmployeeDetails']);

Route::post('/employees/delete/{id}',[EmployeeController::class,'deleteEmployee']);

Route::get('employees/list',[EmployeeController::class,'showEmployees']);
