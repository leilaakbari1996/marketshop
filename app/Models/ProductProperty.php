<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getPropertyAttribute(){
        $propertyGroupId = $this->property_group_id;
        return PropertyGroup::query()->where('id',$propertyGroupId)->first()->name;
    }
    public function property(){
        $propertyId = $this->property_id;
        $property = Property::query()->where('id',$propertyId)->first();
        return $property->name;
    }
    public function propertyGroup(){
        $propertyGroupId = $this->property_group_id;
        $propertyGroup = PropertyGroup::query()->where('id',$propertyGroupId)->first();
        return $propertyGroup->name;
    }
    public function product(){
        $productId = $this->product_id;
        $product = Product::query()->where('id',$productId)->first();
        return $product;
    }
}
