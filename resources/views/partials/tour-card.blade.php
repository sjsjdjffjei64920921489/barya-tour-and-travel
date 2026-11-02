<article class="tour-card">
    <a class="tour-image" href="{{ route('tours.show', $tour) }}">
        <img src="{{ $tour->image_url }}" alt="{{ $tour->title }}" loading="lazy">
        <span class="tour-tag">{{ $tour->category }}</span>
        <span class="image-arrow" aria-hidden="true">↗</span>
    </a>
    @if ($tour->image_credit && $tour->image_credit_url)
        <div class="photo-credit">Photo: <a href="{{ $tour->image_credit_url }}" target="_blank" rel="noopener noreferrer">{{ $tour->image_credit }}</a></div>
    @endif
    <div class="tour-card-body">
        <div class="tour-location"><span>⌖</span> {{ $tour->destination }} <span class="dot">·</span> {{ $tour->duration }}</div>
        <h3><a href="{{ route('tours.show', $tour) }}">{{ $tour->title }}</a></h3>
        <p>{{ $tour->summary }}</p>
        <div class="tour-card-bottom"><span class="price-caption">From <strong>{{ $tour->currency }} {{ number_format((float) $tour->price) }}</strong></span><a href="{{ route('tours.show', $tour) }}" class="text-link">View trip <span>→</span></a></div>
    </div>
</article>
