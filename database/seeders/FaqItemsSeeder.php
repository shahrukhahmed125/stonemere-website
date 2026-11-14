<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generalCategory = FaqCategory::where('slug', 'general')->first();

        if (!$generalCategory) {
            return;
        }

        $generalFaqs = [
            [
                'question' => 'Is Stonemere a care agency?',
                'answer' => 'No. We do not provide personal care, nursing or medical treatment. We coordinate the practical side of a client\'s life and work alongside the care provider, health team or solicitor who is already involved.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Who can refer a client to Stonemere?',
                'answer' => 'Domiciliary care companies, solicitors, healthcare professionals, property professionals and other organisations can refer. Families can contact us directly, and so can clients themselves.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Who pays for the work?',
                'answer' => 'The client, their family or representative, or the referring organisation. Who pays, what is included and what is charged separately is agreed in writing before any work begins.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Which areas do you cover?',
                'answer' => 'Bath first, concentrating on about a five-mile radius of the city, then the wider Bath & North East Somerset area. We can coordinate matters further afield for existing clients and their families.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Can you help at short notice?',
                'answer' => 'Yes. Same-day support and out-of-hours assistance are part of our Urgent & Complex Case Support. Call 01225 338436 and tell us what has happened.',
                'sort_order' => 5,
            ],
            [
                'question' => 'What does it cost?',
                'answer' => 'Ongoing support runs on a monthly membership credited to the client\'s own account. Transport, purchases, third-party costs and crisis work are charged separately and agreed first. The price menu explains how it works.',
                'sort_order' => 6,
            ],
        ];

        foreach ($generalFaqs as $faq) {
            FaqItem::updateOrCreate(
                [
                    'faq_category_id' => $generalCategory->id,
                    'question' => $faq['question'],
                ],
                [
                    'answer' => $faq['answer'],
                    'sort_order' => $faq['sort_order'],
                    'is_published' => true,
                ]
            );
        }
    }
}
