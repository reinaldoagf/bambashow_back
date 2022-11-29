<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

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

Route::group(['middleware' => [],'prefix' => 'providers'], function() {
	Route::get('/', [ProviderController::class, 'all']);
	Route::get('/get/{id}', [ProviderController::class, 'get']);
	Route::post('/create', [ProviderController::class, 'create']);
	Route::put('/update/{id}', [ProviderController::class, 'update']);
	Route::delete('/delete/{id}', [ProviderController::class, 'delete']);
	Route::get('/orders', [ProviderController::class, 'orders']);
	Route::post('/orders/create', [ProviderController::class, 'createOrder']);	
	Route::get('/pdf', [ProviderController::class, 'pdf']);
});


Route::group(['middleware' => [],'prefix' => 'raw-material'], function() {
	Route::get('/', [RawMaterialController::class, 'all']);
	Route::get('/get/{id}', [RawMaterialController::class, 'get']);
	Route::post('/create', [RawMaterialController::class, 'create']);
	Route::put('/update/{id}', [RawMaterialController::class, 'update']);
	Route::delete('/delete/{id}', [RawMaterialController::class, 'delete']);
});

Route::group(['middleware' => [],'prefix' => 'categories'], function() {
	Route::get('/', [ProductCategoryController::class, 'all']);
	Route::get('/get/{id}', [ProductCategoryController::class, 'get']);
	Route::post('/create', [ProductCategoryController::class, 'create']);
	Route::put('/update/{id}', [ProductCategoryController::class, 'update']);
	Route::delete('/delete/{id}', [ProductCategoryController::class, 'delete']);
});

Route::group(['middleware' => [],'prefix' => 'products'], function() {
	Route::get('/', [ProductController::class, 'all']);
	Route::get('/get/{id}', [ProductController::class, 'get']);
	Route::post('/create', [ProductController::class, 'create']);
	Route::put('/update/{id}', [ProductController::class, 'update']);
	Route::delete('/delete/{id}', [ProductController::class, 'delete']);
});
