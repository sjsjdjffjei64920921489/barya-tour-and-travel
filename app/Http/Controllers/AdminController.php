<?php

namespace App\Http\Controllers;

use App\Models\BookingInquiry;
use App\Models\Tour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard', [
            'tourCount' => Tour::count(),
            'pendingCount' => BookingInquiry::where('status', 'pending')->count(),
            'customerCount' => \App\Models\User::where('is_admin', false)->count(),
            'recentInquiries' => BookingInquiry::with(['tour', 'user'])->latest()->take(5)->get(),
        ]);
    }

    public function tours(): View
    {
        return view('admin.tours.index', ['tours' => Tour::latest()->paginate(12)]);
    }

    public function createTour(): View
    {
        return view('admin.tours.form', ['tour' => new Tour()]);
    }

    public function storeTour(Request $request): RedirectResponse
    {
        Tour::create($this->validatedTour($request));

        return redirect()->route('admin.tours.index')->with('success', 'Tour created.');
    }

    public function editTour(Tour $tour): View
    {
        return view('admin.tours.form', compact('tour'));
    }

    public function updateTour(Request $request, Tour $tour): RedirectResponse
    {
        $tour->update($this->validatedTour($request, $tour));

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated.');
    }

    public function deleteTour(Tour $tour): RedirectResponse
    {
        if ($tour->bookingInquiries()->exists()) {
            return back()->withErrors(['tour' => 'This journey has inquiries attached. Unpublish it instead of deleting it.']);
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted.');
    }

    public function inquiries(): View
    {
        return view('admin.inquiries.index', [
            'inquiries' => BookingInquiry::with(['tour', 'user'])->latest()->paginate(15),
        ]);
    }

    public function updateInquiry(Request $request, BookingInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,declined,completed'],
        ]);

        $inquiry->update($validated);

        return back()->with('success', 'Inquiry status updated.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedTour(Request $request, ?Tour $tour = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'destination' => ['required', 'string', 'max:120'],
            'category' => ['required', 'string', 'max:80'],
            'duration' => ['required', 'string', 'max:80'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999999'],
            'currency' => ['required', 'string', 'size:3'],
            'image_url' => ['required', 'url', 'max:2048'],
            'image_credit' => ['nullable', 'string', 'max:255'],
            'image_credit_url' => ['nullable', 'url', 'max:2048'],
            'summary' => ['required', 'string', 'max:240'],
            'description' => ['required', 'string', 'max:5000'],
            'itinerary' => ['nullable', 'string', 'max:5000'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

        if (Tour::where('slug', $validated['slug'])->when($tour, fn ($query) => $query->whereKeyNot($tour->id))->exists()) {
            $validated['slug'] .= '-'.\Illuminate\Support\Str::lower(\Illuminate\Support\Str::random(5));
        }

        return $validated;
    }
}
