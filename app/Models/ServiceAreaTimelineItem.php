<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAreaTimelineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_area_id',
        'tab_label',
        'tab_id',
        'content',
        'sort_order',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Get the service area that owns the timeline item.
     */
    public function serviceArea()
    {
        return $this->belongsTo(ServiceArea::class);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
