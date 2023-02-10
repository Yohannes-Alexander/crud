<?php

use App\Http\Controllers\Annualreviews_controller;
use App\Http\Controllers\Employees_controller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [Annualreviews_controller::class, 'index']);
Route::resource('annual',Annualreviews_controller::class);
Route::resource('employee',Employees_controller::class);
