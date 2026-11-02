@extends('layouts.app')

@section('title', 'Explore journeys')
@section('content')
    <section class="page-hero page-hero-tours"><div class="page-hero-inner"><span class="eyebrow eyebrow-light">THE PEARL OF AFRICA, UP CLOSE</span><h1>Uganda, one<br><em>unforgettable journey.</em></h1><p>Meet the rainforest, the savannah, and the Nile. Find the Uganda journey that feels like yours.</p><a class="photo-credit page-photo-credit" href="https://commons.wikimedia.org/wiki/File:Murchison_Falls,_Uganda_(23475021234).jpg" target="_blank" rel="noopener noreferrer">Photo: Rod Waddington · CC BY-SA 2.0</a></div></section>
    <section class="section-wrap listing-section">
        <div class="listing-top"><div><span class="eyebrow">OUR JOURNEYS</span><h2>Explore the collection</h2></div><span class="results-count">{{ $tours->total() }} {{ Str::plural('journey', $tours->total()) }}</span></div>
        <form class="filter-bar" method="GET" action="{{ route('tours.index') }}">
            <label class="search-field"><span>⌕</span><input type="search" name="search" placeholder="Try Bwindi, Murchison Falls..." value="{{ request('search') }}" aria-label="Search destinations and tours"></label>
            <select name="category" aria-label="Filter by trip style"><option value="">Every kind of journey</option>@foreach ($categories as $category)<option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>@endforeach</select>
            <button class="button button-dark button-small" type="submit">Find a trip <span>→</span></button>
        </form>
        @if ($tours->isNotEmpty())
            <div class="tour-grid">@foreach ($tours as $tour)@include('partials.tour-card', ['tour' => $tour])@endforeach</div>
            <div class="pagination-wrap">{{ $tours->links() }}</div>
        @else
            <div class="empty-state"><h3>No journeys found just yet</h3><p>Try another search, or <a href="{{ route('contact') }}">tell us what you’re looking for</a>.</p></div>
        @endif
    </section>
@endsection
