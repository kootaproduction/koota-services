<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Faq;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        // Artikel Terbaru & Sedang Hits untuk Carousel Paling Atas (Urutan 1)
        $trendingPosts = Post::where('is_featured', true)->latest()->take(5)->get();
        if ($trendingPosts->count() < 3) {
            $trendingPosts = Post::latest()->take(5)->get();
        }

        // Seluruh Artikel untuk Katalog Grid (Urutan 2)
        $query = Post::query();
        if ($category && $category !== 'All' && $category !== 'Semua') {
            $query->where('category', $category);
        }
        $posts = $query->latest()->get();
        $faqs = Faq::orderBy('order')->get();

        return view('blog.index', compact('trendingPosts', 'posts', 'category', 'faqs'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
