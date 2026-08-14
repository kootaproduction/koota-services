<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
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
        return view('admin.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category_name' => 'required|string',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'is_video' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects', 'public');
            $validated['image'] = Storage::url($path);
        } else {
            $validated['image'] = $validated['image_url'] ?? 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000&q=80';
        }

        unset($validated['image_file'], $validated['image_url']);
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $services = Service::orderBy('title')->get();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category_name' => 'required|string',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'is_video' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('projects', 'public');
            $validated['image'] = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        unset($validated['image_file'], $validated['image_url']);
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
