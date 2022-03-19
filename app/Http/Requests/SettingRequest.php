<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SettingRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getSetting(string $name, $value): array
    {
        if ($value instanceof UploadedFile){
            $data = $this->saveFile($name, $value);
        } else {
            $data = compact('value','name');
        }

        return $data;
    }

    protected function saveFile(string $name, UploadedFile $file): array
    {
        $value = $file->storePublicly('public/settings');
        $value = Str::replace('public/','',$value);

        return compact('name','value');
    }
}
