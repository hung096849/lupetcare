<?php

use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Backend\DashBorad\DashboardController;

Route::name('backend.')->group(function () {
    // Route::name('auth.')->group(function () {
    //     Route::get('/backend/login', 'App\Http\Controllers\Backend\Auth\LoginController@index')->name('show');
    //     Route::post('/backend/login', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('login');
    // });


    Route::name('admin.')->group(function () {
        Route::prefix('/dashboard')->name('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class,'index'])->name('show');
        });
        
        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('show');
            Route::get('/create', [CategoriesController::class, 'create'])->name('create');
            Route::post('/store', [CategoriesController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CategoriesController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
            Route::patch('/update/categories', [CategoriesController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
            Route::delete('/categories/delete', [CategoriesController::class, 'categoriesDelete'])->name('categories.delete');
            Route::get('/search', [CategoriesController::class, 'search'])->name('search');
        });
    });
        Route::prefix('/login')->name('login.')->group(function () {
           Route::get('dashboard', [CustomAuthController::class, 'dashboard.index']); 
           Route::get('login', [CustomAuthController::class, 'index'])->name('login');
           Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
           Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
           Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
           Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
    });

});