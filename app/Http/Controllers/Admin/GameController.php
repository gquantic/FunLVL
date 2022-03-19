<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Shop\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::withTrashed()->get();

        return view('admin.games', compact('games'));
    }


    public function create()
    {
        return view('admin.forms.create-game');
    }

    public function store(GameRequest $request): \Illuminate\Http\RedirectResponse
    {
        Game::create(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo'),
                $request->storeFileIfExists('banner')
            )
        );

        return redirect()->route('admin.games.index')
            ->with('success','Данные сохранены');
    }

    public function show(int $id)
    {

    }

    public function edit($id)
    {
        $game = Game::whereId($id)->first();

        return view('admin.forms.edit-game', compact('game'));
    }

    public function update(GameRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Game::find($id)->setAttributes(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('logo'),
                $request->storeFileIfExists('banner')
            )
        )->save();

        return redirect()->route('admin.games.index')
            ->with('success','Данные обновлены');
    }

    public function destroy(int $server, int $type): \Illuminate\Http\RedirectResponse
    {
        $type ? Game::whereId($server)->delete()
            : Game::whereId($server)->forceDelete();

        return redirect()->back()
            ->with('success','Игра скрыта');
    }

    public function restore($id): \Illuminate\Http\RedirectResponse
    {
        Game::whereId($id)->restore();

        return redirect()->back()
            ->with('success','Игра восстановлена');
    }
}
