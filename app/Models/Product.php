<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'product_category_id',
        'product_sub_category_id',
        'title',
        'slug',
        'cas_no',
        'end_use',
        'available_strengths',
        'packing',
        'meta_title',
        'meta_description',
        'keywords',
        'feature_image',
    ];

    public function getFeatureImageUrlAttribute(): ?string
    {
        if ($this->feature_image) {
            return asset('storage/'.$this->feature_image);
        }

        return Setting::current()->logo_url;
    }

    public function usesDefaultFeatureImage(): bool
    {
        return ! $this->feature_image;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
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

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'product_specification');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
