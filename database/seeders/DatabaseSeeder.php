<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\ServiceSolution;
use App\Models\Project;
use App\Models\Post;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@kootaservice.com'],
            [
                'name' => 'Admin KOOTA SERVICE',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Clear existing data to maintain sync
        ServiceSolution::query()->delete();
        Project::query()->delete();
        Service::query()->delete();
        Faq::query()->delete();
        // Posts left empty or clean for manual input

        // 2. Services Data (Exact 4 Core Services from Catalog Mockup)
        $cleaningService = Service::create([
            'title' => 'Cleaning Service',
            'slug' => 'cleaning-service',
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Layanan kebersihan komersial dan industrial dengan standar tinggi, meliputi pemeliharaan rutin, deep cleaning, hingga sanitasi khusus.',
            'description' => 'Layanan kebersihan komersial dan industrial dengan standar tinggi, meliputi pemeliharaan rutin, deep cleaning, hingga pembersihan menyeluruh untuk menjaga kebersihan dan kenyamanan ruang kerja Anda.',
            'hero_cta_text' => 'Konsultasi Cleaning Service Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'cleaning',
            'order' => 1,
        ]);

        $wasteService = Service::create([
            'title' => 'Pengangkutan Sampah',
            'slug' => 'pengangkutan-sampah',
            'category' => 'sustainability',
            'badge_label' => 'Sustainability Service',
            'subtitle' => 'Solusi pengangkutan dan pengelolaan sampah yang praktis dan terjadwal untuk hunian dan bisnis Anda. Bersih, efisien, dan ramah lingkungan.',
            'description' => 'Solusi pengangkutan dan pengelolaan sampah yang praktis dan terjadwal untuk hunian dan bisnis Anda. Bersih, efisien, dan ramah lingkungan.',
            'hero_cta_text' => 'Konsultasi Pengangkutan Sampah Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'recycle',
            'order' => 2,
        ]);

        $handymanService = Service::create([
            'title' => 'Jasa Tukang Perbaikan & Renovasi',
            'slug' => 'jasa-tukang-perbaikan-dan-renovasi',
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Tenaga tukang, renovasi, dan perbaikan untuk kebutuhan pekerjaan dan maintenance properti dengan standar kualitas tinggi dan pengerjaan tepat waktu.',
            'description' => 'Tenaga tukang, renovasi, dan perbaikan untuk kebutuhan pekerjaan dan maintenance properti dengan standar kualitas tinggi dan pengerjaan tepat waktu.',
            'hero_cta_text' => 'Konsultasi Jasa Tukang Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'tools',
            'order' => 3,
        ]);

        $ipalService = Service::create([
            'title' => 'IPAL',
            'slug' => 'ipal',
            'category' => 'sustainability',
            'badge_label' => 'Sustainability Service',
            'subtitle' => 'Instalasi pengolahan air limbah profesional untuk kebutuhan properti komersial, industri, dan fasilitas umum.',
            'description' => 'Instalasi pengolahan air limbah profesional untuk kebutuhan properti komersial, industri, dan fasilitas umum sesuai standar baku mutu lingkungan.',
            'hero_cta_text' => 'Konsultasi IPAL Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'water',
            'order' => 4,
        ]);

        // 3. Service Solutions Data matching Mockups
        // Solutions for Pengangkutan Sampah (Image 2)
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Terjadwal (Scheduled)',
            'description' => 'Layanan pengangkutan rutin mingguan atau bulanan untuk perumahan dan klaster.',
            'image' => null,
            'icon' => 'calendar',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Komersial',
            'description' => 'Pengangkutan volume besar untuk restoran, ruko, dan gedung perkantoran.',
            'image' => null,
            'icon' => 'commercial',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Pascarenovasi',
            'description' => 'Pembersihan dan pembuangan puing sisa konstruksi dengan aman.',
            'image' => null,
            'icon' => 'hazard',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Panggilan Insidental (Regular)',
            'description' => 'Layanan on-demand untuk pengangkutan sampah mendadak atau barang berukuran besar (bulky waste).',
            'image' => null,
            'icon' => 'phone',
            'order' => 4,
        ]);

        // Solutions for Jasa Tukang Perbaikan & Renovasi (Image 4)
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Perbaikan Ringan',
            'description' => 'Solusi cepat untuk masalah sehari-hari seperti kebocoran pipa, kerusakan stop kontak, engsel pintu, dan perbaikan minor lainnya.',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'wrench',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Maintenance Rutin',
            'description' => 'Perawatan berkala untuk AC, sistem kelistrikan, dan saluran air guna mencegah kerusakan mendadak pada properti Anda.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
            'icon' => 'settings',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Renovasi Ruangan',
            'description' => 'Perombakan tata letak, pengecatan ulang, dan pembaruan interior untuk menyegarkan suasana dan estetika properti Anda.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'hammer',
            'order' => 3,
        ]);

        // Solutions for Cleaning Service
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'General Cleaning',
            'description' => 'Pembersihan harian dan berkala untuk menjaga kebersihan estetika ruang kerja dan hunian secara konsisten.',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80',
            'icon' => 'sparkles',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Deep Cleaning',
            'description' => 'Pembersihan mendalam secara menyeluruh menjangkau area sulit dan sanitasi kuman membandel.',
            'image' => 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=800&q=80',
            'icon' => 'shield',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Commercial Facility Cleaning',
            'description' => 'Pemeliharaan kebersihan gedung bertingkat, pusat perbelanjaan, rumah sakit, dan kompleks perkantoran.',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
            'icon' => 'building',
            'order' => 3,
        ]);

        // Solutions for IPAL
        ServiceSolution::create([
            'service_id' => $ipalService->id,
            'title' => 'Perancangan & Instalasi IPAL',
            'description' => 'Pembangunan fasilitas pengolahan air limbah sesuai baku mutu dan regulasi lingkungan hidup.',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=800&q=80',
            'icon' => 'water',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $ipalService->id,
            'title' => 'Maintenance & Audit Berkala',
            'description' => 'Perawatan mekanikal, elektrikal, dan uji laboratorium berkala untuk kestabilan operasional IPAL.',
            'image' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=800&q=80',
            'icon' => 'beaker',
            'order' => 2,
        ]);

        // 4. Projects Showcase Data (Matching Mockup tabs & galleries)
        // Pengangkutan Sampah Projects (Image 2)
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Terjadwal',
            'title' => 'Project Pengangkutan Terjadwal',
            'description' => 'Dokumentasi layanan pengangkutan rutin mingguan atau bulanan untuk perumahan dan klaster.',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Terjadwal',
            'title' => 'Penataan Tempat Sampah Terpilah Klaster',
            'description' => 'Sistem tempat sampah terpilah modern di area pemukiman premium.',
            'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Komersial',
            'title' => 'Pengangkutan Sampah Food & Beverage Mall',
            'description' => 'Penanganan limbah organik dan non-organik restoran skala komersial harian.',
            'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => false,
        ]);
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pasca Renovasi',
            'title' => 'Pembersihan Puing Konstruksi Gedung',
            'description' => 'Evakuasi dan pengangkutan material sisa konstruksi dengan armada dump truck.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => false,
        ]);

        // Jasa Tukang Renovasi Projects (Image 4)
        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Renovasi Ruangan',
            'title' => 'Project Renovasi Ruangan Kantor',
            'description' => 'Dokumentasi perombakan tata letak, pengecatan ulang, dan pembaruan interior untuk menyegarkan suasana properti.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);
        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Renovasi Ruangan',
            'title' => 'Pemasangan Interior & Kabinet Kantor Koota',
            'description' => 'Penyelesaian instalasi perabot dan finishing ruangan kantor modern.',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);
        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Ringan',
            'title' => 'Perbaikan Instalasi Pipa & Kran Gedung',
            'description' => 'Penanganan cepat kebocoran sistem perpipaan toilet komersial.',
            'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => false,
        ]);
        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Maintenance Rutin',
            'title' => 'Maintenance Panel Listrik Berkala',
            'description' => 'Pemeriksaan rutin beban tegangan dan koneksi MCB pusat.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => false,
        ]);

        // IPAL Project (Image 3 Portfolio Showcase)
        Project::create([
            'service_id' => $ipalService->id,
            'category_name' => 'IPAL',
            'title' => 'Instalasi IPAL Modern',
            'description' => 'Pembangunan fasilitas pengolahan air limbah sesuai standar lingkungan terbaru.',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);

        // Cleaning Service Projects
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Cleaning Service',
            'title' => 'Deep Cleaning Area Perkantoran',
            'description' => 'Pembersihan menyeluruh lantai dan workstation perkantoran modern.',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000&q=80',
            'is_featured' => true,
        ]);

        // Video Highlight Projects
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Lihat Hasil Project Kami - Pengangkutan Sampah',
            'description' => 'Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan, langsung dari sudut pandang klien kami.',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1000&q=80',
            'video_url' => 'https://www.youtube.com',
            'is_video' => true,
            'is_featured' => true,
        ]);
        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Jasa Tukang Perbaikan & Renovasi',
            'title' => 'Lihat Hasil Project Kami - Renovasi Kantor',
            'description' => 'Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan, langsung dari sudut pandang klien kami.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80',
            'video_url' => 'https://www.youtube.com',
            'is_video' => true,
            'is_featured' => true,
        ]);

        // 5. FAQs matching Mockup (Images 1, 3, 5)
        Faq::create([
            'question' => 'Apa itu Koota Production?',
            'answer' => 'Koota Production adalah penyedia layanan terpadu yang siap membantu Anda dalam kebutuhan perawatan fasilitas, kebersihan profesional, perbaikan dan renovasi, serta manajemen lingkungan yang berkelanjutan.',
            'category' => 'General',
            'order' => 1,
        ]);

        Faq::create([
            'question' => 'Apa saja layanan yang ditawarkan oleh Koota Production?',
            'answer' => 'Kami menawarkan solusi komprehensif yang mencakup Cleaning Service komersial & residensial, Pengangkutan Sampah terjadwal & insidental, Jasa Tukang Perbaikan & Renovasi bangunan, serta Instalasi & Perawatan IPAL (Instalasi Pengolahan Air Limbah).',
            'category' => 'General',
            'order' => 2,
        ]);

        Faq::create([
            'question' => 'Apakah Koota Production melayani proyek di luar kota?',
            'answer' => 'Ya, kami melayani berbagai proyek pengelolaan fasilitas dan perbaikan baik di dalam kota maupun wilayah sekitarnya dengan standar operasional yang sama terjaminnya.',
            'category' => 'General',
            'order' => 3,
        ]);

        Faq::create([
            'question' => 'Berapa lama proses pengerjaan proyek di Koota Production?',
            'answer' => 'Durasi pengerjaan disesuaikan dengan skala dan jenis kebutuhan layanan. Setelah tahap konsultasi dan assessment awal, tim kami akan memberikan rencana kerja beserta estimasi waktu pengerjaan yang jelas dan terukur.',
            'category' => 'General',
            'order' => 4,
        ]);
    }
}

