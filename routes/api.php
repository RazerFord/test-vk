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

Route::post('login', 'App\Http\Controllers\AuthControllers\LoginController');
Route::post('register', 'App\Http\Controllers\AuthControllers\RegisterController');

Route::middleware('auth:api')->group(function () {
    Route::get('me', 'App\Http\Controllers\AuthControllers\MeController');
    Route::get('logout', 'App\Http\Controllers\AuthControllers\LogoutController');

    Route::post('comment', 'App\Http\Controllers\CommentControllers\StoreController');
    Route::put('comment/{comment}', 'App\Http\Controllers\CommentControllers\UpdateController');
    Route::delete('comment/{id}', 'App\Http\Controllers\CommentControllers\DeleteController');
});

Route::get('unauthorized', 'App\Http\Controllers\AuthControllers\UnauthorizedController')->name('unauthorized');
