<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'ticket_category_id',
        'name',
        'description'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(TicketCategory::class, 'ticket_category_id','id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(TicketCategory::class);
    }
}
