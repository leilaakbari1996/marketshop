<?php

namespace App\Observers;

use App\Models\ProductProperty;

class ProductPropertyObserve
{
    /**
     * Handle the ProductProperty "created" event.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return void
     */
    public function created(ProductProperty $productProperty)
    {
        session()->flash('success','ویژگی '.$productProperty->property().' مربوط به محصول '.$productProperty->product()->name.' با موفقیت اضاف شد.');
    }

    /**
     * Handle the ProductProperty "updated" event.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return void
     */
    public function updated(ProductProperty $productProperty)
    {
        session()->flash('success','ویژگی '.$productProperty->property().' مربوط به محصول '.$productProperty->product()->name.' با موفقیت ویرایش شد.');
    }

    /**
     * Handle the ProductProperty "deleted" event.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return void
     */
    public function deleted(ProductProperty $productProperty)
    {
        session()->flash('success','ویژگی '.$productProperty->property().' مربوط به محصول '.$productProperty->product()->name.' با موفقیت حذف شد.');
    }

    /**
     * Handle the ProductProperty "restored" event.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return void
     */
    public function restored(ProductProperty $productProperty)
    {
        //
    }

    /**
     * Handle the ProductProperty "force deleted" event.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return void
     */
    public function forceDeleted(ProductProperty $productProperty)
    {
        //
    }
}
