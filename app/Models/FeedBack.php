<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FeedBack
 *
 * @property int $id
 * @property int $user_id
 * @property int $author_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack newQuery()
 * @method static \Illuminate\Database\Query\Builder|FeedBack onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedBack whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|FeedBack withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FeedBack withoutTrashed()
 * @mixin \Eloquent
 */
class FeedBack extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'author_id',
        'text'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
