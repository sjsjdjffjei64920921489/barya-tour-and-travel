@extends('layouts.app')

@section('title', 'Manage tours')
@section('content')
    <section class="section-wrap dashboard-page"><div class="listing-top"><div><span class="eyebrow">BARYA OPERATIONS</span><h1>Manage journeys</h1><p>Create and update the trips your travelers can discover.</p></div><a class="button button-dark" href="{{ route('admin.tours.create') }}">Add a journey <span>＋</span></a></div>
        <div class="account-panel"><div class="table-wrap"><table><thead><tr><th>Journey</th><th>Destination</th><th>Price</th><th>Visibility</th><th>Actions</th></tr></thead><tbody>@forelse ($tours as $tour)<tr><td><a href="{{ route('tours.show', $tour) }}">{{ $tour->title }}</a><small>{{ $tour->category }} · {{ $tour->duration }}</small></td><td>{{ $tour->destination }}</td><td>{{ $tour->currency }} {{ number_format((float) $tour->price) }}</td><td><span class="status status-{{ $tour->is_published ? 'confirmed' : 'pending' }}">{{ $tour->is_published ? 'Published' : 'Draft' }}</span></td><td class="actions-cell"><a href="{{ route('admin.tours.edit', $tour) }}">Edit</a><form method="POST" action="{{ route('admin.tours.destroy', $tour) }}" onsubmit="return confirm('Delete this tour? Existing inquiries will prevent deletion.')">@csrf @method('DELETE')<button type="submit">Delete</button></form></td></tr>@empty<tr><td colspan="5">No journeys added yet.</td></tr>@endforelse</tbody></table></div><div class="pagination-wrap">{{ $tours->links() }}</div></div>
    </section>
@endsection
