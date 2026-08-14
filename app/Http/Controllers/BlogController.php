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

        $featuredPost = Post::where('is_featured', true)->latest()->first();
        if (!$featuredPost) {
            $featuredPost = Post::latest()->first();
        }

        $query = Post::query();
        if ($featuredPost) {
            $query->where('id', '!=', $featuredPost->id);
        }

        if ($category && $category !== 'All' && $category !== 'Semua') {
            $query->where('category', $category);
        }

        $posts = $query->latest()->get();
        $faqs = Faq::orderBy('order')->get();

        return view('blog.index', compact('featuredPost', 'posts', 'category', 'faqs'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
