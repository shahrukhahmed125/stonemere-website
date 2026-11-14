@extends('layouts.app')
@section('title', $servicesContent?->meta_title ?: ($page?->meta_title ?: 'Services | Life Management in Bath | Stonemere'))
@if($servicesContent?->meta_description || $page?->meta_description)
@section('meta_description', $servicesContent?->meta_description ?: $page->meta_description)
@endif
@if($servicesContent?->meta_keywords)
@section('meta_keywords', $servicesContent->meta_keywords)
@elseif($page?->meta_keywords)
@section('meta_keywords', $page->meta_keywords)
@endif
@if($servicesContent?->og_title || $page?->og_title)
@section('og_title', $servicesContent?->og_title ?: $page->og_title)
@endif
@if($servicesContent?->og_description || $page?->og_description)
@section('og_description', $servicesContent?->og_description ?: $page->og_description)
@endif
@if($servicesContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($servicesContent->og_image))
@elseif($page?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($page->og_image))
@endif
@if($page?->canonical_url)
@section('canonical_url', $page->canonical_url)
@endif

@section('css')

@endsection

@section('content')

<main id="main" tabindex="-1">
<section class="phero" aria-labelledby="page-title">
  <div class="phero__layers" aria-hidden="true">
    <img class="phero__layer" data-parallax="0.12" src="{{ asset('assets/images/art/hero-layer-back.svg') }}" alt="" width="2400" height="900">
    <img class="phero__layer" data-parallax="0.22" src="{{ asset('assets/images/art/hero-layer-mid.svg') }}" alt="" width="2400" height="900">
  </div>
  <div class="wrap phero__grid">
    <div class="phero__text">
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">Services</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">{{ $servicesContent?->hero_eyebrow ?? ($content['hero']['eyebrow'] ?? 'Services') }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($servicesContent?->hero_title ?? ($content['hero']['title'] ?? 'Four service areas, <em>one trusted contact</em>'))</h1>
      <p class="phero__lead" data-reveal>{{ $servicesContent?->hero_lead ?? ($content['hero']['lead'] ?? 'Everything Stonemere does falls into four areas. Each can be arranged on its own, and all of them are coordinated by the same named person.') }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $servicesContent?->hero_cta_primary_url ?? ($content['hero']['cta_primary']['url'] ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20which%20of%20your%20services%20would%20fit%20a%20client.') }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $servicesContent?->hero_cta_primary_text ?? ($content['hero']['cta_primary']['text'] ?? 'Ask which fits') }}">{{ $servicesContent?->hero_cta_primary_text ?? ($content['hero']['cta_primary']['text'] ?? 'Ask which fits') }}</span></a><a class="btn btn--line-light" href="{{ $servicesContent?->hero_cta_secondary_url ?? ($content['hero']['cta_secondary']['url'] ?? '/price-menu') }}" data-magnetic><span class="roll" data-text="{{ $servicesContent?->hero_cta_secondary_text ?? ($content['hero']['cta_secondary']['text'] ?? 'Price menu') }}">{{ $servicesContent?->hero_cta_secondary_text ?? ($content['hero']['cta_secondary']['text'] ?? 'Price menu') }}</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-services.svg') }}" width="800" height="1000" alt="Illustration of four connected squares, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="index" aria-labelledby="index-title">
  <div class="wrap">
    <h2 id="index-title" class="sr">The four service areas</h2>
    <ol class="index__list" role="list" data-rows-hover>
      @php
      $serviceAreas = $serviceAreas ?? collect([
          (object)['number' => 1, 'name' => 'Family & Client Support', 'slug' => 'family-client-support', 'short_description' => 'Family liaison, welfare visits, appointments, admin, end-of-life and post-death coordination', 'hero_image' => 'assets/images/art/area-family.svg'],
          (object)['number' => 2, 'name' => 'Care & Professional Liaison', 'slug' => 'care-professional-liaison', 'short_description' => 'Case management, health and care coordination, care-provider liaison and appointments', 'hero_image' => 'assets/images/art/area-care.svg'],
          (object)['number' => 3, 'name' => 'Property & Asset Management', 'slug' => 'property-asset-management', 'short_description' => 'Oversight, vacant property checks, contractors, downsizing, clearance, storage and disposal', 'hero_image' => 'assets/images/art/area-property.svg'],
          (object)['number' => 4, 'name' => 'Urgent & Complex Cases', 'slug' => 'urgent-complex-cases', 'short_description' => 'Same-day and out-of-hours help, crisis coordination and complex multi-party cases', 'hero_image' => 'assets/images/art/area-urgent.svg'],
      ]);
      @endphp
      @foreach($serviceAreas as $index => $area)
      <li class="index__row" data-preview="{{ \App\Helpers\ImageUrlHelper::resolve($area->hero_image ?? 'assets/images/art/area-family.svg') }}">
        <a href="{{ route($area->slug) }}" data-cursor="Explore">
          <span class="index__n">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
          <span class="index__title">@safeHtml($area->name)</span>
          <span class="index__desc">{{ $area->short_description }}</span>
          <svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg>
        </a>
      </li>
      @endforeach
    </ol>
  </div>
  <div class="rows__preview" aria-hidden="true"><img src="{{ \App\Helpers\ImageUrlHelper::resolve($serviceAreas->first()->hero_image ?? 'assets/images/art/area-family.svg') }}" alt="" width="800" height="1000"></div>
</section>

<section class="pick" aria-labelledby="pick-title">
  <div class="wrap pick__grid">
    <div>
      <p class="eyebrow eyebrow--light">Choosing</p>
      <h2 id="pick-title" data-split>Not sure <em>where to start?</em></h2>
      <p>Most cases touch more than one area. Tell us the situation and we will shape the support around it, with one person responsible for all of it.</p>
    </div>
    <ul class="pick__list" role="list">
      <li data-reveal><span>A client struggling at home, family far away</span><a class="tlink" href="{{ route('family-client-support') }}">Family &amp; Client Support<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>Several services and nobody joining them up</span><a class="tlink" href="{{ route('care-professional-liaison') }}">Care &amp; Professional Liaison<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>An empty or changing property</span><a class="tlink" href="{{ route('property-asset-management') }}">Property &amp; Asset Management<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>Something has happened today</span><a class="tlink" href="{{ route('urgent-complex-cases') }}">Urgent &amp; Complex Cases<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
    </ul>
  </div>
</section>

<section class="bounds bounds--compact" aria-labelledby="sb-title">
  <h2 id="sb-title" class="sr">What we do and what we don't</h2>
  <div class="bounds__half bounds__half--do" data-reveal="wipe"><div class="bounds__inner"><p class="bounds__label"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>We do</p><p class="bounds__big">Practical coordination, carried through to completion.</p></div></div>
  <div class="bounds__half bounds__half--dont" data-reveal="wipe"><div class="bounds__inner"><p class="bounds__label"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-x"/></svg>We never</p><p class="bounds__big">Medical treatment, nursing, personal care, legal or financial advice.</p></div></div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">{{ $servicesContent?->cta_eyebrow ?? ($content['cta']['eyebrow'] ?? 'Next step') }}</p>
      <h2 id="cta-band-title" data-split>{{ $servicesContent?->cta_title ?? ($content['cta']['title'] ?? 'Tell us what is happening') }}</h2>
      <p>{{ $servicesContent?->cta_text ?? ($content['cta']['text'] ?? 'One conversation is enough to know whether we can help.') }}</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="{{ $servicesContent?->cta_button_primary_url ?? ($content['cta']['button_primary']['url'] ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support.') }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $servicesContent?->cta_button_primary_text ?? ($content['cta']['button_primary']['text'] ?? 'Message on WhatsApp') }}">{{ $servicesContent?->cta_button_primary_text ?? ($content['cta']['button_primary']['text'] ?? 'Message on WhatsApp') }}</span></a>
      <a class="btn btn--line" href="{{ $servicesContent?->cta_button_secondary_url ?? ($content['cta']['button_secondary']['url'] ?? 'tel:+441225338436') }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $servicesContent?->cta_button_secondary_text ?? ($content['cta']['button_secondary']['text'] ?? 'Call 01225 338436') }}">{{ $servicesContent?->cta_button_secondary_text ?? ($content['cta']['button_secondary']['text'] ?? 'Call 01225 338436') }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection