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
}
