@extends('layouts.app')
@section('title','Property & Asset Management, Vacant Property Checks Bath | Stonemere')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li><li><span aria-current="page">Service area 03</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area 03</p>
      <h1 id="page-title" class="phero__title" data-split>Property &amp; Asset <em>Management</em></h1>
      <p class="phero__lead" data-reveal>Homes and possessions looked after, prepared and, when the time comes, cleared or sold, with executors, attorneys and families kept informed.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Property%20%26%20Asset%20Management." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about this area">Ask about this area</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/area-property.svg') }}" width="800" height="1000" alt="Illustration for Property &amp; Asset Management, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">What this covers</p>
      <h2 id="svc-title" data-split>7 services, <em>one contact</em></h2>
      <p>Each one can be arranged on its own or as part of ongoing support.</p>
    </div>
    <ol class="svc__list" role="list">
      <li class="svc__item" data-reveal><span class="svc__n">01</span><div><h3>Property oversight</h3><p>Someone dependable keeping an eye on a client&rsquo;s property and dealing with what comes up.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">02</span><div><h3>Vacant property checks</h3><p>Regular visits to an empty property, at a frequency agreed with you, with anything of concern reported and acted on.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">03</span><div><h3>Contractor coordination</h3><p>Trades and contractors found, given access, supervised and checked.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">04</span><div><h3>Downsizing</h3><p>A move to a smaller home planned and coordinated at the client&rsquo;s pace.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">05</span><div><h3>House clearance</h3><p>Full or partial clearances handled sensitively, with items kept, distributed or disposed of as instructed.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">06</span><div><h3>Storage and possessions management</h3><p>Belongings catalogued, stored and looked after until decisions are made.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">07</span><div><h3>Property or asset disposal</h3><p>Coordination of the practical steps when a property, vehicle or other asset is sold or disposed of.</p></div></li>
    </ol>
  </div>
</section>

<section class="checks" aria-labelledby="checks-title">
  <div class="wrap checks__grid">
    <div>
      <p class="eyebrow">Vacant property checks</p>
      <h2 id="checks-title" data-split>What a visit can <em>cover</em></h2>
      <p>You agree the scope and frequency with us. Typical items are below; select the ones you need and send them to us.</p>
    </div>
    <form class="checks__list" data-checklist aria-label="Vacant property check items">
      <label class="checkrow"><input type="checkbox" name="check" value="Security: doors, windows and locks" checked><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Security: doors, windows and locks</span></label><label class="checkrow"><input type="checkbox" name="check" value="Post collected and dealt with" checked><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Post collected and dealt with</span></label><label class="checkrow"><input type="checkbox" name="check" value="Heating, water and signs of leaks" checked><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Heating, water and signs of leaks</span></label><label class="checkrow"><input type="checkbox" name="check" value="Access for contractors and agents"><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Access for contractors and agents</span></label><label class="checkrow"><input type="checkbox" name="check" value="Condition noted and reported back"><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Condition noted and reported back</span></label><label class="checkrow"><input type="checkbox" name="check" value="Anything urgent acted on"><span class="checkrow__box" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg></span><span>Anything urgent acted on</span></label>
      <a class="btn btn--navy" data-checklist-cta href="#" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about property checks">Ask about property checks</span></a>
    </form>
  </div>
</section>

<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">Typical situations</p>
    <h2 id="sits-title" class="sits__title" data-split>When people <em>call us</em></h2>
    <div class="sits__grid">
      <article class="sit" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-property.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>An empty house during probate</h3><p>Checks, contractors, possessions and clearance coordinated in line with the executor&rsquo;s instructions.</p>
      </article>
      <article class="sit sit--offset" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-hospital.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>A move into residential care</h3><p>The old home looked after, belongings sorted and the property prepared for its next step.</p>
      </article>
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="afaq-title" data-split>Good to <em>know</em></h2></div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a0" id="afaq-q0">Can you work to an executor&rsquo;s or deputy&rsquo;s instructions?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a0" role="region" aria-labelledby="afaq-q0"><div class="faq__inner"><p>Yes. We act on the instructions of whoever is responsible for the client&rsquo;s affairs and refer decisions back to them.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a1" id="afaq-q1">Do you carry out clearances yourselves?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a1" role="region" aria-labelledby="afaq-q1"><div class="faq__inner"><p>We coordinate clearances: sorting, deciding what is kept, distributed or disposed of, and arranging the right people to do the work.</p></div></div>
  </div>
</div>
  </div>
</section>

<a class="next-area" href="urgent-complex-cases.html" data-cursor="Next">
  <span class="wrap next-area__inner"><span class="next-area__label">Next service area</span><span class="next-area__title">Urgent &amp; Complex Case Support</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
</a>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Talk to us about this area</h2>
      <p>Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Property%20%26%20Asset%20Management." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection