<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('customer', CustomerController::class)->middleware('auth');
Route::resource('staff', StaffController::class)->middleware('auth');
Route::resource('bill', BillController::class)->middleware('auth');
Route::get('/get-customer', [BillController::class, 'getCustomer'])->middleware('auth');
Route::post('/create-customer', [BillController::class, 'createCustomer'])->middleware('auth');
Route::get('/get-products', [BillController::class, 'getProducts'])->middleware('auth');
Route::get('/report', [HomeController::class, 'report'])->middleware('auth');
Route::post('/print', [BillController::class, 'printBill'])->middleware('auth');
