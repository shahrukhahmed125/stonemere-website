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
        'hero_lead',
        'hero_image',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
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
     * Get the FAQ items for the service area.
     */
    public function faqs()
    {
        return $this->hasMany(ServiceAreaFaqItem::class)->ordered();
    }

    /**
     * Get the call flow items for the service area.
     */
    public function callFlowItems()
    {
        return $this->hasMany(ServiceAreaCallFlowItem::class)->ordered();
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
