@extends('layouts.app')
@section('title', $priceMenuContent?->meta_title ?: ($page?->meta_title ?: 'Stonemere Life Management | Practical coordination for care providers, solicitors & health professionals in Bath'))
@if($priceMenuContent?->meta_description || $page?->meta_description)
@section('meta_description', $priceMenuContent?->meta_description ?: $page->meta_description)
@endif
@if($priceMenuContent?->meta_keywords || $page?->meta_keywords)
@section('meta_keywords', $priceMenuContent?->meta_keywords ?: $page->meta_keywords)
@endif
@if($priceMenuContent?->og_title || $page?->og_title)
@section('og_title', $priceMenuContent?->og_title ?: $page->og_title)
@endif
@if($priceMenuContent?->og_description || $page?->og_description)
@section('og_description', $priceMenuContent?->og_description ?: $page->og_description)
@endif
@if($priceMenuContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($priceMenuContent->og_image))
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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">Price menu</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">{{ $priceMenuContent->hero_eyebrow ?? 'Price menu' }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($priceMenuContent->hero_title ?? 'Our Price <em>Menu</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $priceMenuContent->hero_lead ?? 'Clear charges. Flexible support. Agreed upfront. We provide bespoke lifestyle management and professional support, with services tailored to your individual requirements.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $priceMenuContent->hero_cta_primary_url ?? 'https://wa.me/44777753092?text=Hello%20Stonemere%2C%20I%27d%20like%20to%20book%20a%20free%20telephone%20consultation.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $priceMenuContent->hero_cta_primary_text ?? 'Book Your Free Consultation' }}">{{ $priceMenuContent->hero_cta_primary_text ?? 'Book Your Free Consultation' }}</span></a><a class="btn btn--line-light" href="{{ $priceMenuContent->hero_cta_secondary_url ?? 'tel:+443330541060' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $priceMenuContent->hero_cta_secondary_text ?? 'Call +44 3330 541060' }}">{{ $priceMenuContent->hero_cta_secondary_text ?? 'Call +44 3330 541060' }}</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-price.svg') }}" width="800" height="1000" alt="Illustration of a ledger, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="pintro" aria-labelledby="intro-title">
  <div class="wrap pintra__inner">
    <p class="eyebrow">{{ $priceMenuContent->intro_eyebrow ?? 'How our menu pricing works' }}</p>
    <h2 id="intro-title" data-split>@safeHtml($priceMenuContent->intro_title ?? 'Flexible support, <em>agreed upfront</em>')</h2>
    <div class="pintro__text">
      @foreach(preg_split('/\R{2,}/', trim($priceMenuContent->intro_text ?? 'We begin with a complimentary initial telephone conversation of up to 30 minutes. You then choose only the support you need; there is no fixed ongoing package. The scope of work, likely time and any third-party spending are agreed in advance wherever reasonably possible.')) as $paragraph)
      @if(trim($paragraph) !== '')<p>{{ trim($paragraph) }}</p>@endif
      @endforeach
    </div>
  </div>
</section>

<section class="ptable-wrap" aria-labelledby="ptable-title">
  <div class="wrap">
    <div class="ptable__head">
      <p class="eyebrow">{{ $priceMenuContent->table_eyebrow ?? 'Service pricing' }}</p>
      <h2 id="ptable-title" data-split>@safeHtml($priceMenuContent->table_title ?? 'Rates <em>at a glance</em>')</h2>
    </div>
    <div class="ptable" data-reveal>
      <table>
        <thead>
          <tr><th scope="col">Service</th><th scope="col" class="ptable__price-col">Price</th></tr>
        </thead>
        <tbody>
          @foreach($servicePrices ?? [] as $service)
          <tr>
            <td class="ptable__service">
              <span class="ptable__name">{{ $service->name }}</span>
              @if($service->description)<span class="ptable__desc">{{ $service->description }}</span>@endif
            </td>
            <td class="ptable__price">
              <span class="ptable__price-text">@safeHtml($service->price_text)</span>
              @if($service->additional_info)<span class="ptable__price-note">{{ $service->additional_info }}</span>@endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="ptable__foot">All prices are guide rates agreed before work begins wherever reasonably possible.</p>
  </div>
</section>

@php
$chargeIcons = ['i-pin','i-keystone','i-scale','i-user','i-lock','i-check','i-clock','i-shield','i-phone','i-mail'];
@endphp
<section class="charges" aria-labelledby="charges-title">
  <div class="wrap charges__grid">
    <div class="charges__head">
      <p class="eyebrow">{{ $priceMenuContent->charges_eyebrow ?? 'Additional charges' }}</p>
      <h2 id="charges-title" data-split>@safeHtml($priceMenuContent->charges_title ?? 'How Additional <em>Charges Work</em>')</h2>
    </div>
    <div class="faq" data-faq>
      @foreach($priceMenuContent->charge_items ?? [] as $index => $item)
      <div class="faq__item charges__item">
        <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="charge-a{{ $index }}" id="charge-q{{ $index }}"><span class="charges__icon"><svg class="i" aria-hidden="true" focusable="false"><use href="#{{ in_array($item['icon'] ?? '', $chargeIcons, true) ? $item['icon'] : 'i-check' }}"/></svg></span>{{ $item['title'] ?? '' }}<span class="faq__icon" aria-hidden="true"></span></button></h3>
        <div class="faq__a" id="charge-a{{ $index }}" role="region" aria-labelledby="charge-q{{ $index }}"><div class="faq__inner">
          @foreach(preg_split('/\R{2,}/', trim($item['text'] ?? '')) as $paragraph)
          @if(trim($paragraph) !== '')<p>{{ trim($paragraph) }}</p>@endif
          @endforeach
        </div></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="agreement" aria-labelledby="agreement-title">
  <div class="wrap agreement__inner">
    <p class="eyebrow">{{ $priceMenuContent->agreement_eyebrow ?? 'Before we begin' }}</p>
    <h2 id="agreement-title" data-split>@safeHtml($priceMenuContent->agreement_title ?? 'Agreement Before <em>Work Starts</em>')</h2>
    <div class="agreement__text">
      @foreach(preg_split('/\R{2,}/', trim($priceMenuContent->agreement_text ?? '')) as $paragraph)
      @if(trim($paragraph) !== '')<p>{{ trim($paragraph) }}</p>@endif
      @endforeach
    </div>
  </div>
</section>

<section class="questions" aria-labelledby="prfaq-title">
  <div class="wrap questions__grid">
    <div class="questions__head"><p class="eyebrow">{{ $priceMenuContent->faqs_eyebrow ?? 'Questions' }}</p><h2 id="prfaq-title" data-split>@safeHtml($priceMenuContent->faqs_title ?? 'About <em>pricing</em>')</h2></div>
    <div class="faq" data-faq>
      @foreach($priceMenuContent->faqs_items ?? [] as $index => $faq)
      <div class="faq__item">
        <h3 class="faq__q"><button type="button" aria-expanded="false" aria-controls="prfaq-a{{ $index }}" id="prfaq-q{{ $index }}">{{ $faq['question'] ?? '' }}<span class="faq__icon" aria-hidden="true"></span></button></h3>
        <div class="faq__a" id="prfaq-a{{ $index }}" role="region" aria-labelledby="prfaq-q{{ $index }}"><div class="faq__inner"><p>@safeHtml($faq['answer'] ?? '')</p></div></div>
      </div>
      @endforeach
</div>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">{{ $priceMenuContent->cta_eyebrow ?? 'Next step' }}</p>
      <h2 id="cta-band-title" data-split>@safeHtml($priceMenuContent->cta_title ?? 'Ask for current rates')</h2>
      <p>{{ $priceMenuContent->cta_text ?? 'We will send them straight away and recommend honestly, even when that means the lowest level.' }}</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="{{ $priceMenuContent->cta_button_primary_url ?? 'https://wa.me/44777753092?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $priceMenuContent->cta_button_primary_text ?? 'Message on WhatsApp' }}">{{ $priceMenuContent->cta_button_primary_text ?? 'Message on WhatsApp' }}</span></a>
      <a class="btn btn--line" href="{{ $priceMenuContent->cta_button_secondary_url ?? 'tel:+443330541060' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $priceMenuContent->cta_button_secondary_text ?? 'Call +44 3330 541060' }}">{{ $priceMenuContent->cta_button_secondary_text ?? 'Call +44 3330 541060' }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection