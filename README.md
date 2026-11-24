<p align="center">
  <img src="public/images/logo.png" width="180" alt="KOOTA SERVICES Logo">
</p>

<h1 align="center">KOOTA SERVICES</h1>

<p align="center">
  <strong>Solusi Fasilitas Terintegrasi — One-Stop Facility Services</strong><br>
  <em>Surabaya • Malang • Bali • Jakarta</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/TailwindCSS-4.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/SQLite-Database-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
</p>

---

## 📋 Tentang Proyek

**KOOTA SERVICES** adalah website company profile profesional untuk perusahaan penyedia layanan perawatan fasilitas terpadu (Integrated Facility Care & Maintenance).

### 🎯 Konsep Akses Pengguna & Admin:
* **Pengunjung Publik (Klien/Customer):**
  * **Tidak memerlukan login atau registrasi sama sekali.**
  * Pengunjung dapat langsung mengakses profil perusahaan, katalog layanan, galeri portofolio, artikel edukasi/blog, estimasi biaya, serta reservasi dan konsultasi online via WhatsApp.
* **Administrator:**
  * Khusus untuk pengelola website melalui panel internal (`/admin`).
  * Admin memiliki hak penuh untuk menambah, mengedit, dan menghapus konten (katalog proyek, foto Before-After, artikel blog, ulasan klien, dsb).

---

## 🛠️ Layanan Utama KOOTA SERVICES

Website ini mengusung **3 Pilar Layanan Utama** perawatan fasilitas:

| No | Layanan Utama | Lingkup Pengerjaan |
|:--:|:--------------|:-------------------|
| 1 | **Home Cleaning** *(Facility Care)* | Pembersihan harian (Daily), General Cleaning, sanitasi mendalam (Deep Cleaning), Hydro Cleaning sedot tungau kasur/sofa, sterilisasi disinfektan, dan pembersihan pascarenovasi. |
| 2 | **Perbaikan Rumah** *(Maintenance & Handyman)* | Jasa tukang bersertifikat, instalasi kelistrikan, penanganan saluran pipa air bocor, servis AC, pengecatan dinding presisi, perbaikan atap, serta renovasi interior. |
| 3 | **Pengangkutan Sampah** *(Waste Management)* | Pengangkutan limbah terjadwal untuk hunian residensial, kafe, ruko bisnis, serta pembuangan puing sisa material renovasi bangunan dengan armada dump truck tertutup. |

---

## ⚡ Cara Menjalankan Aplikasi di Laptop / PC

Anda dapat menjalankan website ini dengan salah satu dari dua cara di bawah ini:

### 🟢 Opsi 1: Menggunakan Laragon (Sangat Mudah & Direkomendasikan)
Karena project ini berada di direktori Laragon (`c:\laragon\www\koota_service\koota-services`):

1. **Buka aplikasi Laragon** di Windows.
2. Klik tombol **"Start All"** (Web server Apache dan MySQL akan menyala otomatis di latar belakang).
3. **Compile asset frontend** (jalankan sekali di terminal):
   ```bash
   npm run build
   ```
4. **Buka Browser:**
   * Website Publik: `http://localhost/koota_service/koota-services/public` atau domain virtual host Laragon (misal: `http://koota-services.test`).
   * Panel Admin: `http://localhost/koota_service/koota-services/public/admin`
   > *Catatan: Jika memakai Laragon, Anda **tidak wajib** mengetik `php artisan serve`.*

---

### 💻 Opsi 2: Menggunakan Terminal / CLI Laravel

Jika tidak menggunakan Apache bawaan Laragon, Anda bisa menjalankannya via terminal:

1. **Jalankan Backend Server (Terminal 1):**
   ```bash
   php artisan serve
   ```
   > Server aktif di: `http://127.0.0.1:8000`

2. **Jalankan Frontend Asset (Terminal 2):**
   ```bash
   npm run dev
   ```
   *(Atau jalankan `npm run build` jika tidak ingin membuka terminal kedua).*

3. **Buka Browser:**
   * Website Publik: `http://127.0.0.1:8000`
   * Panel Admin: `http://127.0.0.1:8000/admin`

---

## 🔐 Akses Admin Panel & Kredensial

Panel admin dilindungi dengan middleware otentikasi Laravel. Pengunjung umum yang mencoba membuka halaman admin akan diarahkan otomatis ke halaman login.

| Informasi | Kredensial |
|:----------|:-----------|
| **URL Akses** | `http://127.0.0.1:8000/admin` *(atau klik tautan halus `• Admin Area` di footer website)* |
| **Email Login** | `admin@kootaservice.com` |
| **Username Alternatif** | `admin` |
| **Kata Sandi (Password)** | `admin123` *(atau `password`)* |

---

## 📸 Langkah Penting: Menghubungkan Penyimpanan Gambar

Agar setiap gambar yang Anda upload dari panel admin (foto portofolio, sampul artikel, Before-After) **langsung muncul di halaman publik**, pastikan symlink storage sudah aktif dengan perintah:

```bash
php artisan storage:link
```
> Perintah ini menghubungkan folder `storage/app/public` ke folder publik `public/storage`. Anda hanya perlu menjalankannya satu kali saja.

---

## 📝 Panduan Praktis Menambah Konten & Gambar

Setelah login ke panel admin (`/admin`), Anda dapat mengelola seluruh konten dengan mudah:

### 1. Menambah Portofolio Proyek & Galeri Foto
1. Masuk ke menu **Project & Katalog Foto** di sidebar admin.
2. Klik tombol **Tambah Project Baru**.
3. Isi data:
   * **Judul Project:** Contoh *"Deep Cleaning & Sanitasi Gedung Graha Pratama"*.
   * **Layanan Terkait & Kategori:** Pilih layanan terkait (Home Cleaning / Perbaikan Rumah / Pengangkutan Sampah).
   * **Upload Foto Utama:** Klik *Browse File* dari komputer Anda (preview gambar langsung muncul). Anda juga bisa memasukkan URL gambar jika diinginkan.
   * **Katalog Foto Tambahan (Multi-Upload):** Pilih beberapa foto sekaligus untuk dijadikan galeri album di halaman detail proyek.
   * **Video Reels / Shorts:** Masukkan link YouTube Shorts atau Instagram Reels (rasio 9:16).
4. Klik **Simpan Project**. Proyek baru akan langsung muncul di halaman `/portofolio` dan di halaman detail layanan terkait.

### 2. Menambah Artikel Blog Baru
1. Masuk ke menu **Blog / Artikel**.
2. Klik tombol **Tambah Artikel Baru**.
3. Masukkan judul artikel, pilih kategori, dan tulis isi konten artikel.
4. Upload gambar sampul (thumbnail) dari laptop Anda.
5. Klik **Simpan Artikel**. Artikel otomatis tampil di halaman `/blog`.

### 3. Menambah Transformasi Kondisi (Before & After)
1. Masuk ke menu **Transformasi Before-After**.
2. Klik **Tambah Transformasi**.
3. Upload foto kondisi awal (**Before**) dan kondisi bersih/rapi setelah pengerjaan (**After**).
4. Tentukan judul pekerjaan dan kategori layanan.
5. Simpan data. Kartu interaktif before-after akan langsung tampil di beranda website.

### 4. Mengubah Hero Banner & Deskripsi Layanan
1. Masuk ke menu **Layanan (Services)**.
2. Pilih layanan yang ingin diedit, lalu klik **Edit**.
3. Anda dapat mengganti banner utama, deskripsi layanan, teks tombol WhatsApp, maupun urutan tampil.

### 5. Mengaktifkan Mode Pemeliharaan (Maintenance Mode)
1. Buka menu **Dashboard & Status**.
2. Anda dapat mengaktifkan saklar Maintenance sewaktu-waktu jika website sedang dalam perbaikan. Website publik akan menampilkan halaman maintenance yang rapi, sementara admin tetap bisa mengakses dashboard.

---

## 🚀 Panduan Setup dari Awal (Fresh Install / Device Baru)

Jika Anda memindahkan proyek ini ke laptop atau komputer lain:

```bash
# 1. Masuk ke direktori proyek
cd koota-services

# 2. Pasang dependensi PHP & JavaScript
composer install
npm install

# 3. Buat file .env dan generate key
cp .env.example .env
php artisan key:generate

# 4. Siapkan database SQLite dan seeder awal
php artisan migrate:fresh --seed

# 5. Hubungkan link penyimpanan file upload
php artisan storage:link

# 6. Kompilasi asset frontend
npm run build
```

---

## 📦 Daftar Perintah Berguna (Cheat Sheet)

| Perintah | Fungsi |
|:---------|:-------|
| `php artisan storage:link` | Menghubungkan penyimpanan gambar ke folder web publik |
| `php artisan migrate --seed` | Menjalankan migrasi tabel dan mengisi data awal & akun admin |
| `php artisan migrate:fresh --seed` | Reset total database dan mengisi ulang dari awal |
| `npm run build` | Mengompilasi CSS (Tailwind 4) dan JS (Alpine) untuk produksi |
| `npm run dev` | Menjalankan dev server Vite untuk live-reload saat editing |
| `php artisan optimize:clear` | Membersihkan semua cache (route, config, blade views) |
| `php artisan route:list` | Melihat seluruh daftar URL dan route yang aktif |

---

## 🎨 Standar Desain & Warna Resmi KOOTA

* **Warna Utama (Brand Red):** `#ac0c0c` *(Hover: `#8f0a0a`)*
* **Warna Aksen:** White `#ffffff`, Clean Slate Neutral `#0f172a`
* **Font:** *Plus Jakarta Sans* (Modern & Professional Typography)
* **Konsistensi UI:** Mengikuti pedoman UI/UX profesional tanpa ikon informal atau elemen yang saling bertabrakan.

---

## 📞 Kontak & Informasi Perusahaan

* **WhatsApp:** [0812-1759-7109](https://wa.me/6281217597109)
* **Email:** [kootaproduction@gmail.com](mailto:kootaproduction@gmail.com)
* **Wilayah Operasional:** Surabaya, Malang, Bali, Jakarta
* **Tagline:** *"Kita Wujudkan Kota Bersih"*

---

<p align="center">
  <sub>© 2024-2026 KOOTA SERVICES. All rights reserved.</sub>
</p>
