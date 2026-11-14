<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'membership_level_id',
        'sort_order',
    ];

    /**
     * Get the membership level that owns the pricing item.
     */
    public function membershipLevel()
    {
        return $this->belongsTo(MembershipLevel::class);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Scope a query to only include membership items.
     */
    public function scopeMembership($query)
    {
        return $query->where('type', 'membership');
    }

    /**
     * Scope a query to only include separate items.
     */
    public function scopeSeparate($query)
    {
        return $query->where('type', 'separate');
    }
}
