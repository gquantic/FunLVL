<?php

namespace App\Traits;

trait ModelTrait
{
    public function setAttributes(array $attributes = [], $options = [])
    {
        foreach ($attributes as $key => $value){
            if (in_array($key,$this->fillable))
                $this->setAttribute($key,$value);
        }

        return $this;
    }
}
