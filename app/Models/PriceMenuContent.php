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
        'intro_eyebrow',
        'intro_title',
        'intro_text',
        'table_eyebrow',
        'table_title',
        'charges_eyebrow',
        'charges_title',
        'charge_items',
        'agreement_eyebrow',
        'agreement_title',
        'agreement_text',
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
            'charge_items' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], static::defaults());
    }

    public static function defaults(): array
    {
        return [
                'hero_eyebrow' => 'Price menu',
                'hero_title' => 'Our Price <em>Menu</em>',
                'hero_lead' => 'Clear charges. Flexible support. Agreed upfront. We provide bespoke lifestyle management and professional support, with services tailored to your individual requirements. Our initial telephone consultation is complimentary, and you only pay for the support you need.',
                'hero_cta_primary_text' => 'Book Your Free Consultation',
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20book%20a%20free%20telephone%20consultation.',
                'hero_cta_secondary_text' => 'Call 01225 338436',
                'hero_cta_secondary_url' => 'tel:+441225338436',
                'intro_eyebrow' => 'How our menu pricing works',
                'intro_title' => 'Flexible support, <em>agreed upfront</em>',
                'intro_text' => "We begin with a complimentary initial telephone conversation of up to 30 minutes. You then choose only the support you need; there is no fixed ongoing package. The scope of work, likely time and any third-party spending are agreed in advance wherever reasonably possible.",
                'table_eyebrow' => 'Service pricing',
                'table_title' => 'Rates <em>at a glance</em>',
                'charges_eyebrow' => 'Additional charges',
                'charges_title' => 'How Additional <em>Charges Work</em>',
                'charge_items' => [
                    [
                        'icon' => 'i-pin',
                        'title' => 'Travel & Expenses',
                        'text' => "Travel time is charged from leaving base until return at the hourly rate applicable to the service being provided.\n\nThe first 5 miles are included. Mileage after the first 5 miles is charged at 40p per mile, calculated on the round trip.\n\nParking, tolls, congestion or clean-air charges and other direct travel expenses are charged at cost.",
                    ],
                    [
                        'icon' => 'i-keystone',
                        'title' => 'Procurement & Specialist Purchasing',
                        'text' => "Where a client asks Stonemere to source and purchase goods, including medical or specialist products, the purchase is agreed before commitment wherever reasonably possible.\n\nA procurement administration fee of 15% of the purchase cost applies, subject to a minimum charge of £25.\n\nThe cost of the goods is separate from the Stonemere fee.",
                    ],
                    [
                        'icon' => 'i-scale',
                        'title' => 'Tradespeople & Contractor Coordination',
                        'text' => "Where Stonemere arranges, books or coordinates tradespeople or other suppliers, a coordination fee of 15% of the third-party cost applies, subject to a minimum charge of £30.\n\nThe contractor or supplier's own invoice remains separate and is the client's responsibility.",
                    ],
                    [
                        'icon' => 'i-user',
                        'title' => 'Professional Referrals',
                        'text' => "For solicitors, domiciliary care providers and other approved professional referrers, referral-volume arrangements may be agreed.\n\nAfter 10 qualifying client referrals, a 10% referral fee on Stonemere service fees may be agreed with the referring organisation, where permitted by professional and regulatory rules and confirmed in writing.\n\nReferral fees do not apply to third-party costs or disbursements.",
                    ],
                    [
                        'icon' => 'i-lock',
                        'title' => 'Client Account',
                        'text' => "The minimum client account balance is £250.\n\nThe account provides funds against which agreed Stonemere professional services can be charged, helping us respond without waiting for individual invoices to be paid.\n\nTop-ups are normally made in £100 increments.\n\nThird-party supplier costs and purchases may be requested separately where appropriate.",
                    ],
                ],
                'agreement_eyebrow' => 'Before we begin',
                'agreement_title' => 'Agreement Before <em>Work Starts</em>',
                'agreement_text' => "Wherever reasonably possible, the service required, estimated time, travel and any third-party expenditure are agreed before work begins.\n\nPrices shown are guide rates and may vary where an assignment requires additional time, specialist support or an agreed project fee.\n\nNo ongoing contract is required unless a separate arrangement is agreed.",
                'faqs_eyebrow' => 'Questions',
                'faqs_title' => 'About <em>pricing</em>',
                'cta_eyebrow' => 'Next step',
                'cta_title' => 'Book your free consultation',
                'cta_text' => 'We begin with a complimentary initial telephone conversation of up to 30 minutes. Tell us what you need and we will recommend only the support that is right for you.',
                'cta_button_primary_text' => 'Message on WhatsApp',
                'cta_button_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20book%20a%20free%20telephone%20consultation.',
                'cta_button_secondary_text' => 'Call 01225 338436',
                'cta_button_secondary_url' => 'tel:+441225338436',
                'faqs_items' => [
                    [
                        'question' => 'How much does the initial telephone consultation cost?',
                        'answer' => 'Nothing. We begin with a complimentary initial telephone conversation of up to 30 minutes to understand your needs.',
                    ],
                    [
                        'question' => 'Is there a minimum client account balance?',
                        'answer' => 'Yes. The minimum client account balance is £250, with top-ups normally made in £100 increments.',
                    ],
                    [
                        'question' => 'How are travel expenses calculated?',
                        'answer' => 'Travel time is charged from leaving base until return at the hourly rate applicable to the service. The first 5 miles are included; mileage after that is charged at 40p per mile on the round trip, and parking, tolls and other direct travel expenses are charged at cost.',
                    ],
                    [
                        'question' => 'Are third-party costs included in service prices?',
                        'answer' => 'No. Third-party supplier costs and purchases are separate from Stonemere&rsquo;s service fees and may be requested separately where appropriate.',
                    ],
                    [
                        'question' => 'Can I choose individual services?',
                        'answer' => 'Yes. There is no fixed ongoing package — after the complimentary consultation you choose only the support you need.',
                    ],
                    [
                        'question' => 'Do I need an ongoing contract?',
                        'answer' => 'No ongoing contract is required unless a separate arrangement is agreed.',
                    ],
                    [
                        'question' => 'How do professional referral arrangements work?',
                        'answer' => 'For solicitors, domiciliary care providers and other approved professional referrers, referral-volume arrangements may be agreed. After 10 qualifying client referrals, a 10% referral fee on Stonemere service fees may be agreed where permitted and confirmed in writing; referral fees do not apply to third-party costs or disbursements.',
                    ],
                ],
                'meta_title' => 'Stonemere Life Management | Price Menu — Clear Rates & Flexible Support in Bath',
                'meta_description' => 'View Stonemere\'s price menu: clear hourly rates, service charges, travel and client account details for lifestyle management support in Bath.',
        ];
    }
}
