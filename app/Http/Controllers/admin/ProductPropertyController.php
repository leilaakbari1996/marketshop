<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\Property;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.product.properties',[
            'title' => 'ویژگی ها',
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,
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
        $propertyGroups = $product->propertyGroups;
        foreach($propertyGroups as $propertyGroup){
            if($propertyGroup->properties -> count() > 0){
                foreach($propertyGroup->properties as $property){
                    if($request->get('propertyGroup-'.$propertyGroup->id.'-property-'.$property->id) != null){
                        ProductProperty::query()->create([
                            'product_id' => $product->id,
                            'property_id' => $property->id,
                            'property_group_id' => $propertyGroup->id,
                            'value' => $request->get('propertyGroup-'.$propertyGroup->id.'-property-'.$property->id)
                        ]);
                    }
                }
            }
        }

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.propertiesedit',[
            'title' => 'ویرایش ویژگی ها',
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,
            'properties' => ProductProperty::query()->where('product_id',$product->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
