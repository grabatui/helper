<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        AuthenticatesUsers::login as parentLogin;
    }

    public function username()
    {
        return 'email';
    }

    public function login(LoginRequest $request)
    {
        return $this->parentLogin($request);
    }
}
