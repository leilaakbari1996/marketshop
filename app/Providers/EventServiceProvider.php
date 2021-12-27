<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\OrderShipped;
use App\Listeners\SendShipmentNotification;
use App\Events\UserWasBanned;
use App\Listeners\EmailBanNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderShipped::class => [
            SendShipmentNotification::class,
        ],
        UserWasBanned::class => [
            EmailBanNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
    /**
     * Get the listener directories that should be used to discover events.
     *
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return [
            $this->app->path('Listeners'),
        ];
    }

}
