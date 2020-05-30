-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2020 at 12:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahpasarv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `url`) VALUES
(8, '1587360658092.png', '#'),
(9, '1587361271745.png', '#'),
(10, '1587361440299.png', '#'),
(12, '1587373573352.png', 'https://www.tokopedia.com/discovery');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(18,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(18,2) NOT NULL,
  `subtotal` double(18,2) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `icon`) VALUES
(1, 'Prewedding', NULL, NULL, NULL, NULL, '1586455713976.png'),
(2, 'Couple & Group', NULL, NULL, NULL, NULL, '1586455713976.png'),
(3, 'Keluarga', NULL, NULL, NULL, NULL, '1586455713976.png'),
(4, 'Fotografi', NULL, NULL, NULL, NULL, '1586455713976.png'),
(5, 'Video Shooting', NULL, NULL, NULL, NULL, '1586455713976.png'),
(6, 'Digital Printing', NULL, NULL, NULL, NULL, '1586455713976.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `page`, `type`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 2),
(4, 1, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_30_120759_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(18,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `total_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 1000000.00, 8, 'dodinovembri32@gmail.com', 'dodinovembri32@gmail.com', '2020-05-25 06:17:24', '2020-05-25 06:19:35'),
(4, 1, 1093596.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 02:05:08', '2020-05-30 02:05:08'),
(5, 1, 12000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 02:10:19', '2020-05-30 02:10:19'),
(6, 1, 8000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:33:54', '2020-05-30 03:33:54'),
(7, 1, 6000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:34:14', '2020-05-30 03:34:14'),
(8, 1, 68000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:38:11', '2020-05-30 03:38:11'),
(9, 1, 8000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:41:20', '2020-05-30 03:41:20'),
(10, 1, 6000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:51:39', '2020-05-30 03:51:39'),
(11, 1, 6000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:52:50', '2020-05-30 03:52:50'),
(12, 1, 2000000.00, 1, 'hilmysyarif@gmail.com', NULL, '2020-05-30 04:33:55', '2020-05-30 04:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(18,2) NOT NULL,
  `subtotal` double(18,2) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `qty`, `price`, `subtotal`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1000000.00, 1000000.00, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:17:25', '2020-05-25 06:17:25'),
(2, 4, 31, 2, 546798.00, 1093596.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 02:05:08', '2020-05-30 02:05:08'),
(3, 5, 1, 12, 1000000.00, 12000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 02:10:19', '2020-05-30 02:10:19'),
(4, 7, 3, 3, 2000000.00, 6000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:34:14', '2020-05-30 03:34:14'),
(5, 8, 3, 34, 2000000.00, 68000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:38:11', '2020-05-30 03:38:11'),
(6, 9, 3, 1, 2000000.00, 2000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:41:20', '2020-05-30 03:41:20'),
(7, 9, 3, 3, 2000000.00, 6000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:41:20', '2020-05-30 03:41:20'),
(8, 10, 3, 3, 2000000.00, 6000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:51:39', '2020-05-30 03:51:39'),
(9, 11, 3, 3, 2000000.00, 6000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 03:52:50', '2020-05-30 03:52:50'),
(10, 12, 3, 1, 2000000.00, 2000000.00, 'hilmysyarif@gmail.com', NULL, '2020-05-30 04:33:55', '2020-05-30 04:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `user_id`, `id_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, NULL, NULL, '2020-05-25 06:17:25', '2020-05-25 06:17:25'),
(2, 2, 3, 2, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:18:31', '2020-05-25 06:18:31'),
(3, 2, 3, 3, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:02', '2020-05-25 06:19:02'),
(4, 2, 3, 4, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:08', '2020-05-25 06:19:08'),
(5, 2, 3, 5, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:14', '2020-05-25 06:19:14'),
(6, 2, 3, 6, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:20', '2020-05-25 06:19:20'),
(7, 2, 3, 7, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:24', '2020-05-25 06:19:24'),
(8, 2, 3, 8, 'dodinovembri32@gmail.com', NULL, '2020-05-25 06:19:36', '2020-05-25 06:19:36'),
(9, 1, 4, 1, NULL, NULL, '2020-05-30 02:05:08', '2020-05-30 02:05:08'),
(10, 1, 5, 1, NULL, NULL, '2020-05-30 02:10:19', '2020-05-30 02:10:19'),
(11, 1, 6, 1, NULL, NULL, '2020-05-30 03:33:54', '2020-05-30 03:33:54'),
(12, 1, 7, 1, NULL, NULL, '2020-05-30 03:34:14', '2020-05-30 03:34:14'),
(13, 1, 8, 1, NULL, NULL, '2020-05-30 03:38:11', '2020-05-30 03:38:11'),
(14, 1, 9, 1, NULL, NULL, '2020-05-30 03:41:20', '2020-05-30 03:41:20'),
(15, 1, 10, 1, NULL, NULL, '2020-05-30 03:51:39', '2020-05-30 03:51:39'),
(16, 1, 11, 1, NULL, NULL, '2020-05-30 03:52:50', '2020-05-30 03:52:50'),
(17, 1, 12, 1, NULL, NULL, '2020-05-30 04:33:56', '2020-05-30 04:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ket` text,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`, `ket`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Belum Dibayar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:37:48', '2020-05-22 09:37:48'),
(2, 'Progress Foto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:44:31', '2020-05-22 09:44:31'),
(3, 'Progress Edit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:44:50', '2020-05-22 09:44:50'),
(4, 'Progress Cetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:45:03', '2020-05-22 09:45:03'),
(5, 'Progress Bingkai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:45:16', '2020-05-22 09:45:16'),
(6, 'Progress Packing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:45:36', '2020-05-22 09:45:36'),
(7, 'Menunggu Diambil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(8, 'Selesai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.', 'wawan@gmail.com', NULL, '2020-05-22 09:46:10', '2020-05-22 09:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`) VALUES
(1, 'Tentang Kami', '<p>Lakukan tugas Anda dengan senang hati dan gunakan humor Anda di waktu kerja terutama saat sulit dan tegang-tegang, itulah salah satu budaya (fun) kami.</p><p>Religious, Passionate, Tough, Knowledgeable, Fun &amp; Customer Service adalah budaya-budaya yang ada di Bhinneka.Com, dan kami sangat menjunjung tinggi budaya kami dengan cara memberikan yang terbaik bagi pelanggan, diri kita, keluarga, dan masyarakat.</p><h2>Visi dan Misi</h2><h3>Visi</h3><p>\"Menjadi sebuah perusahaan kelas dunia dengan semangat pemanfaatan informasi teknologi, dan menjadi kebanggaan bangsa.\"</p><h3>Misi</h3><p>\"Menjadi webstore nomor satu di Indonesia yang menyediakan kelengkapan dan kemudahan belanja, serta memperhatikan dan memberikan pengalaman belanja yang berkesan kepada pelanggan, melalui nilai-nilai delapan dimensi pengalaman.\"</p><h2>Sekapur Sirih</h2><p>Sejak awal Bhinneka.Com berdiri, kami bertekad membangun bisnis yang berdaya tahan panjang. Mengutamakan citra merk dengan pelayanan dan menjadikannya bagian dari budaya kerja. Fokus pada pelayanan berarti memberi nilai tambah dalam setiap layanan. Sebab itulah mengapa pelanggan kami menekan tombol\'beli\' dan tetap kembali lagi di kemudian hari.</p><p>Menengok sejenak ke belakang, kami bersyukur fokus pada pelayanan dan \'human touch\' dalam membangun Bhinneka.Com, yang dirumuskan dengan sebuah kalimat sederhana \'Pelayanan Dari Hati\'. Dan sekarang, kalimat ini telah menjadi esensi dalam setiap langkah yang kami lakukan, mudah dicerna tanpa perlu segala embel-embel dan frase-frase yang sulit untuk dipahami seluruh Bhinnekaners dalam melayani pelanggan kami.</p><p>Standar pelayanan kami pun semakin tinggi setiap tahun. Berinovasi dan menyajikan pengalamanan berbelanja yang berkesan, mulai dari produk yang lengkap, harga yang kompetitif, mudah dalam bertransaksi, jaminan purna jual, hingga kejutan-kejutan mengasyikkan untuk setiap pelanggan kami, yang menjadikan belanja di Bhinneka.Com semakin nyaman, baik online maupun offline.</p><p>Untuk teman-teman komunitas Bhinneka.Com yang bersama dengan kami sejak awal perkembangan internet dimulai di Indonesia, kami akan terus perhatikan dan senantiasa mengembangkan banyak fitur yang akan semakin asyik untuk saling bertemu, berbagi, berbincang, belajar, atau sekedar melakukan jual-beli produk. Offline store Bhinneka juga menjadi tempat untuk workshop, tempat berkumpul, dan ngobrol antar komunitas.</p><p>Akhirnya, saya sangat berbahagia Bhinneka.Com dapat berkontribusi untuk negeri ini dan membawa nilai lebih untuk masyarakat Indonesia. Kami akan selalu berusaha dan mendorong diri kami sendiri untuk menjadi salah satu perusahaan berbasis teknologi yang menjadi kebanggaan bangsa Indonesia.</p>', 'about'),
(2, 'Kontak Kami', '<p>Hubungi Tim Penjualan Kami</p><p><strong>Konsultan Penjualan</strong></p><p>Melayani kebutuhan Anda untuk seluruh kategori produk. Silakan hubungi 021-29292828 atau <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Korporasi &amp; Pemerintah.</strong></p><p>Melayani kebutuhan korporasi &amp; proyek. Silakan email kami ke <a href=\"mailto:corporate@bhinneka.com\">corporate@bhinneka.com</a>.</p><p><strong>Solusi Software &amp; Lisensi</strong></p><p>Melayani kebutuhan lisensi &amp; konsultasi software. Silakan email kami ke <a href=\"mailto:licensing@bhinneka.com\">licensing@bhinneka.com</a>.</p><p><strong>Solusi Percetakan &amp; Signage</strong></p><p>Melayani kebutuhan printer besar, signage, &amp; produk 3D. Silakan <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Kantor Pusat</strong><br>Jl. Gunung Sahari Raya 73C No. 5-6<br>Jakarta 10610, Indonesia</p><p>Hubungi Tim Pendukung Kami</p><p><strong>Layanan Klaim Garansi</strong></p><p>Untuk bantuan teknisi dan klaim garansi produk, silakan telepon ke (021) 2929-2828 atau <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Layanan Pengembalian Barang &amp; Refund</strong></p><p>Jika produk yang diterima salah/cacat/rusak &amp; ingin mengurus pengembalian dana, untuk laporan dan bantuan dapat menghubungi kami <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Layanan Pelanggan</strong></p><p>Silakan berikan feedback atas pelayanan yang kurang berkenan dari tim kami. Tuliskan masukan Anda <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Status Pengiriman</strong></p><p>Untuk bantuan tracking status pesanan &amp; status pengiriman, silakan telepon ke (021) 2929-2828 atau Anda dapat menghubungi kami <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Merchant Bhinneka Marketplace</strong></p><p>Ingin memulai jualan di Bhinneka? Anda bisa mendaftar menjadi merchant &amp; bertanya seputar Bhinneka Marketplace <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p><p><strong>Tidak Dapat Menemukan Tim yang Anda Cari?</strong></p><p>Anda dapat menghubungi kami <a href=\"https://www.bhinneka.com/hubungi-kami-form\">email kami</a>.</p>', 'contact'),
(3, 'Testimoni', '<p>redirect page</p>', 'testimoni'),
(4, 'Kebijakan Privasi', '<h2><strong>KEBIJAKAN PRIVASI SITUS DAN APLIKASI MATAHARI</strong></h2><p>MATAHARI memahami dan menghormati privasi Anda dan nilai hubungan kami dengan Anda. Kebijakan Privasi ini menjelaskan bagaimana Matahari mengumpulkan, mengatur dan melindungi informasi Anda ketika Anda mengunjungi dan/atau menggunakan situs atau aplikasi MATAHARI, bagaimana Matahari menggunakan informasi dan kepada siapa Matahari dapat berbagi. Kebijakan privasi ini juga memberitahu Anda bagaimana Anda dapat meminta Matahari untuk mengakses atau mengubah informasi Anda serta menjawab pertanyaan Anda sehubungan dengan Kebijakan Privasi ini.<br>Kata-kata yang dimulai dengan huruf besar dalam Kebijakan Privacy ini mempunyai pengertian yang sama dengan Syarat dan Ketentuan penggunaan situs dan aplikasi MATAHARI.</p><h2><strong>Informasi yang kami kumpulkan</strong></h2><p>Matahari dapat memperoleh dan mengumpulkan informasi dan/atau konten dari situs dan aplikasi yang Anda atau pengguna lain sambungkan atau disambungkan oleh situs atau aplikasi MATAHARI dengan situs atau pengguna tertentu dan informasi dan/atau konten yang Anda berikan melalui penggunaan situs atau aplikasi MATAHARI dan/atau pengisian Aplikasi.<br>Ketika Anda mengunjungi situs atau aplikasi MATAHARI, Matahari dapat mengumpulkan informasi apapun yang telah dipilih bisa terlihat oleh semua orang dan setiap informasi publik yang tersedia. Informasi ini dapat mencakup nama Anda, gambar profil, jenis kelamin, kota saat ini, hari lahir, email, jaringan, daftar teman, dan informasi-informasi Anda lainnya yang tersedia dalam jaringan. Selain itu, ketika Anda menggunakan aplikasi MATAHARI, atau berinteraksi dengan alat terkait, widget atau plug-in, Matahari dapat mengumpulkan informasi tertentu dengan cara otomatis, seperti cookies dan web beacon. Informasi yang Matahari kumpulkan dengan cara ini termasuk alamat IP, perangkat pengenal unik, karakteristik perambah, karakteristik perangkat, sistem operasi, preferensi bahasa, URL, informasi tentang tindakan yang dilakukan, tanggal dan waktu kegiatan. Melalui metode pengumpulan otomatis ini, Matahari mendapatkan informasi mengenai Anda. Matahari mungkin menghubungkan unsur-unsur tertentu atas data yang telah dikumpulkan melalui sarana otomatis, seperti informasi browser Anda, dengan informasi lain yang diperoleh tentang Anda, misalnya, apakah Anda telah membuka email yang dikirimkan kepada Anda. Matahari juga dapat menggunakan alat analisis pihak ketiga yang mengumpulkan informasi tentang lalu lintas pengunjung situs atau aplikasi MATAHARI. Browser Anda mungkin memberitahu Anda ketika Anda menerima cookie jenis tertentu atau cara untuk membatasi atau menonaktifkan beberapa jenis cookies. Harap dicatat, bahwa tanpa cookie Anda mungkin tidak dapat menggunakan semua fitur dari situs atau aplikasi MATAHARI.<br>Situs atau aplikasi MATAHARI mungkin berisi link ke tempat pihak lain yang dapat dioperasikan oleh pihak lain tersebut yang mungkin tidak memiliki kebijakan privasi yang sama dengan Matahari. Matahari sangat menyarankan Anda untuk membaca dan mempelajari kebijakan privasi dan ketentuan-ketentuan pihak lain tersebut sebelum masuk atau menggunakannya. Matahari tidak bertanggung jawab atas pengumpulan dan/atau penyebaran informasi pribadi Anda oleh pihak lain atau yang berkaitan dengan penggunaan media sosial seperti Facebook dan Twitter dan Matahari dibebaskan dari segala akibat yang timbul atas penyebaran dan/atau penyalahgunaan informasi tersebut.</p><h2><strong>BAGAIMANA MATAHARI MENGGUNAKAN INFORMASI</strong></h2><p>Matahari dapat menggunakan informasi Anda yang diperoleh untuk menyediakan produk dan layanan yang Anda minta, sebagai data riset atau berkomunikasi tentang dan/atau mengelola partisipasi Anda dalam survei atau undian atau kontes atau acara khusus lainnya yang diadakan oleh Matahari, pengoperasian Matahari, memberikan dukungan kepada Anda sebagai pengunjung dan/atau pengguna situs atau aplikasi MATAHARI, merespon dan berkomunikasi dengan Anda mengenai permintaan Anda, pertanyaan dan/atau komentar Anda, membiarkan Anda untuk meninggalkan komentar di situs atau aplikasi MATAHARI atau melalui media sosial lainnya, membangun dan mengelola Akun Anda, mengirimkan berita-berita dan/atau penawaran-penawaran yang berlaku bagi Anda selaku pengunjung dan penguna situs atau aplikasi MATAHARI, untuk mengoperasikan, mengevaluasi dan meningkatkan bisnis Matahari termasuk untuk mengembangkan produk dan layanan baru; untuk mengelola komunikasi Matahari, menentukan efektifitas layanan, pemasaran dan periklanan situs atau aplikasi MATAHARI, dan melakukan akutansi, audit, dan kegiatan Matahari lainnya, melakukan analisis data termasuk pasar dan pencarian konsumen, analisis trend, keuangan, dan informasi pribadi, melaksanakan kerjasama dengan mitra Matahari yang terkait dengan program-program yang diadakan oleh Matahari, melindungi, mengidentifikasi, dan mencegah penipuan dan kegiatan kriminal lainnya, klaim dan kewajiban lainnya, membantu mendiagnosa masalah teknis dan layanan, untuk memelihara, mengoperasikan, atau mengelola situs atau aplikasi MATAHARIyang dilakukan oleh Matahari atau pihak lain yang ditentukan oleh Matahari, mengidentifikasi pengguna situs atau aplikasi MATAHARI, serta mengumpulkan informasi demografis tentang pengguna situs atau aplikasi MATAHARI, untuk cara lain yang Matahari beritahukan pada saat pengumpulan informasi.<br>Matahari tidak akan menjual atau memberikan informasi pribadi Anda kepada pihak lain, kecuali seperti yang dijelaskan dalam kebijakan privasi ini. Matahari akan berbagi informasi dengan afiliasi Matahari atau pihak lain yang melakukan layanan berdasarkan petunjuk dari Matahari. Pihak lain tersebut tidak diizinkan untuk menggunakan atau mengungkapkan informasi tersebut kecuali diperlukan untuk melakukan layanan atas nama Matahari atau untuk mematuhi persyaratan hukum. Matahari juga dapat berbagi informasi dengan pihak lain yang merupakan mitra Matahari untuk menawarkan produk atau jasa yang mungkin menarik bagi Anda<br>Matahari dapat mengungkapkan informasi jika dianggap perlu dalam kebijakan tunggal Matahari, untuk mematuhi hukum yang berlaku, peraturan, proses hukum atau permintaan pemerintah, dan peraturan yang berlaku di Matahari. Selain itu, Matahari dapat mengungkapkan informasi ketika percaya, pengungkapan diperlukan atau wajib dilakukan untuk mencegah kerusakan fisik atau kerugian finansial atau hal lainnya sehubungan dengan dugaan atau terjadinya kegiatan ilegal. Matahari juga berhak untuk mengungkapkan dan/atau mengalihkan informasi yang dimiliki apabila sebagian atau seluruh bisnis atau aset Matahari dijual atau dialihkan.<br>Matahari dapat menyimpan dan/atau memusnahkan informasi tentang Anda sesuai kebijakan yang berlaku atau jika diperlukan.</p><h2><strong>UPDATE KEBIJAKAN PRIVASI INI</strong></h2><p>Kebijakan Privasi ini mungkin diperbarui secara berkala dan tanpa pemberitahuan sebelumnya kepada Anda untuk mencerminkan perubahan dalam praktik informasi pribadi. Matahari akan menampilkan pemberitahuan di bagian info profil website untuk memberitahu Anda tentang perubahan terhadap Kebijakan Privasi dan menunjukkan di bagian atas Kebijakan saat ketika Kebijakan Privasi ini terakhir diperbarui. Kebijakan Privasi ini merupakan satu kesatuan dan menjadi bagian yang tidak terpisahkan dari Syarat dan Ketentuan Penggunaan situs dan aplikasi MATAHARI.</p>', 'privacy-policy'),
(5, 'Syarat dan Ketentuan', '<h2><strong>SYARAT DAN KETENTUAN SITUS DAN APLIKASI MATAHARI</strong></h2><p>Selamat datang dan terima kasih telah mengunjungi situs/aplikasi MATAHARI. Silahkan membaca Syarat dan Ketentuan ini dengan seksama. Syarat dan Ketentuan ini mengatur akses, penelusuran, penggunaan, dan pembelian barang-barang yang ditawarkan atau dijual di www.MATAHARI.com kepada Anda. Dengan mengakses, menelusuri, dan menggunakan situs/aplikasi MATAHARI ini, berarti Anda telah membaca, mengerti, dan setuju untuk tunduk dan terikat pada Syarat dan Ketentuan ini, dan Anda juga setuju untuk tidak mempengaruhi, mengganggu, atau berusaha mempengaruhi atau mengganggu jalannya situs/aplikasi MATAHARI dengan cara apapun. Jika Anda tidak menyetujui salah satu, sebagian, atau seluruh isi Syarat dan Ketentuan ini, maka Anda tidak diperkenankan untuk mengakses, menelusuri atau menggunakan situs/aplikasi MATAHARI ini. Akses, penelusuran, dan penggunaan situs/aplikasi MATAHARI ini hanya untuk penggunaan pribadi Anda. Anda tidak diperkenankan untuk mendistribusikan, memodifikasi, menjual, atau mengirimkan apapun yang Anda akses dari situs/aplikasi MATAHARI ini, termasuk tetapi tidak terbatas pada teks, gambar, audio, dan video untuk keperluan bisnis, komersial, publik atau kepeluan non-personal lainnya.<br>Penggunaan konten situs/aplikasi MATAHARI, logo MATAHARI, merek layanan dan/atau merek dagang yang tidak sah dapat melanggar undang-undang hak kekayaan intelektual, hak cipta, merek, privasi, publisitas, hukum perdata dan pidana tertentu. Syarat dan Ketentuan ini termasuk hak kekayaan intelektual milik MATAHARI yang dilindungi hak cipta. Setiap penggunaan Syarat dan Ketentuan ini oleh pihak manapun, baik sebagian maupun seluruhnya, tidak diizinkan. Pelanggaran atas hak atas kekayaan intelektual MATAHARI ini dapat dikenakan tindakan atau sanksi berdasarkan ketentuan hukum yang berlaku.<br>Anda perlu mengunjungi halaman ini secara berkala untuk mengetahui setiap perubahan Syarat dan Ketentuan ini.</p>', 'terms'),
(6, 'Cara Berbelanja', '<p>Anda bisa mengklik “Blanja sekarang” di blanja.com untuk membeli produk, atau Anda bisa menambahkan produk ke Favorit dahulu lalu menempatkan pesanan.</p><p><strong>1. Blanja sekarang</strong></p><p>1.1 Jika Anda ingin membeli produk langsung ketika Anda melihatnya di Product Detail Page (gambar di bawah), Anda bisa mengklik “Blanja sekarang” setelah Anda memilih atribut, jumlah, dll. dari produk tersebut.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_001.jpg\" alt=\"register_1\"></figure><p>1.2 Setelah Anda mengkonfirmasi alamat pengiriman, informasi pesanan dan informasi lainnya, klik “Selanjutnya”.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_002.jpg\" alt=\"register_1\"></figure><p>1.3 Anda bisa masuk ke “My blanja”-“Pesanan Saya” dan melihat pesanan yang telah ditempatkan. Jika Anda sudah mengkonfirmasi jumlah dari pesanan tersebut, klik “Bayar”.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_003.jpg\" alt=\"register_1\"></figure><p>1.4 Masuk ke halaman pembayaran dan bayarkan pesanan. Status pemesanan akan berubah menjadi “Telah dibayar”, yang artinya barang sedang menunggu dikirim oleh penjual.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_004.jpg\" alt=\"register_1\"></figure><p>1.5 Setelah penjual berhasil mengirimkan barang, status pemesanan akan berubah menjadi “Telah dikirim”. Ketika anda menerima barang dan mengkonfirmasi, mohon klik “Konfirmasi”.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_005.jpg\" alt=\"register_1\"></figure><p>Anda harus memasukkan password Dompet Blanja sebelum mengklik “Konfirmasi”.</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_006.png\" alt=\"register_1\"></figure><p>1.6 Ketika status berubah ke \"Selesai\", maka berarti transaksi telah selesai</p><figure class=\"image\"><img src=\"https://s2.blanja.com/static/marketplace/images/help-center/questionlist-11-1_007.jpg\" alt=\"register_1\"></figure><p><strong>Checkout beberapa produk yang telah ditambahkan ke Troli blanja secara bersamaan</strong></p><p>Anda bisa menambahkan beberapa produk ke Troli blanja dan membelinya secara bersamaan, lalu menempatkan pesanan dan membayar sekali sekaligus. Prosesnya sama seperti proses “Blanja sekarang”.</p>', 'shopping-help'),
(7, 'Pengiriman Barang', '<ol><li>Pengiriman barang untuk setiap transaksi yang terjadi melalui Platform Bukalapak menggunakan layanan pengiriman barang yang disediakan Bukalapak atas kerjasama Bukalapak dengan pihak jasa ekspedisi pengiriman barang resmi.</li><li>Pengguna memahami dan menyetujui bahwa segala bentuk peraturan terkait dengan syarat dan ketentuan pengiriman barang sepenuhnya ditentukan oleh pihak jasa ekspedisi pengiriman barang dan sepenuhnya menjadi tanggung jawab pihak jasa ekspedisi pengiriman barang.</li><li>Bukalapak hanya berperan sebagai media perantara antara Pengguna dengan pihak jasa ekspedisi pengiriman barang.</li><li>Pengguna wajib memahami, menyetujui, serta mengikuti ketentuan-ketentuan pengiriman barang yang telah dibuat oleh pihak jasa ekspedisi pengiriman barang.</li><li>Pengiriman barang atas transaksi melalui sistem Bukalapak menggunakan jasa ekspedisi pengiriman barang dilakukan dengan tujuan agar barang dapat dipantau melalui sistem Bukalapak.</li><li>Pelapak (Penjual) wajib bertanggung jawab penuh atas barang yang dikirimnya.</li><li>Pengguna memahami dan menyetujui bahwa segala bentuk kerugian yang dapat timbul akibat kerusakan ataupun kehilangan pada barang, baik pada saat pengiriman barang tengah berlangsung maupun pada saat pengiriman barang telah selesai, adalah sepenuhnya tanggung jawab pihak jasa ekspedisi pengiriman barang.</li><li>Dalam hal diperlukan untuk dilakukan proses pengembalian barang, maka Pengguna, baik Pelapak (Penjual) maupun Pembeli, diwajibkan untuk melakukan pengiriman barang langsung ke masing-masing Pembeli maupun Pelapak (Penjual). Bukalapak tidak menerima pengembalian atau pengiriman barang atas transaksi yang dilakukan oleh Pengguna dalam kondisi apa pun.</li></ol>', 'pengiriman-barang');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `promo_price` bigint(20) DEFAULT NULL,
  `is_promo` tinyint(1) NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `stock` varchar(11) NOT NULL DEFAULT '0',
  `weight` varchar(255) NOT NULL DEFAULT '0',
  `transaction` varchar(255) NOT NULL DEFAULT '0',
  `viewer` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `sku`, `name`, `price`, `description`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`, `promo_price`, `is_promo`, `publish`, `stock`, `weight`, `transaction`, `viewer`) VALUES
(1, 1, 'P001', 'Prewedding Elegant', 1000000, '6 Pose + Edit (CD)\r\nCetak 10R 5+bingkai\r\nCetak 20R 1 Lembar (tanpa bingkai)\r\nKostum 1 pasang (set)\r\nMake up + Sanggul/Jilbab\r\nPas Foto', 'camera.jpg', NULL, NULL, NULL, NULL, 500000, 1, 1, '0', '0', '0', '0'),
(2, 1, 'P002', 'Prewedding Complit', 1250000, '6 Pose + Edit (CD)\r\nCetak 10R 5 + Bingkai\r\nCetak 20R 1 + Bingkai linen\r\nKostum 1 pasang (set)\r\nMake up + Sanggul/Jilbab\r\nPas Foto\r\nX- banner\r\nBanner 1x3 M', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(3, 1, 'P003', 'Prewedding Outdoor', 2000000, 'File (seluruh) (CD)\r\nCetak 10R 5+bingkai\r\nCetak 20R 2+Frame (minimalis)\r\nPas foto\r\nX-Banner 1 (set)\r\nKostum 1 pasang (set)\r\nBanner 4x1 M\r\nMake up + Sanggul/Jilbab\r\n*Biaya belum termasuk transport/makan', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '99', '0', '0', '0'),
(4, 2, 'P004', 'Foto Group (1-7 Orang)', 100000, '1-7 Orang\r\nCetak 10R (1 pcs)\r\nFile 2', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '99', '0', '0', '0'),
(5, 2, 'P005', 'Foto Group (9-12 Orang)', 110000, '9-12 Orang\r\nCetak 10R (1 pcs)\r\nFile 2', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(6, 2, 'P006', 'Foto Couple', 100000, '1 Pose\r\nCetak 10R\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(7, 2, 'P007', 'Foto Gandeng', 60000, '3 Lembar 3x4\r\n3 Lembar 2x3\r\n3 Lembar 4x6 + CD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(8, 3, 'P008', 'Keluarga Elegant', 600000, '4 Pose\r\nCetak 10R + Frame\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(9, 3, 'P009', 'Keluarga Eksklusif', 1000000, '3 Pose\r\n80x100 Cetak Kanvas\r\n16 R\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(10, 3, 'P0010', 'Keluarga Mewah', 600000, '3 Pose 20R\r\nCetak 12R (2 Pcs)\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(11, 4, 'P0011', 'Foto Model', 100000, '1 Pose\r\nCetak 10R\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(12, 4, 'P0012', 'Pas Foto', 40000, '3 Lembar 3x4\r\n3 Lembar 2x3\r\n3 Lembar 4x6\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(13, 4, 'P0013', 'Foto Close Up', 80000, '1 Pose\r\n4R (2 lembar)\r\nCD', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(14, 5, 'V0014', 'VIDEO SHOOTING', 2300000, 'CD Album 15 Sheet Video', 'camera.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1, '0', '0', '0', '0'),
(31, 1, '11', 'Dodi Novembri', 546798, 'sdfsdf', '5ec2af8fcb362.jpg', NULL, NULL, '2020-05-18 08:53:51', '2020-05-18 08:53:51', NULL, 0, 1, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `rekening`, `name`, `number`) VALUES
(1, 'DANA', 'Toni Suwendi', '088215005600'),
(3, 'GOPAY', 'Toni Suwendi', '088215005600'),
(7, 'OVO', 'Toni Suwendi', '088215005600');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'member', 'member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `promo_time` varchar(40) NOT NULL,
  `short_desc` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `regency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `promo`, `promo_time`, `short_desc`, `address`, `regency_id`) VALUES
(1, 1, '2020-05-31T00:00', 'Buntomart adalah sebuah situs toko online mudah dan terpercaya. Kami memiliki toko fisik yang bisa Anda kunjungi. Disini jual beragam komputer, gadget, serta pakaian pria dan wanita', 'Jalan Sama Aku, Nikah Sama Dia\r\nJawa Tengah, Indonesia', 105);

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id`, `name`, `icon`, `link`) VALUES
(1, 'Facebook', 'facebook-f', 'https://facebook.com/tonisuwen'),
(3, 'Twitter', 'twitter', 'https://twitter.com/tonisuwen'),
(4, 'Linkedin', 'linkedin-in', 'https://linkedin.com/in/tonisuwendi'),
(5, 'Instagram', 'instagram', 'https://instagram.com/tonisuwen'),
(6, 'Youtube', 'youtube', 'https://youtube.com/tonisuwendi');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `photo`, `content`) VALUES
(1, 'Aliyah Wati - Jakarta', '', 'Sist makasih barangnya udah sampe, bagus dan lucu2. Temenku aja pada ngiri. Semoga sukses selalu buat eveshopashopnya. Sory baru bisa kasih kabar.'),
(2, 'Een Enarsih - Banten', '', 'Sis barang ny dh sya trima,mkasih bnyak untuk layan’n ny sngat m’muaskan untuk sya,smu prtanya’n di jwab…\r\nRespon ny jga sngat baek,smoga usaha ny smakin brkembang'),
(3, 'Ayung Darma - Pekalongan', '', 'Oia mf sis,Nich brg nya brsan aja ampe, mksh ya\r\nBrg nya bgs banget, sesuai yg digambarnya, makasih ya'),
(4, 'Via Garolita - Cimahi', '', 'Sistaaaa……\r\nbaju nyaa udah smpee…\r\nbguss dechh…suka bgt…\r\nmaaksiih yaa'),
(5, 'Dewanti - Solo', '', 'Barang tidak mengecewakan.. cs nya fast respon, resi besoknya langsung di share tanpa kita tanya.. mantap tokohijabku'),
(6, 'Dina - Malang', '', 'Respon cs baik, tapi untuk pengirimannya agak lama, padahal pakai ekspedisi ”sicepat”\r\nharusnya bisa cepat sampainya.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Kurniawan', 'hilmysyarif@gmail.com', 1, NULL, '$2y$10$R1.cBUMQDSdq71J4ciB4nOpA4XOn4jvfs/Vy0gFX/eicdQFF0KoeC', NULL, '2020-05-07 10:49:23', '2020-05-07 10:49:23'),
(2, 'Dodi Novembri', 'dodinovembri32@gmail.com', 2, NULL, '$2y$10$/j1Ohgcf0RU7b.FBEoKqXeF4QVMudwpZ3UQ3w3TvLWYqEMqKHzaIG', NULL, '2020-05-22 08:01:23', '2020-05-22 08:01:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_history_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_history_ibfk_3` FOREIGN KEY (`status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
