<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
});
Route::group(['middleware' => [],'prefix' => 'users'], function() {
	Route::get('/', [UserController::class, 'all']);
	Route::get('/get/{id}', [UserController::class, 'get']);
	Route::put('/update/{id}', [UserController::class, 'update']);
	Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

Route::group(['middleware' => [],'prefix' => 'roles'], function() {
	Route::get('/', [RolController::class, 'all']);
	Route::get('/get/{id}', [RolController::class, 'get']);
	Route::put('/update/{id}', [RolController::class, 'update']);
	Route::delete('/delete/{id}', [RolController::class, 'delete']);
});