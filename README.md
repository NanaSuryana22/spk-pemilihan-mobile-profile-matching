# Sistem Pendukung Keputusan (SPK)

Aplikasi **Sistem Pendukung Keputusan (SPK)** berbasis web yang dibangun menggunakan **Laravel Framework**.  
Aplikasi ini membantu proses pengambilan keputusan dengan melakukan kalkulasi dan pengolahan data secara sistematis.

---

## 📸 Tampilan Aplikasi

### Halaman Dashboard
![Dashboard](public/Image%20SPK/Home_SPK_Recomendation_Car.png)

### Halaman Bantuan
![Alternatif](public/Image%20SPK/Halaman_Bantuan.png)

### Halaman Hasil Perhitungan
![Hasil](public/Image%20SPK/Halaman_Penilaian.png)

---

# 🛠 Tech Stack

Aplikasi ini dibangun menggunakan teknologi berikut:

### Backend
- PHP ^7.3 | ^8.0
- Laravel Framework ^8.65

### Laravel Packages
- Laravel Jetstream
- Laravel Sanctum
- Laravel Tinker
- Laravel UI
- Livewire
- Laravel CORS
- Guzzle HTTP Client

### Development Tools
- PHPUnit
- Faker
- Laravel Breeze
- Laravel Sail
- Mockery
- Laravel Ignition


---

# ⚙️ Instalasi Project (Local Development)

Ikuti langkah berikut untuk menjalankan project di local:

### 1️⃣ Clone Repository
- git clone https://github.com/NanaSuryana22/spk-pemilihan-mobile-profile-matching.git
- cd spk-pemilihan-mobile-profile-matching


### 2️⃣ Install Dependencies
composer update

### 3️⃣ Generate Application Key
php artisan key:generate


### 4️⃣ Setup Database

Buka file `.env` lalu atur konfigurasi database:
- DB_DATABASE=nama_database
- DB_USERNAME=root
- DB_PASSWORD=

### 5️⃣ Migrasi Database
- php artisan migrate

### 6️⃣ Seed Data Awal
- php artisan db:seed

### 7️⃣ Jalankan Server
- php artisan serve
Aplikasi dapat diakses di: http://127.0.0.1:8000

---

# 🔐 Fitur Utama

- Manajemen Data Alternatif
- Manajemen Data Kriteria
- Perhitungan Sistem Pendukung Keputusan
- Hasil Ranking Keputusan
- Autentikasi User (Laravel Jetstream)

---

# 👨‍💻 Developer - © Nana Suryana

Developed using **Laravel Framework**
