<?php

namespace App\Listeners;

use App\Events\ClientCreated;
use App\Mail\ClientWelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailNotification implements ShouldQueue
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
     * @param  \App\Events\ClientCreated  $event
     * @return void
     */
    public function handle(ClientCreated $event)
    {

        Mail::to($event->clientEmail)->send(new ClientWelcomeMail());
    }
}
