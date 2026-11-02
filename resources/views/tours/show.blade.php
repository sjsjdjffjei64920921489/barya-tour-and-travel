@extends('layouts.app')

@section('title', $tour->title)
@section('content')
    <section class="detail-hero" style="--detail-image: url('{{ $tour->image_url }}')"><div class="detail-hero-shade"></div><div class="detail-hero-content"><a class="back-link" href="{{ route('tours.index') }}">← All journeys</a><span class="eyebrow eyebrow-light">{{ strtoupper($tour->category) }} · {{ strtoupper($tour->destination) }}</span><h1>{{ $tour->title }}</h1><p>{{ $tour->summary }}</p>@if ($tour->image_credit && $tour->image_credit_url)<a class="photo-credit detail-photo-credit" href="{{ $tour->image_credit_url }}" target="_blank" rel="noopener noreferrer">Photo: {{ $tour->image_credit }}</a>@endif</div></section>
    <section class="detail-layout section-wrap">
        <article class="detail-copy"><div class="detail-facts"><div><span>DESTINATION</span><strong>{{ $tour->destination }}</strong></div><div><span>DURATION</span><strong>{{ $tour->duration }}</strong></div><div><span>TRIP STYLE</span><strong>{{ $tour->category }}</strong></div></div><h2>A little more about<br><em>the journey.</em></h2><p>{{ $tour->description }}</p>@if ($tour->itinerary)<h3>Your journey, day by day</h3><div class="itinerary">{!! nl2br(e($tour->itinerary)) !!}</div>@endif</article>
        <aside class="booking-card"><span class="eyebrow">YOUR NEXT CHAPTER</span><div class="booking-price"><small>From</small><strong>{{ $tour->currency }} {{ number_format((float) $tour->price) }}</strong><span>per person</span></div><p>Let us know when you’d like to travel. Our team will follow up to help with the details.</p>
            @auth
                <form method="POST" action="{{ route('inquiries.store', $tour) }}" class="form-stack">@csrf
                    <label>Preferred travel date<input type="date" name="travel_date" min="{{ now()->toDateString() }}" value="{{ old('travel_date') }}" required></label>
                    <label>Number of travelers<input type="number" name="travelers" min="1" max="30" value="{{ old('travelers', 2) }}" required></label>
                    <label>Anything else we should know?<textarea name="message" rows="3" maxlength="2000" placeholder="Tell us what you have in mind...">{{ old('message') }}</textarea></label>
                    <button class="button button-dark button-full" type="submit">Send a trip inquiry <span>↗</span></button>
                </form>
            @else
                <a class="button button-dark button-full" href="{{ route('login', ['redirect' => request()->fullUrl()]) }}">Sign in to inquire <span>↗</span></a><p class="booking-footnote">New to Barya? <a href="{{ route('register') }}">Create an account</a> to keep your trip plans together.</p>
            @endauth
        </aside>
    </section>
@endsection
