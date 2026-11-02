@extends('layouts.app')

@section('title', $tour->exists ? 'Edit journey' : 'Add a journey')
@section('content')
    <section class="section-wrap dashboard-page"><div class="listing-top"><div><span class="eyebrow">BARYA OPERATIONS</span><h1>{{ $tour->exists ? 'Edit journey' : 'Add a journey' }}</h1><p>Make the details clear and help travelers picture the experience.</p></div><a class="text-link" href="{{ route('admin.tours.index') }}">← Back to tours</a></div>
        <form class="admin-form form-stack" method="POST" action="{{ $tour->exists ? route('admin.tours.update', $tour) : route('admin.tours.store') }}">@csrf @if ($tour->exists) @method('PUT') @endif
            <div class="field-row"><label>Tour title<input name="title" value="{{ old('title', $tour->title) }}" required maxlength="160"></label><label>Destination<input name="destination" value="{{ old('destination', $tour->destination) }}" required maxlength="120"></label></div>
            <div class="field-row"><label>Trip style<input name="category" value="{{ old('category', $tour->category) }}" required maxlength="80" placeholder="Safari, Beach, Adventure..."></label><label>Duration<input name="duration" value="{{ old('duration', $tour->duration) }}" required maxlength="80" placeholder="5 days"></label></div>
            <div class="field-row"><label>Price per person<input type="number" name="price" min="0" step="0.01" value="{{ old('price', $tour->price) }}" required></label><label>Currency code<input name="currency" value="{{ old('currency', $tour->currency ?: 'USD') }}" required maxlength="3" minlength="3"></label></div>
            <label>Image URL<input type="url" name="image_url" value="{{ old('image_url', $tour->image_url) }}" required maxlength="2048" placeholder="https://..."></label>
            <div class="field-row"><label>Photo credit (optional)<input name="image_credit" value="{{ old('image_credit', $tour->image_credit) }}" maxlength="255" placeholder="Photographer · license"></label><label>Photo credit link<input type="url" name="image_credit_url" value="{{ old('image_credit_url', $tour->image_credit_url) }}" maxlength="2048" placeholder="https://..."></label></div>
            <label>Short summary<input name="summary" value="{{ old('summary', $tour->summary) }}" required maxlength="240"></label>
            <label>Description<textarea name="description" rows="5" required maxlength="5000">{{ old('description', $tour->description) }}</textarea></label>
            <label>Itinerary<textarea name="itinerary" rows="5" maxlength="5000" placeholder="One line for each day...">{{ old('itinerary', $tour->itinerary) }}</textarea></label>
            <label class="check-label"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $tour->exists ? $tour->is_published : true))> Make this journey visible on the website</label>
            <div class="form-actions"><button class="button button-dark" type="submit">{{ $tour->exists ? 'Save changes' : 'Create journey' }} <span>→</span></button><a class="text-link" href="{{ route('admin.tours.index') }}">Cancel</a></div>
        </form>
    </section>
@endsection
