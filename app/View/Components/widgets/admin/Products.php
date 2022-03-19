<?php

namespace App\View\Components\widgets\admin;

use App\Models\Shop\Product;
use Illuminate\View\Component;

class Products extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->products = Product::all()->whereNull('approved');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widgets.admin.products');
    }
}
