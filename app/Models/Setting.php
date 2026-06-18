<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'phone',
        'email',
        'address',
        'map_embed_url',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('storage/'.$this->logo) : null;
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon ? asset('storage/'.$this->favicon) : null;
    }

    public function getPhoneTelAttribute(): ?string
    {
        if (! $this->phone) {
            return null;
        }

        return 'tel:'.preg_replace('/[^\d+]/', '', $this->phone);
    }

    public function getWhatsappUrlAttribute(): ?string
    {
        if (! $this->phone) {
            return null;
        }

        $digits = preg_replace('/\D/', '', $this->phone);

        return $digits !== '' ? 'https://wa.me/'.$digits : null;
    }

    public function getMailtoAttribute(): ?string
    {
        return $this->email ? 'mailto:'.$this->email : null;
    }

    public function getMapSrcAttribute(): ?string
    {
        if (! $this->map_embed_url) {
            return config('app.google_map_url');
        }

        $value = trim($this->map_embed_url);

        if (preg_match('/src=["\']([^"\']+)["\']/', $value, $matches)) {
            return $matches[1];
        }

        return $value;
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'phone' => '+91 98765 43210',
            'email' => 'info@sanskrutipharma.com',
            'address' => "Sanskruti Pharma Pvt. Ltd.,\n123, Pharma City, Hyderabad,\nTelangana, India - 500085",
            'map_embed_url' => config('app.google_map_url'),
        ]);
    }
}
