<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Shop\Hot
 *
 * @property int $id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Hot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hot newQuery()
 * @method static \Illuminate\Database\Query\Builder|Hot onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Hot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hot whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hot whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Hot withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Hot withoutTrashed()
 * @mixin \Eloquent
 */
class Hot extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =  [
        'product_id'
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return  $this->belongsToMany(Product::class);
    }
}
