<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_text',
        'price_type',
        'price_amount',
        'price_max',
        'minimum_amount',
        'price_unit',
        'additional_info',
        'sort_order',
        'is_active',
        'show_on_website',
    ];

    protected $casts = [
        'price_amount' => 'decimal:2',
        'price_max' => 'decimal:2',
        'minimum_amount' => 'decimal:2',
        'is_active' => 'boolean',
        'show_on_website' => 'boolean',
    ];

    public const PRICE_TYPES = [
        'free' => 'Free',
        'fixed' => 'Fixed price',
        'hourly' => 'Hourly rate',
        'from' => 'Starting price',
        'percentage' => 'Percentage-based fee',
        'custom' => 'Custom pricing',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVisible($query)
    {
        return $query->where('show_on_website', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
