<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Discover Uganda with Barya Tours & Travel. Find your next safari, mountain adventure, or forest journey.')">
    <title>@yield('title', 'Barya Tours & Travel') | Barya Tours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('styles')
</head>
<body>
    <div class="announcement">Small-group journeys, lasting memories <span>✦</span> Discover Uganda with us</div>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="Barya Tours home">
            <span class="brand-mark">B</span>
            <span class="brand-name">BARYA <small>TOURS & TRAVEL</small></span>
        </a>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" onclick="document.querySelector('.main-nav').classList.toggle('is-open')">☰</button>
        <nav class="main-nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('tours.index') }}">Explore tours</a>
            <a href="{{ route('about') }}">Our story</a>
            <a href="{{ route('contact') }}">Contact</a>
            @auth
                <a href="{{ route('account') }}">My trips</a>
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
                <form class="nav-form" method="POST" action="{{ route('logout') }}">@csrf<button class="nav-login" type="submit">Sign out</button></form>
            @else
                <a class="nav-login" href="{{ route('login') }}">Sign in</a>
                <a class="button button-small" href="{{ route('register') }}">Join us</a>
            @endauth
        </nav>
    </header>

    @if (session('success'))
        <div class="flash flash-success" role="status">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="flash flash-error" role="alert">
            <strong>Please check the information below.</strong>
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <main>@yield('content')</main>

    <footer class="site-footer">
        <div class="footer-main">
            <div class="footer-about">
                <a class="brand brand-light" href="{{ route('home') }}"><span class="brand-mark">B</span><span class="brand-name">BARYA <small>TOURS & TRAVEL</small></span></a>
                <p>Journeys shaped by local knowledge, warm hospitality, and the wild beauty of Uganda.</p>
            </div>
            <div><h3>Discover</h3><a href="{{ route('tours.index') }}">All tours</a><a href="{{ route('about') }}">Our story</a><a href="{{ route('contact') }}">Get in touch</a></div>
            <div><h3>Plan your trip</h3><p>Have a question or a trip in mind?</p><a href="{{ route('contact') }}">Send us an inquiry <span>↗</span></a></div>
        </div>
        <div class="footer-bottom"><span>© {{ date('Y') }} Barya Tours & Travel</span><span>Made for curious travelers · Uganda</span></div>
    </footer>
</body>
</html>
