<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Transformation;
use Illuminate\Database\Seeder;

class TransformationAndTestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $homeCleaning = Service::where('slug', 'home-cleaning')->first();
        $perbaikan = Service::where('slug', 'perbaikan-rumah')->first();
        $sampah = Service::where('slug', 'pengangkutan-sampah')->first();

        // 1. Transformations (Before & After)
        $transformations = [
            [
                'service_id' => $homeCleaning?->id,
                'title' => 'Kuras & Sanitasi Total Toren Air 1.500 Liter',
                'category' => 'Home Cleaning',
                'image_before' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=800&q=80',
                'image_after' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80',
                'description' => 'Pembersihan endapan lumut kerak hitam tebal 5 tahun dan lumpur dasar tandon air menggunakan chemical food-grade aman tanpa merusak struktur toren.',
                'location' => 'Surabaya Barat',
                'duration' => '3 Jam Pengerjaan',
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'service_id' => $homeCleaning?->id,
                'title' => 'Hydro-Vacuum Sedot Tungau Kasur King Size & Sofa',
                'category' => 'Home Cleaning',
                'image_before' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=800&q=80',
                'image_after' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=800&q=80',
                'description' => 'Ekstraksi debu mikro dan tungau hingga serat kain terdalam dengan filter HEPA standar medis. Mengatasi masalah alergi kulit dan saluran pernapasan.',
                'location' => 'Malang',
                'duration' => '2 Jam Pengerjaan',
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'service_id' => $perbaikan?->id,
                'title' => 'Waterproofing & Perbaikan Atap Dak Beton Rembes Parah',
                'category' => 'Perbaikan Rumah',
                'image_before' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=800&q=80',
                'image_after' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
                'description' => 'Injeksi celah retak dak beton, perataan talang air seng, dan pelapisan serat fiber membrane 3 lapis bergaransi anti-bocor 12 bulan.',
                'location' => 'Denpasar, Bali',
                'duration' => '2 Hari Kerja',
                'order' => 3,
                'is_featured' => true,
            ],
            [
                'service_id' => $sampah?->id,
                'title' => 'Evakuasi Puing Sisa Bongkaran Rumah & Limbah Bulky',
                'category' => 'Pengangkutan Sampah',
                'image_before' => 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=800&q=80',
                'image_after' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80',
                'description' => 'Pembersihan 2 dump truck puing semen, pecahan genteng, sisa kayu lapuk, dan perabotan lama bekas renovasi ruko hingga bersih tuntas.',
                'location' => 'Jakarta Selatan',
                'duration' => '1 Hari Kerja',
                'order' => 4,
                'is_featured' => true,
            ],
        ];

        foreach ($transformations as $t) {
            Transformation::create($t);
        }

        // 2. Testimonials (Client Reviews)
        $testimonials = [
            [
                'service_id' => $homeCleaning?->id,
                'client_name' => 'Bpk. Hendra Wijaya',
                'client_title' => 'Pemilik Rumah di Citraland',
                'rating' => 5,
                'content' => 'Pelayanan deep cleaning KOOTA sangat memuaskan! Toren air yang sudah bertahun-tahun berlumut tebal dibersihkan sampai jernih seperti baru. Teknisi datang tepat waktu dan ramah sekali.',
                'avatar' => null,
                'location' => 'Surabaya',
                'order' => 1,
                'is_published' => true,
            ],
            [
                'service_id' => $perbaikan?->id,
                'client_name' => 'Ibu Maria Kusuma',
                'client_title' => 'Pengelola Villa Sanur',
                'rating' => 5,
                'content' => 'Atap dak vila kami rembes setiap kali hujan lebat. Tim tukang dari KOOTA langsung tanggap mengecek titik bocor, penawaran transparan tanpa biaya aneh-aneh, dan sekarang sudah 3 bulan tidak ada bocor sama sekali!',
                'avatar' => null,
                'location' => 'Bali',
                'order' => 2,
                'is_published' => true,
            ],
            [
                'service_id' => $sampah?->id,
                'client_name' => 'Pak Dimas Aryanto',
                'client_title' => 'Owner Restoran & Kafe',
                'rating' => 5,
                'content' => 'Langganan angkut sampah komersial KOOTA sangat membantu operasional kafe kami. Armada truk datang rutin sesuai jadwal, bak tertutup rapi jadi tidak ada bau tercecer. Sangat profesional!',
                'avatar' => null,
                'location' => 'Malang',
                'order' => 3,
                'is_published' => true,
            ],
            [
                'service_id' => $homeCleaning?->id,
                'client_name' => 'dr. Anita Larasati',
                'client_title' => 'Dokter Spesialis Anak',
                'rating' => 5,
                'content' => 'Anak saya sensitif debu dan gatal alergi. Setelah kasur dan sofa disedot hydro-vacuum oleh tim KOOTA, kualitas tidur keluarga jadi jauh lebih nyenyak. Hasil kotoran filternya ditunjukkan langsung ke kami. Sangat terpercaya.',
                'avatar' => null,
                'location' => 'Jakarta Selatan',
                'order' => 4,
                'is_published' => true,
            ],
        ];

        foreach ($testimonials as $testi) {
            Testimonial::create($testi);
        }
    }
}

