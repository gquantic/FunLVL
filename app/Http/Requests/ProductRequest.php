<?php

namespace App\Http\Requests;

class ProductRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                //'thumbnail'=>'required|image',
                'category_id'=>'required|int',
                'server_id'=>'required|int',
                'game_id'=>'required|int',
                'price'=>'required|numeric|min:0'
            ]
        );
    }
}
