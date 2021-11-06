<?php

namespace App\Http\Controllers\admin;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckPermission;

class Picturecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':create-picture')->only('create','store');
        $this->middleware(CheckPermission::class.':update-picture')->only(['edit','update']);
        $this->middleware(CheckPermission::class.':delete-picture')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Product $product)
    {
        $pictures = Picture::query()->where('product_id',$product->id)->get();
        return view('admin.picture.index',[
            'title' => 'گالری تصاویر',
            'pictures' => $pictures,
            'product' => $product

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $pictures = Picture::query()->where('product_id',$product->id)->get();
        if(count($pictures) == 3){
            return redirect(route('admin.picture.index',$product));
        }
        return view('admin.picture.create',[
            'title' => 'گالری تصاویر',
            'picture' => $pictures,
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $request->validate([
            'image' => ['required','mimes:png,jpg']
        ]);
        $pictures = Picture::query()->where('product_id',$product->id)->get();//gallery this product
        if($pictures->count() == 3){
            return redirect(route('admin.picture.index',$product))->withErrors('بیشتر از 3 تصویر نمی توانید برای گالری محصول '.$product->name .' بگذارید.');
        }else if($pictures->count() < 3){
            $path = $request->file('image')->storeAs('public/picture/'.$product->id,$request->file('image')->getClientOriginalName());
            Picture::query()->create([
                'image' => $path,
                'product_id' => $product->id
            ]);
            return redirect(route('admin.picture.index',$product));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        Storage::delete($picture->image);
        $picture->delete();
        return redirect(route('admin.picture.index',$picture->product_id));
    }
}
