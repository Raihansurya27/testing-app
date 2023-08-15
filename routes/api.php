<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\LoginApiController;

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

//Contoh
Route::get('/hai', [TestApiController::class,'hai']);
// Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');

Route::middleware('auth:api')->group(function () {
    Route::controller(LoginApiController::class)->group(function(){
        Route::get('login-api', 'login');
    });
});

