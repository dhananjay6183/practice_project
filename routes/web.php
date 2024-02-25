<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserManagementController;

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
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});
Route::group(['prefix' =>'admin/subcategory'], function() {
    Route::get('/index', [SubCategoryController::class, 'index'])->name('admin.subcategory.index');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/show/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategory.show');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::delete('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
});
Route::group(['prefix' => 'admin/brand'], function() {
    Route::get('/index', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/show/{id}', [BrandController::class, 'show'])->name('admin.brand.show');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
});
Route::group(['prefix' => 'admin/product'], function() {
    Route::get('/index', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
});
Route::group(['prefix' => 'admin/usermanagement'], function() {
    Route::get('/index', [UserManagementController::class, 'index'])->name('admin.user.index');
    Route::get('/create', [UserManagementController::class, 'create'])->name('admin.user.create');
    Route::post('/store', [UserManagementController::class, 'store'])->name('admin.user.store');
    Route::get('/show/{id}', [UserManagementController::class, 'show'])->name('admin.user.show');
    Route::get('/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.user.edit');
    Route::post('/update/{id}', [UserManagementController::class, 'update'])->name('admin.user.update');
    Route::delete('/delete/{id}', [UserManagementController::class, 'destroy'])->name('admin.user.delete');
});
