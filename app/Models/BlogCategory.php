<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return asset('storage/'.$this->image);
    }

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category');
    }
}
