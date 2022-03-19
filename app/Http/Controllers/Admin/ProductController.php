<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products',compact('products'));
    }

    public function view($id)
    {
        $product = Product::whereId($id)->first();

        return view('admin.forms.product-view',compact('product'));
    }

    public function approved($id): string
    {
        Product::whereId($id)->update(['approved'=>1]);

        return redirect()->route('admin.products')
            ->with('success',"Продукт одобрен");
    }

    public function unapproved($id): string
    {
        Product::whereId($id)->update(['approved'=>null]);

        return redirect()->route('admin.products')
            ->with('success',"Продукт отозван");
    }
}
