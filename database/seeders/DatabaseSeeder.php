<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\ServiceSolution;
use App\Models\Project;
use App\Models\Post;
use App\Models\Faq;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        // Site Settings
        SiteSetting::set('is_maintenance', '0');
        SiteSetting::set('maintenance_message', 'Website KOOTA SERVICE sedang dalam pemeliharaan berkala untuk peningkatan kualitas layanan. Kami akan segera kembali.');

        // Clear existing data to maintain sync
        ServiceSolution::query()->delete();
        Project::query()->delete();
        Service::query()->delete();
        Post::query()->delete();
        Faq::query()->delete();

        // 2. Services Data (Exact 4 Core Services with Unified Red Theme)
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
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Solusi pengangkutan dan pengelolaan sampah yang praktis dan terjadwal untuk hunian dan bisnis Anda. Bersih, efisien, dan ramah lingkungan.',
            'description' => 'Solusi pengangkutan dan pengelolaan sampah yang praktis dan terjadwal untuk hunian dan bisnis Anda. Bersih, efisien, dan ramah lingkungan.',
            'hero_cta_text' => 'Konsultasi Pengangkutan Sampah Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'recycle',
            'order' => 2,
        ]);

        $handymanService = Service::create([
            'title' => 'Jasa Tukang & Renovasi',
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
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Instalasi pengolahan air limbah profesional untuk kebutuhan properti komersial, industri, dan fasilitas umum sesuai standar baku mutu lingkungan.',
            'description' => 'Instalasi pengolahan air limbah profesional untuk kebutuhan properti komersial, industri, dan fasilitas umum sesuai standar baku mutu lingkungan.',
            'hero_cta_text' => 'Konsultasi IPAL Sekarang',
            'hero_image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1600&q=80',
            'icon' => 'water',
            'order' => 4,
        ]);

        // 3. Service Solutions Data (Rich Solutions for ALL 4 Services)
        // Solutions for Cleaning Service
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'General Daily Cleaning',
            'description' => 'Pembersihan berkala harian dan mingguan untuk menjaga kebersihan dan higienitas kantor, ruko, restoran, serta area komersial.',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80',
            'icon' => 'sparkles',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Deep Cleaning Menyeluruh',
            'description' => 'Sanitasi mendalam dengan chemical food-grade dan peralatan modern untuk lantai, karpet, kaca tinggi, toilet, dan sudut tersembunyi.',
            'image' => 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=800&q=80',
            'icon' => 'shield',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Pembersihan Pasca Konstruksi',
            'description' => 'Pembersihan tuntas sisa semen, cat, debu halus, dan serpihan material pasca renovasi bangunan sebelum serah terima.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'building',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Hydro Cleaning & Disinfeksi',
            'description' => 'Pembersihan tungau, kasur, sofa, gorden, dan sterilisasi ruangan menggunakan teknologi hydro vacuum dan fogging disinfektan.',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
            'icon' => 'sparkles',
            'order' => 4,
        ]);

        // Solutions for Pengangkutan Sampah
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Terjadwal (Scheduled)',
            'description' => 'Layanan pengangkutan rutin mingguan atau bulanan untuk perumahan, klaster, dan kawasan bisnis.',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=800&q=80',
            'icon' => 'calendar',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Komersial & Restoran',
            'description' => 'Pengangkutan volume besar untuk restoran, kafe, ruko, hotel, dan gedung perkantoran secara higienis.',
            'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'commercial',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Pascarenovasi & Puing',
            'description' => 'Pembersihan dan evakuasi puing sisa bongkaran konstruksi dengan armada dump truck terpercaya.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'hazard',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Panggilan Insidental (On-Demand)',
            'description' => 'Layanan on-demand untuk pengangkutan sampah mendadak, event, atau pembuangan barang berukuran besar (bulky waste).',
            'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=800&q=80',
            'icon' => 'phone',
            'order' => 4,
        ]);

        // Solutions for Jasa Tukang & Renovasi
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Perbaikan Ringan & Elektrikal',
            'description' => 'Solusi cepat untuk instalasi listrik, perpipaan bocor, kran, engsel pintu, kunci, dan perbaikan minor lainnya.',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'wrench',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Maintenance Rutin Gedung',
            'description' => 'Perawatan preventif berkala untuk sistem AC, pompa air, panel listrik, dan talang atap guna mencegah kerusakan mendadak.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
            'icon' => 'settings',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Renovasi & Finishing Interior',
            'description' => 'Pengecatan dinding, pemasangan partisi gypsum, perbaikan plafon, keramik lantai, dan penataan ulang tata ruang interior.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'hammer',
            'order' => 3,
        ]);

        // Solutions for IPAL
        ServiceSolution::create([
            'service_id' => $ipalService->id,
            'title' => 'Perancangan & Pembangunan IPAL',
            'description' => 'Konstruksi instalasi pengolahan air limbah domestik, medis, dan industri bersertifikasi sesuai regulasi KLHK.',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=800&q=80',
            'icon' => 'water',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $ipalService->id,
            'title' => 'Maintenance Reaktor & Pompa Blower',
            'description' => 'Perawatan rutin motor aerasi, pompa submersible, dosing kimia, dan pemantauan kultur bakteri pengurai.',
            'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80',
            'icon' => 'settings',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $ipalService->id,
            'title' => 'Audit & Uji Baku Mutu Air Limbah',
            'description' => 'Pengambilan sampel dan uji laboratorium parameter BOD, COD, TSS, pH untuk memastikan kepatuhan regulasi lingkungan.',
            'image' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=800&q=80',
            'icon' => 'beaker',
            'order' => 3,
        ]);

        // 4. Projects Showcase Data (with rich photo catalogs and metadata)
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Cleaning Service',
            'title' => 'Deep Cleaning & Sanitasi Menyeluruh Head Office',
            'slug' => 'deep-cleaning-head-office',
            'description' => 'Pembersihan menyeluruh seluruh area kerja, lantai marmer, kaca eksterior, dan sanitasi ruang rapat seluas 2.500 m2 di pusat perkantoran.',
            'client' => 'PT Graha Pratama Nusantara',
            'location' => 'Surabaya, Jawa Timur',
            'completion_date' => 'Juli 2024',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Pengangkutan & Manajemen Sampah Terpadu Kawasan Hunian',
            'slug' => 'manajemen-sampah-kawasan-hunian',
            'description' => 'Sistem pengangkutan sampah harian terpilah berbasis jadwal presisi untuk 450 unit residensial dengan armada truk tertutup ramah lingkungan.',
            'client' => 'Pengelola Klaster Puri Surya',
            'location' => 'Malang, Jawa Timur',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1000&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Jasa Tukang & Renovasi',
            'title' => 'Renovasi & Interior Fit-Out Co-Working Space Modern',
            'slug' => 'renovasi-coworking-space',
            'description' => 'Pengerjaan renovasi komprehensif mulai dari partisi kedap suara, instalasi lighting LED arsitektural, plafon akustik, hingga pemasangan furnitur kustom.',
            'client' => 'Koota Creative Hub',
            'location' => 'Bali, Indonesia',
            'completion_date' => 'Mei 2024',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $ipalService->id,
            'category_name' => 'IPAL',
            'title' => 'Instalasi Sistem Pengolahan Air Limbah Klinik Terpadu',
            'slug' => 'instalasi-ipal-klinik-medis',
            'description' => 'Pembangunan sistem IPAL biomedis dengan proses aerasi biologis dan klorinasi otomatis berkapasitas 15 m3/hari memenuhi standar baku mutu DLH.',
            'client' => 'Klinik Medika Harmoni',
            'location' => 'Jakarta Selatan, DKI Jakarta',
            'completion_date' => 'Juni 2024',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1000&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        // Video Reels Highlight Projects (YouTube Shorts / Reels 9:16 Format - Image 4)
        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Dokumentasi Pengangkutan Sampah Armada Koota',
            'slug' => 'video-pengangkutan-sampah-koota',
            'description' => 'Aksi cepat tim Koota Services dalam evakuasi dan pengangkutan sampah komersial secara terjadwal dan higienis.',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=800&q=80',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Jasa Tukang & Renovasi',
            'title' => 'Proses Pengerjaan Renovasi & Custom Booth',
            'slug' => 'video-renovasi-custom-booth',
            'description' => 'Dari konsep hingga eksekusi presisi! Simak pembuatan custom booth indoor & perbaikan partisi interior.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        // 5. Blog Posts Data (Synchronized Categories)
        Post::create([
            'title' => '5 Standar Higienitas Wajib untuk Fasilitas Komersial dan Perkantoran Modern',
            'slug' => '5-standar-higienitas-fasilitas-komersial',
            'category' => 'Cleaning Service',
            'excerpt' => 'Menjaga kebersihan ruang kerja bukan sekadar estetika, namun investasi langsung terhadap produktivitas dan kesehatan seluruh karyawan.',
            'content' => '<p>Kebersihan lingkungan kerja memiliki korelasi langsung terhadap performa dan fokus kerja karyawan. Melalui penerapan jadwal deep cleaning terstruktur, sanitasi titik sentuh (touchpoints), serta pemanfaatan chemical ramah lingkungan, gedung perkantoran dapat mencegah penyebaran bakteri dan virus secara signifikan.</p><p>Berikut adalah 5 langkah utama yang kami terapkan dalam menjaga standar higienitas ruang komersial:</p><ul><li>Sanitasi berkala area resepsionis dan lift</li><li>Pembersihan karpet dengan dry vacuum berfilter HEPA</li><li>Pembersihan sirkulasi pendingin udara AC</li><li>Sterilisasi pantry dan toilet komersial</li><li>Penggunaan cairan disinfektan bersertifikat aman</li></ul>',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Solusi Pengelolaan Sampah Terpilah untuk Mengurangi Jejak Karbon Bisnis Anda',
            'slug' => 'solusi-pengelolaan-sampah-terpilah',
            'category' => 'Pengangkutan Sampah',
            'excerpt' => 'Bagaimana sistem pemilahan sampah organik dan anorganik dari sumber dapat memangkas biaya operasional dan mendukung keberlanjutan.',
            'content' => '<p>Pengelolaan sampah modern menuntut sistem yang terjadwal dan terpilah secara cermat. Dengan memisahkan sampah basah organik dan anorganik kering sejak dari sumbernya, proses daur ulang menjadi jauh lebih efisien.</p><p>Koota Services siap mendampingi hunian dan instansi komersial dalam merancang alur pembuangan sampah yang teratur dan ramah lingkungan.</p>',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(2),
        ]);

        Post::create([
            'title' => 'Panduan Preventif Maintenance Gedung: Mencegah Kerusakan Sebelum Terlambat',
            'slug' => 'panduan-preventif-maintenance-gedung',
            'category' => 'Jasa Tukang & Renovasi',
            'excerpt' => 'Langkah-langkah pemeriksaan berkala sistem kelistrikan, perpipaan, dan struktur bangunan guna meminimalkan risiko pengeluaran darurat.',
            'content' => '<p>Kerusakan pipa bocor tersembunyi atau korsleting listrik dapat menimbulkan kerugian besar bila tidak dideteksi sejak dini. Melakukan inspeksi berkala bersama tim teknisi berpengalaman menjamin keamanan seluruh aset Anda.</p>',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(4),
        ]);

        Post::create([
            'title' => 'Mengenal Sistem IPAL dan Cara Menjaga Baku Mutu Air Limbah Usaha',
            'slug' => 'mengenal-sistem-ipal-dan-baku-mutu',
            'category' => 'IPAL',
            'excerpt' => 'Ketahui regulasi baku mutu air limbah dan bagaimana sistem reaktor biologi menjaga lingkungan tetap aman dari pencemaran.',
            'content' => '<p>Instalasi Pengolahan Air Limbah (IPAL) merupakan sarana krusial bagi bisnis perhotelan, rumah sakit, industri, dan restoran. Dengan pengelolaan biologi yang tepat, air olahan dapat memenuhi baku mutu baku sebelum dialirkan ke saluran umum.</p>',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(6),
        ]);

        // 6. FAQs Data
        Faq::create([
            'question' => 'Apa itu Koota Services?',
            'answer' => 'Koota Services adalah penyedia layanan terpadu yang siap membantu Anda dalam kebutuhan perawatan fasilitas, kebersihan profesional (Cleaning Service), pengangkutan sampah terjadwal, perbaikan & renovasi bangunan, serta instalasi dan maintenance IPAL.',
            'category' => 'General',
            'order' => 1,
        ]);

        Faq::create([
            'question' => 'Apa saja layanan yang ditawarkan oleh Koota Services?',
            'answer' => 'Kami menawarkan 4 layanan terintegrasi: Cleaning Service (harian & deep cleaning), Pengangkutan Sampah (terjadwal, komersial, puing), Jasa Tukang & Renovasi bangunan, serta Perancangan & Maintenance IPAL.',
            'category' => 'General',
            'order' => 2,
        ]);

        Faq::create([
            'question' => 'Di wilayah mana saja area layanan Koota Services berada?',
            'answer' => 'Koota Services saat ini melayani area Surabaya, Malang, Bali, Jakarta, dan kawasan sekitarnya dengan tim teknisi dan armada operasional profesional.',
            'category' => 'General',
            'order' => 3,
        ]);

        Faq::create([
            'question' => 'Bagaimana cara berkonsultasi atau memesan layanan Koota Services?',
            'answer' => 'Anda dapat langsung mengklik tombol Konsultasi di website, mengisi form kebutuhan, atau menghubungi kami langsung melalui WhatsApp di 0812-1759-7109 atau email kootaproduction@gmail.com.',
            'category' => 'General',
            'order' => 4,
        ]);
    }
}
