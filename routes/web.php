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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // webAdmin


    // webUser
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/withdraw', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('withdraw');
    Route::get('/borrowing', [App\Http\Controllers\HomeController::class, 'borrowing'])->name('borrowing');
    Route::get('/return', [App\Http\Controllers\HomeController::class, 'return'])->name('return');

    Route::resource('equipments', \App\Http\Controllers\EquipmentController::class);
    Route::get('eqsearch/{name}',[App\Http\Controllers\EquipmentController::class,'searchEQ'])->name('eq.search');
    // Route::get('eqsearch',[App\Http\Controllers\EquipmentController::class,'searchEQ'])->name('eq.search');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
    Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
    Route::resource('withdraws', \App\Http\Controllers\WithdrawController::class);
    Route::resource('borrowings', \App\Http\Controllers\BorrowingController::class);

});
