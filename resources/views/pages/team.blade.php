@extends('layouts.app')
@section('title','Our Team | Led by Paul Harrison | Stonemere Life Management, Bath')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><span aria-current="page">Our team</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Our team</p>
      <h1 id="page-title" class="phero__title" data-split>Led by <em>Paul Harrison</em></h1>
      <p class="phero__lead" data-reveal>A Bath team with one rule: every client has a named person who knows the whole situation, and every referrer knows exactly who to call.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Paul%2C%20I%20would%20like%20to%20talk%20about%20Stonemere%27s%20support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message Paul">Message Paul</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-team.svg') }}" width="800" height="1000" alt="Illustration of two people talking, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="paul" aria-labelledby="paul-title">
  <div class="wrap paul__grid">
    <figure class="paul__mono" data-reveal="mask" aria-hidden="true">
      <svg viewBox="0 0 400 500"><rect width="400" height="500" fill="#1F2943"/><path d="M50 500V210a150 150 0 0 1 300 0v290" fill="none" stroke="#CFAF58" stroke-opacity=".5" stroke-width="2"/><path d="M28 500V210a172 172 0 0 1 344 0v290" fill="none" stroke="#CFAF58" stroke-opacity=".22" stroke-width="1.5"/><path d="M181 22h38l-7 40h-24z" fill="#CFAF58"/><text x="200" y="330" text-anchor="middle" font-family="Marcellus, Georgia, serif" font-size="120" letter-spacing="10" fill="#E3CB8A">PH</text></svg>
    </figure>
    <div class="paul__copy">
      <p class="eyebrow">Who you will speak to</p>
      <h2 id="paul-title" data-split>Paul Harrison</h2>
      <p class="paul__lede" data-reveal>Paul leads Stonemere Life Management. Speak to him directly about a client, a referral or how the service works.</p>
      <ul class="paul__contact" role="list" data-reveal>
        <li><a href="tel:+441225338436"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg>01225 338436</a></li>
        <li><a href="https://wa.me/447891341414?text=Hello%20Paul%2C%20I%20would%20like%20to%20talk%20about%20Stonemere%27s%20support." target="_blank" rel="noopener"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg>WhatsApp 07891 341414</a></li>
      </ul>
    </div>
  </div>
</section>

<section class="howteam" aria-labelledby="howteam-title">
  <div class="wrap">
    <div class="howteam__head">
      <p class="eyebrow eyebrow--light">How the team works</p>
      <h2 id="howteam-title" data-split>One named contact, <em>every time</em></h2>
    </div>
    <ol class="howteam__list" role="list">
      <li data-reveal><span class="howteam__n">01</span><h3>A named person per client</h3><p>The client and family deal with someone who knows them, their home and their circumstances.</p></li>
      <li data-reveal><span class="howteam__n">02</span><h3>Enhanced DBS-checked</h3><p>Vetted to the standard expected for work with vulnerable adults.</p></li>
      <li data-reveal><span class="howteam__n">03</span><h3>Confidential and discreet</h3><p>Information is shared only with consent, or where the law requires it.</p></li>
      <li data-reveal><span class="howteam__n">04</span><h3>Clear boundaries</h3><p>We work alongside care, health and legal professionals, never instead of them.</p></li>
    </ol>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Speak to the team</h2>
      <p>Call 01225 338436 or message us. You will speak to someone who can act.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20speak%20to%20the%20team." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection