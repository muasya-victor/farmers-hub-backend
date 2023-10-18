<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\BlogController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('records', BlogController::class);

Route::get('farmers',[\App\Http\Controllers\FarmersController::class, 'list']);
Route::post('farmers', [\App\Http\Controllers\FarmersController::class, 'store']);

Route::get('managers',[\App\Http\Controllers\StoreManagerController::class, 'list']);
Route::post('managers', [\App\Http\Controllers\StoreManagerController::class, 'store']);

Route::get('stores',[\App\Http\Controllers\StoreController::class, 'list']);
Route::post('stores', [\App\Http\Controllers\StoreController::class, 'store']);

Route::post('deliveries',[\App\Http\Controllers\DeliveryController::class, 'store']);
Route::get('deliveries',[\App\Http\Controllers\DeliveryController::class, 'list']);

Route::post('users', [UserController::class, 'create']);
Route::get('users', [UserController::class, 'show']);
