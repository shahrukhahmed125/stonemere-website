<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'template_key' => 'home',
                'meta_title' => 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath',
                'meta_description' => 'One named contact who coordinates the practical side of a client\'s life in Bath: family liaison, care liaison, property and urgent cases.',
                'is_published' => true,
            ],
            [
                'title' => 'About',
                'slug' => 'about',
                'template_key' => 'about',
                'meta_title' => 'About Stonemere Life Management | Bath',
                'meta_description' => 'Learn about Stonemere Life Management and our practical coordination services for care providers, solicitors and health professionals in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Team',
                'slug' => 'team',
                'template_key' => 'team',
                'meta_title' => 'Our Team | Led by Paul Harrison | Stonemere Life Management, Bath',
                'meta_description' => 'Meet the Stonemere Life Management team providing practical coordination services in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'template_key' => 'services',
                'meta_title' => 'Services | Life Management in Bath | Stonemere',
                'meta_description' => 'Discover Stonemere\'s practical coordination services: family support, care liaison, property management and urgent cases in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Professionals',
                'slug' => 'professionals',
                'template_key' => 'professionals',
                'meta_title' => 'For Professionals | Refer a Client to Stonemere Life Management, Bath',
                'meta_description' => 'Stonemere provides practical coordination for care providers, solicitors, healthcare professionals and property professionals in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Price Menu',
                'slug' => 'price-menu',
                'template_key' => 'price-menu',
                'meta_title' => 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath',
                'meta_description' => 'View Stonemere\'s transparent pricing and membership levels for practical coordination services in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'template_key' => 'contact',
                'meta_title' => 'Contact Stonemere Life Management | Call 01225 338436 | Bath',
                'meta_description' => 'Get in touch with Stonemere Life Management for practical coordination services in Bath and Bath & North East Somerset.',
                'is_published' => true,
            ],
            [
                'title' => 'Family & Client Support',
                'slug' => 'family-client-support',
                'template_key' => 'service-area',
                'meta_title' => 'Family & Client Support in Bath | Stonemere Life Management',
                'meta_description' => 'Practical help for clients and their families in Bath: visits, paperwork, appointments and end-of-life coordination.',
                'is_published' => true,
            ],
            [
                'title' => 'Care & Professional Liaison',
                'slug' => 'care-professional-liaison',
                'template_key' => 'service-area',
                'meta_title' => 'Care & Professional Liaison, Hospital Discharge Support Bath | Stonemere',
                'meta_description' => 'Bridge the gap between families and care providers with Stonemere\'s professional liaison services in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Property & Asset Management',
                'slug' => 'property-asset-management',
                'template_key' => 'service-area',
                'meta_title' => 'Property & Asset Management, Vacant Property Checks Bath | Stonemere',
                'meta_description' => 'Practical property management for clients: maintenance, utilities, security and administrative support in Bath.',
                'is_published' => true,
            ],
            [
                'title' => 'Urgent & Complex Cases',
                'slug' => 'urgent-complex-cases',
                'template_key' => 'service-area',
                'meta_title' => 'Urgent & Complex Case Support, Same-Day Help Bath | Stonemere',
                'meta_description' => 'Rapid response for urgent and complex cases requiring practical coordination in Bath and Bath & North East Somerset.',
                'is_published' => true,
            ],
            [
                'title' => 'Privacy Notice',
                'slug' => 'privacy',
                'template_key' => 'legal',
                'meta_title' => 'Privacy Notice | Stonemere Life Management',
                'meta_description' => 'Stonemere Life Management privacy notice for clients and website users.',
                'is_published' => true,
            ],
            [
                'title' => 'Website Terms',
                'slug' => 'terms',
                'template_key' => 'legal',
                'meta_title' => 'Website Terms | Stonemere Life Management',
                'meta_description' => 'Terms of use for the Stonemere Life Management website.',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}
