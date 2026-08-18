<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('service')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();
        $categories = [
            'Cleaning Service',
            'Pengangkutan Sampah',
            'Jasa Tukang & Renovasi',
            'IPAL',
        ];
        return view('admin.projects.create', compact('services', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category_name' => 'required|string',
            'description' => 'nullable|string',
            'client' => 'nullable|string',
            'location' => 'nullable|string',
            'completion_date' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string',
            'gallery_files.*' => 'nullable|image|max:10240',
            'gallery_urls' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_type' => 'nullable|string',
            'is_video' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        // Handle Main Image
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects', 'public');
            $validated['image'] = Storage::url($path);
        } else {
            $validated['image'] = $validated['image_url'] ?? 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000&q=80';
        }

        // Handle Gallery Images (Multi-file & URLs)
        $gallery = [];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $p = $file->store('projects/gallery', 'public');
                $gallery[] = Storage::url($p);
            }
        }
        if (!empty($request->gallery_urls)) {
            $urls = array_filter(array_map('trim', explode("\n", $request->gallery_urls)));
            $gallery = array_merge($gallery, $urls);
        }
        if (!empty($gallery)) {
            $validated['gallery_images'] = $gallery;
        }

        unset($validated['image_file'], $validated['image_url'], $validated['gallery_files'], $validated['gallery_urls']);
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project dan katalog foto berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $services = Service::orderBy('title')->get();
        $categories = [
            'Cleaning Service',
            'Pengangkutan Sampah',
            'Jasa Tukang & Renovasi',
            'IPAL',
        ];
        return view('admin.projects.edit', compact('project', 'services', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category_name' => 'required|string',
            'description' => 'nullable|string',
            'client' => 'nullable|string',
            'location' => 'nullable|string',
            'completion_date' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string',
            'gallery_files.*' => 'nullable|image|max:10240',
            'gallery_urls' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_type' => 'nullable|string',
            'is_video' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        if (empty($project->slug)) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        // Handle Main Image
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects', 'public');
            $validated['image'] = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        // Handle Gallery Images
        $gallery = $project->gallery_images ?? [];
        if (!is_array($gallery)) {
            $gallery = [];
        }

        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $p = $file->store('projects/gallery', 'public');
                $gallery[] = Storage::url($p);
            }
        }
        if (!empty($request->gallery_urls)) {
            $urls = array_filter(array_map('trim', explode("\n", $request->gallery_urls)));
            $gallery = array_merge($gallery, $urls);
        }
        $validated['gallery_images'] = array_values(array_unique($gallery));

        unset($validated['image_file'], $validated['image_url'], $validated['gallery_files'], $validated['gallery_urls']);
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
