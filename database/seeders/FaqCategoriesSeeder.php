<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'General',
                'slug' => 'general',
                'page_reference' => 'home',
                'sort_order' => 0,
            ],
        ];

        foreach ($categories as $category) {
            FaqCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
