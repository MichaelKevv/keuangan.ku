# Keuangan.ku - Aplikasi Pencatat Keuangan Pribadi

Keuangan.ku adalah aplikasi web yang dirancang untuk membantu pengguna melacak dan mengelola keuangan pribadi mereka dengan cara yang sederhana dan efisien. Aplikasi ini dibangun menggunakan Laravel 12 dan menyediakan antarmuka yang bersih dan modern untuk mencatat pemasukan, pengeluaran, dan mengelola berbagai akun atau dompet.

![Screenshot Dashboard Keuangan.ku](https://i.imgur.com/0FsgKEZ.png)

## Fitur Utama

- **Dashboard Interaktif:** Visualisasikan ringkasan keuangan bulanan, termasuk total pemasukan, pengeluaran, dan selisihnya. Lihat juga transaksi terakhir secara sekilas.
- **Manajemen Akun/Dompet:** Buat dan kelola beberapa akun (misalnya, dompet tunai, rekening bank) dengan saldo awal yang dapat disesuaikan. Saldo akan diperbarui secara otomatis setiap kali ada transaksi baru.
- **Pencatatan Transaksi:** Catat transaksi pemasukan dan pengeluaran dengan mudah.
- **Manajemen Kategori:** Kelola kategori untuk pemasukan dan pengeluaran, lengkap dengan ikon dan warna khusus untuk identifikasi yang lebih mudah.
- **Dropdown Kategori Dinamis:** Formulir transaksi secara cerdas menyesuaikan daftar kategori berdasarkan jenis transaksi yang dipilih (Pemasukan atau Pengeluaran).
- **Format Input Rupiah:** Input jumlah uang secara otomatis diformat ke dalam format mata uang Rupiah (Rp) saat diketik, memberikan pengalaman pengguna yang lebih baik.
- **Otentikasi Pengguna:** Sistem registrasi dan login yang aman untuk melindungi data keuangan Anda.
- **Profil Pengguna:** Pengguna dapat memperbarui informasi profil dan kata sandi mereka.

## Teknologi yang Digunakan

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Vite, Tailwind CSS, Alpine.js
- **Database:** MySQL
- **Library Tambahan:**
  - DataTables (untuk tabel yang interaktif)
  - Font Awesome (untuk ikon)

## Instalasi & Setup Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan pengembangan lokal Anda.

1.  **Clone Repositori**
    ```bash
    git clone https://github.com/your-username/pencatat-keuangan.git
    cd pencatat-keuangan
    ```

2.  **Install Dependensi Composer**
    ```bash
    composer install
    ```

3.  **Install Dependensi NPM**
    ```bash
    npm install
    ```

4.  **Buat File `.env`**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Kunci Aplikasi**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database**
    Buka file `.env` dan atur koneksi database Anda (nama database, username, password).
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pencatat_keuangan
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat struktur tabel database dan mengisinya dengan data awal (seperti kategori default).
    ```bash
    php artisan migrate --seed
    ```

8.  **Build Aset Frontend**
    ```bash
    npm run build
    ```

9.  **Jalankan Server Pengembangan**
    - Untuk menjalankan server PHP:
      ```bash
      php artisan serve
      ```
    - Untuk mengaktifkan Vite Hot Module Replacement (HMR) selama pengembangan, jalankan di terminal terpisah:
      ```bash
      npm run dev
      ```

Sekarang, Anda dapat mengakses aplikasi di `http://127.0.0.1:8000`.
