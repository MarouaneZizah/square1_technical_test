<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'publication_date',
        'user_id',
    ];

    protected $casts = [
        'publication_date' => 'datetime'
    ];

    protected $appends = [
        'short_description',
    ];

    public function getShortDescriptionAttribute(): string
    {
        if (!$this->description) {
            return "";
        }

        return Str::limit($this->description, 200);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
