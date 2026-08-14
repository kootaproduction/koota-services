<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'badge_label' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'hero_cta_text' => 'nullable|string',
            'hero_image_file' => 'nullable|image|max:5120',
            'hero_image_url' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('hero_image_file')) {
            $path = $request->file('hero_image_file')->store('services', 'public');
            $validated['hero_image'] = Storage::url($path);
        } else {
            $validated['hero_image'] = $validated['hero_image_url'] ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80';
        }

        unset($validated['hero_image_file'], $validated['hero_image_url']);
        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'badge_label' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'hero_cta_text' => 'nullable|string',
            'hero_image_file' => 'nullable|image|max:5120',
            'hero_image_url' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('hero_image_file')) {
            $path = $request->file('hero_image_file')->store('services', 'public');
            $validated['hero_image'] = Storage::url($path);
        } elseif ($request->filled('hero_image_url')) {
            $validated['hero_image'] = $validated['hero_image_url'];
        }

        unset($validated['hero_image_file'], $validated['hero_image_url']);
        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
