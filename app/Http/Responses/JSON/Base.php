<?php

namespace App\Http\Responses\JSON;

use Illuminate\Http\JsonResponse;

abstract class Base extends JsonResponse
{
    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        parent::__construct($this->formatData($data), $status, $headers, $options);
    }

    abstract function getType();

    protected function formatData($data = null)
    {
        return [
            'type' => $this->getType(),
            'value' => $data,
        ];
    }
}
