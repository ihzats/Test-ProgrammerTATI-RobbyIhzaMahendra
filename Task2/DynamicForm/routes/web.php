<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[BiodataController::class,'index']);
Route::post('/post',[BiodataController::class,'store']);
Route::get('/biodatas', [BiodataController::class, 'show']);
Route::delete('/biodatas/{id}', [BiodataController::class, 'destroy']);