<?php

namespace App\Http\Requests;

class ServerRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            parent::rules(),
            ['logo'=>'required|image']
        );
    }
}
