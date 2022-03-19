<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Balance;
use App\Models\Chat;
use App\Models\FeedBack;
use App\Models\Message;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ChatController extends Controller
{
    public function chat($chatId)
    {
        $product = \App\Facades\Product::getByChatId($chatId);

        \App\Facades\Cookie::setCurrentChatId($chatId);

        if ($product)
            $this->setCookie($chatId);

        if ($product->user->id !== Auth::id()) {
            $withName = $product->user->name;
        } else {
            $withName = User::whereRelation('orders', function (Builder $builder) use ($chatId) {
                $builder->whereRelation('chat', function (Builder $b) use ($chatId) {
                    $b->where('id', $chatId);
                });
            })->first()->name;
        }

        return view('chat', compact('product', 'chatId', 'withName'));
    }

    public function messages()
    {
        $chats = Chat::with(['messages' => function (HasMany $builder) {
            $builder->take(1);
        }])->whereRelation('order', function (Builder $builder) {
            $builder->whereRelation('product', function (Builder $query) {
                $query->where('user_id', Auth::id());
            });
        })->orWhereRelation('order', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        })->get();

        return view('messages', compact('chats'));
    }

    public function start($productId): \Illuminate\Http\RedirectResponse
    {
        if (Product::find($productId)->user_id === Auth::id())
            return redirect()->back()->withErrors('Начать чат с собой невозможно!');

        $chat = Order::create(
            [
                'product_id' => $productId,
                'user_id' => Auth::id()
            ]
        )->chat()->create();


        return redirect()->route('chat', ['chat' => $chat->id]);
    }

    public function messagesApi($chatId)
    {
        $messages = Message::whereChatId($chatId)->get();

        return MessageResource::collection($messages);
    }

    public function setCookie($chatId)
    {
        if (!$this->issetChatIdFromCookie($chatId)) {
            $chatsData = base64_decode(Cookie::get('access'));
            $chatsData[$chatId] = Auth::id();

            Cookie::queue(
                'access',
                base64_encode($chatsData));

            Cookie::queue(
                'current',
                base64_encode($chatId)
            );
        }
    }

    public function issetChatIdFromCookie($chatId): bool
    {
        $cookie = Cookie::get('access');

        if (!$cookie)
            return false;

        $chatsData = base64_decode($cookie);

        return isset($chatsData[$chatId]);
    }

    public function spend($chatId)
    {
        $product = \App\Facades\Product::getByChatId($chatId);
        $order = Order::whereRelation('chat', function (Builder $hasOne) use ($chatId) {
            $hasOne->where('id', $chatId);
        })->first();
        $balance = Balance::forUserId($order->user_id);

        if ($balance < $product->price)
            return redirect()->route('balance');

        Balance::add($product->user_id, $product->price);
        Balance::minus($order->user_id, $product->price);

        return redirect()->route('feedback',['chat'=>$chatId])->with('access', 'Оплачено!');
    }

    public function feedback($chatId)
    {
        return view('feedback', compact('chatId'));
    }

    public function feedback_post($chatId, Request $request)
    {
        if (!$request->input('description'))
            return redirect()->route('history');

        $sellerId = User::whereRelation('products', function (Builder $query) use ($chatId) {
            $query->whereRelation('orders', function (Builder $many) use ($chatId) {
                $many->whereRelation('chat', function (Builder $one) use ($chatId) {
                    $one->where('id', $chatId);
                });
            });
        })->first()->id;

        $buyerId = Order::whereRelation('chat', function (Builder $builder) use ($chatId) {
            $builder->where('id', $chatId);
        })->first()->user_id;

        FeedBack::create(
            [
                'user_id' => $sellerId,
                'author_id' => $buyerId,
                'text' => $request->input('description'),
            ]
        );

        return redirect()->route('history');
    }
}
