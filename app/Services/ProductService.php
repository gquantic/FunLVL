<?php

namespace App\Services;

use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductService
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model::whereApproved(1);
    }

    public function filter(array $params = [])
    {
        foreach (array_keys($params) as $key){
            if (method_exists($this, $key) && $params[$key]){
                call_user_func([$this,$key],$params[$key]);
            }
        }

        return $this->model->with('user')->get();
    }

    public function getByChatId($chatId)
    {
        return Product::whereHas('orders', function (Builder $builder) use ($chatId) {
            $builder->whereHas('chat', function (Builder $query) use ($chatId) {
                $query->where('id', $chatId);
            });
        })->with([
            'user' => function (BelongsTo $builder) {
                $builder->with(['feedbacks' => function (HasMany $query) {
                        $query->take(1);
                    }]
                );
            },
            'orders' => function (HasMany $builder) use ($chatId) {
                $builder->with(['chat' => function (HasOne $hasOne) use ($chatId){
                        $hasOne->with('messages');
                    }]
                )->whereHas('chat',function (Builder $d) use ($chatId){
                    $d->where('id',$chatId);
                });
            }
        ])->first();
    }

    protected function online($value)
    {
        $this->model->whereHas('user',function (Builder $query){
            $query->whereHas('online', function (Builder $builder){
                $builder->where('online', 1);
            });
        });
    }

    protected function verified($value)
    {
        $this->model->whereHas('user',function (Builder $query){
            $query->where('verified', 1);
        });
    }

    protected function description($value)
    {
        return $this->model->where(
            'description',
            'like',
            '%'.$value.'%'
        );
    }
}
