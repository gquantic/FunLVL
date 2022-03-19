<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'description'=>'required',
            'avatar'=>'required|image',
        ];
    }
}
