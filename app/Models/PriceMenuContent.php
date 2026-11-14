<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceMenuContent extends Model
{
    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',
        'account_eyebrow',
        'account_title',
        'levels_eyebrow',
        'levels_title',
        'separate_eyebrow',
        'separate_title',
        'separate_text',
        'faqs_eyebrow',
        'faqs_title',
        'cta_eyebrow',
        'cta_title',
        'cta_text',
        'cta_button_primary_text',
        'cta_button_primary_url',
        'cta_button_secondary_text',
        'cta_button_secondary_url',
        'account_steps',
        'faqs_items',
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
            'account_steps' => 'array',
            'faqs_items' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_eyebrow' => 'Price menu',
  'hero_title' => 'Clear charges, <em>agreed upfront</em>',
  'hero_lead' => 'Ongoing support runs on a simple membership credited to the client&rsquo;s own account. Everything else is explained and agreed in advance. Current rates are confirmed in writing.',
  'hero_cta_primary_text' => 'Ask for current rates',
  'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F',
  'hero_cta_secondary_text' => 'Find a level',
  'hero_cta_secondary_url' => '#finder',
  'account_eyebrow' => 'The client account',
  'account_title' => 'How the membership <em>works</em>',
  'levels_eyebrow' => 'Membership levels',
  'levels_title' => 'Three levels',
  'separate_eyebrow' => 'Charged separately',
  'separate_title' => 'Always <em>agreed first</em>',
  'separate_text' => 'These are not drawn from membership. Each one is explained and agreed before it is incurred.',
  'faqs_eyebrow' => 'Questions',
  'faqs_title' => 'About <em>pricing</em>',
  'cta_eyebrow' => 'Next step',
  'cta_title' => 'Ask for current rates',
  'cta_text' => 'We will send them straight away and recommend honestly, even when that means the lowest level.',
  'cta_button_primary_text' => 'Message on WhatsApp',
  'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F',
  'cta_button_secondary_text' => 'Call 01225 338436',
  'cta_button_secondary_url' => 'tel:+441225338436',
  'account_steps' => 
  array (
    0 => 
    array (
      'title' => 'Choose a level',
      'text' => 'Silver, Gold or Platinum, depending on how much support is likely to be needed.',
    ),
    1 => 
    array (
      'title' => 'Payments credit the account',
      'text' => 'Monthly membership payments go into the client&rsquo;s own Stonemere account.',
    ),
    2 => 
    array (
      'title' => 'Funds are used as we work',
      'text' => 'The account is drawn down against Stonemere&rsquo;s time and services, and you can see how.',
    ),
  ),
  'faqs_items' => 
  array (
    0 => 
    array (
      'question' => 'Why are there no prices on this page?',
      'answer' => 'Rates are confirmed in writing for each client, because the right level depends on how much coordination is needed. Ask and we will send current rates straight away.',
    ),
    1 => 
    array (
      'question' => 'Can a family member or an organisation pay?',
      'answer' => 'Yes. The client, a family member or representative, or the referring organisation can fund the work. This is agreed in writing first.',
    ),
    2 => 
    array (
      'question' => 'Can the level change?',
      'answer' => 'Yes. Clients can move between levels as circumstances change. Notice is set out in the written agreement.',
    ),
    3 => 
    array (
      'question' => 'Will we see how the account is used?',
      'answer' => 'Yes. The client account is drawn down against Stonemere&rsquo;s time and services, and you can see how it has been used.',
    ),
  ),
  'meta_title' => 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath',
  'meta_description' => 'View Stonemere\'s transparent pricing and membership levels for practical coordination services in Bath.',
)
        );
    }
}