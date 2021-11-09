<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponClientRequest;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
        $date = date('d/m/Y');
        return view('client.coupons',[
            'title' => 'کد تخفیف',
            'coupons' => Coupon::query()->where('expires_at',' > ',$date)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponClientRequest $request)
    {
        $coupon = Coupon::query()->where('name',$request->get('coupon'))->first();
        $date = date('d/m/Y');
        if($coupon == null){
           $msg = 'کد تخفیف شما نا معتبر می باشد.';
           $value = 0;
        }
        elseif($coupon->expires_at < $date && $coupon->expires_at != null){
            $msg = 'کد تخفیف شما منقضی شده است.';
            $value = 0;
        }
        else{
            $msg = 'کد تخفیف شما با موفقیت اعمال شد.';
            $value = $coupon->value;
        }
        return response([
            'msg' => $msg,
            'totalPriceWithDiscount' => Cart::totalPriceWithDiscount() - $value,
            'gift' => Cart::totalPrice() - Cart::totalPriceWithDiscount() + $value,
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
