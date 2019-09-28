<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\JSON\Success;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class Login extends Controller
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

    protected function authenticated(Request $request, $user)
    {
        return new Success();
    }
}
