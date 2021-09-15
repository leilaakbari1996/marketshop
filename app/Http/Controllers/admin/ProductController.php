<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'title' => 'لیست محصولات',
             'products' => Product::all()
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'title' => 'ایجاد محصول',
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('image')->storeAs('public/product',$request->file('image')->getClientOriginalName());
        Product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'price' => $request->get('price'),
            'number' => $request->get('number'),
            'image' => $path,
            'desc' => $request->get('desc')
        ]);
        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'title' => 'ویرایش محصول '.$product->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $is_check = Product::query()->where('slug',$request->get('slug'))->where('id','!=',$product->id)
        ->exists();
        if($is_check){
            return redirect(route('admin.product.edit',$product))->withErrors([
                'slug' => 'قبلا این اسلاگ ثبت شده است.لطفا تغییرش دهید!'
            ]);
        }
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('public/product',$request->file('image')->getClientOriginalName());
        }else{
            $path = $product->image;
        }
        $product->update([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'price' => $request->get('price'),
            'number' => $request->get('number'),
            'image' => $path,
            'desc' => $request->get('desc')
        ]);
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('admin.product.index'));
    }
}





