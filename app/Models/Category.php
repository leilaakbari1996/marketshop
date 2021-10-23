<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function childrens(){
        return $this->hasMany(Category::class,'category_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
    public static function getIdAllSubCategory($categoryId){
        $category = self::query()->where('id',$categoryId)->first();
        if(count($category->childrens) > 0){
            $childrenIds = $category->childrens()->pluck('id');
            foreach($category->childrens as $child){
                $children = $child->childrens()->pluck('id');
                foreach($children as $child){
                    $childrenIds[] = $child;
                }
            }
        }
        $childrenIds[] = $categoryId;
        return Product::query()->whereIn('category_id',$childrenIds)->get();
    }
    public static function getCategoryAndSubcategory(){
        $categories = Category::query()->where('category_id',null)->get();
        foreach($categories as $category){
            foreach($category->childrens as $child){
                $categories[] = $child;
            }
        }
        return $categories;
    }
    public function propertyGroups(){
        return $this->belongsToMany(PropertyGroup::class);
    }
}
