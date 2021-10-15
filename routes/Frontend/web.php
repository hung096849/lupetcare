<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\Services\ServicesController;

Route::name('frontend.')->group(function () {

    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
    });
    
    Route::name('services.')->group(function () {
        Route::get('/services', [ServicesController::class,'index'])->name('show');
            
        // /services/detail/{slug}
        Route::get('/services/detail', [ServicesController::class,'detail'])->name('detail');
    });

    Route::name('order_services.')->group(function () {
        Route::get('/order', [OrderController::class,'index'])->name('show');
        
        Route::post('/order', [OrderController::class,'addForm'])->name('addForm');
    });

});