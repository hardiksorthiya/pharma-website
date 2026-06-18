<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_link',
        'background_type',
        'background_image',
        'background_video',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getBackgroundImageUrlAttribute(): ?string
    {
        return $this->background_image
            ? asset('storage/'.$this->background_image)
            : null;
    }

    public function getBackgroundVideoUrlAttribute(): ?string
    {
        return $this->background_video
            ? asset('storage/'.$this->background_video)
            : null;
    }

    public function toHeroSlideArray(): array
    {
        return [
            'badge' => $this->subtitle,
            'title' => $this->title,
            'text' => $this->description,
            'button_text' => $this->button_text,
            'button_url' => $this->button_link,
            'background_image' => $this->background_image_url,
            'background_video' => $this->background_type === 'video'
                ? $this->background_video_url
                : null,
        ];
    }
}
