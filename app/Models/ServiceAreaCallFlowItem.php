<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAreaCallFlowItem extends Model
{
    protected $fillable = [
        'service_area_id',
        'title',
        'description',
        'sort_order',
    ];

    /**
     * Get the service area that owns the call flow item.
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
