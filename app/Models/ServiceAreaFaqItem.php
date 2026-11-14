<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAreaFaqItem extends Model
{
    protected $fillable = [
        'service_area_id',
        'question',
        'answer',
        'sort_order',
    ];

    /**
     * Get the service area that owns the FAQ item.
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
