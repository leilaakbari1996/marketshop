<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function propertyGroups(){
        return $this->belongsToMany(PropertyGroup::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'product_properties');
    }

}
