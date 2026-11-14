@extends('layouts.app')
@section('title', $contactContent?->meta_title ?: ($page?->meta_title ?: 'Contact Stonemere Life Management | Call 01225 338436 | Bath'))
@if($contactContent?->meta_description || $page?->meta_description)
@section('meta_description', $contactContent?->meta_description ?: $page->meta_description)
@endif
@if($contactContent?->meta_keywords || $page?->meta_keywords)
@section('meta_keywords', $contactContent?->meta_keywords ?: $page->meta_keywords)
@endif
@if($contactContent?->og_title || $page?->og_title)
@section('og_title', $contactContent?->og_title ?: $page->og_title)
@endif
@if($contactContent?->og_description || $page?->og_description)
@section('og_description', $contactContent?->og_description ?: $page->og_description)
@endif
@if($contactContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($contactContent->og_image))
@elseif($page?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($page->og_image))
@endif

@section('css')

@endsection

@section('content')

<main id="main" tabindex="-1">
<section class="contact-hero" aria-labelledby="page-title">
  <div class="wrap contact-hero__grid">
    <div class="contact-hero__copy">
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">Contact</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">{{ $contactContent->hero_eyebrow ?? 'Contact' }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($contactContent->hero_title ?? 'Talk to <em>Stonemere</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $contactContent->hero_lead ?? 'Message, call or send the form. Tell us who you are and, in outline, what is needed.' }}</p>
      <ul class="routes" role="list">
        <li data-reveal><a class="route" href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener" data-cursor="Message"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="route__label">{{ $contactContent->routes_whatsapp_label ?? 'WhatsApp' }}</span><span class="route__value">{{ $settings_whatsapp }}</span></a></li>
        <li data-reveal><a class="route" href="tel:{{ $settings_phone_tel }}" data-cursor="Call"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="route__label">{{ $contactContent->routes_phone_label ?? 'Call' }}</span><span class="route__value">{{ $settings_phone }}</span></a></li>
        @if($settings_email)
        <li data-reveal><a class="route" href="mailto:{{ $settings_email }}"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg><span class="route__label">Email</span><span class="route__value">{{ $settings_email }}</span></a></li>
        @endif
        <li data-reveal><span class="route route--static"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-pin"/></svg><span class="route__label">{{ $contactContent->routes_area_label ?? 'Area' }}</span><span class="route__value">{{ $settings_address }}</span></span></li>
      </ul>
      <p class="contact-hero__pro">{{ $contactContent->referral_prefix ?? 'Referring a client?' }} <a class="tlink" href="{{ route('professionals') }}#referral">{{ $contactContent->referral_link_text ?? 'Use the referral builder' }}<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></p>
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
          <option value="" selected disabled>{{ $contactContent->form_role_placeholder ?? 'Choose one' }}</option>
          @foreach($contactContent->form_role_options ?? [] as $role)
          <option value="{{ $role['value'] ?? $role }}">{{ $role['label'] ?? $role }}</option>
          @endforeach
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
        <p class="form__alt">or call <a href="tel:{{ $settings_phone_tel }}">{{ $settings_phone }}</a></p>
      </div>
      <div class="form__success" role="status" hidden>
        <p class="form__success-title"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>WhatsApp has opened with your message.</p>
        <p>Press send in WhatsApp to reach us. If it didn&rsquo;t open, call <a href="tel:{{ $settings_phone_tel }}">{{ $settings_phone }}</a>.</p>
      </div>
    </form>
    </div>
  </div>
</section>
</main>
@endsection

@section('js')

@endsection