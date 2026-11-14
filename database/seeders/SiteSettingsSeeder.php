<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSettings::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Stonemere Life Management',
                'tagline' => 'Practical coordination for care providers, solicitors & health professionals in Bath',
                'phone' => '01225 338436',
                'whatsapp' => '07891 341414',
                'address' => 'Bath, Somerset',
                'default_meta_title' => 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath',
                'default_meta_description' => 'One named contact who coordinates the practical side of a client\'s life in Bath: family liaison, care liaison, property and urgent cases, alongside care providers, solicitors and health teams.',
                'social_media' => [
                    'linkedin' => null,
                    'twitter' => null,
                    'facebook' => null,
                ],
            ]
        );
    }
}
