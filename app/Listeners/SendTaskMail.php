<?php

namespace App\Listeners;

use App\Events\EventTask;
use App\Mail\TestMail;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTaskMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventTask $event): void
    {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user ,$event->task));
    }
}
