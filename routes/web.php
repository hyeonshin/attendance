<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:karyawan'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [UserController::class, 'index'])->name('admin.home');
    Route::get('/admin/input', [UserController::class, 'input'])->name('admin.input');
    Route::post('/admin/input/', [UserController::class, 'store']);
    Route::get('/admin/edit/{id}', [UserController::class, 'edit']);
    Route::put('/admin/edit/{id}', [UserController::class, 'update']);
    Route::get('/admin/change/{id}', [UserController::class, 'change']);
    Route::put('/admin/change/{id}', [UserController::class, 'update_2']);
    Route::get('/admin/activate/{id}', [UserController::class, 'activate']);
    Route::get('/admin/deactive/{id}', [UserController::class, 'deactive']);
    Route::get('/admin/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/admin/export', [UserController::class, 'export'])->name('admin.export');
    
});
