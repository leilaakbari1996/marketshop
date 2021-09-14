<?php

use App\Http\Controllers\admin\BrandController as AdminBrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\client\HomeController;
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
});
Route::prefix('/adminpanel')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    Route::resource('category',CategoryController::class);
    Route::resource('brand',AdminBrandController::class);
});
