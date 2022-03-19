<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * @method static string|int|false setUserId(int $userId)
 * @method static string|int|false setCurrentChatId(int $chatId)
 * @method static string|int|false addChatId(int $chatId)
 * @method static string|int|false decode(string $string)
 */
class Cookie extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'gamestore-cookie';
    }
}
