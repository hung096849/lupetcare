<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\Services\ServicesController;
use App\Http\Controllers\Frontend\Contacts\ContactController;
use App\Http\Controllers\Frontend\Auth\LoginController;
Auth::routes();
Route::name('frontend.')->group(function () {
    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
    });
    Route::name('login.')->group(function(){
        Route::get('/dang-nhap',[LoginController::class,'index'])->name('show');
        Route::post('/dang-nhap',[LoginController::class,'customLogin'])->name('login-user');
        Route::get('/dang-ki', [LoginController::class, 'register_form'])->name('register-user');
        Route::post('/dang-ki', [LoginController::class, 'register'])->name('register.custom'); 
        Route::get('/xac-thuc',[LoginController::class, 'verifyUser'])->name('verify.user');
    });
   
    Route::name('services.')->group(function () {
        Route::get('/dich-vu', [ServicesController::class,'index'])->name('show');
            
        // /services/detail/{slug}
        Route::get('/dich-vu/chi-tiet/{id}', [ServicesController::class,'detail'])->name('detail');
    });

    Route::name('order_services.')->group(function () {
        // {slug}
        Route::get('/dat-hang/{id}', [OrderController::class,'index'])->name('order');
        
        Route::post('/dat-hang/{id}', [OrderController::class,'addForm'])->name('addForm');
    });

    Route::name('contact_sendmail.')->group(function() {
        Route::get('/lien-he', [ContactController::class, 'contactForm'])->name('show');
        Route::post('/lien-he', [ContactController::class, 'sendContact'])->name('contact.send');
    });
   
   

});
