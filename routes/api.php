<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

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


/*
 * Category Routes
 * */
Route::get('/categories', [CategoryController::class, 'show_all']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/category/{id}/items', [CategoryController::class, 'show_category_items']);

/*
 * Item Routes
 * */
Route::get('/items', [ItemController::class, 'show_all']);
Route::post('/items', [ItemController::class, 'store']);
Route::put('/items/{id}', [ItemController::class, 'update']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
