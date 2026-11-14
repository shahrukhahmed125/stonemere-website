<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'url',
        'location',
        'parent_id',
        'sort_order',
        'is_active',
        'open_in_new_tab',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'open_in_new_tab' => 'boolean',
    ];

    /**
     * Get the parent navigation item.
     */
    public function parent()
    {
        return $this->belongsTo(NavigationItem::class, 'parent_id');
    }

    /**
     * Get the child navigation items.
     */
    public function children()
    {
        return $this->hasMany(NavigationItem::class, 'parent_id');
    }

    /**
     * Scope a query to only include active items.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include header items.
     */
    public function scopeHeader($query)
    {
        return $query->where('location', 'header');
    }

    /**
     * Scope a query to only include footer items.
     */
    public function scopeFooter($query)
    {
        return $query->where('location', 'footer');
    }

    /**
     * Scope a query to only include root items.
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
