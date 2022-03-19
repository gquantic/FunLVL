<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string|int|false name(string $name)
 * @method static string|int|false asset(string $name)
 */
class Setting extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'setting';
    }
}
