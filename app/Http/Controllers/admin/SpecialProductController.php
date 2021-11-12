<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;

class SpecialProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':select-products-special');
    }
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
