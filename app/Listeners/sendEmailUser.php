<?php

namespace App\Listeners;

use App\Events\sendEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendEmailUser
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
     * @param  \App\Events\sendEmail  $event
     * @return void
     */
    public function handle(sendEmail $event)
    {
        $user = User::find($event->userId)->toArray();

        Mail::send('mailExample', $user, function($message) use ($user) {
        $message->to($user['email']);
        $message->subject('Event Testing');
        });
    }
}
