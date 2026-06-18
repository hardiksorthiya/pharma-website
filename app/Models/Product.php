<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cas_no',
        'end_use',
        'meta_title',
        'meta_description',
        'keywords',
        'feature_image',
    ];

    public function getFeatureImageUrlAttribute(): ?string
    {
        if (! $this->feature_image) {
            return null;
        }

        return asset('storage/'.$this->feature_image);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function dosageTypes(): BelongsToMany
    {
        return $this->belongsToMany(DosageType::class, 'product_dosage_type');
    }

    public function therapeuticClasses(): BelongsToMany
    {
        return $this->belongsToMany(TherapeuticClass::class, 'product_therapeutic_class');
    }

    public function packings(): BelongsToMany
    {
        return $this->belongsToMany(Packing::class, 'product_packing');
    }

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'product_specification');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
