@extends('layouts.app')
@section('title','Family &amp; Client Support in Bath | Stonemere Life Management')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li><li><span aria-current="page">Service area 01</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Service area 01</p>
      <h1 id="page-title" class="phero__title" data-split>Family &amp; Client <em>Support</em></h1>
      <p class="phero__lead" data-reveal>Practical help for clients and their families, from regular visits and paperwork to the hardest moments at the end of life.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Family%20%26%20Client%20Support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask about this area">Ask about this area</span></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/area-family.svg') }}" width="800" height="1000" alt="Illustration for Family &amp; Client Support, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="svc" aria-labelledby="svc-title">
  <div class="wrap svc__grid">
    <div class="svc__head">
      <p class="eyebrow">What this covers</p>
      <h2 id="svc-title" data-split>6 services, <em>one contact</em></h2>
      <p>Each one can be arranged on its own or as part of ongoing support.</p>
    </div>
    <ol class="svc__list" role="list">
      <li class="svc__item" data-reveal><span class="svc__n">01</span><div><h3>Family liaison and representation</h3><p>One person keeps the family informed and represents the client&rsquo;s wishes in conversations with the organisations involved, wherever family members live.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">02</span><div><h3>Home and welfare visits</h3><p>Regular visits to see how the client is managing at home, spot practical problems early and act on them.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">03</span><div><h3>Appointment accompaniment</h3><p>We go with the client to appointments, help them be heard, keep notes and follow up on what was agreed.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">04</span><div><h3>Administrative support</h3><p>Post, correspondence, bills, forms and household admin kept in order, so nothing important is missed.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">05</span><div><h3>End-of-life practical support</h3><p>Calm, practical coordination at the end of life, so the family can spend their time where it matters.</p></div></li>
      <li class="svc__item" data-reveal><span class="svc__n">06</span><div><h3>Post-death coordination</h3><p>After a death, we help coordinate the practical steps with the family, the executor and the organisations involved.</p></div></li>
    </ol>
  </div>
</section>



<section class="sits" aria-labelledby="sits-title">
  <div class="wrap">
    <p class="eyebrow">Typical situations</p>
    <h2 id="sits-title" class="sits__title" data-split>When people <em>call us</em></h2>
    <div class="sits__grid">
      <article class="sit" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-distance.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>A parent living alone, with family far away</h3><p>Someone local who visits, deals with appointments and correspondence, and keeps everyone updated.</p>
      </article>
      <article class="sit sit--offset" data-reveal data-tilt>
        <figure class="sit__art"><img src="{{ asset('assets/images/art/sit-bereavement.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
        <h3>A bereavement, with everything to arrange</h3><p>The practical tasks coordinated alongside the family and the executor.</p>
      </article>
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="afaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="afaq-title" data-split>Good to <em>know</em></h2></div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a0" id="afaq-q0">Can you update family members who live abroad?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a0" role="region" aria-labelledby="afaq-q0"><div class="faq__inner"><p>Yes. Family liaison includes keeping relatives informed wherever they live, in the way agreed with the client.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="afaq-a1" id="afaq-q1">Do you provide personal care during visits?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="afaq-a1" role="region" aria-labelledby="afaq-q1"><div class="faq__inner"><p>No. Welfare visits are about practical wellbeing and coordination. Personal care stays with the care provider.</p></div></div>
  </div>
</div>
  </div>
</section>

<a class="next-area" href="care-professional-liaison.html" data-cursor="Next">
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