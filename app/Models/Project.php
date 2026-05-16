<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image',
        'client', 'location', 'category', 'project_date',
        'is_active', 'is_featured',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'is_featured'  => 'boolean',
        'project_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title) . '-' . Str::random(4);
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

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80&auto=format&fit=crop';
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function getExcerptShortAttribute(): string
    {
        return $this->excerpt ?? Str::limit(strip_tags($this->content), 130);
    }
}
