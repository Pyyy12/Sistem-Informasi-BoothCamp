# 🚀 JoCamp — Platform Bootcamp Online

<p align="center">
  <strong>Belajar Skill Digital, Bangun Masa Depan Bersama JoCamp!</strong>
</p>

<p align="center">
  Platform bootcamp online berbasis Laravel 11 yang membantu peserta menemukan program pelatihan, mendaftar bootcamp, dan memantau progres belajar dalam satu platform.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5">
</p>

---

## 📖 Tentang JoCamp

**JoCamp** adalah aplikasi web platform bootcamp online yang dikembangkan menggunakan Laravel 11 dan MySQL. Aplikasi ini dirancang dengan tampilan modern, responsif, dan mudah digunakan oleh peserta maupun administrator.

JoCamp menyediakan katalog program bootcamp, informasi detail pelatihan, fitur pendaftaran peserta, serta dashboard untuk membantu pengelolaan program dan aktivitas peserta.

Proyek ini juga dapat dikembangkan lebih lanjut menjadi platform e-learning dengan pembayaran otomatis, materi video, kuis, dan sertifikat digital.

## ✨ Fitur Utama

### 👨‍🎓 Fitur Peserta
- Registrasi akun dan login.
- Melihat katalog program bootcamp.
- Melihat detail program, harga, durasi, dan informasi mentor.
- Mendaftar program bootcamp.
- Melihat daftar pendaftaran bootcamp.
- Memantau status pendaftaran dan progres belajar.
- Dashboard peserta yang mudah digunakan.

### 🛠️ Fitur Administrator
- Dashboard admin.
- Mengelola data program bootcamp.
- Menambah, mengedit, dan menghapus program.
- Mengelola kategori bootcamp.
- Melihat dan mengelola pendaftaran peserta.
- Memperbarui status pendaftaran dan pembayaran.

### 🎨 Antarmuka Pengguna
- Desain modern dan profesional.
- Tampilan responsif untuk desktop, tablet, dan smartphone.
- Navigasi sederhana dan intuitif.
- Halaman landing page yang informatif.
- Komponen antarmuka yang konsisten.

## 🧰 Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| Laravel 11 | Backend dan framework aplikasi |
| PHP 8.2+ | Bahasa pemrograman backend |
| MySQL | Database relasional |
| Blade Template | Sistem templating Laravel |
| Bootstrap 5 | Framework antarmuka |
| HTML5 | Struktur halaman |
| CSS3 | Styling dan desain responsif |
| JavaScript | Interaksi antarmuka |
| Vite | Pengelolaan aset frontend |
| Composer | Dependency management PHP |
| NPM | Dependency management frontend |

## 📋 Persyaratan Sistem

Pastikan perangkat kamu sudah memiliki:

- PHP 8.2 atau versi yang kompatibel dengan Laravel 11.
- Composer.
- MySQL atau MariaDB yang kompatibel.
- Node.js dan NPM.
- Git.
- Web browser modern.

## 🚀 Instalasi dan Menjalankan Project

### 1. Clone repository

```bash
git clone https://github.com/USERNAME/JoCamp.git
```

Masuk ke direktori project:

```bash
cd JoCamp
```

> Ganti `USERNAME` dengan username GitHub pemilik repository.

### 2. Install dependency Laravel

```bash
composer install
```

### 3. Buat file environment

Salin file `.env.example` menjadi `.env`.

Windows Command Prompt:

```bash
copy .env.example .env
```

Linux atau macOS:

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Konfigurasi database

Buat database MySQL dengan nama `jocamp`, kemudian sesuaikan konfigurasi berikut pada file `.env`.

```env
APP_NAME=JoCamp
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jocamp
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password database dengan konfigurasi MySQL pada perangkat kamu.

### 6. Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

Perintah tersebut membuat tabel database dan menjalankan seeder yang tersedia pada project.

### 7. Install dependency frontend

```bash
npm install
```

Jalankan Vite untuk pengembangan frontend:

```bash
npm run dev
```

### 8. Jalankan aplikasi

Buka terminal baru, kemudian jalankan:

```bash
php artisan serve
```

Akses aplikasi melalui browser:

**http://127.0.0.1:8000**

## 📂 Struktur Direktori

```text
JoCamp/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
│   └── css/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── bootcamps/
│       ├── enrollments/
│       └── admin/
├── routes/
│   └── web.php
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

Struktur di atas merupakan gambaran umum. Nama dan isi direktori mengikuti file yang tersedia pada versi repository kamu.

## 🗄️ Database

JoCamp menggunakan database MySQL untuk menyimpan informasi pengguna, program bootcamp, kategori, dan pendaftaran.

| Tabel | Deskripsi |
|---|---|
| `users` | Menyimpan data akun peserta dan admin |
| `categories` | Menyimpan kategori program |
| `bootcamps` | Menyimpan informasi program bootcamp |
| `enrollments` | Menyimpan data pendaftaran peserta |

Relasi antartabel dikelola menggunakan Eloquent ORM Laravel.

## 🛣️ Halaman Aplikasi

Berikut contoh halaman yang disediakan dalam rancangan aplikasi JoCamp.

| URL | Fungsi |
|---|---|
| `/` | Landing page |
| `/bootcamp` | Katalog bootcamp |
| `/bootcamp/{slug}` | Detail bootcamp |
| `/register` | Registrasi peserta |
| `/login` | Login |
| `/dashboard` | Dashboard pengguna |
| `/pendaftaran-saya` | Daftar pendaftaran peserta |
| `/admin` | Dashboard administrator |
| `/admin/bootcamps` | Pengelolaan bootcamp |
| `/admin/enrollments` | Pengelolaan pendaftaran |

Daftar URL dapat berbeda sesuai konfigurasi route pada versi aplikasi yang digunakan.

## 🔐 Keamanan

- Password pengguna disimpan menggunakan hashing Laravel.
- Validasi input dilakukan melalui mekanisme validasi Laravel.
- Akses halaman dibatasi berdasarkan autentikasi dan hak akses.
- File `.env` tidak boleh diunggah ke repository publik.
- Gunakan konfigurasi produksi yang aman sebelum deployment.

**Catatan:** Pastikan middleware, otorisasi admin, dan validasi seluruh endpoint telah diuji sebelum aplikasi digunakan secara publik.

## 💳 Pengembangan Selanjutnya

Fitur berikut dapat menjadi rencana pengembangan JoCamp:

- [ ] Integrasi payment gateway Midtrans atau Xendit.
- [ ] Pembayaran otomatis dan verifikasi transaksi.
- [ ] Materi pembelajaran berbasis video.
- [ ] Kuis dan evaluasi peserta.
- [ ] Sertifikat digital setelah menyelesaikan bootcamp.
- [ ] Notifikasi email.
- [ ] Rating dan ulasan program.
- [ ] Laporan statistik pendaftaran dan pendapatan.

## 🧪 Testing

Untuk menjalankan pengujian aplikasi Laravel:

```bash
php artisan test
```

Pastikan konfigurasi database testing dan environment sudah sesuai sebelum menjalankan pengujian.

## 🤝 Kontribusi

Kontribusi untuk pengembangan JoCamp sangat terbuka.

1. Fork repository ini.
2. Buat branch baru:

   ```bash
   git checkout -b feature/nama-fitur
   ```

3. Simpan perubahan dan buat commit:

   ```bash
   git add .
   git commit -m "Add: fitur baru JoCamp"
   ```

4. Push branch ke GitHub:

   ```bash
   git push origin feature/nama-fitur
   ```

5. Buat Pull Request untuk meninjau perubahan.

## 📄 Lisensi

Proyek ini dapat menggunakan lisensi MIT. Pastikan file `LICENSE` tersedia di repository dan lisensi tersebut memang sesuai dengan pilihan pemilik proyek.

## 👨‍💻 Developer

**JoCamp — Online Bootcamp Platform**

Dikembangkan menggunakan Laravel 11, MySQL, Blade, dan Bootstrap 5.

---

<p align="center">
  <strong>JoCamp — Learn Today, Build Tomorrow. 🚀</strong>
</p>
