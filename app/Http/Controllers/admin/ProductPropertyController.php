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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.product.properties',[
            'title' => 'ویژگی های محصول '.$product->name,
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,
            'properties_product' => $product->propertyProduct(),
            'properties_category' => $product -> category->propertyGroups,
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

        return redirect(route('admin.product.property.create',$product));
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
    public function edit(ProductProperty $productProperty)
    {
        return view('admin.product.propertiesedit',[
            'title' => 'ویرایش ویژگی '.$productProperty->property(),
            'product' => $productProperty->product(),
            'propertyGroup' => $productProperty->propertyGroup(),
            'property' => $productProperty->property(),
            'productProperty' => $productProperty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProductProperty $productProperty)
    {
        $productProperty->update([
            'value' => $request->get('propertyGroup-'.$productProperty->property_group_id.'-property-'.$productProperty->property_id)
        ]);
        return redirect(route('admin.product.property.create',$productProperty->product()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductProperty $productProperty)
    {
        $productProperty -> delete();
        return redirect(route('admin.product.property.create',$productProperty->product()));

    }
}
