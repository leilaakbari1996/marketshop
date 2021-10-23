<?php

namespace App\Observers;

use App\Models\suport;

class SuportObserve
{
    /**
     * Handle the suport "created" event.
     *
     * @param  \App\Models\suport  $suport
     * @return void
     */
    public function created(suport $suport)
    {
        session()->flash('success','  ');
    }

    /**
     * Handle the suport "updated" event.
     *
     * @param  \App\Models\suport  $suport
     * @return void
     */
    public function updated(suport $suport)
    {
        session()->flash('success','  عملیات شما با موفقیت انجام شد. ');
    }

    /**
     * Handle the suport "deleted" event.
     *
     * @param  \App\Models\suport  $suport
     * @return void
     */
    public function deleted(suport $suport)
    {
        //
    }

    /**
     * Handle the suport "restored" event.
     *
     * @param  \App\Models\suport  $suport
     * @return void
     */
    public function restored(suport $suport)
    {
        //
    }

    /**
     * Handle the suport "force deleted" event.
     *
     * @param  \App\Models\suport  $suport
     * @return void
     */
    public function forceDeleted(suport $suport)
    {
        //
    }
}
