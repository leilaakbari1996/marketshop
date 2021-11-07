<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Orderdeital;
use App\Models\Product;
use App\Models\Propesal;
use App\Models\Slider;
use App\Models\Specialcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        Product::offer();
        $products = Product::query()->orderBy('id','DESC')->get();
        if(count($products) < 10){
            $newProducts = $products;
        }else{
            for($i=0 ; $i < 10 ; $i++){
                $newProducts[] = $products[$i];
            }
        }
        $specialCategory = Specialcategory::query();
        if($specialCategory->exists()){
            $category_id = $specialCategory->first()->category_id;
        }else{
            $category_id = null;
        }
        return view('client.home',[
            'title' => 'ویترین شاپ',
            'specialCategoryProduct' => Category::getIdAllSubCategory($category_id),
            'propesalProducts' => Propesal::all(),
            'newProducts' => $newProducts,
            'productOffers' => Product::offer(),
            'sliders' => Slider::all()
        ]);
    }
}
