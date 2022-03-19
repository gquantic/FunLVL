<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index($id)
    {
        $user = User::whereId($id)->with([
            'products'=>function (HasMany $builder){
                $builder->take(2);
            },
            'feedbacks'=>function (HasMany $builder){
                $builder->take(2);
            },
        ])->first();

        return  view('seller',compact('user'));
    }

    public function feedbacks($sellerId)
    {
        $feedbacks = FeedBack::whereUserId($sellerId)->with('authors')
            ->get();
    }

    public function products($sellerId)
    {
        $products = Product::whereUserId($sellerId)->get();
    }

    public function feedbackForm()
    {}

    public function addFeedback(Request $request, $id)
    {
        FeedBack::create(
            [
                'user_id'=>$id,
                'author_id'=>Auth::id(),
                'text'=>$request->input('text')
            ]
        );
    }
}
