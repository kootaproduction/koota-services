<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class UpdatePostContentSeeder extends Seeder
{
    public function run(): void
    {
        $postsData = [
            'kelola-sampah-rumah-tangga-bebas-bau' => [
                'title' => 'Kelola Sampah Rumah Tangga Secara Teratur: Bebas Bau dan Ramah Lingkungan',
                'excerpt' => 'Tips memilah sampah organik dapur dan jadwal pengangkutan sampah teratur agar lingkungan perumahan tetap asri, higienis, dan sehat.',
                'content' => '<p class="lead">Tumpukan sampah basah di pekarangan rumah bukan hanya merusak estetika dan kenyamanan hunian, tetapi juga menjadi sumber timbulnya bau menyengat serta tempat bersarangnya lalat, kecoa, dan kuman patogen. Pengelolaan sampah rumah tangga yang disiplin dan teratur adalah kunci utama menciptakan lingkungan tempat tinggal yang sehat dan higienis.</p>

<h2>1. Memisahkan Sampah Basah (Organik) dan Sampah Kering</h2>
<p>Langkah pertama yang paling efektif adalah memisahkan limbah dapur organik (seperti sisa sayuran, kulit buah, tulang ayam, dan ampas makanan) dari kemasan kering seperti plastik, karton kardus, dan kaleng. Sampah organik mengandung kadar air tinggi yang cepat membusuk dan mengeluarkan gas metana berbau tajam jika dicampur dalam wadah tertutup bersama sampah lainnya.</p>
<ul>
    <li><strong>Wadah Khusus Dapur:</strong> Sediakan tempat sampah tertutup khusus sampah organik di area wastafel dapur dengan kantong tersendiri.</li>
    <li><strong>Keringkan Tiriskan Air:</strong> Tiriskan sisa makanan basah sebelum dibuang agar genangan air lindi tidak mengendap di dasar tempat sampah.</li>
    <li><strong>Gunakan Penyerap Alami:</strong> Letakkan sedikit ampas kopi kering atau baking soda di dasar tempat sampah untuk menetralisir aroma tidak sedap secara alami.</li>
</ul>

<h2>2. Menghindari Penumpukan Lebih dari 24 Jam</h2>
<p>Suhu iklim tropis mempercepat proses pembusukan sisa makanan organik. Sangat disarankan untuk tidak membiarkan sampah sisa makanan berada di dalam rumah lebih dari satu malam.</p>
<p>Pindahkan kantong sampah ke tempat sampah luar berpenutup rapat yang aman dari jangkauan hewan peliharaan atau kucing liar setiap malam sebelum jadwal pengambilan tiba.</p>

<h2>3. Pentingnya Berlangganan Pengangkutan Sampah Terjadwal</h2>
<p>Banyak warga klaster perumahan maupun pengelola lingkungan menghadapi masalah penumpukan sampah akibat jadwal pengangkutan umum yang tidak menentu. Di sinilah peran armada profesional seperti <strong>KOOTA SERVICES</strong> menjadi solusi nyata.</p>
<p>Dengan armada truk bak tertutup yang higienis dan jadwal penjemputan teratur (mulai dari 3 kali seminggu hingga penjemputan harian), lingkungan hunian Anda dipastikan bebas tumpukan kantong sampah yang tercecer di pinggir jalan.</p>

<h2>4. Pengelolaan Sampah Non-Organik dan Barang Bekas Besar (Bulky Waste)</h2>
<p>Selain sampah dapur, hunian sering kali memiliki sampah berukuran besar seperti kardus pindahan, perabotan kayu yang lapuk, kasur busa rusak, hingga ranting hasil pemangkasan taman. Jangan mencampurnya dengan sampah harian karena dapat menyumbat dan merusak bak penampungan.</p>
<p>Gunakan layanan penjemputan insidental (on-demand bulky waste) agar sampah ukuran besar dapat dievakuasi langsung tanpa menunggu jadwal kerja bakti warga.</p>',
            ],
            '5-tips-kebersihan-rumah-bebas-tungau' => [
                'title' => '5 Tips Menjaga Kebersihan dan Higienitas Rumah Agar Bebas Tungau & Alergen',
                'excerpt' => 'Menjaga rumah tetap sehat bukan sekadar menyapu dan mengepel. Pelajari langkah deep cleaning rutin untuk mencegah tungau kasur dan alergen.',
                'content' => '<p class="lead">Tungau debu rumah (dust mites) adalah organisme mikroskopis yang hidup di serat kain kasur, sofa kain, bantal, karpet, dan gorden. Keberadaan tungau dan kotorannya merupakan pemicu utama alergi bersin-bersin di pagi hari, gatal kulit eksim, serta kambuhnya gejala asma.</p>

<h2>1. Mencuci Seprai dan Sarung Bantal dengan Air Panas</h2>
<p>Mencuci seprai minimal sekali seminggu dengan suhu air 50–60°C sangat efektif melumpuhkan tungau serta mengangkat sel kulit mati yang menjadi sumber makanannya. Jika menggunakan mesin cuci biasa, jemur kasur dan bantal di bawah terik matahari langsung secara berkala.</p>

<h2>2. Rutin Menyedot Debu dengan Filter HEPA</h2>
<p>Vakum biasa sering kali hanya menyedot debu kasar dan justru menyemburkan kembali partikel mikro tungau ke udara. Gunakan vakum dengan filter HEPA (High-Efficiency Particulate Air) atau layanan hydro-vacuum bertekanan air tinggi yang mampu menangkap partikel hingga 0,3 mikron.</p>

<h2>3. Mengurangi Kelembapan Ruangan</h2>
<p>Tungau berkembang biak sangat pesat pada tingkat kelembapan ruangan di atas 60%. Gunakan dehumidifier atau nyalakan mode dry pada AC di kamar tidur Anda. Pastikan ventilasi udara terbuka setiap pagi agar sirkulasi udara segar bertukar dengan baik.</p>

<h2>4. Deep Cleaning Sofa dan Karpet Secara Berkala</h2>
<p>Karpet bulu dan sofa kain menyerap keringat, debu, dan tumpahan minuman. General cleaning harian tidak mampu menjangkau busa bagian dalam. Lakukan pembersihan mendalam (deep cleaning & extraction) minimal 3–6 bulan sekali bersama tim profesional KOOTA SERVICES.</p>

<h2>5. Hindari Menumpuk Barang di Kamar Tidur</h2>
<p>Tumpukan pakaian, boneka berbulu, dan kardus buku di sudut kamar menjadi perangkap debu ideal bagi tungau. Simpan barang dalam wadah plastik tertutup rapat agar mudah dilap dan dibersihkan.</p>',
            ],
            'panduan-deteksi-pipa-bocor-listrik' => [
                'title' => 'Panduan Perawatan Rumah: Cara Cepat Deteksi Pipa Bocor dan Masalah Kelistrikan',
                'excerpt' => 'Kenali tanda-tanda awal kebocoran air tersembunyi dan indikasi korsleting listrik sebelum merusak struktur plafon serta dinding rumah Anda.',
                'content' => '<p class="lead">Kerusakan instalasi air dan kelistrikan sering kali tidak terlihat secara kasat mata hingga terjadi rembesan parah pada plafon gypsum atau pemadaman MCB secara mendadak. Mengetahui tanda-tanda awal kerusakan struktural dapat menghemat jutaan rupiah biaya perbaikan.</p>

<h2>1. Mengamati Putaran Meteran Air Saat Keran Ditutup</h2>
<p>Cara termudah mendeteksi pipa bocor di dalam tanah atau dinding adalah dengan mematikan seluruh keran air di rumah (termasuk stop kran tandon dan mesin cuci). Perhatikan jarum meteran PDAM atau indikator pompa air. Jika jarum masih berputar halus atau pompa otomatis sering menyala tanpa digunakan, dipastikan terjadi kebocoran pipa instalasi.</p>

<h2>2. Bercak Lembap dan Cat Mengelupas pada Dinding</h2>
<p>Air yang merembes di dalam jalur pipa dinding akan menciptakan noda bercak kuning kecokelatan, lapisan cat yang menggelembung, serta bau apek di sudut ruangan. Jika dibiarkan, kelembapan ini memicu pertumbuhan jamur hitam berbahaya bagi pernapasan.</p>

<h2>3. Deteksi Masalah Kelistrikan: MCB Sering Turun (Trip)</h2>
<p>Jika sakelar MCB di panel utama sering turun saat menyalakan alat elektronik berdaya sedang, ini menandakan beban sirkuit tidak seimbang atau terjadi arus bocor pada kabel instalasi. Hindari menaikkan daya sekring sembarangan tanpa memeriksa kondisi kabel.</p>

<h2>4. Stop Kontak Hangat atau Mengeluarkan Bau Sangit</h2>
<p>Stop kontak atau sakelar yang terasa hangat saat disentuh merupakan indikasi sambungan kabel kendor (loose contact). Kondisi ini dapat memicu percikan bunga api mikro yang menjadi penyebab utama korsleting dan kebakaran rumah tangga.</p>

<h2>5. Solusi Tepat: Panggil Teknisi Bersertifikat KOOTA</h2>
<p>Jangan membongkar dinding atau memperbaiki jalur kabel utama sendiri tanpa peralatan pengaman memadai. Tim tukang berpengalaman KOOTA SERVICES siap melakukan deteksi pipa bocor dan inspeksi kelistrikan dengan alat thermoview dan multitester presisi tinggi.</p>',
            ],
        ];

        foreach ($postsData as $slug => $data) {
            $post = Post::where('slug', $slug)->first();
            if ($post) {
                $post->update($data);
            }
        }
    }
}

