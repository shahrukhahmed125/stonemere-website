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
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',
        'services_eyebrow',
        'services_heading',
        'services_intro',
        'scenarios_eyebrow',
        'scenarios_heading',
        'faqs_eyebrow',
        'faqs_heading',
        'timeline_eyebrow',
        'timeline_heading',
        'checks_eyebrow',
        'checks_heading',
        'checks_intro',
        'callflow_eyebrow',
        'callflow_heading',
        'callflow_note',
        'cta_eyebrow',
        'cta_heading',
        'cta_text',
        'cta_primary_text',
        'cta_primary_url',
        'cta_secondary_text',
        'cta_secondary_url',
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

    /**
     * The next published service area in sort order (wraps around).
     */
    public function nextArea()
    {
        $areas = static::published()->ordered()->get(['id', 'slug', 'name', 'sort_order']);
        if ($areas->isEmpty()) {
            return null;
        }
        $index = $areas->search(fn ($a) => $a->id === $this->id);
        return $areas[($index === false ? 0 : $index + 1) % $areas->count()];
    }
}
