<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\ClientRegisteredEvent;
use App\Listeners\SendClientEmailListener;

class EventServiceProvider extends ServiceProvider
{
    //The event listener mappings for the application.
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ClientRegisteredEvent::class => [
            SendClientEmailListener::class,
        ],
    ];

    //Register any events for your application.
    public function boot()
    {
        //
    }
}
