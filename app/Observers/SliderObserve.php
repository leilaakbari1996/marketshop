<?php

namespace App\Observers;

use App\Models\Slider;

class SliderObserve
{
    /**
     * Handle the Slider "created" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function created(Slider $slider)
    {
        session()->flash('success',' اسلایدر شماره ی '.$slider->id .'  با موفقیت اضاف شد ');
    }

    /**
     * Handle the Slider "updated" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        session()->flash('success',' اسلایدر شماره ی '.$slider->id .'  با موفقیت ویرایش شد ');
    }

    /**
     * Handle the Slider "deleted" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
        session()->flash('success',' اسلایدر شماره ی '.$slider->id .'  با موفقیت حذف شد ');
    }

    /**
     * Handle the Slider "restored" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function restored(Slider $slider)
    {
        //
    }

    /**
     * Handle the Slider "force deleted" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function forceDeleted(Slider $slider)
    {
        //
    }
}
