<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\Consultation;
use App\Models\SiteSetting;
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
        $isMaintenance = SiteSetting::get('is_maintenance', '0') === '1';
        $maintenanceMessage = SiteSetting::get('maintenance_message', 'Website KOOTA SERVICE sedang dalam pemeliharaan berkala untuk peningkatan kualitas layanan.');

        return view('admin.dashboard', compact('totalServices', 'totalProjects', 'totalPosts', 'totalConsultations', 'recentConsultations', 'isMaintenance', 'maintenanceMessage'));
    }

    public function toggleMaintenance(Request $request)
    {
        $status = $request->input('is_maintenance') ? '1' : '0';
        $message = $request->input('maintenance_message', 'Website KOOTA SERVICE sedang dalam pemeliharaan berkala.');

        SiteSetting::set('is_maintenance', $status);
        SiteSetting::set('maintenance_message', $message);

        $statusText = $status === '1' ? 'diaktifkan (Pengunjung luar tidak dapat membuka website)' : 'dinonaktifkan (Website dapat diakses publik)';
        return redirect()->route('admin.dashboard')->with('success', "Status Pemeliharaan (Maintenance Mode) berhasil {$statusText}.");
    }
}
