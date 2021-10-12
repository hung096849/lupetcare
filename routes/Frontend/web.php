<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\Order\OrderController;

Route::name('frontend.')->group(function () {

    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
    });
    
    Route::name('order_services.')->group(function () {
        Route::get('/order', [OrderController::class,'index'])->name('show');
    });

});