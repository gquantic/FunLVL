<?php

namespace App\Services;

use App\Models\Setting;
use App\Repository\SettingsRepository;

class SettingService
{
    private $settings;

    public function __construct(SettingsRepository $repository)
    {
        $this->settings = $repository->settings;
    }

    public function name(string $name)
    {
        return $this->settings[$name] ?? false;
    }

    public function asset(string $name): string
    {
        return asset('storage/'.$this->name($name));
    }
}
