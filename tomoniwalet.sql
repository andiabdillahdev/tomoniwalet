-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 16.28
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomoniwalet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_pengiriman_pesanan_header` int(11) NOT NULL,
  `kode` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_pesanan_pembelian_header` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar_produk`
--

INSERT INTO `gambar_produk` (`id`, `id_produk`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'boot.png', '2021-10-13 07:19:54', '2021-10-13 07:19:54'),
(2, 1, '77d81c38033cc58d28ff7d24b449e0c0.png', '2021-10-13 07:19:54', '2021-10-13 07:19:54'),
(3, 2, 'bootstrap-logo-png-1-Transparent-Images-Free.png', '2021-10-13 07:42:33', '2021-10-13 07:42:33'),
(4, 2, 'boot.png', '2021-10-13 07:42:33', '2021-10-13 07:42:33'),
(5, 3, 'boot.png', '2021-10-13 07:52:02', '2021-10-13 07:52:02'),
(6, 4, 'pro1.jpg', '2021-10-24 07:12:48', '2021-10-24 07:12:48'),
(7, 5, 'pro1.jpg', '2021-10-25 09:39:39', '2021-10-25 09:39:39'),
(8, 6, 'produk.png', '2021-12-02 09:00:24', '2021-12-02 09:00:24'),
(9, 7, 'produk.png', '2021-12-02 09:01:58', '2021-12-02 09:01:58'),
(10, 8, 'produk.png', '2021-12-02 09:02:47', '2021-12-02 09:02:47'),
(11, 9, 'produk.png', '2021-12-02 09:03:23', '2021-12-02 09:03:23'),
(12, 10, 'produk.png', '2021-12-02 09:04:23', '2021-12-02 09:04:23'),
(13, 11, 'produk.png', '2021-12-02 09:06:05', '2021-12-02 09:06:05'),
(14, 12, 'bg-mountain.jpg', '2021-12-16 04:37:59', '2021-12-16 04:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'TMW-KTR-001', 'TWEETER AUDAX', '2021-10-13 05:04:19', '2021-10-13 05:04:19'),
(2, 'TMW-SPL-002', 'TWEETER KOBBLE', '2021-10-13 05:04:33', '2021-10-13 05:04:33'),
(3, 'TMW-SPL-003', 'SENTER KEPALA SURYA', '2021-10-13 05:05:00', '2021-10-13 05:05:00'),
(4, 'TMW-SPL-004', 'AMPLI BETAVO', '2021-10-13 05:05:18', '2021-10-13 05:05:18'),
(5, 'TMW-SPL-005', 'Andi Abdillah', '2021-10-30 08:01:25', '2021-10-30 08:01:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2021_10_10_021113_create_kategoris_table', 3),
(10, '2021_10_11_022249_create_suppliers_table', 4),
(14, '2021_10_11_022821_create_satuans_table', 5),
(15, '2021_10_12_013649_create_produks_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('b3448b09b10b922ace17cf6e364db72e8b602315d6d93a95baea1b46fe1cd1d77d587a3ad9992364', 1, 1, 'LaravelAuthApp', '[]', 0, '2021-10-10 05:50:25', '2021-10-10 05:50:25', '2022-10-10 12:50:25'),
('f6cf099f9fbcf5028b073be1fcc57fedfa607c9756a1255a959ffde36b3a7fcd2deb2222e20bf995', 1, 1, 'LaravelAuthApp', '[]', 0, '2021-10-09 20:23:34', '2021-10-09 20:23:34', '2022-10-10 03:23:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'rDrkhZGTNmqXaFCGyGCB78VWVZv5KjWpTIDNlOpe', NULL, 'http://localhost', 1, 0, 0, '2021-10-09 19:05:47', '2021-10-09 19:05:47'),
(2, NULL, 'Laravel Password Grant Client', '40Mk1fDkJkLBXPHbNuWROm6S8UK2rnQPK2YCZ8QH', 'users', 'http://localhost', 0, 1, 0, '2021-10-09 19:05:47', '2021-10-09 19:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-09 19:05:47', '2021-10-09 19:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman_pesanan_detail`
--

CREATE TABLE `pengiriman_pesanan_detail` (
  `id` int(11) NOT NULL,
  `id_pengiriman_pesanan_header` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman_pesanan_header`
--

CREATE TABLE `pengiriman_pesanan_header` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `lokasi_tujuan` varchar(200) NOT NULL,
  `status` enum('Selesai','Belum Selesai') NOT NULL DEFAULT 'Belum Selesai',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_pembelian_detail`
--

CREATE TABLE `pesanan_pembelian_detail` (
  `id` int(11) NOT NULL,
  `id_pesanan_pembelian_header` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_pembelian_header`
--

CREATE TABLE `pesanan_pembelian_header` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Selesai','Belum selesai') NOT NULL DEFAULT 'Belum selesai',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(10) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` decimal(10,0) NOT NULL,
  `garansi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `kode`, `nama`, `harga`, `berat`, `garansi`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 'TMW-PRD-0010001', 'TWEETER KOBLE', 450000, '200', '2', 'Ini Untuk Walet', 'Aktif', '2021-12-02 09:00:24', '2021-12-17 20:55:29'),
(7, 2, 'TMW-PRD-002-2', 'produk walet 1', 320000, '250', '2', 'jrlktjerkt', 'Aktif', '2021-12-02 09:01:58', '2021-12-02 09:01:58'),
(8, 4, 'TMW-PRD-004-3', 'produk walet 2', 800000, '400', '2', 'sjsdfhkjsdf', 'Aktif', '2021-12-02 09:02:47', '2021-12-02 09:02:47'),
(9, 3, 'TMW-PRD-003-4', 'produk walet 3', 400000, '320', '3', ',smdfns,df', 'Aktif', '2021-12-02 09:03:23', '2021-12-02 09:03:23'),
(10, 1, 'TMW-PRD-001-5', 'produk walet New', 765000, '420', '3', 'ksdflksdflsdf', 'Aktif', '2021-12-02 09:04:23', '2021-12-17 20:55:03'),
(11, 4, 'TMW-PRD-004-6', 'produk walet 5', 800000, '260', '2', 'hhjhhjgjh', 'Aktif', '2021-12-02 09:06:05', '2021-12-02 09:06:05'),
(12, 4, 'TMW-PRD-004-7', 'Ampli 01', 100000, '290', '1', 'sdfsdf', 'Aktif', '2021-12-16 04:37:59', '2021-12-16 04:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kode`, `nama`, `telepon`, `email`, `npwp`, `ktp`, `alamat`, `bank`, `rekening`, `created_at`, `updated_at`) VALUES
(6, 'TMW-SPL-001', 'PT GARENA ENTERTAIMENT', '081543438723', NULL, NULL, NULL, 'Perum Benteng Mutiara Jl. Poros Sumbarrang, Borongpa\'la\'la, Pattallassang, Kabupaten Gowa', NULL, NULL, '2021-10-11 08:10:32', '2021-10-11 08:10:32'),
(7, 'TMW-SPL-002', 'PT SARANA WALET', '6857567546', 'andiabdillah004@gmail.com', NULL, NULL, 'jalan porors makassar-pare pare. dusun labuange', NULL, NULL, '2021-10-24 07:14:16', '2021-10-24 07:14:16'),
(8, 'TMW-SPL-003', 'PT Celebes Cemerlang Niaga', '081543438723', NULL, NULL, NULL, 'Perum Benteng Mutiara Jl. Poros Sumbarrang, Borongpa\'la\'la, Pattallassang, Kabupaten Gowa', NULL, NULL, '2021-10-25 10:19:57', '2021-10-25 10:19:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_section`
--

CREATE TABLE `tb_hero_section` (
  `id` int(11) NOT NULL,
  `gambar_hero` varchar(250) DEFAULT NULL,
  `title_gambar_hero` varchar(100) NOT NULL,
  `text_hero` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hero_section`
--

INSERT INTO `tb_hero_section` (`id`, `gambar_hero`, `title_gambar_hero`, `text_hero`, `created_at`, `updated_at`) VALUES
(1, 'img-banner.png', 'TWEETER AUDAX', 'Perlengkapan Terbaik Untuk Usaha Walet Semua Jenis Perlengkapan Walet Tersedia di Tomoniwalet', '2021-12-02 12:14:11', '2021-12-02 06:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_hero`
--

CREATE TABLE `tb_kategori_hero` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar_kategori` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_hero`
--

INSERT INTO `tb_kategori_hero` (`id`, `id_kategori`, `gambar_kategori`, `created_at`, `updated_at`) VALUES
(1, 1, 'i', '2021-12-02 13:37:00', '2021-12-02 08:46:13'),
(2, 1, 'm', '2021-12-02 13:37:09', '2021-12-02 08:46:13'),
(3, 3, 't', '2021-12-02 13:37:09', '2021-12-02 08:46:13'),
(4, 4, '-', '2021-12-02 13:37:17', '2021-12-02 08:46:13'),
(5, 4, 'i', '2021-12-02 13:37:17', '2021-12-02 08:46:13'),
(6, 2, 'a', '2021-12-02 13:37:31', '2021-12-02 08:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status` enum('invalid','valid') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `user_id`, `produk_id`, `kuantitas`, `status`, `created_at`, `updated_at`) VALUES
(9, 28, 6, 2, 'valid', '2021-12-19 04:08:22', '2021-12-20 05:28:25'),
(10, 28, 7, 2, 'valid', '2021-12-19 04:08:24', '2021-12-20 05:28:25'),
(11, 28, 8, 2, 'valid', '2021-12-19 04:08:26', '2021-12-20 05:28:25'),
(12, 28, 6, 1, 'valid', '2021-12-20 03:59:56', '2021-12-20 04:10:22'),
(13, 28, 7, 1, 'valid', '2021-12-20 03:59:58', '2021-12-20 04:10:22'),
(14, 28, 8, 1, 'valid', '2021-12-20 04:00:00', '2021-12-20 04:10:22'),
(15, 28, 9, 1, 'valid', '2021-12-20 04:00:02', '2021-12-20 04:10:22'),
(16, 29, 6, 1, 'valid', '2021-12-21 13:05:08', '2021-12-21 13:12:34'),
(17, 29, 7, 1, 'valid', '2021-12-21 13:05:09', '2021-12-21 13:12:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kontak`
--

INSERT INTO `tb_kontak` (`id`, `nama`, `email`, `perihal`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', 'komplain', 'APA INI BGST!!', '2021-12-08 06:47:26', '2021-12-08 06:47:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retail_penjualan_detail`
--

CREATE TABLE `tb_retail_penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_retail_penjualan_header` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_retail_penjualan_detail`
--

INSERT INTO `tb_retail_penjualan_detail` (`id`, `id_retail_penjualan_header`, `id_produk`, `kuantitas`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 2, '2021-12-09 02:06:01', '2021-12-09 02:06:01'),
(2, 2, 7, 2, '2021-12-09 02:06:05', '2021-12-09 02:06:05'),
(3, 3, 7, 2, '2021-12-09 02:06:11', '2021-12-09 02:06:11'),
(4, 4, 6, 1, '2021-12-17 21:02:36', '2021-12-17 21:02:36'),
(5, 7, 7, 1, '2021-12-17 21:03:09', '2021-12-17 21:03:09'),
(6, 8, 8, 1, '2021-12-17 21:04:42', '2021-12-17 21:04:42'),
(7, 9, 8, 1, '2021-12-17 21:06:07', '2021-12-17 21:06:07'),
(8, 10, 8, 1, '2021-12-17 21:17:01', '2021-12-17 21:17:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retail_penjualan_header`
--

CREATE TABLE `tb_retail_penjualan_header` (
  `id` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `kode` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_retail_penjualan_header`
--

INSERT INTO `tb_retail_penjualan_header` (`id`, `id_staff`, `kode`, `tanggal`, `total`, `cash`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 2, 'tes', '2021-12-09', 640000, 700000, 60000, '2021-12-09 02:06:01', '2021-12-09 02:06:01'),
(2, 2, 'tes', '2021-12-09', 640000, 700000, 60000, '2021-12-09 02:06:05', '2021-12-09 02:06:05'),
(3, 2, 'tes', '2021-12-09', 640000, 700000, 60000, '2021-12-09 02:06:11', '2021-12-09 02:06:11'),
(4, 2, 'tes', '2021-12-18', 450000, 0, 0, '2021-12-17 21:02:36', '2021-12-17 21:02:36'),
(5, 2, 'tes', '2021-12-18', 0, 0, 0, '2021-12-17 21:03:03', '2021-12-17 21:03:03'),
(6, 2, 'tes', '2021-12-18', 0, 0, 0, '2021-12-17 21:03:05', '2021-12-17 21:03:05'),
(7, 2, 'tes', '2021-12-18', 320000, 0, 0, '2021-12-17 21:03:09', '2021-12-17 21:03:09'),
(8, 2, 'tes', '2021-12-18', 800000, 0, 0, '2021-12-17 21:04:42', '2021-12-17 21:04:42'),
(9, 2, 'tes', '2021-12-18', 800000, 0, 0, '2021-12-17 21:06:07', '2021-12-17 21:06:07'),
(10, 2, 'tes', '2021-12-18', 800000, 0, 0, '2021-12-17 21:17:01', '2021-12-17 21:17:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retur_penjualan_header`
--

CREATE TABLE `tb_retur_penjualan_header` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimonial`
--

CREATE TABLE `tb_testimonial` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `text` varchar(150) NOT NULL,
  `status` enum('aktif','tidak_aktif') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_testimonial`
--

INSERT INTO `tb_testimonial` (`id`, `image`, `nama`, `text`, `status`, `created_at`, `updated_at`) VALUES
(2, 'testi.png', 'Rival Arfah', 'Barang-barangnya lengkap dan kualitas terbaik', 'aktif', '2021-12-03 04:58:29', '2021-12-03 04:58:29'),
(3, 'testi2.png', 'Andi Abdillah', 'Lengkap dan toko walet terbaik di sulawesi selatan', 'aktif', '2021-12-03 04:58:59', '2021-12-03 04:58:59'),
(4, 'testi.png', 'Ananymouse', 'None', 'tidak_aktif', '2021-12-03 05:10:46', '2021-12-03 05:10:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_header_id` int(11) NOT NULL,
  `keranjang_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`id`, `transaksi_header_id`, `keranjang_id`, `created_at`, `updated_at`) VALUES
(7, 4, 9, '2021-12-19 04:09:28', '2021-12-19 04:09:28'),
(8, 4, 10, '2021-12-19 04:09:28', '2021-12-19 04:09:28'),
(9, 4, 11, '2021-12-19 04:09:28', '2021-12-19 04:09:28'),
(10, 5, 12, '2021-12-20 04:10:22', '2021-12-20 04:10:22'),
(11, 5, 13, '2021-12-20 04:10:22', '2021-12-20 04:10:22'),
(12, 5, 14, '2021-12-20 04:10:22', '2021-12-20 04:10:22'),
(13, 5, 15, '2021-12-20 04:10:22', '2021-12-20 04:10:22'),
(14, 6, 9, '2021-12-20 05:28:25', '2021-12-20 05:28:25'),
(15, 6, 10, '2021-12-20 05:28:25', '2021-12-20 05:28:25'),
(16, 6, 11, '2021-12-20 05:28:25', '2021-12-20 05:28:25'),
(17, 7, 16, '2021-12-21 13:12:34', '2021-12-21 13:12:34'),
(18, 7, 17, '2021-12-21 13:12:34', '2021-12-21 13:12:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_header`
--

CREATE TABLE `tb_transaksi_header` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jasa_kirim` varchar(50) NOT NULL,
  `biaya_ongkir` double NOT NULL,
  `total_harga` double NOT NULL,
  `foto_pembayaran` varchar(150) DEFAULT NULL,
  `status` enum('baru','upload','selesai') NOT NULL DEFAULT 'baru',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_header`
--

INSERT INTO `tb_transaksi_header` (`id`, `kode`, `tanggal`, `user_id`, `provinsi`, `kota`, `alamat`, `telepon`, `jasa_kirim`, `biaya_ongkir`, `total_harga`, `foto_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
(4, 'TML-000-19-2021', '2021-12-19', 29, 'Sulawesi Selatan', 'Bulukumba', 'Jl. Kemakmuran, Tanete', '085333341194', 'jne', 30000, 3170000, NULL, 'upload', '2021-12-19 04:09:28', '2021-12-21 12:54:37'),
(5, 'TML-004-20-2021', '2021-12-20', 28, 'Sulawesi Selatan', 'Makassar', 'Jl. Sultan Alauddin', '085333341194', 'pos', 15000, 1985000, NULL, 'baru', '2021-12-20 04:10:22', '2021-12-20 04:10:22'),
(6, 'TML-005-20-2021', '2021-12-20', 28, 'Sulawesi Selatan', 'Maros', 'Jl. Moncongloe', '085333341194', 'jne', 18000, 3158000, NULL, 'baru', '2021-12-20 05:28:25', '2021-12-20 05:28:25'),
(7, 'TML-006-21-2021', '2021-12-21', 29, 'Jambi', 'Merangin', 'Malaka', '085676443212', 'pos', 73000, 843000, NULL, 'upload', '2021-12-21 13:12:34', '2021-12-21 13:20:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'owner@gmail.com', NULL, NULL, 1, '$2y$10$vRRYLZM/X3vNGCkgb88f.OJ4FPRvJHZcly7xhNLcK4jWgux5837Z2', NULL, NULL, NULL),
(2, 'staff', 'kasir@gmail.com', NULL, NULL, 2, '$2y$10$vRRYLZM/X3vNGCkgb88f.OJ4FPRvJHZcly7xhNLcK4jWgux5837Z2', NULL, NULL, NULL),
(5, 'andi abdillah', 'andiabdillah004@gmail.com', NULL, NULL, NULL, '$2y$10$WqZtfHdbFd3kBVW/AyOnpeZc7k134etffsSwA1VkIjMl7BvEO3tgi', NULL, '2021-11-30 06:48:27', '2021-11-30 06:48:27'),
(22, 'Andi Abdillah', 'rahmat@gmail.com', NULL, NULL, NULL, '$2y$10$EFFHzYJ6SL769Il68ByGR.0r6YeRzFGVWpGLAWhk.nsZl1NdRX5Vi', NULL, '2021-12-15 01:05:53', '2021-12-15 01:05:53'),
(23, 'rahmat', 'borpal@gmail.com', NULL, NULL, 3, '$2y$10$vRRYLZM/X3vNGCkgb88f.OJ4FPRvJHZcly7xhNLcK4jWgux5837Z2', NULL, '2021-12-15 01:06:37', '2021-12-15 01:06:37'),
(28, 'Rahmat Ilyas', 'rahmat142@gmail.com', NULL, NULL, 3, '$2y$10$yECeD4CO8otXpp8QbGiMJuQPHTlkfN4P1GwsgcQWidKjvk9m/Y1Aa', NULL, '2021-12-18 22:46:42', '2021-12-18 22:46:42'),
(29, 'Alvian appink', 'alvianappink@gmail.com', '106323001625392817837', NULL, 3, '', NULL, '2021-12-19 00:03:04', '2021-12-19 00:03:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengiriman_pesanan_header` (`id_pengiriman_pesanan_header`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan_pembelian_header` (`id_pesanan_pembelian_header`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengiriman_pesanan_detail`
--
ALTER TABLE `pengiriman_pesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengiriman_pesanan_detail` (`id_pengiriman_pesanan_header`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pengiriman_pesanan_header`
--
ALTER TABLE `pengiriman_pesanan_header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_pembelian_detail`
--
ALTER TABLE `pesanan_pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan_pembelian_header` (`id_pesanan_pembelian_header`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pesanan_pembelian_header`
--
ALTER TABLE `pesanan_pembelian_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hero_section`
--
ALTER TABLE `tb_hero_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_hero`
--
ALTER TABLE `tb_kategori_hero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_retail_penjualan_detail`
--
ALTER TABLE `tb_retail_penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_retail_penjualan_header` (`id_retail_penjualan_header`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_retail_penjualan_header`
--
ALTER TABLE `tb_retail_penjualan_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `tb_retur_penjualan_header`
--
ALTER TABLE `tb_retur_penjualan_header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi_header`
--
ALTER TABLE `tb_transaksi_header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengiriman_pesanan_detail`
--
ALTER TABLE `pengiriman_pesanan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengiriman_pesanan_header`
--
ALTER TABLE `pengiriman_pesanan_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan_pembelian_detail`
--
ALTER TABLE `pesanan_pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan_pembelian_header`
--
ALTER TABLE `pesanan_pembelian_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_section`
--
ALTER TABLE `tb_hero_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_hero`
--
ALTER TABLE `tb_kategori_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_retail_penjualan_detail`
--
ALTER TABLE `tb_retail_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_retail_penjualan_header`
--
ALTER TABLE `tb_retail_penjualan_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_retur_penjualan_header`
--
ALTER TABLE `tb_retur_penjualan_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_header`
--
ALTER TABLE `tb_transaksi_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `fk_pengiriman_barangkeluar_header` FOREIGN KEY (`id_pengiriman_pesanan_header`) REFERENCES `pengiriman_pesanan_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `fk_pesanan_header` FOREIGN KEY (`id_pesanan_pembelian_header`) REFERENCES `pesanan_pembelian_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman_pesanan_detail`
--
ALTER TABLE `pengiriman_pesanan_detail`
  ADD CONSTRAINT `fk_pengiriman_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengiriman_header` FOREIGN KEY (`id_pengiriman_pesanan_header`) REFERENCES `pengiriman_pesanan_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_pembelian_detail`
--
ALTER TABLE `pesanan_pembelian_detail`
  ADD CONSTRAINT `fk_po_headers` FOREIGN KEY (`id_pesanan_pembelian_header`) REFERENCES `pesanan_pembelian_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesanan_pembelian_header`
--
ALTER TABLE `pesanan_pembelian_header`
  ADD CONSTRAINT `fk_supplier_po_header` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`);

--
-- Ketidakleluasaan untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `fk_stok_produk` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_retail_penjualan_detail`
--
ALTER TABLE `tb_retail_penjualan_detail`
  ADD CONSTRAINT `fk_produk_retail` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `fk_retail_penjualan_header` FOREIGN KEY (`id_retail_penjualan_header`) REFERENCES `tb_retail_penjualan_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
