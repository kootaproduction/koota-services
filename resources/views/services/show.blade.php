@extends('layouts.app')

@section('title', __($service->title) . ' - KOOTA SERVICE')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-100 py-3 text-xs text-gray-500">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[#820003] transition-colors">{{ __('Home') }}</a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#820003] transition-colors">{{ __('Layanan') }}</a>
            <span class="text-gray-300">/</span>
            <span class="font-bold text-gray-900">{{ __($service->title) }}</span>
        </div>
    </div>

    @php
        $slug = $service->slug;
        $isCleaning = ($slug === 'home-cleaning' || $slug === 'cleaning-service');
        $isTukang = ($slug === 'perbaikan-rumah' || $slug === 'jasa-tukang-perbaikan-dan-renovasi' || $slug === 'jasa-tukang');
        $isWaste = ($slug === 'pengangkutan-sampah');

        // Dynamic Content Setup following the Booth Landing Page Template
        if ($isCleaning) {
            $heroHook = "Ingin Rumah Bersih, Higienis & Sehat Dengan Standar Premium?";
            $heroSubPills = "Pembersihan Menyeluruh, Pembersihan Harian, Sedot Tungau Kasur & Sofa, Sterilisasi Ruangan, Pasca Renovasi";
            $credTitle = "Vendor Pembersihan Rumah Premium & Terpercaya Untuk Tingkatkan Kualitas Hidup Anda";
            $credP1 = "Kebersihan rumah adalah investasi kesehatan keluarga. Kami memastikan pembersihan dan sanitasi hunian Anda memancarkan kesegaran serta kenyamanan maksimal sejak detik pertama Anda melangkah masuk.";
            $credP2 = "Standar kualitas kami sangat jelas. Ketelitian pengerjaan, penggunaan cairan pembersih ramah lingkungan (food-grade safe), dan peralatan modern seperti hydro vacuum HEPA adalah prioritas utama. Tim terlatih kami siap menghadirkan hunian yang higienis, wangi, dan bebas alergen.";
            
            $philTitle = "Bukan sekadar membersihkan. Kami membangun kenyamanan & higienitas keluarga Anda.";
            $pillar1 = ["title" => "Higienis Total & Bebas Alergen", "desc" => "Basmi tungau, debu mikro, jamur, dan bakteri penyebab alergi secara tuntas."];
            $pillar2 = ["title" => "Formula Ramah Lingkungan & Aman Keluarga", "desc" => "Menggunakan formula pembersih bersertifikasi aman untuk pernapasan dan kulit sensitif."];
            $pillar3 = ["title" => "Tenaga Kerja Terlatih & Terpercaya", "desc" => "Tim terlatih dengan background check ketat, ramah, jujur, dan ber-SOP tinggi."];
            $pillar4 = ["title" => "Fleksibel untuk Hunian & Properti", "desc" => "Cocok untuk rumah tapak, apartemen, ruko bisnis, villa, hingga kantor perwakilan."];

            $whyLead = "Kami memahami bahwa keluarga dan properti Anda membutuhkan perawatan higienis terbaik yang mengutamakan kesehatan dan privasi tanpa kompromi.";
            $whyCards = [
                ["title" => "Pengalaman 5+ Tahun di Industri Perawatan Fasilitas", "desc" => "Dari ratusan hunian residensial hingga kantor ternama – kami hadirkan standar kebersihan prima tanpa cela."],
                ["title" => "Solusi Khusus Sesuai Kondisi & Luas Rumah", "desc" => "Bukan pembersihan ala kadarnya — kami susun checklist detail sesuai kebutuhan spesifik setiap ruangan Anda."],
                ["title" => "Peralatan Sedot Debu Uap & Ekstraktor Modern", "desc" => "Teknologi penyedot debu basah-kering dan ekstraktor modern untuk hasil pembersihan serat kain terdalam."],
                ["title" => "Pengerjaan Cepat & Tepat Waktu – Jadwal Aman!", "desc" => "Kami sangat menghargai waktu Anda. Tim datang tepat waktu dan bekerja efektif sesuai durasi yang disepakati."],
                ["title" => "Garansi Kebersihan Penuh & Layanan Siaga", "desc" => "Bukan sekadar datang menyapu — jika ada sudut ruangan yang belum sesuai kesepakatan, kami bersihkan ulang gratis."],
                ["title" => "Layanan Konsultasi Cepat & Tanpa Biaya Tersembunyi", "desc" => "Estimasi harga transparan sejak awal berdasarkan luas ruangan, tanpa ada biaya tambahan mendadak."]
            ];

            $narrativeHeading = "Standar Higienis Premium, Eksekusi Presisi, dan Siap Ditempati";
            $narrativeP1 = "Kami tidak hanya membuat lantai dan perabotan Anda terlihat bersih berkilau. Kami merancangnya menjadi lingkungan yang menyehatkan, bebas kuman, dan memberikan ketenangan batin saat Anda beristirahat di rumah.";
            $narrativeP2 = "Fokuskan waktu berharga Anda untuk berkumpul bersama keluarga atau menjalankan karir. Serahkan urusan pembersihan menyeluruh sepenuhnya kepada kami. Tim kami menangani setiap sudut sempit, nat keramik, kerak toilet, dan sela sofa dengan tingkat ketelitian tinggi.";
            $narrativeP3 = "Didukung oleh staf pelaksana on-site yang jujur dan berdedikasi, kami memastikan proses pembersihan berjalan tertib dan aman bagi seluruh perabotan berharga Anda.";

            $categories = ["Rumah Residensial", "Apartemen & Studio", "Pembersihan Kerak Kamar Mandi", "Sedot Tungau Kasur & Sofa", "Pembersihan Pasca Renovasi"];
            $seeMoreText = "Lihat Dokumentasi Pembersihan Rumah";

            $testimonials = [
                ["initials" => "CK", "name" => "Citra Kirana", "role" => "Pembersihan Menyeluruh Rumah", "loc" => "Citraland, Surabaya", "text" => "Sempat trauma dengan jasa cleaning lain yang hasilnya asal-asalan. Tapi di Koota Service, kerak kamar mandi yang membandel bertahun-tahun bisa kinclong kembali! Timnya sangat sopan, rapi, dan wanginya tahan lama."],
                ["initials" => "DP", "name" => "Dimas Pratama", "role" => "Pembersihan Pasca Renovasi", "loc" => "Puri Surya Jaya, Sidoarjo", "text" => "Pembersihan pasca renovasi rumah saya sangat terbantu. Debu semen halus dan cipratan cat di lantai terangkat sempurna tanpa menggores granit. Rumah langsung siap dihuni tanpa perlu repot."],
                ["initials" => "SL", "name" => "Sophia Latjuba", "role" => "Sedot Tungau Kasur & Sofa", "loc" => "Pakuwon City, Surabaya", "text" => "Investasi terbaik untuk kesehatan anak saya yang punya alergi debu. Air hasil sedot tungau kasur dan sofa sampai hitam pekat! Setelah dibersihkan Koota, tidur jadi jauh lebih pulas."],
                ["initials" => "DR", "name" => "Denny R.", "role" => "Pembersihan Harian Rutin", "loc" => "Araya, Malang", "text" => "Sangat puas dengan kedisiplinan tim Koota Services. Datang tepat waktu dengan peralatan lengkap. Dapur dan area service yang berminyak disikat bersih sampai ke sela-sela terkecil."],
                ["initials" => "HS", "name" => "Hani Syarifah", "role" => "Pembersihan Mendalam Hunian", "loc" => "Canggu, Bali", "text" => "Fokus saya jadi bisa sepenuhnya untuk bekerja, karena urusan kebersihan rumah sudah di-handle sempurna oleh Koota. Peralatannya modern dan formulanya ramah lingkungan, tidak menyengat di hidung."],
                ["initials" => "RH", "name" => "Rian Hermawan", "role" => "Pembersihan Kantor & Rumah", "loc" => "Kebayoran Baru, Jakarta", "text" => "Pilihan tepat untuk perawatan berkala properti kami. Timnya sangat detail memeriksa sudut-sudut mati yang jarang terjangkau. Pelayanan after-sales dan garansinya terbukti nyata!"]
            ];

            $ctaHook = "Tingkatkan kebersihan, higienitas, dan kenyamanan hunian Anda bersama tim ahli!";
            
            $faqsList = [
                ["q" => "01 Apa perbedaan Pembersihan Harian (Daily) dan Pembersihan Menyeluruh (Deep Cleaning)?", "a" => "Pembersihan Harian mencakup pembersihan rutin seperti menyapu, mengepel, mengelap debu perabot, dan pembersihan permukaan. Sedangkan Pembersihan Menyeluruh (Deep Cleaning) mencakup pembersihan intensif dan tuntas hingga kerak membandel kamar mandi, nat lantai, sudut tersembunyi, kusen, dan sanitasi perabotan secara mendalam."],
                ["q" => "02 Apakah cairan pembersih yang digunakan aman?", "a" => "Ya, seluruh cairan pembersih yang kami gunakan telah teruji ramah lingkungan, bebas zat berbahaya karsinogenik, dan aman untuk bayi, anak-anak, serta hewan peliharaan."],
                ["q" => "03 Apakah saya harus menyediakan peralatan sendiri?", "a" => "Tidak perlu repot! Tim kami datang lengkap dengan vacuum cleaner industri, mesin poles, tangga portabel, kain mikrofiber steril, hingga formula pembersih khusus."],
                ["q" => "04 Berapa lama estimasi durasi pengerjaan?", "a" => "Durasi bergantung pada luasan dan kondisi properti. Untuk pembersihan harian rumah standar rata-rata membutuhkan 2-4 jam, sedangkan pembersihan menyeluruh total 4-8 jam dengan tim 2-4 orang teknisi."],
                ["q" => "05 Apakah layanan Pembersihan Rumah tersedia untuk luar kota?", "a" => "Kami melayani seluruh area metropolitan Surabaya, Malang, Bali, dan Jakarta, serta kawasan penyangga sekitarnya."],
                ["q" => "06 Apakah ada jaminan garansi jika hasil pembersihan belum puas?", "a" => "Tentu! Kami memberikan Garansi Kualitas. Jika supervisor kami atau Anda menemukan area yang belum bersih sesuai checklist, tim kami langsung membersihkannya kembali tanpa biaya tambahan."],
                ["q" => "07 Bagaimana alur reservasi dan sistem pembayarannya?", "a" => "Cukup hubungi Customer Care via WhatsApp untuk konsultasi jadwal dan estimasi harga. Pembayaran dapat dilakukan via transfer bank resmi setelah pekerjaan selesai diperiksa bersama."]
            ];
        } elseif ($isTukang) {
            $heroHook = "Ingin Perbaikan & Renovasi Rumah Presisi Dengan Standar Premium?";
            $heroSubPills = "Tukang Harian/Borongan, Perbaikan Pipa Bocor, Instalasi Listrik, Servis & Cuci AC, Pengecatan Dinding, Renovasi Interior";
            $credTitle = "Vendor Perbaikan Rumah & Jasa Tukang Ahli Untuk Keamanan Properti Anda";
            $credP1 = "Rumah yang terawat adalah jaminan keamanan dan kenyamanan jangka panjang. Kami memastikan perbaikan teknis dan renovasi rumah Anda ditangani dengan presisi struktur serta hasil finishing yang rapi dan kokoh.";
            $credP2 = "Standar kualitas kami sangat jelas. Akurasi diagnosa kebocoran atau korsleting, penggunaan material SNI berkualitas tinggi, dan disiplin waktu adalah prioritas utama. Tim tukang berpengalaman kami siap mengatasi masalah rumah tinggal secara tuntas tanpa tambal sulam.";
            
            $philTitle = "Bukan sekadar memperbaiki. Kami membangun keamanan & kenyamanan hunian jangka panjang.";
            $pillar1 = ["title" => "Diagnosa Akurat & Solusi Tuntas", "desc" => "Mendeteksi sumber kebocoran dan kerusakan secara tepat tanpa membongkar sembarangan."];
            $pillar2 = ["title" => "Material Berkualitas SNI", "desc" => "Memakai bahan pipa, kabel, semen, dan cat dengan standar mutu terbaik untuk ketahanan maksimal."];
            $pillar3 = ["title" => "SDM Tukang Ahli Berpengalaman", "desc" => "Tenaga kerja spesialis plumbing, elektrikal, sipil, dan finishing dengan jam terbang tinggi."];
            $pillar4 = ["title" => "Pengerjaan Rapi & Siap Pakai", "desc" => "Selesai pengerjaan, area kerja selalu dibersihkan dan dirapikan kembali seperti semula."];

            $whyLead = "Kami memahami bahwa pemilik rumah menginginkan perbaikan yang tuntas tanpa harus berulang kali memanggil tukang untuk masalah yang sama.";
            $whyCards = [
                ["title" => "Pengalaman 10+ Tahun di Bidang Konstruksi & Perawatan", "desc" => "Telah menangani ribuan proyek perbaikan rumah tapak, ruko komersial, hingga interior gedung."],
                ["title" => "Penanganan Komprehensif Berbagai Bidang", "desc" => "Satu pintu untuk urusan pipa bocor, instalasi listrik, perbaikan atap bocor, hingga pengecatan."],
                ["title" => "Material Terstandar & Transparan", "desc" => "Rincian kebutuhan bahan bangunan disajikan secara terbuka dengan harga yang jujur dan kompetitif."],
                ["title" => "Pengerjaan Disiplin Waktu – Deadline Terjaga", "desc" => "Tim teknisi kami bekerja tertib sesuai jadwal yang telah disepakati bersama klien."],
                ["title" => "Garansi Penuh Atas Hasil Pekerjaan", "desc" => "Kenyamanan Anda terlindungi garansi purnajual—jika kebocoran atau kerusakan muncul kembali, kami perbaiki tuntas."],
                ["title" => "Survey Gratis & Konsultasi Teknis Responsif", "desc" => "Tim kami siap berdiskusi dan memberikan saran teknis paling efisien sesuai anggaran Anda."]
            ];

            $narrativeHeading = "Eksekusi Presisi, Struktur Kokoh, dan Bergaransi Penuh";
            $narrativeP1 = "Kami tidak hanya menambal kerusakan permukaan. Kami mencari sumber akar masalah kerusakan properti Anda agar hunian tetap aman dan nyaman dihuni bertahun-tahun ke depan.";
            $narrativeP2 = "Serahkan urusan teknis yang membingungkan dan berbahaya seperti kelistrikan atau atap bocor sepenuhnya kepada para ahlinya. Tim kami dilengkapi peralatan proteksi standar dan perkakas presisi tinggi.";
            $narrativeP3 = "Hasil pengerjaan yang Anda dapatkan adalah struktur yang kokoh, instalasi yang rapi, dan rasa tenang bebas cemas.";

            $categories = ["Perbaikan Pipa & Saluran", "Kelistrikan & Panel Listrik", "Perbaikan Atap & Bocor", "Servis AC Rumah", "Pengecatan & Plafon"];
            $seeMoreText = "Lihat Dokumentasi Perbaikan Rumah";

            $testimonials = [
                ["initials" => "CK", "name" => "Citra Kirana", "role" => "Perbaikan Pipa Bocor", "loc" => "Darmo Permai, Surabaya", "text" => "Pipa air dalam dinding bocor bikin rembes ke kamar tidur. Tukang Koota datang cepat, diagnosanya tepat sasaran dan bobokan temboknya sangat rapi. Setelah diplester ulang hasilnya mulus!"],
                ["initials" => "DP", "name" => "Dimas Pratama", "role" => "Instalasi Listrik & Lampu", "loc" => "Graha Family, Surabaya", "text" => "Sering jeglek saat AC dan oven dinyalakan. Teknisi kelistrikan Koota langsung menata ulang jalur pembagian beban MCB. Sekarang listrik rumah stabil dan kabel-kabel rapi terbungkus."],
                ["initials" => "SL", "name" => "Sophia Latjuba", "role" => "Renovasi Plafon & Atap", "loc" => "Bumi Serpong Damai, Tangerang", "text" => "Plafon gypsum jebol karena talang bocor. Tim Koota mengganti talang seng dengan material anti karat dan memasang plafon baru. Pengerjaannya cepat dan tidak berantakan."],
                ["initials" => "DR", "name" => "Denny R.", "role" => "Pengecatan Ulang Hunian", "loc" => "Ijen Boulevard, Malang", "text" => "Pengecatan dinding luar dan dalam seluas 350 m2 selesai sesuai jadwal 5 hari. Warnanya rata, plamirnya halus, dan sisa cat dibersihkan tuntas. Sangat profesional!"],
                ["initials" => "HS", "name" => "Hani Syarifah", "role" => "Servis & Cuci AC Rumah", "loc" => "Sanur, Bali", "text" => "Servis 4 unit AC rumah yang bocor air dan berisik. Teknisi bekerja sopan, pakai pelindung terpal rapi, dan udara AC langsung dingin menggigit. Mantap!"],
                ["initials" => "RH", "name" => "Rian Hermawan", "role" => "Perbaikan Rumah Terpadu", "loc" => "Kelapa Gading, Jakarta", "text" => "Layanan tukang paling terpercaya yang pernah saya gunakan. Ada garansi pengerjaannya jadi kita tidak was-was. Sangat recomended untuk urusan renovasi rumah!"]
            ];

            $ctaHook = "Selesaikan masalah kerusakan rumah Anda sekarang sebelum bertambah parah!";

            $faqsList = [
                ["q" => "01 Apa saja lingkup perbaikan yang bisa ditangani Koota Service?", "a" => "Kami menangani perbaikan kebocoran pipa air, kran mampet, kelistrikan & MCB, perbaikan atap bocor, pengecatan dinding, pemasangan partisi gypsum, servis AC, hingga renovasi ruangan."],
                ["q" => "02 Apakah ada garansi untuk jasa perbaikan?", "a" => "Ya, kami memberikan garansi pengerjaan hingga 30 hari tergantung jenis pekerjaan. Jika masalah yang sama timbul kembali selama masa garansi, kami perbaiki tanpa tambahan biaya tukang."],
                ["q" => "03 Bagaimana sistem penyediaan material bangunannya?", "a" => "Sangat fleksibel. Anda dapat menyediakan material sendiri, atau menyerahkan pengadaan material kepada tim kami dengan nota transparan dan material standar SNI pilihan terbaik."],
                ["q" => "04 Apakah bisa memesan untuk perbaikan skala kecil?", "a" => "Tentu saja! Kami melayani perbaikan kecil harian seperti penggantian kran, saklar rusak, engsel pintu, hingga renovasi skala besar."],
                ["q" => "05 Bagaimana cara meminta jadwal survey ke lokasi?", "a" => "Cukup klik tombol Konsultasi WhatsApp, kirimkan foto/video bagian yang rusak, dan tim admin kami akan segera menjadwalkan kunjungan teknisi ke lokasi Anda."],
                ["q" => "06 Apakah tukang yang dikirim dapat dipercaya?", "a" => "Seluruh tenaga kerja kami telah melalui proses verifikasi identitas, uji keahlian lapangan, dan dibekali SOP kerja yang sopan, jujur, serta menjaga privasi rumah klien."],
                ["q" => "07 Kapan waktu operasional layanan perbaikan rumah?", "a" => "Layanan konsultasi dan penjadwalan beroperasi 24/7, sedangkan pengerjaan on-site teknisi dapat disesuaikan mulai jam 08.00 hingga 17.00 WIB setiap hari."]
            ];
        } else {
            // Pengangkutan Sampah
            $heroHook = "Ingin Pengangkutan Sampah Teratur & Bebas Bau Dengan Standar Premium?";
            $heroSubPills = "Pengangkutan Sampah Terjadwal, Sampah Komersial Kafe & Resto, Evakuasi Puing Bangunan, Pembuangan Barang Bekas Besar, Truk Tertutup";
            $credTitle = "Vendor Pengangkutan Sampah Terpadu & Terjadwal Untuk Lingkungan Bersih";
            $credP1 = "Pengelolaan sampah yang tertib adalah kunci kenyamanan hunian dan kredibilitas bisnis Anda. Kami memastikan sampah Anda diangkut tepat waktu dengan armada truk tertutup yang higienis dan bebas bau ceceran.";
            $credP2 = "Standar kualitas kami sangat jelas. Jadwal kedatangan yang disiplin, tim armada berseragam rapi, dan pembuangan legal ke TPA resmi adalah prioritas utama. Kami siap melayani perumahan, klaster, restoran, kafe, hingga proyek konstruksi.";
            
            $philTitle = "Bukan sekadar mengangkut. Kami membangun tata kelola lingkungan yang sehat & tertib.";
            $pillar1 = ["title" => "Jadwal Rutin & Disiplin Waktu", "desc" => "Pengambilan sampah terjadwal pasti agar tidak menumpuk dan menimbulkan bau di pekarangan."];
            $pillar2 = ["title" => "Armada Truk Bersih & Tertutup", "desc" => "Menggunakan truk tertutup terpal/hidrolik sehingga aman dari ceceran air lindi di jalanan."];
            $pillar3 = ["title" => "Pembuangan Resmi & Legal", "desc" => "Semua sampah dialirkan ke Tempat Pembuangan Akhir (TPA) resmi sesuai regulasi Dinas Lingkungan Hidup."];
            $pillar4 = ["title" => "Evakuasi Puing & Limbah Besar", "desc" => "Mampu mengangkut puing sisa bongkaran, kayu, semen, dan furnitur rusak ukuran besar."];

            $whyLead = "Kami memahami bahwa lingkungan bersih bebas bau sampah mencerminkan kualitas hidup dan citra positif bisnis Anda.";
            $whyCards = [
                ["title" => "Pengalaman Luas Pengelolaan Sampah Kawasan", "desc" => "Telah melayani puluhan klaster hunian dan ratusan unit usaha F&B di berbagai kota besar."],
                ["title" => "Paket Jadwal Fleksibel (Harian/Mingguan)", "desc" => "Sesuaikan frekuensi pengangkutan sesuai volume sampah residensial maupun bisnis komersial Anda."],
                ["title" => "Armada Siap Siaga Volume Kecil & Besar", "desc" => "Didukung armada pikap tertutup hingga dump truck kapasitas besar untuk kebutuhan on-demand."],
                ["title" => "Pekerja Terlatih, Sigap & Ramah", "desc" => "Petugas armada selalu menggunakan perlengkapan keselamatan kerja (APD) dan bekerja cepat serta rapi."],
                ["title" => "Jaminan Bebas Bau & Area Bersih Tuntas", "desc" => "Petugas memastikan tempat sampah disapu bersih dan tidak ada sampah tercecer setelah proses muat."],
                ["title" => "Kontrak Fleksibel & Tanpa Kerumitan", "desc" => "Tersedia pilihan langganan bulanan tanpa ikatan rumit, maupun sistem panggilan insidental."]
            ];

            $narrativeHeading = "Eksekusi Cepat, Armada Siap, dan Lingkungan Bebas Tumpukan Sampah";
            $narrativeP1 = "Tumpukan sampah yang telat diangkut mengundang lalat, kecoa, dan menimbulkan bau busuk yang mengganggu tetangga maupun pelanggan usaha Anda.";
            $narrativeP2 = "Serahkan jadwal pengangkutan sampah secara teratur kepada Koota Services. Kami beroperasi dengan jadwal yang terukur setiap minggu sehingga tong sampah Anda selalu kosong dan higienis.";
            $narrativeP3 = "Hasilnya adalah pekarangan rumah yang asri, lingkungan klaster yang bersih, dan kenyamanan hidup maksimal tanpa gangguan bau sampah.";

            $categories = ["Sampah Residensial Terjadwal", "Sampah Komersial Kafe & Resto", "Puing Sisa Renovasi Bangunan", "Pembuangan Barang Bekas Besar", "Sampah Acara & Pameran"];
            $seeMoreText = "Lihat Dokumentasi Pengangkutan Sampah";

            $testimonials = [
                ["initials" => "CK", "name" => "Citra Kirana", "role" => "Pengangkutan Sampah Kafe", "loc" => "Gubeng, Surabaya", "text" => "Untuk operasional coffee shop, sampah basah ampas kopi dan sisa makanan harus diangkut setiap pagi. Armada Koota sangat disiplin waktu dan petugasnya sangat sopan. Tempat sampah selalu disapu bersih!"],
                ["initials" => "DP", "name" => "Dimas Pratama", "role" => "Pengangkutan Klaster Perumahan", "loc" => "Klaster Harmoni, Sidoarjo", "text" => "Sebagai pengurus RT klaster perumahan 150 KK, koordinasi dengan vendor sampah Koota Services sangat mudah. Armada truknya tertutup dan tidak bau menetes di jalan komplek."],
                ["initials" => "SL", "name" => "Sophia Latjuba", "role" => "Evakuasi Puing Renovasi", "loc" => "Kebayoran Baru, Jakarta", "text" => "Sisa puing bongkaran tembok dan genteng sebanyak 2 dump truck langsung ludes terangkut dalam setengah hari. Petugasnya sigap mengangkut sampai ke sapuan terakhir."],
                ["initials" => "DR", "name" => "Denny R.", "role" => "Pembuangan Barang Bekas Besar", "loc" => "Soekarno Hatta, Malang", "text" => "Pindahan rumah mau membuang sofa tua, kasur busa rusak, dan lemari kayu lapuk. Sangat terbantu dengan layanan on-demand Koota Services, harganya sangat masuk akal."],
                ["initials" => "HS", "name" => "Hani Syarifah", "role" => "Sampah Restoran & Dapur", "loc" => "Seminyak, Bali", "text" => "Restoran kami membutuhkan higienitas tinggi. Sistem pengangkutan terjadwal Koota Services membantu kami menjaga kebersihan dapur dan lolos audit sanitasi berkala."],
                ["initials" => "RH", "name" => "Rian Hermawan", "role" => "Pengangkutan Rutin Mingguan", "loc" => "Rungkut, Surabaya", "text" => "Pelayanan profesional, armada siap sedia, dan customer service sangat tanggap saat kami butuh jadwal pengangkutan tambahan di hari libur. Recomended vendor!"]
            ];

            $ctaHook = "Wujudkan lingkungan hunian dan usaha yang bersih, higienis, dan bebas bau sampah!";

            $faqsList = [
                ["q" => "01 Bagaimana sistem jadwal pengangkutan sampah residensial?", "a" => "Pengangkutan dapat diatur sesuai kesepakatan, misalnya 2x seminggu, 3x seminggu, atau setiap hari kerja untuk kawasan bisnis/perumahan."],
                ["q" => "02 Apakah Koota melayani pembuangan puing material bangunan?", "a" => "Ya, kami melayani evakuasi puing sisa bongkaran renovasi (pecahan batu bata, semen, genteng, kayu) menggunakan armada dump truck dengan tim angkut yang terlatih."],
                ["q" => "03 Apakah bisa membuang barang berukuran besar (bulky waste)?", "a" => "Tentu saja. Kami melayani panggilan insidental untuk pembuangan kasur bekas, lemari rusak, sofa lapuk, dan perabot besar lainnya."],
                ["q" => "04 Ke mana sampah tersebut akan dibuang?", "a" => "Seluruh sampah yang kami angkut dibuang ke Tempat Pemrosesan Akhir (TPA) resmi yang terdaftar di Dinas Lingkungan Hidup kota setempat, memastikan tidak ada pembuangan liar."],
                ["q" => "05 Berapa biaya langganan pengangkutan sampah?", "a" => "Biaya disesuaikan dengan volume sampah, frekuensi pengambilan, dan jenis properti (rumah tangga, kafe, ruko, atau komplek klaster). Hubungi WA kami untuk penawaran terbaik."],
                ["q" => "06 Apakah armada yang digunakan menimbulkan bau ceceran di jalan?", "a" => "Tidak. Armada kami menggunakan truk dengan penutup terpal rapat dan wadah tertutup kedap air lindi untuk menjaga kebersihan jalanan umum."],
                ["q" => "07 Bagaimana cara mendaftar atau memesan pengangkutan mendesak?", "a" => "Sangat mudah, klik tombol Konsultasi WhatsApp, kirimkan detail lokasi dan foto estimasi sampah Anda, tim operasional kami siap menjadwalkan penjemputan."]
            ];
        }
    @endphp

    <!-- 1. HERO SECTION -->
    <section class="relative bg-neutral-950 text-white py-24 md:py-32 overflow-hidden border-b border-neutral-900">
        <!-- Background Image with Editorial Vignette & Radial Crimson Glow -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-25 filter brightness-75 scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/85 to-neutral-950/60"></div>
            <div aria-hidden="true" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-[#820003]/20 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <!-- Badge Pill -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full text-xs font-semibold bg-white/10 text-white border border-white/15 backdrop-blur-md shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#820003] animate-pulse"></span>
                <span class="tracking-widest uppercase text-[11px] font-bold">KOOTA PREMIUM SERVICE</span>
            </div>

            <!-- Main Heading Hook -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.15] max-w-4xl mx-auto">
                {{ $heroHook }}
            </h1>

            <!-- Sub Scope Pills -->
            <div class="flex flex-wrap justify-center items-center gap-2 max-w-3xl mx-auto pt-1">
                @foreach(explode(', ', $heroSubPills) as $pill)
                    <span class="px-3.5 py-1 rounded-full text-xs font-medium bg-white/10 text-gray-200 border border-white/15 backdrop-blur-xs">
                        {{ $pill }}
                    </span>
                @endforeach
            </div>

            <!-- Dual CTAs -->
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3.5">
                <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-xl bg-[#820003] hover:bg-[#660002] text-white font-bold text-sm sm:text-base transition-all shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>Konsultasi via WhatsApp</span>
                </a>

                <a href="#detail-layanan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-white/10 hover:bg-white/15 text-white font-semibold text-sm sm:text-base border border-white/20 backdrop-blur-md transition-all">
                    <span>Pelajari Lingkup Layanan</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 2. VENDOR CREDIBILITY & VALUE INTRO SECTION -->
    <section id="detail-layanan" class="py-20 bg-white border-b border-gray-100 scroll-mt-20">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                            {{ __('Komitmen Kualitas Tinggi') }}
                        </span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight leading-snug">
                        {{ $credTitle }}
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $credP1 }}
                    </p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $credP2 }}
                    </p>
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#820003] hover:bg-[#660002] text-white font-bold text-xs sm:text-sm shadow-sm hover:shadow-md transition-all hover:scale-105 active:scale-95">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>{{ __('Konsultasi Layanan') }}</span>
                        </a>

                        <a href="{{ route('consultation.index') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl border border-gray-300 hover:border-[#820003] bg-white text-gray-800 hover:text-[#820003] font-semibold text-xs sm:text-sm transition-all shadow-2xs">
                            <span>{{ __('Form Estimasi Jadwal') }}</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white group">
                        <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>

                        <!-- Trust Card Overlays -->
                        <div class="absolute bottom-6 inset-x-6 space-y-2.5 z-10">
                            <div class="flex items-center gap-2.5 p-3 rounded-2xl bg-white/95 backdrop-blur-md shadow-md text-xs font-bold text-gray-900">
                                <span class="w-6 h-6 rounded-full bg-red-50 text-[#820003] flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                <span>Garansi Kualitas & SOP Pengerjaan Ketat</span>
                            </div>

                            <div class="flex items-center justify-between text-[11px] text-white/90 font-medium px-2">
                                <span>Wilayah Layanan Resmi</span>
                                <span class="font-bold text-white">Surabaya • Malang • Bali • Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CORE PHILOSOPHY & 4 VALUE PILLARS -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Fondasi Layanan') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ $philTitle }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Nilai-nilai fundamental yang kami pegang teguh dalam setiap pengerjaan layanan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Pillar 1 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 group">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black text-[#820003] tracking-widest uppercase">01</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ $pillar1['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar1['desc'] }}</p>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 group">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black text-[#820003] tracking-widest uppercase">02</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ $pillar2['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar2['desc'] }}</p>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 group">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black text-[#820003] tracking-widest uppercase">03</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ $pillar3['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar3['desc'] }}</p>
                </div>

                <!-- Pillar 4 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 group">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black text-[#820003] tracking-widest uppercase">04</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ $pillar4['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar4['desc'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. KENAPA KLIEN MEMILIH KOOTA SERVICE (6 BENEFIT CARDS) -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Keunggulan Utama') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Kenapa Klien Memilih KOOTA SERVICE?
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ $whyLead }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($whyCards as $idx => $card)
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3">
                        <span class="text-2xl font-black text-[#820003] block tracking-tight">0{{ $idx + 1 }}</span>
                        <h3 class="text-lg font-bold text-gray-900">{{ $card['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ $card['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. NARRATIVE EXCELLENCE / CRAFTSMANSHIP -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <div class="inline-flex items-center gap-3">
                <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                    {{ __('Pengalaman Nyata & Bebas Cemas') }}
                </span>
                <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1c1b1b] tracking-tight leading-tight">
                {{ $narrativeHeading }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                {{ $narrativeP1 }}
            </p>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                {{ $narrativeP2 }}
            </p>
            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-gray-200/90 shadow-2xs border-l-4 border-l-[#820003] text-left max-w-3xl mx-auto">
                <p class="text-xs sm:text-sm font-semibold text-gray-800 leading-relaxed italic">
                    "{{ $narrativeP3 }}"
                </p>
            </div>
        </div>
    </section>

    <!-- 6. SOCIAL PROOF & PROJECT GALLERY -->
    <section class="py-20 bg-white border-b border-gray-100" x-data="{ activeCategory: '{{ $categories[0] }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <div class="space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Portofolio & Bukti Pengerjaan') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Telah Dipercaya Ratusan Klien di Berbagai Sektor
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 max-w-2xl mx-auto leading-relaxed">
                    Hunian Pribadi, Apartemen, Kantor Bisnis, Kafe & Resto, hingga Fasilitas Komersial.
                </p>
            </div>

            <!-- Category Filter Pills -->
            <div class="flex flex-wrap justify-center items-center gap-2.5 pt-2">
                @foreach($categories as $cat)
                    <button type="button" 
                            @click="activeCategory = '{{ $cat }}'" 
                            :class="activeCategory === '{{ $cat }}' ? 'bg-[#820003] text-white shadow-xs font-bold' : 'bg-white text-gray-700 border border-gray-200 hover:border-gray-300 font-medium'"
                            class="px-5 py-2 rounded-full text-xs sm:text-sm transition-all cursor-pointer">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <!-- Dynamic Sub-header: Project <activeCategory> -->
            <div class="pt-2 pb-1">
                <p class="text-xs sm:text-sm font-medium text-gray-500">
                    Kategori: <span x-text="activeCategory" class="font-bold text-[#820003]"></span>
                </p>
            </div>

            <!-- 3 Clean Photo Showcase Cards -->
            @php
                $displayProjects = $projects->where('is_video', false)->values();
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 text-left">
                @for($i = 0; $i < 3; $i++)
                    @if(isset($displayProjects[$i]))
                        <div class="rounded-3xl overflow-hidden shadow-2xs hover:shadow-lg transition-all duration-300 border border-gray-200/80 bg-white group aspect-[4/3] relative">
                            <img src="{{ $displayProjects[$i]->image }}" alt="{{ $displayProjects[$i]->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent flex items-end p-5">
                                <span class="text-xs font-bold text-white drop-shadow-sm">{{ $displayProjects[$i]->title }}</span>
                            </div>
                        </div>
                    @else
                        <!-- Fallback Service Feature Showcase (Clean, No Wireframe Text) -->
                        <div class="rounded-3xl overflow-hidden shadow-2xs hover:shadow-lg transition-all duration-300 border border-gray-200/80 bg-white group aspect-[4/3] relative">
                            <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent flex flex-col justify-end p-5 text-white">
                                <span class="text-[10px] font-bold text-red-300 uppercase tracking-wider mb-1">Standar KOOTA SERVICE</span>
                                <h4 class="text-sm font-bold leading-snug">
                                    {{ $i === 0 ? 'Eksekusi Presisi di Lokasi' : ($i === 1 ? 'Peralatan & SOP Higienis' : 'Hasil Pengerjaan Bergaransi') }}
                                </h4>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </section>

    <!-- 8. VIDEO HIGHLIGHT (LIHAT HASIL PROJECT KAMI) -->
    <section class="py-20 bg-white border-b border-gray-100" x-data="{ videoModal: false, currentVideoUrl: '' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Video Highlight') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Lihat Hasil Project Kami
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                    Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan, langsung dari sudut pandang klien kami.
                </p>
            </div>

            <!-- Video Reels Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($videoProjects->take(2) as $vProj)
                    <div class="bg-[#fcf9f8] p-6 rounded-3xl border border-gray-100 shadow-2xs space-y-4">
                        <div class="text-center space-y-1">
                            <h4 class="text-sm font-bold text-gray-900">{{ $vProj->title }}</h4>
                            <p class="text-[11px] text-gray-500">{{ $vProj->description }}</p>
                        </div>
                        <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-black cursor-pointer group"
                             @click="currentVideoUrl = '{{ str_replace(['shorts/', 'watch?v='], 'embed/', $vProj->video_url ?? 'https://www.youtube.com/embed/aqz-KE-bpKQ') }}?autoplay=1'; videoModal = true">
                            <img src="{{ $vProj->image }}" alt="{{ $vProj->title }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Video Modal -->
        <div x-show="videoModal" 
             x-transition 
             class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-4"
             @click="videoModal = false; currentVideoUrl = ''"
             style="display: none;">
            <div class="relative w-full max-w-md bg-black rounded-3xl overflow-hidden shadow-2xl aspect-[9/16] max-h-[85vh]" @click.stop>
                <button @click="videoModal = false; currentVideoUrl = ''" class="absolute top-4 right-4 z-20 w-9 h-9 rounded-full bg-black/60 hover:bg-black text-white flex items-center justify-center transition-colors cursor-pointer" aria-label="Tutup Video">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <template x-if="videoModal && currentVideoUrl">
                    <iframe :src="currentVideoUrl" class="w-full h-full border-0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
                </template>
            </div>
        </div>
    </section>

    <!-- 9. TESTIMONIAL PELANGGAN (6 AUTHENTIC REVIEWS) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Kepuasan Pelanggan') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Cerita Nyata Dari Klien Kami
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Bukan hanya menyelesaikan pekerjaan, tapi juga menciptakan kenyamanan dan standar higienis yang bermakna.
                </p>
            </div>

            <!-- Testimonial Cards Grid with SVG Star Ratings -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testi)
                    <div class="bg-white p-7 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-lg hover:border-[#820003]/20 transition-all flex flex-col justify-between space-y-5">
                        <div class="space-y-3">
                            <!-- 5-Star Clean SVG Rating -->
                            <div class="flex items-center gap-1 text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 fill-amber-400 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            <p class="text-xs sm:text-sm text-gray-700 leading-relaxed italic">
                                "{{ $testi['text'] }}"
                            </p>
                        </div>

                        <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                            <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] font-black text-xs flex items-center justify-center shrink-0 border border-red-100">
                                {{ $testi['initials'] }}
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900 leading-tight">{{ $testi['name'] }}</h4>
                                <p class="text-[11px] text-gray-500 font-medium">{{ $testi['role'] }} • <span class="text-gray-400">{{ $testi['loc'] }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 10. PROSES TERTATA UNTUK HASIL SEMPURNA (3 TAHAPAN) -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Metodologi Kerja') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Proses Tertata Untuk Hasil Sempurna
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Setiap tahapan dirancang untuk menjamin kesempurnaan dan kepuasan pelanggan secara transparan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 relative group">
                    <span class="text-3xl font-black text-[#820003] block tracking-tight">01</span>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">Konsultasi & Penjadwalan Cepat</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Diskusikan kebutuhan spesifik Anda bersama Customer Care kami via WhatsApp. Kami berikan estimasi transparan dan jadwalkan kunjungan tepat waktu.
                    </p>
                </div>

                <!-- Step 2 (Consistent Brand Styling) -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 relative group">
                    <span class="text-3xl font-black text-[#820003] block tracking-tight">02</span>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">Eksekusi Profesional Berstandar SOP</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Tenaga kerja ahli pilihan kami hadir on-site dengan peralatan lengkap dan material terstandar, bekerja disiplin mengikuti SOP ketat.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200/80 shadow-2xs hover:shadow-md hover:border-[#820003]/30 transition-all space-y-3 relative group">
                    <span class="text-3xl font-black text-[#820003] block tracking-tight">03</span>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">Quality Control & Aktivasi Garansi</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Pemeriksaan hasil akhir bersama klien untuk memastikan kepuasan menyeluruh. Jika ada yang belum sesuai, kami perbaiki tuntas bergaransi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. BANNER CTA KONSULTASI PREMIUM (WITH KENZO YANUAR) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Hook Heading -->
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ $ctaHook }}
                </h3>
                <p class="text-xs sm:text-sm text-gray-600">
                    Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik sesuai kebutuhan Anda.
                </p>
            </div>

            <!-- Card Banner Premium Dark -->
            <div class="relative bg-[#1c1b1b] rounded-3xl overflow-hidden shadow-2xl border border-neutral-800 text-white">
                <!-- Ambient Subtle Crimson Glow -->
                <div aria-hidden="true" class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#820003]/25 blur-3xl pointer-events-none"></div>
                <div aria-hidden="true" class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#820003]/15 blur-3xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 items-center relative z-10">
                    <!-- Left Content -->
                    <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-red-200 text-xs font-semibold tracking-wide border border-white/10">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            <span>KONSULTASI BEBAS BIAYA</span>
                        </div>

                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-snug">
                            Konsultasi Masalah dan Perawatan Rumah Gratis
                        </h3>

                        <p class="text-gray-300 text-xs sm:text-sm sm:leading-relaxed max-w-xl">
                            Ceritakan kebutuhan Anda, kami siap bantu jadwalkan kunjungan tenaga ahli untuk solusi hunian bersih, rapi, dan terawat.
                        </p>

                        <div class="pt-4 flex flex-wrap items-center gap-3">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#820003] hover:bg-[#660002] text-white font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all hover:scale-105 active:scale-95">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Konsultasi via WhatsApp</span>
                            </a>

                            <a href="{{ route('consultation.index') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl border border-white/20 hover:border-white/40 bg-white/5 hover:bg-white/10 text-white font-semibold text-xs sm:text-sm transition-all">
                                <span>Form Reservasi</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Image: Kenzo Yanuar (CEO) -->
                    <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end pt-4 lg:pt-0 overflow-hidden">
                        <img src="{{ asset('images/kenzo-yanuar.png') }}" alt="Kenzo Yanuar - CEO Koota Production" class="w-auto h-72 sm:h-80 md:h-96 object-contain object-bottom select-none drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. PERTANYAAN YANG SERING DITANYAKAN (7 FAQ ITEMS) & 13. PUNYA PERTANYAAN LAIN? -->
    <section class="py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Pertanyaan Umum (FAQ)') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Pertanyaan yang Sering Ditanyakan
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Kami rangkum info penting agar Anda lebih yakin dan mudah dalam mengambil keputusan.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Left: 7 FAQ Items with Floating Answers on Hover -->
                <div 
                    class="lg:col-span-8 space-y-3 pt-4 sm:pt-6" 
                    x-data="{ activeFaq: null, pinnedFaq: null }"
                    @click.away="pinnedFaq = null; activeFaq = null"
                >
                    <div class="mb-4 flex items-center justify-between text-xs text-gray-500 px-2">
                        <span class="flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4 text-[#820003] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                            </svg>
                            {{ __('Arahkan kursor ke pertanyaan untuk melihat jawaban') }}
                        </span>
                        <span class="text-[11px] text-gray-400 hidden sm:inline">{{ __('Hover / Sentuh') }}</span>
                    </div>

                    @foreach($faqsList as $idx => $f)
                        <div 
                            class="relative"
                            @mouseenter="activeFaq = {{ $idx + 1 }}"
                            @mouseleave="if (!pinnedFaq) activeFaq = null"
                            @click="pinnedFaq = (pinnedFaq === {{ $idx + 1 }} ? null : {{ $idx + 1 }}); activeFaq = pinnedFaq"
                        >
                            <!-- Question Bar (Hover Target) -->
                            <div 
                                class="w-full flex items-center justify-between p-4 sm:p-5 rounded-2xl border transition-all duration-200 cursor-pointer select-none"
                                :class="activeFaq === {{ $idx + 1 }} ? 'bg-red-50/70 border-red-200 shadow-md translate-x-1' : 'bg-white border-gray-200/80 hover:border-red-200 hover:bg-neutral-50/50 shadow-2xs'"
                            >
                                <span 
                                    class="text-sm sm:text-base font-bold text-gray-900 transition-colors leading-relaxed pr-4"
                                    :class="{ 'text-[#820003]': activeFaq === {{ $idx + 1 }} }"
                                >
                                    <span class="text-xs font-black text-[#820003] mr-2">0{{ $idx + 1 }}</span>
                                    {{ $f['q'] }}
                                </span>

                                <div 
                                    class="w-7 h-7 rounded-full flex items-center justify-center shrink-0 transition-all duration-200"
                                    :class="activeFaq === {{ $idx + 1 }} ? 'bg-[#820003] text-white rotate-90 shadow-2xs' : 'bg-gray-100 text-gray-400'"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Floating Answer Card (Mengambang di Atas Pertanyaan) -->
                            <div 
                                x-show="activeFaq === {{ $idx + 1 }}"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                                class="absolute bottom-full left-0 right-0 mb-3 z-30 p-5 sm:p-6 rounded-2xl bg-white text-gray-800 border border-red-100 shadow-[0_20px_45px_rgba(130,0,3,0.14)] pointer-events-none"
                            >
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between pb-2 border-b border-gray-100">
                                        <span class="text-xs font-bold text-[#820003] uppercase tracking-wider flex items-center gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                                            {{ __('Jawaban') }}
                                        </span>
                                        <span class="text-[11px] text-gray-400 font-semibold tracking-wider">KOOTA FAQ</span>
                                    </div>

                                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-normal">
                                        {{ $f['a'] }}
                                    </p>
                                </div>

                                <!-- Downward Arrow Pointing to the Question -->
                                <div class="absolute -bottom-1.5 left-8 w-3.5 h-3.5 bg-white transform rotate-45 border-r border-b border-red-100"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Punya pertanyaan lain? -->
                <div class="lg:col-span-4">
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            Punya pertanyaan lain?
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Tim kami siap membantu Anda! Hubungi kami langsung untuk konsultasi gratis dan solusi terbaik sesuai kebutuhan Anda.
                        </p>
                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20tanya-tanya%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#820003] hover:bg-[#660002] text-white font-bold text-xs sm:text-sm transition-all shadow-md hover:shadow-lg hover:scale-[1.02] active:scale-95">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Hubungi Konsultan Kami</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
