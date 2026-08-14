<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Faq;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'All');
        $query = Project::query();

        if ($category && $category !== 'All') {
            $query->where(function ($q) use ($category) {
                $q->where('category_name', $category)
                  ->orWhereHas('service', function ($sq) use ($category) {
                      $sq->where('title', 'like', "%{$category}%");
                  });
            });
        }

        $projects = $query->latest()->get();
        $services = Service::orderBy('order')->get();
        $faqs = Faq::orderBy('order')->get();

        return view('portfolio.index', compact('projects', 'services', 'category', 'faqs'));
    }
}

