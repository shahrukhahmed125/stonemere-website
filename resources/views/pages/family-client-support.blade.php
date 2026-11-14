@extends('layouts.app')
@section('title', $page?->meta_title ?: 'Family & Client Support in Bath | Stonemere Life Management')
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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><a href="{{ route('services') }}">Services</a></li><li><span aria-current="page">Service area {{ str_pad($serviceArea?->number ?? 1, 2, '0', STR_PAD_LEFT) }}</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area {{ str_pad($serviceArea?->number ?? 1, 2, '0', STR_PAD_LEFT) }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($serviceArea?->name ?? 'Family &amp; Client <em>Support</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $serviceArea?->page_content['lead'] ?? $serviceArea?->short_description ?? 'Practical help for clients and their families, from regular visits and paperwork to the hardest moments at the end of life.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Family%20%26%20Client%20Support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about this area">Ask about this area</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ \App\Helpers\ImageUrlHelper::resolve($serviceArea?->hero_image ?? 'assets/images/art/area-family.svg') }}" width="800" height="1000" alt="Illustration for {{ $serviceArea?->name ?? 'Family & Client Support' }}, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">What this covers</p>
      <h2 id="svc-title" data-split>{{ $serviceArea?->services?->count() ?? 6 }} services, <em>one contact</em></h2>
      <p>Each one can be arranged on its own or as part of ongoing support.</p>
    </div>
    <ol class="svc__list" role="list">
      @foreach($serviceArea?->services ?? [] as $index => $service)
      <li class="svc__item" data-reveal><span class="svc__n">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><div><h3>@safeHtml($service->title)</h3><p>{{ $service->description }}</p></div></li>
      @endforeach
    </ol>
  </div>
</section>



<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">Typical situations</p>
    <h2 id="sits-title" class="sits__title" data-split>When people <em>call us</em></h2>
    <div class="sits__grid">
      @php $scenarioImages = ['assets/images/art/sit-distance.svg', 'assets/images/art/sit-bereavement.svg']; @endphp
      @foreach(($serviceArea?->scenarios ?? collect()) as $index => $scenario)
      <article class="sit {{ $index % 2 === 1 ? 'sit--offset' : '' }}" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset($scenarioImages[$index] ?? 'assets/images/art/sit-distance.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>@safeHtml($scenario->title)</h3><p>{{ $scenario->description }}</p>
      </article>
      @endforeach
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="afaq-title" data-split>Good to <em>know</em></h2></div>
    <div class="faq" data-faq>
      @foreach($serviceArea?->page_content['faqs'] ?? [] as $index => $faq)
      <div class="faq__item">
        <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a{{ $index }}" id="afaq-q{{ $index }}">{{ $faq['question'] ?? '' }}<span class="faq__icon" aria-hidden="true"></span></button></h3>
        <div class="faq__a" id="afaq-a{{ $index }}" role="region" aria-labelledby="afaq-q{{ $index }}"><div class="faq__inner"><p>@safeHtml($faq['answer'] ?? '')</p></div></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<a class="next-area" href="{{ route('care-professional-liaison') }}" data-cursor="Next">
  <span class="wrap next-area__inner"><span class="next-area__label">Next service area</span><span class="next-area__title">Care &amp; Professional Liaison</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
</a>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Talk to us about this area</h2>
      <p>Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Family%20%26%20Client%20Support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>


@endsection

@section('js')

@endsection