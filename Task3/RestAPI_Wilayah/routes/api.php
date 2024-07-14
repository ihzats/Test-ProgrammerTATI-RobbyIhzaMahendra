<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WilayahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/wilayah', [WilayahController::class,'index']);
Route::get('/wilayah/{id}', [WilayahController::class,'show']);
Route::post('/wilayah', [WilayahController::class,'store']);
Route::put('/wilayah/{id}', [WilayahController::class,'update']);
Route::delete('/wilayah/{id}', [WilayahController::class,'destroy']);