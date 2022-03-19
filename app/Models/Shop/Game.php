<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\ModelTrait;


class Game extends Model
{
    use HasFactory,SoftDeletes,ModelTrait;

    protected $fillable  = [
        'name',
        'logo_path',
        'banner_path',
        'description'
    ];

    public function setLogoPathAttribute($value)
    {
        $this->attributes['logo_path']  = Str::replace('public','storage',$value);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
