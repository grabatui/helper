<?php

namespace App\Http\Controllers\Api\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Responses\JSON\Success;
use App\Notifications\UserRegistered;
use Auth;
use Illuminate\Auth\Events\Registered;

class Register extends Controller
{
    public function register(RegisterRequest $request)
    {
        event(new Registered($user = User::create($request->all())));

        $user->notify(new UserRegistered($user));

        Auth::guard()->login($user);

        return new Success();
    }
}
