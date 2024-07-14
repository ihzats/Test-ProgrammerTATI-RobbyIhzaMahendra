<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::resource('activity', ActivityController::class);
    Route::get('/dashboard', [ActivityController::class, 'index'])->name('dashboard');
    Route::get('/', [ActivityController::class, 'index']);
});

/*------------------------------------------
--------------------------------------------
All Kepala Bidang Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kepdang'])->group(function () {
    Route::get('aproval', [HomeController::class, 'index'])->name('aproval');
});

/*------------------------------------------
--------------------------------------------
All Kepala Dinas Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kepdin'])->group(function () {
    Route::resource('/users', UserController::class);
});
