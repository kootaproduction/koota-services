<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Transformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTransformationController extends Controller
{
    public function index(Request $request)
    {
        $query = Transformation::with('service');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $transformations = $query->orderBy('order')->latest()->paginate(12)->withQueryString();
        $totalCount = Transformation::count();
        $featuredCount = Transformation::where('is_featured', true)->count();
        $categories = ['Home Cleaning', 'Perbaikan Rumah', 'Pengangkutan Sampah'];

        return view('admin.transformations.index', compact('transformations', 'totalCount', 'featuredCount', 'categories'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();
        $categories = ['Home Cleaning', 'Perbaikan Rumah', 'Pengangkutan Sampah'];
        $maxOrder = (Transformation::max('order') ?? 0) + 1;

        return view('admin.transformations.create', compact('services', 'categories', 'maxOrder'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'service_id' => 'nullable|exists:services,id',
            'image_before_file' => 'nullable|image|max:10240',
            'image_before_url' => 'nullable|string',
            'image_after_file' => 'nullable|image|max:10240',
            'image_after_url' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured', true);
        $validated['order'] = $validated['order'] ?? 1;

        // Handle Image Before
        if ($request->hasFile('image_before_file')) {
            $path = $request->file('image_before_file')->store('transformations', 'public');
            $validated['image_before'] = Storage::url($path);
        } else {
            $validated['image_before'] = $validated['image_before_url'] ?? 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=800&q=80';
        }

        // Handle Image After
        if ($request->hasFile('image_after_file')) {
            $path = $request->file('image_after_file')->store('transformations', 'public');
            $validated['image_after'] = Storage::url($path);
        } else {
            $validated['image_after'] = $validated['image_after_url'] ?? 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80';
        }

        unset($validated['image_before_file'], $validated['image_before_url'], $validated['image_after_file'], $validated['image_after_url']);

        Transformation::create($validated);

        return redirect()->route('admin.transformations.index')->with('success', 'Data Transformasi Before-After berhasil ditambahkan.');
    }

    public function edit(Transformation $transformation)
    {
        $services = Service::orderBy('title')->get();
        $categories = ['Home Cleaning', 'Perbaikan Rumah', 'Pengangkutan Sampah'];

        return view('admin.transformations.edit', compact('transformation', 'services', 'categories'));
    }

    public function update(Request $request, Transformation $transformation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'service_id' => 'nullable|exists:services,id',
            'image_before_file' => 'nullable|image|max:10240',
            'image_before_url' => 'nullable|string',
            'image_after_file' => 'nullable|image|max:10240',
            'image_after_url' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured', true);
        $validated['order'] = $validated['order'] ?? $transformation->order;

        // Handle Image Before
        if ($request->hasFile('image_before_file')) {
            $path = $request->file('image_before_file')->store('transformations', 'public');
            $validated['image_before'] = Storage::url($path);
        } elseif (!empty($validated['image_before_url'])) {
            $validated['image_before'] = $validated['image_before_url'];
        }

        // Handle Image After
        if ($request->hasFile('image_after_file')) {
            $path = $request->file('image_after_file')->store('transformations', 'public');
            $validated['image_after'] = Storage::url($path);
        } elseif (!empty($validated['image_after_url'])) {
            $validated['image_after'] = $validated['image_after_url'];
        }

        unset($validated['image_before_file'], $validated['image_before_url'], $validated['image_after_file'], $validated['image_after_url']);

        $transformation->update($validated);

        return redirect()->route('admin.transformations.index')->with('success', 'Data Transformasi Before-After berhasil diperbarui.');
    }

    public function destroy(Transformation $transformation)
    {
        $transformation->delete();

        return redirect()->route('admin.transformations.index')->with('success', 'Data Transformasi Before-After berhasil dihapus.');
    }

    public function toggleFeatured(Transformation $transformation)
    {
        $transformation->update(['is_featured' => !$transformation->is_featured]);

        return redirect()->back()->with('success', 'Status unggulan transformasi berhasil diubah.');
    }
}

