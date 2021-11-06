<?php

namespace App\Observers;

use App\Models\Coupon;

class CouponObserve
{
    /**
     * Handle the Coupon "created" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function created(Coupon $coupon)
    {
        session()->flash('success','کد تخفیف '.$coupon->name.' با موفقیت ثبت شد .');
    }

    /**
     * Handle the Coupon "updated" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function updated(Coupon $coupon)
    {
        session()->flash('success','کد تخفیف '.$coupon->name.' با موفقیت ویرایش شد .');
    }

    /**
     * Handle the Coupon "deleted" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function deleted(Coupon $coupon)
    {
        session()->flash('success','کد تخفیف '.$coupon->name.' با موفقیت حذف شد .');
    }

    /**
     * Handle the Coupon "restored" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function restored(Coupon $coupon)
    {
        //
    }

    /**
     * Handle the Coupon "force deleted" event.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function forceDeleted(Coupon $coupon)
    {
        //
    }
}
