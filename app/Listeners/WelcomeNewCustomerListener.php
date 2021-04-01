<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewCustomerListener implements ShouldQueue
{
    // $ php artisan  queue:work&
    // php artisan config:cache
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);
       Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
    }
}
