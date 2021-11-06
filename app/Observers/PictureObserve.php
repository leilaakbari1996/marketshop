<?php

namespace App\Observers;

use App\Models\Picture;

class PictureObserve
{
    /**
     * Handle the Picture "created" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function created(Picture $picture)
    {
        session()->flash('success','تصویر گالری محصول '.$picture->product->name.' با موفقیت ثبت شد.');
    }

    /**
     * Handle the Picture "updated" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function updated(Picture $picture)
    {
        //
    }

    /**
     * Handle the Picture "deleted" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function deleted(Picture $picture)
    {
        session()->flash('success','تصویر گالری محصول '.$picture->product->name.' با موفقیت حذف شد.');
    }

    /**
     * Handle the Picture "restored" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function restored(Picture $picture)
    {
        //
    }

    /**
     * Handle the Picture "force deleted" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function forceDeleted(Picture $picture)
    {
        //
    }
}
