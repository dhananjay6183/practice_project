<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('products-ajax-crud', ProductAjaxController::class);
Route::group(['prefix'=>'admin/category'], function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});
Route::group(['prefix' =>'admin/subcategory'], function() {
    Route::get('/index', [SubCategoryController::class, 'index'])->name('admin.subcategory.index');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::delete('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
});
