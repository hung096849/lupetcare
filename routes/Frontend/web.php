<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\Services\ServicesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ContactController;

Route::name('frontend.')->group(function () {

    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
        Route::get('/mail',[MailController::class,'sendMail']);
    });
    
    Route::name('services.')->group(function () {
        Route::get('/services', [ServicesController::class,'index'])->name('show');
            
        // /services/detail/{slug}
        Route::get('/services/detail/{id}', [ServicesController::class,'detail'])->name('detail');
    });

    Route::name('order_services.')->group(function () {
        // {slug}
        Route::get('/order/{id}', [OrderController::class,'index'])->name('order');
        
        Route::post('/order/{id}', [OrderController::class,'addForm'])->name('addForm');
    });
    Route::name('contact_sendmail')->group(function() {
        Route::get('/contact-form', [ContactController::class, 'contactForm'])->name('contact-form');
        Route::post('/contact-form', [ContactController::class, 'sendContact'])->name('contact.send');
    });
   
   

});
