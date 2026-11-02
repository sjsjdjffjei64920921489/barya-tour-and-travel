@extends('layouts.app')

@section('title', 'Admin dashboard')
@section('content')
    <section class="section-wrap dashboard-page"><div class="listing-top"><div><span class="eyebrow">BARYA OPERATIONS</span><h1>Admin dashboard</h1><p>Welcome back. Here’s what’s happening.</p></div><a class="button button-dark" href="{{ route('admin.tours.create') }}">Add a journey <span>＋</span></a></div>
        <div class="metric-grid"><article><span>TOURS</span><strong>{{ $tourCount }}</strong><a href="{{ route('admin.tours.index') }}">Manage tours →</a></article><article><span>PENDING INQUIRIES</span><strong>{{ $pendingCount }}</strong><a href="{{ route('admin.inquiries.index') }}">Review inquiries →</a></article><article><span>CUSTOMER ACCOUNTS</span><strong>{{ $customerCount }}</strong><span class="metric-note">Registered travelers</span></article></div>
        <div class="account-panel"><div class="panel-heading"><div><span class="eyebrow">LATEST ACTIVITY</span><h2>Recent trip inquiries</h2></div><a class="text-link" href="{{ route('admin.inquiries.index') }}">View all <span>→</span></a></div>
            @if ($recentInquiries->isEmpty())<div class="empty-state"><p>No inquiries have come in yet.</p></div>@else
                <div class="table-wrap"><table><thead><tr><th>Traveler</th><th>Journey</th><th>Date</th><th>Status</th></tr></thead><tbody>@foreach ($recentInquiries as $inquiry)<tr><td>{{ $inquiry->user->name }}<small>{{ $inquiry->user->email }}</small></td><td>{{ $inquiry->tour->title }}</td><td>{{ $inquiry->travel_date->format('M j, Y') }}</td><td><span class="status status-{{ $inquiry->status }}">{{ ucfirst($inquiry->status) }}</span></td></tr>@endforeach</tbody></table></div>
            @endif
        </div>
    </section>
@endsection
