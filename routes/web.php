<?php

use App\Http\Controllers\admin\BrandController as AdminBrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SpecialCategoryController;
use App\Http\Controllers\admin\SpecialProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\client\CategoryController as ClientCategoryController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('')->name('client.')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('index');
    Route::get('/product/{product}',[ClientProductController::class,'show'])->name('product.show');
    Route::get('/category/{category}',[ClientCategoryController::class,'index'])->name('category.index');
});
Route::prefix('/adminpanel')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    Route::get('/category/special',[SpecialCategoryController::class,'create'])->name('category.special.create');
    Route::post('/category/special',[SpecialCategoryController::class,'store'])->name('category.special.store');
    Route::resource('category',CategoryController::class);
    Route::resource('brand',AdminBrandController::class);
    Route::get('/product/special',[SpecialProductController::class,'index'])->name('product.special.index');
    Route::post('/product/{product}/special',[SpecialProductController::class,'store'])
    ->name('product.special.store');
    Route::patch('/product/{product}/offer',[OfferController::class,'store'])->name('product.offer.store');
    Route::get('/product/{product}/offer',[OfferController::class,'create'])->name('product.offer.create');
    Route::get('/product/{product}/offer/edit',[OfferController::class,'edit'])->name('product.offer.edit');
    Route::patch('/product/{product}/offer/update',[OfferController::class,'update'])->name('product.offer.update');
    Route::resource('product',ProductController::class);
    Route::resource('slider',SliderController::class);
});
