<?php

namespace App\Repository;

use App\Models\Setting;

class SettingsRepository
{
    public $settings;

    public function __construct()
    {
        $settings = Setting::all();

        foreach ($settings as $setting){
            $this->settings[$setting['name']] = $setting['value'];
        }
    }
}
