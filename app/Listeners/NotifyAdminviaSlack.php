<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminviaSlack
{

    public function handle(NewCustomerHasRegisteredEvent $event)
    {
         dump('slack message here');
    }
}
