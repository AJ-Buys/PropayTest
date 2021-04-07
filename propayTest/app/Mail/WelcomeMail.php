<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    //Create a new message instance.
    public function __construct()
    {
        //
    }

    //Build the message.
    public function build()
    {
        return $this->from('propayTest@gmail.com')
                    ->subject('Welcome to the family')
                    ->markdown('email.welcome');
    }
}
