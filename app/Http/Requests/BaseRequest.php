<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    use RequestTrait;

    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required'
        ];
    }
}
