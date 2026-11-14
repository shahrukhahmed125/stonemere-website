<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacantPropertyCheckItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_area_id',
        'item_text',
        'is_default_checked',
        'sort_order',
    ];

    protected $casts = [
        'is_default_checked' => 'boolean',
    ];

    /**
     * Get the service area that owns the check item.
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

    /**
     * Scope a query to only include default checked items.
     */
    public function scopeDefaultChecked($query)
    {
        return $query->where('is_default_checked', true);
    }
}
