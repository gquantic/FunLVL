<?php

namespace App\Http\Requests;

class CategoryRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            parent::rules(),
            ['logo'=>'required|image']
        );
    }
}
