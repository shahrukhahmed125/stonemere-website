<?php

namespace Tests\Feature;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use App\Models\MembershipLevel;
use App\Models\PricingItem;
use App\Models\ServiceArea;
use App\Models\Service;
use App\Models\ServiceScenario;
use App\Models\ServiceAreaTimelineItem;
use App\Models\VacantPropertyCheckItem;
use App\Models\SiteSettings;
use App\Models\Page;
use App\Models\NavigationItem;
use App\Models\ProfessionalAudience;
use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_settings_model_loads_correctly()
    {
        $settings = SiteSettings::getSettings();
        
        $this->assertInstanceOf(SiteSettings::class, $settings);
        $this->assertEquals('Stonemere Life Management', $settings->company_name);
        $this->assertEquals('01225 338436', $settings->phone);
    }

    public function test_page_model_loads_and_scopes_work()
    {
        Page::create(['title' => 'Test Page', 'slug' => 'test-page', 'template_key' => 'test', 'is_published' => true]);
        Page::create(['title' => 'Draft Page', 'slug' => 'draft-page', 'template_key' => 'test', 'is_published' => false]);
        
        $published = Page::published()->get();
        $all = Page::all();
        
        $this->assertCount(1, $published);
        $this->assertCount(2, $all);
    }

    public function test_navigation_item_parent_child_relationships_work()
    {
        $parent = NavigationItem::create(['label' => 'Parent', 'url' => '/parent', 'location' => 'header']);
        $child = NavigationItem::create(['label' => 'Child', 'url' => '/child', 'location' => 'header', 'parent_id' => $parent->id]);
        
        $this->assertCount(1, $parent->children);
        $this->assertEquals($parent->id, $child->parent->id);
    }

    public function test_service_area_has_many_services()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        $service1 = Service::create(['service_area_id' => $serviceArea->id, 'title' => 'Service 1']);
        $service2 = Service::create(['service_area_id' => $serviceArea->id, 'title' => 'Service 2']);
        
        $this->assertCount(2, $serviceArea->services);
        $this->assertEquals($serviceArea->id, $service1->serviceArea->id);
    }

    public function test_service_area_has_many_scenarios()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        $scenario1 = ServiceScenario::create(['service_area_id' => $serviceArea->id, 'title' => 'Scenario 1']);
        $scenario2 = ServiceScenario::create(['service_area_id' => $serviceArea->id, 'title' => 'Scenario 2']);
        
        $this->assertCount(2, $serviceArea->scenarios);
        $this->assertEquals($serviceArea->id, $scenario1->serviceArea->id);
    }

    public function test_faq_category_has_many_faq_items()
    {
        $category = FaqCategory::create(['name' => 'Test Category', 'slug' => 'test-category']);
        $item1 = FaqItem::create(['faq_category_id' => $category->id, 'question' => 'Question 1', 'answer' => 'Answer 1']);
        $item2 = FaqItem::create(['faq_category_id' => $category->id, 'question' => 'Question 2', 'answer' => 'Answer 2']);
        
        $this->assertCount(2, $category->faqItems);
        $this->assertEquals($category->id, $item1->faqCategory->id);
    }

    public function test_membership_level_has_many_pricing_items()
    {
        $level = MembershipLevel::create(['name' => 'Test Level', 'slug' => 'test-level']);
        $item1 = PricingItem::create(['membership_level_id' => $level->id, 'name' => 'Item 1']);
        $item2 = PricingItem::create(['membership_level_id' => $level->id, 'name' => 'Item 2']);
        
        $this->assertCount(2, $level->pricingItems);
        $this->assertEquals($level->id, $item1->membershipLevel->id);
    }

    public function test_json_fields_cast_correctly()
    {
        $settings = SiteSettings::create([
            'company_name' => 'Test',
            'phone' => '123',
            'social_media' => ['linkedin' => 'test', 'twitter' => 'test']
        ]);
        
        $this->assertIsArray($settings->social_media);
        $this->assertEquals('test', $settings->social_media['linkedin']);
    }

    public function test_boolean_fields_cast_correctly()
    {
        $page = Page::create(['title' => 'Test', 'slug' => 'test', 'template_key' => 'test', 'is_published' => true]);
        
        $this->assertIsBool($page->is_published);
        $this->assertTrue($page->is_published);
    }

    public function test_slug_uniqueness_works()
    {
        Page::create(['title' => 'Test', 'slug' => 'unique-slug', 'template_key' => 'test']);
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        Page::create(['title' => 'Test 2', 'slug' => 'unique-slug', 'template_key' => 'test']);
    }

    public function test_foreign_key_constraints_work()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        $service = Service::create(['service_area_id' => $serviceArea->id, 'title' => 'Service']);
        
        $this->assertEquals($serviceArea->id, $service->serviceArea->id);
    }

    public function test_scopes_work_correctly()
    {
        ServiceArea::create(['name' => 'Published', 'slug' => 'published', 'number' => 1, 'is_published' => true, 'sort_order' => 2]);
        ServiceArea::create(['name' => 'Draft', 'slug' => 'draft', 'number' => 2, 'is_published' => false, 'sort_order' => 1]);
        
        $published = ServiceArea::published()->ordered()->get();
        
        $this->assertCount(1, $published);
        $this->assertEquals('Published', $published->first()->name);
    }

    public function test_service_area_has_many_timeline_items()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        $timeline1 = ServiceAreaTimelineItem::create(['service_area_id' => $serviceArea->id, 'tab_label' => 'Tab 1', 'tab_id' => 'tab-1', 'content' => ['item1']]);
        $timeline2 = ServiceAreaTimelineItem::create(['service_area_id' => $serviceArea->id, 'tab_label' => 'Tab 2', 'tab_id' => 'tab-2', 'content' => ['item2']]);
        
        $this->assertCount(2, $serviceArea->timelineItems);
        $this->assertEquals($serviceArea->id, $timeline1->serviceArea->id);
        $this->assertIsArray($timeline1->content);
    }

    public function test_service_area_has_many_check_items()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        $check1 = VacantPropertyCheckItem::create(['service_area_id' => $serviceArea->id, 'item_text' => 'Check 1', 'is_default_checked' => true]);
        $check2 = VacantPropertyCheckItem::create(['service_area_id' => $serviceArea->id, 'item_text' => 'Check 2', 'is_default_checked' => false]);
        
        $this->assertCount(2, $serviceArea->checkItems);
        $this->assertEquals($serviceArea->id, $check1->serviceArea->id);
        $this->assertTrue($check1->is_default_checked);
        $this->assertFalse($check2->is_default_checked);
    }

    public function test_timeline_items_scope_ordered()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        ServiceAreaTimelineItem::create(['service_area_id' => $serviceArea->id, 'tab_label' => 'Tab 2', 'tab_id' => 'tab-2', 'content' => [], 'sort_order' => 2]);
        ServiceAreaTimelineItem::create(['service_area_id' => $serviceArea->id, 'tab_label' => 'Tab 1', 'tab_id' => 'tab-1', 'content' => [], 'sort_order' => 1]);
        
        $ordered = ServiceAreaTimelineItem::ordered()->get();
        
        $this->assertCount(2, $ordered);
        $this->assertEquals('Tab 1', $ordered->first()->tab_label);
    }

    public function test_check_items_scope_default_checked()
    {
        $serviceArea = ServiceArea::create(['name' => 'Test Area', 'slug' => 'test-area', 'number' => 1]);
        VacantPropertyCheckItem::create(['service_area_id' => $serviceArea->id, 'item_text' => 'Check 1', 'is_default_checked' => true]);
        VacantPropertyCheckItem::create(['service_area_id' => $serviceArea->id, 'item_text' => 'Check 2', 'is_default_checked' => false]);
        
        $defaultChecked = VacantPropertyCheckItem::defaultChecked()->get();
        
        $this->assertCount(1, $defaultChecked);
        $this->assertEquals('Check 1', $defaultChecked->first()->item_text);
    }
}
