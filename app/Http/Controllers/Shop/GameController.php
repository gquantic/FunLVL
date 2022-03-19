<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use App\Models\Shop\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('games',compact('games'));
    }

    public function show(int $gameId,Request $request)
    {
        $categoryId = $request->input('category_id');
        $game = Game::with(['products'=>function(HasMany $hasMany) use ($categoryId){
            $hasMany->whereNotNull('approved')->whereHas('hot')
                ->with('category')
                ->whereRelation('category',function(Builder $hasOne) use ($categoryId){
                        $hasOne->where(
                            'id',
                            $categoryId ?: '*'
                        );
                });
        }])->find($gameId);
        $categories = Category::all();

        return view('game',compact(
            'game',
            'categories'
        ));
    }
}
