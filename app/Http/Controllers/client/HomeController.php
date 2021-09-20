<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Specialcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::query()->orderBy('id','DESC')->get();
        if(count($products) < 10){
            $newProducts = $products;
        }else{
            for($i=0 ; $i < 10 ; $i++){
                $newProducts[] = $products[$i];
            }
        }
        $specialCategory =  Specialcategory::all()->first()->category;
        return view('client.home',[
            'title' => 'مارکت شاپ',
            'specialProducts' => Product::query()->where('is_special',1)->get(),
            'specialCategory' => Specialcategory::query()->first(),
            'newProducts' => $newProducts,
            'sliders' => Slider::all()
        ]);
    }
}
