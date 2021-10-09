<?php

use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Backend\DashBorad\DashboardController;

Route::name('backend.')->group(function () {
    // Route::name('auth.')->group(function () {
    //     Route::get('/backend/login', 'App\Http\Controllers\Backend\Auth\LoginController@index')->name('show');
    //     Route::post('/backend/login', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('login');
    // });


    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('show');
    });
    
    Route::prefix('/categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('show');
        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        // Route::get('/show/{id}', [CategoriesController::class, 'show'])->name('view');
        // Route::get('/update/{id}', [CategoriesController::class, 'update'])->name('update');
        // Route::patch('/update/categories', [CategoriesController::class, 'update'])->name('update');
        // Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
        // Route::delete('/contacts/delete', [CategoriesController::class, 'contactDelete'])->name('contacts.delete');
        // Route::get('/search', [CategoriesController::class, 'search'])->name('search');
    });

});