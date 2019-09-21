<?php

namespace App\Listeners\User;

use App\Mail\UserRegistered;
use Illuminate\Auth\Events\Registered;
use Mail;

class SendNewUserEMail
{
    public function handle(Registered $event)
    {
        Mail::to($event->user->email)->send(new UserRegistered($event->user));
    }
}
