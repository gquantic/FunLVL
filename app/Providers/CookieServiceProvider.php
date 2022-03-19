<?php

namespace App\Providers;

use App\Services\CookieService;
use Illuminate\Support\ServiceProvider;

class CookieServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('gamestore-cookie', CookieService::class);
    }
}
