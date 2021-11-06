<?php

namespace App\Http\Controllers\admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Middleware\CheckPermission;
use App\Http\Requests\UpdateCouponRequest;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckPermission::class.':create-discount')->only('create','store');
        $this->middleware(CheckPermission::class.':update-discount')->only(['edit','update']);
        $this->middleware(CheckPermission::class.':delete-discount')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d');
        return view('admin.coupon.index',[
            'title' => 'لیست کد های تخفیف',
            'coupons' => Coupon::all(),
            'date' => $date
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create',[
            'title' => 'کد تخفیف',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        if($request->get('starts_at') >= date('d/m/Y')){
            if(($request->get('expires_at') == null || $request->get('starts_at') < $request->get('expires_at'))){
                Coupon::query()->create([
                    'name' => $request->get('name'),
                    'value' => $request->get('value'),
                    'starts_at' => $request->get('starts_at'),
                    'expires_at' => $request->get('expires_at')
                ]);
                return redirect(route('admin.coupon.index'));
            }
            return redirect(route('admin.coupon.create'))->withErrors([
                'starts_at' => 'تاریخ شروع باید قبل از شاریخ پایان باشد',
            ]);
        }
        return redirect(route('admin.coupon.create'))->withErrors([
            'starts_at' => 'تاریخ شروع باید بعد از تاریخ امروز باشد!',
        ]);
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
        return view('admin.coupon.edit',[
            'title' => $coupon->name,
            'coupon' => $coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        if($request->get('starts_at') >= date('d/m/Y')){
            if(($request->get('expires_at') == null || $request->get('starts_at') < $request->get('expires_at'))){
                $coupon->update([
                    'value' => $request->get('value'),
                    'starts_at' => $request->get('starts_at'),
                    'expires_at' => $request->get('expires_at')
                ]);
                return redirect(route('admin.coupon.index'));
            }
            return redirect(route('admin.coupon.edit',$coupon))->withErrors([
                'starts_at' => 'تاریخ شروع باید قبل از تاریخ پایان باشد',
            ]);
        }
        return redirect(route('admin.coupon.edit',$coupon))->withErrors([
            'starts_at' => 'تاریخ شروع باید بعد از تاریخ امروز باشد!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $date = date('Y-m-d');
        if($coupon -> expires_at > $date){
            return redirect(route('admin.coupon.index'))->withErrors(' کد تخفیف  '.$coupon->name.' نمی تواند حذف شود چون هنوز تاریخ پایان این کد نرسیده است .');
        }
        $coupon->delete();
        return redirect(route('admin.coupon.index'));

    }
}
