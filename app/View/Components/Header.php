<?php

namespace App\View\Components;

use App\Models\Shop\Order;
use App\Models\User;
use App\Models\UserOnline;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class Header extends Component
{
    public $menuItems;

    private $guestMenuItems = [
        'login'  => 'Вход',
        'register'=>'Регистрация'
    ];

    private $userMenuItems = [
        'history'=>'История сделок',
        'messages'=>'Сообщения',
        'balance'=>'Финансы',
        'market'=>'Биржа',
        'profile'=>'Мой профиль',
        'logout'=>'Выйти'
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuItems = Auth::check() ?
            $this->userMenuItems :
            $this->guestMenuItems;

        if (Auth::check()) {
            \App\Facades\Cookie::setUserId(Auth::id());
        }else{
            \App\Facades\Cookie::setUserId('');
            \App\Facades\Cookie::setCurrentChatId('');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
