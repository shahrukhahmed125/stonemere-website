@extends('layouts.app')
@section('title','For Professionals | Refer a Client to Stonemere Life Management, Bath')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><span aria-current="page">For professionals</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">For professionals</p>
      <h1 id="page-title" class="phero__title" data-split>Hand over the practical side. <em>We follow it through.</em></h1>
      <p class="phero__lead" data-reveal>For care providers, solicitors, healthcare and property professionals whose clients need practical coordination beyond your core service. One named contact, a clear remit and no chasing.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="#referral" data-magnetic><span class="roll" data-text="Build a referral">Build a referral</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a><a class="btn btn--line-light" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-professionals.svg') }}" width="800" height="1000" alt="Illustration of a referral being passed between two hands, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="remit" aria-labelledby="remit-title">
  <div class="wrap remit__grid">
    <div>
      <p class="eyebrow">The remit</p>
      <h2 id="remit-title" data-split>Where your service ends, <em>ours begins</em></h2>
    </div>
    <div class="remit__body" data-reveal>
      <p class="remit__lede">Every service has edges. The practical matters just outside them, such as the empty house, the family abroad, the appointment nobody can attend or the clearance after a death, are where clients come to harm and professionals lose time.</p>
      <p>Stonemere takes those matters on, coordinates everyone involved and sees each one through, working alongside you and never instead of you.</p>
    </div>
  </div>
</section>

<section class="auds" aria-labelledby="auds-title">
  <div class="wrap">
    <h2 id="auds-title" class="sr">How we work with each profession</h2>
    <article class="aud" id="care-providers" aria-labelledby="care-providers-title">
    <figure class="aud__art" data-reveal="mask"><img src="{{ asset('assets/images/art/prof-care.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
    <div class="aud__copy">
      <h3 id="care-providers-title" class="aud__title" data-split>Domiciliary care companies</h3>
      <p class="aud__lead" data-reveal>Your carers are often first to notice what is going wrong outside the care plan. We pick it up so your team can stay on care.</p>
      <div class="aud__cols" data-reveal>
        <div><p class="aud__label">You hand over</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Post, bills and household admin that need attention</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Contact with family who are hard to reach or far away</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Appointments the client needs accompanying to</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Repairs and contractors at the client&rsquo;s home</li></ul></div>
        <div><p class="aud__label">You get back</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>One named contact for the client&rsquo;s practical matters</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Clear boundaries: we never deliver personal care</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Updates you agree with us, with the client&rsquo;s consent</li></ul></div>
      </div>
    </div>
  </article>
    <article class="aud" id="solicitors" aria-labelledby="solicitors-title">
    <figure class="aud__art" data-reveal="mask"><img src="{{ asset('assets/images/art/prof-solicitor.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
    <div class="aud__copy">
      <h3 id="solicitors-title" class="aud__title" data-split>Solicitors, executors and deputies</h3>
      <p class="aud__lead" data-reveal>Probate, deputyship and attorney matters stall on practical tasks. We do the legwork, in line with your instructions.</p>
      <div class="aud__cols" data-reveal>
        <div><p class="aud__label">You hand over</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Vacant property checks and property oversight</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Contractor coordination and access</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Possessions, storage, clearance and disposal</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Attendance with the client at solicitor and other appointments</li></ul></div>
        <div><p class="aud__label">You get back</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Matters followed through, not passed on</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A single point of contact for the family</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Decisions referred back to you, not made for you</li></ul></div>
      </div>
    </div>
  </article>
    <article class="aud" id="healthcare" aria-labelledby="healthcare-title">
    <figure class="aud__art" data-reveal="mask"><img src="{{ asset('assets/images/art/prof-health.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
    <div class="aud__copy">
      <h3 id="healthcare-title" class="aud__title" data-split>Healthcare professionals</h3>
      <p class="aud__lead" data-reveal>Discharge teams, GPs, community clinicians and social prescribers: going home safely depends on more than the care package.</p>
      <div class="aud__cols" data-reveal>
        <div><p class="aud__label">You hand over</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Preparing the home before discharge</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Transport, shopping and essential supplies</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Coordination with carers, family and services</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Accompaniment to follow-up appointments</li></ul></div>
        <div><p class="aud__label">You get back</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>The practical side handled, so plans hold</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A local contact who knows the client</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Work that sits alongside the clinical plan, never inside it</li></ul></div>
      </div>
    </div>
  </article>
    <article class="aud" id="property" aria-labelledby="property-title">
    <figure class="aud__art" data-reveal="mask"><img src="{{ asset('assets/images/art/prof-property.svg') }}" width="640" height="480" alt="" loading="lazy"></figure>
    <div class="aud__copy">
      <h3 id="property-title" class="aud__title" data-split>Property professionals</h3>
      <p class="aud__lead" data-reveal>Estate and letting agents and others managing a property linked to an older or vulnerable client.</p>
      <div class="aud__cols" data-reveal>
        <div><p class="aud__label">You hand over</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Access, keys and contractor visits</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Checks on empty or changing properties</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Downsizing, clearance and disposal</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Liaison with the family and the client&rsquo;s representatives</li></ul></div>
        <div><p class="aud__label">You get back</p><ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A dependable contact on the ground in Bath</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Matters coordinated with everyone involved</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Problems flagged early</li></ul></div>
      </div>
    </div>
  </article>
  </div>
</section>

<section class="builder-wrap" id="referral" aria-labelledby="builder-title">
  <div class="wrap">
    <div class="builder-wrap__head">
      <p class="eyebrow eyebrow--light">Referral builder</p>
      <h2 id="builder-title" data-split>Build a referral <em>in two minutes</em></h2>
      <p>Choose what applies and your message writes itself. It opens in WhatsApp for you to check and send.</p>
    </div>
    <form class="builder" data-wa-form="referral" novalidate aria-labelledby="builder-title">
  <div class="builder__steps">
    <fieldset class="builder__step">
      <legend><span class="builder__n">1</span> You are referring as</legend>
      <div class="chips"><label class="chip"><input type="radio" name="referrer" value="Domiciliary care provider" required><span>Domiciliary care provider</span></label><label class="chip"><input type="radio" name="referrer" value="Solicitor or executor"><span>Solicitor or executor</span></label><label class="chip"><input type="radio" name="referrer" value="Healthcare professional"><span>Healthcare professional</span></label><label class="chip"><input type="radio" name="referrer" value="Property professional"><span>Property professional</span></label><label class="chip"><input type="radio" name="referrer" value="Other organisation"><span>Other organisation</span></label><label class="chip"><input type="radio" name="referrer" value="Family member"><span>Family member</span></label></div>
      <p class="field__error" data-error="referrer" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">2</span> What the client needs <span class="builder__hint">(choose any)</span></legend>
      <div class="builder__groups">
        <div><p class="builder__group">Family &amp; Client Support</p><div class="chips"><label class="chip"><input type="checkbox" name="needs" value="Family liaison"><span>Family liaison</span></label><label class="chip"><input type="checkbox" name="needs" value="Welfare visits"><span>Welfare visits</span></label><label class="chip"><input type="checkbox" name="needs" value="Appointment accompaniment"><span>Appointment accompaniment</span></label><label class="chip"><input type="checkbox" name="needs" value="Admin support"><span>Admin support</span></label><label class="chip"><input type="checkbox" name="needs" value="End-of-life or post-death coordination"><span>End-of-life or post-death coordination</span></label></div></div>
        <div><p class="builder__group">Care &amp; Professional Liaison</p><div class="chips"><label class="chip"><input type="checkbox" name="needs" value="Case management"><span>Case management</span></label><label class="chip"><input type="checkbox" name="needs" value="Health and care coordination"><span>Health and care coordination</span></label><label class="chip"><input type="checkbox" name="needs" value="Liaison with care provider"><span>Liaison with care provider</span></label><label class="chip"><input type="checkbox" name="needs" value="Attendance at appointments"><span>Attendance at appointments</span></label></div></div>
        <div><p class="builder__group">Property &amp; Asset Management</p><div class="chips"><label class="chip"><input type="checkbox" name="needs" value="Property oversight"><span>Property oversight</span></label><label class="chip"><input type="checkbox" name="needs" value="Vacant property checks"><span>Vacant property checks</span></label><label class="chip"><input type="checkbox" name="needs" value="Contractor coordination"><span>Contractor coordination</span></label><label class="chip"><input type="checkbox" name="needs" value="Downsizing or clearance"><span>Downsizing or clearance</span></label><label class="chip"><input type="checkbox" name="needs" value="Storage and possessions"><span>Storage and possessions</span></label><label class="chip"><input type="checkbox" name="needs" value="Property or asset disposal"><span>Property or asset disposal</span></label></div></div>
        <div><p class="builder__group">Urgent &amp; Complex</p><div class="chips"><label class="chip"><input type="checkbox" name="needs" value="Same-day support"><span>Same-day support</span></label><label class="chip"><input type="checkbox" name="needs" value="Out-of-hours help"><span>Out-of-hours help</span></label><label class="chip"><input type="checkbox" name="needs" value="Crisis coordination"><span>Crisis coordination</span></label><label class="chip"><input type="checkbox" name="needs" value="Complex multi-party case"><span>Complex multi-party case</span></label></div></div>
      </div>
      <p class="field__error" data-error="needs" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">3</span> How soon</legend>
      <div class="chips"><label class="chip"><input type="radio" name="urgency" value="Today" required><span>Today</span></label><label class="chip"><input type="radio" name="urgency" value="This week"><span>This week</span></label><label class="chip"><input type="radio" name="urgency" value="Planning ahead"><span>Planning ahead</span></label></div>
      <p class="field__error" data-error="urgency" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">4</span> Where the client lives</legend>
      <div class="chips"><label class="chip"><input type="radio" name="area" value="Bath" required><span>Bath</span></label><label class="chip"><input type="radio" name="area" value="Elsewhere in B&NES"><span>Elsewhere in B&amp;NES</span></label><label class="chip"><input type="radio" name="area" value="Further afield"><span>Further afield</span></label></div>
      <p class="field__error" data-error="area" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step builder__step--fields">
      <legend><span class="builder__n">5</span> Your details</legend>
      <div class="form__row">
        <div class="field">
        <input id="rb-name" name="name" type="text" autocomplete="name" required placeholder=" " aria-describedby="rb-name-error">
        <label for="rb-name">Your name</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="rb-name-error" aria-live="polite"></p>
      </div>
        <div class="field">
        <input id="rb-org" name="organisation" type="text" autocomplete="organization" placeholder=" ">
        <label for="rb-org">Organisation</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="rb-org-error" aria-live="polite"></p>
      </div>
      </div>
      <div class="form__row">
        <div class="field">
        <input id="rb-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required placeholder=" " aria-describedby="rb-phone-error">
        <label for="rb-phone">Phone</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="rb-phone-error" aria-live="polite"></p>
      </div>
        <div class="field">
        <input id="rb-ref" name="reference" type="text" placeholder=" ">
        <label for="rb-ref">Client initials or your reference</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="rb-ref-error" aria-live="polite"></p>
      </div>
      </div>
    </fieldset>
  </div>
  <div class="builder__preview">
    <p class="builder__preview-title" id="builder-preview-title">Your message</p>
    <pre class="builder__text" data-preview-text aria-live="polite">Choose the options on the left and your referral message will appear here.</pre>
    <p class="form__note">Please don&rsquo;t include a client&rsquo;s full name, date of birth or medical details in a WhatsApp message. Initials or a reference are enough; we take the rest safely once we have spoken.</p>
    <button class="btn btn--gold btn--block" type="submit" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Send referral on WhatsApp">Send referral on WhatsApp</span></button>
    <p class="form__alt">or call <a href="tel:+441225338436">01225 338436</a></p>
    <div class="form__success" role="status" hidden>
      <p class="form__success-title"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>WhatsApp has opened with your referral.</p>
      <p>Press send in WhatsApp to reach us.</p>
    </div>
  </div>
</form>
  </div>
</section>

<section class="questions" aria-labelledby="pfaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head">
      <p class="eyebrow">Questions</p>
      <h2 id="pfaq-title" data-split>What referrers <em>ask first</em></h2>
    </div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="pfaq-a0" id="pfaq-q0">Does it cost anything to refer?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="pfaq-a0" role="region" aria-labelledby="pfaq-q0"><div class="faq__inner"><p>There is no charge for the first conversation. Before any work starts we agree in writing what we will do and who will pay: the client, their family or representative, or your organisation.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="pfaq-a1" id="pfaq-q1">Do you replace our service?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="pfaq-a1" role="region" aria-labelledby="pfaq-q1"><div class="faq__inner"><p>No. We take on the practical matters that sit outside your service and work alongside you. We do not provide personal care, nursing, medical treatment, or legal or financial advice.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="pfaq-a2" id="pfaq-q2">How do you keep us informed?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="pfaq-a2" role="region" aria-labelledby="pfaq-q2"><div class="faq__inner"><p>You agree with us how you want to be updated, and we keep to it, with the client&rsquo;s consent.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="pfaq-a3" id="pfaq-q3">Can you act when family members disagree or live abroad?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="pfaq-a3" role="region" aria-labelledby="pfaq-q3"><div class="faq__inner"><p>Yes. Family liaison and representation, and complex cases involving several family members or organisations, are part of what we do. We keep everyone on the same page while respecting the client&rsquo;s wishes.</p></div></div>
  </div>
</div>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Prefer to talk it through?</h2>
      <p>Call 01225 338436 or message us. Outline the situation and we will tell you straight away whether we can help.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20am%20a%20professional%20and%20would%20like%20to%20discuss%20a%20possible%20referral." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection