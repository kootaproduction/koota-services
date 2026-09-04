<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Service;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $selectedService = $request->query('service', 'Cleaning Service');
        $services = Service::orderBy('order')->get();

        return view('consultation.index', compact('selectedService', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_type' => 'required|string',
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'property_type' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'photo' => 'nullable|image|max:5120', // max 5MB
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('consultations', 'public');
            $validated['photo_path'] = $path;
        }

        unset($validated['photo']);
        $consultation = Consultation::create($validated);

        // Build WhatsApp notification link for convenient direct customer chat
        $adminPhone = '6281217597109'; // KOOTA Service admin phone
        $waMessage = rawurlencode(
            "Halo KOOTA SERVICES, saya *{$consultation->name}* ingin berkonsultasi mengenai *{$consultation->service_type}*.\n\n" .
            "📍 Kota: {$consultation->location}\n" .
            ($consultation->address ? "🏠 Alamat: {$consultation->address}\n" : "") .
            "🏢 Jenis Properti: {$consultation->property_type}\n" .
            "📱 WhatsApp: {$consultation->whatsapp}\n" .
            "✉️ Email: {$consultation->email}\n" .
            "📝 Catatan: {$consultation->notes}"
        );
        $waUrl = "https://wa.me/{$adminPhone}?text={$waMessage}";

        return redirect()->route('consultation.index')->with([
            'success' => 'Permintaan konsultasi Anda berhasil dikirim! Tim KOOTA SERVICES akan segera menghubungi Anda.',
            'wa_url' => $waUrl
        ]);
    }
}
