<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\BackEnd\InvoiceController;
use App\Http\Controllers\BackEnd\OrdersController;
use App\Http\Controllers\BackEnd\ProductsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('products/{filter_type?}/{filter?}', [ProductsController::class, 'products'])
        ->where(['filter_type' => 'category|available|search'])
        ->name('products');
    Route::get('productDetails/{id}', [ProductsController::class, 'productDetails']);

    Route::get('productEdit/{id}', [ProductsController::class, 'productEdit']);
    Route::post('PostProductEdit', [ProductsController::class, 'productEditPost'])->name('PostProductEdit');

    Route::post('uploadTempProductMainImage', [ProductsController::class,'uploadTempProductMainImage'])->name('uploadTempProductMainImage');


    Route::get('AppInfo', [AppInfoController::class, 'AppInfo']);
    Route::post('editAppInfo', [AppInfoController::class, 'edit_info'])->name('editAppInfo');


    Route::get('newOrders/{filter_type?}/{filter?}', [OrdersController::class, 'newOrders'])
        ->where(['filter_type' => 'type|search'])
        ->name('newOrders');
    Route::get('orderDetails/{id}', [OrdersController::class, 'orderDetails']);
    Route::get('orderEdit/{id}', [OrdersController::class, 'orderEdit']);
    Route::get('orderVipEdit/{id}', [OrdersController::class, 'orderVipEdit']);
    Route::get('orderDetailsPrint/{id}', [OrdersController::class, 'orderDetailsPrint'])->name('orderDetailsPrint');
    Route::get('newOrder', [OrdersController::class, 'newOrder'])->name('newOrder');
    Route::post('createNewOrder', [OrdersController::class, 'createNewOrder'])->name('createNewOrder');
    Route::post('acceptOrder', [OrdersController::class, 'acceptOrder'])->name('acceptOrder');
    Route::post('applyCoupon', [OrdersController::class, 'applyCoupon'])->name('applyCoupon');
    Route::post('removeFromOrderUpdate', [OrdersController::class, 'removeFromOrderUpdate'])->name('removeFromOrderUpdate');
    Route::post('addToOrderUpdate', [OrdersController::class, 'addToOrderUpdate'])->name('addToOrderUpdate');
    Route::post('addToOrderVipUpdate', [OrdersController::class, 'addToOrderVipUpdate'])->name('addToOrderVipUpdate');
    Route::post('editInvoiceNote', [OrdersController::class, 'editInvoiceNote'])->name('editInvoiceNote');
    Route::get('addOrderToProjects/{id}', [OrdersController::class, 'addOrderToProjects']);


    Route::get('InvoiceView', [InvoiceController::class, 'ViewInvoice']);
    Route::get('MailInvoice', [InvoiceController::class, 'MailInvoice']);









});

Route::get('orderDetailsPrint2/{id}', [OrdersController::class, 'orderDetailsPrint2'])->name('orderDetailsPrint2');
