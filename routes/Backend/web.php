<?php

use App\Http\Controllers\BackEnd\Auth\LoginController;
use App\Http\Controllers\Backend\Calender\CalenderController;
use App\Http\Controllers\BackEnd\Services\ServicesController;
use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Backend\Comments\CommentsController;
use App\Http\Controllers\Backend\DashBorad\DashboardController;
use App\Http\Controllers\BackEnd\Contacts\ContactController;
use App\Http\Controllers\BackEnd\Customer\CustomerController;
use App\Http\Controllers\BackEnd\News\NewsController;
use App\Http\Controllers\Backend\Order\OrderController;
use App\Http\Controllers\Backend\Permissions\PermissionController;
use App\Http\Controllers\Backend\PetInformation\PetInformationController;
use App\Http\Controllers\Backend\Role\RoleController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('backend.')->group(function () {
    Route::name('auth.')->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('show');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');
        Route::get('/changepassword', [LoginController::class,'changepassword'])->name('changepassword');
        Route::post('/changepassword', [LoginController::class, 'postchangePassword'])->name('postchangePassword');
    });

    Route::middleware(['checkLogin'])->group(function () {
        Route::name('admin.')->group(function () {
            Route::prefix('/dashboard')->name('dashboard.')->group(function () {
                Route::get('/', [DashboardController::class,'index'])->name('show');
            });

            Route::prefix('/users')->name('users.')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('show');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/store/user', [UserController::class, 'store'])->name('store');
                Route::get('/view/{id}', [UserController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::patch('/update/user', [UserController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
                Route::delete('/users/delete', [UserController::class, 'usersDelete'])->name('users.delete');
                Route::get('/search', [UserController::class, 'search'])->name('search');
            });

            Route::prefix('/role')->name('role.')->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('show');
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::post('/store/user', [RoleController::class, 'store'])->name('store');
                Route::get('/view/{id}', [RoleController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::patch('/update/user', [RoleController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
                Route::delete('/users/delete', [RoleController::class, 'usersDelete'])->name('role.delete');
                Route::get('/search', [RoleController::class, 'search'])->name('search');
            });

            Route::prefix('/permissions')->name('permissions.')->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('show');
                Route::get('/create', [PermissionController::class, 'create'])->name('create');
                Route::post('/store/permision', [PermissionController::class, 'store'])->name('store');
                Route::get('/view/{id}', [PermissionController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
                Route::patch('/update/permission', [PermissionController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('delete');
                Route::delete('/permissions/delete', [PermissionController::class, 'permissionsDelete'])->name('permissions.delete');
                Route::get('/search', [PermissionController::class, 'search'])->name('search');
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
                Route::get('fullcalender', [CalenderController::class, 'index'])->name('show');
                Route::post('fullcalenderAjax', [CalenderController::class, 'ajax']);
            });

            Route::prefix('/news')->name('news.')->group(function () {
                Route::get('/', [NewsController::class, 'index'])->name('show');
                Route::get('/create', [NewsController::class, 'create'])->name('create');
                Route::post('/store', [NewsController::class, 'store'])->name('store');
                Route::get('/show/{id}', [NewsController::class, 'view'])->name('view');
                Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
                Route::patch('/update/news', [NewsController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('delete');
                Route::delete('/news/delete', [NewsController::class, 'newsDelete'])->name('news.delete');
                Route::get('/search', [NewsController::class, 'search'])->name('search');
            });

            Route::prefix('/comments')->name('comments.')->group(function () {
                Route::get('/', [CommentsController::class, 'index'])->name('show');
                Route::get('/delete/{id}', [CommentsController::class, 'delete'])->name('delete');
                Route::delete('/comments/delete', [CommentsController::class, 'commentsDelete'])->name('comments.delete');
                Route::get('/search', [CommentsController::class, 'search'])->name('search');
            });

        });
    });
});

