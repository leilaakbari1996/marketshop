<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propesal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function get_product(){
       return Product::query()->where('id',$this->product_id)->first();
    }
}
