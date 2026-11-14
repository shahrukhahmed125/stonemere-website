<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_cta_text',
        'hero_cta_url',
        'define_word',
        'define_phonetic',
        'define_definition',
        'define_body',
        'principles_eyebrow',
        'principles_title',
        'where_eyebrow',
        'where_title',
        'where_text',
        'cta_eyebrow',
        'cta_title',
        'cta_text',
        'cta_button_primary_text',
        'cta_button_primary_url',
        'cta_button_secondary_text',
        'cta_button_secondary_url',
        'isnot_columns',
        'principles_items',
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
            'isnot_columns' => 'array',
            'principles_items' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_eyebrow' => 'About',
  'hero_title' => 'Life management, <em>defined</em>',
  'hero_lead' => 'Trusted, practical support and coordination for the clients of care providers, solicitors and health professionals, and for older people, vulnerable adults and families facing difficulty or change.',
  'hero_cta_text' => 'Talk to Stonemere',
  'hero_cta_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20know%20more%20about%20what%20you%20do.',
  'define_word' => 'Life<br>management',
  'define_phonetic' => '/ˈlaɪf ˈmænɪdʒmənt/ &nbsp;<em>noun</em>',
  'define_definition' => 'One trusted point of contact who coordinates the practical aspects of a person&rsquo;s life, and makes sure important matters are followed through.',
  'define_body' => 'Our services bridge the gap between traditional care, family support and everyday practical help. We manage appointments, correspondence, household matters and administration; liaise with healthcare and care providers; accompany clients when needed; coordinate moves, storage and property matters; and support people through hospital discharge, bereavement, the end of life and other crises.',
  'isnot_columns' => 
  array (
    0 => 
    array (
      'label' => 'Not a care agency',
      'text' => 'We don&rsquo;t provide personal care, nursing or medical treatment. We work alongside the people who do.',
      'is_key' => false,
    ),
    1 => 
    array (
      'label' => 'Not simply a concierge',
      'text' => 'We don&rsquo;t just run errands. We take responsibility for matters, solve problems and see them through.',
      'is_key' => false,
    ),
    2 => 
    array (
      'label' => 'The keystone',
      'text' => 'The one person who holds the practical side together, so the family and every professional can rely on it.',
      'is_key' => true,
    ),
  ),
  'principles_eyebrow' => 'How we work',
  'principles_title' => 'Five principles behind <em>every case</em>',
  'principles_items' => 
  array (
    0 => 
    array (
      'title' => 'One point of contact',
      'text' => 'The client, the family and every professional know who is responsible.',
    ),
    1 => 
    array (
      'title' => 'Alongside, never instead',
      'text' => 'We complement care providers, health teams and solicitors and respect their roles.',
    ),
    2 => 
    array (
      'title' => 'Followed through',
      'text' => 'Matters are seen to completion, not passed on.',
    ),
    3 => 
    array (
      'title' => 'The client&rsquo;s wishes first',
      'text' => 'We act with the client&rsquo;s knowledge and consent, and keep their independence at the centre.',
    ),
    4 => 
    array (
      'title' => 'Clear and written',
      'text' => 'What we do, and what it costs, is agreed in writing before work begins.',
    ),
  ),
  'where_eyebrow' => 'Where we work',
  'where_title' => 'Rooted in <em>Bath</em>',
  'where_text' => 'Our primary service area is Bath and the surrounding area, initially concentrating on clients within about five miles of the city. We also serve the wider Bath &amp; North East Somerset area, and can coordinate matters further afield when an existing client or their family needs help.',
  'cta_eyebrow' => 'Next step',
  'cta_title' => 'See whether we can help',
  'cta_text' => 'Tell us about the client or the situation. We will be honest about whether Stonemere is the right fit.',
  'cta_button_primary_text' => 'Message on WhatsApp',
  'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20see%20whether%20you%20can%20help.',
  'cta_button_secondary_text' => 'Call 01225 338436',
  'cta_button_secondary_url' => 'tel:+441225338436',
  'meta_title' => 'About Stonemere Life Management | Bath',
  'meta_description' => 'Learn about Stonemere Life Management and our practical coordination services for care providers, solicitors and health professionals in Bath.',
)
        );
    }
}