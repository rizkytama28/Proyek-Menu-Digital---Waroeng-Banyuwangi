# Proyek Menu Digital - Waroeng Banyuwangi

[![Contoh Tampilan Menu]((https://mahasiswafin.my.id/))

## 📄 Deskripsi

Proyek ini adalah sebuah sistem menu digital berbasis web yang dirancang untuk restoran "Waroeng Banyuwangi". Aplikasi ini memungkinkan pelanggan untuk melihat menu, memilih pesanan, dan mendapatkan rangkuman pesanan melalui perangkat mobile mereka dengan memindai QR code. Selain itu, terdapat panel admin yang komprehensif untuk mengelola menu, gambar, status ketersediaan, dan memantau analitik pengunjung.

Proyek ini dibangun dari awal menggunakan teknologi web standar dan dirancang agar ringan, cepat, dan mudah digunakan baik oleh pelanggan maupun pengelola restoran.

---

## ✨ Fitur Utama

### Untuk Pelanggan (`index.html`)
* **Tampilan Menu Dinamis:** Memuat semua menu langsung dari database.
* **Latar Belakang Kustom:** Tampilan visual yang menarik dengan latar belakang pattern yang menyatu dengan tema.
* **Filter Kategori:** Tombol filter kategori "melayang" (sticky) yang memungkinkan pelanggan dengan mudah menavigasi antar kategori menu.
* **Pencarian Real-time:** Fitur pencarian untuk menemukan menu secara instan.
* **Pilihan Varian:** Opsi untuk memilih varian menu (misalnya: Bakar, Goreng, Kremes) dengan penyesuaian harga otomatis.
* **Status "Habis":** Indikator visual yang jelas untuk menu yang sedang tidak tersedia.
* **Keranjang Belanja Interaktif:** Menambah, mengurangi, dan menghapus item pesanan dengan mudah.
* **Cetak Struk Pesanan:** Menghasilkan halaman rangkuman pesanan yang ramah cetak (print-friendly) untuk ditunjukkan ke kasir.
* **Integrasi Google Analytics:** Melacak interaksi pengguna, menu terlaris, dan jam sibuk.

### Untuk Admin (`admin.html`) (Untuk Akses dalam lingkup akademik)
* **Sistem Login Aman:** Halaman admin dilindungi oleh username dan password.
* **Dashboard Manajemen:** Tampilan utama untuk mengelola semua aspek menu.
* **Manajemen Menu (CRUD):**
    * **Tambah Menu:** Form intuitif untuk menambahkan menu baru, lengkap dengan pilihan kategori yang sudah ada atau membuat kategori baru.
    * **Edit Menu:** Memperbarui detail menu yang ada, termasuk nama, harga, kategori, dan gambar.
    * **Hapus Menu:** Menghapus menu dari database.
* **Upload Gambar:** Fitur upload file untuk mengganti gambar menu dengan mudah, lengkap dengan pratinjau.
* **Manajemen Status:** Tombol *toggle* untuk mengubah status menu menjadi "Habis" atau "Tersedia" secara real-time.
* **QR Code Generator:** Alat internal untuk membuat dan mengunduh QR code kustom (dengan warna dan logo) yang sudah terproteksi sesi login.

---

## 🛠️ Teknologi yang Digunakan

* **Frontend:**
    * HTML5
    * CSS3 (dengan Tailwind CSS untuk utility classes)
    * JavaScript (ES6+)
* **Backend:**
    * PHP
* **Database:**
    * MySQL (dijalankan melalui XAMPP/MariaDB)
* **Lainnya:**
    * Google Analytics (untuk pelacakan traffic)
    * QRCode.js & QR Code Styling (untuk generator QR code)

---

## 🚀 Panduan Instalasi & Konfigurasi

Untuk menjalankan proyek ini di lingkungan lokal, Anda memerlukan XAMPP.

1.  **Prasyarat:**
    * Pastikan Anda sudah menginstal [XAMPP](https://www.apachefriends.org/).

2.  **Clone Repositori:**
    * Clone atau unduh repositori ini ke dalam folder `htdocs` di direktori instalasi XAMPP Anda (biasanya di `C:\xampp\htdocs\`).
    * Ubah nama folder proyek menjadi `waroeng-banyuwangi`.

3.  **Setup Database:**
    * Jalankan modul Apache dan MySQL dari XAMPP Control Panel.
    * Buka `http://localhost/phpmyadmin` di browser Anda.
    * Buat database baru dengan nama `waroeng_db`.
    * Pilih database `waroeng_db`, lalu klik tab **Import**.
    * Pilih file `xxxxxxxx_waroeng_db.sql` yang ada di repositori ini dan klik **Go**.

4.  **Konfigurasi Koneksi Database:**
    * Buka file `api/db_connect.php`.
    * Sesuaikan variabel `$username`, `$password`, dan `$dbname` jika konfigurasi XAMPP Anda berbeda dari default.
        ```php
        $servername = "localhost";
        $username = "root"; // User default XAMPP
        $password = "";     // Password default XAMPP kosong
        $dbname = "waroeng_db";
        ```

5.  **Jalankan Proyek:**
    * **Halaman Pelanggan:** Buka `https://mahasiswafin.my.id//`

