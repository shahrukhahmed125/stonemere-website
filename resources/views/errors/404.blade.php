@extends('layouts.app')
@section('title','Page not found | Stonemere Life Management')

@section('css')

@endsection

@section('content')

<main id="main" tabindex="-1">
<section class="nf" aria-labelledby="page-title">
  <div class="wrap nf__grid">
    <div>
      <p class="nf__code" aria-hidden="true">404</p>
      <p class="eyebrow eyebrow--light">Page not found</p>
      <h1 id="page-title" class="phero__title">This stone <em>has moved</em></h1>
      <p class="phero__lead">The link may be out of date, or the address may have a typo. These will help.</p>
      <div class="actions"><a class="btn btn--gold" href="{{ route('home') }}" data-magnetic><span class="roll" data-text="Back to the home page">Back to the home page</span><svg class="i" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a><a class="btn btn--line-light" href="https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20could%20not%20find%20a%20page%20on%20your%20website." target="_blank" rel="noopener" data-magnetic><svg class="i" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg><span class="roll" data-text="Ask us">Ask us</span></a></div>
      <ul class="nf__links" role="list"><li><a href="{{ route('services') }}">Services</a></li><li><a href="{{ route('professionals') }}">For professionals</a></li><li><a href="{{ route('price-menu') }}">Price menu</a></li><li><a href="{{ route('team') }}">Our team</a></li><li><a href="{{ route('contact') }}">Contact</a></li></ul>
    </div>
    <figure class="nf__art"><img src="{{ asset('assets/images/art/page-404.svg') }}" width="800" height="1000" alt="Illustration of a compass, in gold line on navy"></figure>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection