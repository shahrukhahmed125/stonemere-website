@extends('layouts.app')
@section('title', $page?->meta_title ?: 'Privacy Notice | Stonemere Life Management')
@if($page?->meta_description)
@section('meta_description', $page->meta_description)
@endif
@if($page?->canonical_url)
@section('canonical_url', $page->canonical_url)
@endif

@section('css')

@endsection

@section('content')

@php
$legalSections = $content['sections'] ?? [];
@endphp

<main id="main" tabindex="-1">
<section class="legal" aria-labelledby="page-title">
  <div class="wrap legal__grid">
    <header class="legal__head">
      <nav class="crumbs crumbs--dark" aria-label="Breadcrumb"><ol role="list"><li><a href="{{ route('home') }}">Home</a></li><li><span aria-current="page">{{ $content['title'] ?? 'Privacy notice' }}</span></li></ol></nav>
      <h1 id="page-title">{{ $content['title'] ?? 'Privacy notice' }}</h1>
      <p class="legal__date">{{ $content['date'] ?? 'Last updated: November 2026' }}</p>
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
