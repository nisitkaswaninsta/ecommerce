<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\OrderConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmedMail;

class SendConfirmationMail
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        Mail::to($event->order->user)->send(new OrderConfirmedMail);
    }
}
