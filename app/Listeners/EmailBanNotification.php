<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class EmailBanNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        var_dump('you are '.$event->user->email);
    }
}
