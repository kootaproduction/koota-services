<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = [
            'Cleaning Service',
            'Pengangkutan Sampah',
            'Jasa Tukang & Renovasi',
            'IPAL',
        ];
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image_file' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('posts', 'public');
            $validated['image'] = Storage::url($path);
        } else {
            $validated['image'] = $validated['image_url'] ?? 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80';
        }

        unset($validated['image_file'], $validated['image_url']);
        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $categories = [
            'Cleaning Service',
            'Pengangkutan Sampah',
            'Jasa Tukang & Renovasi',
            'IPAL',
        ];
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image_file' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($post->slug)) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('posts', 'public');
            $validated['image'] = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        unset($validated['image_file'], $validated['image_url']);
        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
