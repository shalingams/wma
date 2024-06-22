<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'user_id',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
