<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactContent extends Model
{
    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'routes_whatsapp_label',
        'routes_phone_label',
        'routes_area_label',
        'referral_prefix',
        'referral_link_text',
        'form_role_placeholder',
        'form_role_options',
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
            'form_role_options' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_eyebrow' => 'Contact',
  'hero_title' => 'Talk to <em>Stonemere</em>',
  'hero_lead' => 'Message, call or send the form. Tell us who you are and, in outline, what is needed.',
  'routes_whatsapp_label' => 'WhatsApp',
  'routes_phone_label' => 'Call',
  'routes_area_label' => 'Area',
  'referral_prefix' => 'Referring a client?',
  'referral_link_text' => 'Use the referral builder',
  'form_role_placeholder' => 'Choose one',
  'form_role_options' => 
  array (
    0 => 
    array (
      'value' => 'Domiciliary care provider',
      'label' => 'Domiciliary care provider',
    ),
    1 => 
    array (
      'value' => 'Solicitor or executor',
      'label' => 'Solicitor or executor',
    ),
    2 => 
    array (
      'value' => 'Healthcare professional',
      'label' => 'Healthcare professional',
    ),
    3 => 
    array (
      'value' => 'Property professional',
      'label' => 'Property professional',
    ),
    4 => 
    array (
      'value' => 'Family member',
      'label' => 'Family member',
    ),
    5 => 
    array (
      'value' => 'Contacting for myself',
      'label' => 'Contacting for myself',
    ),
    6 => 
    array (
      'value' => 'Other organisation',
      'label' => 'Other organisation',
    ),
  ),
  'meta_title' => 'Contact Stonemere Life Management | Call 01225 338436 | Bath',
  'meta_description' => 'Get in touch with Stonemere Life Management for practical coordination services in Bath and Bath & North East Somerset.',
)
        );
    }
}