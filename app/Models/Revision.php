<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Revision extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'summary',
        'edited_at',
        'edited_by',
        'article_id',
    ];

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
