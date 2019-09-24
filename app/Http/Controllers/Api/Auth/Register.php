<?php

namespace App\Http\Controllers\Api\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Notifications\UserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

class Register extends Controller
{
    public function register(RegisterRequest $request)
    {
        event(new Registered($user = User::create($request->all())));

        $user->notify(new UserRegistered($user));

        return new JsonResponse();
    }
}
