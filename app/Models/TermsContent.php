<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsContent extends Model
{
    protected $table = 'terms_contents';

    protected $fillable = [
        'doc_title',
        'doc_date',
        'sections',
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
            'sections' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'doc_title' => 'Website terms',
  'doc_date' => 'Last updated: November 2026',
  'meta_title' => 'Website Terms | Stonemere Life Management',
  'meta_description' => 'Terms of use for the Stonemere Life Management website.',
  'meta_keywords' => NULL,
  'og_title' => NULL,
  'og_description' => NULL,
  'og_image' => NULL,
  'sections' => 
  array (
    0 => 
    array (
      'id' => 'about',
      'heading' => 'About these terms',
      'html' => '<p>These terms apply to your use of this website. Services are provided under a separate written agreement, which takes priority over anything on this website.</p>',
    ),
    1 => 
    array (
      'id' => 'info',
      'heading' => 'Information on this site',
      'html' => '<p>The website gives general information about our services. It is not medical, legal or financial advice. Stonemere does not provide medical treatment, nursing, regulated personal care, or legal or financial advice.</p>',
    ),
    2 => 
    array (
      'id' => 'emergency',
      'heading' => 'Emergencies',
      'html' => '<p>This website and our WhatsApp line are not emergency services. If someone is in immediate danger, call 999.</p>',
    ),
    3 => 
    array (
      'id' => 'prices',
      'heading' => 'Prices',
      'html' => '<p>Rates are confirmed in writing before any work begins. Information on the price menu describes how charging works and is not an offer.</p>',
    ),
    4 => 
    array (
      'id' => 'ip',
      'heading' => 'Content',
      'html' => '<p>The content and design of this website belong to Stonemere Life Management or its licensors. You may view and print pages for personal or professional reference.</p>',
    ),
    5 => 
    array (
      'id' => 'links',
      'heading' => 'Links',
      'html' => '<p>Links to other websites, including WhatsApp, are provided for convenience. We are not responsible for their content or practices.</p>',
    ),
    6 => 
    array (
      'id' => 'law',
      'heading' => 'Law',
      'html' => '<p>These terms are governed by the law of England and Wales.</p>',
    ),
  ),
)
        );
    }
}