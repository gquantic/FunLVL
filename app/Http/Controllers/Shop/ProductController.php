<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\Category;
use App\Models\Shop\Game;
use App\Models\Shop\Product;
use App\Models\Shop\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = \App\Facades\Product::filter($request->all());

        return view('products',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $servers = Server::all();
        $games  = Game::all();

        return view('create-product',compact(
            'categories',
            'servers',
            'games'
        ));
    }

    public function store(ProductRequest $request)
    {
        Product::create(
            array_merge(
                $request->all(),
                $request->storeFileIfExists('thumbnail'),
                ['user_id'=>Auth::id()]
            )
        );

        return redirect()->back()
            ->with('success','Товар создан и ожидает одобрения от администрации');
    }

    public function show($id)
    {
        $product = Product::whereId($id)->with('user')
            ->first();

        return view('product',compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $servers = Server::all();
        $games  = Game::all();
        $product = Product::whereId($id)->with('user')
            ->get();

        return view('edit-product',compact(
            'categories',
            'servers',
            'games',
            'product'
        ));
    }

    public function update(ProductRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Product::whereId($id)->update(
            array_merge(
                $request->all(
                    [
                        'name',
                        'server_id',
                        'game_id',
                        'os_id',
                        'description'
                    ]
                ),
                $request->storeFileIfExists('thumbnail')
            )
        );

        return redirect()->back();
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        Product::whereId($id)->delete();

        return redirect()->back();
    }
}
