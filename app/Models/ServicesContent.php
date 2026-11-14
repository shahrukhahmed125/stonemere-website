<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesContent extends Model
{
    protected $fillable = [
        // Page Hero
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',

        // CTA Band
        'cta_eyebrow',
        'cta_title',
        'cta_text',
        'cta_button_primary_text',
        'cta_button_primary_url',
        'cta_button_secondary_text',
        'cta_button_secondary_url',

        // SEO & Social
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero_eyebrow' => 'Services',
                'hero_title' => 'Four service areas, <em>one trusted contact</em>',
                'hero_lead' => 'Everything Stonemere does falls into four areas. Each can be arranged on its own, and all of them are coordinated by the same named person.',
                'hero_cta_primary_text' => 'Ask which fits',
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20which%20of%20your%20services%20would%20fit%20a%20client.',
                'hero_cta_secondary_text' => 'Price menu',
                'hero_cta_secondary_url' => '/price-menu',
                'cta_eyebrow' => 'Next step',
                'cta_title' => 'Tell us what is happening',
                'cta_text' => 'One conversation is enough to know whether we can help.',
                'cta_button_primary_text' => 'Message on WhatsApp',
                'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support.',
                'cta_button_secondary_text' => 'Call 01225 338436',
                'cta_button_secondary_url' => 'tel:+441225338436',
                'meta_title' => 'Services | Life Management in Bath | Stonemere',
                'meta_description' => "Discover Stonemere's practical coordination services: family support, care liaison, property management and urgent cases in Bath.",
            ]
        );
    }
}
