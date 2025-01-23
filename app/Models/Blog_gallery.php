<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog_gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_post_id',
        'picture'
    ];

    public function Blog_post():BelongsTo
    {
        return $this->belongsTo(Blog_post::class);
    }
}
