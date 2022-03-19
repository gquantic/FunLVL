<?php

namespace App\Http\Requests;

class ArticleRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            parent::rules(),
            ['thumbnail'=>'required|image']
        );
    }
}
