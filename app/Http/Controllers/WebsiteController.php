<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function professionals()
    {
        return view('pages.professionals');
    }
    
    public function services()
    {
        return view('pages.services');
    }
    
    public function priceMenu()
    {
        return view('pages.price-menu');
    }

    public function familyClientSupport()
    {
        return view('pages.family-client-support');
    }

    public function careProfessionalLiaison()
    {
        return view('pages.care-professional-liaison');
    }
    
    public function propertyAssetManagement()
    {
        return view('pages.property-asset-management');
    }

    public function urgentComplexCases()
    {
        return view('pages.urgent-complex-cases');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

}
