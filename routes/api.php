<?php

use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\LogoutController;
use App\Http\Controllers\AuthControllers\MeController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', 'App\Http\Controllers\AuthControllers\LoginController')->name('login');
Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'App\Http\Controllers\AuthControllers\LogoutController');
    Route::get('me', 'App\Http\Controllers\AuthControllers\MeController');
});
