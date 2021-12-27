<?php

namespace App\Providers;

use App\Providers\UserWasBanned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailBanNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        //
    }
}
