@extends('layouts.app')
@section('title', $termsContent?->meta_title ?: ($page?->meta_title ?: 'Website Terms | Stonemere Life Management'))
@if($termsContent?->meta_description || $page?->meta_description)
@section('meta_description', $termsContent?->meta_description ?: $page->meta_description)
@endif
@if($termsContent?->meta_keywords || $page?->meta_keywords)
@section('meta_keywords', $termsContent?->meta_keywords ?: $page->meta_keywords)
@endif
@if($termsContent?->og_title || $page?->og_title)
@section('og_title', $termsContent?->og_title ?: $page->og_title)
@endif
@if($termsContent?->og_description || $page?->og_description)
@section('og_description', $termsContent?->og_description ?: $page->og_description)
@endif
@if($termsContent?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($termsContent->og_image))
@elseif($page?->og_image)
@section('og_image', \App\Helpers\ImageUrlHelper::resolve($page->og_image))
@endif

@section('css')

@endsection

@section('content')

@php
$legalSections = $termsContent->sections ?? [];
@endphp

<main id="main" tabindex="-1">
<section class="legal" aria-labelledby="page-title">
  <div class="wrap legal__grid">
    <header class="legal__head">
      <nav class="crumbs crumbs--dark" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">{{ $termsContent->doc_title ?? 'Website terms' }}</span></li></ol></nav>
      <h1 id="page-title">{{ $termsContent->doc_title ?? 'Website terms' }}</h1>
      <p class="legal__date">{{ $termsContent->doc_date ?? 'Last updated: November 2026' }}</p>
      <p class="legal__review" role="note"><strong>Template for client review.</strong> This page is a starting template prepared by the web designer. Stonemere should check it against its own practices, and take advice where needed, before publishing. It is not legal advice.</p>
    </header>
    <nav class="legal__toc" aria-label="On this page"><ol role="list">@foreach($legalSections as $section)<li><a href="#{{ $section['id'] }}">{{ $section['toc'] ?? $section['heading'] }}</a></li>@endforeach</ol></nav>
    <div class="legal__body">
      @foreach($legalSections as $section)
      <h2 id="{{ $section['id'] }}">{{ $section['heading'] }}</h2>@safeHtml($section['html'] ?? '')
      @endforeach
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection
