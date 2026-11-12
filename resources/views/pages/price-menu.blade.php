@extends('layouts.app')
@section('title','Stonemere Life Management | Practical coordination for care providers, solicitors &amp; health professionals in Bath')

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><span aria-current="page">Price menu</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Price menu</p>
      <h1 id="page-title" class="phero__title" data-split>Clear charges, <em>agreed upfront</em></h1>
      <p class="phero__lead" data-reveal>Ongoing support runs on a simple membership credited to the client&rsquo;s own account. Everything else is explained and agreed in advance. Current rates are confirmed in writing.</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask for current rates">Ask for current rates</span></a><a class="btn btn--line-light" href="#finder" data-magnetic><span class="roll" data-text="Find a level">Find a level</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-price.svg') }}" width="800" height="1000" alt="Illustration of a ledger, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="account" aria-labelledby="account-title">
  <div class="wrap">
    <div class="account__head">
      <p class="eyebrow">The client account</p>
      <h2 id="account-title" data-split>How the membership <em>works</em></h2>
    </div>
    <ol class="account__flow" role="list" data-draw>
      <li data-reveal><span class="account__n">1</span><h3>Choose a level</h3><p>Silver, Gold or Platinum, depending on how much support is likely to be needed.</p></li>
      <li data-reveal><span class="account__n">2</span><h3>Payments credit the account</h3><p>Monthly membership payments go into the client&rsquo;s own Stonemere account.</p></li>
      <li data-reveal><span class="account__n">3</span><h3>Funds are used as we work</h3><p>The account is drawn down against Stonemere&rsquo;s time and services, and you can see how.</p></li>
    </ol>
  </div>
</section>

<section class="levels" aria-labelledby="levels-title">
  <div class="wrap">
    <div class="levels__head"><p class="eyebrow eyebrow--light">Membership levels</p><h2 id="levels-title" data-split>Three levels</h2></div>
    <div class="levels__grid">
      <article class="level level--silver" data-reveal data-tilt>
        <span class="level__swatch" aria-hidden="true"></span>
        <h3 class="level__name">Silver</h3>
        <p class="level__for">Occasional, dependable help</p>
        <ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A named Stonemere contact</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Help with appointments, admin and the odd practical problem</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Typically suits clients who are largely independent</li></ul>
        <p class="level__price">Monthly membership &middot; rate on request</p>
        <a class="tlink" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20ask%20about%20the%20Silver%20membership." target="_blank" rel="noopener">Ask about Silver<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
      </article>
      <article class="level level--gold" data-reveal data-tilt>
        <span class="level__swatch" aria-hidden="true"></span>
        <h3 class="level__name">Gold</h3>
        <p class="level__for">Regular, ongoing coordination</p>
        <ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>A named contact who holds the whole picture</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Regular practical help across the organisations involved</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Typically suits several organisations being involved</li></ul>
        <p class="level__price">Monthly membership &middot; rate on request</p>
        <a class="tlink" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20ask%20about%20the%20Gold%20membership." target="_blank" rel="noopener">Ask about Gold<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
      </article>
      <article class="level level--platinum" data-reveal data-tilt>
        <span class="level__swatch" aria-hidden="true"></span>
        <h3 class="level__name">Platinum</h3>
        <p class="level__for">Complex situations and families at a distance</p>
        <ul class="ticks" role="list"><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Coordination across many parties</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Frequent updates for families near and far</li><li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>Typically suits complex or changing circumstances</li></ul>
        <p class="level__price">Monthly membership &middot; rate on request</p>
        <a class="tlink" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20ask%20about%20the%20Platinum%20membership." target="_blank" rel="noopener">Ask about Platinum<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
      </article>
    </div>
  </div>
</section>

<section class="finder-wrap" id="finder" aria-labelledby="finder-title">
  <div class="wrap finder-wrap__grid">
    <div>
      <p class="eyebrow">Level finder</p>
      <h2 id="finder-title" data-split>Which level <em>fits?</em></h2>
      <p>Three questions for a starting point. We confirm the right level with you before anything is agreed.</p>
    </div>
    <form class="finder" data-finder novalidate aria-labelledby="finder-title">
  <div class="finder__qs">
    <fieldset class="finder__q">
      <legend><span class="builder__n">1</span> How often is practical help needed?</legend>
      <div class="chips"><label class="chip"><input type="radio" name="often" value="1" data-label="Now and then"><span>Now and then</span></label><label class="chip"><input type="radio" name="often" value="2" data-label="Most weeks"><span>Most weeks</span></label><label class="chip"><input type="radio" name="often" value="3" data-label="Several times a week"><span>Several times a week</span></label></div>
    </fieldset>
    <fieldset class="finder__q">
      <legend><span class="builder__n">2</span> How many organisations are involved?</legend>
      <div class="chips"><label class="chip"><input type="radio" name="parties" value="1" data-label="One or two"><span>One or two</span></label><label class="chip"><input type="radio" name="parties" value="2" data-label="Three to five"><span>Three to five</span></label><label class="chip"><input type="radio" name="parties" value="3" data-label="More than five"><span>More than five</span></label></div>
    </fieldset>
    <fieldset class="finder__q">
      <legend><span class="builder__n">3</span> Where is the family?</legend>
      <div class="chips"><label class="chip"><input type="radio" name="family" value="1" data-label="Close by and involved"><span>Close by and involved</span></label><label class="chip"><input type="radio" name="family" value="2" data-label="Elsewhere in the UK"><span>Elsewhere in the UK</span></label><label class="chip"><input type="radio" name="family" value="3" data-label="Abroad, or no family"><span>Abroad, or no family</span></label></div>
    </fieldset>
  </div>
  <div class="finder__result" aria-live="polite">
    <p class="finder__label">Suggested level</p>
    <p class="finder__level" data-finder-level>Three questions</p>
    <p class="finder__why" data-finder-why>We&rsquo;ll suggest a starting point. We always recommend honestly, even when that means the lowest level.</p>
    <a class="btn btn--gold" data-finder-cta href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20ask%20about%20membership%20levels." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask on WhatsApp">Ask on WhatsApp</span></a>
  </div>
</form>
  </div>
</section>

<section class="separate" aria-labelledby="separate-title">
  <div class="wrap separate__grid">
    <div>
      <p class="eyebrow">Charged separately</p>
      <h2 id="separate-title" data-split>Always <em>agreed first</em></h2>
      <p>These are not drawn from membership. Each one is explained and agreed before it is incurred.</p>
    </div>
    <dl class="ledger">
      <div data-reveal><dt>Transport</dt><dd>Including accompanied journeys</dd></div>
      <div data-reveal><dt>Procurement</dt><dd>Goods and services bought on the client&rsquo;s behalf</dd></div>
      <div data-reveal><dt>Third-party charges</dt><dd>Removals, storage, shipping, tradespeople and similar</dd></div>
      <div data-reveal><dt>Crisis Management</dt><dd>Urgent work, charged separately when it is needed</dd></div>
      <div data-reveal><dt>Organisations</dt><dd>Work for a referring organisation is quoted per case, in writing</dd></div>
    </dl>
  </div>
</section>

<section class="questions" aria-labelledby="prfaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">Questions</p><h2 id="prfaq-title" data-split>About <em>pricing</em></h2></div>
    <div class="faq" data-faq>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="prfaq-a0" id="prfaq-q0">Why are there no prices on this page?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="prfaq-a0" role="region" aria-labelledby="prfaq-q0"><div class="faq__inner"><p>Rates are confirmed in writing for each client, because the right level depends on how much coordination is needed. Ask and we will send current rates straight away.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="prfaq-a1" id="prfaq-q1">Can a family member or an organisation pay?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="prfaq-a1" role="region" aria-labelledby="prfaq-q1"><div class="faq__inner"><p>Yes. The client, a family member or representative, or the referring organisation can fund the work. This is agreed in writing first.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="prfaq-a2" id="prfaq-q2">Can the level change?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="prfaq-a2" role="region" aria-labelledby="prfaq-q2"><div class="faq__inner"><p>Yes. Clients can move between levels as circumstances change. Notice is set out in the written agreement.</p></div></div>
  </div>
  <div class="faq__item">
    <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="prfaq-a3" id="prfaq-q3">Will we see how the account is used?<span class="faq__icon" aria-hidden="true"></span></button></h3>
    <div class="faq__a" id="prfaq-a3" role="region" aria-labelledby="prfaq-q3"><div class="faq__inner"><p>Yes. The client account is drawn down against Stonemere&rsquo;s time and services, and you can see how it has been used.</p></div></div>
  </div>
</div>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">Next step</p>
      <h2 id="cta-band-title" data-split>Ask for current rates</h2>
      <p>We will send them straight away and recommend honestly, even when that means the lowest level.</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Message on WhatsApp">Message on WhatsApp</span></a>
      <a class="btn btn--line" href="tel:+441225338436" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="Call 01225 338436">Call 01225 338436</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection