<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use App\Models\ServiceAreaTimelineItem;
use Illuminate\Database\Seeder;

class ServiceAreaTimelineItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceArea = ServiceArea::where('slug', 'care-professional-liaison')->first();

        if (!$serviceArea) {
            return;
        }

        $timelineItems = [
            [
                'tab_label' => 'Before discharge',
                'tab_id' => 'tab-before',
                'content' => [
                    'Home checked, warm and ready',
                    'Shopping and essential supplies in',
                    'Family and services told what is happening',
                    'Transport arranged',
                ],
                'sort_order' => 1,
            ],
            [
                'tab_label' => 'On the day',
                'tab_id' => 'tab-day',
                'content' => [
                    'Settling in at home',
                    'Prescriptions and paperwork followed up',
                    'Care provider and family kept in step',
                    'A named contact if anything goes wrong',
                ],
                'sort_order' => 2,
            ],
            [
                'tab_label' => 'The weeks after',
                'tab_id' => 'tab-after',
                'content' => [
                    'Follow-up appointments booked and attended',
                    'Welfare visits as agreed',
                    'Correspondence and admin dealt with',
                    'Updates to family and referrer',
                ],
                'sort_order' => 3,
            ],
        ];

        foreach ($timelineItems as $item) {
            ServiceAreaTimelineItem::updateOrCreate(
                [
                    'service_area_id' => $serviceArea->id,
                    'tab_id' => $item['tab_id'],
                ],
                [
                    'tab_label' => $item['tab_label'],
                    'content' => $item['content'],
                    'sort_order' => $item['sort_order'],
                ]
            );
        }
    }
}
