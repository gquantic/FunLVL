<?php

namespace App\Sockets;

use App\Facades\Cookie;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Shop\Order;
use App\Models\User;
use App\Models\UserOnline;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class ChatSocket implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
    }

    function onOpen(ConnectionInterface $conn)
    {
        $conn->userdata = $this->cookies($conn);
        $this->clients->attach($conn);
        $this->online($conn);// php-8.0 artisan chat:start
    }

    /**
     * @throws \Throwable
     */
    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        UserOnline::whereUserId($conn->userdata['userdata'])->delete();
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        $currentChatId = $from->userdata['chatdata'];

        $sellerId = User::whereRelation('products',function (Builder $query) use ($currentChatId){
            $query->whereRelation('orders', function (Builder $many) use ($currentChatId){
                $many->whereRelation('chat', function (Builder $one) use ($currentChatId){
                    $one->where('id', $currentChatId);
                });
            });
        })->first()->id;

        $buyerId = Order::whereRelation('chat', function (Builder $builder) use ($currentChatId){
            $builder->where('id', $currentChatId);
        })->first()->user_id;

        foreach ($this->clients as $client){
            if ($sellerId === $client->userdata['userdata'] || $buyerId  === $client->userdata['userdata'])
                $client->send(json_encode(
                    [
                        'author'=> User::find($from->userdata['userdata'])->name,
                        'chat'=>$currentChatId,
                        'message'=>$msg,
                        'link'=>route('chat', ['chat'=>$currentChatId]),
                        'date'=>Carbon::now(),
                        'author_id'=> $from->userdata['userdata']
                    ]
                ));
        }

        Message::create(
            [
                'chat_id'=>$currentChatId,
                'user_id'=>$from->userdata['userdata'],
                'message'=>$msg
            ]
        );
    }

    protected function online($conn)
    {
        if (!is_null(UserOnline::whereUserId($conn->userdata['userdata'])->withTrashed()->first())){
            UserOnline::whereUserId($conn->userdata['userdata'])->restore();
        }else {
            UserOnline::create(
                ['user_id' => $conn->userdata['userdata']]
            );
        }
    }

    protected function cookies(ConnectionInterface $conn)
    {
        $userdata = [];
        $cookies = $conn->httpRequest->getHeader('Cookie');
        $cookies = explode(';', $cookies[0]);

        foreach ($cookies as $cookie){
            $parts = explode('=',$cookie);

            if (trim($parts[0]) == 'userdata' || trim($parts[0]) == 'chatdata') {
                $userdata[trim($parts[0])] = (int) Cookie::decode($parts[1]);
            }
        }

        return $userdata;
    }
}
