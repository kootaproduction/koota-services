<?php

namespace Database\Seeders;

use App\Models\ChatbotKnowledge;
use Illuminate\Database\Seeder;

class ChatbotKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $knowledges = [
            // Kategori: Layanan Utama & Paket
            [
                'category' => 'Home Cleaning',
                'question' => 'Apa saja layanan Home Cleaning yang disediakan KOOTA Services?',
                'keywords' => 'home cleaning, cleaning service, pembersihan rumah, cuci rumah, deep cleaning, bersih rumah, general cleaning, sanitasi',
                'answer' => "KOOTA Services menyediakan layanan kebersihan komprehensif, meliputi:\n1. Deep Cleaning menyeluruh untuk hunian baru/pascarenovasi.\n2. General Cleaning harian & berkala.\n3. Pembersihan kerak kamar mandi membandel & jamur kaca.\n4. Sedot tungau kasur, sofa, dan karpet dengan teknologi hydro-vacuum HEPA.\n5. Kuras & sanitasi toren/tandon air bersih.\n\nAnda dapat berkonsultasi atau memesan langsung melalui menu Konsultasi atau WhatsApp 0812-1759-7109.",
                'order' => 1,
            ],
            [
                'category' => 'Home Cleaning',
                'question' => 'Apakah melayani sedot tungau kasur, sofa, dan karpet?',
                'keywords' => 'sedot tungau, tungau kasur, cuci sofa, cuci kasur, vakum tungau, hydro vacuum, alergi debu, pembersihan karpet',
                'answer' => "Ya, kami melayani hydro-vacuum sedot tungau untuk kasur, sofa kain, bantal, gorden, dan karpet menggunakan mesin vakum berfilter HEPA berstandar medis yang mampu mengangkat mikroorganisme dan sel kulit mati hingga serat terdalam.",
                'order' => 2,
            ],
            [
                'category' => 'Home Cleaning',
                'question' => 'Apakah melayani cuci toren dan kuras tandon air?',
                'keywords' => 'cuci toren, kuras tandon, toren air, tandon air, tangki air, kuras toren, lumut toren, air kotor',
                'answer' => "Ya! Kami menyediakan jasa kuras dan pembersihan tandon/toren air atas maupun tandon tanam bawah tanah. Dikerjakan dengan pembersih aman yang meluruhkan lumut dan endapan lumpur tanpa merusak dinding tandon, memastikan pasokan air keluarga kembali bersih higienis.",
                'order' => 3,
            ],

            // Kategori: Perbaikan Rumah
            [
                'category' => 'Perbaikan Rumah',
                'question' => 'Apa saja jasa Perbaikan Rumah dan Tukang yang dilayani?',
                'keywords' => 'perbaikan rumah, tukang, jasa tukang, renovasi, servis rumah, tukang bangunan, perbaikan atap, cat rumah, instalasi',
                'answer' => "Layanan Perbaikan Rumah KOOTA mencakup:\n1. Perbaikan kebocoran atap genteng, talang seng, dan waterproofing dak beton.\n2. Deteksi & perbaikan pipa air bocor atau mampet.\n3. Perbaikan kelistrikan, korsleting MCB, dan penambahan titik stop kontak/lampu.\n4. Pengecatan dinding interior, eksterior, dan plafon gypsum.\n5. Perbaikan kusen pintu, jendela, keramik pecah, dan renovasi ruangan.",
                'order' => 4,
            ],
            [
                'category' => 'Perbaikan Rumah',
                'question' => 'Bagaimana jika atap rumah saya bocor atau dinding rembes air saat hujan?',
                'keywords' => 'atap bocor, talang bocor, dak rembes, dinding rembes, plafon basah, waterproofing, bocor musim hujan',
                'answer' => "Tim tukang ahli KOOTA siap melakukan inspeksi titik kebocoran pada talang air, sambungan nok genteng, maupun retak rambut dinding. Kami menggunakan material waterproofing serat fiber premium bergaransi agar masalah bocor tuntas sebelum musim hujan tiba.",
                'order' => 5,
            ],
            [
                'category' => 'Perbaikan Rumah',
                'question' => 'Apakah menyediakan jasa tukang harian atau borongan?',
                'keywords' => 'tukang harian, tukang borongan, sewa tukang, sistem kerja tukang, biaya tukang',
                'answer' => "Kami menyediakan sistem kerja fleksibel baik harian maupun borongan dengan estimasi transparan (RAB jelas di awal). Semua teknisi kami berpengalaman, terverifikasi identitasnya, dan bekerja dengan standar SOP rapi.",
                'order' => 6,
            ],

            // Kategori: Pengangkutan Sampah & Puing
            [
                'category' => 'Pengangkutan Sampah',
                'question' => 'Apa saja layanan Pengangkutan Sampah yang tersedia?',
                'keywords' => 'pengangkutan sampah, angkut sampah, buang sampah, sampah perumahan, sampah resto, sampah kafe, buang limbah, truk sampah',
                'answer' => "Layanan Pengangkutan Sampah KOOTA meliputi:\n1. Langganan angkut sampah rutin residensial (perumahan/klaster per 2-3 hari sekali).\n2. Pengangkutan sampah komersial volume besar untuk restoran, kafe, dan ruko.\n3. Evakuasi puing sisa bongkaran bangunan/semen/bata pascarenovasi.\n4. Pembuangan barang bekas besar (bulky waste: sofa tua, kasur rusak, lemari lapuk, ranting pohon).",
                'order' => 7,
            ],
            [
                'category' => 'Pengangkutan Sampah',
                'question' => 'Apakah bisa angkut puing sisa renovasi bangunan dan barang bekas berukuran besar?',
                'keywords' => 'buang puing, sisa renovasi, puing bangunan, puing semen, buang kasur bekas, buang sofa, bulky waste, angkut sisa genteng',
                'answer' => "Bisa sekali! Kami memiliki armada truk bak tertutup dan dump truck siap angkut untuk puing semen, batu bata, genteng sisa renovasi, serta sampah berukuran besar (bulky waste) seperti kasur, lemari, atau perabotan lama yang tidak dapat diangkut sampah umum.",
                'order' => 8,
            ],

            // Kategori: Biaya, Harga & Pembayaran
            [
                'category' => 'Biaya & Pembayaran',
                'question' => 'Berapa tarif atau biaya layanan di KOOTA Services?',
                'keywords' => 'biaya, harga, tarif, pricelist, berapa biaya, biaya survei, biaya pembersihan, estimasi harga',
                'answer' => "Biaya layanan disesuaikan secara transparan berdasarkan luas area (m²), volume sampah/puing, atau jenis spesifikasi perbaikan properti Anda. Estimasi biaya diberikan di awal secara terperinci tanpa biaya siluman. Untuk estimasi cepat, silakan kirim detail atau foto lokasi melalui WhatsApp di 0812-1759-7109.",
                'order' => 9,
            ],
            [
                'category' => 'Biaya & Pembayaran',
                'question' => 'Apakah survei lokasi dikenakan biaya?',
                'keywords' => 'survei gratis, biaya survei, cek lokasi, inspeksi gratis, datang ke lokasi, tinjau lokasi',
                'answer' => "Survei lokasi oleh tim teknisi KOOTA Services adalah 100% GRATIS dan tanpa ikatan komitmen untuk seluruh wilayah operasional utama kami (Surabaya, Sidoarjo, Gresik, Malang, Bali, dan Jakarta).",
                'order' => 10,
            ],
            [
                'category' => 'Biaya & Pembayaran',
                'question' => 'Metode pembayaran apa saja yang diterima?',
                'keywords' => 'pembayaran, cara bayar, transfer bank, qris, invoice, bayar transfer, termin, tagihan perusahaan',
                'answer' => "Kami menerima pembayaran via Transfer Bank resmi (BCA, Mandiri, BNI, BRI), QRIS, serta sistem termin/invoice bertempo khusus untuk klien korporat, restoran, pengelola klaster, dan gedung komersial.",
                'order' => 11,
            ],

            // Kategori: Wilayah Operasional & Jadwal
            [
                'category' => 'Wilayah & Jadwal',
                'question' => 'Di kota mana saja KOOTA Services beroperasi?',
                'keywords' => 'wilayah, lokasi, kota, area layanan, surabaya, sidoarjo, gresik, malang, bali, jakarta, denpasar',
                'answer' => "Saat ini KOOTA Services aktif melayani 4 wilayah utama:\n1. Surabaya Raya (Surabaya, Sidoarjo, Gresik)\n2. Malang Raya (Kota Malang, Kab. Malang, Kota Batu)\n3. Bali (Denpasar, Badung, Sanur, Kuta, Ubud)\n4. DKI Jakarta dan kawasan sekitarnya.",
                'order' => 12,
            ],
            [
                'category' => 'Wilayah & Jadwal',
                'question' => 'Kapan jam operasional KOOTA Services dan bagaimana jadwal darurat?',
                'keywords' => 'jam kerja, jam operasional, buka jam berapa, hari libur, emergency, tanggal merah, minggu buka',
                'answer' => "Layanan operasional lapangan buka setiap hari (Senin–Minggu) mulai pukul 07.30 hingga 21.00 WIB. Untuk kebutuhan perbaikan darurat fasilitas (seperti kebocoran pipa air utama atau korsleting darurat), tim piket kami siaga 24 jam via WhatsApp di 0812-1759-7109.",
                'order' => 13,
            ],

            // Kategori: Garansi & Cara Pemesanan
            [
                'category' => 'Umum & Garansi',
                'question' => 'Apakah layanan KOOTA Services memiliki garansi resmi?',
                'keywords' => 'garansi, garansi kerja, jaminan, pengerjaan ulang, komplain, aman tidak, terpercaya',
                'answer' => "Ya, seluruh layanan kami dilindungi Garansi Resmi. Jika hasil pembersihan atau perbaikan belum sesuai checklist standar kesepakatan survei, tim kami siap melakukan pengerjaan ulang (re-cleaning / re-work) tanpa biaya tambahan.",
                'order' => 14,
            ],
            [
                'category' => 'Umum & Garansi',
                'question' => 'Bagaimana cara melakukan reservasi atau pesan layanan?',
                'keywords' => 'cara pesan, reservasi, order, booking, daftar, cara konsultasi, kontak admin',
                'answer' => "Sangat mudah! Anda dapat memesan melalui 2 cara praktis:\n1. Mengisi formulir online di menu website: kootaservice.com/konsultasi\n2. Menghubungi admin langsung via WhatsApp di nomor 0812-1759-7109 (respon cepat kurang dari 15 menit).",
                'order' => 15,
            ],
        ];

        foreach ($knowledges as $k) {
            ChatbotKnowledge::updateOrCreate(
                ['question' => $k['question']],
                $k
            );
        }
    }
}

