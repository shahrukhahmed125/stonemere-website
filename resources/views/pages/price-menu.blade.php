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
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($priceMenuContent->hero_title ?? 'Clear charges, <em>agreed upfront</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $priceMenuContent->hero_lead ?? 'Ongoing support runs on a simple membership credited to the client&rsquo;s own account. Everything else is explained and agreed in advance. Current rates are confirmed in writing.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $priceMenuContent->hero_cta_primary_url ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $priceMenuContent->hero_cta_primary_text ?? 'Ask for current rates' }}">{{ $priceMenuContent->hero_cta_primary_text ?? 'Ask for current rates' }}</span></a><a class="btn btn--line-light" href="{{ $priceMenuContent->hero_cta_secondary_url ?? '#finder' }}" data-magnetic><span class="roll" data-text="{{ $priceMenuContent->hero_cta_secondary_text ?? 'Find a level' }}">{{ $priceMenuContent->hero_cta_secondary_text ?? 'Find a level' }}</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-price.svg') }}" width="800" height="1000" alt="Illustration of a ledger, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="account" aria-labelledby="account-title">
  <div class="wrap">
    <div class="account__head">
      <p class="eyebrow">{{ $priceMenuContent->account_eyebrow ?? 'The client account' }}</p>
      <h2 id="account-title" data-split>@safeHtml($priceMenuContent->account_title ?? 'How the membership <em>works</em>')</h2>
    </div>
    <ol class="account__flow" role="list" data-draw>
      @foreach($priceMenuContent->account_steps ?? [
          ['title' => 'Choose a level', 'text' => 'Silver, Gold or Platinum, depending on how much support is likely to be needed.'],
          ['title' => 'Payments credit the account', 'text' => 'Monthly membership payments go into the client&rsquo;s own Stonemere account.'],
          ['title' => 'Funds are used as we work', 'text' => 'The account is drawn down against Stonemere&rsquo;s time and services, and you can see how.'],
      ] as $index => $step)
      <li data-reveal><span class="account__n">{{ $index + 1 }}</span><h3>{{ $step['title'] ?? '' }}</h3><p>@safeHtml($step['text'] ?? '')</p></li>
      @endforeach
    </ol>
  </div>
</section>

<section class="levels" aria-labelledby="levels-title">
  <div class="wrap">
    <div class="levels__head"><p class="eyebrow eyebrow--light">{{ $priceMenuContent->levels_eyebrow ?? 'Membership levels' }}</p><h2 id="levels-title" data-split>@safeHtml($priceMenuContent->levels_title ?? 'Three levels')</h2></div>
    <div class="levels__grid">
      @foreach($membershipLevels ?? [] as $level)
      <article class="level level--{{ $level->slug }}" data-reveal data-tilt>
        <span class="level__swatch" aria-hidden="true"></span>
        <h3 class="level__name">{{ $level->name }}</h3>
        <p class="level__for">{{ $level->description }}</p>
        <ul class="ticks" role="list">@foreach($level->features ?? [] as $feature)<li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-check"/></svg>@safeHtml($feature)</li>@endforeach</ul>
        <p class="level__price">{{ $level->price_text }}</p>
        <a class="tlink" href="https://wa.me/447891341414?text={{ rawurlencode('Hello Stonemere, I\'d like to ask about the '.$level->name.' membership.') }}" target="_blank" rel="noopener">Ask about {{ $level->name }}<svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a>
      </article>
      @endforeach
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
      <p class="eyebrow">{{ $priceMenuContent->separate_eyebrow ?? 'Charged separately' }}</p>
      <h2 id="separate-title" data-split>@safeHtml($priceMenuContent->separate_title ?? 'Always <em>agreed first</em>')</h2>
      <p>{{ $priceMenuContent->separate_text ?? 'These are not drawn from membership. Each one is explained and agreed before it is incurred.' }}</p>
    </div>
    <dl class="ledger">
      @foreach(($pricingItems ?? collect()) as $item)
      <div data-reveal><dt>{{ $item->name }}</dt><dd>@safeHtml($item->description)</dd></div>
      @endforeach
    </dl>
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
      <a class="btn btn--gold" href="{{ $priceMenuContent->cta_button_primary_url ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20please%20could%20you%20send%20me%20your%20current%20rates%3F' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $priceMenuContent->cta_button_primary_text ?? 'Message on WhatsApp' }}">{{ $priceMenuContent->cta_button_primary_text ?? 'Message on WhatsApp' }}</span></a>
      <a class="btn btn--line" href="{{ $priceMenuContent->cta_button_secondary_url ?? 'tel:+441225338436' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $priceMenuContent->cta_button_secondary_text ?? 'Call 01225 338436' }}">{{ $priceMenuContent->cta_button_secondary_text ?? 'Call 01225 338436' }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection