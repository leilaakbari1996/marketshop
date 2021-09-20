<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index',[
            'title' => 'لیست برند ها',
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create',[
            'title' => 'ایجاد برند',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $path = $request->file('image')->storeAs('public/brand',$request->file('image')->getClientOriginalName());
        Brand::query()->create([
            'name' => $request->get('name'),
            'image' => $path
        ]);
        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',[
            'title' => ' ویرایش برند '.$brand->name,
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $is_check = Brand::query()->where('name',$request->get('name'))->where('id','!=',$brand->id)->exists();
        if($is_check){
            return redirect(route('admin.brand.edit',$brand))->withErrors([
                'name' => 'برندی با این نام قبلا ثبت شده است!'
            ]);
        }
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('public/brand',$request->file('image')->getClientOriginalName());
        }else{
            $path = $brand->image;
        }
        $brand->update([
            'name' => $request->get('name'),
            'image' => $path
        ]);
        return redirect(route('admin.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Storage::delete($brand->image);
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }
}
