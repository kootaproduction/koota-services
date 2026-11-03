<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::with('service');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                  ->orWhere('client_title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('rating')) {
            $query->where('rating', (int) $request->rating);
        }

        $testimonials = $query->orderBy('order')->latest()->paginate(15)->withQueryString();
        $totalCount = Testimonial::count();
        $publishedCount = Testimonial::where('is_published', true)->count();
        $avgRating = round(Testimonial::avg('rating') ?? 5, 1);

        return view('admin.testimonials.index', compact('testimonials', 'totalCount', 'publishedCount', 'avgRating'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();
        $maxOrder = (Testimonial::max('order') ?? 0) + 1;

        return view('admin.testimonials.create', compact('services', 'maxOrder'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_title' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
            'avatar_file' => 'nullable|image|max:5120',
            'avatar_url' => 'nullable|string',
            'location' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published', true);
        $validated['order'] = $validated['order'] ?? 1;

        if ($request->hasFile('avatar_file')) {
            $path = $request->file('avatar_file')->store('testimonials', 'public');
            $validated['avatar'] = Storage::url($path);
        } else {
            $validated['avatar'] = $validated['avatar_url'] ?? null;
        }

        unset($validated['avatar_file'], $validated['avatar_url']);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Ulasan / Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        $services = Service::orderBy('title')->get();

        return view('admin.testimonials.edit', compact('testimonial', 'services'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_title' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
            'avatar_file' => 'nullable|image|max:5120',
            'avatar_url' => 'nullable|string',
            'location' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published', true);
        $validated['order'] = $validated['order'] ?? $testimonial->order;

        if ($request->hasFile('avatar_file')) {
            $path = $request->file('avatar_file')->store('testimonials', 'public');
            $validated['avatar'] = Storage::url($path);
        } elseif (!empty($validated['avatar_url'])) {
            $validated['avatar'] = $validated['avatar_url'];
        }

        unset($validated['avatar_file'], $validated['avatar_url']);

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Ulasan / Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Ulasan / Testimonial berhasil dihapus.');
    }

    public function togglePublished(Testimonial $testimonial)
    {
        $testimonial->update(['is_published' => !$testimonial->is_published]);

        return redirect()->back()->with('success', 'Status publikasi testimonial berhasil diperbarui.');
    }
}

