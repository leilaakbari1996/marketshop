<?php

use App\Http\Controllers\admin\BrandController as AdminBrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\DateController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\Picturecontroller;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPropertyController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyGroupController;
use App\Http\Controllers\admin\PropesalController;
use App\Http\Controllers\admin\PropesalProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SpecialCategoryController;
use App\Http\Controllers\admin\SpecialProductController;
use App\Http\Controllers\admin\SuportController as AdminSuportController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\client\CouponController as ClientCouponController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\LikeController;
use App\Http\Controllers\client\OfferController as ClientOfferController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\ProductController as ClientProductController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Controllers\client\SuportController;
use App\Http\Controllers\client\UserController;
use App\Http\Middleware\CheckPermission;
use App\Models\Property;
use App\Models\PropesalProduct;
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
    Route::get('/register',[RegisterController::class,'create'])->name('register.create');
    Route::post('/register/sendmail',[RegisterController::class,'sendemail'])->name('register.sendemail');
    Route::get('/register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::post('/register/virifyotp/{user}',[RegisterController::class,'virifyotp'])->name('register.virifyotp');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/update/{product}',[CartController::class,'update'])->name('cart.update');
    Route::post('/cart/edit/{product}',[CartController::class,'edit'])->name('cart.edit');
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::post('/order/record',[OrderController::class,'record'])->name('order.record');
    Route::get('/order/payment/callback',[OrderController::class,'callback'])->name('order.callback');
    Route::resource('order', OrderController::class);
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
    Route::resource('user', UserController::class);
    Route::post('/suport',[SuportController::class,'store'])->name('suport.store');
    Route::post('/like/{product}',[LikeController::class,'store'])->name('like.store');
    Route::get('/like',[LikeController::class,'index'])->name('like.index');
    Route::post('/comment/{product}',[CommentController::class,'store'])->name('comment.store');
    Route::get('/comment',[CommentController::class,'index'])->name('comment.index');
    Route::get('/offer', [ClientOfferController::class,'index'])->name(('offer.index'));
    Route::post('/coupon',[ClientCouponController::class,'store'])->name('coupon.store');
    Route::post('/payment',[OrderController::class,'store'])->name('payment.store');
    Route::get('/suport',[SuportController::class,'index'])->name('suport.index');

});
Route::prefix('/adminpanel')->name('admin.')->middleware(CheckPermission::class.':read-view-dashbord','auth')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    Route::get('/category/isCheckDate/{category}', [CategoryController::class,'isCheckDate'])->name('category.isCheckDate');
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
    Route::resource('role',RoleController::class);
    Route::delete('/suport/{suport}',[AdminSuportController::class,'destroy'])->name('suport.destroy');
    Route::resource('suport',AdminSuportController::class);
    Route::resource('comment', AdminCommentController::class);
    Route::resource('propertyGroup',PropertyGroupController::class);
    Route::resource('property', PropertyController::class);
    Route::get('/product/{product}/property',[ProductPropertyController::class,'create'])->name('product.property.create');
    Route::post('/property/{product}/property',[ProductPropertyController::class,'store'])->name('product.property.store');
    Route::get('/property/{product}/property',[ProductPropertyController::class,'edit'])->name('product.property.edit');
    Route::patch('/property/{product}/property',[ProductPropertyController::class,'update'])->name('product.property.update');
    Route::get('/propesal',[PropesalController::class,'index'])->name('propesal.index');
    Route::post('/propesal/{product}',[PropesalController::class,'update'])->name('propesal.update');
    Route::resource('coupon',CouponController::class);
    Route::resource('user', AdminUserController::class);
    Route::get('/product/pictute/{product}/create',[Picturecontroller::class,'create'])->name('picture.create');
    Route::post('/product/pictute/{product}',[Picturecontroller::class,'store'])->name('picture.store');
    Route::get('/product/pictute/{product}',[Picturecontroller::class,'index'])->name('picture.index');
    Route::delete('/product/pictute/{picture}',[Picturecontroller::class,'destroy'])->name('picture.destroy');
});
