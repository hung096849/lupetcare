<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\Services\ServicesController;
use App\Http\Controllers\Frontend\Contacts\ContactController;
use App\Http\Controllers\Frontend\Auth\LoginController;

Route::name('frontend.')->group(function () {
    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
    });
    Route::name('login.')->group(function(){
        Route::get('dashboard', [LoginController::class, 'dashboard']); 
        Route::get('/login_form',[LoginController::class,'index'])->name('show');
        Route::post('/login_form',[LoginController::class,'customLogin'])->name('');
        Route::get('/registration', [LoginController::class, 'register_form'])->name('register-user');
        Route::post('/custom-registration', [LoginController::class, 'register'])->name('register.custom'); 
        Route::get('/verify',[LoginController::class, 'verifyUser'])->name('verify.user');
    });
    Auth::routes();
    Route::name('services.')->group(function () {
        Route::get('/dich-vu', [ServicesController::class,'index'])->name('show');
            
        // /services/detail/{slug}
        Route::get('/dich-vu/chi-tiet/{id}', [ServicesController::class,'detail'])->name('detail');
    });

    Route::name('order_services.')->group(function () {
        // {slug}
        Route::get('/order/{id}', [OrderController::class,'index'])->name('order');
        
        Route::post('/order/{id}', [OrderController::class,'addForm'])->name('addForm');
    });

    Route::name('contact_sendmail.')->group(function() {
        Route::get('/contact-form', [ContactController::class, 'contactForm'])->name('show');
        Route::post('/contact-form', [ContactController::class, 'sendContact'])->name('contact.send');
    });
   
   

});
