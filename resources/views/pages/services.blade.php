@extends('layouts.app')
@section('title','Services | Life Management in Bath | Stonemere')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><span aria-current="page">Services</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Services</p>
      <h1 id="page-title" class="phero__title" data-split>Four service areas, <em>one trusted contact</em></h1>
      <p class="phero__lead" data-reveal>Everything Stonemere does falls into four areas. Each can be arranged on its own, and all of them are coordinated by the same named person.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20which%20of%20your%20services%20would%20fit%20a%20client." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask which fits">Ask which fits</span></a><a class="btn btn--line-light" href="price-menu.html" data-magnetic><span class="roll" data-text="Price menu">Price menu</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div>
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
      <li class="index__row" data-preview="{{ asset('assets/images/art/area-family.svg') }}">
        <a href="family-client-support.html" data-cursor="Explore">
          <span class="index__n">01</span>
          <span class="index__title">Family &amp; Client Support</span>
          <span class="index__desc">Family liaison, welfare visits, appointments, admin, end-of-life and post-death coordination</span>
          <svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg>
        </a>
      </li>
      <li class="index__row" data-preview="{{ asset('assets/images/art/area-care.svg') }}">
        <a href="care-professional-liaison.html" data-cursor="Explore">
          <span class="index__n">02</span>
          <span class="index__title">Care &amp; Professional Liaison</span>
          <span class="index__desc">Case management, health and care coordination, care-provider liaison and appointments</span>
          <svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg>
        </a>
      </li>
      <li class="index__row" data-preview="{{ asset('assets/images/art/area-property.svg') }}">
        <a href="property-asset-management.html" data-cursor="Explore">
          <span class="index__n">03</span>
          <span class="index__title">Property &amp; Asset Management</span>
          <span class="index__desc">Oversight, vacant property checks, contractors, downsizing, clearance, storage and disposal</span>
          <svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg>
        </a>
      </li>
      <li class="index__row" data-preview="{{ asset('assets/images/art/area-urgent.svg') }}">
        <a href="urgent-complex-cases.html" data-cursor="Explore">
          <span class="index__n">04</span>
          <span class="index__title">Urgent &amp; Complex Case Support</span>
          <span class="index__desc">Same-day and out-of-hours help, crisis coordination and complex multi-party cases</span>
          <svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg>
        </a>
      </li>
    </ol>
  </div>
  <div class="rows__preview" aria-hidden="true"><img src="{{ asset('assets/images/art/area-family.svg') }}" alt="" width="800" height="1000"></div>
</section>

<section class="pick" aria-labelledby="pick-title">
  <div class="wrap pick__grid">
    <div>
      <p class="eyebrow eyebrow--light">Choosing</p>
      <h2 id="pick-title" data-split>Not sure <em>where to start?</em></h2>
      <p>Most cases touch more than one area. Tell us the situation and we will shape the support around it, with one person responsible for all of it.</p>
    </div>
    <ul class="pick__list" role="list">
      <li data-reveal><span>A client struggling at home, family far away</span><a class="tlink" href="family-client-support.html">Family &amp; Client Support<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>Several services and nobody joining them up</span><a class="tlink" href="care-professional-liaison.html">Care &amp; Professional Liaison<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>An empty or changing property</span><a class="tlink" href="property-asset-management.html">Property &amp; Asset Management<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      <li data-reveal><span>Something has happened today</span><a class="tlink" href="urgent-complex-cases.html">Urgent &amp; Complex Cases<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
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
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Tell us what is happening</h2>
      <p>One conversation is enough to know whether we can help.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection