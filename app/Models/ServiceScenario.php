<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceScenario extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_area_id',
        'title',
        'description',
        'link_page',
        'sort_order',
    ];

    /**
     * Get the service area that owns the scenario.
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
