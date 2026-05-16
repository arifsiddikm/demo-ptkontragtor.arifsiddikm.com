<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Equipment extends Model
{
    protected $fillable = [
        'name', 'slug', 'category', 'description', 'specifications',
        'image', 'status', 'is_featured', 'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name) . '-' . Str::random(4);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/equipment-placeholder.jpg');
        }
        // If image is an external URL (http/https), return as-is
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
}
