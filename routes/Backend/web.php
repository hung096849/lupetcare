<?php

use App\Http\Controllers\BackEnd\Services\ServicesController;
use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Backend\DashBorad\DashboardController;
use App\Http\Controllers\BackEnd\Contacts\ContactController;
Route::name('backend.')->group(function () {

    Route::name('auth.')->group(function () {
        Route::get('/login', 'App\Http\Controllers\Backend\Auth\LoginController@index')->name('show');
        Route::post('/login', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('login');
        Route::get('/logout', 'App\Http\Controllers\Backend\Auth\LoginController@Logout')->name('logout');
    });
    Route::middleware(['checkLogin'])->group(function () {



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
        Route::prefix('/contacts')->name('contacts.')->group(function(){
            Route::get('/', [ContactController::class, 'index'])->name('show');
            Route::get('/show/{id}', [ContactController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('delete');
            Route::delete('/contacts/delete', [ContactController::class, 'contactsDelete'])->name('contacts.delete');
            Route::get('/search', [ContactController::class, 'search'])->name('search');
        });
        Route::prefix('/services')->name('services.')->group(function () {
            Route::get('/', [ServicesController::class, 'index'])->name('show');
            Route::get('/create', [ServicesController::class, 'create'])->name('create');
            Route::post('/store', [ServicesController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ServicesController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('edit');
            Route::patch('/update/services', [ServicesController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ServicesController::class, 'delete'])->name('delete');
            Route::delete('/services/delete', [ServicesController::class, 'servicesDelete'])->name('services.delete');
            Route::get('/search', [ServicesController::class, 'search'])->name('search');
        });
    });
});

});
