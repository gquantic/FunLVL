<?php

namespace App\Models\Shop;

use App\Models\User;
use App\Traits\ModelTrait;
use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * App\Models\Shop\Product
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $server_id
 * @property int $game_id
 * @property string $name
 * @property string $description
 * @property int|null $approved
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $os_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Shop\Category $category
 * @property-read mixed $os
 * @property-read \App\Models\Shop\Hot|null $hot
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\Shop\Server $server
 * @property-write mixed $thumbnail_path
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereServerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory,SoftDeletes,ProductTrait,ModelTrait;

    protected $fillable  = [
        'user_id',
        'category_id',
        'name',
        'description',
        'approved',
        'price',
        'server_id',
        'game_id',
        'os_id'
    ];

    protected $os = [];

    public function __construct(array $attributes = [])
    {
        $this->os = Config::get('app.os');
        parent::__construct($attributes);
    }
    public function setThumbnailPathAttribute($value): void
    {
        $this->attributes['thumbnail_path']  = Str::replace('public','storage',$value);
    }

    public function getOsAttribute()
    {
        return $this->os[$this->attributes['os_id']] ?? 'XX';
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function server(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Server::class);
    }

    public function game(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Game::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Order::class);
    }

    public function hot(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return  $this->hasOne(Hot::class);
    }
}
