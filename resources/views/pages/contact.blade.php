@extends('layouts.app')
@section('title','Contact Stonemere Life Management | Call 01225 338436 | Bath')

@section('css')

@endsection

@section('content')

<main id="main" tabindex="-1">
<section class="contact-hero" aria-labelledby="page-title">
  <div class="wrap contact-hero__grid">
    <div class="contact-hero__copy">
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="index.html">Home</a></li><li><span aria-current="page">Contact</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">Contact</p>
      <h1 id="page-title" class="phero__title" data-split>Talk to <em>Stonemere</em></h1>
      <p class="phero__lead" data-reveal>Message, call or send the form. Tell us who you are and, in outline, what is needed.</p>
      <ul class="routes" role="list">
        <li data-reveal><a class="route" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener" data-cursor="Message"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="route__label">WhatsApp</span><span class="route__value">07891 341414</span></a></li>
        <li data-reveal><a class="route" href="tel:+441225338436" data-cursor="Call"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="route__label">Call</span><span class="route__value">01225 338436</span></a></li>
        <li data-reveal data-email-row hidden><a class="route" data-email href="#"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg><span class="route__label">Email</span><span class="route__value" data-email-text></span></a></li>
        <li data-reveal><span class="route route--static"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-pin"/></svg><span class="route__label">Area</span><span class="route__value">Bath &amp; North East Somerset</span></span></li>
      </ul>
      <p class="contact-hero__pro">Referring a client? <a class="tlink" href="professionals.html#referral">Use the referral builder<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></p>
    </div>
    <div class="contact-hero__form">
      <form class="form form--dark" data-wa-form="enquiry" novalidate aria-labelledby="ct-form-title">
      <h2 class="sr" id="ct-form-title">Send an enquiry</h2>
      <div class="form__row">
        <div class="field">
        <input id="ct-name" name="name" type="text" autocomplete="name" required placeholder=" " aria-describedby="ct-name-error">
        <label for="ct-name">Your name</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="ct-name-error" aria-live="polite"></p>
      </div>
        <div class="field">
        <input id="ct-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required placeholder=" " aria-describedby="ct-phone-error">
        <label for="ct-phone">Phone</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="ct-phone-error" aria-live="polite"></p>
      </div>
      </div>
      <div class="field">
        <input id="ct-org" name="organisation" type="text" autocomplete="organization" placeholder=" ">
        <label for="ct-org">Organisation (optional)</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="ct-org-error" aria-live="polite"></p>
      </div>
      <div class="field field--select">
        <select id="ct-role" name="role" required aria-describedby="ct-role-error">
          <option value="" selected disabled>Choose one</option>
          <option>Domiciliary care provider</option>
          <option>Solicitor or executor</option>
          <option>Healthcare professional</option>
          <option>Property professional</option>
          <option>Family member</option>
          <option>Contacting for myself</option>
          <option>Other organisation</option>
        </select>
        <label for="ct-role">I am contacting you as</label>
        <span class="field__line" aria-hidden="true"></span>
        <p class="field__error" id="ct-role-error" aria-live="polite"></p>
      </div>
      <div class="field">
        <textarea id="ct-msg" name="message" rows="4" required placeholder=" " aria-describedby="ct-msg-error"></textarea>
        <label for="ct-msg">How can we help?</label>
        <span class="field__line" aria-hidden="true"></span>
        
        <p class="field__error" id="ct-msg-error" aria-live="polite"></p>
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
  </div>
</section>
</main>
@endsection

@section('js')

@endsection