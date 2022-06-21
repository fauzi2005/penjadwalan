-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 07:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `kode_guru` varchar(20) NOT NULL,
  `nip_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `gelar_guru` varchar(20) NOT NULL,
  `gender_guru` varchar(20) NOT NULL,
  `alamat_guru` varchar(50) NOT NULL,
  `no_hp_guru` varchar(15) NOT NULL,
  `email_guru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`kode_guru`, `nip_guru`, `nama_guru`, `gelar_guru`, `gender_guru`, `alamat_guru`, `no_hp_guru`, `email_guru`) VALUES
('aads123', '12312', 'SAdkjajd', 'akjsdkja', 'Perempuan', 'Sadad', '918238', 'kasjdkja@kasdkja.asjdas'),
('s2ish', '123112312', 'Fauzi Maulana Habibi', 'S.Kom', 'Perempuan', 'Kp. Pertanian Utara No.10A RT008 RW01, Kel. Klende', '085776509645', '1212@sdasd.asa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru_mapel`
--

CREATE TABLE `tb_guru_mapel` (
  `kode_gmp` int(11) NOT NULL,
  `kode_guru` varchar(100) NOT NULL,
  `kode_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru_mapel`
--

INSERT INTO `tb_guru_mapel` (`kode_gmp`, `kode_guru`, `kode_mapel`) VALUES
(1, 's2ish', '56'),
(2, 's2ish', '56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(1, 'Administrasi Perkantoran'),
(2, 'Akuntansi'),
(3, 'Multimedia'),
(4, 'Pemasaran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kategori_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`kode_mapel`, `nama_mapel`, `kategori_mapel`) VALUES
(1, 'Pendidikan Agama Islam dan Budi Pekerti', '2'),
(2, 'Pendidikan Agama dan Budi Pekerti (Agama Lainnya)', '2'),
(3, 'Pendidikan Pancasila dan Kewarganegaraan', '2'),
(4, 'Bahasa Indonesia', '2'),
(5, 'Matematika', '2'),
(6, 'Sejarah Indonesia', '2'),
(7, 'Bahasa Inggris', '2'),
(8, 'Seni Budaya', '2'),
(9, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', '2'),
(10, 'Simulasi dan Komunikasi Digital', '2'),
(11, 'Ekonomi Bisnis', '2'),
(12, 'Administrasi Umum', '2'),
(13, 'IPA', '2'),
(14, 'Etika Profesi', '2'),
(15, 'Aplikasi Pengolah Angka (Spreadsheet)', '2'),
(16, 'Akuntansi Dasar', '2'),
(17, 'Perbankan Dasar', '2'),
(18, 'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur', '2'),
(19, 'Praktikum Akuntansi Lembaga atau Instansi Pemerintah', '2'),
(20, 'Akuntansi Keuangan', '2'),
(21, 'Komputer Akuntansi', '2'),
(22, 'Administrasi Pajak', '2'),
(23, 'Produk Kreatif dan Kewirausahaan', '2'),
(24, 'Pendidikan Agama Islam dan Budi Pekerti', '3'),
(25, 'Pendidikan Agama dan Budi Pekerti (Agama Lainnya)', '3'),
(26, 'Pendidikan Pancasila dan Kewarganegaraan', '3'),
(27, 'Bahasa Indonesia', '3'),
(28, 'Matematika', '3'),
(29, 'Sejarah Indonesia', '3'),
(30, 'Bahasa Inggris', '3'),
(31, 'Seni Budaya', '3'),
(32, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', '3'),
(33, 'Simulasi dan Komunikasi Digital', '3'),
(34, 'Fisika', '3'),
(35, 'Kimia', '3'),
(36, 'Sistem Komputer', '3'),
(37, 'Komputer dan Jaringan Dasar ', '3'),
(38, 'Pemrograman Dasar  ', '3'),
(39, 'Dasar Desain Grafis ', '3'),
(40, 'Desain Grafis Percetakan ', '3'),
(41, 'Desain Media Interaktif ', '3'),
(42, 'Teknik Animasi 2D dan 3D ', '3'),
(43, 'Teknik Pengolahan Audio dan Video ', '3'),
(44, 'Produk Kreatif dan Kewirausahaan', '3'),
(45, 'Pendidikan Agama Islam dan Budi Pekerti', '1'),
(46, 'Pendidikan Agama dan Budi Pekerti (Agama Lainnya)', '1'),
(47, 'Pendidikan Pancasila dan Kewarganegaraan', '1'),
(48, 'Bahasa Indonesia', '1'),
(49, 'Matematika', '1'),
(50, 'Sejarah Indonesia', '1'),
(51, 'Bahasa Inggris', '1'),
(52, 'Seni Budaya', '1'),
(53, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', '1'),
(54, 'Simulasi dan Komunikasi Digital', '1'),
(55, 'Ekonomi Bisnis', '1'),
(56, 'Administrasi Umum', '1'),
(57, 'IPA', '1'),
(58, 'Teknologi Perkantoran', '1'),
(59, 'Korespondensi', '1'),
(60, 'Kearsipan', '1'),
(61, 'Otomatisasi Tata Kelola Kepegawaian', '1'),
(62, 'Otomatisasi Tata Kelola Keuangan', '1'),
(63, 'Otomatisasi Tata Kelola Sarana dan Prasarana', '1'),
(64, 'Otomatisasi Tata Kelola Humas dan Keprotokolan', '1'),
(65, 'Produk Kreatif dan Kewirausahaan', '1'),
(66, 'Pendidikan Agama Islam dan Budi Pekerti', '4'),
(67, 'Pendidikan Agama dan Budi Pekerti (Agama Lainnya)', '4'),
(68, 'Pendidikan Pancasila dan Kewarganegaraan', '4'),
(69, 'Bahasa Indonesia', '4'),
(70, 'Matematika', '4'),
(71, 'Sejarah Indonesia', '4'),
(72, 'Bahasa Inggris', '4'),
(73, 'Seni Budaya', '4'),
(74, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', '4'),
(75, 'Simulasi dan Komunikasi Digital', '4'),
(76, 'Ekonomi Bisnis', '4'),
(77, 'Administrasi Umum', '4'),
(78, 'IPA', '4'),
(79, 'Marketing', '4'),
(80, 'Perencanaan Bisnis', '4'),
(81, 'Komunikasi Bisnis', '4'),
(82, 'Penataan Produk', '4'),
(83, 'Bisnis Online', '4'),
(84, 'Pengelolaan Bisnis Ritel', '4'),
(85, 'Administrasi Transaksi', '4'),
(86, 'Produk Kreatif dan Kewirausahaan', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  ADD PRIMARY KEY (`kode_gmp`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  MODIFY `kode_gmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `kode_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `kode_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
