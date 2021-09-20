<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create(Product $product){
          return view('admin.offer.create',[
              'title' => 'ایجاد تخفیف محصول '.$product->name,
              'product' => $product
          ]);
    }
    public function store(Request $request,Product $product){
        $request->validate([
            'offer' => ['required','integer','gt:0','lte:100']
        ]);
        $product->update([
            'offer' => $request->get('offer')
        ]);
        session()->flash('success',' تخفیف محصول '.$product->name .'  با موفقیت ایجاد شد ');
        return redirect(route('admin.product.index'));

    }
    public function edit(Product $product){
        return view('admin.offer.edit',[
            'title' => 'ویرایش تخفیف '.$product->name,
            'product' => $product
        ]);
    }
    public function update(Request $request,Product $product){
        $request->validate([
            'offer' => ['required','integer','gt:0','lte:100']
        ]);
        $product->update([
            'offer' => $request->get('offer')
        ]);
        session()->flash('success',' تخفیف محصول '.$product->name .'  با موفقیت ویرایش شد ');
        return redirect(route('admin.product.index'));

    }
}
