@extends('layouts.app')
@section('title','Care &amp; Professional Liaison, Hospital Discharge Support Bath | Stonemere')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li><li><span aria-current="page">Service area 02</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area 02</p>
      <h1 id="page-title" class="phero__title" data-split>Care &amp; Professional <em>Liaison</em></h1>
      <p class="phero__lead" data-reveal>The coordinating link between the client, their family and the professionals around them, so nothing falls between organisations.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about this area">Ask about this area</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/area-care.svg') }}" width="800" height="1000" alt="Illustration for Care &amp; Professional Liaison, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">What this covers</p>
      <h2 id="svc-title" data-split>4 services, <em>one contact</em></h2>
      <p>Each one can be arranged on its own or as part of ongoing support.</p>
    </div>
    <ol class="svc__list" role="list">
      <li class="svc__item" data-reveal><span class="svc__n">01</span><div><h3>Case management</h3><p>Ongoing coordination of a client&rsquo;s practical affairs, with one person holding the whole picture.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">02</span><div><h3>Health and care coordination</h3><p>Keeping appointments, services and information joined up between health teams, care providers and family.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">03</span><div><h3>Liaison with domiciliary care providers</h3><p>A practical partner for the care company: we pick up what sits outside the care plan and keep communication flowing.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">04</span><div><h3>Attendance at appointments</h3><p>We attend hospital, medical, solicitor and other professional appointments with or on behalf of the client, as agreed.</p></div></li>
    </ol>
  </div>
</section>

<section class="timeline" aria-labelledby="tl-title" data-tabs>
  <div class="wrap">
    <div class="timeline__head">
      <p class="eyebrow">Hospital discharge</p>
      <h2 id="tl-title" data-split>Coming home, <em>properly prepared</em></h2>
    </div>
    <div class="tabs" role="tablist" aria-label="Hospital discharge stages">
      <button class="tab" role="tab" id="tab-before" aria-controls="panel-before" aria-selected="true">Before discharge</button>
      <button class="tab" role="tab" id="tab-day" aria-controls="panel-day" aria-selected="false" tabindex="-1">On the day</button>
      <button class="tab" role="tab" id="tab-after" aria-controls="panel-after" aria-selected="false" tabindex="-1">The weeks after</button>
      <span class="tabs__ink" aria-hidden="true"></span>
    </div>
    <div class="tabpanel" role="tabpanel" id="panel-before" aria-labelledby="tab-before" tabindex="0"><ul class="ticks ticks--cols" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Home checked, warm and ready</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Shopping and essential supplies in</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Family and services told what is happening</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Transport arranged</li></ul></div>
    <div class="tabpanel" role="tabpanel" id="panel-day" aria-labelledby="tab-day" tabindex="0" hidden><ul class="ticks ticks--cols" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Settling in at home</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Prescriptions and paperwork followed up</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Care provider and family kept in step</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A named contact if anything goes wrong</li></ul></div>
    <div class="tabpanel" role="tabpanel" id="panel-after" aria-labelledby="tab-after" tabindex="0" hidden><ul class="ticks ticks--cols" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Follow-up appointments booked and attended</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Welfare visits as agreed</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Correspondence and admin dealt with</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Updates to family and referrer</li></ul></div>
  </div>
</section>

<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">Typical situations</p>
    <h2 id="sits-title" class="sits__title" data-split>When people <em>call us</em></h2>
    <div class="sits__grid">
      <article class="sit" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-hospital.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>Coming home from hospital</h3><p>The home prepared, transport and supplies arranged, and services coordinated around the discharge.</p>
      </article>
      <article class="sit sit--offset" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-distance.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>Several services and no one joining them up</h3><p>One person who keeps the GP, the carers, the family and the client working from the same page.</p>
      </article>
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="afaq-title" data-split>Good to <em>know</em></h2></div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a0" id="afaq-q0">Do you work with NHS discharge teams?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a0" role="region" aria-labelledby="afaq-q0"><div class="faq__inner"><p>We work alongside whichever health and care professionals are involved in a client&rsquo;s discharge, coordinating the practical side that sits outside clinical care.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a1" id="afaq-q1">Will you attend a solicitor&rsquo;s appointment with the client?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a1" role="region" aria-labelledby="afaq-q1"><div class="faq__inner"><p>Yes. Attendance at solicitor and other professional appointments is part of this service area.</p></div></div>
  </div>
</div>
  </div>
</section>

<a class="next-area" href="property-asset-management.html" data-cursor="Next">
  <span class="wrap next-area__inner"><span class="next-area__label">Next service area</span><span class="next-area__title">Property &amp; Asset Management</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
</a>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Talk to us about this area</h2>
      <p>Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection