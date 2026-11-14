<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'tagline',
        'logo_light',
        'logo_dark',
        'logo_stacked',
        'logo_stacked_reverse',
        'favicon',
        'phone',
        'whatsapp',
        'email',
        'address',
        'business_hours',
        'social_media',
        'default_meta_title',
        'default_meta_description',
        'default_og_image',
        'default_twitter_image',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::creating(function ($settings) {
            // Prevent creation of duplicate settings records
            if (static::count() > 0) {
                throw new \Exception('A settings record already exists. Use the existing record instead.');
            }
        });

        static::deleting(function ($settings) {
            // Prevent deletion of the only settings record
            if (static::count() === 1) {
                throw new \Exception('Cannot delete the only settings record. Update it instead.');
            }
        });
    }

    /**
     * Get the singleton instance.
     */
    public static function getSettings(): self
    {
        return static::firstOrCreate([], [
            'company_name' => 'Stonemere Life Management',
            'phone' => '01225 338436',
            'whatsapp' => '07891 341414',
            'address' => 'Bath, Somerset',
        ]);
    }
}
