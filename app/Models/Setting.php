<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'shop_shopify_id',
        'general',
    ];

    protected $casts = [
        'general' => 'json',
    ];


    public function shop(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
