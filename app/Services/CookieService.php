<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CookieService
{
    const ALGO = 'rc4';
    const PASS = 'cat';

    public function setUserId($userId)
    {
        $cookieUserId = isset($_COOKIE['userdata']) ?
            ($this->decode($_COOKIE['userdata'])['user_id'] ?? false) : false;

        if (!$cookieUserId || $cookieUserId !== Auth::id()) {
            setcookie('userdata', $this->encode($userId), 0, '/');
        }
    }

    public function setCurrentChatId($chatId)
    {
        setcookie('chatdata', $this->encode($chatId),0,'/');
    }

    public function addChatId($chatId)
    {

    }

    private function encode($data)
    {
        return openssl_encrypt($data,self::ALGO,self::PASS);
    }

    public function decode($string)
    {
        return openssl_decrypt($string,self::ALGO,self::PASS);
    }
}
