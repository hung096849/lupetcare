<?php

use App\Http\Controllers\Api\Admin\CategoriesController;
use App\Http\Controllers\Api\Admin\ServicesController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testing',[TestController::class,'index']);

Route::name('admin.')->prefix('/admin')->group(function () {

    Route::prefix('/categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('show');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        Route::get('/show/{id}', [CategoriesController::class, 'show'])->name('view');
        Route::get('/update/{id}', [CategoriesController::class, 'update'])->name('update');
        // Route::patch('/update/contact', [CategoriesController::class, 'update'])->name('update');
        // Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
        // Route::delete('/contacts/delete', [CategoriesController::class, 'contactDelete'])->name('contacts.delete');
        // Route::get('/search', [CategoriesController::class, 'search'])->name('search');
    });

    Route::prefix('/services')->name('services.')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('show');
        Route::post('/store', [ServicesController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ServicesController::class, 'show'])->name('view');
        Route::get('/update/{id}', [ServicesController::class, 'update'])->name('update');
        
        // Route::patch('/update/contact', [CategoriesController::class, 'update'])->name('update');
        // Route::get('/delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
        // Route::delete('/contacts/delete', [CategoriesController::class, 'contactDelete'])->name('contacts.delete');
        // Route::get('/search', [CategoriesController::class, 'search'])->name('search');
    });
});