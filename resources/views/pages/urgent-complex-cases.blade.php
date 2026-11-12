@extends('layouts.app')
@section('title','Urgent & Complex Case Support, Same-Day Help Bath | Stonemere')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li><li><span aria-current="page">Service area 04</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area 04</p>
      <h1 id="page-title" class="phero__title" data-split>Urgent &amp; Complex <em>Case Support</em></h1>
      <p class="phero__lead" data-reveal>A calm, capable response when something happens suddenly, or when a case needs more coordination than one organisation can give.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Urgent%20%26%20Complex%20Case%20Support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about this area">Ask about this area</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/area-urgent.svg') }}" width="800" height="1000" alt="Illustration for Urgent &amp; Complex Case Support, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">What this covers</p>
      <h2 id="svc-title" data-split>5 services, <em>one contact</em></h2>
      <p>Each one can be arranged on its own or as part of ongoing support.</p>
    </div>
    <ol class="svc__list" role="list">
      <li class="svc__item" data-reveal><span class="svc__n">01</span><div><h3>Same-day support</h3><p>When something needs sorting today, we can step in.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">02</span><div><h3>Out-of-hours assistance</h3><p>Help outside normal working hours when a situation can&rsquo;t wait.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">03</span><div><h3>Crisis coordination</h3><p>In a crisis we bring the people and services together and keep the family informed.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">04</span><div><h3>Practical problem-solving</h3><p>The awkward, unusual problems that don&rsquo;t fit anyone&rsquo;s job description.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">05</span><div><h3>Complex cases</h3><p>Cases involving several professionals, organisations or family members, coordinated by one person.</p></div></li>
    </ol>
  </div>
</section>

<section class="callflow" aria-labelledby="cf-title">
  <div class="wrap">
    <div class="callflow__head">
      <p class="eyebrow">When it is urgent</p>
      <h2 id="cf-title" data-split>What happens <em>when you call</em></h2>
    </div>
    <ol class="callflow__list" role="list">
      <li data-reveal><span class="callflow__n">1</span><h3>Tell us what has happened</h3><p>Call 01225 338436. We listen and ask only what we need to act.</p></li>
      <li data-reveal><span class="callflow__n">2</span><h3>We agree what to do now</h3><p>The immediate practical problem first, and how the work will be charged.</p></li>
      <li data-reveal><span class="callflow__n">3</span><h3>We coordinate</h3><p>The right people and services are brought in, and the family is kept informed.</p></li>
      <li data-reveal><span class="callflow__n">4</span><h3>We follow it through</h3><p>Once things are stable, we agree what ongoing support, if any, is needed.</p></li>
    </ol>
    <p class="callflow__note"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg>If someone is in immediate danger, call 999 first.</p>
  </div>
</section>

<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">Typical situations</p>
    <h2 id="sits-title" class="sits__title" data-split>When people <em>call us</em></h2>
    <div class="sits__grid">
      <article class="sit" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-hospital.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>A sudden hospital admission</h3><p>The home secured, pets and post seen to, family told, and the practical side held together.</p>
      </article>
      <article class="sit sit--offset" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-bereavement.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>Too many people, no one in charge</h3><p>A complex case pulled into one plan, with one contact for everyone.</p>
      </article>
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="afaq-title" data-split>Good to <em>know</em></h2></div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a0" id="afaq-q0">How is urgent work charged?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a0" role="region" aria-labelledby="afaq-q0"><div class="faq__inner"><p>Crisis work is charged separately from membership and agreed with you when you call. See the <a href="price-menu.html">price menu</a>.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a1" id="afaq-q1">Do you respond out of hours?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a1" role="region" aria-labelledby="afaq-q1"><div class="faq__inner"><p>Out-of-hours assistance is part of this service area. Call 01225 338436.</p></div></div>
  </div>
</div>
  </div>
</section>

<a class="next-area" href="family-client-support.html" data-cursor="Next">
  <span class="wrap next-area__inner"><span class="next-area__label">Next service area</span><span class="next-area__title">Family &amp; Client Support</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
</a>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Talk to us about this area</h2>
      <p>Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Urgent%20%26%20Complex%20Case%20Support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection