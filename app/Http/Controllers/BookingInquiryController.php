<?php

namespace App\Http\Controllers;

use App\Models\BookingInquiry;
use App\Models\Tour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingInquiryController extends Controller
{
    public function index(Request $request): View
    {
        return view('account.index', [
            'inquiries' => $request->user()->bookingInquiries()->with('tour')->latest()->paginate(10),
        ]);
    }

    public function store(Request $request, Tour $tour): RedirectResponse
    {
        abort_unless($tour->is_published, 404);

        $validated = $request->validate([
            'travel_date' => ['required', 'date', 'after_or_equal:today'],
            'travelers' => ['required', 'integer', 'min:1', 'max:30'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $request->user()->bookingInquiries()->create([
            ...$validated,
            'tour_id' => $tour->id,
            'status' => 'pending',
        ]);

        return redirect()->route('account')->with('success', 'Your trip inquiry has been sent. We will be in touch soon.');
    }
}
