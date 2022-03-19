<?php

namespace App\Http\Requests;

class GameRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                'logo'=>'required|image',
                'banner'=>'required|image',
            ]
        );
    }
}
