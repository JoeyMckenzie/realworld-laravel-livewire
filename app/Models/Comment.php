<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo<Article, Comment>
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
