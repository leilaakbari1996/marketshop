<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specialcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $specialCategory =  Specialcategory::all()->first()->category;
        return view('client.home',[
            'title' => 'مارکت شاپ',
            'brands' => Brand::all(),
            'specialProducts' => Product::query()->where('is_special',1)->get()
        ]);
    }
}
