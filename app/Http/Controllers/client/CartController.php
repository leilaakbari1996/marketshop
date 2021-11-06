<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {//only users logined
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            return view('client.cart.index',[
                'title' => 'سبد خرید من',
                'carts' => Cart::arrayCart()
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        Cart::new($product,$request->get('quantity'));
        return response([
            'msg' => 'successful',
            'cart' => session()->get('cart'),
            'totalPrice' => Cart::totalPrice(),
            'totalPriceWithDiscount' => Cart::totalPriceWithDiscount(),
            'totalItem' => Cart::totalItem(),
            'arrayCart' => Cart::arrayCart(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Product $product)
    {
        Cart::new($product,$request->get('quantity'));
        return response([
            'msg' => 'update',
            'cart' => Cart::arrayCart(),
            'totalPrice' => Cart::totalPrice(),
            'totalPriceWithDiscount' => Cart::totalPriceWithDiscount(),
            'totalItem' => Cart::totalItem(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        Cart::new($product,$request->get('quantity'));

        return response([
            'msg' => 'update',
            'cart' => Cart::arrayCart(),
            'totalPrice' => Cart::totalPrice(),
            'totalPriceWithDiscount' => Cart::totalPriceWithDiscount(),
            'totalItem' => Cart::totalItem()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Cart::remove($product);
        return response([
            'msg' => 'deleted',
            'cart' => Cart::arrayCart(),
            'count' => count(Cart::arrayCart()),
            'totalPrice' => Cart::totalPrice(),
            'totalPriceWithDiscount' => Cart::totalPriceWithDiscount(),
            'totalItem' => Cart::totalItem(),
            'productName' => $product->name
        ]);
    }
}
