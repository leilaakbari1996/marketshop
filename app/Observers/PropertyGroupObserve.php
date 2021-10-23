<?php

namespace App\Observers;

use App\Models\PropertyGroup;

class PropertyGroupObserve
{
    /**
     * Handle the PropertyGroup "created" event.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return void
     */
    public function created(PropertyGroup $propertyGroup)
    {
        session()->flash('success',' گروه ویژگی '.$propertyGroup->name .'  با موفقیت اضاف شد ');
    }

    /**
     * Handle the PropertyGroup "updated" event.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return void
     */
    public function updated(PropertyGroup $propertyGroup)
    {
        session()->flash('success',' گروه ویژگی '.$propertyGroup->name .'  با موفقیت ویرایش  شد ');
    }

    /**
     * Handle the PropertyGroup "deleted" event.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return void
     */
    public function deleted(PropertyGroup $propertyGroup)
    {
        session()->flash('success',' گروه ویژگی '.$propertyGroup->name .'  با موفقیت حذف  شد ');
    }

    /**
     * Handle the PropertyGroup "restored" event.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return void
     */
    public function restored(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Handle the PropertyGroup "force deleted" event.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return void
     */
    public function forceDeleted(PropertyGroup $propertyGroup)
    {
        //
    }
}
