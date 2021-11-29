<?php

use App\Http\Controllers\Backend\Calender\CalenderController;
use App\Http\Controllers\BackEnd\Services\ServicesController;
use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Backend\DashBorad\DashboardController;
use App\Http\Controllers\BackEnd\Contacts\ContactController;
use App\Http\Controllers\BackEnd\Customer\CustomerController;
use App\Http\Controllers\Backend\Order\OrderController;
use App\Http\Controllers\Backend\PetInformation\PetInformationController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('backend.')->group(function () {
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

            Route::prefix('/users')->name('users.')->group(function () {
                Route::get('/', 'App\Http\Controllers\Backend\Users\UserController@index')->name('show');
                Route::get('/create', 'App\Http\Controllers\Backend\Users\UserController@create')->name('create');
                Route::post('/store/user', 'App\Http\Controllers\Backend\Users\UserController@store')->name('store');
                Route::get('/view/{id}', 'App\Http\Controllers\Backend\Users\UserController@view')->name('view');
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Users\UserController@edit')->name('edit');
                Route::patch('/update/user', 'App\Http\Controllers\Backend\Users\UserController@update')->name('update');
                Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Users\UserController@delete')->name('delete');
                Route::delete('/users/delete', 'App\Http\Controllers\Backend\Users\UserController@usersDelete')->name('users.delete');
                Route::get('/search', 'App\Http\Controllers\Backend\Users\UserController@search')->name('search');
            });

            Route::prefix('/role')->name('role.')->group(function () {
                Route::get('/', 'App\Http\Controllers\Backend\Role\RoleController@index')->name('show');
                Route::get('/create', 'App\Http\Controllers\Backend\Role\RoleController@create')->name('create');
                Route::post('/store/user', 'App\Http\Controllers\Backend\Role\RoleController@store')->name('store');
                Route::get('/view/{id}', 'App\Http\Controllers\Backend\Role\RoleController@view')->name('view');
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Role\RoleController@edit')->name('edit');
                Route::patch('/update/user', 'App\Http\Controllers\Backend\Role\RoleController@update')->name('update');
                Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Role\RoleController@delete')->name('delete');
                Route::delete('/users/delete', 'App\Http\Controllers\Backend\Role\RoleController@usersDelete')->name('role.delete');
                Route::get('/search', 'App\Http\Controllers\Backend\Role\RoleController@search')->name('search');
            });

            Route::prefix('/permissions')->name('permissions.')->group(function () {
                Route::get('/', 'App\Http\Controllers\Backend\Permissions\PermissionController@index')->name('show');
                Route::get('/create', 'App\Http\Controllers\Backend\Permissions\PermissionController@create')->name('create');
                Route::post('/store/permision', 'App\Http\Controllers\Backend\Permissions\PermissionController@store')->name('store');
                Route::get('/view/{id}', 'App\Http\Controllers\Backend\Permissions\PermissionController@view')->name('view');
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Permissions\PermissionController@edit')->name('edit');
                Route::patch('/update/permission', 'App\Http\Controllers\Backend\Permissions\PermissionController@update')->name('update');
                Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Permissions\PermissionController@delete')->name('delete');
                Route::delete('/permissions/delete', 'App\Http\Controllers\Backend\Permissions\PermissionController@permissionsDelete')->name('permissions.delete');
                Route::get('/search', 'App\Http\Controllers\Backend\Permissions\PermissionController@search')->name('search');
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

            Route::prefix('/contacts')->name('contacts.')->group(function(){
                Route::get('/', [ContactController::class, 'index'])->name('show');
                Route::get('/show/{id}', [ContactController::class, 'view'])->name('view');
                Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('delete');
                Route::delete('/contacts/delete', [ContactController::class, 'contactsDelete'])->name('contacts.delete');
                Route::get('/search', [ContactController::class, 'search'])->name('search');
            });

            Route::prefix('/customers')->name('customers.')->group(function(){
                Route::get('/', [CustomerController::class, 'index'])->name('show');
                Route::get('/create', [CustomerController::class, 'create'])->name('create');
                Route::post('/store', [CustomerController::class, 'store'])->name('store');
                Route::get('/show/{id}', [CustomerController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
                Route::patch('/update/services', [CustomerController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('delete');
                Route::delete('/customers/delete', [CustomerController::class, 'customersDelete'])->name('customers.delete');
                Route::get('/search', [CustomerController::class, 'search'])->name('search');
            });

            Route::prefix('/pet-informations')->name('petinformation.')->group(function(){
                Route::get('/', [PetInformationController::class, 'index'])->name('show');
                Route::get('/create', [PetInformationController::class, 'create'])->name('create');
                Route::post('/store', [PetInformationController::class, 'store'])->name('store');
                Route::get('/show/{id}', [PetInformationController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [PetInformationController::class, 'edit'])->name('edit');
                Route::patch('/update/pet-information', [PetInformationController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [PetInformationController::class, 'delete'])->name('delete');
                Route::delete('/pet-information/delete', [PetInformationController::class, 'petDelete'])->name('pet.information.delete');
                Route::get('/search', [PetInformationController::class, 'search'])->name('search');
            });

            Route::prefix('/orders')->name('orders.')->group(function () {
                Route::get('/', [OrderController::class, 'index'])->name('show');
                Route::get('/show/{id}', [OrderController::class, 'view'])->name('view');
                Route::get('/create', [OrderController::class, 'create'])->name('create');
                Route::post('/store', [OrderController::class, 'store'])->name('store');
                Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
                Route::delete('/orders/delete', [OrderController::class, 'orderDeleteMany'])->name('orders.delete');
                Route::get('/delete/order/{id}', [OrderController::class, 'orderDelete'])->name('orderDelete');

                Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
                Route::patch('/update/order-pet', [OrderController::class, 'update'])->name('update');

                Route::get('/insertService',[OrderController::class, 'insert'])->name('insert.service');
                Route::post('/insertStore',[OrderController::class, 'insertStore'])->name('insert.service.store');
                // Route::get('/orders/delete{id}', [OrderController::class, 'serviceDelete'])->name('orders.delete');
                Route::get('/search', [OrderController::class, 'search'])->name('search');

                Route::get('/exportPDF/{id}',[OrderController::class, 'exportFile'])->name('export.pdf');
            });

            Route::prefix('/scheduled')->name('scheduled.')->group(function () {
                Route::get('fullcalender', [CalenderController::class, 'index']);
                Route::post('fullcalenderAjax', [CalenderController::class, 'ajax']);
            });

        });
    });
});

