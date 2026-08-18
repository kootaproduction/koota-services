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

        if ($category && $category !== 'All' && $category !== 'Semua') {
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

    public function show($idOrSlug)
    {
        $project = Project::where('id', $idOrSlug)
            ->orWhere('slug', $idOrSlug)
            ->with('service')
            ->firstOrFail();

        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where(function ($q) use ($project) {
                $q->where('category_name', $project->category_name)
                  ->orWhere('service_id', $project->service_id);
            })
            ->take(3)
            ->get();

        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Project::where('id', '!=', $project->id)->take(3)->get();
        }

        $faqs = Faq::orderBy('order')->get();

        return view('portfolio.show', compact('project', 'relatedProjects', 'faqs'));
    }
}
