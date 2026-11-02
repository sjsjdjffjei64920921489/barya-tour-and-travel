@extends('layouts.app')

@section('title', 'My trips')
@section('content')
    <section class="section-wrap dashboard-page"><div class="listing-top"><div><span class="eyebrow">YOUR TRAVEL SPACE</span><h1>Hello, {{ auth()->user()->name }}.</h1><p>Keep an eye on the journeys you’re dreaming about.</p></div><a class="button button-dark" href="{{ route('tours.index') }}">Explore tours <span>↗</span></a></div>
        <div class="account-panel"><div class="panel-heading"><div><span class="eyebrow">TRIP INQUIRIES</span><h2>Your plans, all in one place.</h2></div></div>
            @if ($inquiries->isEmpty())
                <div class="empty-state"><h3>No trip inquiries yet</h3><p>When a journey catches your eye, send us an inquiry and it will appear here.</p><a class="text-link" href="{{ route('tours.index') }}">Explore journeys <span>→</span></a></div>
            @else
                <div class="table-wrap"><table><thead><tr><th>Journey</th><th>Preferred date</th><th>Travelers</th><th>Status</th></tr></thead><tbody>@foreach ($inquiries as $inquiry)<tr><td><a href="{{ route('tours.show', $inquiry->tour) }}">{{ $inquiry->tour->title }}</a><small>{{ $inquiry->tour->destination }}</small></td><td>{{ $inquiry->travel_date->format('M j, Y') }}</td><td>{{ $inquiry->travelers }}</td><td><span class="status status-{{ $inquiry->status }}">{{ ucfirst($inquiry->status) }}</span></td></tr>@endforeach</tbody></table></div>
                <div class="pagination-wrap">{{ $inquiries->links() }}</div>
            @endif
        </div>
    </section>
@endsection
