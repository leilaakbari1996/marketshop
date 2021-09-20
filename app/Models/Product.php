<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function getCostWithDiscountAttribute(){
        if($this->offer > 0){
            $offer = $this->price - $this->price * $this->offer/100;
        }else{
            $offer = $this->price;
        }
        return $offer;
    }
    public static function get_image($path){
        return str_replace('public','/storage',$path);
    }
}
