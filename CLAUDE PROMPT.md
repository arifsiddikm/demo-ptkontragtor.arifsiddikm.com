# CLAUDE PROMPT — Website Company Profile PT Kontragtor Indonesia Tbk.
### Versi Final · Laravel 12 · Tailwind CDN · CKEditor5 v41 · AlpineJS · SweetAlert2

> Upload prompt ini ke sesi Claude baru dan mulai build. Semua detail teknis, struktur, desain, konten, dan logika sudah tertulis di sini.

---

## 1. RINGKASAN PROYEK

Bangun **website company profile + panel admin** untuk perusahaan sewa alat berat konstruksi bernama **PT Kontragtor Indonesia Tbk.** menggunakan **Laravel 12**. Website ini terdiri dari dua bagian:

- **Frontend publik** — halaman-halaman yang bisa diakses siapa saja
- **Admin panel (webmin)** — panel CMS di balik autentikasi untuk mengelola seluruh konten

**Stack teknologi:**
- PHP 8.3 + Laravel 12
- Database: SQLite (default, bisa ganti ke MySQL)
- CSS: Tailwind CSS via CDN (`https://cdn.tailwindcss.com`) — cukup untuk project ini
- JS interaktif: Alpine.js v3 via CDN
- Dialog/notifikasi: SweetAlert2 via CDN
- Rich text editor (admin): **CKEditor5 v41.4.2** — file lokal di `public/vendor/ckeditor5/` (BUKAN CDN resmi karena require lisensi berbayar)
- Font: Barlow + Barlow Condensed dari Google Fonts
- Gambar: Unsplash CDN (URL langsung, gratis)
- Ikon: SVG inline Heroicons

**Warna brand:** Kuning `#F59E0B` (Tailwind: `yellow-500`) + Hitam/abu

---

## 2. STRUKTUR HALAMAN PUBLIK

### 2.1 Navbar
- Background kuning `bg-yellow-500`, sticky top, shadow
- Logo: kotak hitam bulat dengan inisial **KI** + teks "PT KONTRAGTOR / INDONESIA TBK."
- Menu: Beranda · Tentang Kami · Alat Berat · Berita · Portofolio · Karir · [Hubungi Kami button hitam-kuning] · [Admin kecil transparan]
- Mobile: hamburger toggle dengan Alpine.js `x-data="{ open: false }"`
- Active state: `bg-yellow-600/20`

### 2.2 Homepage (`/`)
**Sections:**
1. **Hero** — full-screen, background image Unsplash konstruksi + overlay gradient, animasi floating shapes (CSS keyframes), border kuning kiri, headline besar uppercase Barlow Condensed, subtitle, 2 CTA button, counter stats (unit tersedia, proyek, tahun pengalaman, klien)
2. **Layanan Unggulan** — 3 card icon: Sewa Alat Berat, Operator Profesional, Perawatan Terjadwal
3. **Alat Berat Unggulan** — grid card dari `Equipment::active()->featured()->latest()->take(6)`, badge status tersedia/tidak, tombol lihat detail
4. **Mengapa Memilih Kami** — section 2 kolom: teks + list keunggulan + gambar, bg abu muda
5. **Proyek Terbaru** — 3 kartu proyek featured dari database, gambar, judul, klien, lokasi
6. **Artikel Terbaru** — 3 artikel terbaru, gambar thumbnail, judul, excerpt, tanggal
7. **CTA Banner** — section kuning penuh, glow effect CSS, teks besar "Butuh Alat Berat?" + tombol hubungi & WhatsApp
8. **Footer** — 4 kolom: brand+sosmed, navigasi, info kontak, map embed

### 2.3 Tentang Kami (`/about`)
- Hero section halaman dalam dengan overlay
- Sejarah perusahaan (teks panjang)
- Visi & Misi
- Tim manajemen (static data)
- Sertifikasi: ISO 9001:2015, ISO 45001:2018, K3
- Counter animasi

### 2.4 Alat Berat (`/equipment` & `/equipment/{slug}`)
**Index:**
- Filter kategori (Excavator, Bulldozer, Crane, dll.) dengan Alpine.js
- Grid card: gambar, nama, kategori, badge status (Tersedia/Tidak Tersedia), tombol detail
- Pagination Laravel

**Detail (`show`):**
- Gambar besar
- Nama, kategori, badge status
- Deskripsi (HTML dari CKEditor, render dengan `{!! $equipment->description !!}`)
- Tabel spesifikasi teknis (parsed dari plain text `Nama: Nilai` per baris)
- Tombol WhatsApp inquiry dengan pesan pre-filled

### 2.5 Berita (`/news` & `/news/{slug}`)
**Index:** Grid artikel, gambar, judul, excerpt, tanggal, penulis, pagination
**Detail (`show`):** Gambar hero, judul, tanggal, penulis, konten HTML dari CKEditor, share sosmed, artikel terkait

### 2.6 Portofolio (`/projects` & `/projects/{slug}`)
**Index:** Grid masonry/card, gambar, judul, klien, lokasi, kategori, pagination
**Detail:** Gambar besar, judul, info klien/lokasi/kategori/tanggal, konten HTML detail

### 2.7 Karir (`/careers` & `/careers/{id}`)
**Index:** List card lowongan: judul, departemen, lokasi, tipe (badge), deadline, gaji
**Detail:** Informasi lengkap, Deskripsi pekerjaan (HTML dari CKEditor), Persyaratan (HTML), tombol Apply via WhatsApp/Email

### 2.8 Hubungi Kami (`/contact`)
- Form: Nama*, Email*, No. HP, Subjek, Pesan*
- Validasi server-side (`ContactRequest`)
- Simpan ke tabel `contact_messages`
- Flash success via SweetAlert
- Info kontak: alamat, telepon, email, jam operasional
- Embed Google Maps

---

## 3. ADMIN PANEL (`/admin`)

### 3.1 Autentikasi
- Login: `GET/POST /admin/login` — email + password
- Logout: `POST /admin/logout` dengan konfirmasi SweetAlert
- Guard: Laravel default auth, middleware `auth`
- Seeder admin: email `admin@kontragtor.com`, password `admin123`

### 3.2 Layout Admin
- Sidebar fixed kiri lebar 240px, background putih, border kanan
- Logo + nama panel di atas sidebar
- Menu sidebar: Dashboard · Alat Berat · Artikel · Portofolio · Karir · Pesan Masuk · [Lihat Website]
- Active state sidebar: `bg-yellow-500 text-black font-bold`
- Topbar sticky: judul halaman + breadcrumb + area action kanan
- Toggle sidebar dengan Alpine.js
- Flash SweetAlert untuk success/error session

### 3.3 Dashboard
- 4 stat card: Total Alat Berat, Artikel, Proyek, Pesan Baru
- Tabel pesan terbaru yang belum dibaca
- Quick links ke halaman tambah

### 3.4 Modul CRUD — **Alat Berat**
**Tabel `equipment`:** `id, name, slug, category, description (text), specifications (text), image (string), status (enum: available/unavailable), is_featured (bool), is_active (bool), timestamps`

**Index:** Tabel dengan kolom nama, kategori, status, unggulan, aktif, aksi (edit/hapus/toggle)
**Form (Tambah & Edit):**
- Nama* (input)
- Kategori* (input + datalist: Excavator, Bulldozer, Crane, Grader, Compactor, Wheel Loader, Dump Truck, Backhoe, Tower Crane, Pile Driver, Concrete Pump, Rough Terrain Crane)
- Status (select: Tersedia / Tidak Tersedia)
- Opsi: checkbox Aktif + checkbox Unggulan
- **Foto/Thumbnail:** tab switch Alpine.js → URL online atau Upload file lokal
- **Deskripsi \*** — **CKEditor5** (lihat §5 untuk implementasi wajib)
- Spesifikasi Teknis — plain `<textarea>` biasa, format `Nama: Nilai` per baris

### 3.5 Modul CRUD — **Artikel**
**Tabel `articles`:** `id, title, slug, excerpt (text nullable), content (longText), image (string nullable), author (string), is_active (bool), published_at (timestamp nullable), timestamps`

**Form (Tambah & Edit):**
- Judul Artikel*
- Ringkasan/Excerpt (textarea biasa, max 400 char)
- Tanggal Publikasi (date input)
- Checkbox Publikasikan
- **Foto/Thumbnail:** tab switch URL / Upload file
- **Konten Artikel \*** — **CKEditor5**

### 3.6 Modul CRUD — **Portofolio (Proyek)**
**Tabel `projects`:** `id, title, slug, excerpt (text nullable), content (longText), image (string nullable), client, location, category, project_date (date nullable), is_active (bool), is_featured (bool), timestamps`

**Form (Tambah & Edit):**
- Judul Proyek*
- Excerpt (textarea biasa)
- Kategori (input + datalist: Infrastruktur, Pertambangan, Konstruksi Gedung, Jalan & Jembatan, Pelabuhan, Bandara, Perumahan, Pertanian, Energi)
- Nama Klien
- Lokasi
- Tanggal Proyek (date)
- Checkbox Aktif + checkbox Unggulan
- **Gambar Thumbnail:** tab switch URL / Upload
- **Konten Detail Proyek \*** — **CKEditor5**

### 3.7 Modul CRUD — **Karir**
**Tabel `careers`:** `id, title, department, location, type (enum: full-time/part-time/contract/internship), description (text), requirements (text), salary_range (string nullable), deadline (date nullable), is_active (bool), timestamps`

**Form (Tambah & Edit):**
- Judul Posisi* + Departemen*
- Lokasi + Tipe Pekerjaan (select) + Deadline
- Range Gaji
- Checkbox Aktifkan
- **Deskripsi Pekerjaan \*** — **CKEditor5** (toolbar lengkap)
- **Persyaratan \*** — **CKEditor5** (toolbar ringkas, fokus bullet list)

### 3.8 Modul — **Pesan Masuk**
**Index:** Tabel semua pesan, kolom nama/email/subjek/tanggal/status baca, badge "Baru" untuk belum dibaca
**Detail:** Tampil full isi pesan, tandai sudah dibaca otomatis saat dibuka
**Hapus:** konfirmasi SweetAlert sebelum delete

### 3.9 Route Upload Gambar CKEditor
```
POST /admin/upload/image → Admin\UploadController@image
```
Controller simpan ke `storage/app/public/uploads/ck/`, return JSON `{ "url": "..." }`.

---

## 4. DATABASE MIGRATIONS

```php
// users
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('role')->default('admin');
    $table->timestamps();
});

// equipment
Schema::create('equipment', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->string('category');
    $table->text('description');
    $table->text('specifications')->nullable();
    $table->string('image')->nullable();
    $table->enum('status', ['available', 'unavailable'])->default('available');
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

// articles
Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('excerpt')->nullable();
    $table->longText('content');
    $table->string('image')->nullable();
    $table->string('author')->default('Admin');
    $table->boolean('is_active')->default(true);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});

// careers
Schema::create('careers', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('department');
    $table->string('location')->default('Jakarta');
    $table->enum('type', ['full-time','part-time','contract','internship'])->default('full-time');
    $table->text('description');
    $table->text('requirements');
    $table->string('salary_range')->nullable();
    $table->date('deadline')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

// contact_messages
Schema::create('contact_messages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('phone')->nullable();
    $table->string('subject')->nullable();
    $table->text('message');
    $table->boolean('is_read')->default(false);
    $table->timestamps();
});

// projects
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('excerpt')->nullable();
    $table->longText('content');
    $table->string('image')->nullable();
    $table->string('client')->nullable();
    $table->string('location')->nullable();
    $table->string('category')->nullable();
    $table->date('project_date')->nullable();
    $table->boolean('is_active')->default(true);
    $table->boolean('is_featured')->default(false);
    $table->timestamps();
});
```

---

## 5. IMPLEMENTASI CKEDITOR5 — WAJIB IKUTI PERSIS INI

> ⚠️ **PENTING:** CKEditor5 v42+ dari CDN resmi (`cdn.ckeditor.com`) memerlukan lisensi berbayar dan akan throw error `license-key-invalid-distribution-channel`. Gunakan **CKEditor5 v41.4.2** dari file lokal.

### 5.1 File yang Diperlukan
Dua file berikut HARUS ada di `public/vendor/ckeditor5/`:
- `ckeditor5.umd.js` — bundle UMD v41.4.2 (download dari npm: `ckeditor5@41.4.2/dist/browser/index.umd.js`)
- `ckeditor5.css` — stylesheet editor (download dari npm: `ckeditor5@41.4.2/dist/browser/index.css`)

Cara install (jalankan di terminal):
```bash
npm install ckeditor5@41.4.2
mkdir -p public/vendor/ckeditor5
cp node_modules/ckeditor5/dist/browser/index.umd.js public/vendor/ckeditor5/ckeditor5.umd.js
cp node_modules/ckeditor5/dist/browser/index.css public/vendor/ckeditor5/ckeditor5.css
```

### 5.2 Cara Load di Blade
Di `@push('styles')`:
```html
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
.ck.ck-editor__editable_inline { min-height: 280px !important; font-size: 14px; line-height: 1.7; }
.ck.ck-toolbar { background: #f8f9fa !important; border-color: #e5e7eb !important; }
.ck.ck-editor__main > .ck-editor__editable { border-color: #e5e7eb !important; padding: 16px 20px !important; }
.ck.ck-editor__main > .ck-editor__editable.ck-focused { border-color: #f59e0b !important; box-shadow: 0 0 0 2px rgba(245,158,11,.15) !important; }
</style>
```

Di `@push('scripts')`:
```html
<script src="{{ asset('vendor/ckeditor5/ckeditor5.umd.js') }}"></script>
<script>
(function () {
    const {
        ClassicEditor, Essentials, Autoformat, AutoImage,
        Bold, Italic, Underline, Strikethrough,
        BlockQuote, Base64UploadAdapter,
        Heading, Image, ImageCaption, ImageStyle, ImageToolbar,
        ImageUpload, ImageResize, PictureEditing,
        Indent, IndentBlock, Link, LinkImage,
        List, ListProperties, MediaEmbed, Paragraph, PasteFromOffice,
        Table, TableToolbar, TableCaption, TableProperties, TableCellProperties,
        Alignment, HorizontalLine, RemoveFormat,
    } = window.ckeditor5;  // <-- PERHATIKAN: window.ckeditor5 (lowercase), BUKAN CKEDITOR5

    ClassicEditor.create(document.querySelector('#MY_TEXTAREA_ID'), {
        plugins: [
            Essentials, Autoformat, AutoImage, Bold, Italic, Underline, Strikethrough,
            BlockQuote, Base64UploadAdapter, Heading, Image, ImageCaption, ImageStyle,
            ImageToolbar, ImageUpload, ImageResize, PictureEditing, Indent, IndentBlock,
            Link, LinkImage, List, ListProperties, MediaEmbed, Paragraph, PasteFromOffice,
            Table, TableToolbar, TableCaption, TableProperties, TableCellProperties,
            Alignment, HorizontalLine, RemoveFormat,
        ],
        toolbar: {
            items: [
                'undo', 'redo', '|', 'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'link', 'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|',
                'uploadImage', 'mediaEmbed', '|', 'alignment', 'horizontalLine', 'removeFormat',
            ],
            shouldNotGroupWhenFull: true,
        },
        heading: { options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        ]},
        image: {
            toolbar: ['imageStyle:inline','imageStyle:block','imageStyle:side','|',
                      'toggleImageCaption','imageTextAlternative','|','resizeImage'],
            upload: { types: ['jpeg','png','gif','bmp','webp'] },
        },
        table: { contentToolbar: ['tableColumn','tableRow','mergeTableCells','tableProperties','tableCellProperties'] },
    }).catch(err => console.error('CKEditor5:', err));
})();
</script>
```

### 5.3 Pola Textarea untuk CKEditor
**Gunakan `<textarea>` asli** sebagai target — CKEditor akan replace-nya secara otomatis:
```html
{{-- Konten Artikel --}}
<textarea name="content" id="art-content">{{ old('content', $article?->content) }}</textarea>
```
**JANGAN** gunakan `<div>` sebagai container editor — textarea tidak bisa disubmit, tapi CKEditor v41 otomatis sync value-nya saat submit.

### 5.4 Untuk Dua Editor di Satu Halaman (Karir)
```javascript
const ckConfig = { plugins: [...], toolbar: {...}, ... };

// Editor 1 - Deskripsi
ClassicEditor.create(document.querySelector('#career-desc'), { ...ckConfig, toolbar: { items: [...full toolbar...] } })
    .catch(err => console.error(err));

// Editor 2 - Persyaratan (toolbar lebih ringkas)
ClassicEditor.create(document.querySelector('#career-req'), { ...ckConfig, toolbar: { items: ['bold','italic','|','bulletedList','numberedList','|','outdent','indent','|','removeFormat'] } })
    .catch(err => console.error(err));
```

---

## 6. MODELS DAN RELASI

```php
// Equipment
protected $fillable = ['name','slug','category','description','specifications','image','status','is_featured','is_active'];
protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
// Scopes: scopeActive, scopeFeatured
// Accessor: getImageUrlAttribute() — return URL CDN jika http/https, else asset('storage/'.$this->image)
// Auto-generate slug pada creating event: Str::slug($name).'-'.Str::random(4)

// Article
protected $fillable = ['title','slug','excerpt','content','image','author','is_active','published_at'];
protected $casts = ['is_active' => 'boolean', 'published_at' => 'datetime'];
// Accessor: getImageUrlAttribute(), getExcerptShortAttribute()

// Project
protected $fillable = ['title','slug','excerpt','content','image','client','location','category','project_date','is_active','is_featured'];
protected $casts = ['is_active'=>'boolean','is_featured'=>'boolean','project_date'=>'date'];

// Career
protected $fillable = ['title','department','location','type','description','requirements','salary_range','deadline','is_active'];
protected $casts = ['is_active'=>'boolean','deadline'=>'date'];
// Accessor: getTypeLabelAttribute()

// ContactMessage
protected $fillable = ['name','email','phone','subject','message','is_read'];
protected $casts = ['is_read' => 'boolean'];
```

---

## 7. ROUTES

```php
// PUBLIC
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/{slug}', [EquipmentController::class, 'show'])->name('equipment.show');
Route::get('/news', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('equipment', AdminEquipmentController::class);
        Route::patch('equipment/{equipment}/toggle', [AdminEquipmentController::class, 'toggle'])->name('equipment.toggle');

        Route::resource('articles', AdminArticleController::class);
        Route::patch('articles/{article}/toggle', [AdminArticleController::class, 'toggle'])->name('articles.toggle');

        Route::resource('careers', AdminCareerController::class);
        Route::patch('careers/{career}/toggle', [AdminCareerController::class, 'toggle'])->name('careers.toggle');

        Route::resource('projects', AdminProjectController::class);
        Route::patch('projects/{project}/toggle', [AdminProjectController::class, 'toggle'])->name('projects.toggle');

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::post('upload/image', [UploadController::class, 'image'])->name('upload.image');
    });
});
```

---

## 8. LOGIKA PENTING CONTROLLER

### Upload Gambar (store/update semua modul)
```php
// Priority: file upload > URL > existing
if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('equipment', 'public');
} elseif (!empty($data['image_url'])) {
    $data['image'] = $data['image_url'];
}
unset($data['image_url']);
```

### Toggle Active
```php
public function toggle(Equipment $equipment): RedirectResponse {
    $equipment->update(['is_active' => !$equipment->is_active]);
    $status = $equipment->is_active ? 'diaktifkan' : 'dinonaktifkan';
    return back()->with('success', "Alat berat berhasil {$status}.");
}
```

### Tampilkan Pesan → Auto Read
```php
public function show(ContactMessage $message): View {
    $message->update(['is_read' => true]);
    return view('pages.admin.messages.show', compact('message'));
}
```

### UploadController (CKEditor image upload)
```php
public function image(Request $request) {
    $request->validate(['upload' => 'required|image|mimes:jpeg,png,gif,bmp,webp|max:4096']);
    $file = $request->file('upload');
    $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
    $path = $file->storeAs('uploads/ck', $filename, 'public');
    return response()->json(['url' => Storage::disk('public')->url($path)]);
}
```

---

## 9. SEEDER DATA

Jalankan `php artisan db:seed` untuk mengisi data awal:

### Admin User
- Email: `admin@kontragtor.com`
- Password: `admin123`

### Equipment (8 unit)
| Nama | Kategori | Status |
|---|---|---|
| Excavator Komatsu PC200-8M0 | Excavator | Tersedia |
| Bulldozer Komatsu D85EX-15 | Bulldozer | Tersedia |
| Motor Grader Caterpillar 140K | Grader | Tersedia |
| Vibratory Roller Bomag BW 213 DH-5 | Compactor | Tersedia |
| Mobile Crane Tadano GT-600EX | Crane | Tersedia |
| Wheel Loader Komatsu WA380-8 | Wheel Loader | **Tidak Tersedia** |
| Dump Truck Hino FM 260 JD | Dump Truck | Tersedia |
| Backhoe Loader JCB 3CX Super | Backhoe | Tersedia |

Semua dengan deskripsi HTML panjang dan spesifikasi teknis lengkap dalam format `Nama: Nilai` per baris.

### Artikel (10 artikel)
Topik: perawatan alat berat, tren elektrifikasi, tips memilih alat, penambahan armada baru, K3, proyek Tol Kalimantan, GPS tracking, excavator vs backhoe, sertifikasi ISO, prosedur mobilisasi.

### Karir (5 posisi)
Operator Excavator Senior · Mekanik Alat Berat · Site Manager Proyek · Marketing Executive B2B · HSE Officer

### Proyek (12 proyek)
Tol Trans-Sumatera, Reklamasi Batam, Bendungan Serayu, Tambang KPC Kalimantan, Pelabuhan Patimban, TOD MRT Jakarta, Land Clearing Sawit Kalteng, Jembatan Sei Alalak, Trans-Papua Barat, PLTU Tanjung Jati, Normalisasi Ciliwung, KEK Kendal.

---

## 10. DESAIN & UX ADMIN PANEL

### Form Fields — Pola Konsisten
```html
<div class="admin-card space-y-5">
    <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">
        Nama Section
    </h3>
    <div>
        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
            Label Field <span class="text-red-500">*</span>
        </label>
        <input type="text" name="field" ...
            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white">
        @error('field')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
</div>
```

### Tab Switch URL/Upload (Alpine.js)
```html
<div x-data="{ tab: 'url' }" class="space-y-3">
    <div class="flex gap-2 bg-gray-100 p-1 rounded-xl w-fit">
        <button type="button" @click="tab='url'"
            :class="tab==='url' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'"
            class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">🔗 Link URL</button>
        <button type="button" @click="tab='file'"
            :class="tab==='file' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'"
            class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">📁 Upload File</button>
    </div>
    <div x-show="tab==='url'">
        <input type="url" name="image_url" ...>
    </div>
    <div x-show="tab==='file'" style="display:none">
        <input type="file" name="image" ...>
    </div>
</div>
```

### CSS Classes Admin (tambah ke `<style>` di layout admin)
```css
.admin-card { background:#fff; border:1px solid #f0f0f0; border-radius:14px; padding:20px; }
.sidebar-link { display:flex; align-items:center; gap:10px; padding:9px 14px; border-radius:10px; color:#6b7280; font-size:13px; font-weight:600; transition:all .15s ease; }
.sidebar-link:hover { background:#fef3c7; color:#92400e; }
.sidebar-link.active { background:#F59E0B; color:#000; font-weight:700; }
.btn-sm { font-size:11px; font-weight:700; padding:5px 12px; border-radius:7px; transition:all .15s; display:inline-flex; align-items:center; gap:4px; }
.topbar { background:#fff; border-bottom:1px solid #f0f0f0; }
```

---

## 11. VALIDASI FORM ADMIN

### Equipment
```php
'name'           => 'required|string|max:150',
'category'       => 'required|string|max:100',
'description'    => 'required|string',
'specifications' => 'nullable|string',
'status'         => 'required|in:available,unavailable',
'is_featured'    => 'boolean',
'is_active'      => 'boolean',
'image_url'      => 'nullable|url|max:500',
'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
```

### Article
```php
'title'        => 'required|string|max:200',
'excerpt'      => 'nullable|string|max:400',
'content'      => 'required|string',
'is_active'    => 'boolean',
'published_at' => 'nullable|date',
'image_url'    => 'nullable|url|max:500',
'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
```

### Career
```php
'title'        => 'required|string|max:150',
'department'   => 'required|string|max:100',
'location'     => 'nullable|string|max:100',
'type'         => 'required|in:full-time,part-time,contract,internship',
'description'  => 'required|string',
'requirements' => 'required|string',
'salary_range' => 'nullable|string|max:100',
'deadline'     => 'nullable|date',
'is_active'    => 'boolean',
```

### Project
```php
'title'        => 'required|string|max:200',
'excerpt'      => 'nullable|string|max:400',
'content'      => 'required|string',
'client'       => 'nullable|string|max:150',
'location'     => 'nullable|string|max:150',
'category'     => 'nullable|string|max:100',
'project_date' => 'nullable|date',
'is_active'    => 'boolean',
'is_featured'  => 'boolean',
'image_url'    => 'nullable|url|max:500',
'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
```

---

## 12. CARA SETUP DARI NOL

```bash
# 1. Buat project Laravel 12
composer create-project laravel/laravel ptkontragtor "^12.0"
cd ptkontragtor

# 2. Konfigurasi .env
# DB_CONNECTION=sqlite (default, cukup untuk project ini)
# APP_NAME="PT Kontragtor Indonesia Tbk."
# APP_URL=http://localhost:8000

# 3. Install CKEditor5 v41 (wajib)
npm install ckeditor5@41.4.2
mkdir -p public/vendor/ckeditor5
cp node_modules/ckeditor5/dist/browser/index.umd.js public/vendor/ckeditor5/ckeditor5.umd.js
cp node_modules/ckeditor5/dist/browser/index.css public/vendor/ckeditor5/ckeditor5.css

# 4. Buat database SQLite
touch database/database.sqlite

# 5. Run migration dan seeder
php artisan migrate
php artisan db:seed

# 6. Storage link
php artisan storage:link

# 7. Generate app key
php artisan key:generate

# 8. Jalankan server
php artisan serve
```

**Login admin:** `http://localhost:8000/admin/login`
- Email: `admin@kontragtor.com`
- Password: `admin123`

---

## 13. CATATAN PENTING

1. **Tailwind CDN** — Project ini pakai Tailwind via CDN (`cdn.tailwindcss.com`). Ada warning di console di mode development, tapi fungsional. Untuk production proper, setup PostCSS + Vite.

2. **CKEditor5 HARUS v41.4.2 lokal** — Jangan pakai CDN `cdn.ckeditor.com` versi 42+ karena akan error `license-key-invalid-distribution-channel`. Selalu load dari `public/vendor/ckeditor5/`.

3. **Global variable CKEditor5 v41** — Saat load via UMD, objectnya adalah `window.ckeditor5` (huruf kecil semua), BUKAN `CKEDITOR5` atau `window.CKEDITOR5`.

4. **Textarea sebagai target editor** — Pakai `<textarea name="namafield" id="my-id">{{ old(...) }}</textarea>`. CKEditor akan replace elemen ini. Value form tersubmit otomatis.

5. **Image di CKEditor** — Pakai `Base64UploadAdapter` — gambar yang di-copas atau di-drag langsung dikonversi ke base64 dan disimpan inline di konten HTML. Tidak butuh endpoint upload tambahan untuk gambar dalam konten.

6. **`storage:link`** — Wajib dijalankan agar gambar yang diupload via file bisa diakses public.

7. **Slug auto-generate** — Semua model (Equipment, Article, Project) auto-generate slug dari nama/judul + 4 karakter random pada `creating` event.

8. **SweetAlert2** — Semua konfirmasi (hapus, logout) dan flash message (success/error) menggunakan SweetAlert2.

9. **AlpineJS** — Digunakan untuk: mobile menu navbar, tab switch URL/file upload, toggle sidebar admin, dan komponen interaktif kecil lainnya.

10. **Render HTML konten** — Di halaman publik, konten dari CKEditor dirender dengan `{!! $model->content !!}` (bukan `{{ }}`) agar HTML tidak di-escape.

---

*Prompt ini dibuat berdasarkan source code aktual project ptkontragtor — versi final setelah semua revisi.*
