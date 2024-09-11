<?php

use App\Http\Controllers\API\CustomerController;
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
Route::post('productReviews', [ProductsController::class, 'productReviews']);

Route::post('register', [CustomerController::class, 'register'])->name('register');
Route::post('login', [CustomerController::class, 'login'])->name('login');
Route::post('addNewCustomer', [CustomerController::class, 'addNewCustomer'])->name('addNewCustomer');
Route::post('placeOrder', [CustomerController::class, 'placeOrder'])->name('placeOrder');
Route::post('customerOrders', [CustomerController::class, 'customerOrders'])->name('customerOrders');
Route::post('confirmPay', [CustomerController::class, 'confirmPay'])->name('confirmPay');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
