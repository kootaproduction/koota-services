<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\Consultation;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalProjects = Project::count();
        $totalPosts = Post::count();
        $totalConsultations = Consultation::count();
        $recentConsultations = Consultation::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalServices', 'totalProjects', 'totalPosts', 'totalConsultations', 'recentConsultations'));
    }
}
