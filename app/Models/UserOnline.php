<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserOnline
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserOnline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOnline newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserOnline onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOnline query()
 * @method static \Illuminate\Database\Query\Builder|UserOnline withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserOnline withoutTrashed()
 * @mixin \Eloquent
 */
class UserOnline extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'user_online';

    protected $fillable = [
        'user_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return  $this->belongsToMany(User::class);
    }
}
