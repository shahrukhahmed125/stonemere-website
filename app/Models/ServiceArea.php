<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'number',
        'short_description',
        'hero_image',
        'page_content',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'page_content' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Get the services for the service area.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the scenarios for the service area.
     */
    public function scenarios()
    {
        return $this->hasMany(ServiceScenario::class);
    }

    /**
     * Get the timeline items for the service area.
     */
    public function timelineItems()
    {
        return $this->hasMany(ServiceAreaTimelineItem::class);
    }

    /**
     * Get the vacant property check items for the service area.
     */
    public function checkItems()
    {
        return $this->hasMany(VacantPropertyCheckItem::class);
    }

    /**
     * Scope a query to only include published service areas.
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
}
