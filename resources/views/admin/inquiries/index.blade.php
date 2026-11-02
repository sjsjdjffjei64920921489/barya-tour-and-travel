@extends('layouts.app')

@section('title', 'Manage inquiries')
@section('content')
    <section class="section-wrap dashboard-page"><div class="listing-top"><div><span class="eyebrow">BARYA OPERATIONS</span><h1>Trip inquiries</h1><p>Respond to travelers and keep each request up to date.</p></div><a class="text-link" href="{{ route('admin.dashboard') }}">← Dashboard</a></div>
        <div class="account-panel"><div class="table-wrap"><table><thead><tr><th>Traveler</th><th>Journey</th><th>Travel date</th><th>Travelers</th><th>Message</th><th>Status</th></tr></thead><tbody>@forelse ($inquiries as $inquiry)<tr><td>{{ $inquiry->user->name }}<small>{{ $inquiry->user->email }}</small></td><td>{{ $inquiry->tour->title }}</td><td>{{ $inquiry->travel_date->format('M j, Y') }}</td><td>{{ $inquiry->travelers }}</td><td class="message-cell">{{ $inquiry->message ?: '—' }}</td><td><form class="status-form" method="POST" action="{{ route('admin.inquiries.update', $inquiry) }}">@csrf @method('PATCH')<select name="status" aria-label="Inquiry status">@foreach (['pending', 'confirmed', 'declined', 'completed'] as $status)<option value="{{ $status }}" @selected($inquiry->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select><button type="submit">Save</button></form></td></tr>@empty<tr><td colspan="6">No trip inquiries yet.</td></tr>@endforelse</tbody></table></div><div class="pagination-wrap">{{ $inquiries->links() }}</div></div>
    </section>
@endsection
