<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TravelController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'featuredTours' => Tour::query()->where('is_published', true)->latest()->take(3)->get(),
        ]);
    }

    public function index(Request $request): View
    {
        $categories = Tour::query()
            ->where('is_published', true)
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $tours = Tour::query()
            ->where('is_published', true)
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('destination', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('category'), fn ($query) => $query->where('category', $request->string('category')->toString()))
            ->orderBy('title')
            ->paginate(9)
            ->withQueryString();

        return view('tours.index', ['tours' => $tours, 'categories' => $categories]);
    }

    public function show(Tour $tour): View
    {
        abort_unless($tour->is_published, 404);

        return view('tours.show', ['tour' => $tour]);
    }
}
