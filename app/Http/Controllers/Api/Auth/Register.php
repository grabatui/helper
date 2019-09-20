<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class Register extends Controller
{
    use RegistersUsers {
        RegistersUsers::register as parentRegister;
    }

    public function register(RegisterRequest $request)
    {
        return $this->parentRegister($request);
    }
}
