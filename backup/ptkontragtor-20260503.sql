-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2026 at 04:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptkontragtor`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `is_active`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Pentingnya Perawatan Rutin Alat Berat untuk Keselamatan Kerja', 'pentingnya-perawatan-rutin-alat-berat-untuk-keselamatan-kerja-LAgiv', 'Perawatan rutin alat berat bukan sekadar kewajiban, melainkan investasi jangka panjang untuk keselamatan dan produktivitas proyek konstruksi.', '<p>Perawatan rutin alat berat merupakan aspek krusial dalam industri konstruksi yang sering kali diabaikan demi mengejar target produksi. Padahal, kelalaian dalam maintenance dapat berujung pada kecelakaan kerja yang fatal dan kerugian finansial yang sangat besar.</p><h2>Mengapa Perawatan Rutin Penting?</h2><p>Alat berat bekerja dalam kondisi ekstrem — menanggung beban berat, beroperasi di medan yang sulit, dan terpapar debu serta cuaca sepanjang hari. Komponen-komponen vital seperti sistem hidrolik, mesin, rem, dan undercarriage memerlukan pemeriksaan berkala agar tetap berfungsi optimal dan aman.</p><p>Statistik industri menunjukkan bahwa 70% kerusakan alat berat dapat dicegah melalui perawatan preventif yang teratur. Biaya perawatan rutin jauh lebih kecil dibandingkan biaya perbaikan akibat kerusakan besar, apalagi jika sampai menyebabkan kecelakaan dan tuntutan hukum.</p><h2>Jadwal Perawatan yang Disarankan</h2><p>Setiap 250 jam operasi: ganti oli mesin dan filter, periksa sistem pendingin, cek kondisi track atau ban, dan inspeksi visual seluruh komponen. Setiap 500 jam: servis sistem hidrolik, ganti filter bahan bakar, dan periksa kondisi bucket teeth. Setiap 1000 jam: overhaul komponen mayor, kalibrasi sensor, dan pemeriksaan menyeluruh oleh teknisi bersertifikat.</p>', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80&auto=format&fit=crop', 'Tim Teknis Kontragtor', 1, '2026-04-26 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(2, 'Tren Alat Berat Konstruksi 2024: Elektrifikasi dan Teknologi Hijau', 'tren-alat-berat-konstruksi-2024-elektrifikasi-dan-teknologi-hijau-s1S5g', 'Industri alat berat global tengah bergerak menuju elektrifikasi dan teknologi ramah lingkungan. Bagaimana dampaknya bagi industri konstruksi Indonesia?', '<p>Industri konstruksi global sedang mengalami transformasi besar-besaran seiring meningkatnya kesadaran lingkungan dan regulasi emisi yang semakin ketat di berbagai negara. Para produsen alat berat terkemuka dunia kini berlomba menghadirkan solusi yang lebih hijau, efisien, dan berkelanjutan.</p><h2>Elektrifikasi Alat Berat</h2><p>Volvo CE, Komatsu, Caterpillar, dan JCB telah meluncurkan lini excavator dan wheel loader bertenaga listrik atau hybrid. Meski investasi awal lebih tinggi, biaya operasional yang jauh lebih rendah dan nol emisi langsung menjadikannya pilihan menarik untuk proyek di kawasan perkotaan dan proyek berkelanjutan.</p><h2>Teknologi Autonomous dan Telematics</h2><p>Sistem semi-autonomous yang memungkinkan alat berat beroperasi dengan intervensi operator minimal mulai diterapkan di tambang-tambang besar. Teknologi telematics memungkinkan pemantauan kondisi mesin, konsumsi bahan bakar, dan produktivitas secara real-time dari kantor pusat.</p>', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800&q=80&auto=format&fit=crop', 'Redaksi Kontragtor', 1, '2026-04-19 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(3, 'Tips Memilih Alat Berat yang Tepat untuk Proyek Konstruksi Anda', 'tips-memilih-alat-berat-yang-tepat-untuk-proyek-konstruksi-anda-bAoOF', 'Pemilihan alat berat yang tepat adalah kunci keberhasilan proyek konstruksi. Berikut panduan komprehensif dari tim ahli kami.', '<p>Kesalahan dalam memilih alat berat dapat mengakibatkan pembengkakan biaya proyek, keterlambatan jadwal, bahkan kegagalan pekerjaan. Oleh karena itu, memahami spesifikasi teknis dan kebutuhan proyek secara menyeluruh sebelum menyewa adalah hal yang sangat penting.</p><h2>Analisis Kebutuhan Proyek</h2><p>Langkah pertama adalah mengidentifikasi jenis pekerjaan utama: penggalian, pemadatan, pengangkatan, perataan, atau pengangkutan material? Setiap pekerjaan membutuhkan jenis alat yang berbeda dengan spesifikasi teknis yang sesuai dengan volume dan kondisi pekerjaan.</p><h2>Pertimbangan Kondisi Medan dan Akses</h2><p>Kondisi tanah dan medan kerja sangat mempengaruhi pilihan alat. Untuk medan berlumpur atau soft soil, excavator dengan track lebar dan tekanan tanah rendah lebih disarankan. Untuk area sempit seperti perkotaan, backhoe loader yang lebih kompak bisa menjadi pilihan yang lebih efisien dan ekonomis.</p>', 'https://images.unsplash.com/photo-1590856029826-c7a73142bbf1?w=800&q=80&auto=format&fit=crop', 'Tim Konsultan Kontragtor', 1, '2026-04-12 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(4, 'PT Kontragtor Indonesia Tbk. Perluas Armada dengan 20 Unit Baru', 'pt-kontragtor-indonesia-tbk-perluas-armada-dengan-20-unit-baru-YKOG0', 'Sebagai bentuk komitmen terhadap pelanggan, kami menambah 20 unit alat berat terbaru senilai Rp 50 miliar untuk memenuhi permintaan yang terus meningkat.', '<p>PT Kontragtor Indonesia Tbk. dengan bangga mengumumkan penambahan 20 unit alat berat terbaru ke dalam armada kami. Investasi senilai lebih dari Rp 50 miliar ini merupakan bagian dari rencana ekspansi bisnis 2024–2025 seiring meningkatnya permintaan dari sektor infrastruktur dan properti nasional.</p><p>Unit-unit baru yang didatangkan langsung dari dealer resmi meliputi: 8 unit excavator Komatsu PC200-8M0, 4 unit bulldozer Caterpillar D6N, 5 unit dump truck Hino FM 260, dan 3 unit mobile crane Tadano GT-600EX. Seluruh unit telah melalui proses pre-delivery inspection dan siap dioperasikan.</p><p>Direktur Utama PT Kontragtor Indonesia, Bapak Budi Santoso, menyatakan bahwa penambahan armada ini adalah respons langsung terhadap meningkatnya permintaan proyek dari sektor infrastruktur pemerintah dan konstruksi swasta di Pulau Jawa dan Kalimantan.</p>', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80&auto=format&fit=crop', 'Humas Kontragtor', 1, '2026-04-05 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(5, 'Standar K3 di Industri Alat Berat: Keselamatan Adalah Prioritas Utama', 'standar-k3-di-industri-alat-berat-keselamatan-adalah-prioritas-utama-XjGoL', 'Implementasi K3 yang ketat di area konstruksi dan proyek berat bukan sekadar kewajiban hukum, namun merupakan tanggung jawab moral setiap perusahaan.', '<p>Keselamatan dan Kesehatan Kerja (K3) adalah fondasi dari setiap operasi alat berat yang bertanggung jawab. Di PT Kontragtor Indonesia, kami memandang keselamatan bukan hanya sebagai regulasi yang harus dipenuhi, tetapi sebagai komitmen nyata terhadap setiap karyawan dan mitra kerja kami.</p><h2>Pelatihan Wajib Operator</h2><p>Setiap operator wajib mengikuti pelatihan K3 dan mendapatkan Surat Izin Operator (SIO) yang sah sebelum diizinkan mengoperasikan alat berat di lapangan. Pelatihan mencakup prosedur operasi standar, penanganan kondisi darurat, dan teknik manuver yang aman.</p><h2>Inspeksi Harian (P2H)</h2><p>Pemeriksaan Pra-operasi Harian (P2H) dilakukan oleh operator sebelum mesin dinyalakan. Checklist mencakup kondisi rem, hidrolik, lampu, klakson, sabuk pengaman, dan semua komponen keselamatan lainnya. Alat yang tidak lulus P2H tidak boleh dioperasikan hingga diperbaiki.</p>', 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=800&q=80&auto=format&fit=crop', 'Tim HSE Kontragtor', 1, '2026-03-29 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(6, 'Proyek Tol Trans Kalimantan: Kontragtor Kerahkan 45 Unit Alat Berat', 'proyek-tol-trans-kalimantan-kontragtor-kerahkan-45-unit-alat-berat-EQzjx', 'PT Kontragtor Indonesia menjadi mitra strategis dalam pembangunan ruas Tol Trans Kalimantan sepanjang 120 km dengan mengerahkan armada terbesar dalam sejarah perusahaan.', '<p>Proyek ambisius pembangunan Tol Trans Kalimantan memasuki fase paling kritis dengan dimulainya pekerjaan tanah masif di ruas Balikpapan–Samarinda. PT Kontragtor Indonesia dipercaya sebagai penyedia alat berat utama untuk paket pekerjaan seluas 120 kilometer ini.</p><p>Total 45 unit alat berat dikerahkan secara simultan, terdiri dari 18 excavator berbagai kapasitas, 8 bulldozer, 12 dump truck, 4 grader, dan 3 vibratory roller. Operasi berlangsung dua shift — pagi dan malam — untuk memenuhi target penyelesaian yang ketat.</p><h2>Tantangan Medan Kalimantan</h2><p>Kondisi tanah gambut dan curah hujan tinggi di Kalimantan menjadi tantangan tersendiri bagi tim operasional kami. Kami menggunakan excavator dengan ground pressure rendah dan track lebar untuk meminimalkan ambles di lahan gambut. Seluruh alat juga dilengkapi sistem monitoring GPS real-time untuk memastikan efisiensi dan keamanan operasi.</p>', 'https://images.unsplash.com/photo-1565008447742-97f6f38c985c?w=800&q=80&auto=format&fit=crop', 'Tim Proyek Kontragtor', 1, '2026-03-22 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(7, 'Mengenal Teknologi GPS Tracking pada Armada Alat Berat Modern', 'mengenal-teknologi-gps-tracking-pada-armada-alat-berat-modern-41jRO', 'Sistem GPS tracking pada alat berat bukan hanya soal lokasi — ini tentang efisiensi operasional, keamanan aset, dan optimasi biaya yang signifikan.', '<p>Di era konstruksi modern, pengelolaan armada alat berat tidak lagi cukup dengan sistem manual berbasis spreadsheet dan laporan harian. Teknologi GPS tracking dan fleet management system telah merevolusi cara perusahaan konstruksi mengelola, memantau, dan mengoptimalkan aset alat berat mereka.</p><h2>Manfaat Utama GPS Tracking</h2><p>Pertama, visibilitas real-time posisi seluruh unit memungkinkan dispatcher mengalokasikan alat ke lokasi yang paling membutuhkan tanpa pemborosan waktu mobilisasi. Kedua, data jam operasi yang akurat memastikan jadwal maintenance dilakukan tepat waktu berdasarkan penggunaan aktual, bukan hanya estimasi. Ketiga, deteksi penggunaan di luar jam kerja atau perpindahan tanpa izin melindungi aset bernilai miliaran rupiah dari penyalahgunaan.</p><h2>Integrasi dengan Sistem Maintenance</h2><p>PT Kontragtor Indonesia telah mengintegrasikan GPS tracking dengan sistem manajemen maintenance internal kami. Notifikasi otomatis dikirim kepada tim teknis ketika sebuah unit mendekati batas jam operasi untuk service rutin, sehingga perawatan dapat dijadwalkan secara proaktif tanpa mengganggu operasional proyek.</p>', 'https://images.unsplash.com/photo-1474631245212-32dc3c8310c6?w=800&q=80&auto=format&fit=crop', 'Tim Teknologi Kontragtor', 1, '2026-03-15 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(8, 'Excavator vs Backhoe Loader: Mana yang Tepat untuk Proyek Anda?', 'excavator-vs-backhoe-loader-mana-yang-tepat-untuk-proyek-anda-9db7d', 'Excavator dan backhoe loader sama-sama digunakan untuk pekerjaan penggalian, namun keduanya memiliki keunggulan di situasi yang berbeda. Simak perbandingan lengkapnya.', '<p>Baik excavator maupun backhoe loader adalah alat penggalian yang umum digunakan di industri konstruksi. Namun, perbedaan desain dan kemampuan keduanya menjadikan masing-masing lebih cocok untuk jenis pekerjaan tertentu. Memilih alat yang tepat bisa menghemat biaya dan waktu proyek secara signifikan.</p><h2>Excavator: Raja Penggalian Skala Besar</h2><p>Excavator dengan track baja memberikan traksi dan stabilitas superior di medan yang tidak rata, berlumpur, atau berbatu. Kemampuan penggalian yang dalam (hingga 6-7 meter untuk kelas 20 ton) dan swing 360° membuatnya ideal untuk penggalian pondasi gedung, saluran drainase besar, dan pekerjaan pertambangan. Kelemahannya: tidak bisa berpindah lokasi dengan cepat karena harus dimuat ke trailer.</p><h2>Backhoe Loader: Si Serbaguna untuk Area Sempit</h2><p>Backhoe loader unggul dalam mobilitas — bisa melaju di jalan raya hingga 38 km/jam tanpa perlu trailer. Bucket loader di depan membuatnya bisa sekaligus menggali dan memuat material. Ideal untuk pekerjaan utilitas perkotaan, galian pipa, dan proyek di lokasi yang akses traillernya terbatas. Namun kapasitas dan kedalaman galiannya lebih terbatas dibanding excavator penuh.</p>', 'https://images.unsplash.com/photo-1572025442646-866d16c84a54?w=800&q=80&auto=format&fit=crop', 'Tim Konsultan Kontragtor', 1, '2026-03-08 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(9, 'PT Kontragtor Raih Sertifikasi ISO 9001:2015 dan ISO 45001:2018', 'pt-kontragtor-raih-sertifikasi-iso-90012015-dan-iso-450012018-Rc4nB', 'Setelah melalui proses audit ketat selama 6 bulan, PT Kontragtor Indonesia berhasil meraih dua sertifikasi internasional bergengsi sekaligus.', '<p>PT Kontragtor Indonesia Tbk. dengan bangga mengumumkan keberhasilan meraih dua sertifikasi internasional bergengsi secara bersamaan: ISO 9001:2015 untuk Sistem Manajemen Mutu dan ISO 45001:2018 untuk Sistem Manajemen Keselamatan dan Kesehatan Kerja.</p><p>Proses sertifikasi yang melibatkan audit mendalam selama 6 bulan ini dilakukan oleh lembaga sertifikasi internasional terkemuka. Tim auditor mengevaluasi seluruh aspek operasional perusahaan — mulai dari proses penerimaan order, persiapan dan pengiriman alat, operasional di lapangan, maintenance, hingga penanganan keluhan pelanggan.</p><h2>Artinya bagi Pelanggan</h2><p>Bagi pelanggan kami, sertifikasi ini adalah jaminan nyata bahwa setiap proses yang kami jalankan telah memenuhi standar internasional tertinggi. Mulai dari kondisi alat yang selalu prima, operator yang terlatih dan bersertifikat, hingga respons tepat waktu terhadap setiap kebutuhan dan kendala di lapangan.</p>', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80&auto=format&fit=crop', 'Humas Kontragtor', 1, '2026-03-01 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(10, 'Panduan Lengkap: Prosedur Mobilisasi Alat Berat ke Lokasi Proyek', 'panduan-lengkap-prosedur-mobilisasi-alat-berat-ke-lokasi-proyek-gWi1p', 'Mobilisasi alat berat yang salah bisa berujung pada kerusakan unit, kecelakaan di jalan, hingga denda dari pihak berwenang. Pahami prosedur yang benar.', '<p>Proses memindahkan alat berat dari depo ke lokasi proyek — yang dikenal sebagai mobilisasi — adalah fase yang penuh risiko jika tidak dilakukan dengan benar. Kesalahan dalam pengikatan muatan, pemilihan rute, atau pengurusan dokumen bisa berakibat fatal baik secara keselamatan maupun hukum.</p><h2>Dokumen yang Diperlukan</h2><p>Sebelum melakukan pengiriman, pastikan seluruh dokumen lengkap: STNK low-bed trailer, KIR kendaraan, izin angkutan alat berat dari Dinas Perhubungan, surat jalan dari perusahaan, dan asuransi kargo. Untuk alat berat dengan dimensi over-size, diperlukan izin khusus pengangkutan dengan pendampingan kendaraan escort.</p><h2>Standar Pengikatan (Lashing)</h2><p>Alat berat harus diikat dengan minimum 4 titik lashing menggunakan chain lashing berkapasitas sesuai berat unit. Semua bagian bergerak (arm, bucket, blade) harus diamankan dan dikunci. Roda atau track diberi ganjal kayu di depan dan belakang untuk mencegah pergeseran saat pengereman mendadak.</p>', 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=800&q=80&auto=format&fit=crop', 'Tim Logistik Kontragtor', 1, '2026-02-22 03:22:21', '2026-05-03 03:22:21', '2026-05-03 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Jakarta',
  `type` enum('full-time','part-time','contract','internship') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'full-time',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `department`, `location`, `type`, `description`, `requirements`, `salary_range`, `deadline`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Operator Excavator Senior', 'Operasional', 'Jakarta & Kalimantan', 'full-time', 'Kami mencari Operator Excavator Senior berpengalaman untuk bergabung dengan tim operasional kami. Bertanggung jawab mengoperasikan excavator dalam proyek konstruksi dan pertambangan dengan standar keselamatan tinggi.', '- Pengalaman minimal 5 tahun sebagai operator excavator\n- Memiliki SIO (Surat Izin Operator) yang masih berlaku\n- Bersedia ditempatkan di project site (termasuk luar Jawa)\n- Memahami perawatan harian alat berat\n- Disiplin, teliti, dan dapat bekerja dalam tim', 'Rp 8.000.000 – Rp 12.000.000', '2026-06-02', 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(2, 'Mekanik Alat Berat', 'Teknis & Maintenance', 'Cikarang, Bekasi', 'full-time', 'Mekanik Alat Berat bertanggung jawab atas perawatan preventif, servis berkala, dan perbaikan seluruh unit armada agar selalu dalam kondisi prima dan siap operasi.', '- Pendidikan minimal SMK Teknik Mesin/Alat Berat\n- Pengalaman minimal 3 tahun sebagai mekanik alat berat\n- Menguasai sistem hidrolik, mesin diesel, dan kelistrikan alat berat\n- Mampu membaca wiring diagram dan service manual\n- Memiliki sertifikat kompetensi mekanik alat berat', 'Rp 7.000.000 – Rp 10.000.000', '2026-06-17', 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(3, 'Site Manager Proyek', 'Manajemen Proyek', 'Sumatera & Kalimantan', 'full-time', 'Site Manager memimpin operasional alat berat di lapangan, berkoordinasi dengan klien, dan memastikan target produksi, jadwal proyek, serta standar K3 terpenuhi.', '- S1 Teknik Sipil/Mesin\n- Pengalaman minimal 7 tahun di industri konstruksi/pertambangan\n- Kemampuan manajemen tim dan proyek yang kuat\n- Memahami regulasi K3 dan prosedur HSE\n- Bersedia ditempatkan di luar Jawa\n- Memiliki SIM A dan B1', 'Rp 15.000.000 – Rp 22.000.000', '2026-05-23', 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(4, 'Marketing Executive B2B', 'Penjualan & Marketing', 'Jakarta Selatan', 'full-time', 'Marketing Executive B2B mengembangkan portofolio klien korporat, mengelola hubungan dengan kontraktor dan developer, serta mencapai target revenue sewa alat berat.', '- S1 semua jurusan (Teknik/Bisnis diutamakan)\n- Pengalaman 2+ tahun di sales/marketing B2B\n- Jaringan di industri konstruksi merupakan nilai plus\n- Kemampuan komunikasi dan negosiasi yang kuat\n- Memiliki kendaraan pribadi dan SIM A', 'Rp 6.000.000 – Rp 9.000.000 + Komisi', '2026-05-18', 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(5, 'HSE Officer', 'Health, Safety & Environment', 'Jakarta & Project Sites', 'full-time', 'HSE Officer memastikan seluruh operasional alat berat berjalan sesuai standar keselamatan kerja, melakukan inspeksi rutin, investigasi insiden, dan pelatihan K3 kepada seluruh karyawan.', '- D3/S1 Teknik atau K3\n- Memiliki sertifikat Ahli K3 Umum (Kemnaker)\n- Pengalaman 3+ tahun di bidang HSE konstruksi/alat berat\n- Memahami peraturan K3 nasional dan internasional\n- Kemampuan pelatihan dan komunikasi yang baik', 'Rp 8.000.000 – Rp 12.000.000', '2026-06-07', 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `slug`, `category`, `description`, `specifications`, `image`, `status`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Excavator Komatsu PC200-8M0', 'excavator-komatsu-pc200-8m0-6aUjF', 'Excavator', 'Excavator Komatsu PC200-8M0 adalah pilihan unggulan untuk proyek konstruksi skala menengah hingga besar. Dilengkapi mesin Komatsu SAA6D107E-2 bertenaga 155 HP dengan teknologi ECOT3 yang memenuhi standar emisi Tier 3. Sistem hidrolik generasi terbaru memastikan respons yang cepat dan presisi tinggi pada setiap gerakan arm dan bucket. Unit ini sangat andal untuk pekerjaan penggalian pondasi, pembersihan lahan, pengerukan material, hingga loading ke dump truck. Kabinnya yang ergonomis dilengkapi AC, monitor digital, dan kursi bersuspansi untuk kenyamanan operator sepanjang hari. Semua unit telah melalui perawatan berkala 500 jam dan siap beroperasi penuh.', 'Berat Operasi: 20.700 kg\nKapasitas Bucket: 0.80 m³\nDaya Mesin: 155 HP (116 kW)\nTipe Mesin: Komatsu SAA6D107E-2\nKedalaman Gali Maks: 6.630 mm\nJangkauan Gali Maks: 9.970 mm\nTinggi Gali Maks: 9.680 mm\nGaya Gali Bucket: 14.200 kgf\nGaya Gali Arm: 9.600 kgf\nKapasitas Tangki BBM: 400 L\nKapasitas Tangki Hidrolik: 230 L\nTekanan Tanah: 0.44 kg/cm²\nLebar Track: 600 mm\nPanjang Total: 9.455 mm\nLebar Total: 2.800 mm\nTinggi Total: 2.960 mm\nKecepatan Perjalanan: 5.5 km/jam (HI) / 3.3 km/jam (LO)\nGaya Traksi: 20.600 kgf\nPutaran Swing: 12.6 rpm\nTahun Produksi: 2021\nSertifikasi: SNI, K3', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800&q=80&auto=format&fit=crop', 'available', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(2, 'Bulldozer Komatsu D85EX-15', 'bulldozer-komatsu-d85ex-15-GlIej', 'Bulldozer', 'Bulldozer Komatsu D85EX-15 adalah mesin grading dan dozing bertenaga tinggi yang dirancang untuk pekerjaan tanah berat di berbagai kondisi medan. Dengan blade semi-U berukuran lebar, bulldozer ini mampu mendorong volume tanah yang besar dalam satu lintasan, meningkatkan efisiensi kerja secara signifikan. Transmisi hidrolik otomatis memungkinkan operator beralih kecepatan tanpa gangguan, sementara sistem PLUS (Parallel Link Undercarriage System) memperpanjang umur undercarriage hingga 20% lebih lama. Sangat ideal untuk land clearing, pemadatan tanah awal, perataan lahan, dan persiapan sub-grade jalan. Kabin ROPS/FOPS dilengkapi peredam kebisingan dan sistem AC untuk operasi nyaman.', 'Berat Operasi: 22.060 kg\nDaya Mesin: 190 HP (142 kW)\nTipe Mesin: Komatsu SAA6D114E-3\nLebar Blade (Semi-U): 3.715 mm\nTinggi Blade: 1.305 mm\nKapasitas Blade: 6.3 m³\nKemiringan Blade Maks: 25°\nKecepatan Maju 1: 3.5 km/jam\nKecepatan Maju 2: 6.2 km/jam\nKecepatan Maju 3: 11.3 km/jam\nKecepatan Mundur 1: 4.3 km/jam\nKecepatan Mundur 2: 7.7 km/jam\nKecepatan Mundur 3: 14.0 km/jam\nGaya Dorong Maks: 26.800 kgf\nLebar Track Shoe: 610 mm\nTekanan Tanah: 0.75 kg/cm²\nPanjang Ground Contact: 2.735 mm\nKapasitas Tangki BBM: 385 L\nTahun Produksi: 2020\nSertifikasi: SNI, K3', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80&auto=format&fit=crop', 'available', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(3, 'Motor Grader Caterpillar 140K', 'motor-grader-caterpillar-140k-uCtIT', 'Grader', 'Motor Grader Caterpillar 140K merupakan mesin perata tanah presisi tinggi yang digunakan untuk pembentukan dan pemeliharaan jalan, perataan sub-base, serta pengelolaan material granular. Dilengkapi blade sepanjang 3.962 mm yang dapat dirotasi 360° dan dimiringkan hingga 90°, memungkinkan berbagai konfigurasi kerja. Sistem All-Wheel Drive (AWD) opsional memberikan traksi optimal pada kondisi tanah basah atau licin. Kabin dilengkapi joystick electrohydraulic dan layar monitor untuk kontrol presisi tinggi. Sangat cocok untuk proyek pembangunan dan perawatan jalan, lapangan terbang, pelabuhan, dan area industri.', 'Berat Operasi: 15.645 kg\nDaya Mesin: 176 HP (131 kW)\nTipe Mesin: Caterpillar C7.1 ACERT\nPanjang Blade: 3.962 mm\nLebar Blade: 610 mm\nSudut Rotasi Blade: 360°\nKemiringan Blade: 90°\nSideshift Blade: 570 mm kanan / 603 mm kiri\nWheelbase: 6.103 mm\nLebar Total: 2.745 mm\nPanjang Total: 8.790 mm\nKecepatan Maju Maks: 42.0 km/jam\nKecepatan Mundur Maks: 19.0 km/jam\nRadius Putar Minimum: 7.315 mm\nKapasitas Tangki BBM: 276 L\nSistem Transmis: Powershift 8F/6R\nSertifikasi: EPA Tier 4F, SNI, K3\nTahun Produksi: 2022', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80&auto=format&fit=crop', 'available', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(4, 'Vibratory Roller Bomag BW 213 DH-5', 'vibratory-roller-bomag-bw-213-dh-5-IHDKL', 'Compactor', 'Vibratory Roller Bomag BW 213 DH-5 adalah mesin pemadat tanah dan aspal performa tinggi dengan teknologi vibrasi ECONOMIZER yang secara otomatis mengatur amplitudo sesuai kepadatan tanah. Drum baja tunggal berdiameter besar memberikan tekanan linier yang optimal untuk pemadatan lapisan tanah granular, sub-base, dan lapisan aspal. Dilengkapi sistem VARIOCONTROL yang secara real-time mengukur dan mendisplay tingkat kepadatan material, sehingga operator dapat memastikan kualitas pemadatan tanpa perlu uji lab berulang. Kabin operator dilengkapi AC dan kursi servo-suspensi untuk mereduksi getaran pada operator.', 'Berat Operasi: 13.500 kg\nDaya Mesin: 138 HP (103 kW)\nTipe Mesin: Deutz TCD 3.6 L4\nLebar Drum: 2.130 mm\nDiameter Drum: 1.500 mm\nAmplitudo (Hi/Lo): 1.87 mm / 0.94 mm\nFrekuensi Vibrasi (Hi/Lo): 28 Hz / 35 Hz\nGaya Sentrifugal (Hi/Lo): 260 kN / 195 kN\nKecepatan Kerja Maks: 10.0 km/jam\nKecepatan Jalan Maks: 12.0 km/jam\nRadius Putar: 5.700 mm\nTekanan Linier Statis: 42.8 kg/cm\nKapasitas Tangki BBM: 200 L\nKapasitas Tangki Air: 820 L\nLebar Total: 2.380 mm\nPanjang Total: 6.370 mm\nTahun Produksi: 2021\nSertifikasi: CE, SNI, K3', 'https://images.unsplash.com/photo-1590856029826-c7a73142bbf1?w=800&q=80&auto=format&fit=crop', 'available', 0, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(5, 'Mobile Crane Tadano GT-600EX', 'mobile-crane-tadano-gt-600ex-QDliQ', 'Crane', 'Mobile Crane Tadano GT-600EX adalah crane berkapasitas angkat 60 ton yang menggabungkan mobilitas tinggi dengan kekuatan angkat yang besar. Dilengkapi boom teleskopik 5-seksi sepanjang 10,7–43,5 meter yang dapat diperpanjang dengan jib untuk jangkauan ekstra. Sistem AML (Automatic Moment Limiter) generasi terbaru memberikan perlindungan beban berlebih secara otomatis dan akurat. Sangat cocok untuk erection baja struktur, pemasangan panel prefab, pengangkatan peralatan berat di area industri, serta proyek konstruksi gedung bertingkat. Unit ini dilengkapi outrigger hidraulik empat titik untuk stabilitas maksimal di segala kondisi permukaan.', 'Kapasitas Angkat Maks: 60 ton\nPanjang Boom: 10.7 – 43.5 m\nPanjang Jib: 9.5 – 16.0 m\nSudut Boom Maks: 78°\nJangkauan Maks dengan Boom: 40.0 m\nJangkauan Maks dengan Jib: 53.0 m\nTinggi Kait Maks (Boom): 43.0 m\nTinggi Kait Maks (Jib): 55.0 m\nKecepatan Hoist Maks: 130 m/menit\nKecepatan Swing: 2.5 rpm\nDaya Mesin: 270 HP (201 kW)\nTipe Mesin: Isuzu 6HK1-TCC\nBerat Total: 49.900 kg\nPanjang Total (travel): 12.795 mm\nOutrigger Span (maks): 6.5 m × 6.5 m\nKapasitas Tangki BBM: 400 L\nTahun Produksi: 2022\nSertifikasi: SIA, K3, SNI', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80&auto=format&fit=crop', 'available', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(6, 'Wheel Loader Komatsu WA380-8', 'wheel-loader-komatsu-wa380-8-wXFAu', 'Wheel Loader', 'Wheel Loader Komatsu WA380-8 adalah mesin loading material serbaguna dengan kapasitas bucket besar dan sistem transmisi otomatis canggih. Dirancang untuk efisiensi tinggi dalam operasi loading material curah seperti pasir, batu, tanah, dan bijih mineral ke dump truck atau hopper. Sistem Intelligent Machine Control (IMC) membantu operator memaksimalkan produktivitas sambil mengurangi konsumsi bahan bakar. Fitur lock-up transmission clutch meningkatkan efisiensi bahan bakar hingga 10% saat perjalanan jarak jauh. Saat ini unit sedang dalam jadwal perawatan berkala dan akan kembali tersedia dalam 2 minggu.', 'Kapasitas Bucket: 2.7 m³\nBerat Operasi: 18.870 kg\nDaya Mesin: 193 HP (144 kW)\nTipe Mesin: Komatsu SAA6D107E-3\nBreakout Force: 15.500 kgf\nTinggi Dump Maks: 3.200 mm\nJangkauan Dump: 1.310 mm\nKecepatan Perjalanan Maks: 37.0 km/jam\nRadius Putar (luar): 5.870 mm\nKapasitas Tangki BBM: 295 L\nKapasitas Tangki Hidrolik: 130 L\nTransmisi: Automatic, 4F/4R\nPanjang Total: 7.960 mm\nLebar Total: 2.740 mm\nTinggi Total: 3.380 mm\nTekanan Ban: 4.50 kg/cm²\nTahun Produksi: 2020\nSertifikasi: SNI, K3', 'https://images.unsplash.com/photo-1565008447742-97f6f38c985c?w=800&q=80&auto=format&fit=crop', 'unavailable', 0, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(7, 'Dump Truck Hino FM 260 JD', 'dump-truck-hino-fm-260-jd-foxYJ', 'Dump Truck', 'Dump Truck Hino FM 260 JD adalah truk pembuang material berat yang dirancang untuk operasi tambang dan konstruksi intensif. Bak hidrolik baja Hardox dengan kapasitas 20 ton memungkinkan pengosongan material yang cepat dan efisien. Mesin Hino J08E-VB bertenaga 260 HP dengan turbo intercooler memberikan torsi besar untuk medan tanjak dan beban penuh. Dilengkapi retarder engine dan exhaust brake untuk pengereman aman saat turunan panjang. Suspensi parabola empat titik yang diperkuat memberikan kenyamanan dan ketahanan di medan off-road. Sistem PTO hidrolik menggerakkan bak dengan smooth dan cepat.', 'Kapasitas Muatan: 20 ton\nVolume Bak: 12 m³\nDaya Mesin: 260 HP (194 kW)\nTipe Mesin: Hino J08E-VB Turbocharged Intercooler\nTorsi Maks: 882 N·m @ 1.500 rpm\nTransmisi: Manual 6 Speed + Retarder\nGVW: 26.000 kg\nPanjang Total: 7.920 mm\nLebar Total: 2.490 mm\nTinggi Total: 2.800 mm\nWheelbase: 4.600 mm\nKapasitas Tangki BBM: 400 L\nSistem Bak: Hidrolik 3 arah\nMaterial Bak: Hardox 400\nSistem Rem: Air Brake + Exhaust Brake\nBan: 12R 22.5\nTahun Produksi: 2021\nSertifikasi: SNI, K3', 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=800&q=80&auto=format&fit=crop', 'available', 0, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(8, 'Backhoe Loader JCB 3CX Super', 'backhoe-loader-jcb-3cx-super-VgA94', 'Backhoe', 'Backhoe Loader JCB 3CX Super adalah mesin konstruksi serbaguna yang menggabungkan kemampuan loader di depan dan ekskavator di belakang dalam satu unit kompak. Sangat efisien untuk pekerjaan di area perkotaan atau lokasi sempit seperti galian utilitas (pipa, kabel), konstruksi drainase, demolisi ringan, dan loading material. Dengan sistem Powershift transmission 4WD, unit ini bermanuver lincah bahkan di permukaan basah dan berlumpur. Boom Extend-a-Hoe pada model Super memungkinkan penggalian lebih dalam hingga kedalaman 5.870 mm. Kabin dilengkapi AC, safety glass, dan ROPS/FOPS untuk keselamatan operator.', 'Berat Operasi: 8.430 kg\nDaya Mesin: 92 HP (69 kW)\nTipe Mesin: JCB EcoMAX T4F\nKedalaman Gali (Standar): 5.460 mm\nKedalaman Gali (Extend-a-Hoe): 5.870 mm\nJangkauan Gali Maks: 7.210 mm\nGaya Gali Bucket: 6.262 kgf\nKapasitas Bucket Loader: 1.0 m³\nBreakout Force Loader: 6.577 kgf\nTinggi Dump Loader: 2.680 mm\nKecepatan Perjalanan: 38.6 km/jam\nRadius Putar Swing: 180°\nKapasitas Tangki BBM: 140 L\nTransmisi: Powershift 4WD\nPanjang Total: 5.913 mm\nLebar Total: 2.360 mm\nTahun Produksi: 2022\nSertifikasi: CE, SNI, K3', 'https://images.unsplash.com/photo-1572025442646-866d16c84a54?w=800&q=80&auto=format&fit=crop', 'available', 0, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_01_01_000000_create_users_table', 1),
(4, '2024_01_01_000001_create_equipment_table', 1),
(5, '2024_01_01_000002_create_articles_table', 1),
(6, '2024_01_01_000003_create_careers_table', 1),
(7, '2024_01_01_000004_create_contact_messages_table', 1),
(8, '2024_01_01_000005_create_projects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `client`, `location`, `category`, `project_date`, `is_active`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Pembangunan Jalan Tol Trans-Sumatera Ruas Pekanbaru–Padang', 'pembangunan-jalan-tol-trans-sumatera-ruas-pekanbaru-padang-b7BYt', 'Dukungan 45 unit alat berat untuk pembangunan jalan tol sepanjang 258 km melewati pegunungan Bukit Barisan dengan medan yang sangat menantang.', '<h2>Gambaran Proyek</h2><p>Proyek Tol Trans-Sumatera Ruas Pekanbaru–Padang adalah salah satu pekerjaan infrastruktur paling ambisius yang pernah ditangani PT Kontragtor. Dengan total panjang 258 km melewati kontur Pegunungan Bukit Barisan, proyek ini menghadirkan tantangan teknis luar biasa: lereng curam, batuan keras, dan curah hujan tinggi sepanjang tahun.</p><h2>Kontribusi PT Kontragtor</h2><p>Kami menyediakan total 45 unit alat berat selama 18 bulan pengerjaan, terdiri dari: 12 unit Excavator Komatsu PC300 dan PC400, 8 unit Bulldozer Komatsu D155, 10 unit Dump Truck Hino 260, 6 unit Motor Grader Caterpillar 140K, 5 unit Vibratory Roller Bomag BW 213, dan 4 unit Rock Breaker.</p><h2>Hasil</h2><p>Volume timbunan yang berhasil diselesaikan: 4,2 juta m³. Tidak ada insiden K3 selama 18 bulan operasional.</p>', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80&auto=format&fit=crop', 'PT Hutama Karya (Persero)', 'Riau & Sumatera Barat', 'Jalan & Jembatan', '2023-08-01', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(2, 'Reklamasi Kawasan Industri Batam Tahap III', 'reklamasi-kawasan-industri-batam-tahap-iii-melZ0', 'Proyek reklamasi laut seluas 150 hektar untuk pengembangan kawasan industri baru di Batam, membutuhkan 28 unit alat berat khusus reklamasi.', '<h2>Konteks Proyek</h2><p>Kawasan Industri Batam terus berkembang sebagai hub manufaktur terdepan di Indonesia. Tahap III pengembangan membutuhkan reklamasi 150 hektar lahan baru dari perairan Selat Singapura.</p><h2>Armada yang Dikerahkan</h2><ul><li>8 unit Excavator Long Reach untuk penimbunan dari barge ke daratan</li><li>6 unit Amphibious Excavator untuk bekerja langsung di zona air</li><li>4 unit Bulldozer D8T Caterpillar untuk spreading material timbunan</li><li>6 unit Vibratory Roller untuk pemadatan bertahap</li><li>4 unit Wheel Loader untuk loading material dari stockpile</li></ul><h2>Inovasi Teknis</h2><p>Untuk pertama kalinya, kami menerapkan sistem GPS Machine Control pada seluruh armada bulldozer. Teknologi ini memungkinkan pembentukan kontur lahan reklamasi yang presisi sesuai desain, menghemat waktu pengerjaan hingga 20%.</p>', 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80&auto=format&fit=crop', 'PT Bintan Industrial Estate', 'Batam, Kepulauan Riau', 'Reklamasi & Infrastruktur', '2024-01-15', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(3, 'Pembangunan Bendungan Serayu Tambak — Jawa Tengah', 'pembangunan-bendungan-serayu-tambak-jawa-tengah-TnroE', 'Dukungan armada alat berat untuk pembangunan bendungan multi-fungsi berkapasitas 45 juta m3 yang melayani irigasi 20.000 hektar sawah di Jawa Tengah.', '<h2>Signifikansi Proyek</h2><p>Bendungan Serayu Tambak adalah proyek strategis nasional yang akan menampung 45 juta m3 air untuk irigasi, pengendalian banjir, dan air baku. Dengan dinding bendungan setinggi 68 meter, ini adalah salah satu bendungan terbesar yang dibangun di Jawa dalam dekade terakhir.</p><h2>Peran PT Kontragtor</h2><p>Sebagai subkontraktor alat berat utama, kami menyediakan 38 unit selama 30 bulan: 10 unit Excavator Hitachi ZX350 dan ZX490, 12 unit Dump Truck Hino 260 dan Volvo A30G, 6 unit Vibratory Roller Bomag BW 213, 4 unit Bulldozer D155, serta 4 unit Excavator PC200 dan 2 unit Mobile Crane.</p><h2>Volume Pekerjaan</h2><p>Total volume tanah yang dipindahkan selama proyek mencapai 8,7 juta m3, dengan sistem manajemen armada real-time di area seluas 340 hektar.</p>', 'https://images.unsplash.com/photo-1592940572894-291a8ce13c28?w=800&q=80&auto=format&fit=crop', 'Kementerian PUPR RI', 'Banyumas & Purbalingga, Jawa Tengah', 'Infrastruktur Air', '2022-06-01', 1, 1, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(4, 'Proyek Pertambangan Batu Bara PT Kaltim Prima Coal — Sangatta', 'proyek-pertambangan-batu-bara-pt-kaltim-prima-coal-sangatta-pA5Bv', 'Dukungan alat berat untuk overburden removal dan coal getting di salah satu tambang batu bara terbesar di Asia, dengan 62 unit yang dioperasikan 24 jam.', '<h2>Lingkup Pekerjaan</h2><p>PT Kaltim Prima Coal (KPC) di Sangatta adalah salah satu tambang batu bara open-pit terbesar di Asia dengan produksi 60 juta ton per tahun. PT Kontragtor menyediakan alat berat untuk pekerjaan overburden removal dan support operasional tambang.</p><h2>Armada 24/7</h2><ul><li>20 unit Excavator Hitachi EX2600 dan Komatsu PC2000 (class 200-300 ton)</li><li>30 unit Articulated Dump Truck Volvo A40G kapasitas 38 ton</li><li>8 unit Bulldozer Komatsu D375A dan D475A untuk push dozing</li><li>4 unit Motor Grader Caterpillar 16M untuk perawatan haul road</li></ul><h2>Pencapaian</h2><p>Selama kontrak 24 bulan, unit-unit kami berhasil memindahkan 78 juta BCM overburden dengan availability rate rata-rata 88%, melampaui target kontraktual 85%.</p>', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80&auto=format&fit=crop', 'PT Kaltim Prima Coal', 'Sangatta, Kutai Timur, Kalimantan Timur', 'Pertambangan', '2023-03-01', 1, 0, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(5, 'Pembangunan Pelabuhan Kontainer Patimban Tahap I', 'pembangunan-pelabuhan-kontainer-patimban-tahap-i-ozR09', 'Kontribusi alat berat untuk pembangunan Pelabuhan Patimban yang akan menjadi pelabuhan kontainer terbesar ketiga di Indonesia setelah Tanjung Priok dan Tanjung Perak.', '<h2>Proyek Strategis Nasional</h2><p>Pelabuhan Internasional Patimban didesain untuk kapasitas 7,5 juta TEUs per tahun saat selesai penuh. Tahap I mencakup pembangunan dermaga, lapangan kontainer, dan infrastruktur jalan akses.</p><h2>Pekerjaan yang Ditangani</h2><p>PT Kontragtor terlibat dalam pekerjaan reklamasi dan earthwork untuk lapangan kontainer seluas 32 hektar: Excavator Long Reach dan Amphibious Excavator untuk reklamasi, Vibratory Roller untuk pemadatan, Pile Driver Hitachi KH180 untuk pemancangan dermaga, dan Mobile Crane Tadano GT-1000EX kapasitas 100 ton untuk erection precast.</p>', 'https://images.unsplash.com/photo-1565008447742-97f6f38c985c?w=800&q=80&auto=format&fit=crop', 'Konsorsium PT Waskita dan Tokyu Construction', 'Subang, Jawa Barat', 'Pelabuhan & Maritim', '2021-09-01', 1, 0, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(6, 'Pembangunan Hunian TOD MRT Phase 2 — Jakarta Selatan', 'pembangunan-hunian-tod-mrt-phase-2-jakarta-selatan-hteFd', 'Dukungan crane dan alat berat untuk pembangunan 3 tower apartemen TOD setinggi 45 lantai di atas stasiun MRT Jakarta.', '<h2>Proyek TOD Terkini di Jakarta</h2><p>Transit Oriented Development di atas Stasiun MRT Lebak Bulus dan Fatmawati mengintegrasikan hunian, komersial, dan transportasi publik dalam satu kawasan. Proyek 3 tower 45 lantai ini membutuhkan manajemen pengangkatan vertikal yang sangat presisi di area padat ibu kota.</p><h2>Armada yang Dikerahkan</h2><ul><li>3 unit Tower Crane Potain MDT 268 untuk erection struktur baja dan pengecoran</li><li>2 unit Mobile Crane Tadano GT-600EX untuk mobilisasi material di ground level</li><li>4 unit Excavator Komatsu PC200 untuk pekerjaan basement 5 lantai</li><li>2 unit Concrete Pump Schwing S36 SX untuk pengecoran plat dan kolom</li></ul>', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800&q=80&auto=format&fit=crop', 'PT Summarecon Agung Tbk.', 'Lebak Bulus dan Fatmawati, Jakarta Selatan', 'Konstruksi Gedung', '2024-03-01', 1, 0, '2026-05-03 03:22:21', '2026-05-03 03:22:21'),
(7, 'Land Clearing Perkebunan Sawit — Kalimantan Tengah', 'land-clearing-perkebunan-sawit-kalimantan-tengah-O1cuD', 'Land clearing 8.500 hektar lahan gambut untuk perluasan kebun sawit dengan metode ramah lingkungan, menggunakan 25 unit alat berat termodifikasi khusus.', '<h2>Konteks Lingkungan yang Sensitif</h2><p>Pekerjaan land clearing di lahan gambut Kalimantan Tengah membutuhkan pendekatan yang sangat berbeda dari land clearing biasa. Regulasi lingkungan yang ketat mengharuskan penggunaan metode zero burning dan pelestarian kanal gambut yang ada.</p><h2>Armada Khusus Gambut</h2><ul><li>12 unit Excavator dengan track extra-lebar 900mm (ground pressure rendah 0,28 kg/cm2)</li><li>6 unit Bulldozer D6T dengan LGP (Low Ground Pressure) track</li><li>4 unit Amphibious Excavator untuk pekerjaan di kanal dan rawa</li><li>3 unit Tree Pusher attachment untuk penumbangan pohon yang efisien</li></ul><h2>Hasil dan Dampak</h2><p>8.500 hektar berhasil disiapkan dalam 14 bulan. Sistem kanal gambut existing berhasil dipertahankan 100% sesuai persyaratan AMDAL. Zero incident K3 selama seluruh durasi proyek.</p>', 'https://images.unsplash.com/photo-1590856029826-c7a73142bbf1?w=800&q=80&auto=format&fit=crop', 'PT Astra Agro Lestari Tbk.', 'Kotawaringin Timur, Kalimantan Tengah', 'Pertanian & Perkebunan', '2022-11-01', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22'),
(8, 'Pembangunan Jembatan Sei Alalak — Kalimantan Selatan', 'pembangunan-jembatan-sei-alalak-kalimantan-selatan-YBWHe', 'Dukungan crane dan alat berat untuk pembangunan Jembatan Sei Alalak, jembatan cable-stayed pertama di Kalimantan dengan bentang utama 130 meter.', '<h2>Ikon Infrastruktur Kalimantan</h2><p>Jembatan Sei Alalak adalah jembatan cable-stayed pertama di Pulau Kalimantan, dirancang dengan arsitektur terinspirasi dari kelopak bunga Raflesia. Jembatan sepanjang 850 meter ini menghubungkan Kota Banjarmasin dan Kabupaten Barito Kuala.</p><h2>Peran PT Kontragtor</h2><ul><li>2 unit Crawler Crane Liebherr LTM (kapasitas 1.200 ton) untuk erection girder dan pylon</li><li>4 unit Mobile Crane Tadano GT-1000EX untuk pekerjaan pendukung</li><li>6 unit Excavator PC300 untuk pekerjaan abutment dan pile cap</li><li>3 unit Pile Driver untuk pemancangan tiang pondasi di dasar sungai</li></ul><p>Pengangkatan pylon setinggi 65 meter menjadi pekerjaan paling kritis yang membutuhkan perencanaan lift matang dan sinergi dua crawler crane secara tandem.</p>', 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80&auto=format&fit=crop', 'Kementerian PUPR dan Pemprov Kalsel', 'Banjarmasin, Kalimantan Selatan', 'Jalan & Jembatan', '2021-04-01', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22'),
(9, 'Rehabilitasi Jalan Nasional Trans-Papua Barat', 'rehabilitasi-jalan-nasional-trans-papua-barat-VqSXl', 'Pelebaran dan rehabilitasi 320 km jalan nasional di Papua Barat dalam kondisi medan hutan hujan tropis dan aksesibilitas yang sangat terbatas.', '<h2>Tantangan Terberat dalam Sejarah Kami</h2><p>Proyek Trans-Papua Barat adalah pengalaman paling menantang yang pernah dihadapi PT Kontragtor. Aksesibilitas terbatas, curah hujan ekstrem, topografi berbukit, dan jarak mobilisasi sangat jauh menciptakan kombinasi tantangan yang jarang ditemui dalam satu proyek.</p><h2>Solusi Logistik Inovatif</h2><p>Semua alat berat dimobilisasi via kapal ro-ro dari Surabaya ke Manokwari, kemudian bergerak mandiri ke titik-titik kerja yang tersebar sepanjang 320 km. Workshop lapangan mobile kami memastikan perawatan dan perbaikan bisa dilakukan di lokasi.</p><h2>Armada</h2><ul><li>18 unit Excavator berbagai kelas untuk pembentukan badan jalan</li><li>8 unit Bulldozer untuk land clearing dan grading</li><li>6 unit Motor Grader untuk pembentukan permukaan</li><li>10 unit Dump Truck untuk pengangkutan material</li><li>4 unit Asphalt Finisher dan Tandem Roller untuk lapisan perkerasan</li></ul>', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80&auto=format&fit=crop', 'Balai Pelaksanaan Jalan Nasional Papua Barat', 'Manokwari – Sorong, Papua Barat', 'Jalan & Jembatan', '2023-06-01', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22'),
(10, 'Pembangunan PLTU Batubara Tanjung Jati B Unit 5 dan 6', 'pembangunan-pltu-batubara-tanjung-jati-b-unit-5-dan-6-wfVMm', 'Dukungan crane kelas berat dan alat berat untuk konstruksi PLTU 2x1.000 MW, termasuk pengangkatan turbine generator seberat 380 ton.', '<h2>Proyek Energi Nasional Strategis</h2><p>PLTU Tanjung Jati B Unit 5 dan 6 dengan kapasitas total 2x1.000 MW adalah salah satu proyek pembangkit listrik terbesar yang sedang dibangun di Indonesia. PT Kontragtor dipercaya menyediakan layanan crane dan alat berat untuk fase konstruksi civil dan erection mekanikal.</p><h2>Pengangkatan Turbine Generator — Lift Terberat</h2><p>Pengangkatan turbine generator seberat 380 ton dan generator stator 290 ton menjadi momen paling kritis. PT Kontragtor menyiapkan 2 unit Crawler Crane Liebherr dengan kapasitas tandem 800 ton, dikonfigurasi untuk tandem lift dengan perencanaan matang selama 3 bulan.</p><h2>Armada Lainnya</h2><ul><li>4 unit Mobile Crane 150-250 ton untuk erection struktural</li><li>8 unit Excavator PC300-500 untuk pekerjaan civil</li><li>6 unit Dump Truck untuk pengangkutan material</li><li>2 unit Crawler Crane untuk erection boiler dan chimney</li></ul>', 'https://images.unsplash.com/photo-1592940572894-291a8ce13c28?w=800&q=80&auto=format&fit=crop', 'PT PLN (Persero) dan Sumitomo Corporation', 'Jepara, Jawa Tengah', 'Energi & Power Plant', '2022-01-15', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22'),
(11, 'Normalisasi Sungai Ciliwung — Pengendalian Banjir Jakarta', 'normalisasi-sungai-ciliwung-pengendalian-banjir-jakarta-TdrW1', 'Pengerukan dan normalisasi 33 km alur Sungai Ciliwung sebagai bagian program pengendalian banjir Jakarta, menggunakan excavator long reach dan amphibious.', '<h2>Urgensi Pengendalian Banjir Jakarta</h2><p>Banjir tahunan Jakarta merugikan ekonomi ibu kota triliunan rupiah. Program normalisasi Sungai Ciliwung sepanjang 33 km adalah intervensi infrastruktur kunci untuk meningkatkan kapasitas aliran dan mengurangi risiko banjir di kawasan padat penduduk.</p><h2>Armada Khusus Sungai</h2><ul><li>8 unit Excavator Long Reach (arm 12-14 meter) beroperasi dari tepi sungai</li><li>4 unit Amphibious Excavator untuk pengerukan di badan sungai</li><li>6 unit Dump Truck untuk pengangkutan material hasil keruk</li><li>2 unit Excavator standar untuk perapian tebing dan pemasangan sheet pile</li></ul><h2>Tantangan Operasional di Dalam Kota</h2><p>Operasional di tengah pemukiman padat Jakarta membutuhkan manajemen kebisingan dan getaran yang ketat. Jam operasional disesuaikan dengan ketentuan Pemprov DKI: 07.00-21.00.</p>', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800&q=80&auto=format&fit=crop', 'BBWS Ciliwung Cisadane / Pemprov DKI Jakarta', 'Jakarta dan Bogor', 'Infrastruktur Air', '2023-10-01', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22'),
(12, 'Pematangan Lahan Kawasan Ekonomi Khusus Kendal', 'pematangan-lahan-kawasan-ekonomi-khusus-kendal-QQsLR', 'Pematangan lahan 2.700 hektar Kawasan Ekonomi Khusus Kendal yang menjadi salah satu KEK terbesar di Indonesia, dengan 40 unit alat berat selama 20 bulan.', '<h2>KEK Kendal — Magnet Investasi Asing</h2><p>Kawasan Ekonomi Khusus Kendal dirancang untuk menarik investasi manufaktur dari Taiwan, Jepang, dan Korea Selatan. Pematangan lahan 2.700 hektar menjadi fondasi dari seluruh pengembangan kawasan yang ditargetkan menyerap 70.000 tenaga kerja.</p><h2>Lingkup Pematangan Lahan</h2><ul><li>Land clearing vegetasi dan bangunan eksisting</li><li>Timbunan dan grading lahan dari elevasi +1 hingga +3 meter MSL</li><li>Pembangunan jaringan drainase primer sepanjang 45 km</li><li>Pemadatan sub-grade untuk jalan internal kawasan</li></ul><h2>Armada</h2><ul><li>12 unit Excavator Komatsu PC300 dan Caterpillar 320</li><li>8 unit Bulldozer D85 dan D155 untuk spreading material</li><li>14 unit Dump Truck kapasitas 20-25 ton</li><li>6 unit Vibratory Roller untuk pemadatan</li></ul><p>Volume timbunan total: 12,3 juta m3 — proyek earthwork terbesar dalam sejarah PT Kontragtor hingga saat ini.</p>', 'https://images.unsplash.com/photo-1590856029826-c7a73142bbf1?w=800&q=80&auto=format&fit=crop', 'PT Kawasan Industri Kendal', 'Kendal, Jawa Tengah', 'Infrastruktur', '2021-07-01', 1, 0, '2026-05-03 03:22:22', '2026-05-03 03:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0JgdrLfgyLX3ojOTsQ2dOFZSVf5EBki6hKqG09ID', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJxT2wwbGNpZ09FY3h3c05pbTJCWHNnMjZvWXhnV05vVkpNTUg1N2lXIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDEiLCJyb3V0ZSI6ImhvbWUifX0=', 1777803788),
('i2e78CS6aHBFyAJJgjghRupTpKBs9x6HkpPKuMW7', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI2RERGQVFqRU13Szh5NWN1ckw1YWZoenYxOEgyOU5mZ0lQeGRpd0I5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1777818422),
('XaQ7mBlRZukBMp8K4QhBEI5z1cxrECifF4HMm1VY', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJXaEN0RmdVWlN4dnpoNllJenllbEprd1lHYjNUY1NrOW52ak5HUEIxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1777803750);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@kontragtor.com', '$2y$12$rQCDrXxkbIj7sPEqSHa6WeUCmBXaNTh1bKrOQ85m4iQmkvK1Yscei', 'admin', NULL, '2026-05-03 03:22:21', '2026-05-03 03:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipment_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
