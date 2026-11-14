<!DOCTYPE html>
<html lang="en-GB" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', $settings_meta_title)</title>
<meta name="description" content="@yield('meta_description', $settings_meta_description)">
@hasSection('meta_keywords')
<meta name="keywords" content="@yield('meta_keywords')">
@endif
<meta name="robots" content="index, follow">
<link rel="canonical" href="@yield('canonical_url', url()->current())">
<meta name="theme-color" content="#1F2943">
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:site_name" content="{{ $settings_company_name }}">
<meta property="og:locale" content="en_GB">
<meta property="og:title" content="@yield('og_title', $settings_meta_title)">
<meta property="og:description" content="@yield('og_description', $settings_meta_description)">
<meta property="og:url" content="@yield('og_url', url()->current())">
@if($settings_og_image)
<meta property="og:image" content="{{ $settings_og_image }}">
@else
<meta property="og:image" content="https://www.stonemeremanagement.com/images/og-image.jpg">
@endif
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $settings_company_name }}, Bath">
<meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
<meta name="twitter:title" content="@yield('twitter_title', $settings_meta_title)">
<meta name="twitter:description" content="@yield('twitter_description', $settings_meta_description)">
@if($settings_twitter_image)
<meta name="twitter:image" content="{{ $settings_twitter_image }}">
@else
<meta name="twitter:image" content="https://www.stonemeremanagement.com/images/og-image.jpg">
@endif
<link rel="icon" href="favicon.ico" sizes="48x48">
<link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/svg+xml">
<link rel="icon" href="{{ asset('assets/images/favicon-32.png') }}" type="image/png" sizes="32x32">
<link rel="icon" href="{{ asset('assets/images/favicon-16.png') }}" type="image/png" sizes="16x16">
<link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">
<link rel="manifest" href="site.webmanifest">
<link rel="preload" href="fonts/marcellus-400.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/poppins-300.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@yield('css')
@verbatim
<script>
(function (d) {
  var h = d.documentElement; h.className = h.className.replace('no-js', 'js');
  var calm = false; try { calm = localStorage.getItem('sm-motion') === 'calm'; } catch (e) {}
  if (calm || window.matchMedia('(prefers-reduced-motion: reduce)').matches) h.classList.add('calm');
  try { if (!sessionStorage.getItem('sm-seen')) h.classList.add('first-visit'); } catch (e) {}
  setTimeout(function () { if (!h.classList.contains('ready')) h.classList.add('fallback'); }, 3000);
})(document);
</script>
@endverbatim
@php
$ldEntities = [];
try {
    $ldAreas = \App\Models\ServiceArea::published()->ordered()->get();
    $ldFaqs = \App\Models\FaqItem::published()->ordered()->get();
    $ldAudiences = \App\Models\ProfessionalAudience::published()->ordered()->get();
} catch (\Exception $e) {
    $ldAreas = collect(); $ldFaqs = collect(); $ldAudiences = collect();
}
$ldEntities[] = [
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    '@id' => url('/').'#business',
    'name' => $settings_company_name,
    'alternateName' => 'Stonemere',
    'url' => url('/'),
    'image' => $settings_og_image ?: asset('assets/images/og-image.jpg'),
    'description' => $settings_meta_description,
    'telephone' => '+44'.preg_replace('/\D/', '', preg_replace('/^0/', '', $settings_phone)),
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Bath'],
        ['@type' => 'AdministrativeArea', 'name' => 'Bath and North East Somerset'],
    ],
    'audience' => $ldAudiences->isNotEmpty()
        ? $ldAudiences->map(fn ($a) => ['@type' => 'Audience', 'audienceType' => strip_tags($a->title)])->push(['@type' => 'Audience', 'audienceType' => 'Families of older and vulnerable adults'])->values()->all()
        : [['@type' => 'Audience', 'audienceType' => 'Domiciliary care companies'], ['@type' => 'Audience', 'audienceType' => 'Solicitors'], ['@type' => 'Audience', 'audienceType' => 'Healthcare professionals'], ['@type' => 'Audience', 'audienceType' => 'Property professionals'], ['@type' => 'Audience', 'audienceType' => 'Families of older and vulnerable adults']],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Service areas',
        'itemListElement' => $ldAreas->isNotEmpty()
            ? $ldAreas->map(fn ($a) => ['@type' => 'OfferCatalog', 'name' => strip_tags($a->name), 'url' => route($a->slug)])->values()->all()
            : [],
    ],
];
if ($ldFaqs->isNotEmpty()) {
    $ldEntities[] = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $ldFaqs->map(fn ($f) => [
            '@type' => 'Question',
            'name' => $f->question,
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($f->answer)],
        ])->values()->all(),
    ];
}
@endphp
<script type="application/ld+json">{!! json_encode($ldEntities, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_PRETTY_PRINT) !!}</script>
</head>
<body class="page-home">
<a class="skip" href="#main">Skip to content</a>
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
<symbol id="i-whatsapp" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.3-.4.7-1.4a.5.5 0 0 0 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.1 5.1 0 0 0 1.1 2.7 11.6 11.6 0 0 0 4.4 3.9c1.6.7 2.3.7 3.1.6a2.6 2.6 0 0 0 1.7-1.2 2.1 2.1 0 0 0 .2-1.2c-.1-.1-.3-.2-.5-.3z"/></symbol>
<symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" d="M5 3.5h3.2l1.6 4.3-2.1 1.4a11 11 0 0 0 7.1 7.1l1.4-2.1 4.3 1.6V19a1.8 1.8 0 0 1-1.9 1.8A16.6 16.6 0 0 1 3.2 5.4 1.8 1.8 0 0 1 5 3.5z"/></symbol>
<symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" d="M4 12h15M13.5 6.5 19 12l-5.5 5.5"/></symbol>
<symbol id="i-arrow-down" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" d="M12 4v15M6.5 13.5 12 19l5.5-5.5"/></symbol>
<symbol id="i-mail" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M3.5 5.5h17v13h-17zM3.5 6l8.5 7 8.5-7"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
<symbol id="i-x" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" d="m6 6 12 12M18 6 6 18"/></symbol>
<symbol id="i-plus" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" d="M12 5v14M5 12h14"/></symbol>
<symbol id="i-pin" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M12 21s-6.5-6-6.5-11a6.5 6.5 0 0 1 13 0c0 5-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.3" fill="none" stroke="currentColor" stroke-width="1.5"/></symbol>
<symbol id="i-shield" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M12 3 5 6v5.5c0 4.3 3 7.7 7 9.5 4-1.8 7-5.2 7-9.5V6z"/><path fill="none" stroke="currentColor" stroke-width="1.5" d="m9 12 2.2 2.2L15.5 10"/></symbol>
<symbol id="i-lock" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M6 10.5h12v10H6zM8.5 10.5V8a3.5 3.5 0 0 1 7 0v2.5"/></symbol>
<symbol id="i-scale" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M12 4v16M7 20h10M5 7h14M5 7l-3 6.5a3.3 3.3 0 0 0 6 0zM19 7l-3 6.5a3.3 3.3 0 0 0 6 0z"/></symbol>
<symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.6" fill="none" stroke="currentColor" stroke-width="1.5"/><path fill="none" stroke="currentColor" stroke-width="1.5" d="M4.5 20.5a7.5 7.5 0 0 1 15 0"/></symbol>
<symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path fill="none" stroke="currentColor" stroke-width="1.5" d="M12 7.5V12l3 2"/></symbol>
<symbol id="i-keystone" viewBox="0 0 64 64"><path d="M12 60V34a20 20 0 0 1 40 0v26" fill="none" stroke="currentColor" stroke-width="3.2"/><path d="M26.2 4h11.6l-2.4 13.2h-6.8z" fill="currentColor"/></symbol>
<symbol id="i-heart" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21s-7.5-4.6-9.6-9.2C.9 8.4 2.9 4.5 6.6 4.5c2.2 0 3.6 1.2 5.4 3.2 1.8-2 3.2-3.2 5.4-3.2 3.7 0 5.7 3.9 4.2 7.3C19.5 16.4 12 21 12 21z"/></symbol>
</svg>
<div class="preloader" aria-hidden="true">
  <svg class="preloader__mark" viewBox="0 0 64 64"><path class="pl-arch" d="M12 60V34a20 20 0 0 1 40 0v26"/><path class="pl-inner" d="M19 60V34a13 13 0 0 1 26 0v26"/><path class="pl-key" d="M26.2 4h11.6l-2.4 13.2h-6.8z"/></svg>
  <p class="preloader__word">Stonemere</p>
</div>
<div class="curtain" aria-hidden="true"><span></span></div>
<div class="cursor" aria-hidden="true"><span class="cursor__label"></span></div>
<header class="site-header">
  <div class="site-header__inner">
    <nav class="nav nav--left" aria-label="Primary">
      <ul role="list"><li><a class="nav__link" href="{{ route('services') }}" @if(request()->routeIs('services')) aria-current="page" @endif><span class="roll" data-text="Services">Services</span></a></li><li><a class="nav__link" href="{{ route('professionals') }}" @if(request()->routeIs('professionals')) aria-current="page" @endif><span class="roll" data-text="Professionals">Professionals</span></a></li><li><a class="nav__link" href="{{ route('price-menu') }}" @if(request()->routeIs('price-menu')) aria-current="page" @endif><span class="roll" data-text="Price Menu">Price Menu</span></a></li></ul>
    </nav>
    <a class="brand" href="{{ route('home') }}" aria-label="{{ $settings_company_name }}, home">
      <img class="brand__logo brand__logo--light" src="{{ asset('assets/images/brand/stonemere-logo-reverse.svg') }}" width="230" height="46" alt="">
      <img class="brand__logo brand__logo--dark" src="{{ asset('assets/images/brand/stonemere-logo.svg') }}" width="230" height="46" alt="">
    </a>
    <nav class="nav nav--right" aria-label="Secondary">
      <ul role="list"><li><a class="nav__link" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif><span class="roll" data-text="About">About</span></a></li><li><a class="nav__link" href="{{ route('team') }}" @if(request()->routeIs('team')) aria-current="page" @endif><span class="roll" data-text="Our Team">Our Team</span></a></li><li><a class="nav__link" href="{{ route('contact') }}" @if(request()->routeIs('contact')) aria-current="page" @endif><span class="roll" data-text="Contact">Contact</span></a></li></ul>
    </nav>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="menu"><span class="menu-toggle__lines" aria-hidden="true"><span></span><span></span></span><span class="menu-toggle__text">Menu</span></button>
  </div>
</header>
<div class="menu" id="menu" hidden>
  <div class="menu__inner">
    <nav class="menu__nav" aria-label="Menu">
      <p class="menu__eyebrow">Pages</p>
      <ol class="menu__list" role="list">
        <li><a class="menu__link" href="{{ route('home') }}" data-preview="{{ asset('assets/images/art/page-about.svg') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a></li>
        <li><a class="menu__link" href="{{ route('services') }}" data-preview="{{ asset('assets/images/art/page-services.svg') }}" @if(request()->routeIs('services')) aria-current="page" @endif>Services</a></li>
        <li><a class="menu__link" href="{{ route('professionals') }}" data-preview="{{ asset('assets/images/art/page-professionals.svg') }}" @if(request()->routeIs('professionals')) aria-current="page" @endif>Professionals</a></li>
        <li><a class="menu__link" href="{{ route('price-menu') }}" data-preview="{{ asset('assets/images/art/page-price.svg') }}" @if(request()->routeIs('price-menu')) aria-current="page" @endif>Price Menu</a></li>
        <li><a class="menu__link" href="{{ route('about') }}" data-preview="{{ asset('assets/images/art/page-about.svg') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a></li>
        <li><a class="menu__link" href="{{ route('team') }}" data-preview="{{ asset('assets/images/art/page-team.svg') }}" @if(request()->routeIs('team')) aria-current="page" @endif>Our Team</a></li>
        <li><a class="menu__link" href="{{ route('contact') }}" data-preview="{{ asset('assets/images/art/page-contact.svg') }}" @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a></li>
      </ol>
      <p class="menu__eyebrow">Service areas</p>
      <ul class="menu__areas" role="list">
        <li><a href="{{ route('family-client-support') }}" data-preview="{{ asset('assets/images/art/area-family.svg') }}" @if(request()->routeIs('family-client-support')) aria-current="page" @endif>Family &amp; Client Support</a></li>
        <li><a href="{{ route('care-professional-liaison') }}" data-preview="{{ asset('assets/images/art/area-care.svg') }}" @if(request()->routeIs('care-professional-liaison')) aria-current="page" @endif>Care &amp; Professional Liaison</a></li>
        <li><a href="{{ route('property-asset-management') }}" data-preview="{{ asset('assets/images/art/area-property.svg') }}" @if(request()->routeIs('property-asset-management')) aria-current="page" @endif>Property &amp; Asset Management</a></li>
        <li><a href="{{ route('urgent-complex-cases') }}" data-preview="{{ asset('assets/images/art/area-urgent.svg') }}" @if(request()->routeIs('urgent-complex-cases')) aria-current="page" @endif>Urgent &amp; Complex Case Support</a></li>
      </ul>
    </nav>
    <div class="menu__side">
      <div class="menu__preview" aria-hidden="true"><img src="{{ asset('assets/images/art/page-about.svg') }}" alt="" width="800" height="1000"></div>
      <div class="menu__contact">
        <a class="btn btn--gold" href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span>Message on WhatsApp</span></a>
        <a class="menu__phone" href="tel:{{ $settings_phone_tel }}"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg>{{ $settings_phone }}</a>
      </div>
    </div>
  </div>
</div>

@yield('content')

<footer class="site-footer">
  <div class="site-footer__cta">
    <div class="wrap">
      <p class="eyebrow eyebrow--light">One point of contact</p>
      <a class="footer-word" href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20a%20client." target="_blank" rel="noopener" data-cursor="Message">
        <img src="{{ asset('assets/images/brand/stonemere-wordmark-gold.svg') }}" width="1600" height="230" alt="{{ $settings_company_name }}: message us on WhatsApp">
      </a>
    </div>
  </div>
  <div class="wrap site-footer__grid">
    <div class="site-footer__brand">
      <img src="{{ asset('assets/images/brand/stonemere-logo-stacked-reverse.svg') }}" width="220" height="210" alt="{{ $settings_company_name }}" loading="lazy">
      <p>{{ $settings_tagline ?: 'Practical coordination for the clients of care providers, solicitors, healthcare and property professionals, and for their families. Bath and Bath & North East Somerset.' }}</p>
    </div>
    <nav class="site-footer__col" aria-label="Service areas">
      <h2 class="site-footer__title">Service areas</h2>
      <ul role="list"><li><a href="{{ route('family-client-support') }}">Family &amp; Client Support</a></li><li><a href="{{ route('care-professional-liaison') }}">Care &amp; Professional Liaison</a></li><li><a href="{{ route('property-asset-management') }}">Property &amp; Asset Management</a></li><li><a href="{{ route('urgent-complex-cases') }}">Urgent &amp; Complex Case Support</a></li></ul>
    </nav>
    <nav class="site-footer__col" aria-label="Company">
      <h2 class="site-footer__title">Stonemere</h2>
      <ul role="list"><li><a href="{{ route('services') }}">Services</a></li><li><a href="{{ route('professionals') }}">Professionals</a></li><li><a href="{{ route('price-menu') }}">Price Menu</a></li><li><a href="{{ route('about') }}">About</a></li><li><a href="{{ route('team') }}">Our Team</a></li><li><a href="{{ route('contact') }}">Contact</a></li></ul>
    </nav>
    <div class="site-footer__col">
      <h2 class="site-footer__title">Talk to us</h2>
      <ul role="list" class="site-footer__contact">
        <li><a href="tel:{{ $settings_phone_tel }}"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg>{{ $settings_phone }}</a></li>
        <li><a href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg>WhatsApp {{ $settings_whatsapp }}</a></li>
        @if($settings_email)
        <li><a href="mailto:{{ $settings_email }}"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg>{{ $settings_email }}</a></li>
        @endif
        <li><svg class="i" aria-hidden="true" focusable="false"><use href="#i-pin"/></svg>{{ $settings_address }}</li>
      </ul>
    </div>
  </div>
  <div class="wrap site-footer__base">
    <p>&copy; <span data-year>2026</span> {{ $settings_company_name }}. We coordinate practical matters; we do not provide medical treatment, nursing, regulated personal care, or legal or financial advice. If someone is in immediate danger, call 999.</p>
    <ul role="list" class="site-footer__legal">
      <li><a href="{{ route('privacy') }}">Privacy</a></li>
      <li><a href="{{ route('terms') }}">Terms</a></li>
      <li><button class="motion-toggle" type="button" aria-pressed="false">Reduce motion</button></li>
    </ul>
    <p class="credit">Designed &amp; Developed with <svg class="credit__heart" aria-hidden="true" focusable="false"><use href="#i-heart"/></svg><span class="sr">love</span> by <a href="https://xpertwebstudio.co.uk/" target="_blank" rel="noopener">Xpert Web Studios</a></p>
  </div>
</footer>
<aside class="float-wa" aria-label="WhatsApp">
  <a href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener" aria-label="Message {{ $settings_company_name }} on WhatsApp (opens in a new tab)"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></a>
</aside>
<nav class="action-bar" aria-label="Quick contact">
  <a href="tel:{{ $settings_phone_tel }}"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg>Call</a>
  <a href="https://wa.me/{{ $settings_whatsapp_tel }}?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support." target="_blank" rel="noopener"><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg>WhatsApp</a>
</nav>
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}" defer></script>
@yield('js')
</body>
</html>