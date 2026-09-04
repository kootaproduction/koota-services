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

        // Clear existing data to maintain clean sync
        ServiceSolution::query()->delete();
        Project::query()->delete();
        Service::query()->delete();
        Post::query()->delete();
        Faq::query()->delete();

        // 2. Services Data (Exact 3 Core Services: Home Cleaning, Perbaikan Rumah, Pengangkutan Sampah)
        $cleaningService = Service::create([
            'title' => 'Home Cleaning',
            'slug' => 'home-cleaning',
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Layanan kebersihan menyeluruh untuk hunian dan properti dengan standar higienitas tinggi, tenaga kerja terlatih, serta chemical aman food-grade.',
            'description' => 'Solusi perawatan kebersihan rumah terpadu: General Cleaning, Deep Cleaning, Hydro Cleaning sedot tungau kasur/sofa, sterilisasi disinfektan, hingga pembersihan tuntas pasca renovasi.',
            'hero_cta_text' => 'Konsultasi Gratis Home Cleaning',
            'hero_image' => '/images/home-cleaning.jpg',
            'icon' => 'cleaning',
            'order' => 1,
        ]);

        $handymanService = Service::create([
            'title' => 'Perbaikan Rumah',
            'slug' => 'perbaikan-rumah',
            'category' => 'facility_care',
            'badge_label' => 'Facility Care Services',
            'subtitle' => 'Jasa tukang ahli, perbaikan kelistrikan, saluran pipa air bocor, servis AC, pengecatan dinding, dan renovasi rumah presisi bergaransi.',
            'description' => 'Solusi perbaikan dan pemeliharaan rumah terpadu yang praktis. Dari perbaikan minor harian hingga renovasi interior hunian, ditangani oleh tenaga tukang bersertifikat dan berjam terbang tinggi.',
            'hero_cta_text' => 'Konsultasi Gratis Perbaikan Rumah',
            'hero_image' => '/images/perbaikan-rumah.jpg',
            'icon' => 'tools',
            'order' => 2,
        ]);

        $wasteService = Service::create([
            'title' => 'Pengangkutan Sampah',
            'slug' => 'pengangkutan-sampah',
            'category' => 'facility_care',
            'badge_label' => 'Sustainability Service',
            'subtitle' => 'Solusi pengangkutan dan pengelolaan limbah terjadwal untuk hunian residensial, bisnis, kafe, serta pembuangan puing sisa renovasi bangunan.',
            'description' => 'Layanan pengangkutan sampah rutin, on-demand, dan evakuasi puing konstruksi dengan armada dump truck tertutup terpercaya. Lingkungan bersih, higienis, dan tertata rapi.',
            'hero_cta_text' => 'Konsultasi Gratis Pengangkutan Sampah',
            'hero_image' => '/images/pengangkutan-sampah.jpg',
            'icon' => 'recycle',
            'order' => 3,
        ]);

        // 3. Service Solutions Data
        // Solutions for Home Cleaning
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Daily & General Cleaning',
            'description' => 'Pembersihan rutin berkala untuk seluruh ruangan, kamar tidur, kamar mandi, dapur, dan ruang keluarga agar selalu segar dan nyaman.',
            'image' => '/images/home-cleaning.jpg',
            'icon' => 'sparkles',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Deep Cleaning Menyeluruh',
            'description' => 'Sanitasi mendalam dengan chemical ramah lingkungan dan alat modern untuk kerak toilet, sudut sulit, lantai marmer/granit, dan kaca jendela.',
            'image' => 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=800&q=80',
            'icon' => 'shield',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Hydro Vacuum & Sedot Tungau',
            'description' => 'Pembersihan kasur, sofa, karpet, dan gorden dari tungau, debu mikro, dan alergen menggunakan teknologi hydro cleaning vacuum berkekuatan tinggi.',
            'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
            'icon' => 'sparkles',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Pembersihan Pasca Renovasi',
            'description' => 'Pembersihan total debu semen, sisa cat, serpihan gypsum, dan kotoran konstruksi hingga rumah siap ditempati dengan higienis.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'building',
            'order' => 4,
        ]);

        // Solutions for Perbaikan Rumah
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Perbaikan Pipa & Kebocoran Air',
            'description' => 'Deteksi dan perbaikan pipa pecah, kran bocor, saluran mampet, tandon air, dan instalasi pompa air rumah tinggal.',
            'image' => '/images/perbaikan-rumah.jpg',
            'icon' => 'wrench',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Instalasi & Servis Kelistrikan',
            'description' => 'Perbaikan korsleting, pemasangan stop kontak, saklar, lampu dekoratif, MCB panel, dan instalasi jalur kabel rapi terstandar.',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'settings',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Servis & Perawatan AC Rumah',
            'description' => 'Cuci AC berkala, isi freon, perbaikan AC bocor atau tidak dingin oleh teknisi berpengalaman dan bergaransi.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
            'icon' => 'settings',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $handymanService->id,
            'title' => 'Pengecatan & Renovasi Ruangan',
            'description' => 'Pengecatan interior/eksterior dinding, perbaikan plafon jebol, partisi gypsum, keramik pecah, dan renovasi ruangan.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'hammer',
            'order' => 4,
        ]);

        // Solutions for Pengangkutan Sampah
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Pengangkutan Sampah Terjadwal',
            'description' => 'Layanan rutin mingguan atau bulanan untuk perumahan, klaster residensial, dan lingkungan warga secara tertib dan disiplin.',
            'image' => '/images/pengangkutan-sampah.jpg',
            'icon' => 'calendar',
            'order' => 1,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Sampah Komersial & Restoran / Kafe',
            'description' => 'Evakuasi sampah organik dan anorganik volume besar untuk kafe, resto, toko, dan ruko dengan standar higienitas bebas bau.',
            'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'commercial',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Evakuasi Puing & Sisa Bangunan',
            'description' => 'Pembersihan dan angkut sisa puing bongkaran tembok, genteng, semen, dan kayu pascarenovasi dengan armada dump truck.',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
            'icon' => 'hazard',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Panggilan Insidental (Bulky Waste)',
            'description' => 'Pengangkutan cepat on-demand untuk kasur bekas, lemari rusak, sofa tua, atau sampah acara/event keluarga.',
            'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=800&q=80',
            'icon' => 'phone',
            'order' => 4,
        ]);

        // 4. Projects Showcase Data
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Deep Cleaning & Sanitasi Menyeluruh Hunian 2 Lantai',
            'slug' => 'deep-cleaning-hunian-citraland',
            'description' => 'Pembersihan total seluruh kamar, kamar mandi berkerak, lantai granit, kaca jendela tinggi, dan sterilisasi ruangan di kawasan hunian Citraland.',
            'client' => 'Ibu Maya & Keluarga',
            'location' => 'Surabaya Barat, Jawa Timur',
            'completion_date' => 'Agustus 2024',
            'image' => '/images/home-cleaning.jpg',
            'gallery_images' => [
                '/images/home-cleaning.jpg',
                'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Rumah',
            'title' => 'Perbaikan Kebocoran Atap, Pengecatan Ulang & Partisi Interior',
            'slug' => 'perbaikan-rumah-pakuwon-city',
            'description' => 'Pengerjaan komprehensif penambalan talang bocor, perbaikan plafon gypsum yang lapuk, serta pengecatan ulang ruang utama rumah tinggal.',
            'client' => 'Bapak Hendra Gunawan',
            'location' => 'Surabaya Timur, Jawa Timur',
            'completion_date' => 'Juli 2024',
            'image' => '/images/perbaikan-rumah.jpg',
            'gallery_images' => [
                '/images/perbaikan-rumah.jpg',
                'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Pengangkutan Rutin Terpadu Kawasan Klaster Puri Harmoni',
            'slug' => 'pengangkutan-sampah-puri-harmoni',
            'description' => 'Pengangkutan sampah rumah tangga terjadwal 3x seminggu untuk 250 unit rumah tinggal dengan armada truk tertutup ramah lingkungan.',
            'client' => 'Pengurus RT/RW Klaster Puri Harmoni',
            'location' => 'Malang, Jawa Timur',
            'completion_date' => 'Agustus 2024',
            'image' => '/images/pengangkutan-sampah.jpg',
            'gallery_images' => [
                '/images/pengangkutan-sampah.jpg',
                'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        // Video Highlight Reels Projects
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Aksi Cepat Tim Home Cleaning KOOTA SERVICE',
            'slug' => 'video-home-cleaning-koota',
            'description' => 'Transformasi rumah bersih berkilau dan bebas tungau bersama tim profesional Koota Services.',
            'image' => '/images/home-cleaning.jpg',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Rumah',
            'title' => 'Proses Perbaikan & Renovasi Interior Presisi',
            'slug' => 'video-perbaikan-rumah-koota',
            'description' => 'Dari perbaikan pipa bocor hingga finishing dinding rapi oleh tukang ahli Koota Services.',
            'image' => '/images/perbaikan-rumah.jpg',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        // 5. Blog Posts Data
        Post::create([
            'title' => '5 Tips Menjaga Kebersihan dan Higienitas Rumah Agar Bebas Tungau & Alergen',
            'slug' => '5-tips-kebersihan-rumah-bebas-tungau',
            'category' => 'Home Cleaning',
            'excerpt' => 'Menjaga rumah tetap sehat bukan sekadar menyapu dan mengepel. Pelajari langkah deep cleaning rutin untuk mencegah tungau kasur dan alergen.',
            'content' => '<p>Kesehatan keluarga berawal dari kualitas udara dan kebersihan sudut rumah Anda. Melalui jadwal pembersihan rutin, sedot tungau kasur berkala, dan penggunaan disinfektan aman, rumah Anda akan selalu menjadi tempat istirahat yang aman dan menyegarkan.</p>',
            'image' => '/images/home-cleaning.jpg',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Panduan Perawatan Rumah: Cara Cepat Deteksi Pipa Bocor dan Masalah Kelistrikan',
            'slug' => 'panduan-deteksi-pipa-bocor-listrik',
            'category' => 'Perbaikan Rumah',
            'excerpt' => 'Kenali tanda-tanda awal kebocoran air tersembunyi dan indikasi korsleting listrik sebelum merusak struktur plafon serta dinding rumah Anda.',
            'content' => '<p>Bercak lembap pada dinding atau tagihan listrik yang tiba-tiba membengkak sering kali menjadi pertanda adanya masalah instalasi. Tim tukang ahli Koota Services siap membantu melakukan inspeksi menyeluruh.</p>',
            'image' => '/images/perbaikan-rumah.jpg',
            'is_featured' => false,
            'published_at' => now()->subDays(3),
        ]);

        Post::create([
            'title' => 'Kelola Sampah Rumah Tangga Secara Teratur: Bebas Bau dan Ramah Lingkungan',
            'slug' => 'kelola-sampah-rumah-tangga-bebas-bau',
            'category' => 'Pengangkutan Sampah',
            'excerpt' => 'Tips memilah sampah organik dapur dan jadwal pengangkutan sampah teratur agar lingkungan perumahan tetap asri, higienis, dan sehat.',
            'content' => '<p>Pengangkutan sampah yang terjadwal mencegah penumpukan limbah dan perkembangbiakan lalat serta bakteri berbahaya di pekarangan rumah Anda.</p>',
            'image' => '/images/pengangkutan-sampah.jpg',
            'is_featured' => false,
            'published_at' => now()->subDays(5),
        ]);

        // 6. FAQs Data
        Faq::create([
            'question' => 'Apa saja layanan yang disediakan oleh KOOTA SERVICE?',
            'answer' => 'KOOTA SERVICE menyediakan 3 layanan utama terintegrasi: Home Cleaning (daily, deep cleaning, sedot tungau, pascarenovasi), Perbaikan Rumah (tukang ahli, kebocoran pipa, kelistrikan, servis AC, renovasi), dan Pengangkutan Sampah (jadwal rutin residensial, sampah komersial/kafe, evakuasi puing bangunan).',
            'category' => 'General',
            'order' => 1,
        ]);

        Faq::create([
            'question' => 'Apakah ada jaminan kualitas hasil kerja (garansi)?',
            'answer' => 'Ya, kenyamanan dan kepuasan Anda adalah prioritas utama kami. Kami memberikan garansi penuh atas setiap pengerjaan—jika hasil pekerjaan belum sesuai standar kesepakatan, tim kami siap memperbaikinya untuk Anda tanpa biaya tambahan.',
            'category' => 'General',
            'order' => 2,
        ]);

        Faq::create([
            'question' => 'Bagaimana cara berkonsultasi dan memesan layanan?',
            'answer' => 'Sangat mudah! Anda dapat mengklik tombol "Konsultasi Dengan Ahlinya" atau menghubungi WhatsApp kami langsung di 0812-1759-7109. Tim Customer Service kami aktif 24/7 untuk membantu menjadwalkan kunjungan tenaga ahli.',
            'category' => 'General',
            'order' => 3,
        ]);

        Faq::create([
            'question' => 'Di mana saja area jangkauan operasional KOOTA SERVICE?',
            'answer' => 'Saat ini tim profesional KOOTA SERVICE melayani wilayah Surabaya, Malang, Bali, dan Jakarta, serta area sekitarnya dengan respon cepat dan teknisi handal.',
            'category' => 'General',
            'order' => 4,
        ]);
    }
}
