<?php

namespace App\Models;

use App\Traits\RatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserRating
 *
 * @property int $id
 * @property int $user_id
 * @property int $stars_count
 * @property int $votes_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserRating onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereStarsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereVotesCount($value)
 * @method static \Illuminate\Database\Query\Builder|UserRating withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserRating withoutTrashed()
 * @mixin \Eloquent
 */
class UserRating extends Model
{
    use HasFactory,SoftDeletes,RatingTrait;

    protected $fillable = [
        'user_id',
        'stars_count',
        'votes_count'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return  $this->belongsToMany(User::class);
    }
}
