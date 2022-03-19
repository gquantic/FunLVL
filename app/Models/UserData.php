<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserData
 *
 * @property int $id
 * @property int $user_id
 * @property string $avatar
 * @property string $description
 * @property string $header
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UserData withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserData withoutTrashed()
 * @mixin \Eloquent
 */
class UserData extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'avatar_path',
        'verified',
        'description'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
