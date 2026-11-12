@extends('layouts.app')
@section('title','Stonemere Life Management | Practical coordination for care providers, solicitors &amp; health professionals in Bath')

@section('css')

@endsection

@section('content')

<main id="main" tabindex="-1">

<section class="hero" aria-labelledby="hero-title">
  <div class="hero__sky" aria-hidden="true"></div>
  <div class="hero__layers" aria-hidden="true">
    <img class="hero__layer hero__layer--back" data-parallax="0.08" src="{{ asset('assets/images/art/hero-layer-back.svg') }}" alt="" width="2400" height="900">
    <img class="hero__layer hero__layer--mid" data-parallax="0.18" src="{{ asset('assets/images/art/hero-layer-mid.svg') }}" alt="" width="2400" height="900">
    <img class="hero__layer hero__layer--front" data-parallax="0.32" src="{{ asset('assets/images/art/hero-layer-front.svg') }}" alt="" width="2400" height="900">
  </div>
  <div class="hero__veil" aria-hidden="true"></div>
  <div class="wrap hero__inner">
    <div class="hero__crest" aria-hidden="true">
      <svg class="hero__mark" viewBox="0 0 64 64"><path class="hm-arch" d="M12 60V34a20 20 0 0 1 40 0v26"/><path class="hm-key" d="M26.2 4h11.6l-2.4 13.2h-6.8z"/></svg>
      <p class="hero__word">Stonemere</p>
      <p class="hero__sub"><span>Life Management</span></p>
    </div>
    <h1 id="hero-title" class="hero__title" data-split>The practical side of your client&rsquo;s life, <em>coordinated</em></h1>
    <p class="hero__lead" data-reveal>One named contact for care providers, solicitors and healthcare professionals in Bath. We work alongside you, so the matters outside your service are followed through and nothing is missed.</p>
    <div class="actions actions--center" data-reveal>
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20refer%20a%20client." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Refer a client">Refer a client</span></a>
      <a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
  <a class="hero__scroll" href="#statement" aria-label="Scroll to the next section"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow-down"/></svg></a>
</section>

<div class="strap" role="note" aria-label="Who we work with">
  <div class="strap__track" data-marquee>
    <p>Working alongside domiciliary care companies <span aria-hidden="true">&#9670;</span> solicitors <span aria-hidden="true">&#9670;</span> healthcare professionals <span aria-hidden="true">&#9670;</span> property professionals <span aria-hidden="true">&#9670;</span> and the families they support <span aria-hidden="true">&#9670;</span> across Bath &amp; North East Somerset <span aria-hidden="true">&#9670;</span>&nbsp;</p>
    <p aria-hidden="true">Working alongside domiciliary care companies <span>&#9670;</span> solicitors <span>&#9670;</span> healthcare professionals <span>&#9670;</span> property professionals <span>&#9670;</span> and the families they support <span>&#9670;</span> across Bath &amp; North East Somerset <span>&#9670;</span>&nbsp;</p>
  </div>
</div>

<section class="statement" id="statement" aria-labelledby="statement-title">
  <div class="wrap statement__grid">
    <p class="eyebrow">Who we are</p>
    <h2 id="statement-title" class="statement__text" data-split="words">When a client needs more than your service covers, someone has to pick up the rest. <em>That is what we do.</em></h2>
    <div class="statement__body" data-reveal>
      <p>Stonemere Life Management provides professional support to businesses and organisations whose clients, residents or families need practical coordination beyond their core service.</p>
      <p>We manage appointments, family liaison, property matters, welfare visits and complex day-to-day issues, giving you one reliable point of contact. We are not a care agency, and we are not simply a concierge.</p>
      <a class="tlink" href="about.html">What life management means<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<section class="keystone" data-keystone aria-labelledby="keystone-title">
  <div class="keystone__stage">
    <div class="wrap keystone__grid">
      <div class="keystone__copy">
        <p class="eyebrow eyebrow--light">Life management</p>
        <h2 id="keystone-title" class="keystone__title">How an arch holds</h2>
        <ol class="keystone__caps" role="list">
          <li class="keystone__cap" data-step="0"><strong>Everyone holds a piece.</strong> The family, the carers, the GP, the solicitor, the property and the trades each carry part of a client&rsquo;s life.</li>
          <li class="keystone__cap" data-step="1"><strong>Without a keystone, nothing holds.</strong> Matters fall between organisations, messages go unanswered, and nobody owns the whole picture.</li>
          <li class="keystone__cap" data-step="2"><strong>One point of contact. Everything holds.</strong> Stonemere sits at the top of the arch, coordinating every party and following each matter through.</li>
        </ol>
      </div>
      <div class="keystone__art"><svg class="keystone__svg" viewBox="40 150 920 490" role="img" aria-labelledby="ks-svg-title">
    <title id="ks-svg-title">An arch of seven stones. Six are labelled family, domiciliary care, GP and hospital, solicitor, property and contractors. The keystone at the top is labelled Stonemere.</title>
    <defs><radialGradient id="ks-glow" cx=".5" cy="1" r=".7"><stop offset="0" stop-color="#E3CB8A" stop-opacity=".35"/><stop offset="1" stop-color="#E3CB8A" stop-opacity="0"/></radialGradient></defs>
    <path class="ks-ground" d="M60 600H940"/>
    <path class="ks-pier" d="M120 600v-0M880 600v-0"/>
    <rect class="ks-glow" x="250" y="300" width="500" height="300" fill="url(#ks-glow)"/>
    <g class="ks-client"><circle cx="500" cy="530" r="24"/><path d="M450 600c0-40 22-56 50-56s50 16 50 56"/></g>
    <g class="vs" data-x="-110" data-y="-250" data-r="-38">
      <path d="M238.0 596.9L80.0 595.0A420 420 0 0 1 119.4 422.3L262.6 489.2A262 262 0 0 0 238.0 596.9Z"/>
      <text x="167.5" y="524.1" transform="rotate(-77.1 167.5 524.1)" text-anchor="middle" dominant-baseline="middle"><tspan x="167.5" dy="0em">Family</tspan></text>
    </g><g class="vs" data-x="-70" data-y="170" data-r="24">
      <path d="M265.3 483.5L123.8 413.2A420 420 0 0 1 234.2 274.8L334.2 397.1A262 262 0 0 0 265.3 483.5Z"/>
      <text x="233.4" y="387.4" transform="rotate(-51.4 233.4 387.4)" text-anchor="middle" dominant-baseline="middle"><tspan x="233.4" dy="-0.55em">Domiciliary</tspan><tspan x="233.4" dy="1.15em">care</tspan></text>
    </g><g class="vs" data-x="-40" data-y="-290" data-r="-16">
      <path d="M339.1 393.2L242.1 268.5A420 420 0 0 1 401.6 191.7L438.6 345.3A262 262 0 0 0 339.1 393.2Z"/>
      <text x="352.0" y="292.8" transform="rotate(-25.7 352.0 292.8)" text-anchor="middle" dominant-baseline="middle"><tspan x="352.0" dy="-0.55em">GP &amp;</tspan><tspan x="352.0" dy="1.15em">hospital</tspan></text>
    </g><g class="vs vs--key" data-x="0" data-y="-520" data-r="0">
      <path d="M444.8 343.9L411.5 189.4A420 420 0 0 1 588.5 189.4L555.2 343.9A262 262 0 0 0 444.8 343.9Z"/>
      <text x="500.0" y="259.0" transform="rotate(0.0 500.0 259.0)" text-anchor="middle" dominant-baseline="middle"><tspan x="500.0" dy="0em">Stonemere</tspan></text>
    </g><g class="vs" data-x="60" data-y="190" data-r="30">
      <path d="M561.4 345.3L598.4 191.7A420 420 0 0 1 757.9 268.5L660.9 393.2A262 262 0 0 0 561.4 345.3Z"/>
      <text x="648.0" y="292.8" transform="rotate(25.7 648.0 292.8)" text-anchor="middle" dominant-baseline="middle"><tspan x="648.0" dy="0em">Solicitor</tspan></text>
    </g><g class="vs" data-x="120" data-y="-250" data-r="18">
      <path d="M665.8 397.1L765.8 274.8A420 420 0 0 1 876.2 413.2L734.7 483.5A262 262 0 0 0 665.8 397.1Z"/>
      <text x="766.6" y="387.4" transform="rotate(51.4 766.6 387.4)" text-anchor="middle" dominant-baseline="middle"><tspan x="766.6" dy="0em">Property</tspan></text>
    </g><g class="vs" data-x="110" data-y="150" data-r="-26">
      <path d="M737.4 489.2L880.6 422.3A420 420 0 0 1 920.0 595.0L762.0 596.9A262 262 0 0 0 737.4 489.2Z"/>
      <text x="832.5" y="524.1" transform="rotate(77.1 832.5 524.1)" text-anchor="middle" dominant-baseline="middle"><tspan x="832.5" dy="0em">Contractors</tspan></text>
    </g>
  </svg></div>
    </div>
    <div class="keystone__progress" aria-hidden="true"><span></span></div>
  </div>
</section>

<section class="track" data-hscroll aria-labelledby="track-title">
  <div class="track__sticky">
    <div class="track__rail">
      <div class="track__intro">
        <p class="eyebrow">Our services</p>
        <h2 id="track-title" data-split>Four areas, <em>one named contact</em></h2>
        <p>Every area is coordinated by the same person, who knows the client, the family and the professionals involved.</p>
        <a class="tlink" href="services.html">All services<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
      </div>
      <article class="track__panel" data-tilt>
        <a class="track__link" href="family-client-support.html" data-cursor="Explore">
          <span class="track__num" aria-hidden="true">01</span>
          <figure class="track__art"><img src="{{ asset('assets/images/art/area-family.svg') }}" width="800" height="1000" alt="" loading="lazy" data-parallax-inner></figure>
          <h3 class="track__title">Family &amp; Client Support</h3>
          <p class="track__line">Practical help for clients and their families, through the routine and the hardest moments.</p>
          <ul class="track__list" role="list"><li>Family liaison and representation</li><li>Home and welfare visits</li><li>Appointment accompaniment</li><li>End-of-life and post-death coordination</li></ul>
          <span class="tlink" aria-hidden="true">Explore<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
        </a>
      </article>
      <article class="track__panel" data-tilt>
        <a class="track__link" href="care-professional-liaison.html" data-cursor="Explore">
          <span class="track__num" aria-hidden="true">02</span>
          <figure class="track__art"><img src="{{ asset('assets/images/art/area-care.svg') }}" width="800" height="1000" alt="" loading="lazy" data-parallax-inner></figure>
          <h3 class="track__title">Care &amp; Professional Liaison</h3>
          <p class="track__line">The coordinating link between the client, the family and the professionals around them.</p>
          <ul class="track__list" role="list"><li>Case management</li><li>Health and care coordination</li><li>Liaison with domiciliary care providers</li><li>Attendance at hospital, medical and solicitor appointments</li></ul>
          <span class="tlink" aria-hidden="true">Explore<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
        </a>
      </article>
      <article class="track__panel" data-tilt>
        <a class="track__link" href="property-asset-management.html" data-cursor="Explore">
          <span class="track__num" aria-hidden="true">03</span>
          <figure class="track__art"><img src="{{ asset('assets/images/art/area-property.svg') }}" width="800" height="1000" alt="" loading="lazy" data-parallax-inner></figure>
          <h3 class="track__title">Property &amp; Asset Management</h3>
          <p class="track__line">Homes and possessions looked after, prepared and, when the time comes, cleared or sold.</p>
          <ul class="track__list" role="list"><li>Property oversight and vacant property checks</li><li>Contractor coordination</li><li>Downsizing, clearance and storage</li><li>Property or asset disposal</li></ul>
          <span class="tlink" aria-hidden="true">Explore<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
        </a>
      </article>
      <article class="track__panel" data-tilt>
        <a class="track__link" href="urgent-complex-cases.html" data-cursor="Explore">
          <span class="track__num" aria-hidden="true">04</span>
          <figure class="track__art"><img src="{{ asset('assets/images/art/area-urgent.svg') }}" width="800" height="1000" alt="" loading="lazy" data-parallax-inner></figure>
          <h3 class="track__title">Urgent &amp; Complex Case Support</h3>
          <p class="track__line">A calm, capable response when something happens suddenly or a case becomes complicated.</p>
          <ul class="track__list" role="list"><li>Same-day support</li><li>Out-of-hours assistance</li><li>Crisis coordination</li><li>Complex cases across several parties</li></ul>
          <span class="tlink" aria-hidden="true">Explore<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span>
        </a>
      </article>
    </div>
  </div>
  <div class="track__bar" aria-hidden="true"><span></span></div>
</section>

<section class="refer" aria-labelledby="refer-title">
  <div class="wrap">
    <div class="refer__head">
      <p class="eyebrow">Who refers to us</p>
      <h2 id="refer-title" data-split>Each profession hands over <em>something different</em></h2>
    </div>
    <ul class="rows" role="list" data-rows>
      <li class="row" data-preview="{{ asset('assets/images/art/prof-care.svg') }}">
        <button class="row__head" type="button" aria-expanded="false" aria-controls="row-care" data-cursor="Open">
          <span class="row__num">01</span><span class="row__title">Domiciliary care companies</span><span class="row__icon" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-plus"/></svg></span>
        </button>
        <div class="row__body" id="row-care"><div class="row__inner"><p>Your carers notice problems that sit outside the care plan: unopened post, a boiler that has failed, a family that can't be reached. Hand those to us and keep your team on care.</p><a class="tlink" href="professionals.html#care-providers">What we take on<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div></div>
      </li>
      <li class="row" data-preview="{{ asset('assets/images/art/prof-solicitor.svg') }}">
        <button class="row__head" type="button" aria-expanded="false" aria-controls="row-solicitor" data-cursor="Open">
          <span class="row__num">02</span><span class="row__title">Solicitors &amp; executors</span><span class="row__icon" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-plus"/></svg></span>
        </button>
        <div class="row__body" id="row-solicitor"><div class="row__inner"><p>Vacant property checks, contractor coordination, possessions, clearance and disposal, plus attendance at appointments, so a probate, deputyship or attorney matter keeps moving.</p><a class="tlink" href="professionals.html#solicitors">What we take on<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div></div>
      </li>
      <li class="row" data-preview="{{ asset('assets/images/art/prof-health.svg') }}">
        <button class="row__head" type="button" aria-expanded="false" aria-controls="row-health" data-cursor="Open">
          <span class="row__num">03</span><span class="row__title">Healthcare professionals</span><span class="row__icon" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-plus"/></svg></span>
        </button>
        <div class="row__body" id="row-health"><div class="row__inner"><p>Hospital discharge teams, GPs and community clinicians: we coordinate the practical side of going home and staying well at home, alongside the services already in place.</p><a class="tlink" href="professionals.html#healthcare">What we take on<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div></div>
      </li>
      <li class="row" data-preview="{{ asset('assets/images/art/prof-property.svg') }}">
        <button class="row__head" type="button" aria-expanded="false" aria-controls="row-property" data-cursor="Open">
          <span class="row__num">04</span><span class="row__title">Property professionals</span><span class="row__icon" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-plus"/></svg></span>
        </button>
        <div class="row__body" id="row-property"><div class="row__inner"><p>Oversight of empty or changing properties, access for trades and agents, and coordination with the family and the client's representatives.</p><a class="tlink" href="professionals.html#property">What we take on<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div></div>
      </li>
    </ul>
  </div>
  <div class="rows__preview" aria-hidden="true"><img src="{{ asset('assets/images/art/prof-care.svg') }}" alt="" width="640" height="480"></div>
</section>

<section class="mapper" aria-labelledby="mapper-title" data-mapper>
  <div class="wrap mapper__grid">
    <div class="mapper__copy">
      <p class="eyebrow eyebrow--light">Try it</p>
      <h2 id="mapper-title" data-split>Who is involved in <em>this case?</em></h2>
      <p>Select everyone your client deals with. However many there are, you and the family speak to one person.</p>
      <p class="mapper__count" aria-live="polite"><span class="mapper__n" data-mapper-n>0</span> <span data-mapper-label>parties selected. Choose the people and organisations involved.</span></p>
      <a class="btn btn--gold" data-mapper-cta href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20a%20case." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Send this case to Stonemere">Send this case to Stonemere</span></a>
    </div>
    <div class="mapper__stage">
      <svg class="mapper__lines" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <line data-line="0" x1="50" y1="50" x2="50" y2="6" pathLength="1"/><line data-line="1" x1="50" y1="50" x2="79" y2="14" pathLength="1"/><line data-line="2" x1="50" y1="50" x2="94" y2="38" pathLength="1"/><line data-line="3" x1="50" y1="50" x2="94" y2="62" pathLength="1"/><line data-line="4" x1="50" y1="50" x2="79" y2="86" pathLength="1"/><line data-line="5" x1="50" y1="50" x2="50" y2="94" pathLength="1"/><line data-line="6" x1="50" y1="50" x2="21" y2="86" pathLength="1"/><line data-line="7" x1="50" y1="50" x2="6" y2="62" pathLength="1"/><line data-line="8" x1="50" y1="50" x2="6" y2="38" pathLength="1"/><line data-line="9" x1="50" y1="50" x2="21" y2="14" pathLength="1"/>
      </svg>
      <div class="mapper__centre" aria-hidden="true"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-keystone"/></svg><span>Stonemere</span></div>
      <fieldset class="mapper__nodes">
        <legend class="sr">People and organisations involved</legend>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="0" style="--x:50%;--y:6%">Family nearby</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="1" style="--x:79%;--y:14%">Family abroad</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="2" style="--x:94%;--y:38%">Domiciliary carers</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="3" style="--x:94%;--y:62%">GP surgery</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="4" style="--x:79%;--y:86%">Hospital team</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="5" style="--x:50%;--y:94%">Solicitor</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="6" style="--x:21%;--y:86%">Estate or letting agent</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="7" style="--x:6%;--y:62%">Contractors &amp; trades</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="8" style="--x:6%;--y:38%">Council &amp; social care</button>
        <button type="button" class="mapper__node" aria-pressed="false" data-node="9" style="--x:21%;--y:14%">Bank &amp; utilities</button>
      </fieldset>
    </div>
  </div>
</section>

<section class="steps" aria-labelledby="steps-title">
  <div class="wrap steps__grid">
    <div class="steps__head">
      <p class="eyebrow">How a referral works</p>
      <h2 id="steps-title" data-split>Four plain steps, <em>no paperwork to start</em></h2>
      <p>Your first message doesn&rsquo;t need the client&rsquo;s full name or medical details. We take those safely once we have spoken.</p>
      <a class="btn btn--navy" href="professionals.html#referral" data-magnetic><span class="roll" data-text="Build a referral">Build a referral</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
    </div>
    <div class="steps__wrap" data-draw>
      <svg class="steps__line" viewBox="0 0 2 100" preserveAspectRatio="none" aria-hidden="true"><line x1="1" y1="0" x2="1" y2="100" pathLength="1"/></svg>
      <ol class="steps__list" role="list">
      <li data-reveal><span class="steps__n">01</span><h3>Message or call</h3><p>WhatsApp us or call 01225 338436. Tell us who you are and, in outline, what the client needs.</p></li>
      <li data-reveal><span class="steps__n">02</span><h3>Agree the scope in writing</h3><p>We talk it through, confirm what we will take on and how it will be paid for, and put it in writing before anything starts.</p></li>
      <li data-reveal><span class="steps__n">03</span><h3>One named contact takes it on</h3><p>The same person coordinates every matter, liaises with everyone involved and follows each one through.</p></li>
      <li data-reveal><span class="steps__n">04</span><h3>You stay informed</h3><p>We keep you and the family updated, with the client&rsquo;s consent, so you always know where things stand.</p></li>
    </ol>
    </div>
  </div>
</section>

<section class="bounds" aria-labelledby="bounds-title">
  <h2 id="bounds-title" class="sr">What we do and what we don't</h2>
  <div class="bounds__half bounds__half--do" data-reveal="wipe">
    <div class="bounds__inner">
      <p class="bounds__label"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>We do</p>
      <p class="bounds__big">Coordinate, liaise, attend, organise, arrange and follow through.</p>
      <p>Practical coordination, communication, representation at appointments, property and possessions, logistics and problem-solving, carried through to completion.</p>
    </div>
  </div>
  <div class="bounds__half bounds__half--dont" data-reveal="wipe">
    <div class="bounds__inner">
      <p class="bounds__label"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-x"/></svg>We never</p>
      <p class="bounds__big">Replace the professionals already involved.</p>
      <p>We do not provide medical treatment, nursing, regulated personal care, legal advice or financial advice. When those are needed, we make sure the right people are involved and we work alongside them.</p>
    </div>
  </div>
</section>

<section class="standards" aria-labelledby="standards-title">
  <div class="wrap">
    <h2 id="standards-title" class="standards__title" data-reveal>The standards behind every case</h2>
    <ul class="standards__list" role="list">
      <li data-reveal><svg class="i" aria-hidden="true" focusable="false"><use href="#i-shield"/></svg><span><strong>Enhanced DBS-checked</strong>to the standard expected for work with vulnerable adults</span></li>
      <li data-reveal><svg class="i" aria-hidden="true" focusable="false"><use href="#i-lock"/></svg><span><strong>Confidential</strong>information shared only with consent or where the law requires it</span></li>
      <li data-reveal><svg class="i" aria-hidden="true" focusable="false"><use href="#i-scale"/></svg><span><strong>Clear boundaries</strong>agreed in writing, alongside other professionals, never instead of them</span></li>
      <li data-reveal><svg class="i" aria-hidden="true" focusable="false"><use href="#i-user"/></svg><span><strong>One named contact</strong>for the client, the family and every referrer</span></li>
    </ul>
  </div>
</section>

<section class="where" aria-labelledby="where-title">
  <div class="wrap where__grid">
    <div class="where__copy">
      <p class="eyebrow">Where we work</p>
      <h2 id="where-title" data-split>Bath first, <em>then the wider county</em></h2>
      <p>We concentrate on clients within about five miles of Bath, serve the wider Bath &amp; North East Somerset area, and coordinate matters further afield when an existing client or their family needs it.</p>
      <dl class="figures">
        <div><dt>Mile radius around Bath, our first focus</dt><dd data-count="5">5</dd></div>
        <div><dt>Service areas</dt><dd data-count="4">4</dd></div>
        <div><dt>Named contact per client</dt><dd data-count="1">1</dd></div>
      </dl>
    </div>
    <figure class="where__map" data-draw>
      <svg viewBox="0 0 600 600" role="img" aria-labelledby="map-title">
        <title id="map-title">A diagram of Bath at the centre of a five-mile ring, inside a wider ring for Bath and North East Somerset, with the River Avon running through.</title>
        <circle class="map-ring map-ring--outer" cx="300" cy="300" r="270" pathLength="1"/>
        <circle class="map-ring" cx="300" cy="300" r="150" pathLength="1"/>
        <circle class="map-ring map-ring--inner" cx="300" cy="300" r="60" pathLength="1"/>
        <path class="map-river" d="M20 420C110 380 160 260 240 290S330 360 370 300 460 180 580 200" pathLength="1"/>
        <g class="map-city"><circle cx="300" cy="300" r="7"/><text x="300" y="276" text-anchor="middle">BATH</text></g>
        <text class="map-label" x="300" y="164" text-anchor="middle">5 MILES</text>
        <text class="map-label" x="300" y="44" text-anchor="middle">BATH &amp; NORTH EAST SOMERSET</text>
        <text class="map-label map-label--river" x="470" y="236">River Avon</text>
        <g class="map-compass" transform="translate(540 540)"><path d="M0 -26 6 0 0 26 -6 0Z"/><text y="-32" text-anchor="middle">N</text></g>
      </svg>
    </figure>
  </div>
</section>

<section class="lead" aria-labelledby="lead-title">
  <div class="wrap lead__grid">
    <figure class="lead__portrait" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-team.svg') }}" width="800" height="1000" alt="Illustration of two people talking, in gold line on navy" loading="lazy">
    </figure>
    <div class="lead__copy">
      <p class="eyebrow">Our team</p>
      <h2 id="lead-title" data-split>Led by <em>Paul Harrison</em></h2>
      <p class="lead__lede" data-reveal>Stonemere is led by Paul. When you refer a client, you know exactly who is responsible for the case and how to reach them.</p>
      <div class="actions" data-reveal>
        <a class="btn btn--navy" href="team.html" data-magnetic><span class="roll" data-text="Meet the team">Meet the team</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
        <a class="btn btn--line" href="https://wa.me/447891341414?text=Hello%20Paul%2C%20I%20would%20like%20to%20talk%20about%20Stonemere%27s%20support." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message Paul">Message Paul</span></a>
      </div>
    </div>
  </div>
</section>

<section class="tiers" aria-labelledby="tiers-title">
  <div class="wrap">
    <div class="tiers__head">
      <p class="eyebrow">Price menu</p>
      <h2 id="tiers-title" data-split>Simple membership, <em>separate costs agreed first</em></h2>
      <p>Ongoing support is paid as a monthly membership credited to the client&rsquo;s own account and used for Stonemere&rsquo;s time. Transport, purchases, third-party costs and crisis work are charged separately, always agreed in advance.</p>
    </div>
    <ul class="tiers__chips" role="list">
      <li data-tilt><span class="chip__swatch chip__swatch--silver" aria-hidden="true"></span><h3>Silver</h3><p>Occasional, dependable help</p></li>
      <li data-tilt><span class="chip__swatch chip__swatch--gold" aria-hidden="true"></span><h3>Gold</h3><p>Regular, ongoing coordination</p></li>
      <li data-tilt><span class="chip__swatch chip__swatch--platinum" aria-hidden="true"></span><h3>Platinum</h3><p>Complex situations and families at a distance</p></li>
    </ul>
    <p class="tiers__more"><a class="tlink" href="price-menu.html">How pricing works, and which level fits<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></p>
  </div>
</section>

<section class="questions" aria-labelledby="faq-title">
  <div class="wrap questions__grid">
    <div class="questions__head">
      <p class="eyebrow">Questions</p>
      <h2 id="faq-title" data-split>Before you <em>refer</em></h2>
      <p>Anything else, ask us on WhatsApp or call 01225 338436.</p>
    </div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a0" id="hfaq-q0">Is Stonemere a care agency?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a0" role="region" aria-labelledby="hfaq-q0"><div class="faq__inner"><p>No. We do not provide personal care, nursing or medical treatment. We coordinate the practical side of a client's life and work alongside the care provider, health team or solicitor who is already involved.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a1" id="hfaq-q1">Who can refer a client to Stonemere?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a1" role="region" aria-labelledby="hfaq-q1"><div class="faq__inner"><p>Domiciliary care companies, solicitors, healthcare professionals, property professionals and other organisations can refer. Families can contact us directly, and so can clients themselves.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a2" id="hfaq-q2">Who pays for the work?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a2" role="region" aria-labelledby="hfaq-q2"><div class="faq__inner"><p>The client, their family or representative, or the referring organisation. Who pays, what is included and what is charged separately is agreed in writing before any work begins.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a3" id="hfaq-q3">Which areas do you cover?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a3" role="region" aria-labelledby="hfaq-q3"><div class="faq__inner"><p>Bath first, concentrating on about a five-mile radius of the city, then the wider Bath &amp; North East Somerset area. We can coordinate matters further afield for existing clients and their families.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a4" id="hfaq-q4">Can you help at short notice?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a4" role="region" aria-labelledby="hfaq-q4"><div class="faq__inner"><p>Yes. Same-day support and out-of-hours assistance are part of our Urgent &amp; Complex Case Support. Call 01225 338436 and tell us what has happened.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="hfaq-a5" id="hfaq-q5">What does it cost?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="hfaq-a5" role="region" aria-labelledby="hfaq-q5"><div class="faq__inner"><p>Ongoing support runs on a monthly membership credited to the client's own account. Transport, purchases, third-party costs and crisis work are charged separately and agreed first. The <a href="price-menu.html">price menu</a> explains how it works.</p></div></div>
  </div>
</div>
  </div>
</section>

<section class="contact-block" id="contact" aria-labelledby="contact-title">
  <div class="wrap contact-block__grid">
    <div class="contact-block__copy">
      <p class="eyebrow eyebrow--light">Get in touch</p>
      <h2 id="contact-title">Talk to Stonemere</h2>
      <p>Tell us about the client and what they need. We will tell you honestly whether we can help, and what it would involve.</p>
      <div class="contact-block__office">
        <p class="contact-block__label">Bath</p>
        <p class="contact-block__note">Covering Bath and Bath &amp; North East Somerset</p>
        <a class="contact-block__phone" href="tel:+441225338436">01225 338436</a>
      </div>
      <div class="contact-block__office">
        <p class="contact-block__label">WhatsApp</p>
        <a class="contact-block__phone" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener">07891 341414</a>
      </div>
    </div>
    <form class="form form--dark" data-wa-form="enquiry" novalidate aria-labelledby="home-form-title">
      <h2 class="sr" id="home-form-title">Send an enquiry</h2>
      <div class="form__row">
        <div class="field">
        <input id="home-name" name="name" type="text" autocomplete="name" required placeholder=" " aria-describedby="home-name-error">
        <label for="home-name">Your name</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="home-name-error" aria-live="polite"></p>
      </div>
        <div class="field">
        <input id="home-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required placeholder=" " aria-describedby="home-phone-error">
        <label for="home-phone">Phone</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="home-phone-error" aria-live="polite"></p>
      </div>
      </div>
      <div class="field">
        <input id="home-org" name="organisation" type="text" autocomplete="organization" placeholder=" ">
        <label for="home-org">Organisation (optional)</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="home-org-error" aria-live="polite"></p>
      </div>
      <div class="field field--select">
        <select id="home-role" name="role" required aria-describedby="home-role-error">
          <option value="" selected disabled>Choose one</option>
          <option>Domiciliary care provider</option>
          <option>Solicitor or executor</option>
          <option>Healthcare professional</option>
          <option>Property professional</option>
          <option>Family member</option>
          <option>Contacting for myself</option>
          <option>Other organisation</option>
        </select>
        <label for="home-role">I am contacting you as</label>
        <span class="field__line" aria-hidden="true"></span>
        <p class="field__error" id="home-role-error" aria-live="polite"></p>
      </div>
      <div class="field">
        <textarea id="home-msg" name="message" rows="4" required placeholder=" " aria-describedby="home-msg-error"></textarea>
        <label for="home-msg">How can we help?</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="home-msg-error" aria-live="polite"></p>
      </div>
      <p class="form__note">Please don&rsquo;t include a client&rsquo;s full name, date of birth or medical details in a WhatsApp message. Initials or a reference are enough; we take the rest safely once we have spoken.</p>
      <div class="form__actions">
        <button class="btn btn--gold" type="submit" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Send on WhatsApp">Send on WhatsApp</span></button>
        <p class="form__alt">or call <a href="tel:+441225338436">01225 338436</a></p>
      </div>
      <div class="form__success" role="status" hidden>
        <p class="form__success-title"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>WhatsApp has opened with your message.</p>
        <p>Press send in WhatsApp to reach us. If it didn&rsquo;t open, call <a href="tel:+441225338436">01225 338436</a>.</p>
      </div>
    </form>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection