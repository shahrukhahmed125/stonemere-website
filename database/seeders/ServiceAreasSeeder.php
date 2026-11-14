<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use Illuminate\Database\Seeder;

class ServiceAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceAreas = [
            [
                'name' => 'Family & Client Support',
                'slug' => 'family-client-support',
                'number' => 1,
                'short_description' => 'Practical help for clients and their families, from regular visits and paperwork to the hardest moments at the end of life.',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'Care Professional Liaison',
                'slug' => 'care-professional-liaison',
                'number' => 2,
                'short_description' => 'Bridge the gap between families and care providers, ensuring clients get the support they need.',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'name' => 'Property & Asset Management',
                'slug' => 'property-asset-management',
                'number' => 3,
                'short_description' => 'Keep clients\' homes and assets safe and maintained when they cannot manage them themselves.',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'name' => 'Urgent & Complex Cases',
                'slug' => 'urgent-complex-cases',
                'number' => 4,
                'short_description' => 'Rapid response for urgent situations and coordination of complex cases involving multiple providers.',
                'sort_order' => 4,
                'is_published' => true,
            ],
        ];

        foreach ($serviceAreas as $serviceArea) {
            ServiceArea::updateOrCreate(
                ['slug' => $serviceArea['slug']],
                $serviceArea
            );
        }
    }
}
