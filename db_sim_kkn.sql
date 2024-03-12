-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2024 at 04:17 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim_kkn`
--

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contoh`
--

INSERT INTO `contoh` (`nim`, `nama`, `kelas`) VALUES
('226500012', 'User 8', 'A'),
('226500013', 'User 9', 'A'),
('226500014', 'User 10', 'A'),
('226500015', 'User 11', 'B'),
('226500016', 'User 12', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_09_033127_create_table_mahasiswa', 1),
(6, '2023_06_09_095417_periode_kkn', 1),
(7, '2023_06_09_100403_create_tbl_fakultas', 1),
(8, '2023_06_09_100554_create_tbl_jurusan', 2),
(9, '2023_06_19_042647_create_tbl_calon_kkn', 3),
(10, '2023_06_19_051949_create_tbl_berkas_calon_kkn', 4),
(11, '2023_06_19_102420_create_tbl_pengguna', 5),
(12, '2023_06_20_043238_add_paid_to_tbl_pengguna', 6),
(13, '2023_06_22_091632_create_tbl_berita', 7),
(14, '2023_06_22_093217_add_waktu', 8),
(15, '2023_07_04_074718_create_tbl_pengguna', 9),
(16, '2023_07_07_050732_add_id_periode', 10),
(17, '2023_07_08_174034_create_table_desa', 11),
(18, '2023_07_09_124856_create_tbl_dpl', 12),
(19, '2023_08_04_092834_create_table_group_anggota_kkn', 13),
(20, '2023_08_04_095851_create_detail_anggota_kkn', 14),
(21, '2023_08_04_182635_create_tbl_dpl', 15),
(22, '2024_03_04_114959_add_tgl_mulai_tbl_periode_kkn', 16);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `thumbnail`, `judul`, `author`, `konten`, `tgl`, `waktu`) VALUES
(6, 'file_20240310160624.png', '[PENGUMUMAN] Pendaftaran KKN-T UNIDAYAN Angkatan IX T.A. 2023/2024', 'Admin', '<p style=\"box-sizing: inherit; border: 0px; font-size: 16px; margin-bottom: 0.5em; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">BATAS PENDAFTARAN KKN-T ANGKATAN IX T.A. 2023/2024 : 9 Maret 2024!!</p><p style=\"box-sizing: inherit; border: 0px; font-size: 16px; margin-bottom: 0.5em; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">Pendaftaran KKN-T telah kembali dibuka mulai hari ini dan akan ditutup pada tanggal 9 Maret 2024 pukul 23.00 WITA.<br style=\"box-sizing: inherit;\">Jangan ditunda lagi dan segera mendaftar sebelum terlambat!<br style=\"box-sizing: inherit;\">Formulir pendaftaran dapat diakses pada link berikut : https://bit.ly/formpendaftaranKKN-T_IX_2024</p><p style=\"box-sizing: inherit; border: 0px; font-size: 16px; margin-bottom: 0.5em; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">Persyaratan yang harus dilengkapi antara lain :</p><p style=\"box-sizing: inherit; border: 0px; font-size: 16px; margin-bottom: 0.5em; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">1. Pas Foto Warna;<br style=\"box-sizing: inherit;\">2. Telah menempuh 110 SKS;<br style=\"box-sizing: inherit;\">3. Transkrip Nilai terbaru (cap dan bertanda tangan Ketua Program Studi);<br style=\"box-sizing: inherit;\">4. Bukti Pembayaran KKN-T;<br style=\"box-sizing: inherit;\">5. Surat Izin Atasan (Bagi yang bekerja).</p><p style=\"box-sizing: inherit; border: 0px; font-size: 16px; margin-bottom: 0.5em; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">* Formulir ini wajib diisi oleh mahasiswa yang memprogram mata kuliah KKN-T pada semester terkait.<br style=\"box-sizing: inherit;\">* Mahasiswa yang diperbolehkan mendaftar KKN-T adalah mereka yang telah lulus minimal 110 SKS.<br style=\"box-sizing: inherit;\">* Baca dengan teliti dan isilah dengan lengkap dan tepat.<br style=\"box-sizing: inherit;\">* Sebelum mengisi form pendaftaran, silahkan mendownload form surat izin atasan pada link : bit.ly/Form_Surat_Izin_Atasan</p><p style=\"box-sizing: inherit; border: 0px; font-size: 16px; outline: 0px; vertical-align: baseline; color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif;\">Perhatian : Hasil Pendaftaran online yang masuk di email masing – masing mahasiswa WAJIB DIKIRIM ke email Panitia KKN-T pada alamat :&nbsp;kknlpmunidayan@gmail.com&nbsp;(dalam bentuk PDF) atau diserahkan langsung di ruang LPM (dalam bentuk print out).</p>', '2024-03-10', '16:24:00'),
(7, 'file_20240310162333.png', '[PENGUMUMAN] NILAI AKHIR PESERTA KKN-T ANGK. VIII T.A. 2022/2023 UNIDAYAN', 'Admin', '<p><span style=\"color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Diberitahukan kepada seluruh mahasiswa yang telah mengikuti kegiatan KKN-T Unidayan Angkatan VIII T.A. 2022/2023, berikut perolehan nilai akhir KKN-T Angkatan VIII yang dapat dilihat sesuai Program Studi&nbsp;</span><br></p>', '2024-03-10', '16:33:00'),
(8, 'file_20240310162649.png', 'Berikut List Lokasi / Posko KKN-T Angkatan VIII T.A. 2022/2023 untuk mahasiswa pengumpul tugas makalah pembekalan dengan presensi di bawah 60% dan juga mahasiswa KIP.', 'Admin', '<p><span style=\"color: rgb(16, 18, 24); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Berikut List Lokasi / Posko KKN-T Angkatan VIII T.A. 2022/2023 untuk mahasiswa pengumpul tugas makalah pembekalan dengan presensi di bawah 60% dan juga mahasiswa KIP.</span><br></p>', '2024-03-10', '16:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_calon_kkn`
--

CREATE TABLE `tbl_berkas_calon_kkn` (
  `id_berkas_calon_kkn` bigint NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_izin_atasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_izin_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `krs_terakhir` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transkip_nilai` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip_pembayaran_smt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip_pembayaran_kkn` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_berkas_calon_kkn`
--

INSERT INTO `tbl_berkas_calon_kkn` (`id_berkas_calon_kkn`, `foto`, `surat_izin_atasan`, `sertifikat_vaksin`, `surat_izin_ortu`, `krs_terakhir`, `transkip_nilai`, `slip_pembayaran_smt`, `slip_pembayaran_kkn`) VALUES
(52, 'file_20240312142838.jpeg', NULL, 'default.pdf', 'file_20240312142802.pdf', 'file_20240312142922.pdf', 'file_20240312142940.pdf', 'file_20240312142958.pdf', 'file_20240312143019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calon_kkn`
--

CREATE TABLE `tbl_calon_kkn` (
  `id_calon_kkn` bigint UNSIGNED NOT NULL,
  `id_mhs` int NOT NULL,
  `kode_calon_kkn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_baju` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_berkas_calon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int NOT NULL,
  `id_periode_kkn` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_calon_kkn`
--

INSERT INTO `tbl_calon_kkn` (`id_calon_kkn`, `id_mhs`, `kode_calon_kkn`, `email`, `nomor_hp`, `ukuran_baju`, `desa`, `kelurahan`, `kecamatan`, `kabupaten`, `id_berkas_calon`, `tgl_daftar`, `status`, `id_periode_kkn`) VALUES
(145, 517, '8348fdab-a5c4-43df-84a1-af9085287ef0', 'kopralgamers1510@gmail.com', '082297886738', 'XL', 'Dongkala', NULL, 'Kabaena Timur', 'KAB. BOMBANA', '52', '2024-03-12', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id_desa` bigint UNSIGNED NOT NULL,
  `id_periode_kkn` int NOT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `id_periode_kkn`, `kabupaten`, `kecamatan`, `desa`, `created_at`, `updated_at`) VALUES
(9, 6, 'KAB. KOLAKA', 'Wundulako', 'Wundulako', '2023-07-11 03:32:20', '2023-07-11 03:32:20'),
(10, 6, 'KAB. KOLAKA', 'Kolaka', 'Lamokato', '2023-07-11 03:32:28', '2023-07-11 03:32:28'),
(11, 6, 'KAB. KOLAKA', 'Wundulako', '19 Nopember', '2023-07-11 03:32:46', '2023-07-11 03:32:46'),
(12, 6, 'KAB. KOLAKA', 'Wundulako', 'Lamekongga', '2023-07-11 03:32:52', '2023-07-11 03:32:52'),
(13, 6, 'KAB. KOLAKA', 'Wundulako', 'Kowioha', '2023-07-11 03:32:56', '2023-07-11 03:32:56'),
(14, 6, 'KAB. KOLAKA', 'Wundulako', 'Silea', '2023-07-11 03:33:00', '2023-07-11 03:33:00'),
(15, 6, 'KAB. KOLAKA', 'Wundulako', 'Ngapa', '2023-07-11 03:33:04', '2023-07-11 03:33:04'),
(16, 6, 'KAB. KOLAKA', 'Wundulako', 'Towua', '2023-07-11 03:33:08', '2023-07-11 03:33:08'),
(17, 6, 'KAB. KOLAKA', 'Wundulako', 'Bende', '2023-07-11 03:33:12', '2023-07-11 03:33:12'),
(18, 6, 'KAB. KOLAKA', 'Wundulako', 'Unamendaa', '2023-07-11 03:33:16', '2023-07-11 03:33:16'),
(19, 6, 'KAB. KOLAKA', 'Wundulako', 'Tikonu', '2023-07-11 03:33:19', '2023-07-11 03:33:19'),
(20, 6, 'KAB. KOLAKA', 'Wundulako', 'Sabiona', '2023-07-11 03:33:25', '2023-07-11 03:33:25'),
(21, 6, 'KAB. KOLAKA', 'Kolaka', 'Watuliandu', '2023-07-11 03:33:34', '2023-07-11 03:33:34'),
(22, 11, 'KAB. KOLAKA', 'Pomalaa', 'Dawi-Dawi', '2024-03-12 12:09:21', '2024-03-12 12:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_anggota_kkn`
--

CREATE TABLE `tbl_detail_anggota_kkn` (
  `id` bigint UNSIGNED NOT NULL,
  `id_group` int NOT NULL,
  `id_calon_kkn` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpl`
--

CREATE TABLE `tbl_dpl` (
  `id_dpl` bigint UNSIGNED NOT NULL,
  `id_periode_kkn` int NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_depan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dpl`
--

INSERT INTO `tbl_dpl` (`id_dpl`, `id_periode_kkn`, `nidn`, `nama_dosen`, `gelar_depan`, `gelar_belakang`, `nomor_hp`, `email`, `created_at`, `updated_at`) VALUES
(3, 6, '7329379273923', 'M. Arif Suryawan', 'S.t', 'M.T', '073682638263', 'arif@gmail.com', '2024-03-03 03:22:29', '2024-03-03 03:22:29'),
(4, 11, '1234839486', 'M. Yusuf Ramadhan', 'S.T', 'M.Kom', '082297886738', 'myusuf@gmail.com', '2024-03-12 12:08:58', '2024-03-12 12:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` bigint UNSIGNED NOT NULL,
  `kode_fakultas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fakultas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `kode_fakultas`, `nama_fakultas`) VALUES
(5, 'DAYANU-001', 'Fakultas Teknik'),
(6, 'DAYANU-002', 'Fakultas Pendidikan'),
(7, 'DAYANU-003', 'Fakultas Hukum'),
(8, 'DAYANU-004', 'Fakultas Pertanian'),
(10, 'DAYANU-005', 'Fakultas Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_anggota_kkn`
--

CREATE TABLE `tbl_group_anggota_kkn` (
  `id` bigint UNSIGNED NOT NULL,
  `id_dpl` int NOT NULL,
  `id_desa` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int NOT NULL,
  `id_fakultas` int NOT NULL,
  `kode_jurusan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `id_fakultas`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 5, 'T-0001', 'Teknik Informatika'),
(3, 5, 'T-0002', 'Teknik Sipil'),
(4, 5, 'T-0003', 'Teknik Mesin'),
(5, 1, 'TM', 'Teknik Mesin'),
(6, 6, 'P-001', 'Matematika'),
(7, 6, 'P-002', 'Bahasa Ingrris'),
(8, 6, 'P-002', 'Sejarah'),
(10, 6, 'P-002', 'Akutansi'),
(11, 6, 'P-002', 'Ekonomi'),
(12, 10, 'E-0001', 'Ekonomi 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` bigint UNSIGNED NOT NULL,
  `nim_mhs` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mhs` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_mhs` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_mhs` date DEFAULT NULL,
  `nomor_hp_mhs` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_mhs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan_mhs` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_fakultas` int NOT NULL DEFAULT '0',
  `id_jurusan` int NOT NULL DEFAULT '0',
  `foto_mhs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nim_mhs`, `nama_mhs`, `tempat_lahir_mhs`, `tgl_lahir_mhs`, `nomor_hp_mhs`, `email_mhs`, `angkatan_mhs`, `id_fakultas`, `id_jurusan`, `foto_mhs`) VALUES
(517, '20110007', 'ULFA AULIA', NULL, NULL, NULL, 'kopralgamers1510@gmail.com', '2020', 5, 1, NULL),
(518, '20320026', 'LA ERDIN PUALI', NULL, NULL, NULL, NULL, '2020', 5, 3, NULL),
(519, '20320001', 'ALDIN', NULL, NULL, NULL, NULL, '2020', 5, 4, NULL),
(520, '20320012', 'ELLEN SALMAWATI', NULL, NULL, NULL, NULL, '2020', 5, 1, NULL),
(521, '20320030', 'HARFIANTI', NULL, NULL, NULL, NULL, '2020', 5, 3, NULL),
(522, '20510068', 'ANDHIKHA BAADI', NULL, NULL, NULL, NULL, '2020', 5, 4, NULL),
(523, '20320024', 'WAHYU ISNUR WATI', NULL, NULL, NULL, NULL, '2020', 5, 3, NULL),
(524, '20320011', 'WAHDA YULIANA HARIADI', NULL, NULL, NULL, NULL, '2020', 5, 1, NULL),
(525, '20320022', 'WA ODE NURAYATI', NULL, NULL, NULL, NULL, '2020', 5, 3, NULL),
(526, '20650005', 'WA ODE TRIWULAN', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(527, '20320005', 'LA ODE HERDIN DAVID', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(528, '20650008', 'RIVALDI', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(529, '20320028', 'RONALD JUMARA TAUDU', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(530, '20650026', 'NUR FATRIANI', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(531, '20510017', 'MUHAMAD AL FAUZAN', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(532, '20510018', 'FANDI FADLI', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(533, '20510016', 'KIKI HARMANSYAH', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(534, '121510094', 'LAODE RAHMAT', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(535, '20650023', 'ASRUL', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(536, '20650017', 'NURJANA AMIN', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(537, '20650011', 'ALMIN', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(538, '20110013', 'ASTRI WULANDARI', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(539, '20650013', 'WA IDA', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(540, '20212010', 'GAERA', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(541, '20212024', 'SITTI SALSABELA', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(542, '20320009', 'ERFIT', NULL, NULL, NULL, NULL, '2020', 6, 11, NULL),
(543, '20110019', 'ALFIN SALIM', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(544, '19630027', 'FAHRUL IMANULLAH DAUS', NULL, NULL, NULL, NULL, '2019', 6, 11, NULL),
(545, '19630047', 'FADLAN RUSLINA', NULL, NULL, NULL, NULL, '2019', 5, 6, NULL),
(546, '20650151', 'MUHAMMAD FAISAL', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(547, '20212006', 'NANDA PAHLAWATI', NULL, NULL, NULL, NULL, '2020', 6, 6, NULL),
(548, '20650165', 'FAISAL PRADANA', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(549, '20212004', 'HAMSIR SESBU', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(550, '20212012', 'AYU', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(551, '19630004', 'WA ODE SUKRIA KAMARULLAH', NULL, NULL, NULL, NULL, '2019', 10, 12, NULL),
(552, '20211002', 'HERIYANTI', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(553, '20211011', 'ASRIMAWATI', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(554, '20410008', 'ZUKNI', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(555, '20110004', 'INDRIANI SAPUTRI', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL),
(556, '20410004', 'SRIYULA ISKANDAR', NULL, NULL, NULL, NULL, '2020', 10, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periode_kkn`
--

CREATE TABLE `tbl_periode_kkn` (
  `id_periode_kkn` bigint UNSIGNED NOT NULL,
  `tahun_akademik` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `status_pendaftaran` int NOT NULL,
  `tgl_akademik` date NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_periode_kkn`
--

INSERT INTO `tbl_periode_kkn` (`id_periode_kkn`, `tahun_akademik`, `angkatan`, `status`, `status_pendaftaran`, `tgl_akademik`, `tgl_mulai`, `tgl_selesai`) VALUES
(11, '2023-2024', 'VI', 1, 1, '2024-03-04', '2024-03-04', '2024-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pengguna` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_pengguna`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(596, '1', 'admin', 'admin@gmail.com', NULL, '$2y$10$pmuUhOQEGDagX6AeZPsJaOTaIzv1lJef.nrNmWEsVkWwBPJPMtylO', 'admin', NULL, '2024-03-03 03:01:19', '2024-03-03 03:01:19'),
(601, '517', 'ulfa20', 'kopralgamers1510@gmail.com', NULL, '$2y$10$S2AZZAKuVJkg.zGYcL9IbO8SrHvcxMPW4nk0oKmYClJoN..d0.sEy', 'mahasiswa', NULL, '2024-03-11 10:06:36', '2024-03-11 10:06:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contoh`
--
ALTER TABLE `contoh`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_berkas_calon_kkn`
--
ALTER TABLE `tbl_berkas_calon_kkn`
  ADD PRIMARY KEY (`id_berkas_calon_kkn`);

--
-- Indexes for table `tbl_calon_kkn`
--
ALTER TABLE `tbl_calon_kkn`
  ADD PRIMARY KEY (`id_calon_kkn`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tbl_detail_anggota_kkn`
--
ALTER TABLE `tbl_detail_anggota_kkn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dpl`
--
ALTER TABLE `tbl_dpl`
  ADD PRIMARY KEY (`id_dpl`),
  ADD UNIQUE KEY `tbl_dpl_email_unique` (`email`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_group_anggota_kkn`
--
ALTER TABLE `tbl_group_anggota_kkn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `tbl_mahasiswa_nim_mhs_unique` (`nim_mhs`),
  ADD UNIQUE KEY `tbl_mahasiswa_email_mhs_unique` (`email_mhs`);

--
-- Indexes for table `tbl_periode_kkn`
--
ALTER TABLE `tbl_periode_kkn`
  ADD PRIMARY KEY (`id_periode_kkn`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_berkas_calon_kkn`
--
ALTER TABLE `tbl_berkas_calon_kkn`
  MODIFY `id_berkas_calon_kkn` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_calon_kkn`
--
ALTER TABLE `tbl_calon_kkn`
  MODIFY `id_calon_kkn` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_detail_anggota_kkn`
--
ALTER TABLE `tbl_detail_anggota_kkn`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_dpl`
--
ALTER TABLE `tbl_dpl`
  MODIFY `id_dpl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_group_anggota_kkn`
--
ALTER TABLE `tbl_group_anggota_kkn`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT for table `tbl_periode_kkn`
--
ALTER TABLE `tbl_periode_kkn`
  MODIFY `id_periode_kkn` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
