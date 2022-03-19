<?php

namespace App\Http\Controllers;

use App\Facades\Setting;
use App\Models\Shop\Category;
use App\Models\Shop\Game;
use App\Models\Shop\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $game = Game::find(Setting::name('home_game_id'));
        $products = Product::whereApproved(1)
            ->whereHas('hot')->with('user')
            ->get();

        return view('index', compact(
            'categories',
            'products',
            'game'
        ));
    }
}
