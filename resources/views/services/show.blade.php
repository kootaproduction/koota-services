@extends('layouts.app')

@section('title', __($service->title) . ' - KOOTA SERVICE')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-100 py-3 text-xs text-gray-500">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[#820003] transition-colors">{{ __('Home') }}</a>
            <span>›</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#820003] transition-colors">{{ __('Layanan') }}</a>
            <span>›</span>
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

    <!-- 1. HERO SECTION (Hook + Scope Pills + Green Urgent CTA) -->
    <section class="relative bg-neutral-900 text-white py-24 md:py-32 overflow-hidden border-b border-neutral-800">
        <div class="absolute inset-0 z-0">
            <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-35 filter brightness-90">
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <!-- Badge Pill -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold bg-[#25d366]/20 text-[#80f98b] border border-[#25d366]/40 backdrop-blur-md shadow-xs">
                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Standar Kualitas Premium KOOTA SERVICE</span>
            </div>

            <!-- Main Heading Hook -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight max-w-4xl mx-auto">
                {{ $heroHook }}
            </h1>

            <!-- Sub Scope Pills -->
            <p class="text-xs sm:text-sm text-gray-300 max-w-3xl mx-auto leading-relaxed font-semibold tracking-wide">
                {{ $heroSubPills }}
            </p>

            <!-- Urgent Green CTA WhatsApp -->
            <div class="pt-4 flex justify-center">
                <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="inline-flex items-center gap-2.5 px-8 py-4 rounded-full bg-[#25d366] hover:bg-[#20ba59] text-white font-extrabold text-sm sm:text-base transition-all shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95 ring-4 ring-green-400/25">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>Konsultasi Gratis Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 2. VENDOR CREDIBILITY & VALUE INTRO SECTION -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-[#820003] block">
                        KOMITMEN KUALITAS TINGGI
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight leading-snug">
                        {{ $credTitle }}
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $credP1 }}
                    </p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $credP2 }}
                    </p>
                    <div class="pt-2">
                        <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#16a34a] hover:bg-[#15803d] text-white font-extrabold text-sm shadow-md hover:shadow-lg transition-all active:scale-95">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>Konsultasikan Sekarang!!</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-[400px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CORE PHILOSOPHY & 4 VALUE PILLARS -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ $philTitle }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Nilai-nilai fundamental yang kami pegang teguh dalam setiap pengerjaan layanan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Pillar 1 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-2xs space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-lg">
                    </div>
                    <h3 class="text-base font-bold text-gray-900">{{ $pillar1['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar1['desc'] }}</p>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-2xs space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-green-50 text-[#16a34a] flex items-center justify-center font-bold text-lg">
                    </div>
                    <h3 class="text-base font-bold text-gray-900">{{ $pillar2['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar2['desc'] }}</p>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-2xs space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-lg">
                    </div>
                    <h3 class="text-base font-bold text-gray-900">{{ $pillar3['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar3['desc'] }}</p>
                </div>

                <!-- Pillar 4 -->
                <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-2xs space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-green-50 text-[#16a34a] flex items-center justify-center font-bold text-lg">
                    </div>
                    <h3 class="text-base font-bold text-gray-900">{{ $pillar4['title'] }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $pillar4['desc'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. KENAPA KLIEN TERNAMA MEMILIH KOOTA SERVICE (6 BENEFIT CARDS) -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#820003] block">
                    KEUNGGULAN UTAMA
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Kenapa Klien Ternama Memilih KOOTA SERVICE?
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ $whyLead }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($whyCards as $idx => $card)
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-100 shadow-2xs hover:shadow-lg transition-all space-y-3">
                        <span class="text-2xl font-black text-[#820003] block">0{{ $idx + 1 }}</span>
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
            <span class="text-xs font-extrabold uppercase tracking-widest text-[#16a34a] block">
                PENGALAMAN NYATA & BEBAS CEMAS
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1c1b1b] tracking-tight leading-tight">
                {{ $narrativeHeading }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                {{ $narrativeP1 }}
            </p>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                {{ $narrativeP2 }}
            </p>
            <p class="text-xs sm:text-sm font-semibold text-gray-700 leading-relaxed bg-white p-6 rounded-2xl border border-gray-200 shadow-2xs">
                {{ $narrativeP3 }}
            </p>
        </div>
    </section>

    <!-- 6. SOCIAL PROOF & PROJECT GALLERY (TELAH DIPERCAYA RATUSAN KLIEN DARI BERBAGAI INDUSTRI) -->
    <section class="py-20 bg-white border-b border-gray-100" x-data="{ activeCategory: '{{ $categories[0] }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <div class="space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Telah Dipercaya Ratusan Klien Dari <span class="bg-gray-200 text-[#1c1b1b] px-2.5 py-0.5 rounded-lg">Berbagai Industri</span>
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 max-w-2xl mx-auto leading-relaxed">
                    UMKM, Brand Nasional, Instansi Pemerintah, Restoran, Toko, Klinik, Cafe, hingga Mall.
                </p>
            </div>

            <!-- Category Pills matching screenshot -->
            <div class="flex flex-wrap justify-center items-center gap-3 pt-2">
                @foreach($categories as $cat)
                    <button type="button" 
                            @click="activeCategory = '{{ $cat }}'" 
                            :class="activeCategory === '{{ $cat }}' ? 'bg-white text-gray-900 border border-gray-200 shadow-sm font-bold' : 'bg-[#1c1b1b] text-white hover:bg-neutral-800 font-medium'"
                            class="px-6 py-2.5 rounded-full text-xs sm:text-sm transition-all cursor-pointer">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <!-- Dynamic Sub-header: Project <activeCategory> -->
            <div class="pt-2 pb-2">
                <p class="text-sm sm:text-base font-medium text-gray-600">
                    Project <span x-text="activeCategory" class="font-bold text-gray-900"></span>
                </p>
            </div>

            <!-- 3 Clean Photo Slots -->
            @php
                $displayProjects = $projects->where('is_video', false)->values();
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 text-left">
                @for($i = 0; $i < 3; $i++)
                    @if(isset($displayProjects[$i]))
                        <div class="rounded-2xl sm:rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 border border-gray-100 bg-white group aspect-[4/3] relative">
                            <img src="{{ $displayProjects[$i]->image }}" alt="{{ $displayProjects[$i]->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="rounded-2xl sm:rounded-3xl border-2 border-dashed border-gray-200 bg-gray-50/70 aspect-[4/3] flex flex-col items-center justify-center p-6 text-center group hover:border-gray-300 transition-colors">
                            <div class="w-12 h-12 rounded-2xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 shadow-2xs mb-2.5 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-gray-500">Slot Foto Dokumentasi</span>
                            <span class="text-[11px] text-gray-400 mt-1">Area penambahan foto proyek</span>
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
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#820003] block">
                    VIDEO HIGHLIGHT
                </span>
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
                <button @click="videoModal = false; currentVideoUrl = ''" class="absolute top-4 right-4 z-20 w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black transition-colors" aria-label="Tutup Video">
                                    Tutup
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
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#16a34a] block">
                    ULASAN TESTIMONIAL PELANGGAN
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Cerita Nyata Dari Klien Kami
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Bukan hanya menyelesaikan proyek, tapi juga menciptakan pengalaman dan kenyamanan bermakna.
                </p>
            </div>

            <!-- Testimonial Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testi)
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-2xs flex flex-col justify-between space-y-4 hover:shadow-md transition-shadow">
                        <div class="space-y-3">
                            <p class="text-xs sm:text-sm text-gray-700 leading-relaxed italic">
                                "{{ $testi['text'] }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                            <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] font-black text-xs flex items-center justify-center shrink-0">
                                {{ $testi['initials'] }}
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900 leading-tight">{{ $testi['name'] }}</h4>
                                <p class="text-[11px] text-gray-400">{{ $testi['role'] }} / {{ $testi['loc'] }}</p>
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
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Proses Tertata Untuk Hasil Sempurna
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Setiap Tahapan Dirancang untuk Menjamin Kesempurnaan. Dari Perencanaan Hingga Eksekusi, Semua Terkelola dengan Presisi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-100 shadow-2xs space-y-3 relative">
                    <span class="text-3xl font-black text-[#820003] block">01</span>
                    <h3 class="text-lg font-bold text-gray-900">Konsultasi & Penjadwalan Cepat</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Diskusikan kebutuhan spesifik Anda bersama Customer Care kami via WhatsApp. Kami berikan estimasi transparan dan jadwalkan kunjungan tepat waktu.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-100 shadow-2xs space-y-3 relative">
                    <span class="text-3xl font-black text-[#16a34a] block">02</span>
                    <h3 class="text-lg font-bold text-gray-900">Fase Eksekusi Profesional & Berkualitas</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Tenaga kerja ahli pilihan kami hadir on-site dengan peralatan lengkap dan material terstandar, bekerja disiplin mengikuti SOP ketat.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-100 shadow-2xs space-y-3 relative">
                    <span class="text-3xl font-black text-[#820003] block">03</span>
                    <h3 class="text-lg font-bold text-gray-900">Quality Control & Aktivasi Garansi</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Pemeriksaan hasil akhir bersama klien untuk memastikan kepuasan menyeluruh. Jika ada yang belum sesuai, kami perbaiki tuntas bergaransi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. BANNER CTA KONSULTASI (GAMBAR 3 WITH KENZO YANUAR) + URGENCY CLOSING -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Hook Heading -->
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ $ctaHook }}
                </h3>
                <p class="text-xs sm:text-sm text-gray-600">
                    Klik tombol di bawah dan dapatkan konsultasi gratis + penawaran spesial hari ini!
                </p>
            </div>

            <!-- Card Banner Gambar 3 Exact Layout -->
            <div class="relative bg-[#d6d8db] rounded-3xl overflow-hidden shadow-xl border border-gray-300">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                    <!-- Left Content -->
                    <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 space-y-4 z-10">
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight leading-snug">
                            Konsultasi Masalah dan Perawatan Rumah Gratis
                        </h3>
                        <p class="text-gray-700 text-xs sm:text-sm sm:leading-relaxed max-w-xl">
                            Ceritakan kebutuhan Anda, kami siap bantu jadwalkan kunjungan tenaga ahli untuk solusi rumah bersih dan terawat.
                        </p>
                        <div class="pt-3">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="inline-flex items-center gap-2.5 px-6 sm:px-8 py-3.5 rounded-full bg-[#16a34a] hover:bg-[#15803d] text-white font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all active:scale-95">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Konsultasi Dengan Ahlinya</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Image: Kenzo Yanuar (CEO) -->
                    <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end pt-4 lg:pt-0 overflow-hidden">
                        <img src="/images/kenzo-yanuar.png" alt="Kenzo Yanuar - CEO Koota Production" class="w-auto h-72 sm:h-80 md:h-96 object-contain object-bottom select-none">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. PERTANYAAN YANG SERING DITANYAKAN (7 FAQ ITEMS) & 13. PUNYA PERTANYAAN LAIN? -->
    <section class="py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#820003] block">
                    FAQ
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Pertanyaan yang Sering Ditanyakan
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Kami rangkum info penting agar Anda lebih yakin dan mudah dalam mengambil keputusan.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Left: 7 FAQ Items -->
                <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                    @foreach($faqsList as $idx => $f)
                        <div class="border-b border-gray-200 pb-4">
                            <button @click="activeFaq = (activeFaq === {{ $idx + 1 }} ? null : {{ $idx + 1 }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#16a34a] transition-colors">
                                    {{ $f['q'] }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180 text-[#16a34a]': activeFaq === {{ $idx + 1 }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="activeFaq === {{ $idx + 1 }}" x-collapse class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed pr-6">
                                {{ $f['a'] }}
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
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20tanya-tanya%20layanan%20{{ urlencode($service->title) }}." target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Hubungi Konsultan Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
