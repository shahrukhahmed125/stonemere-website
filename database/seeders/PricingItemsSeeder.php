<?php

namespace Database\Seeders;

use App\Models\PricingItem;
use Illuminate\Database\Seeder;

class PricingItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricingItems = [
            [
                'name' => 'Transport',
                'description' => 'Including accompanied journeys',
                'type' => 'separate',
                'sort_order' => 1,
            ],
            [
                'name' => 'Procurement',
                'description' => 'Goods and services bought on the client\'s behalf',
                'type' => 'separate',
                'sort_order' => 2,
            ],
            [
                'name' => 'Third-party charges',
                'description' => 'Removals, storage, shipping, tradespeople and similar',
                'type' => 'separate',
                'sort_order' => 3,
            ],
            [
                'name' => 'Crisis Management',
                'description' => 'Urgent work, charged separately when it is needed',
                'type' => 'separate',
                'sort_order' => 4,
            ],
            [
                'name' => 'Organisations',
                'description' => 'Work for a referring organisation is quoted per case, in writing',
                'type' => 'separate',
                'sort_order' => 5,
            ],
        ];

        foreach ($pricingItems as $item) {
            PricingItem::updateOrCreate(
                [
                    'name' => $item['name'],
                ],
                [
                    'description' => $item['description'],
                    'type' => $item['type'],
                    'sort_order' => $item['sort_order'],
                ]
            );
        }
    }
}
