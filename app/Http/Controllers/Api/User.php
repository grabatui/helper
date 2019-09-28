<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\JSON\Success;
use Auth;

class User extends Controller
{
    public function get()
    {
        return new Success(Auth::check() ? Auth::user()->id : null);
    }
}
