<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Balance
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Balance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Balance newQuery()
 * @method static \Illuminate\Database\Query\Builder|Balance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Balance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Balance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Balance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Balance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Balance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Balance whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Balance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Balance withoutTrashed()
 * @mixin \Eloquent
 */
class Balance extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'balance'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    static function add($userId, $amount)
    {
        if ($balance = self::forUserId($userId)){
            self::whereUserId($userId)->update(
                ['balance'=>$balance+$amount]
            );

            return $balance+$amount;
        }
        self::create(
            [
                'user_id'=>$userId,
                'balance'=>$amount
            ]
        );

        return $amount;
    }

    static function minus($userId, $amount)
    {
        if (($balance = self::forUserId($userId)) > $amount){
            self::whereUserId($userId)->update(
                ['balance'=>$balance-$amount]
            );

            return $balance-$amount;
        }

        return new \Exception('Not enough money');
    }

    static function forUserId($userId)
    {
        return Balance::whereUserId($userId)->pluck('balance')
            ->first() ?? 0;
    }
}
