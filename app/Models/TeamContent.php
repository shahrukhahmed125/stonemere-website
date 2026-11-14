<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamContent extends Model
{
    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',
        'paul_eyebrow',
        'paul_name',
        'paul_lede',
        'paul_phone',
        'paul_whatsapp',
        'howteam_eyebrow',
        'howteam_title',
        'cta_eyebrow',
        'cta_title',
        'cta_text',
        'cta_button_primary_text',
        'cta_button_primary_url',
        'cta_button_secondary_text',
        'cta_button_secondary_url',
        'howteam_items',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
    ];

    protected function casts(): array
    {
        return [
            'howteam_items' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_eyebrow' => 'Our team',
  'hero_title' => 'Led by <em>Paul Harrison</em>',
  'hero_lead' => 'A Bath team with one rule: every client has a named person who knows the whole situation, and every referrer knows exactly who to call.',
  'hero_cta_primary_text' => 'Message Paul',
  'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Paul%2C%20I%20would%20like%20to%20talk%20about%20Stonemere%27s%20support.',
  'hero_cta_secondary_text' => 'Call 01225 338436',
  'hero_cta_secondary_url' => 'tel:+441225338436',
  'paul_eyebrow' => 'Who you will speak to',
  'paul_name' => 'Paul Harrison',
  'paul_lede' => 'Paul leads Stonemere Life Management. Speak to him directly about a client, a referral or how the service works.',
  'paul_phone' => '01225 338436',
  'paul_whatsapp' => '07891 341414',
  'howteam_eyebrow' => 'How the team works',
  'howteam_title' => 'One named contact, <em>every time</em>',
  'cta_eyebrow' => 'Next step',
  'cta_title' => 'Speak to the team',
  'cta_text' => 'Call 01225 338436 or message us. You will speak to someone who can act.',
  'cta_button_primary_text' => 'Message on WhatsApp',
  'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20speak%20to%20the%20team.',
  'cta_button_secondary_text' => 'Call 01225 338436',
  'cta_button_secondary_url' => 'tel:+441225338436',
  'howteam_items' => 
  array (
    0 => 
    array (
      'number' => '01',
      'title' => 'A named person per client',
      'text' => 'The client and family deal with someone who knows them, their home and their circumstances.',
    ),
    1 => 
    array (
      'number' => '02',
      'title' => 'Enhanced DBS-checked',
      'text' => 'Vetted to the standard expected for work with vulnerable adults.',
    ),
    2 => 
    array (
      'number' => '03',
      'title' => 'Confidential and discreet',
      'text' => 'Information is shared only with consent, or where the law requires it.',
    ),
    3 => 
    array (
      'number' => '04',
      'title' => 'Clear boundaries',
      'text' => 'We work alongside care, health and legal professionals, never instead of them.',
    ),
  ),
  'meta_title' => 'Our Team | Led by Paul Harrison | Stonemere Life Management, Bath',
  'meta_description' => 'Meet the Stonemere Life Management team providing practical coordination services in Bath.',
)
        );
    }
}