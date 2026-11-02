@extends('layouts.app')

@section('title', 'Uganda travel experiences')
@section('meta_description', 'Explore Uganda with Barya Tours & Travel: Murchison Falls, Bwindi gorilla trekking, Queen Elizabeth National Park, and more.')

@section('content')
    <section class="hero">
        <div class="hero-shade"></div>
        <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="eyebrow-line"></span> THE PEARL OF AFRICA, YOUR WAY</span>
            <h1>Uganda is<br><em>calling.</em></h1>
            <p>Track mountain gorillas, feel the Nile thunder at Murchison Falls, and find your own wild in the heart of Africa.</p>
            <div class="hero-actions"><a class="button" href="{{ route('tours.index') }}">Explore our journeys <span>↗</span></a><a class="button button-ghost" href="{{ route('about') }}">Get to know us</a></div>
            <div class="hero-note"><span class="hero-note-icon">✦</span><span>Thoughtful journeys, rooted in Uganda</span></div>
        </div>
        <div class="hero-side-note">UGANDA · THE PEARL OF AFRICA</div>
        <a class="photo-credit hero-credit" href="https://commons.wikimedia.org/wiki/File:Top_of_Murchison_falls.jpg" target="_blank" rel="noopener noreferrer">Photo: Jingo Faizal · CC BY-SA 4.0</a>
        <a class="hero-scroll" href="#journeys">SCROLL TO EXPLORE <span>↓</span></a>
    </section>

    <section class="intro section-wrap">
        <div class="intro-label"><span class="eyebrow">THE BARYA DIFFERENCE</span><span class="intro-index">01 / 04</span></div>
        <div class="intro-copy"><h2>More than a destination.<br><em>A feeling that stays.</em></h2><p>Every journey starts with a little curiosity. We help you turn it into a thoughtful adventure, shaped around the places, people, and moments you came to find.</p><a class="text-link" href="{{ route('about') }}">A little about us <span>→</span></a></div>
        <div class="intro-stats"><div><strong>01</strong><span>One place to begin</span></div><div><strong>∞</strong><span>Ways to experience it</span></div></div>
    </section>

    <section class="journeys section-wrap" id="journeys">
        <div class="section-heading">
            <div><span class="eyebrow">GO WHERE YOU FEEL</span><h2>Journeys worth<br><em>waking up for.</em></h2></div>
            <div class="heading-aside"><p>From rainforest gorilla encounters to the power of the Nile, discover the places that make Uganda unforgettable.</p><a class="text-link" href="{{ route('tours.index') }}">See every journey <span>→</span></a></div>
        </div>
        @if ($featuredTours->isNotEmpty())
            <div class="tour-grid">@foreach ($featuredTours as $tour)@include('partials.tour-card', ['tour' => $tour])@endforeach</div>
        @else
            <div class="empty-state"><p>Our journeys are being prepared. Check back soon or <a href="{{ route('contact') }}">talk to our team</a>.</p></div>
        @endif
    </section>

    <section class="experience">
        <div class="experience-image"><a class="photo-credit experience-credit" href="https://commons.wikimedia.org/wiki/File:035_Uganda_kobs_mating_at_Queen_Elizabeth_National_Park_Photo_by_Giles_Laurent.jpg" target="_blank" rel="noopener noreferrer">Photo: Giles Laurent · CC BY-SA 4.0</a></div>
        <div class="experience-copy"><span class="eyebrow eyebrow-light">THE WAY WE TRAVEL</span><h2>Come for the<br>landscape.<br><em>Stay for the connection.</em></h2><p>Travel is at its best when it feels personal. We make room for the unhurried moments, local stories, and unexpected turns that make a trip yours.</p><a class="button button-light" href="{{ route('about') }}">Discover our approach <span>↗</span></a></div>
    </section>

    <section class="promise section-wrap">
        <div class="promise-heading"><span class="eyebrow">A JOURNEY THAT FEELS RIGHT</span><h2>Thoughtful from<br><em>the first hello.</em></h2></div>
        <div class="promise-list">
            <article><span class="promise-number">01</span><div><h3>Made around you</h3><p>Tell us what inspires you and we’ll help you find a trip that fits your pace and interests.</p></div></article>
            <article><span class="promise-number">02</span><div><h3>Grounded in place</h3><p>Get closer to Uganda through meaningful experiences and local perspectives.</p></div></article>
            <article><span class="promise-number">03</span><div><h3>Here when you need us</h3><p>From your first question to your travel plans, our team is ready to help.</p></div></article>
        </div>
    </section>

    <section class="closing-cta"><div><span class="eyebrow eyebrow-light">THE NEXT GREAT STORY COULD BE YOURS</span><h2>Where will your<br><em>curiosity take you?</em></h2></div><a class="button button-light" href="{{ route('tours.index') }}">Start exploring <span>↗</span></a></section>
@endsection
