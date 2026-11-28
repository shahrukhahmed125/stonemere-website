@extends('layouts.app')
@section('title', $page?->meta_title ?: 'Care & Professional Liaison, Hospital Discharge Support Bath | Stonemere')
@if($page?->meta_description)
@section('meta_description', $page->meta_description)
@endif
@if($page?->canonical_url)
@section('canonical_url', $page->canonical_url)
@endif
@if($page?->meta_description)
@section('meta_description', $page->meta_description)
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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><a href="{{ route('services') }}">Services</a></li><li><span aria-current="page">Service area {{ str_pad($serviceArea?->number ?? 2, 2, '0', STR_PAD_LEFT) }}</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area {{ str_pad($serviceArea?->number ?? 2, 2, '0', STR_PAD_LEFT) }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($serviceArea?->name ?? 'Care &amp; Professional <em>Liaison</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $serviceArea?->hero_lead ?? $serviceArea?->short_description ?? 'The coordinating link between the client, their family and the professionals around them, so nothing falls between organisations.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $serviceArea?->hero_cta_primary_url ?? 'https://wa.me/44777753092?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $serviceArea?->hero_cta_primary_text ?? 'Ask about this area' }}">{{ $serviceArea?->hero_cta_primary_text ?? 'Ask about this area' }}</span></a><a class="btn btn--line-light" href="{{ $serviceArea?->hero_cta_secondary_url ?? 'tel:+443330541060' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $serviceArea?->hero_cta_secondary_text ?? 'Call +44 3330 541060' }}">{{ $serviceArea?->hero_cta_secondary_text ?? 'Call +44 3330 541060' }}</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ \App\Helpers\ImageUrlHelper::resolve($serviceArea?->hero_image ?? 'assets/images/art/area-care.svg') }}" width="800" height="1000" alt="Illustration for {{ $serviceArea?->name ?? 'Care & Professional Liaison' }}, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">{{ $serviceArea?->services_eyebrow ?? 'What this covers' }}</p>
      <h2 id="svc-title" data-split>@safeHtml(str_replace('{count}', $serviceArea?->services?->count() ?? 4, $serviceArea?->services_heading ?? '{count} services, <em>one contact</em>'))</h2>
      <p>{{ $serviceArea?->services_intro ?? 'Each one can be arranged on its own or as part of ongoing support.' }}</p>
    </div>
    <ol class="svc__list" role="list">
      @foreach($serviceArea?->services ?? [] as $index => $service)
      <li class="svc__item" data-reveal><span class="svc__n">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><div><h3>@safeHtml($service->title)</h3><p>{{ $service->description }}</p></div></li>
      @endforeach
    </ol>
  </div>
</section>

<section class="timeline" aria-labelledby="tl-title" data-tabs>
  <div class="wrap">
    <div class="timeline__head">
      <p class="eyebrow">{{ $serviceArea?->timeline_eyebrow ?? 'Hospital discharge' }}</p>
      <h2 id="tl-title" data-split>@safeHtml($serviceArea?->timeline_heading ?? 'Coming home, <em>properly prepared</em>')</h2>
    </div>
    <div class="tabs" role="tablist" aria-label="Hospital discharge stages">
      @foreach($serviceArea?->timelineItems ?? [] as $index => $tab)
      <button class="tab" role="tab" id="{{ $tab->tab_id ?? 'tab-'.$index }}" aria-controls="panel-{{ $index }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}"{{ $index > 0 ? ' tabindex="-1"' : '' }}>{{ $tab->tab_label }}</button>
      @endforeach
      <span class="tabs__ink" aria-hidden="true"></span>
    </div>
    @foreach($serviceArea?->timelineItems ?? [] as $index => $tab)
    <div class="tabpanel" role="tabpanel" id="panel-{{ $index }}" aria-labelledby="{{ $tab->tab_id ?? 'tab-'.$index }}" tabindex="0"{{ $index > 0 ? ' hidden' : '' }}><ul class="ticks ticks--cols" role="list">@foreach($tab->content ?? [] as $tick)<li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>{{ $tick }}</li>@endforeach</ul></div>
    @endforeach
  </div>
</section>

<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">{{ $serviceArea?->scenarios_eyebrow ?? 'Typical situations' }}</p>
    <h2 id="sits-title" class="sits__title" data-split>@safeHtml($serviceArea?->scenarios_heading ?? 'When people <em>call us</em>')</h2>
    <div class="sits__grid">
      @php $scenarioImages = ['assets/images/art/sit-hospital.svg', 'assets/images/art/sit-distance.svg']; @endphp
      @foreach(($serviceArea?->scenarios ?? collect()) as $index => $scenario)
      <article class="sit {{ $index % 2 === 1 ? 'sit--offset' : '' }}" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ \App\Helpers\ImageUrlHelper::resolve($scenario->image ?? ($scenarioImages[$index] ?? 'assets/images/art/sit-hospital.svg')) }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>@safeHtml($scenario->title)</h3><p>{{ $scenario->description }}</p>
      </article>
      @endforeach
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">{{ $serviceArea?->faqs_eyebrow ?? 'Questions' }}</p><h2 id="afaq-title" data-split>@safeHtml($serviceArea?->faqs_heading ?? 'Good to <em>know</em>')</h2></div>
    <div class="faq" data-faq>
      @foreach($serviceArea?->faqs ?? [] as $index => $faq)
      <div class="faq__item">
        <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a{{ $index }}" id="afaq-q{{ $index }}">{{ $faq->question ?? '' }}<span class="faq__icon" aria-hidden="true"></span></button></h3>
        <div class="faq__a" id="afaq-a{{ $index }}" role="region" aria-labelledby="afaq-q{{ $index }}"><div class="faq__inner"><p>@safeHtml($faq->answer ?? '')</p></div></div>
      </div>
      @endforeach
</div>
  </div>
</section>

@if($nextArea ?? null)
<a class="next-area" href="{{ route($nextArea->slug) }}" data-cursor="Next">
  <span class="wrap next-area__inner"><span class="next-area__label">Next service area</span><span class="next-area__title">@safeHtml($nextArea->name)</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
</a>
@endif

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">{{ $serviceArea?->cta_eyebrow ?? 'Next step' }}</p>
      <h2 id="cta-band-title" data-split>@safeHtml($serviceArea?->cta_heading ?? 'Talk to us about this area')</h2>
      <p>{{ $serviceArea?->cta_text ?? 'Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.' }}</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="{{ $serviceArea?->cta_primary_url ?? 'https://wa.me/44777753092?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $serviceArea?->cta_primary_text ?? 'Message on WhatsApp' }}">{{ $serviceArea?->cta_primary_text ?? 'Message on WhatsApp' }}</span></a>
      <a class="btn btn--line" href="{{ $serviceArea?->cta_secondary_url ?? 'tel:+443330541060' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $serviceArea?->cta_secondary_text ?? 'Call +44 3330 541060' }}">{{ $serviceArea?->cta_secondary_text ?? 'Call +44 3330 541060' }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection