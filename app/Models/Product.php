<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['cost_with_discount','image_path'];
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
    public function getImagePathAttribute(){
        return str_replace('public','/storage',$this->image);
    }
    public function likes(){
        return $this->belongsToMany(User::class,'likes')->withTimestamps();
    }
    public function getIsLikeAttribute(){
        $user = auth()->user();
        $is_check = $this->likes()->where('user_id',$user->id)->exists();
        if($is_check){
            return true;
        }
        return false;
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function properties(){
        return $this->belongsToMany(Property::class,'product_properties');
    }
    public function propertyGroups(){
        return $this->category-> belongsToMany(PropertyGroup::class);
    }
    public function getIsPropertyForProductAttribute(){
        return ProductProperty::query()->where('product_id',$this->id)->exists();
    }
    public function propertyProduct(){
        return ProductProperty::query()->where('product_id', $this->id )->get();
    }
    public function getIsPropesalAttribute(){
       return Propesal::query()->where('product_id',$this->id)->exists();
    }
    public static function offer(){
        $products = self::query()->where('offer','!=','0')->get();
        if($products->count() > 0){
            foreach($products as $product){
                $offer[$product->id] = $product->offer;
            }
            $collection = collect($offer);
            $sorted = $collection->sortDesc();
            $sortes = $sorted->toArray();
            $ids =array_keys($sortes);
            return $ids;
        }
        return [];
    }
    public function getIsCartAttribute(){
        if(Cart::is_session('cart')){
            $cart = Cart::get_session('cart');
            return array_key_exists($this->id,$cart);
        }


    }
    public function orderdeitals(){
        return $this->hasMany(Orderdeital::class);
    }

}
