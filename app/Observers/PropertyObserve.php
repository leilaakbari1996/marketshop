<?php

namespace App\Observers;

use App\Models\Property;

class PropertyObserve
{
    /**
     * Handle the Property "created" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        session()->flash('success',' گروه ویژگی '.$property->name .'  با موفقیت اضاف شد ');
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        session()->flash('success',' گروه ویژگی '.$property->name .'  با موفقیت ویرایش شد ');
    }

    /**
     * Handle the Property "deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        session()->flash('success',' گروه ویژگی '.$property->name .'  با موفقیت حذف شد ');
    }

    /**
     * Handle the Property "restored" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
