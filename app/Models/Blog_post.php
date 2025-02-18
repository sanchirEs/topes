<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog_post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'slug',
        'content',
        'picture',
        'status',
    ];

    public function Blog_gallery():HasMany
    {
        return $this->HasMany(Blog_gallery::class);
    }
}
