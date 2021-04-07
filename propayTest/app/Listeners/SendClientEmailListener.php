<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class SendClientEmailListener
{
    //Create the event listener.
    public function __construct()
    {
        //
    }

    //Handle the event.
    public function handle($event)
    {
        Mail::to($event->email)->send(new WelcomeMail());
    }
}
