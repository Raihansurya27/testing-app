<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KYCController;
use App\Http\Controllers\ImageController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kyc', [KYCController::class, 'showForm']);
Route::post('/kyc/submit', [KYCController::class, 'submit'])->name('kyc.submit');

Route::view('/camera', 'camera');
Route::post('/process-image', [ImageController::class,'processImage']);
Route::get('/result', [ImageController::class,'showResult']);

