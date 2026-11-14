<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalAudience extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'description',
        'hero_image',
        'hand_over_list',
        'get_back_list',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'hand_over_list' => 'array',
        'get_back_list' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Scope a query to only include published audiences.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Find a professional audience by slug.
     */
    public static function findBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }
}
