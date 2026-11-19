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

                // 4. Projects Portfolio Data (3 distinct projects for every category, 45 total + 3 video reels)
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Rumah Residensial',
            'title' => 'Deep Cleaning & Sanitasi Menyeluruh Hunian 2 Lantai',
            'slug' => 'deep-cleaning-sanitasi-hunian-2-lantai',
            'description' => 'Pembersihan menyeluruh seluruh kamar, kaca jendela tinggi, lantai marmer, dan sanitasi ruang keluarga hunian dua lantai.',
            'client' => 'Bapak Hendra Gunawan',
            'location' => 'Citraland, Surabaya',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Rumah Residensial',
            'title' => 'General Cleaning & Disinfeksi Menyeluruh Rumah Klasik',
            'slug' => 'general-cleaning-disinfeksi-rumah-klasik',
            'description' => 'Layanan perawatan kebersihan harian intensif, poles lantai granit, pembersihan area dapur, dan sterilisasi udara kamar tidur utama.',
            'client' => 'Ibu Maya Rosalina',
            'location' => 'Darmo, Surabaya Pusat',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Rumah Residensial',
            'title' => 'Pembersihan Total Pekarangan & Interior Rumah Tinggal',
            'slug' => 'pembersihan-total-pekarangan-interior-rumah',
            'description' => 'Pembersihan kerak teras luar, kisi-kisi jendela kaca, garasi mobil, serta penataan ulang higienitas ruang keluarga.',
            'client' => 'Bapak Agus Wicaksono',
            'location' => 'Puri Surya Jaya, Sidoarjo',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Apartemen & Studio',
            'title' => 'Pembersihan & Sterilisasi Higienis Unit Apartemen 2-Bedroom',
            'slug' => 'pembersihan-sterilisasi-unit-apartemen-2br',
            'description' => 'Pembersihan intensif unit apartemen modern, deep clean kitchen sink berminyak, kabinet, kamar mandi, dan kaca balkon tinggi.',
            'client' => 'Ibu Olivia Hartanto',
            'location' => 'Pakuwon Mall Mansion, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Apartemen & Studio',
            'title' => 'Deep Cleaning Unit Studio Minimalis Siap Huni',
            'slug' => 'deep-cleaning-unit-studio-minimalis',
            'description' => 'Layanan express turn-over cleaning untuk unit studio sewa, mencakup sedot debu matras, pembersihan microwave, dan sanitasi toilet.',
            'client' => 'Bapak Kevin Sanjaya',
            'location' => 'Benson Tower, Surabaya Barat',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Apartemen & Studio',
            'title' => 'Sanitasi Menyeluruh Penthouse & Balkon Kaca Panoramik',
            'slug' => 'sanitasi-menyeluruh-penthouse-balkon-kaca',
            'description' => 'Pembersihan kaca tempered void luar ruangan, poles lantai marmer living room, dan pembersihan kisi AC sentral penthouse.',
            'client' => 'Bapak Richard Tan',
            'location' => 'Waterplace Residence, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Kerak Kamar Mandi',
            'title' => 'Restorasi Kaca Buram & Kerak Keramik Kamar Mandi Utama',
            'slug' => 'restorasi-kaca-kerak-kamar-mandi-utama',
            'description' => 'Penghilangan kerak kalsium menahun, pemolesan kaca shower buram, dan sanitasi nat keramik kamar mandi master suite.',
            'client' => 'Ibu Stephanie Wijaya',
            'location' => 'Graha Family, Surabaya',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Kerak Kamar Mandi',
            'title' => 'Pembersihan Kerak Kalsium & Nat Lantai Kamar Mandi Marmer',
            'slug' => 'pembersihan-kerak-kalsium-nat-lantai-marmer',
            'description' => 'Pengangkatan noda air keras pada bathtub, wastafel marmer, kloset duduk, dan penggantian nat anti-lumut higienis.',
            'client' => 'Bapak Daniel Subekti',
            'location' => 'Bukit Darmo Golf, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Kerak Kamar Mandi',
            'title' => 'Penghilangan Jamur Kaca Shower & Sanitasi Sanitair Villa',
            'slug' => 'penghilangan-jamur-kaca-shower-villa',
            'description' => 'Restorasi partisi kaca shower room berjamur dan chemical descaling pada shower head kuningan villa privat.',
            'client' => 'Ibu Made Ayu Dewi',
            'location' => 'Sanur, Bali',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1620626011761-996317b8d101?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Sedot Tungau Kasur & Sofa',
            'title' => 'Hydro-Vacuum Sedot Tungau Kasur, Karpet & Sofa Kain',
            'slug' => 'hydro-vacuum-sedot-tungau-kasur-sofa',
            'description' => 'Pembersihan intensif hydro vacuum alergen kasur king size, sofa ruang keluarga, dan karpet wol premium di hunian Pakuwon City.',
            'client' => 'Bapak Dennis Setiawan',
            'location' => 'Pakuwon City, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Sedot Tungau Kasur & Sofa',
            'title' => 'Pembersihan Tungau Sofa L-Shape & Karpet Wol Ruang Tamu',
            'slug' => 'pembersihan-tungau-sofa-l-shape-karpet',
            'description' => 'Ekstraksi debu mikro dan tungau pada bahan fabric sofa modular, kursi makan bernoda, dan karpet turki ruang tamu.',
            'client' => 'Ibu Cindy Permata',
            'location' => 'Kebayoran Baru, Jakarta',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Sedot Tungau Kasur & Sofa',
            'title' => 'Ekstraksi Alergen Matras Anak & Daybed Keluarga Berkala',
            'slug' => 'ekstraksi-alergen-matras-anak-daybed',
            'description' => 'Sanitasi uap panas anti-bakteri pada matras hypoallergenic anak, bantal bulu angsa, dan daybed santai keluarga.',
            'client' => 'Ibu dr. Rina Marlina',
            'location' => 'Araya, Malang',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Pasca Renovasi',
            'title' => 'Pembersihan Menyeluruh Debu Konstruksi Pasca Renovasi',
            'slug' => 'pembersihan-menyeluruh-debu-konstruksi',
            'description' => 'Pembersihan total debu semen halus, sisa cat di lantai granit, dan serpihan gypsum hingga rumah siap dihuni dengan higienis.',
            'client' => 'Bapak Dimas Pratama',
            'location' => 'Araya, Malang',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Pasca Renovasi',
            'title' => 'Pembersihan Sisa Semen, Cat & Gypsum Hunian Baru',
            'slug' => 'pembersihan-sisa-semen-cat-gypsum-hunian',
            'description' => 'Scrubbing mesin lantai porselen, pembersihan profil pintu kayu, serta pengangkatan bekas lem stiker kaca bangunan baru.',
            'client' => 'Bapak Ir. Bambang Tri',
            'location' => 'Citraland Driyorejo, Gresik',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Pembersihan Pasca Renovasi',
            'title' => 'Poles Lantai Granit & Pembersihan Kaca Kusen Pasca Bangun',
            'slug' => 'poles-lantai-granit-kaca-kusen-pasca-bangun',
            'description' => 'Kristalisasi lantai marmer kusam pascarenovasi, pembersihan cat kusen aluminium, dan pembersihan sanitasi dapur bersih.',
            'client' => 'Ibu Ratna Juwita',
            'location' => 'Kertajaya Indah, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Pipa & Saluran',
            'title' => 'Deteksi Presisi & Penggantian Jalur Pipa Air Bocor Dalam Dinding',
            'slug' => 'deteksi-pipa-air-bocor-dalam-dinding',
            'description' => 'Pemeriksaan kebocoran pipa air bersih dengan sensor tekanan tanpa pembongkaran berlebih dan plester ulang rapi.',
            'client' => 'Bapak Irwan Susanto',
            'location' => 'Darmo Permai, Surabaya',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Pipa & Saluran',
            'title' => 'Pelancaran Saluran Pembuangan Mampet & Pipa PVC Baru',
            'slug' => 'pelancaran-saluran-mampet-pipa-pvc',
            'description' => 'Pembersihan pipa pembuangan lemak dapur tersumbat dengan spiral pipe cleaner dan penggantian fitting pipa uPVC tebal.',
            'client' => 'Ibu Farida Hanum',
            'location' => 'Rungkut, Surabaya Timur',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Pipa & Saluran',
            'title' => 'Instalasi Pompa Pendorong Booster & Pipa Tandon Air Bersih',
            'slug' => 'instalasi-pompa-booster-tandon-air',
            'description' => 'Pemasangan pompa otomatis pendorong air lantai atas, bypass pipa filter air bersih, dan pembersihan tandon stainless.',
            'client' => 'Bapak Arif Rahman',
            'location' => 'Puri Harmoni, Malang',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Kelistrikan & Panel Listrik',
            'title' => 'Penataan Ulang Jalur Panel Listrik MCB & Servis Kelistrikan',
            'slug' => 'penataan-panel-listrik-mcb-servis',
            'description' => 'Redistribusi beban arus listrik 3-fase, penggantian MCB aus, perapian jalur kabel panel, dan instalasi fitting lampu hunian.',
            'client' => 'Bapak Hartono Tanujaya',
            'location' => 'Bukit Darmo Golf, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Kelistrikan & Panel Listrik',
            'title' => 'Perbaikan Korsleting & Penggantian Jalur Kabel Standar SNI',
            'slug' => 'perbaikan-korsleting-kabel-sni',
            'description' => 'Pelacakan titik korsleting dalam dinding akibat gigitan tikus, penggantian kabel NYM tembaga murni, dan isolasi pipa conduit.',
            'client' => 'Bapak Surya Kencana',
            'location' => 'Kebayoran Baru, Jakarta',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Kelistrikan & Panel Listrik',
            'title' => 'Pemasangan Titik Lampu Downlight & Stop Kontak Arde',
            'slug' => 'pemasangan-lampu-downlight-stop-kontak',
            'description' => 'Instalasi 18 titik lampu warm white recessed ceiling, saklar ganda modern, dan penambahan stop kontak arde pengaman anak.',
            'client' => 'Ibu Felicia Gunawan',
            'location' => 'Graha Family, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1517646287270-a5a9ca602e5c?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Atap & Bocor',
            'title' => 'Waterproofing Dak Beton & Perbaikan Talang Atap Bocor',
            'slug' => 'waterproofing-dak-talang-atap-bocor',
            'description' => 'Pelapisan membran waterproofing elastis pada dak beton dan penggantian talang seng bocor untuk mencegah rembesan saat hujan lebat.',
            'client' => 'Bapak Hendra Gunawan',
            'location' => 'BSD, Tangerang',
            'completion_date' => 'Juli 2024',
            'image' => 'https://images.unsplash.com/photo-1632759145351-1d592919f522?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Atap & Bocor',
            'title' => 'Penggantian Genteng Retak & Tambal Talang Seng Anti Bocor',
            'slug' => 'penggantian-genteng-retak-talang-seng',
            'description' => 'Pemeriksaan struktur kuda-kuda atap kayu, reposisi genteng keramik geser, dan aplikasi serat fiber poliuretan pada sudut nok atap.',
            'client' => 'Bapak Wahyu Hidayat',
            'location' => 'Ijen Boulevard, Malang',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1590381105924-c72589b9ef3f?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Perbaikan Atap & Bocor',
            'title' => 'Pelapisan Anti Rembes Dinding Luar & Flashing Seng Atap',
            'slug' => 'pelapisan-anti-rembes-dinding-flashing',
            'description' => 'Injeksi semen elastis pada retak rambut dinding eksterior lantai dua dan pemasangan flashing seng galvanis penutup sambungan tembok.',
            'client' => 'Ibu Veronica S.',
            'location' => 'Citraland, Surabaya',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Servis AC Rumah',
            'title' => 'Servis Cuci Berkala & Perbaikan AC Inverter Tidak Dingin',
            'slug' => 'servis-cuci-ac-inverter-tidak-dingin',
            'description' => 'Perawatan cuci chemical evaporator AC, pembersihan blower indoor/outdoor, pengisian freon R32, dan perbaikan keluhan air menetes.',
            'client' => 'Ibu Hani Syarifah',
            'location' => 'Sanur, Bali',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Servis AC Rumah',
            'title' => 'Penanganan Kebocoran Air Evaporator & Pengisian Freon AC',
            'slug' => 'penanganan-kebocoran-air-evaporator-ac',
            'description' => 'Pembersihan talang pembuangan air AC berlendir, flushing selang kondensasi mampet, dan perbaikan getaran kompresor outdoor.',
            'client' => 'Bapak Gede Sukarma',
            'location' => 'Seminyak, Bali',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Servis AC Rumah',
            'title' => 'Maintenance Rutin 6 Unit AC Split Hunian Keluarga',
            'slug' => 'maintenance-rutin-6-unit-ac-split',
            'description' => 'Pengecekan arus ampere listrik kompresor, desinfeksi filter anti-bakteri, dan uji temperatur dingin ruang kamar hunian.',
            'client' => 'Bapak Chandra Kusuma',
            'location' => 'Pakuwon Indah, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1581244277943-fe4a9c777189?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Pengecatan & Plafon',
            'title' => 'Perbaikan Plafon Gypsum Jebol & Pengecatan Ulang Interior',
            'slug' => 'perbaikan-plafon-gypsum-pengecatan-interior',
            'description' => 'Pemasangan rangka hollow baru dan kompon plafon gypsum rapi, dilanjutkan plamir serta pengecatan premium dua lapis dinding rumah tinggal.',
            'client' => 'Bapak Denny R.',
            'location' => 'Ijen Boulevard, Malang',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Pengecatan & Plafon',
            'title' => 'Pengecatan Weatherproof Dinding Eksterior Rumah 2 Lantai',
            'slug' => 'pengecatan-weatherproof-dinding-eksterior',
            'description' => 'Pengerokan cat lama mengelupas, aplikasi sealer alkali tahan cuaca ekstrim, dan pengecatan cat pelindung dinding luar anti-jamur.',
            'client' => 'Bapak Rudy Susanto',
            'location' => 'Darmo Permai, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $handymanService->id,
            'category_name' => 'Pengecatan & Plafon',
            'title' => 'Pemasangan Partisi Gypsum & Drop Ceiling Ruang Tamu',
            'slug' => 'pemasangan-partisi-gypsum-drop-ceiling',
            'description' => 'Pembuatan sekat ruangan partisi dua muka peredam suara dan drop ceiling aksen lampu tersembunyi ruang pertemuan keluarga.',
            'client' => 'Ibu Anita Wibowo',
            'location' => 'Puri Surya Jaya, Sidoarjo',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Residensial Terjadwal',
            'title' => 'Pengangkutan Rutin Terpadu Kawasan Klaster Puri Harmoni',
            'slug' => 'pengangkutan-rutin-klaster-puri-harmoni',
            'description' => 'Pengangkutan sampah rumah tangga terjadwal 3x seminggu untuk 250 unit rumah tinggal dengan armada truk tertutup ramah lingkungan.',
            'client' => 'Pengurus RT/RW Klaster Puri Harmoni',
            'location' => 'Malang, Jawa Timur',
            'completion_date' => 'Agustus 2024',
            'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Residensial Terjadwal',
            'title' => 'Jadwal Pengangkutan Sampah Warga Perumahan 3x Seminggu',
            'slug' => 'jadwal-pengangkutan-sampah-warga-perumahan',
            'description' => 'Pengelolaan sampah terjadwal tertib, penyediaan tong sampah pilah organik dan anorganik, serta pembersihan area bak sampah lingkungan.',
            'client' => 'Paguyuban Warga Harmoni Indah',
            'location' => 'Sidoarjo, Jawa Timur',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Residensial Terjadwal',
            'title' => 'Pengangkutan Sampah Rumah Tangga Armada Tertutup Bersih',
            'slug' => 'pengangkutan-sampah-armada-tertutup-bersih',
            'description' => 'Pengambilan sampah rumah tangga on-time tanpa ceceran air lindi di jalanan perumahan, dijamin bebas bau menyengat.',
            'client' => 'Ketua Lingkungan Rungkut Asri',
            'location' => 'Rungkut, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Komersial Kafe & Resto',
            'title' => 'Manajemen Pembuangan Sampah Basah & Kering Kafe Komersial',
            'slug' => 'pembuangan-sampah-kafe-komersial-gubeng',
            'description' => 'Pengangkutan harian limbah sisa makanan, ampas kopi, dan kardus kemasan F&B dengan armada pikap tertutup sanitasi tinggi.',
            'client' => 'Manajemen Kafe & Roastery Kroma',
            'location' => 'Gubeng, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Komersial Kafe & Resto',
            'title' => 'Pengangkutan Harian Limbah Restoran & Dapur Higienis',
            'slug' => 'pengangkutan-harian-limbah-restoran-dapur',
            'description' => 'Evakuasi sampah basah sisa dapur pagi dan malam hari untuk menjaga standar higienitas sanitasi restoran dan lolos audit kebersihan.',
            'client' => 'Bale Rasa Nusantara Restaurant',
            'location' => 'Seminyak, Bali',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1528323273322-d81458248d40?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Komersial Kafe & Resto',
            'title' => 'Evakuasi Kardus Kemasan & Ampas Kopi Coffee Shop Terjadwal',
            'slug' => 'evakuasi-kardus-ampas-kopi-coffee-shop',
            'description' => 'Penjemputan teratur limbah kering karton, botol sirup, dan sampah daur ulang gerai minuman kekinian secara tertib.',
            'client' => 'Kopi Titik Temu Kemang',
            'location' => 'Kebayoran Baru, Jakarta',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Puing Sisa Renovasi Bangunan',
            'title' => 'Evakuasi Puing Sisa Bongkaran Tembok & Puing Renovasi Hunian',
            'slug' => 'evakuasi-puing-bongkaran-tembok-kebayoran',
            'description' => 'Evakuasi 2 unit dump truck puing semen, pecahan keramik, dan kayu bongkaran rumah tinggal hingga sapuan akhir bersih rapi.',
            'client' => 'Bapak Aditya Nugraha',
            'location' => 'Kebayoran Baru, Jakarta',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1590496793929-36417d3117de?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Puing Sisa Renovasi Bangunan',
            'title' => 'Pembersihan & Angkut Puing Keramik Sisa Pembongkaran Lantai',
            'slug' => 'pembersihan-angkut-puing-keramik-lantai',
            'description' => 'Pengangkutan serpihan batu bata, adukan semen mengering, dan bongkaran dinding sekat ruko komersial ke tempat pembuangan resmi.',
            'client' => 'Bapak Surya Dharma',
            'location' => 'Darmo, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Puing Sisa Renovasi Bangunan',
            'title' => 'Evakuasi 2 Dump Truck Puing Cor Semen Pasca Renovasi Rumah',
            'slug' => 'evakuasi-2-dump-truck-puing-cor-semen',
            'description' => 'Pemuatan puing genteng lama, dak semen, dan besi beton bekas proyek renovasi hunian dengan tenaga angkut terlatih.',
            'client' => 'Bapak Ir. Johanes Handoko',
            'location' => 'Citraland, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pembuangan Barang Bekas Besar',
            'title' => 'Evakuasi Perabot Besar & Kasur Bekas Rusak On-Demand',
            'slug' => 'evakuasi-perabot-besar-kasur-bekas-ondemand',
            'description' => 'Layanan angkut furnitur lapuk, kasur springbed rusak, lemari kayu besar, dan perlengkapan rumah tangga tak terpakai secara aman ke TPA resmi.',
            'client' => 'Bapak Denny R.',
            'location' => 'Soekarno Hatta, Malang',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pembuangan Barang Bekas Besar',
            'title' => 'Pembuangan Lemari Kayu Lapuk & Sofa Rusak Pindahan Rumah',
            'slug' => 'pembuangan-lemari-kayu-lapuk-sofa-rusak',
            'description' => 'Bongkar dan evakuasi lemari pakaian 3 pintu yang rapuh, meja makan usang, dan sofa jebol yang tidak dibawa saat pindahan rumah.',
            'client' => 'Ibu Laksmi Paramita',
            'location' => 'Pakuwon City, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1540518614846-7ede433c4ef4?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Pembuangan Barang Bekas Besar',
            'title' => 'Angkut Springbed Bekas & Meja Kantor Usang ke TPA Resmi',
            'slug' => 'angkut-springbed-bekas-meja-kantor-usang',
            'description' => 'Pengangkutan perabot kantor usang, partisi meja kerja lama, dan kasur latex rusak tanpa mencemari lingkungan pemukiman.',
            'client' => 'PT Cipta Sarana Graha',
            'location' => 'Graha Family, Surabaya',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Acara & Pameran',
            'title' => 'Pembersihan & Pengangkutan Sampah Event Komersial & Pameran',
            'slug' => 'pembersihan-sampah-event-komersial-pameran',
            'description' => 'Penanganan sampah volume besar pasca-acara pameran, dekorasi sementara, sisa katering, dan kardus booth pameran dalam waktu semalam.',
            'client' => 'Event Organizer Kreasi Nusantara',
            'location' => 'Grand City Hall, Surabaya',
            'completion_date' => 'November 2024',
            'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => true,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Acara & Pameran',
            'title' => 'Evakuasi Sampah Acara Pernikahan & Tenda Outdoor Malam Hari',
            'slug' => 'evakuasi-sampah-acara-pernikahan-tenda',
            'description' => 'Pembersihan cepat botol minuman, kardus katering, sisa makanan prasmanan, dan dekorasi bunga resepsi pernikahan outdoor villa.',
            'client' => 'Keluarga Bpk. Putu Sudharma',
            'location' => 'Sanur, Bali',
            'completion_date' => 'Oktober 2024',
            'image' => 'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        Project::create([
            'service_id' => $wasteService->id,
            'category_name' => 'Sampah Acara & Pameran',
            'title' => 'Pembersihan Sampah Booth & Sisa Material Expo Kebersihan',
            'slug' => 'pembersihan-sampah-booth-expo-kebersihan',
            'description' => 'Evakuasi limbah triplek, spanduk vinyl, plastik pelapis, dan kardus display booth expo industri fasilitas gedung.',
            'client' => 'Asosiasi Pengelola Gedung Indonesia',
            'location' => 'Surabaya Barat, Jawa Timur',
            'completion_date' => 'September 2024',
            'image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1200&q=80',
            'is_video' => false,
            'is_featured' => false,
        ]);

        // Video Highlight Reels Projects (1 Distinct Video per Service)
        Project::create([
            'service_id' => $cleaningService->id,
            'category_name' => 'Home Cleaning',
            'title' => 'Aksi Cepat Tim Home Cleaning KOOTA SERVICE',
            'slug' => 'video-home-cleaning-koota',
            'description' => 'Transformasi rumah bersih berkilau dan bebas tungau bersama tim profesional Koota Services.',
            'image' => 'https://images.unsplash.com/photo-1585421514284-efb74c2b69ba?auto=format&fit=crop&w=1200&q=80',
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
            'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1200&q=80',
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
            'image' => 'https://images.unsplash.com/photo-1503596476-1c12a8ba09a9?auto=format&fit=crop&w=1200&q=80',
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
