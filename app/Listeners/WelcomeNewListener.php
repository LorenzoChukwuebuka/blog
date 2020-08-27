<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewListener implements ShouldQueue
{


    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        sleep(10);
      //  Mail::to($event->customer->email())->send(new NewUserMail);
    }
}
