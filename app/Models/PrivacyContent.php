<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacyContent extends Model
{
    protected $table = 'privacy_contents';

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
  'doc_title' => 'Privacy notice',
  'doc_date' => 'Last updated: November 2026',
  'meta_title' => 'Privacy Notice | Stonemere Life Management',
  'meta_description' => 'Stonemere Life Management privacy notice for clients and website users.',
  'meta_keywords' => NULL,
  'og_title' => NULL,
  'og_description' => NULL,
  'og_image' => NULL,
  'sections' => 
  array (
    0 => 
    array (
      'id' => 'who',
      'heading' => 'Who we are',
      'html' => '<p>Stonemere Life Management (&ldquo;Stonemere&rdquo;, &ldquo;we&rdquo;) provides practical coordination and support in Bath and Bath &amp; North East Somerset. You can contact us on <a href="tel:+441225338436">01225 338436</a>.</p>',
    ),
    1 => 
    array (
      'id' => 'collect',
      'heading' => 'What we collect',
      'html' => '<p>When you contact us, we collect what you choose to give us: usually your name, phone number, organisation and a description of what is needed. When we support a client, we hold the information needed to do that safely, which may include health or care information shared with consent.</p>',
    ),
    2 => 
    array (
      'id' => 'use',
      'heading' => 'How we use it',
      'html' => '<p>We use information to respond to enquiries and referrals, to provide and coordinate services, to keep families and referrers updated with the client&rsquo;s consent, and to meet our legal obligations.</p>',
    ),
    3 => 
    array (
      'id' => 'basis',
      'heading' => 'Lawful basis',
      'html' => '<p>We rely on consent, on taking steps to enter into or perform a contract, on legitimate interests in running our service, and, for special category information such as health data, on explicit consent or another condition permitted by law.</p>',
    ),
    4 => 
    array (
      'id' => 'share',
      'heading' => 'Sharing',
      'html' => '<p>We share information only where needed to provide support and the client has agreed, or where the law requires or permits it, for example to protect someone at risk of harm. We do not sell personal information.</p>',
    ),
    5 => 
    array (
      'id' => 'whatsapp',
      'heading' => 'WhatsApp and phone',
      'html' => '<p>Our website forms open WhatsApp with your message prefilled; nothing is sent until you press send. Messages sent through WhatsApp are also handled under WhatsApp&rsquo;s own terms and privacy policy. Please don&rsquo;t send a client&rsquo;s full name or medical details by WhatsApp; we will take those by phone.</p>',
    ),
    6 => 
    array (
      'id' => 'website',
      'heading' => 'This website',
      'html' => '<p>This website does not use analytics or tracking cookies. It may store small settings in your browser, such as whether you have seen the opening animation or chosen to reduce motion. Fonts are hosted on this website.</p>',
    ),
    7 => 
    array (
      'id' => 'keep',
      'heading' => 'How long we keep information',
      'html' => '<p>We keep information only as long as needed for the purposes above and to meet legal and insurance requirements.</p>',
    ),
    8 => 
    array (
      'id' => 'rights',
      'heading' => 'Your rights',
      'html' => '<p>You can ask to access, correct or delete your information, object to or restrict its use, and withdraw consent. Contact us to make a request. If you are unhappy, you can complain to the Information Commissioner&rsquo;s Office at <a href="https://ico.org.uk/" target="_blank" rel="noopener">ico.org.uk</a>.</p>',
    ),
  ),
)
        );
    }
}