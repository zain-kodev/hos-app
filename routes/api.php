<?php

use App\Http\Controllers\API\ProductsController;
use Illuminate\Http\Request;
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
Route::post('/products/{filter_type?}/{filter?}', [ProductsController::class, 'products'])
    ->where(['filter_type' => 'category|tag|search'])
    ->name('products');
Route::post('/productsSearch', [ProductsController::class, 'proSearch']);
Route::post('/product/{slug}', [ProductsController::class, 'product'])->name('product');
Route::post('projectDetails', [ProductsController::class, 'projectDetails']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
