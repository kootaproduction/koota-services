<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Faq;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        $faqs = Faq::orderBy('order')->get();

        return view('services.index', compact('services', 'faqs'));
    }

    public function show($slug)
    {
        // Handle potential slug aliases
        if ($slug === 'jasa-tukang') {
            $slug = 'jasa-tukang-perbaikan-dan-renovasi';
        }

        $service = Service::where('slug', $slug)->firstOrFail();
        $solutions = $service->solutions()->orderBy('order')->get();
        $projects = Project::where('service_id', $service->id)->get();
        
        $videoProjects = Project::where('service_id', $service->id)->where('is_video', true)->get();
        if ($videoProjects->isEmpty()) {
            $videoProjects = Project::where('is_video', true)->take(2)->get();
        }

        $faqs = Faq::orderBy('order')->get();

        return view('services.show', compact('service', 'solutions', 'projects', 'videoProjects', 'faqs'));
    }
}

