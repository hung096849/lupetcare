<?php

use App\Http\Controllers\Frontend\Homepage\HomepageController;

Route::name('frontend.')->group(function () {

    Route::name('homepage.')->group(function () {
        Route::get('/', [HomepageController::class,'index'])->name('show');
    });    

});