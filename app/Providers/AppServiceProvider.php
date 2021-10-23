<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Orderdeital;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyGroup;
use App\Models\Role;
use App\Models\Slider;
use App\Models\Specialcategory;
use App\Models\Suport;
use App\Models\User;
use App\Observers\BrandObserve;
use App\Observers\CategoryObserve;
use App\Observers\CommentObserve;
use App\Observers\ProductObserve;
use App\Observers\PropertyGroupObserve;
use App\Observers\PropertyObserve;
use App\Observers\RoleObserve;
use App\Observers\SliderObserve;
use App\Observers\SpecialCategoryObserve;
use App\Observers\SuportObserve;
use App\Observers\UserObserve;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserve::class);
        Brand::observe(BrandObserve::class);
        Product::observe(ProductObserve::class);
        Specialcategory::observe(SpecialCategoryObserve::class);
        Slider::observe(SliderObserve::class);
        Role::observe(RoleObserve::class);
        User::observe(UserObserve::class);
        Suport::observe(SuportObserve::class);
        Comment::observe(CommentObserve::class);
        PropertyGroup::observe(PropertyGroupObserve::class);
        Property::observe(PropertyObserve::class);




        view()->composer('client.*',function($view){
            $view->with([
                'categories' => Category::query()->where('category_id',null)->get(),
                'brands' => Brand::all(),
                'carts' => Cart::get_session('cart'),
                'specialProducts' => Product::query()->where('is_special',1)->get(),
                'bestsellers' => Orderdeital::Bestsellers(),
            ]);
        });
        view()->composer('admin.*',function($view){
            $view->with([
                'comments' => Comment::query()->where('is_confirm',0)->get(),
                'suports' => Suport::query()->where('status','0')->get(),
                'sliders' => Slider::all(),
            ]);
        });
    }
}
