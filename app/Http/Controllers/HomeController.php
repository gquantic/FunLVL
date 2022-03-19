<?php

namespace App\Http\Controllers;

use App\Facades\Setting;
use App\Models\Shop\Game;
use App\Models\Shop\Product;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $products = Product::all();

        return view('home',compact(
            'games',
            'products'
        ));
    }
}
