<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Observers\BrandObserve;
use App\Observers\CategoryObserve;
use App\Observers\ProductObserve;
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
    }
}
