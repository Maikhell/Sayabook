<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;

    // Add all fillable fields from your form and migration
    protected $fillable = [
        'user_id',
        'book_title',
        'book_author',
        'book_description',
        'book_cover',
        'book_status',
        'book_category',
        'book_genre',
        'book_privacy',
        'book_online_link',
        'date_added'
    ];

    /**
     * Get the user that owns the book (the inverse of the one-to-many relationship).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
