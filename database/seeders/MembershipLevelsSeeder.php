<?php

namespace Database\Seeders;

use App\Models\MembershipLevel;
use Illuminate\Database\Seeder;

class MembershipLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membershipLevels = [
            [
                'name' => 'Silver',
                'slug' => 'silver',
                'description' => 'Occasional, dependable help',
                'price_text' => 'Monthly membership · rate on request',
                'features' => [
                    'A named Stonemere contact',
                    'Help with appointments, admin and the odd practical problem',
                    'Typically suits clients who are largely independent',
                ],
                'color' => '#C0C0C0',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'Gold',
                'slug' => 'gold',
                'description' => 'Regular, ongoing coordination',
                'price_text' => 'Monthly membership · rate on request',
                'features' => [
                    'A named contact who holds the whole picture',
                    'Regular practical help across the organisations involved',
                    'Typically suits several organisations being involved',
                ],
                'color' => '#FFD700',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'name' => 'Platinum',
                'slug' => 'platinum',
                'description' => 'Complex situations and families at a distance',
                'price_text' => 'Monthly membership · rate on request',
                'features' => [
                    'Coordination across many parties',
                    'Frequent updates for families near and far',
                    'Typically suits complex or changing circumstances',
                ],
                'color' => '#E5E4E2',
                'sort_order' => 3,
                'is_published' => true,
            ],
        ];

        foreach ($membershipLevels as $level) {
            MembershipLevel::updateOrCreate(
                ['slug' => $level['slug']],
                $level
            );
        }
    }
}
