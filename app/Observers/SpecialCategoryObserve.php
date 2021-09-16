<?php

namespace App\Observers;

use App\Models\Specialcategory;

class SpecialCategoryObserve
{
    /**
     * Handle the Specialcategory "created" event.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return void
     */
    public function created(Specialcategory $specialcategory)
    {
        session()->flash('success',' دسته بندی ویژه '.$specialcategory->category->name .'  با موفقیت ثبت شد ');
    }

    /**
     * Handle the Specialcategory "updated" event.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return void
     */
    public function updated(Specialcategory $specialcategory)
    {
        session()->flash('success',' دسته بندی ویژه '.$specialcategory->category->name .'  با موفقیت ویرایش شد ');
    }

    /**
     * Handle the Specialcategory "deleted" event.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return void
     */
    public function deleted(Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Handle the Specialcategory "restored" event.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return void
     */
    public function restored(Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Handle the Specialcategory "force deleted" event.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return void
     */
    public function forceDeleted(Specialcategory $specialcategory)
    {
        //
    }
}
