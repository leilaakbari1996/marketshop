<?php

use App\Http\Controllers\admin\BrandController as AdminBrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SpecialCategoryController;
use App\Http\Controllers\BrandController;
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
});
Route::prefix('/adminpanel')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    Route::get('/category/special',[SpecialCategoryController::class,'create'])->name('category.special.create');
    Route::post('/category/special',[SpecialCategoryController::class,'store'])->name('category.special.store');
    Route::resource('category',CategoryController::class);
    Route::resource('brand',AdminBrandController::class);
    Route::resource('product',ProductController::class);
});
