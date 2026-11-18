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
        // 1. Admin User (Kredensial Khusus Admin: username 'admin' / email 'admin@kootaservice.com', password 'admin123')
        User::updateOrCreate(
            ['email' => 'admin@kootaservice.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin123'),
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
            'image' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=800&q=80',
            'icon' => 'sparkles',
            'order' => 3,
        ]);
        ServiceSolution::create([
            'service_id' => $cleaningService->id,
            'title' => 'Pembersihan Pasca Renovasi',
            'description' => 'Pembersihan total debu semen, sisa cat, serpihan gypsum, dan kotoran konstruksi hingga rumah siap ditempati dengan higienis.',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80',
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
            'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=800&q=80',
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
            'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=800&q=80',
            'icon' => 'commercial',
            'order' => 2,
        ]);
        ServiceSolution::create([
            'service_id' => $wasteService->id,
            'title' => 'Evakuasi Puing & Sisa Bangunan',
            'description' => 'Pembersihan dan angkut sisa puing bongkaran tembok, genteng, semen, dan kayu pascarenovasi dengan armada dump truck.',
            'image' => 'https://images.unsplash.com/photo-1590496793929-36417d3117de?auto=format&fit=crop&w=800&q=80',
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

        // 4. Projects Showcase Data (3 Unique Photo Projects per Service)
        // Home Cleaning Projects
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
                'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Hydro-Vacuum Sedot Tungau Kasur, Karpet & Sofa Kain',
            'slug' => 'sedot-tungau-sofa-kasur-pakuwon',
            'description' => 'Pembersihan intensif hydro vacuum alergen kasur king size, sofa ruang keluarga, dan karpet wol premium di hunian Pakuwon City.',
            'client' => 'Bapak Dennis Setiawan',
            'location' => 'Pakuwon City, Surabaya Timur',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Restorasi Kaca Buram & Kerak Keramik Kamar Mandi Utama',
            'slug' => 'restorasi-kerak-kamar-mandi-graha-family',
            'description' => 'Penghilangan kerak kalsium menahun, pemolesan kaca shower buram, dan sanitasi nat keramik kamar mandi master suite.',
            'client' => 'Ibu Stephanie Wijaya',
            'location' => 'Graha Family, Surabaya Barat',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1620626011761-996317b8d101?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1507652313519-d4e9174996dd?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        // Perbaikan Rumah Projects
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
                'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Rumah',
            'title' => 'Deteksi Presisi & Penggantian Jalur Pipa Air Bocor Dalam Dinding',
            'slug' => 'deteksi-pipa-bocor-darmo-permai',
            'description' => 'Pemeriksaan kebocoran pipa air bersih dengan sensor tekanan tanpa pembongkaran berlebih dan plester ulang rapi.',
            'client' => 'Bapak Irwan Susanto',
            'location' => 'Darmo Permai, Surabaya Barat',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581244277943-fe4a9c777189?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Rumah',
            'title' => 'Penataan Ulang Jalur Panel Listrik MCB & Servis AC Hunian',
            'slug' => 'penataan-panel-listrik-bukit-darmo',
            'description' => 'Redistribusi beban arus listrik 3-fase, penggantian MCB aus, dan perawatan cuci berkala 6 unit AC inverter rumah tinggal.',
            'client' => 'Bapak Hartono Tanujaya',
            'location' => 'Bukit Darmo Golf, Surabaya Barat',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1517646287270-a5a9ca602e5c?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        // Pengangkutan Sampah Projects
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
                'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Manajemen Pembuangan Sampah Basah & Kering Kafe Komersial',
            'slug' => 'sampah-komersial-resto-gubeng',
            'description' => 'Pengangkutan harian limbah sisa makanan, ampas kopi, dan kardus kemasan F&B dengan armada pikap tertutup sanitasi tinggi.',
            'client' => 'Manajemen Kafe & Roastery Kroma',
            'location' => 'Gubeng, Surabaya Pusat',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1528323273322-d81458248d40?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Evakuasi Puing Sisa Bongkaran Tembok & Puing Renovasi Hunian',
            'slug' => 'evakuasi-puing-kebayoran-baru',
            'description' => 'Evakuasi 2 unit dump truck puing semen, pecahan keramik, dan kayu bongkaran rumah tinggal hingga sapuan akhir bersih rapi.',
            'client' => 'Bapak Aditya Nugraha',
            'location' => 'Kebayoran Baru, Jakarta Selatan',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1590496793929-36417d3117de?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=1200&q=80',
            ],
            'is_featured' => true,
        ]);

        // Video Highlight Reels Projects (1 Distinct Video per Service)
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Aksi Cepat Tim Home Cleaning KOOTA SERVICE',
            'slug' => 'video-home-cleaning-koota',
            'description' => 'Transformasi rumah bersih berkilau dan bebas tungau bersama tim profesional Koota Services.',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80',
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
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pengangkutan Sampah',
            'title' => 'Armada Truk Pengangkutan Sampah Terjadwal & Higienis',
            'slug' => 'video-pengangkutan-sampah-koota',
            'description' => 'Pengangkutan sampah rutin tertib tanpa bau ceceran dengan armada tertutup ramah lingkungan.',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/shorts/aqz-KE-bpKQ',
            'video_type' => 'shorts',
            'is_video' => true,
            'is_featured' => true,
        ]);

        // 5. Blog Posts Data (Each with Distinct Topic-Specific Photo)
        Post::create([
            'title' => '5 Tips Menjaga Kebersihan dan Higienitas Rumah Agar Bebas Tungau & Alergen',
            'slug' => '5-tips-kebersihan-rumah-bebas-tungau',
            'category' => 'Home Cleaning',
            'excerpt' => 'Menjaga rumah tetap sehat bukan sekadar menyapu dan mengepel. Pelajari langkah deep cleaning rutin untuk mencegah tungau kasur dan alergen.',
            'content' => '<p>Kesehatan keluarga berawal dari kualitas udara dan kebersihan sudut rumah Anda. Melalui jadwal pembersihan rutin, sedot tungau kasur berkala, dan penggunaan disinfektan aman, rumah Anda akan selalu menjadi tempat istirahat yang aman dan menyegarkan.</p>',
            'image' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Perbedaan Deep Cleaning vs General Cleaning: Kapan Waktu yang Tepat?',
            'slug' => 'perbedaan-deep-cleaning-vs-general-cleaning',
            'category' => 'Home Cleaning',
            'excerpt' => 'Pahami kapan rumah Anda cukup dibersihkan secara harian atau membutuhkan chemical khusus dan penanganan deep cleaning tuntas.',
            'content' => '<p>Pembersihan menyeluruh (deep cleaning) membersihkan sudut-sudut mati, celah furnitur, serta sanitasi mendalam yang tidak terjangkau pembersihan biasa.</p>',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(2),
        ]);

        Post::create([
            'title' => 'Rahasia Membersihkan Kerak Kamar Mandi Membandel dan Kaca Buram',
            'slug' => 'rahasia-membersihkan-kerak-kamar-mandi-kaca-buram',
            'category' => 'Home Cleaning',
            'excerpt' => 'Panduan membersihkan kerak air dan jamur membandel di kamar mandi menggunakan teknik pembersihan profesional aman keramik.',
            'content' => '<p>Kerak kalsium dan sabun yang menumpuk bertahun-tahun membutuhkan chemical pembersih khusus dengan pH seimbang agar nat keramik tidak rusak.</p>',
            'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(6),
        ]);

        Post::create([
            'title' => 'Panduan Perawatan Rumah: Cara Cepat Deteksi Pipa Bocor dan Masalah Kelistrikan',
            'slug' => 'panduan-deteksi-pipa-bocor-listrik',
            'category' => 'Perbaikan Rumah',
            'excerpt' => 'Kenali tanda-tanda awal kebocoran air tersembunyi dan indikasi korsleting listrik sebelum merusak struktur plafon serta dinding rumah Anda.',
            'content' => '<p>Bercak lembap pada dinding atau tagihan listrik yang tiba-tiba membengkak sering kali menjadi pertanda adanya masalah instalasi. Tim tukang ahli Koota Services siap membantu melakukan inspeksi menyeluruh.</p>',
            'image' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => true,
            'published_at' => now()->subDays(3),
        ]);

        Post::create([
            'title' => 'Tips Antisipasi Musim Hujan: Cegah Dak Bocor dan Rembesan Dinding Hunian',
            'slug' => 'tips-antisipasi-musim-hujan-cegah-dak-bocor',
            'category' => 'Perbaikan Rumah',
            'excerpt' => 'Langkah preventif memeriksa talang air, waterproofing dak beton, dan perbaikan retak rambut dinding sebelum curah hujan tinggi tiba.',
            'content' => '<p>Pemeriksaan berkala pada waterproofing talang dan sambungan atap mencegah kerusakan plafon gypsum yang mahal biaya perbaikannya.</p>',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(7),
        ]);

        Post::create([
            'title' => 'Panduan Memilih Tukang Bangunan Handal dan Transparansi Biaya Renovasi',
            'slug' => 'panduan-memilih-tukang-bangunan-handal-renovasi',
            'category' => 'Perbaikan Rumah',
            'excerpt' => 'Hindari renovasi mangkrak dan pembengkakan biaya dengan memahami sistem kerja tukang terstandarisasi dan bergaransi resmi.',
            'content' => '<p>Tukang profesional selalu memberikan estimasi material dan waktu kerja yang terukur sebelum pekerjaan dimulai.</p>',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(10),
        ]);

        Post::create([
            'title' => 'Kelola Sampah Rumah Tangga Secara Teratur: Bebas Bau dan Ramah Lingkungan',
            'slug' => 'kelola-sampah-rumah-tangga-bebas-bau',
            'category' => 'Pengangkutan Sampah',
            'excerpt' => 'Tips memilah sampah organik dapur dan jadwal pengangkutan sampah teratur agar lingkungan perumahan tetap asri, higienis, dan sehat.',
            'content' => '<p>Pengangkutan sampah yang terjadwal mencegah penumpukan limbah dan perkembangbiakan lalat serta bakteri berbahaya di pekarangan rumah Anda.</p>',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => true,
            'published_at' => now()->subDays(5),
        ]);

        Post::create([
            'title' => 'Sistem Pemilahan Sampah Organik dan Anorganik untuk Lingkungan Lebih Sehat',
            'slug' => 'sistem-pemilahan-sampah-organik-anorganik',
            'category' => 'Pengangkutan Sampah',
            'excerpt' => 'Cara mudah memisahkan sampah basah dapur dan kemasan daur ulang untuk mencegah bau menyengat serta mempermudah daur ulang.',
            'content' => '<p>Pemisahan sejak dari tempat sampah rumah membuat lingkungan lebih bersih dan mencegah timbulan bau tak sedap di sekitar tempat tinggal.</p>',
            'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(8),
        ]);

        Post::create([
            'title' => 'Layanan Evakuasi Puing Bangunan dan Sampah Komersial Terjadwal di Perkotaan',
            'slug' => 'layanan-evakuasi-puing-sampah-komersial',
            'category' => 'Pengangkutan Sampah',
            'excerpt' => 'Solusi bersih tuntas sisa puing renovasi dan sampah kafe atau ruko dengan armada truk tertutup yang higienis dan terstandar.',
            'content' => '<p>Puing bangunan tidak boleh dibuang sembarangan. KOOTA Service menyediakan layanan evakuasi terpadu hingga area kembali bersih rapi.</p>',
            'image' => 'https://images.unsplash.com/photo-1590496793929-36417d3117de?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => false,
            'published_at' => now()->subDays(12),
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
