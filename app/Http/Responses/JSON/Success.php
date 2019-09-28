<?php

namespace App\Http\Responses\JSON;

class Success extends Base
{
    public function getType()
    {
        return 'success';
    }
}
