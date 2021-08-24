-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2021 at 12:47 PM
-- Server version: 10.3.30-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stichind_app_stich`
--

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjahit` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `estimasi_selesai` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `id_penjahit`, `name`, `price`, `material`, `stock`, `description`, `estimasi_selesai`, `category_id`, `image`, `rating`, `created_at`, `updated_at`) VALUES
(1, 7, 'Jas Pria', '1000000', 'Wool', 'Tersedia', '- pengerjaan jas ditangani oleh penjahit tailor berpengalaman\r\n- bahan wool cashmere\r\n- lapisan jas full furing sampai ke lengan\r\n- bahu jas pakai busa', '3 Hari', 1, '288946307_jas pria wool.jpg', '0.942', '2021-08-18 07:00:48', '2021-08-18 07:00:48'),
(2, 4, 'Jas Pria', '500000', 'High Twist', 'Tersedia', '-  AS / BLAZER FORMAL, NIKAH, RESMI, KANTOR PRIA COCOK UNTUK PEKERJA KANTORAN, WISUDA, NIKAHAN, INTERVIEW, DLL\r\n- KUALITAS ORI\r\n- BADAN DAN TANGAN FULL FURING\r\n- BADAN DILAPIS TRIKOT\r\n- BUSA PUNDAK TEBAL', '3 Hari', 1, '1732017414_jas pria.png', '0.038', '2021-08-18 07:03:34', '2021-08-18 07:03:34'),
(3, 4, 'Almamater', '350000', 'American Dril', 'Tersedia', 'American Drillâ£\r\nKain ini sangat direkomendasikan untuk bahan dasar pembuatan kemeja lapangan, jas almamater ataupun seragam sekolah. Tekstur yang diberikan memiliki jalinan benang yang cukup kuat. â£\r\n', '3 Hari', 1, '215884735_almamater.png', '0.403', '2021-08-12 05:54:30', '2021-08-12 05:54:30'),
(4, 4, 'Jaket Zipper Hoodie', '200000', 'Fleece Cotton', 'Tersedia', 'Hoodie half zipper polos  kami terbuat dari bahan Cotton Fleece, atau CVC (Cotton Viscose ) Fleece, \r\ndan PE (Polyester) Fleece. Jenis bahan ini banyak karakteristiknya berbulu di bagian dalam dan lembut di bagian luar. \r\nIni adalah jenis bahan yang banya', '3 Hari', 1, '302681188_hoodie.jpg', '0.88', '2021-08-12 05:55:17', '2021-08-12 05:55:17'),
(5, 4, 'Kemeja Batik', '400000', 'Katun', 'Tersedia', '100% Terbuat dari bahan katun, Buatan Lokal\r\nHarga = Kualitas', '3 Hari', 1, '381684668_kemeja batik.jpg', '0.238', '2021-08-18 07:01:49', '2021-08-18 07:01:49'),
(6, 4, 'Kebaya Brokat', '400000', 'Brokat', 'Tersedia', 'Menggunakan bahan brokat, bahan adem kualitas oke, harga = kualitas', '2 - 4 Hari', 1, '2013037077_Kebaya brokat.jpg', '0.359', '2021-08-12 05:58:52', '2021-08-12 05:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'avatar.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `telepon`, `email`, `username`, `password`, `foto`) VALUES
(1, 'Administrator', '085775318153', 'admin@gmail.com', 'admin', '123456', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `bobot` smallint(5) UNSIGNED DEFAULT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kriteria`, `bobot`, `tipe`) VALUES
(1, 'Warna', 10, 'max'),
(2, 'Jenis Bahan', 20, 'max'),
(3, 'Ketepatan Ukuran', 30, 'max'),
(4, 'Desain', 10, 'max'),
(5, 'Kualitas Jahitan', 30, 'max');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjahit`
--

CREATE TABLE `tbl_penjahit` (
  `id_penjahit` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `latitude` varchar(20) NOT NULL DEFAULT '0',
  `longitude` varchar(20) NOT NULL DEFAULT '0',
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjahit`
--

INSERT INTO `tbl_penjahit` (`id_penjahit`, `nama`, `alamat`, `email`, `password`, `telepon`, `latitude`, `longitude`, `foto`) VALUES
(1, 'Necis Busana', 'Jalan kehakiman No 47, Bandung', 'necis@gmail.com', '', '0218765234', '-6.385589', '106.830711', '1315460992_kemeja flanel.jpg'),
(2, 'Style Busana', 'Jalan Perintis Kemerdekaan No 45, Jakarta', 'style@gmail.com', '', '0218938393', '-6.385189', '106.830311', 'logo.png'),
(3, 'Necis Busanax', 'Jalan kehakiman No 47, Bandung', 'necis@gmail.com', '', '0218765234', '-6.385589', '106.830711', 'logo.png'),
(4, 'Jiem Tailor', 'Jl. Delima 1A No.2, RT.2/RW.1, Malaka Sari, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibuk', 'jiemtailor@gmail.com', '', '081213126355', '-6.214655629069231', '106.93094932839395', '883554490_1223428011_logo (1).png'),
(5, 'Resky tailor', 'Jl. Raya St. Cakung No.20, RT.10/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus I', 'reskytailor@gmail.com', '', '082373947101', '-6.218329738232572', '106.95127118220886', '103757964_1223428011_logo (1).png'),
(6, 'M Tailor', 'Jl. Abdul Majid Raya No.14, RT.2/RW.5, Cipete Sel., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khus', 'mtailor@gmail.com', '', '085774136161', '-6.2666034071237259', '106.80013532807958', '443082490_1223428011_logo (1).png'),
(7, 'Penjahit Amin', 'Jalan Karang Tengah I No.13, RT.4/RW.3, Lb. Bulus, Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusu', 'amin.bunyamin001@gmail.com', '', '081314244172', '-6.310284035863507', '106.7816619973868', '700020747_1223428011_logo (1).png'),
(8, 'Culture Clothings', 'Jl H.Nawi Raya No.30, Gandaria Selatan, Jakarta Selatan', 'contact@cultureclohtings.com', '', '085842241867', '-6.259824726820441', '106.79524236215423', '615464836_1223428011_logo (1).png'),
(9, 'Happy Tailor', 'Jl. Rs Fatmawati 14B, Kebayoran Baru Jakarta Selatan.', 'happytailorlaundry@gmail.com', '', '021-7690456', '-6.2874607023580715', '106.7956040532036', '56803570_1223428011_logo (1).png'),
(10, 'Naomi Busana', 'Jl. Taman Wijaya Kusuma III No.14, RT5/2, Cilandak Barat, CIlandak, Jakarta Selatan', 'naomibusana@gmail.com', '', '087880155426', '-6.300774114923005', '106.8016240397136', '1114893092_1223428011_logo (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id_rating` int(11) UNSIGNED NOT NULL,
  `id_models` int(11) UNSIGNED DEFAULT NULL,
  `id_kriteria` tinyint(3) UNSIGNED DEFAULT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id_rating`, `id_models`, `id_kriteria`, `nilai`) VALUES
(1, 1, 3, '6'),
(2, 1, 2, '8'),
(3, 1, 4, '6'),
(4, 1, 1, '2'),
(5, 1, 5, '8'),
(6, 2, 3, '3'),
(7, 2, 2, '3'),
(8, 2, 4, '3'),
(9, 2, 1, '5'),
(10, 2, 5, '4'),
(11, 3, 3, '8'),
(12, 3, 2, '8'),
(13, 3, 4, '10'),
(14, 3, 1, '8'),
(15, 3, 5, '10'),
(16, 1, 3, '6'),
(17, 1, 2, '8'),
(18, 1, 4, '6'),
(19, 1, 1, '2'),
(20, 1, 5, '8'),
(21, 2, 3, '26'),
(22, 2, 2, '25'),
(23, 2, 4, '64'),
(24, 2, 1, '82'),
(25, 2, 5, '98'),
(26, 3, 3, '24'),
(27, 3, 2, '25'),
(28, 3, 4, '100'),
(29, 3, 1, '24'),
(30, 3, 5, '26'),
(31, 4, 3, '10'),
(32, 4, 2, '8'),
(33, 4, 4, '10'),
(34, 4, 1, '10'),
(35, 4, 5, '4'),
(36, 5, 3, '3'),
(37, 5, 2, '3'),
(38, 5, 4, '3'),
(39, 5, 1, '5'),
(40, 5, 5, '4'),
(41, 6, 3, '3'),
(42, 6, 2, '3'),
(43, 6, 4, '2'),
(44, 6, 1, '3'),
(45, 6, 5, '4'),
(46, 4, 3, '10'),
(47, 4, 2, '8'),
(48, 4, 4, '10'),
(49, 4, 1, '10'),
(50, 4, 5, '27'),
(51, 5, 3, '26'),
(52, 5, 2, '25'),
(53, 5, 4, '64'),
(54, 5, 1, '82'),
(55, 5, 5, '98'),
(56, 6, 3, '24'),
(57, 6, 2, '25'),
(58, 6, 4, '100'),
(59, 6, 1, '24'),
(60, 6, 5, '26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating_detail`
--

CREATE TABLE `tbl_rating_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating_detail`
--

INSERT INTO `tbl_rating_detail` (`id`, `id_transaksi_detail`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, '1'),
(2, 1, 2, '4'),
(3, 1, 3, '3'),
(4, 1, 4, '3'),
(5, 1, 5, '4'),
(6, 3, 1, '5'),
(7, 3, 2, '5'),
(8, 3, 3, '5'),
(9, 3, 4, '5');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_item` int(10) UNSIGNED NOT NULL,
  `total_harga` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail_ukuran` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `kode_trx` varchar(255) NOT NULL,
  `kode_payment` varchar(255) NOT NULL,
  `total_transfer` bigint(20) UNSIGNED NOT NULL,
  `kode_unik` int(10) UNSIGNED NOT NULL,
  `bank` varchar(255) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `total_item`, `total_harga`, `status`, `name`, `detail_ukuran`, `phone`, `description`, `kode_trx`, `kode_payment`, `total_transfer`, `kode_unik`, `bank`, `estimasi`, `no_antrian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000000, 'SELESAI', 'muhammad ridhwan', '87, 77,  78, 78, 87, ', '081532833449', NULL, 'TM-2021-0001', 'TM-2021-44', 1000000, 863, 'Ovo', '3 Hari', '1', '2021-08-11 18:41:54', '2021-08-11 18:41:54'),
(2, 4, 1, 1000000, 'SELESAI', 'Arief Fadhilah', '75, 76,  75, 77, 75, ', '085725746287', NULL, 'TM-2021-0002', 'TM-2021-70', 1000000, 470, 'Gopay', '3 Hari', '2', '2021-08-12 06:59:29', '2021-08-12 06:59:29'),
(3, 7, 1, 350000, 'BATAL', 'daffy', '88', '087880456647', NULL, 'TM-2021-0003', 'TM-2021-48', 350000, 723, 'Ovo', '3 Hari', '3', '2021-08-14 12:58:01', '2021-08-14 12:58:01'),
(4, 1, 1, 1000000, 'MENUNGGU', 'muhammad ridhwan', '78, 77,  76, 78, 76, ', '081532833449', NULL, 'TM-2021-0004', 'TM-2021-86', 1000000, 39, 'Gopay', '3 Hari', '4', '2021-08-17 07:56:17', '2021-08-17 07:56:17'),
(5, 4, 1, 350000, 'SELESAI', 'Arief Fadhilah', '65, 75,  60, 50, 80, ', '085725746287', NULL, 'TM-2021-0005', 'TM-2021-89', 350000, 686, 'Gopay', '3 Hari', '5', '2021-08-20 01:40:15', '2021-08-20 01:40:15'),
(6, 1, 1, 1000000, 'MENUNGGU', 'muhammad ridhwan', '89, 88,  89, 97, 78, ', '081532833449', NULL, 'TM-2021-0006', 'TM-2021-36', 1000000, 475, 'Mandiri', '3 Hari', '6', '2021-08-21 13:30:11', '2021-08-21 13:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` int(10) UNSIGNED NOT NULL,
  `models_id` int(10) UNSIGNED NOT NULL,
  `total_item` int(10) UNSIGNED NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_details`
--

INSERT INTO `transaksi_details` (`id`, `transaksi_id`, `models_id`, `total_item`, `catatan`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'catatan', 1000000, NULL, NULL),
(2, 2, 1, 1, 'catatan', 1000000, NULL, NULL),
(3, 3, 3, 1, 'catatan', 350000, NULL, NULL),
(4, 4, 1, 1, 'catatan', 1000000, NULL, NULL),
(5, 5, 3, 1, 'catatan', 350000, NULL, NULL),
(6, 6, 1, 1, 'catatan', 1000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'muhammad ridhwan', 'ridhwanmuhammad49@gmail.com', '081532833449', 'cmlkaHdhbjEyMw=='),
(2, 'Muhammad Ridhwan', 'ridhwanmuhammad772@gmail.com', '0815328334499', 'cmlkaHdhbjEyMw=='),
(3, 'text', 'text', '6504992804', 'dGV4dA=='),
(4, 'Arief Fadhilah', 'arieffadhillah756@gmail.com', '085725746287', 'YXJpZWYxMjM='),
(5, 'alfian juniawan', 'alfian234@gmail.com', '085772637278', 'YWxmaWFuMTIz'),
(6, 'Sabil Habbaiki', 'ssabilhabbaiki@gmail.com', '083896289195', 'YmFuZ3NiaWw='),
(7, 'daffy', 'mohammaddaffy25@gmail.com', '087880456647', 'ZGFmZnkyMTI='),
(8, 'fadil arief', 'arieffadil19@gmail.com', '089574318745', 'YXJpZWZmZjEz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_penjahit`
--
ALTER TABLE `tbl_penjahit`
  ADD PRIMARY KEY (`id_penjahit`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tbl_rating_detail`
--
ALTER TABLE `tbl_rating_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penjahit`
--
ALTER TABLE `tbl_penjahit`
  MODIFY `id_penjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id_rating` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_rating_detail`
--
ALTER TABLE `tbl_rating_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
