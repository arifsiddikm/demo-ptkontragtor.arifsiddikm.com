# PT Kontragtor Indonesia — Company Profile Website

Website company profile untuk perusahaan sewa alat berat konstruksi, dilengkapi admin panel (CMS) untuk mengelola seluruh konten.

🌐 **Live Demo:** [demo-ptkontragtor.arifsiddikm.com](https://demo-ptkontragtor.arifsiddikm.com)

---

## Tech Stack

- **Backend:** PHP 8.3 + Laravel 12
- **Database:** SQLite / MySQL
- **Frontend:** Tailwind CSS CDN · Alpine.js · SweetAlert2
- **Rich Text Editor:** CKEditor5 v41 (local build)
- **Font:** Barlow + Barlow Condensed (Google Fonts)

---

## Fitur

**Frontend Publik**
- Halaman Beranda, Tentang Kami, Alat Berat, Berita, Portofolio, Karir, Kontak
- Filter kategori alat berat
- Form kontak dengan validasi

**Admin Panel** (`/admin`)
- CRUD Alat Berat (deskripsi rich text + spesifikasi teknis)
- CRUD Artikel / Berita
- CRUD Portofolio / Proyek
- CRUD Lowongan Karir
- Kelola Pesan Masuk
- Upload gambar via URL atau file lokal

---

## Instalasi

```bash
# 1. Clone repo
git clone https://github.com/arifsiddikm/ptkontragtor.git
cd ptkontragtor

# 2. Install dependencies
composer install

# 3. Copy dan konfigurasi .env
cp .env.example .env
php artisan key:generate

# 4. Setup database (SQLite default)
touch database/database.sqlite
php artisan migrate
php artisan db:seed

# 5. Install CKEditor5 (wajib)
npm install ckeditor5@41.4.2
mkdir -p public/vendor/ckeditor5
cp node_modules/ckeditor5/dist/browser/index.umd.js public/vendor/ckeditor5/ckeditor5.umd.js
cp node_modules/ckeditor5/dist/browser/index.css public/vendor/ckeditor5/ckeditor5.css

# 6. Storage link
php artisan storage:link

# 7. Jalankan server
php artisan serve
```

Akses di `http://localhost:8000`

---

## Login Admin

```
URL   : http://localhost:8000/admin/login
Email : admin@kontragtor.com
Pass  : admin123
```

---

## Konfigurasi MySQL (opsional)

Edit `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ptkontragtor
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan ulang:
```bash
php artisan migrate
php artisan db:seed
```

---

### Support me on
<a href="https://saweria.co/arifsiddikm" target="_blank"><img src="https://user-images.githubusercontent.com/26188697/180601310-e82c63e4-412b-4c36-b7b5-7ba713c80380.png" alt="Sawer me" height="41" width="174"></a>
