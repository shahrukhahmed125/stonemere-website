<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalsContent extends Model
{
    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',
        'remit_eyebrow',
        'remit_title',
        'remit_lede',
        'remit_body',
        'builder_eyebrow',
        'builder_title',
        'builder_intro',
        'faqs_eyebrow',
        'faqs_title',
        'cta_eyebrow',
        'cta_title',
        'cta_text',
        'cta_button_primary_text',
        'cta_button_primary_url',
        'cta_button_secondary_text',
        'cta_button_secondary_url',
        'builder_referrer_options',
        'builder_needs_groups',
        'builder_urgency_options',
        'builder_area_options',
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
            'builder_referrer_options' => 'array',
            'builder_needs_groups' => 'array',
            'builder_urgency_options' => 'array',
            'builder_area_options' => 'array',
            'faqs_items' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_eyebrow' => 'For professionals',
  'hero_title' => 'Hand over the practical side. <em>We follow it through.</em>',
  'hero_lead' => 'For care providers, solicitors, healthcare and property professionals whose clients need practical coordination beyond your core service. One named contact, a clear remit and no chasing.',
  'hero_cta_primary_text' => 'Build a referral',
  'hero_cta_primary_url' => '#referral',
  'hero_cta_secondary_text' => 'Call 01225 338436',
  'hero_cta_secondary_url' => 'tel:+441225338436',
  'remit_eyebrow' => 'The remit',
  'remit_title' => 'Where your service ends, <em>ours begins</em>',
  'remit_lede' => 'Every service has edges. The practical matters just outside them, such as the empty house, the family abroad, the appointment nobody can attend or the clearance after a death, are where clients come to harm and professionals lose time.',
  'remit_body' => 'Stonemere takes those matters on, coordinates everyone involved and sees each one through, working alongside you and never instead of you.',
  'builder_eyebrow' => 'Referral builder',
  'builder_title' => 'Build a referral <em>in two minutes</em>',
  'builder_intro' => 'Choose what applies and your message writes itself. It opens in WhatsApp for you to check and send.',
  'faqs_eyebrow' => 'Questions',
  'faqs_title' => 'What referrers <em>ask first</em>',
  'cta_eyebrow' => 'Next step',
  'cta_title' => 'Prefer to talk it through?',
  'cta_text' => 'Call 01225 338436 or message us. Outline the situation and we will tell you straight away whether we can help.',
  'cta_button_primary_text' => 'Message on WhatsApp',
  'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20am%20a%20professional%20and%20would%20like%20to%20discuss%20a%20possible%20referral.',
  'cta_button_secondary_text' => 'Call 01225 338436',
  'cta_button_secondary_url' => 'tel:+441225338436',
  'builder_referrer_options' => 
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
      'value' => 'Other organisation',
      'label' => 'Other organisation',
    ),
    5 => 
    array (
      'value' => 'Family member',
      'label' => 'Family member',
    ),
  ),
  'builder_needs_groups' => 
  array (
    0 => 
    array (
      'label' => 'Family &amp; Client Support',
      'options' => 
      array (
        0 => 
        array (
          'value' => 'Family liaison',
          'label' => 'Family liaison',
        ),
        1 => 
        array (
          'value' => 'Welfare visits',
          'label' => 'Welfare visits',
        ),
        2 => 
        array (
          'value' => 'Appointment accompaniment',
          'label' => 'Appointment accompaniment',
        ),
        3 => 
        array (
          'value' => 'Admin support',
          'label' => 'Admin support',
        ),
        4 => 
        array (
          'value' => 'End-of-life or post-death coordination',
          'label' => 'End-of-life or post-death coordination',
        ),
      ),
    ),
    1 => 
    array (
      'label' => 'Care &amp; Professional Liaison',
      'options' => 
      array (
        0 => 
        array (
          'value' => 'Case management',
          'label' => 'Case management',
        ),
        1 => 
        array (
          'value' => 'Health and care coordination',
          'label' => 'Health and care coordination',
        ),
        2 => 
        array (
          'value' => 'Liaison with care provider',
          'label' => 'Liaison with care provider',
        ),
        3 => 
        array (
          'value' => 'Attendance at appointments',
          'label' => 'Attendance at appointments',
        ),
      ),
    ),
    2 => 
    array (
      'label' => 'Property &amp; Asset Management',
      'options' => 
      array (
        0 => 
        array (
          'value' => 'Property oversight',
          'label' => 'Property oversight',
        ),
        1 => 
        array (
          'value' => 'Vacant property checks',
          'label' => 'Vacant property checks',
        ),
        2 => 
        array (
          'value' => 'Contractor coordination',
          'label' => 'Contractor coordination',
        ),
        3 => 
        array (
          'value' => 'Downsizing or clearance',
          'label' => 'Downsizing or clearance',
        ),
        4 => 
        array (
          'value' => 'Storage and possessions',
          'label' => 'Storage and possessions',
        ),
        5 => 
        array (
          'value' => 'Property or asset disposal',
          'label' => 'Property or asset disposal',
        ),
      ),
    ),
    3 => 
    array (
      'label' => 'Urgent &amp; Complex',
      'options' => 
      array (
        0 => 
        array (
          'value' => 'Same-day support',
          'label' => 'Same-day support',
        ),
        1 => 
        array (
          'value' => 'Out-of-hours help',
          'label' => 'Out-of-hours help',
        ),
        2 => 
        array (
          'value' => 'Crisis coordination',
          'label' => 'Crisis coordination',
        ),
        3 => 
        array (
          'value' => 'Complex multi-party case',
          'label' => 'Complex multi-party case',
        ),
      ),
    ),
  ),
  'builder_urgency_options' => 
  array (
    0 => 
    array (
      'value' => 'Today',
      'label' => 'Today',
    ),
    1 => 
    array (
      'value' => 'This week',
      'label' => 'This week',
    ),
    2 => 
    array (
      'value' => 'Planning ahead',
      'label' => 'Planning ahead',
    ),
  ),
  'builder_area_options' => 
  array (
    0 => 
    array (
      'value' => 'Bath',
      'label' => 'Bath',
    ),
    1 => 
    array (
      'value' => 'Elsewhere in B&NES',
      'label' => 'Elsewhere in B&amp;NES',
    ),
    2 => 
    array (
      'value' => 'Further afield',
      'label' => 'Further afield',
    ),
  ),
  'faqs_items' => 
  array (
    0 => 
    array (
      'question' => 'Does it cost anything to refer?',
      'answer' => 'There is no charge for the first conversation. Before any work starts we agree in writing what we will do and who will pay: the client, their family or representative, or your organisation.',
    ),
    1 => 
    array (
      'question' => 'Do you replace our service?',
      'answer' => 'No. We take on the practical matters that sit outside your service and work alongside you. We do not provide personal care, nursing, medical treatment, or legal or financial advice.',
    ),
    2 => 
    array (
      'question' => 'How do you keep us informed?',
      'answer' => 'You agree with us how you want to be updated, and we keep to it, with the client&rsquo;s consent.',
    ),
    3 => 
    array (
      'question' => 'Can you act when family members disagree or live abroad?',
      'answer' => 'Yes. Family liaison and representation, and complex cases involving several family members or organisations, are part of what we do. We keep everyone on the same page while respecting the client&rsquo;s wishes.',
    ),
  ),
  'meta_title' => 'For Professionals | Refer a Client to Stonemere Life Management, Bath',
  'meta_description' => 'Stonemere provides practical coordination for care providers, solicitors, healthcare professionals and property professionals in Bath.',
)
        );
    }
}