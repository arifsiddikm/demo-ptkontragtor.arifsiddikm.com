<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title', 'department', 'location', 'type', 'description',
        'requirements', 'salary_range', 'deadline', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deadline' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'full-time' => 'Full Time',
            'part-time' => 'Part Time',
            'contract' => 'Contract',
            'internship' => 'Internship',
            default => ucfirst($this->type),
        };
    }
}
