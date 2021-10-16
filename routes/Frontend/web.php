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
        Route::get('/services/detail/{id}', [ServicesController::class,'detail'])->name('detail');
    });

    Route::name('order_services.')->group(function () {
        // {slug}
        Route::get('/order/{id}', [OrderController::class,'index'])->name('order');
        
        Route::post('/order', [OrderController::class,'addForm'])->name('addForm');
    });
    Route::get('/send-mail', function () {
   
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('hunghmph11495@fpt.edu.vn')->send(new \App\Mail\Email($details));
       
        dd("Email is Sent.");
    });

});