<?php

namespace App\View\Components;

use App\Facades\Cookie;
use Illuminate\View\Component;

class Footer extends Component
{
    public $buyersMenuItems = [
        'balance'=>'Пополнение счета',
        'games'=>'Список игр',
        'research'=>'Поиск по играм',
        'propose'=>'Предложение о покупке'
    ];

    public $sellerMenuItems = [
        'account_sell'=>'Продажа аккаунта',
        'resource_sell'=>'Продажа ресурсов'
    ];

    public $infoMenuItems = [
        'safe_deal'=>'Безопасная сделка',
        'sell_rules'=>'Правила продажи',
        'contacts'=>'Контактные данные'
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
