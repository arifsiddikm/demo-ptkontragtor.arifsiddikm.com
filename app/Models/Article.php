<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'author', 'is_active', 'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title) . '-' . Str::random(4);
            }
            if (empty($model->published_at)) {
                $model->published_at = now();
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/article-placeholder.jpg');
        }
        // If image is an external URL (http/https), return as-is
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function getExcerptShortAttribute(): string
    {
        return $this->excerpt ?? Str::limit(strip_tags($this->content), 120);
    }
}
