<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shetabit\Multipay\Invoice;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public  static function store_to_db($address,$postcode,$totalPriceWithDiscount){
        $order = self::query()->create([
            'user_id' => auth()->id(),
            'price' => $totalPriceWithDiscount,
            'postcode' => $postcode,
            'address' => $address
        ]);
        foreach(Cart::get_session('cart') as $cart){
            Orderdeital::query()->create([
                'product_id' => $cart['product']->id,
                'quantity' => $cart['quantity'],
                'order_id' => $order->id,
                'amount_unit' => $cart['product']->cost_with_discount

            ]);
            $product = $cart['product'];
            $product->update([
                'number' => $product->number - $cart['quantity']
            ]);
        }
        Cart::removeAll();
        return $order;
    }
    public function orderdeitals(){
        return $this->hasMany(Orderdeital::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
