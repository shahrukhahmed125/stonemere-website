<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use App\Models\VacantPropertyCheckItem;
use Illuminate\Database\Seeder;

class VacantPropertyCheckItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceArea = ServiceArea::where('slug', 'property-asset-management')->first();

        if (!$serviceArea) {
            return;
        }

        $checkItems = [
            [
                'item_text' => 'Security: doors, windows and locks',
                'is_default_checked' => true,
                'sort_order' => 1,
            ],
            [
                'item_text' => 'Post collected and dealt with',
                'is_default_checked' => true,
                'sort_order' => 2,
            ],
            [
                'item_text' => 'Heating, water and signs of leaks',
                'is_default_checked' => true,
                'sort_order' => 3,
            ],
            [
                'item_text' => 'Access for contractors and agents',
                'is_default_checked' => false,
                'sort_order' => 4,
            ],
            [
                'item_text' => 'Condition noted and reported back',
                'is_default_checked' => false,
                'sort_order' => 5,
            ],
            [
                'item_text' => 'Anything urgent acted on',
                'is_default_checked' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($checkItems as $item) {
            VacantPropertyCheckItem::updateOrCreate(
                [
                    'service_area_id' => $serviceArea->id,
                    'item_text' => $item['item_text'],
                ],
                [
                    'is_default_checked' => $item['is_default_checked'],
                    'sort_order' => $item['sort_order'],
                ]
            );
        }
    }
}
