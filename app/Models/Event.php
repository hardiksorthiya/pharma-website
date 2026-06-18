<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(EventImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function getExcerptAttribute(): ?string
    {
        if (! $this->description) {
            return null;
        }

        return Str::limit(strip_tags($this->description), 20);
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        $image = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->first();

        return $image?->image_url;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
