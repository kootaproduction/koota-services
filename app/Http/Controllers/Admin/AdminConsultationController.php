<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::latest()->get();
        return view('admin.consultations.index', compact('consultations'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Diproses,Selesai',
        ]);

        $consultation->update(['status' => $request->status]);

        return back()->with('success', 'Status konsultasi berhasil diperbarui.');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('admin.consultations.index')->with('success', 'Data konsultasi berhasil dihapus.');
    }
}
