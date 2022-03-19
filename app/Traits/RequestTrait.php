<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait RequestTrait
{
    public function storeFileIfExists(string $field): array
    {
        $data = [];
        $file = $this->file($field);

        if ($file instanceof UploadedFile) {
            $path = $file->storePublicly('public/'.$field.'s');
            $data[$field.'_path'] = Str::replace('public','storage',$path);
        }

        return $data;
    }
}
