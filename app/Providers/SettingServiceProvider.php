<?php

namespace App\Providers;

use App\Repository\SettingsRepository;
use App\Services\SettingService;
use Carbon\Laravel\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('setting', SettingService::class);
    }
}
