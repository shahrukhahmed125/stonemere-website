@extends('layouts.app')
@section('title', $aboutContent?->meta_title ?: ($page?->meta_title ?: 'About Stonemere Life Management | Bath'))
@if($aboutContent?->meta_description || $page?->meta_description)
@section('meta_description', $aboutContent?->meta_description ?: $page->meta_description)
@endif
@if($aboutContent?->meta_keywords || $page?->meta_keywords)
@section('meta_keywords', $aboutContent?->meta_keywords ?: $page->meta_keywords)
@endif
@if($aboutContent?->og_title || $page?->og_title)
@section('og_title', $aboutContent?->og_title ?: $page->og_title)
@endif
@if($aboutContent?->og_description || $page?->og_description)
@section('og_description', $aboutContent?->og_description ?: $page->og_description)
@endif
@if($aboutContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($aboutContent->og_image))
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
      <nav class="crumbs" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">About</span></li></ol></nav>
      <p class="eyebrow eyebrow--light">{{ $aboutContent->hero_eyebrow ?? 'About' }}</p>
      <h1 id="page-title" class="phero__title" data-split>@safeHtml($aboutContent->hero_title ?? 'Life management, <em>defined</em>')</h1>
      <p class="phero__lead" data-reveal>{{ $aboutContent->hero_lead ?? 'Trusted, practical support and coordination for the clients of care providers, solicitors and health professionals, and for older people, vulnerable adults and families facing difficulty or change.' }}</p>
      <div class="actions" data-reveal><a class="btn btn--gold" href="{{ $aboutContent->hero_cta_url ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20know%20more%20about%20what%20you%20do.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $aboutContent->hero_cta_text ?? 'Talk to Stonemere' }}">{{ $aboutContent->hero_cta_text ?? 'Talk to Stonemere' }}</span></a></div>
    </div>
    <figure class="phero__art" data-reveal="mask">
      <img src="{{ asset('assets/images/art/page-about.svg') }}" width="800" height="1000" alt="Illustration of a stone arch with a keystone, in gold line on navy" fetchpriority="high">
    </figure>
  </div>
</section>

<section class="define" aria-labelledby="define-title">
  <div class="wrap define__grid">
    <h2 id="define-title" class="define__word" data-reveal>@safeHtml($aboutContent->define_word ?? 'Life<br>management')</h2>
    <div class="define__body">
      <p class="define__phon" data-reveal>@safeHtml($aboutContent->define_phonetic ?? '/ˈlaɪf ˈmænɪdʒmənt/ &nbsp;<em>noun</em>')</p>
      <p class="define__def" data-reveal>{{ $aboutContent->define_definition ?? 'One trusted point of contact who coordinates the practical aspects of a person&rsquo;s life, and makes sure important matters are followed through.' }}</p>
      <p data-reveal>{{ $aboutContent->define_body ?? 'Our services bridge the gap between traditional care, family support and everyday practical help. We manage appointments, correspondence, household matters and administration; liaise with healthcare and care providers; accompany clients when needed; coordinate moves, storage and property matters; and support people through hospital discharge, bereavement, the end of life and other crises.' }}</p>
    </div>
  </div>
</section>

<section class="isnot" aria-labelledby="isnot-title">
  <div class="wrap">
    <h2 id="isnot-title" class="sr">What Stonemere is and is not</h2>
    <div class="isnot__grid">
      @foreach($aboutContent->isnot_columns ?? [
          ['label' => 'Not a care agency', 'text' => 'We don&rsquo;t provide personal care, nursing or medical treatment. We work alongside the people who do.', 'is_key' => false],
          ['label' => 'Not simply a concierge', 'text' => 'We don&rsquo;t just run errands. We take responsibility for matters, solve problems and see them through.', 'is_key' => false],
          ['label' => 'The keystone', 'text' => 'The one person who holds the practical side together, so the family and every professional can rely on it.', 'is_key' => true],
      ] as $column)
      <div class="isnot__col {{ $column['is_key'] ?? false ? 'isnot__col--is' : '' }}" data-reveal><p class="isnot__label">{{ $column['label'] }}</p><p>@safeHtml($column['text'])</p></div>
      @endforeach
    </div>
  </div>
</section>

<section class="principles" aria-labelledby="principles-title">
  <div class="wrap principles__grid">
    <div class="principles__head">
      <p class="eyebrow">{{ $aboutContent->principles_eyebrow ?? 'How we work' }}</p>
      <h2 id="principles-title" data-split>@safeHtml($aboutContent->principles_title ?? 'Five principles behind <em>every case</em>')</h2>
    </div>
    <ol class="principles__list" role="list">
      @foreach($aboutContent->principles_items ?? [
          ['title' => 'One point of contact', 'text' => 'The client, the family and every professional know who is responsible.'],
          ['title' => 'Alongside, never instead', 'text' => 'We complement care providers, health teams and solicitors and respect their roles.'],
          ['title' => 'Followed through', 'text' => 'Matters are seen to completion, not passed on.'],
          ['title' => 'The client&rsquo;s wishes first', 'text' => 'We act with the client&rsquo;s knowledge and consent, and keep their independence at the centre.'],
          ['title' => 'Clear and written', 'text' => 'What we do, and what it costs, is agreed in writing before work begins.'],
      ] as $principle)
      <li data-reveal><h3>@safeHtml($principle['title'])</h3><p>{{ $principle['text'] }}</p></li>
      @endforeach
    </ol>
  </div>
</section>

<section class="where where--compact" aria-labelledby="area-title">
  <div class="wrap">
    <p class="eyebrow">{{ $aboutContent->where_eyebrow ?? 'Where we work' }}</p>
    <h2 id="area-title" data-split>@safeHtml($aboutContent->where_title ?? 'Rooted in <em>Bath</em>')</h2>
    <p class="where__text" data-reveal>{{ $aboutContent->where_text ?? 'Our primary service area is Bath and the surrounding area, initially concentrating on clients within about five miles of the city. We also serve the wider Bath &amp; North East Somerset area, and can coordinate matters further afield when an existing client or their family needs help.' }}</p>
  </div>
</section>

<section class="cta-band" aria-labelledby="cta-band-title">
  <div class="wrap cta-band__inner">
    <div>
      <p class="eyebrow">{{ $aboutContent->cta_eyebrow ?? 'Next step' }}</p>
      <h2 id="cta-band-title" data-split>@safeHtml($aboutContent->cta_title ?? 'See whether we can help')</h2>
      <p>{{ $aboutContent->cta_text ?? 'Tell us about the client or the situation. We will be honest about whether Stonemere is the right fit.' }}</p>
    </div>
    <div class="actions actions--stack">
      <a class="btn btn--gold" href="{{ $aboutContent->cta_button_primary_url ?? 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20see%20whether%20you%20can%20help.' }}" target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="{{ $aboutContent->cta_button_primary_text ?? 'Message on WhatsApp' }}">{{ $aboutContent->cta_button_primary_text ?? 'Message on WhatsApp' }}</span></a>
      <a class="btn btn--line" href="{{ $aboutContent->cta_button_secondary_url ?? 'tel:+441225338436' }}" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span class="roll" data-text="{{ $aboutContent->cta_button_secondary_text ?? 'Call 01225 338436' }}">{{ $aboutContent->cta_button_secondary_text ?? 'Call 01225 338436' }}</span></a>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection