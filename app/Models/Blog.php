<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'keywords',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return asset('storage/'.$this->image);
    }

    public function getExcerptAttribute(): ?string
    {
        if (! $this->description) {
            return null;
        }

        return Str::limit(strip_tags($this->description), 120);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_category');
    }
}
