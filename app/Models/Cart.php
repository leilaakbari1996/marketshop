<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public static function new(Product $product,$quntity){
        if(self::is_session('cart')){
            $cart = self::get_session('cart');

        }
        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $quntity
        ];
        session()->put([
            'cart' => $cart
        ]);

    }
    public static function totalItem(){
        $count = 0;
        if(self::is_session('cart')){
            $carts = Self::get_session('cart');
            foreach($carts as $cart){
                if(is_array($cart)){
                    $count++;
                }
            }
        }
        return $count;
    }
    public static function arrayCart(){
        $arrayCart = [];
        if(self::is_session('cart')){
            $carts = Self::get_session('cart');
            foreach($carts as $cart){
                if(is_array($cart)){
                    $arrayCart[] = $cart;
                }
            }
        }
        return $arrayCart;
    }
    public static function totalPrice(){//price without discount
        $total = 0;
        if(self::is_session('cart')){
            $carts = Self::get_session('cart');
            foreach($carts as $cart){
                if(is_array($cart)){
                    $product = $cart['product'];
                    $quantity = $cart['quantity'];
                    $total += $product->price * $quantity;
                }
            }
        }
        return $total;
    }
    public static function totalPriceWithDiscount(){//price with discount
        $total = 0;
        if(self::is_session(('cart'))){
            $cart = self::get_session('cart');
            foreach($cart as $item){
                $total += $item['quantity']*$item['product']->cost_with_discount;
            }
        }
        return $total;
    }
    public static function get_session($session){
        if(self::is_session('cart')){
           return session()->get('cart');
        }
    }
    public static function remove(Product $product){
        if(self::is_session('cart')){
           $cart = self::get_session('cart');
           if(array_key_exists($product->id,$cart)){
               unset($cart[$product->id]);
               session()->put([
                'cart' => $cart
               ]);
           }

        }
    }
    public static function is_session($session){
        if(session()->has($session)){
            return true;
        }
        return false;
    }
    public static function removeAll(){
        session()->forget('cart');
    }
    public static function value(Product $product){
        if(self::is_session('cart')){
            $cart = session()->get('cart');
            if($product->is_cart){
                return $cart[$product->id]['quantity'];
            }
        }
        return 1;
    }
}
