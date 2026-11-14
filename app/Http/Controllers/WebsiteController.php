<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        try {
            $page = \App\Models\Page::where('slug', 'home')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        
        try {
            $membershipLevels = \App\Models\MembershipLevel::published()->ordered()->get();
        } catch (\Exception $e) {
            $membershipLevels = collect();
        }
        
        try {
            $faqItems = \App\Models\FaqItem::published()->ordered()->get();
        } catch (\Exception $e) {
            $faqItems = collect();
        }
        
        return view('pages.home', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'homeContent' => $this->contentOrNull(\App\Models\HomepageContent::class),
            'membershipLevels' => $membershipLevels,
            'faqItems' => $faqItems,
        ]);
    }

    public function about()
    {
        try {
            $page = \App\Models\Page::where('slug', 'about')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        return view('pages.about', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'aboutContent' => $this->contentOrNull(\App\Models\AboutContent::class),
        ]);
    }

    public function contact()
    {
        try {
            $page = \App\Models\Page::where('slug', 'contact')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        return view('pages.contact', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'contactContent' => $this->contentOrNull(\App\Models\ContactContent::class),
        ]);
    }

    public function team()
    {
        try {
            $page = \App\Models\Page::where('slug', 'team')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        
        try {
            $teamMembers = \App\Models\TeamMember::published()->ordered()->get();
        } catch (\Exception $e) {
            $teamMembers = collect();
        }
        
        return view('pages.team', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'teamContent' => $this->contentOrNull(\App\Models\TeamContent::class),
            'teamMembers' => $teamMembers,
        ]);
    }

    public function professionals()
    {
        try {
            $page = \App\Models\Page::where('slug', 'professionals')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        
        try {
            $audiences = \App\Models\ProfessionalAudience::published()->ordered()->get();
        } catch (\Exception $e) {
            $audiences = collect();
        }
        
        return view('pages.professionals', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'professionalsContent' => $this->contentOrNull(\App\Models\ProfessionalsContent::class),
            'audiences' => $audiences,
        ]);
    }
    
    public function services()
    {
        try {
            $page = \App\Models\Page::where('slug', 'services')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        
        try {
            $serviceAreas = \App\Models\ServiceArea::published()->ordered()->get();
        } catch (\Exception $e) {
            $serviceAreas = collect();
        }

        try {
            $servicesContent = $this->contentOrNull(\App\Models\ServicesContent::class);
        } catch (\Exception $e) {
            $servicesContent = null;
        }

        return view('pages.services', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'serviceAreas' => $serviceAreas,
            'servicesContent' => $servicesContent,
        ]);
    }
    
    public function priceMenu()
    {
        try {
            $page = \App\Models\Page::where('slug', 'price-menu')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        
        try {
            $membershipLevels = \App\Models\MembershipLevel::published()->ordered()->get();
        } catch (\Exception $e) {
            $membershipLevels = collect();
        }

        try {
            $pricingItems = \App\Models\PricingItem::where('type', 'separate')->orderBy('sort_order')->get();
        } catch (\Exception $e) {
            $pricingItems = collect();
        }

        return view('pages.price-menu', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'priceMenuContent' => $this->contentOrNull(\App\Models\PriceMenuContent::class),
            'membershipLevels' => $membershipLevels,
            'pricingItems' => $pricingItems,
        ]);
    }

    private function loadServiceArea(string $slug)
    {
        try {
            return \App\Models\ServiceArea::where('slug', $slug)
                ->with(['services' => fn ($q) => $q->published()->ordered(), 'scenarios' => fn ($q) => $q->ordered(), 'timelineItems' => fn ($q) => $q->ordered(), 'checkItems' => fn ($q) => $q->ordered(), 'faqs' => fn ($q) => $q->ordered(), 'callFlowItems' => fn ($q) => $q->ordered()])
                ->first();
        } catch (\Exception $e) {
            return null;
        }
    }

    private function contentOrNull(string $class)
    {
        try {
            return $class::current();
        } catch (\Exception $e) {
            return null;
        }
    }

    private function serviceAreaPage(string $slug)
    {
        try {
            return \App\Models\Page::where('slug', $slug)->where('is_published', true)->first();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function familyClientSupport()
    {
        return view('pages.family-client-support', [
            'serviceArea' => $this->loadServiceArea('family-client-support'),
            'page' => $this->serviceAreaPage('family-client-support'),
        ]);
    }

    public function careProfessionalLiaison()
    {
        return view('pages.care-professional-liaison', [
            'serviceArea' => $this->loadServiceArea('care-professional-liaison'),
            'page' => $this->serviceAreaPage('care-professional-liaison'),
        ]);
    }

    public function propertyAssetManagement()
    {
        return view('pages.property-asset-management', [
            'serviceArea' => $this->loadServiceArea('property-asset-management'),
            'page' => $this->serviceAreaPage('property-asset-management'),
        ]);
    }

    public function urgentComplexCases()
    {
        return view('pages.urgent-complex-cases', [
            'serviceArea' => $this->loadServiceArea('urgent-complex-cases'),
            'page' => $this->serviceAreaPage('urgent-complex-cases'),
        ]);
    }

    public function privacy()
    {
        try {
            $page = \App\Models\Page::where('slug', 'privacy')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        return view('pages.privacy', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'privacyContent' => $this->contentOrNull(\App\Models\PrivacyContent::class),
        ]);
    }

    public function terms()
    {
        try {
            $page = \App\Models\Page::where('slug', 'terms')->where('is_published', true)->first();
        } catch (\Exception $e) {
            $page = null;
        }
        return view('pages.terms', [
            'page' => $page,
            'content' => $page?->content ?? [],
            'termsContent' => $this->contentOrNull(\App\Models\TermsContent::class),
        ]);
    }

}
