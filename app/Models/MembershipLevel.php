<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_text',
        'features',
        'color',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'features' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Get the pricing items for the membership level.
     */
    public function pricingItems()
    {
        return $this->hasMany(PricingItem::class);
    }

    /**
     * Scope a query to only include published levels.
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
     * Find a membership level by slug.
     */
    public static function findBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }
}
