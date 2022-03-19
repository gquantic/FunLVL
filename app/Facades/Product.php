<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string|int|false filter(array $params = [])
 * @method static string|int|false getByChatId(int $chatId)
 */
class Product extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'product';
    }
}
