@extends('layouts.app')
@section('title', $professionalsContent?->meta_title ?: ($page?->meta_title ?: 'For Professionals | Refer a Client to Stonemere Life Management, Bath'))
@if($professionalsContent?->meta_description || $page?->meta_description)
@section('meta_description', $professionalsContent?->meta_description ?: $page->meta_description)
@endif
@if($professionalsContent?->meta_keywords || $page?->meta_keywords)
@section('meta_keywords', $professionalsContent?->meta_keywords ?: $page->meta_keywords)
@endif
@if($professionalsContent?->og_title || $page?->og_title)
@section('og_title', $professionalsContent?->og_title ?: $page->og_title)
@endif
@if($professionalsContent?->og_description || $page?->og_description)
@section('og_description', $professionalsContent?->og_description ?: $page->og_description)
@endif
@if($professionalsContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($professionalsContent->og_image))
@elseif($page?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($page->og_image))
@endif

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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">For professionals</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">{{ $professionalsContent->hero_eyebrow ?? 'For professionals' }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($professionalsContent->hero_title ?? 'Hand over the practical side. <em>We follow it through.</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $professionalsContent->hero_lead ?? 'For care providers, solicitors, healthcare and property professionals whose clients need practical coordination beyond your core service. One named contact, a clear remit and no chasing.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $professionalsContent->hero_cta_primary_url ?? '#referral' }}" data-magnetic><span class="roll" data-text="{{ $professionalsContent->hero_cta_primary_text ?? 'Build a referral' }}">{{ $professionalsContent->hero_cta_primary_text ?? 'Build a referral' }}</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a><a class="btn btn--line-light" href="{{ $professionalsContent->hero_cta_secondary_url ?? 'tel:+441225338436' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $professionalsContent->hero_cta_secondary_text ?? 'Call 01225 338436' }}">{{ $professionalsContent->hero_cta_secondary_text ?? 'Call 01225 338436' }}</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-professionals.svg') }}" width="800" height="1000" alt="Illustration of a referral being passed between two hands, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="remit" aria-labelledby="remit-title">
  <div class="wrap remit__grid">
    <div>
      <p class="eyebrow">{{ $professionalsContent->remit_eyebrow ?? 'The remit' }}</p>
      <h2 id="remit-title" data-split>@safeHtml($professionalsContent->remit_title ?? 'Where your service ends, <em>ours begins</em>')</h2>
    </div>
    <div class="remit__body" data-reveal>
      <p class="remit__lede">{{ $professionalsContent->remit_lede ?? 'Every service has edges. The practical matters just outside them, such as the empty house, the family abroad, the appointment nobody can attend or the clearance after a death, are where clients come to harm and professionals lose time.' }}</p>
      <p>{{ $professionalsContent->remit_body ?? 'Stonemere takes those matters on, coordinates everyone involved and sees each one through, working alongside you and never instead of you.' }}</p>
    </div>
  </div>
</section>

<section class="auds" aria-labelledby="auds-title">
  <div class="wrap">
    <h2 id="auds-title" class="sr">How we work with each profession</h2>
    @php
    $audAnchors = ['domiciliary-care' => 'care-providers', 'solicitors' => 'solicitors', 'healthcare' => 'healthcare', 'property' => 'property'];
    $audImages = ['domiciliary-care' => 'assets/images/art/prof-care.svg', 'solicitors' => 'assets/images/art/prof-solicitor.svg', 'healthcare' => 'assets/images/art/prof-health.svg', 'property' => 'assets/images/art/prof-property.svg'];
    @endphp
    @foreach($audiences ?? [] as $audience)
    @php $audSlug = $audience->slug; @endphp
    <article class="aud" id="{{ $audAnchors[$audSlug] ?? $audSlug }}" aria-labelledby="{{ $audAnchors[$audSlug] ?? $audSlug }}-title">
    <figure class="aud__art" data-reveal="mask"><img src="{{ \App\Helpers\ImageUrlHelper::resolve($audience->hero_image ?? ($audImages[$audSlug] ?? 'assets/images/art/prof-care.svg')) }}" width="640" height="480" alt="" loading="lazy"></figure>
    <div class="aud__copy">
      <h3 id="{{ $audAnchors[$audSlug] ?? $audSlug }}-title" class="aud__title" data-split>@safeHtml($audience->title)</h3>
      <p class="aud__lead" data-reveal>{{ $audience->description }}</p>
      <div class="aud__cols" data-reveal>
        <div><p class="aud__label">You hand over</p><ul class="ticks" role="list">@foreach($audience->hand_over_list ?? [] as $item)<li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>@safeHtml($item)</li>@endforeach</ul></div>
        <div><p class="aud__label">You get back</p><ul class="ticks" role="list">@foreach($audience->get_back_list ?? [] as $item)<li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>@safeHtml($item)</li>@endforeach</ul></div>
      </div>
    </div>
  </article>
  @endforeach
  </div>
</section>

<section class="builder-wrap" id="referral" aria-labelledby="builder-title">
  <div class="wrap">
    <div class="builder-wrap__head">
      <p class="eyebrow eyebrow--light">{{ $professionalsContent->builder_eyebrow ?? 'Referral builder' }}</p>
      <h2 id="builder-title" data-split>@safeHtml($professionalsContent->builder_title ?? 'Build a referral <em>in two minutes</em>')</h2>
      <p>{{ $professionalsContent->builder_intro ?? 'Choose what applies and your message writes itself. It opens in WhatsApp for you to check and send.' }}</p>
    </div>
    <form class="builder" data-wa-form="referral" novalidate aria-labelledby="builder-title">
  <div class="builder__steps">
    <fieldset class="builder__step">
      <legend><span class="builder__n">1</span> You are referring as</legend>
      <div class="chips">@foreach($professionalsContent->builder_referrer_options ?? [] as $opt)<label class="chip"><input type="radio" name="referrer" value="{{ $opt['value'] }}" required><span>{{ $opt['label'] }}</span></label>@endforeach</div>
      <p class="field__error" data-error="referrer" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">2</span> What the client needs <span class="builder__hint">(choose any)</span></legend>
      <div class="builder__groups">
        @foreach($professionalsContent->builder_needs_groups ?? [] as $group)
        <div><p class="builder__group">@safeHtml($group['label'])</p><div class="chips">@foreach($group['options'] ?? [] as $opt)<label class="chip"><input type="checkbox" name="needs" value="{{ $opt['value'] }}"><span>{{ $opt['label'] }}</span></label>@endforeach</div></div>
        @endforeach
      </div>
      <p class="field__error" data-error="needs" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">3</span> How soon</legend>
      <div class="chips">@foreach($professionalsContent->builder_urgency_options ?? [] as $opt)<label class="chip"><input type="radio" name="urgency" value="{{ $opt['value'] }}" required><span>{{ $opt['label'] }}</span></label>@endforeach</div>
      <p class="field__error" data-error="urgency" aria-live="polite"></p>
    </fieldset>
    <fieldset class="builder__step">
      <legend><span class="builder__n">4</span> Where the client lives</legend>
      <div class="chips">@foreach($professionalsContent->builder_area_options ?? [] as $opt)<label class="chip"><input type="radio" name="area" value="{{ $opt['value'] }}" required><span>@safeHtml($opt['label'])</span></label>@endforeach</div>
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
    <p class="form__alt">or call <a href="tel:{{ $settings_phone_tel }}">{{ $settings_phone }}</a></p>
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
      <p class="eyebrow">{{ $professionalsContent->faqs_eyebrow ?? 'Questions' }}</p>
      <h2 id="pfaq-title" data-split>@safeHtml($professionalsContent->faqs_title ?? 'What referrers <em>ask first</em>')</h2>
    </div>
    <div class="faq" data-faq>
      @foreach($professionalsContent->faqs_items ?? [] as $index => $faq)
      <div class="faq__item">
        <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="pfaq-a{{ $index }}" id="pfaq-q{{ $index }}">{{ $faq['question'] ?? '' }}<span class="faq__icon" aria-hidden="true"></span></button></h3>
        <div class="faq__a" id="pfaq-a{{ $index }}" role="region" aria-labelledby="pfaq-q{{ $index }}"><div class="faq__inner"><p>@safeHtml($faq['answer'] ?? '')</p></div></div>
      </div>
      @endforeach
</div>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">{{ $professionalsContent->cta_eyebrow ?? 'Next step' }}</p>
      <h2 id="cta-band-title" data-split>@safeHtml($professionalsContent->cta_title ?? 'Prefer to talk it through?')</h2>
      <p>{{ $professionalsContent->cta_text ?? 'Call 01225 338436 or message us. Outline the situation and we will tell you straight away whether we can help.' }}</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="{{ $professionalsContent->cta_button_primary_url ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20am%20a%20professional%20and%20would%20like%20to%20discuss%20a%20possible%20referral.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $professionalsContent->cta_button_primary_text ?? 'Message on WhatsApp' }}">{{ $professionalsContent->cta_button_primary_text ?? 'Message on WhatsApp' }}</span></a>
      <a class="btn btn--line" href="{{ $professionalsContent->cta_button_secondary_url ?? 'tel:+441225338436' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $professionalsContent->cta_button_secondary_text ?? 'Call 01225 338436' }}">{{ $professionalsContent->cta_button_secondary_text ?? 'Call 01225 338436' }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection