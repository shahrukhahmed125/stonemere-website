<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_lead',
        'hero_cta_primary_text',
        'hero_cta_primary_url',
        'hero_cta_secondary_text',
        'hero_cta_secondary_url',
        'strap_text',
        'statement_eyebrow',
        'statement_title',
        'statement_link_text',
        'statement_link_url',
        'keystone_eyebrow',
        'keystone_title',
        'track_eyebrow',
        'track_title',
        'track_description',
        'track_link_text',
        'track_link_url',
        'refer_eyebrow',
        'refer_title',
        'mapper_eyebrow',
        'mapper_title',
        'mapper_description',
        'mapper_count_text',
        'mapper_cta_text',
        'mapper_cta_url',
        'steps_eyebrow',
        'steps_title',
        'steps_description',
        'steps_button_text',
        'steps_button_url',
        'bounds_do_label',
        'bounds_do_big_text',
        'bounds_do_description',
        'bounds_dont_label',
        'bounds_dont_big_text',
        'bounds_dont_description',
        'standards_title',
        'where_eyebrow',
        'where_title',
        'where_description',
        'lead_eyebrow',
        'lead_title',
        'lead_description',
        'lead_button_primary_text',
        'lead_button_primary_url',
        'lead_button_secondary_text',
        'lead_button_secondary_url',
        'tiers_eyebrow',
        'tiers_title',
        'tiers_description',
        'tiers_link_text',
        'tiers_link_url',
        'questions_eyebrow',
        'questions_title',
        'questions_description',
        'contact_eyebrow',
        'contact_title',
        'contact_description',
        'contact_office_bath_label',
        'contact_office_bath_note',
        'contact_office_bath_phone',
        'contact_office_whatsapp_label',
        'contact_office_whatsapp_phone',
        'statement_paragraphs',
        'keystone_captions',
        'track_cards',
        'refer_cards',
        'steps_items',
        'standards_items',
        'where_figures',
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
            'statement_paragraphs' => 'array',
            'keystone_captions' => 'array',
            'track_cards' => 'array',
            'refer_cards' => 'array',
            'steps_items' => 'array',
            'standards_items' => 'array',
            'where_figures' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            array (
  'hero_title' => 'The practical side of your client&rsquo;s life, <em>coordinated</em>',
  'hero_lead' => 'One named contact for care providers, solicitors and healthcare professionals in Bath. We work alongside you, so the matters outside your service are followed through and nothing is missed.',
  'hero_cta_primary_text' => 'Refer a client',
  'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20refer%20a%20client.',
  'hero_cta_secondary_text' => 'Call 01225 338436',
  'hero_cta_secondary_url' => 'tel:+441225338436',
  'strap_text' => 'Working alongside domiciliary care companies ◆ solicitors ◆ healthcare professionals ◆ property professionals ◆ and the families they support ◆ across Bath & North East Somerset ◆',
  'statement_eyebrow' => 'Who we are',
  'statement_title' => 'When a client needs more than your service covers, someone has to pick up the rest. <em>That is what we do.</em>',
  'statement_link_text' => 'What life management means',
  'statement_link_url' => '/about',
  'keystone_eyebrow' => 'Life management',
  'keystone_title' => 'How an arch holds',
  'track_eyebrow' => 'Our services',
  'track_title' => 'Four areas, <em>one named contact</em>',
  'track_description' => 'Every area is coordinated by the same person, who knows the client, the family and the professionals involved.',
  'track_link_text' => 'All services',
  'track_link_url' => '/services',
  'refer_eyebrow' => 'Who refers to us',
  'refer_title' => 'Each profession hands over <em>something different</em>',
  'mapper_eyebrow' => 'Try it',
  'mapper_title' => 'Who is involved in <em>this case?</em>',
  'mapper_description' => 'Select everyone your client deals with. However many there are, you and the family speak to one person.',
  'mapper_count_text' => 'parties selected. Choose the people and organisations involved.',
  'mapper_cta_text' => 'Send this case to Stonemere',
  'mapper_cta_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20a%20case.',
  'steps_eyebrow' => 'How a referral works',
  'steps_title' => 'Four plain steps, <em>no paperwork to start</em>',
  'steps_description' => 'Your first message doesn&rsquo;t need the client&rsquo;s full name or medical details. We take those safely once we have spoken.',
  'steps_button_text' => 'Build a referral',
  'steps_button_url' => '/professionals#referral',
  'bounds_do_label' => 'We do',
  'bounds_do_description' => 'Practical coordination, communication, representation at appointments, property and possessions, logistics and problem-solving, carried through to completion.',
  'bounds_dont_label' => 'We never',
  'bounds_dont_description' => 'We do not provide medical treatment, nursing, regulated personal care, legal advice or financial advice. When those are needed, we make sure the right people are involved and we work alongside them.',
  'standards_title' => 'The standards behind every case',
  'where_eyebrow' => 'Where we work',
  'where_title' => 'Bath first, <em>then the wider county</em>',
  'where_description' => 'We concentrate on clients within about five miles of Bath, serve the wider Bath & North East Somerset area, and coordinate matters further afield when an existing client or their family needs it.',
  'lead_eyebrow' => 'Our team',
  'lead_title' => 'Led by <em>Paul Harrison</em>',
  'lead_description' => 'Stonemere is led by Paul. When you refer a client, you know exactly who is responsible for the case and how to reach them.',
  'lead_button_primary_text' => 'Meet the team',
  'lead_button_primary_url' => '/team',
  'lead_button_secondary_text' => 'Message Paul',
  'lead_button_secondary_url' => 'https://wa.me/447891341414?text=Hello%20Paul%2C%20I%20would%20like%20to%20talk%20about%20Stonemere%27s%20support.',
  'tiers_eyebrow' => 'Price menu',
  'tiers_title' => 'Simple membership, <em>separate costs agreed first</em>',
  'tiers_description' => 'Ongoing support is paid as a monthly membership credited to the client&rsquo;s own account and used for Stonemere&rsquo;s time. Transport, purchases, third-party costs and crisis work are charged separately, always agreed in advance.',
  'tiers_link_text' => 'How pricing works, and which level fits',
  'tiers_link_url' => '/price-menu',
  'questions_eyebrow' => 'Questions',
  'questions_title' => 'Before you <em>refer</em>',
  'questions_description' => 'Anything else, ask us on WhatsApp or call 01225 338436.',
  'contact_eyebrow' => 'Get in touch',
  'contact_title' => 'Talk to Stonemere',
  'contact_description' => 'Tell us about the client and what they need. We will tell you honestly whether we can help, and what it would involve.',
  'contact_office_bath_label' => 'Bath',
  'contact_office_bath_note' => 'Covering Bath and Bath & North East Somerset',
  'contact_office_bath_phone' => '01225 338436',
  'contact_office_whatsapp_label' => 'WhatsApp',
  'contact_office_whatsapp_phone' => '07891 341414',
  'statement_paragraphs' => 
  array (
    0 => 'Stonemere Life Management provides professional support to businesses and organisations whose clients, residents or families need practical coordination beyond their core service.',
    1 => 'We manage appointments, family liaison, property matters, welfare visits and complex day-to-day issues, giving you one reliable point of contact. We are not a care agency, and we are not simply a concierge.',
  ),
  'keystone_captions' => 
  array (
    0 => 
    array (
      'text' => '<strong>Everyone holds a piece.</strong> The family, the carers, the GP, the solicitor, the property and the trades each carry part of a client&rsquo;s life.',
    ),
    1 => 
    array (
      'text' => '<strong>Without a keystone, nothing holds.</strong> Matters fall between organisations, messages go unanswered, and nobody owns the whole picture.',
    ),
    2 => 
    array (
      'text' => '<strong>One point of contact. Everything holds.</strong> Stonemere sits at the top of the arch, coordinating every party and following each matter through.',
    ),
  ),
  'track_cards' => 
  array (
    0 => 
    array (
      'number' => '01',
      'image' => 'homepage/cards/area-family.svg',
      'title' => 'Family & Client Support',
      'line' => 'Practical help for clients and their families, through the routine and the hardest moments.',
      'items' => 
      array (
        0 => 'Family liaison and representation',
        1 => 'Home and welfare visits',
        2 => 'Appointment accompaniment',
        3 => 'End-of-life and post-death coordination',
      ),
      'url' => '/family-client-support',
      'service_area_slug' => 'family-client-support',
    ),
    1 => 
    array (
      'number' => '02',
      'image' => 'homepage/cards/area-care.svg',
      'title' => 'Care & Professional Liaison',
      'line' => 'The coordinating link between the client, the family and the professionals around them.',
      'items' => 
      array (
        0 => 'Case management',
        1 => 'Health and care coordination',
        2 => 'Liaison with domiciliary care providers',
        3 => 'Attendance at hospital, medical and solicitor appointments',
      ),
      'url' => '/care-professional-liaison',
      'service_area_slug' => 'care-professional-liaison',
    ),
    2 => 
    array (
      'number' => '03',
      'image' => 'homepage/cards/area-property.svg',
      'title' => 'Property & Asset Management',
      'line' => 'Homes and possessions looked after, prepared and, when the time comes, cleared or sold.',
      'items' => 
      array (
        0 => 'Property oversight and vacant property checks',
        1 => 'Contractor coordination',
        2 => 'Downsizing, clearance and storage',
        3 => 'Property or asset disposal',
      ),
      'url' => '/property-asset-management',
      'service_area_slug' => 'property-asset-management',
    ),
    3 => 
    array (
      'number' => '04',
      'image' => 'homepage/cards/area-urgent.svg',
      'title' => 'Urgent & Complex Case Support',
      'line' => 'A calm, capable response when something happens suddenly or a case becomes complicated.',
      'items' => 
      array (
        0 => 'Same-day support',
        1 => 'Out-of-hours assistance',
        2 => 'Crisis coordination',
        3 => 'Complex cases across several parties',
      ),
      'url' => '/urgent-complex-cases',
      'service_area_slug' => 'urgent-complex-cases',
    ),
  ),
  'refer_cards' => 
  array (
    0 => 
    array (
      'number' => '01',
      'title' => 'Domiciliary care companies',
      'preview_image' => 'homepage/audiences/prof-care.svg',
      'body' => 'Your carers notice problems that sit outside the care plan: unopened post, a boiler that has failed, a family that can\'t be reached. Hand those to us and keep your team on care.',
      'link_text' => 'What we take on',
      'link_url' => '/professionals#care-providers',
      'audience_slug' => 'domiciliary-care',
    ),
    1 => 
    array (
      'number' => '02',
      'title' => 'Solicitors & executors',
      'preview_image' => 'homepage/audiences/prof-solicitor.svg',
      'body' => 'Vacant property checks, contractor coordination, possessions, clearance and disposal, plus attendance at appointments, so a probate, deputyship or attorney matter keeps moving.',
      'link_text' => 'What we take on',
      'link_url' => '/professionals#solicitors',
      'audience_slug' => 'solicitors',
    ),
    2 => 
    array (
      'number' => '03',
      'title' => 'Healthcare professionals',
      'preview_image' => 'homepage/audiences/prof-health.svg',
      'body' => 'Hospital discharge teams, GPs and community clinicians: we coordinate the practical side of going home and staying well at home, alongside the services already in place.',
      'link_text' => 'What we take on',
      'link_url' => '/professionals#healthcare',
      'audience_slug' => 'healthcare',
    ),
    3 => 
    array (
      'number' => '04',
      'title' => 'Property professionals',
      'preview_image' => 'homepage/audiences/prof-property.svg',
      'body' => 'Oversight of empty or changing properties, access for trades and agents, and coordination with the family and the client\'s representatives.',
      'link_text' => 'What we take on',
      'link_url' => '/professionals#property',
      'audience_slug' => 'property',
    ),
  ),
  'standards_items' => 
  array (
    0 => 
    array (
      'icon' => 'shield',
      'strong' => 'Enhanced DBS-checked',
      'text' => 'to the standard expected for work with vulnerable adults',
    ),
    1 => 
    array (
      'icon' => 'lock',
      'strong' => 'Confidential',
      'text' => 'information shared only with consent or where the law requires it',
    ),
    2 => 
    array (
      'icon' => 'scale',
      'strong' => 'Clear boundaries',
      'text' => 'agreed in writing, alongside other professionals, never instead of them',
    ),
    3 => 
    array (
      'icon' => 'user',
      'strong' => 'One named contact',
      'text' => 'for the client, the family and every referrer',
    ),
  ),
  'where_figures' => 
  array (
    0 => 
    array (
      'label' => 'Mile radius around Bath, our first focus',
      'value' => '5',
    ),
    1 => 
    array (
      'label' => 'Service areas',
      'value' => '4',
    ),
    2 => 
    array (
      'label' => 'Named contact per client',
      'value' => '1',
    ),
  ),
  'steps_items' => 
  array (
    0 => 
    array (
      'number' => '01',
      'title' => 'Message or call',
      'text' => 'WhatsApp us or call 01225 338436. Tell us who you are and, in outline, what the client needs.',
    ),
    1 => 
    array (
      'number' => '02',
      'title' => 'Agree the scope in writing',
      'text' => 'We talk it through, confirm what we will take on and how it will be paid for, and put it in writing before anything starts.',
    ),
    2 => 
    array (
      'number' => '03',
      'title' => 'One named contact takes it on',
      'text' => 'The same person coordinates every matter, liaises with everyone involved and follows each one through.',
    ),
    3 => 
    array (
      'number' => '04',
      'title' => 'You stay informed',
      'text' => 'We keep you and the family updated, with the client&rsquo;s consent, so you always know where things stand.',
    ),
  ),
  'bounds_do_big_text' => 'Coordinate, liaise, attend, organise, arrange and follow through.',
  'bounds_dont_big_text' => 'Replace the professionals already involved.',
  'meta_title' => 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath',
  'meta_description' => 'One named contact who coordinates the practical side of a client\'s life in Bath: family liaison, care liaison, property and urgent cases.',
)
        );
    }

    /**
     * Rebuild the nested content array shape used by the admin form.
     */
    public function toContentArray(): array
    {
        return [
            'hero' => $this->hero,
            'strap' => $this->strap,
            'statement' => $this->statement,
            'keystone' => $this->keystone,
            'track' => $this->track,
            'refer' => $this->refer,
            'mapper' => $this->mapper,
            'steps' => $this->steps,
            'bounds' => $this->bounds,
            'standards' => $this->standards,
            'where' => $this->where,
            'lead' => $this->lead,
            'tiers' => $this->tiers,
            'questions' => $this->questions,
            'contact' => $this->contact,
        ];
    }

    /**
     * Flatten a nested content array into flat/JSON column names.
     */
    public function attributesToContentColumns(array $content): array
    {
        $flat = [];
        $walk = function ($value, string $path) use (&$walk, &$flat) {
            if (is_array($value)) {
                // list arrays (sequential keys) are stored whole in JSON columns
                if ($value !== [] && array_keys($value) === range(0, count($value) - 1)) {
                    $flat[$path] = $value;
                    return;
                }
                foreach ($value as $k => $v) {
                    $walk($v, $path === '' ? (string) $k : $path . '_' . $k);
                }
                return;
            }
            $flat[$path] = $value;
        };
        $walk($content, '');

        $out = [];
        foreach ($flat as $key => $value) {
            $col = $key === 'steps_steps' ? 'steps_items' : $key;
            if (in_array($col, $this->getJsonColumns(), true) || is_array($value)) {
                $out[$col] = is_array($value) ? $value : $value;
            } else {
                $out[$col] = $value;
            }
        }
        return $out;
    }

    protected function getJsonColumns(): array
    {
        return [
            'statement_paragraphs', 'keystone_captions', 'track_cards', 'refer_cards',
            'steps_items', 'standards_items', 'where_figures',
        ];
    }

    /**
     * Section accessors returning the nested array shape the homepage Blade expects.
     */
    protected function hero(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'title' => $this->hero_title,
            'lead' => $this->hero_lead,
            'cta_primary' => ['text' => $this->hero_cta_primary_text, 'url' => $this->hero_cta_primary_url],
            'cta_secondary' => ['text' => $this->hero_cta_secondary_text, 'url' => $this->hero_cta_secondary_url],
        ]);
    }

    protected function strap(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'text' => $this->strap_text,
        ]);
    }

    protected function statement(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->statement_eyebrow,
            'title' => $this->statement_title,
            'paragraphs' => $this->statement_paragraphs ?? [],
            'link_text' => $this->statement_link_text,
            'link_url' => $this->statement_link_url,
        ]);
    }

    protected function keystone(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->keystone_eyebrow,
            'title' => $this->keystone_title,
            'captions' => $this->keystone_captions ?? [],
        ]);
    }

    protected function track(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->track_eyebrow,
            'title' => $this->track_title,
            'description' => $this->track_description,
            'link_text' => $this->track_link_text,
            'link_url' => $this->track_link_url,
            'cards' => $this->track_cards ?? [],
        ]);
    }

    protected function refer(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->refer_eyebrow,
            'title' => $this->refer_title,
            'cards' => $this->refer_cards ?? [],
        ]);
    }

    protected function mapper(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->mapper_eyebrow,
            'title' => $this->mapper_title,
            'description' => $this->mapper_description,
            'count_text' => $this->mapper_count_text,
            'cta_text' => $this->mapper_cta_text,
            'cta_url' => $this->mapper_cta_url,
        ]);
    }

    protected function steps(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->steps_eyebrow,
            'title' => $this->steps_title,
            'description' => $this->steps_description,
            'button_text' => $this->steps_button_text,
            'button_url' => $this->steps_button_url,
            'steps' => $this->steps_items ?? [],
        ]);
    }

    protected function bounds(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'do' => [
                'label' => $this->bounds_do_label,
                'big_text' => $this->bounds_do_big_text,
                'description' => $this->bounds_do_description,
            ],
            'dont' => [
                'label' => $this->bounds_dont_label,
                'big_text' => $this->bounds_dont_big_text,
                'description' => $this->bounds_dont_description,
            ],
        ]);
    }

    protected function standards(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'title' => $this->standards_title,
            'items' => $this->standards_items ?? [],
        ]);
    }

    protected function where(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->where_eyebrow,
            'title' => $this->where_title,
            'description' => $this->where_description,
            'figures' => $this->where_figures ?? [],
        ]);
    }

    protected function lead(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->lead_eyebrow,
            'title' => $this->lead_title,
            'description' => $this->lead_description,
            'button_primary' => ['text' => $this->lead_button_primary_text, 'url' => $this->lead_button_primary_url],
            'button_secondary' => ['text' => $this->lead_button_secondary_text, 'url' => $this->lead_button_secondary_url],
        ]);
    }

    protected function tiers(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->tiers_eyebrow,
            'title' => $this->tiers_title,
            'description' => $this->tiers_description,
            'link_text' => $this->tiers_link_text,
            'link_url' => $this->tiers_link_url,
        ]);
    }

    protected function questions(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->questions_eyebrow,
            'title' => $this->questions_title,
            'description' => $this->questions_description,
        ]);
    }

    protected function contact(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(fn () => [
            'eyebrow' => $this->contact_eyebrow,
            'title' => $this->contact_title,
            'description' => $this->contact_description,
            'office_bath' => [
                'label' => $this->contact_office_bath_label,
                'note' => $this->contact_office_bath_note,
                'phone' => $this->contact_office_bath_phone,
            ],
            'office_whatsapp' => [
                'label' => $this->contact_office_whatsapp_label,
                'phone' => $this->contact_office_whatsapp_phone,
            ],
        ]);
    }
}