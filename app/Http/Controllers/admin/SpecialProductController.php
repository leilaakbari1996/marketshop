<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SpecialProductController extends Controller
{
    public function index(){
        return view('admin.product.special',[
            'title' => 'محصولات ویژه',
            'products' => Product::all()
        ]);
    }
    public function store(Product $product){
        if($product->is_special == 0){
            $product->update([
                'is_special' => 1
            ]);
        }else{
            $product->update([
                'is_special' => 0
            ]);
        }
        return response([
            'productName' => $product -> name
        ],200);
    }
}
