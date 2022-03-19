<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        $products = \App\Facades\Product::filter($request->all());

        return view('market',compact('products'));
    }
}
