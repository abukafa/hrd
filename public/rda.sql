-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 07:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rda`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `hadir` varchar(50) NOT NULL,
  `p_hadir` varchar(50) NOT NULL,
  `lambat` varchar(50) NOT NULL,
  `p_lambat` varchar(50) NOT NULL,
  `lembur` varchar(50) NOT NULL,
  `p_lembur` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `acc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `id` int(11) UNSIGNED NOT NULL,
  `no` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `bentuk` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-10-14-221028', 'App\\Database\\Migrations\\User', 'default', 'App', 1665809077, 1),
(2, '2022-10-15-033108', 'App\\Database\\Migrations\\Santri', 'default', 'App', 1665809077, 1),
(3, '2022-10-15-041825', 'App\\Database\\Migrations\\Kompetensi', 'default', 'App', 1665809078, 1),
(4, '2022-10-15-042435', 'App\\Database\\Migrations\\Absensi', 'default', 'App', 1665809078, 1),
(5, '2022-10-15-042907', 'App\\Database\\Migrations\\Potongan', 'default', 'App', 1665809078, 1),
(6, '2022-10-15-043513', 'App\\Database\\Migrations\\Tunjangan', 'default', 'App', 1665809079, 1);

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `p_srg` varchar(50) NOT NULL DEFAULT '0',
  `p_atr` varchar(50) NOT NULL DEFAULT '0',
  `p_kes` varchar(50) NOT NULL DEFAULT '0',
  `p_rmh` varchar(50) NOT NULL DEFAULT '0',
  `p_bon` varchar(50) NOT NULL DEFAULT '0',
  `p_htg` varchar(50) NOT NULL DEFAULT '0',
  `p_zkt` varchar(50) NOT NULL DEFAULT '0',
  `p_inf` varchar(50) NOT NULL DEFAULT '0',
  `p_lin` varchar(50) NOT NULL DEFAULT '0',
  `acc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id`, `nip`, `nama`, `p_srg`, `p_atr`, `p_kes`, `p_rmh`, `p_bon`, `p_htg`, `p_zkt`, `p_inf`, `p_lin`, `acc`) VALUES
(1, '007.07.2022', 'Aditya Rizal Gustiawan', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(2, '025.09.2022', 'Aisyah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(3, '016.08.2022', 'El Islam','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(4, '039.02.2021', 'Hamba Fauzi Rahman','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(5, '026.12.2019', 'Ima Rohimah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(6, '018.11.2021', 'Iyul Arminanti','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(7, '019.08.2022', 'Kevin Fadrul Fajar','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(8, '010.12.2018', 'Lutfhi Abdul Latief','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(9, '015.08.2022', 'Muhammad Fikri Abdul Alim','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(10, '001.03.2022', 'Nurul Azmi','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(11, '014.07.2022', 'Nurul Azmii','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(12, '048.02.2021', 'Nurul Siti Hajar','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(13, '040.02.2021', 'Rizal Muhammad','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(14, '019.12.2019', 'Sintia Arum','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(15, '045.02.2021', 'Tia Naila Malieha','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(16, '046.02.2021', 'Ufu Fuwaiziah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(17, '024.09.2022', 'Ust Abdul Azis','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(18, '005.03.2022', 'Fina Desia','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(19, '012.09.2021', 'Diana Purwita Asih','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(20, '033.12.2019', 'Nida Martiana','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(21, '026.10.2022', 'Salsabila Fitria Hidayat','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(22, '027.12.2019', 'Apriliandri Dede Yusuf','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(23, '006.07.2022', 'Gina Adi Mulia','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(24, '052.02.2021', 'Irma Apriyanti','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(25, '007.12.2017', 'Irpa Maulana','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(26, '028.12.2019', 'Siti Rohimah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(27, '004.03.2022', 'Anggraeni Devi Lestari','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(28, '043.02.2021', 'Ariyana Nurandina','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(29, '009.12.2019', 'Ellen Silviani','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(30, '008.12.2017', 'Euis Kurniasih','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(31, '020.09.2022', 'Indah Permata Sari','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(32, '031.12.2020', 'Pitri Natalia','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(33, '008.07.2022', 'Siti Rahma','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(34, '009.07.2022', 'Allief Mulkan','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(35, '013.09.2021', 'Dimas Triyuda Kusumah', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(36, '017.08.2022', 'Dinda Fatrahmah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(37, '013.07.2022', 'Ika Fadillah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(38, '015.10.2021', 'Jordi Permana','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(39, '010.07.2022', 'Mochammad Shifa','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(40, '038.02.2021', 'Nia Kusmiati','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(41, '041.02.2021', 'Nisa Bela','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(42, '017.11.2021', 'Nur Mala Sari','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(43, '034.02.2021', 'Yulviani Monika','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(44, '002.03.2022', 'Fine Afriani, Se, Ak','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(45, '017.12.2018', 'Ira Rodiyatam Mardiyyah','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(46, '012.12.2018', 'Muhammad Rifki Alfikri','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(47, '018.08.2022', 'Elis','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(48, '029.12.2019', 'Raizal Miftahul Maulana','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(49, '012.07.2022', 'Wanti', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(50, '014.09.2021', 'Firmansyah Putra','0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(51, '011.07.2022', 'Muhammad Ilyas', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `remun`
--

CREATE TABLE `remun` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `honor` varchar(50) NOT NULL DEFAULT '0',
  `makan` varchar(50) NOT NULL DEFAULT '0',
  `transport` varchar(50) NOT NULL DEFAULT '0',
  `t_jab` varchar(50) NOT NULL DEFAULT '0',
  `t_stt` varchar(50) NOT NULL DEFAULT '0',
  `t_ank` varchar(50) NOT NULL DEFAULT '0',
  `t_rmh` varchar(50) NOT NULL DEFAULT '0',
  `t_prg` varchar(50) NOT NULL DEFAULT '0',
  `t_srg` varchar(50) NOT NULL DEFAULT '0',
  `t_atr` varchar(50) NOT NULL DEFAULT '0',
  `t_kes` varchar(50) NOT NULL DEFAULT '0',
  `t_hra` varchar(50) NOT NULL DEFAULT '0',
  `t_haj` varchar(50) NOT NULL DEFAULT '0',
  `t_dka` varchar(50) NOT NULL DEFAULT '0',
  `t_bns` varchar(50) NOT NULL DEFAULT '0',
  `t_spc` varchar(50) NOT NULL DEFAULT '0',
  `t_eks` varchar(50) NOT NULL DEFAULT '0',
  `p_srg` varchar(50) NOT NULL DEFAULT '0',
  `p_atr` varchar(50) NOT NULL DEFAULT '0',
  `p_kes` varchar(50) NOT NULL DEFAULT '0',
  `p_rmh` varchar(50) NOT NULL DEFAULT '0',
  `p_bon` varchar(50) NOT NULL DEFAULT '0',
  `p_htg` varchar(50) NOT NULL DEFAULT '0',
  `p_zkt` varchar(50) NOT NULL DEFAULT '0',
  `p_inf` varchar(50) NOT NULL DEFAULT '0',
  `p_lin` varchar(50) NOT NULL DEFAULT '0',
  `acc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `no_absen` varchar(50) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `panggilan` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(50) DEFAULT NULL,
  `gol_darah` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `pasangan` varchar(50) DEFAULT NULL,
  `jml_istri` varchar(50) DEFAULT NULL,
  `jml_anak` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `kab` varchar(50) DEFAULT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `handphone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `thn_gabung` varchar(50) DEFAULT NULL,
  `laznah` varchar(50) DEFAULT NULL,
  `status_rda` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL,
  `sub_golongan` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status_santri` varchar(50) DEFAULT NULL,
  `t_jab` tinyint(1) NOT NULL DEFAULT 0,
  `t_stt` tinyint(1) NOT NULL DEFAULT 0,
  `t_ank` tinyint(1) NOT NULL DEFAULT 0,
  `t_rmh` tinyint(1) NOT NULL DEFAULT 0,
  `t_prg` tinyint(1) NOT NULL DEFAULT 0,
  `t_srg` tinyint(1) NOT NULL DEFAULT 0,
  `t_atr` tinyint(1) NOT NULL DEFAULT 0,
  `t_kes` tinyint(1) NOT NULL DEFAULT 0,
  `t_hra` tinyint(1) NOT NULL DEFAULT 0,
  `t_haj` tinyint(1) NOT NULL DEFAULT 0,
  `t_dka` tinyint(1) NOT NULL DEFAULT 0,
  `t_bns` tinyint(1) NOT NULL DEFAULT 0,
  `t_spc` tinyint(1) NOT NULL DEFAULT 0,
  `t_eks` tinyint(1) NOT NULL DEFAULT 0,
  `acc` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `nip`, `no_absen`, `ktp`, `gender`, `nama`, `panggilan`, `tmp_lahir`, `tgl_lahir`, `gol_darah`, `status`, `pasangan`, `jml_istri`, `jml_anak`, `pendidikan`, `alamat`, `kec`, `kab`, `kodepos`, `asal`, `handphone`, `email`, `thn_gabung`, `laznah`, `status_rda`, `grade`, `golongan`, `sub_golongan`, `jabatan`, `status_santri`, `t_jab`, `t_stt`, `t_ank`, `t_rmh`, `t_prg`, `t_srg`, `t_atr`, `t_kes`, `t_hra`, `t_haj`, `t_dka`, `t_bns`, `t_spc`, `t_eks`, `acc`, `created_at`, `updated_at`) VALUES
(1, '007.07.2022', '', '', 'Ikhwan', 'Aditya Rizal Gustiawan', 'Adit', 'Garut', '28/08/1998', 'O', 'Single', '-', '-', '-', 'SMA', 'Perum Jati Putra Asri Blok M No 7', 'Tarogong Kidul', 'Garut', '', '', '6289633044451', 'aditya.rizal.752@gmail.com', '2022', 'AHE', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(2, '025.09.2022', '', '', 'Akhwat', 'Aisyah', 'Aisyah', '', NULL, 'O', 'Single', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'AHE', 'Karya', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(3, '016.08.2022', '', '3276072408980000', 'Ikhwan', 'El Islam', 'El Islam', 'Ciamis', '24/08/1998', 'O', 'Single', '', '-', '', '-', 'Sukamaju, Rt 001/003, Mulyasari, Tamansari', 'Tamansari', 'Tasikmalaya', '', 'Ciamis', '', NULL, '2022', 'AHE', 'Karya', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(4, '039.02.2021', '39', '3207010803860000', 'Ikhwan', 'Hamba Fauzi Rahman', 'Hamba', 'Ciamis', '8/3/1986', '', 'Menikah', 'Fina Desia Defiani', '1', '3', 'S1', 'Perum Tamansari Indah 04/11 Kawalu', 'Kawalu ', 'Kota Tasikmalaya', '', 'Perum Tamansari Indah 04/11 Kawalu', '6285218349909', 'hambafauzi.r@gmail.com', '2020', 'AHE', 'Khidmat', '5', 'Kepala Bagian', 'Asisten Manager Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(5, '026.12.2019', '26', '3206205307000000', 'Akhwat', 'Ima Rohimah', 'Ima', 'Tasikmalaya', '13/7/2000', '', 'Single', '-', '-', '-', 'SLTA', 'Kp. Pasirjaya Rt/Rw 03/06 Kel. Sukajaya ', 'Purbaratu', 'Kota Tasikmalaya', '46190', 'Kp. Pasirjaya Rt/Rw 03/06 Sukajaya Purbaratu Tasikmalaya', '', NULL, '2019', 'AHE', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(6, '018.11.2021', '', '', 'Akhwat', 'Iyul Arminanti', 'Iyul', 'Tasikmalaya', NULL, 'O', 'Single', '-', '-', '-', 'SMA', 'Kp Mangkujaya 08/04 Kel Dawagung Kec Rajapolah', 'Rajapolah', 'Kab Tasikmalaya', '', 'Kp Mangkujaya 08/04 Kel Dawagung Kec Rajapolah', '6285311915581', 'iyularminanti409@gmail.com', '2021', 'AHE', 'Suspend', '1', 'Staf', 'Staf Percobaan', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(7, '019.08.2022', '', '', 'Ikhwan', 'Kevin Fadrul Fajar', 'Kevin', '', NULL, '-', 'Single', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'AHE', 'Suspend', '1', 'Staf', 'Staf Percobaan', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(8, '010.12.2018', '10', '3278082806990000', 'Ikhwan', 'Lutfhi Abdul Latief', 'Lutfi', 'Tasikmalaya', '28/6/1999', 'O', 'Single', 'Sintia Arum', '1', '-', 'SLTA', 'Tundagan Rt/Rw 16/04  Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Tundagan Rt/Rw 16/04  Kel. Linggajaya Kec. Mangkubumi Kota Tasikmalaya', '6285523662500', 'latieflutfhi28@gmail.com', '2018', 'AHE', 'Khidmat', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(9, '015.08.2022', '', '3278080811990000', 'Ikhwan', 'Muhammad Fikri Abdul Alim', 'Fikri', 'Tasikmalaya', '9/4/1995', '-', 'Menikah', '', '1', '1', 'S1', 'Jl Arwana Blok A No 22, Perum Bumi Resik Abdi Negara. Kec Mangkubumi, Kota Tasikmalaya', 'Mangkubumi', 'Tasikmalaya', '46181', 'Tasikmalaya', '6289626530692', 'ujangfik@gmail.com', '2022', 'AHE', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(10, '001.03.2022', '32', '3207025411000000', 'Akhwat', 'Nurul Azmi', 'Nurul', 'Tasikmalaya', '14/11/2000', '-', 'Single', '', '-', '', 'SMA', 'Dusun Desa Rt 03/01 Margaluyu Kec Cikoneng Kota Tasikmalaya', 'Cikoneng', 'Kota Ciamis', '46261', 'Jl. Raya Cikoneng Dusun Desa Margaluyu Rt.003 Rw. 001 Kec. Cikoneng - Ciamis ', '6283827906162', 'azmiulul078@gmail.com', '2020', 'AHE', 'Suspend', '3', 'Staf', 'Staf Senior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(11, '014.07.2022', '', '', 'Akhwat', 'Nurul Azmii', 'Nurul', '', NULL, '-', 'Single', '', '-', '', '-', '', '', '', '', '', '', NULL, '2020', 'AHE', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(12, '048.02.2021', '48', '3278036303010000', 'Akhwat', 'Nurul Siti Hajar', 'Nursi', 'Tasikmalaya', '23/3/2001', 'A', 'Single', '-', '-', '-', 'SLTA', 'Jl. Cikalang Tengah 02/14 Kelurahan Cikalang', 'Tawang', 'Kota Tasikmalaya', '46114', 'Jl. Cikalangtengah 02/14 Cikalang Tawang Tasikmalaya', '6287738837157', 'Nurulsitihajar8@gmail.com', '2020', 'AHE', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(13, '040.02.2021', '40', '3278011906020000', 'Ikhwan', 'Rizal Muhammad', 'Rizal', 'Tasikmalaya', '19/6/2002', '', 'Single', '-', '-', '-', 'SLTA', 'Perum Melati Mas Residence 2 Blokb.25', 'Indihiang', 'Kota Tasikmalaya', '46151', 'Perum Melati Mas Residence 2 Blokb.25', '6287775755908', 'rizalmuhamad0204gmail.com', '2020', 'AHE', 'Khidmat', '4', 'Kepala Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(14, '019.12.2019', '19', '3208286008980000', 'Akhwat', 'Sintia Arum', 'Arum', 'Kuningan', '20/08/1998', 'A', 'Single', '-', '-', '-', 'SMA', 'Kuningan Rt/Rw 003/002 Desa Sukarapih Kec Cibeureum Kab Kuningan', '', 'Kuningan', '45588', 'Kuningan Rt/Rw 003/002 Desa Sukarapih Kec Cibeureum Kab Kuningan', '628157098340', NULL, '2018', 'AHE', 'Khidmat', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(15, '045.02.2021', '45', '3206344909970000', 'Akhwat', 'Tia Naila Malieha', 'Tia', 'Tasikmalaya', '9/9/1997', 'B', 'Single', '-', '-', '-', 'S1', 'Cibarani Rt 01/07 Kel Manggung Jaya Kec Rajapolah', 'Rajapolah', ' Tasikmalaya', '46155', 'Cibarani Rt 01/07 Kel Manggung Jaya Kec Rajapolah Kab Tasikmalaya', '6289698910144', 'tianailamalieha@gmail.com', '2020', 'AHE', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:33', '2022-11-01 13:38:33'),
(16, '046.02.2021', '46', '3278046508950000', 'Akhwat', 'Ufu Fuwaiziah', 'Ufu', 'Tasikmalaya', '25/08/1995', 'B', 'Single', '-', '-', '-', 'S1', 'Sukarindik 1 02/01 Sukarindik Bungursari ', 'Bungursari', 'Kota Tasikmalaya', '46151', 'Sukarindik 1 02/01 Sukarindik Bungursari  Tasikmalaya', '6282120946109', 'ufusiti@gmail.com', '2020', 'AHE', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(17, '024.09.2022', '', '', 'Ikhwan', 'Ust Abdul Azis', 'Ust Azis', '', NULL, '-', 'Menikah', 'Mis Tia', '1', '2', '-', '', '', '', '', '', '', NULL, '2022', 'AHE', 'Karya', '2', 'Staf', 'Staf Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(18, '005.03.2022', '4', '3278057112880000', 'Akhwat', 'Fina Desia', 'Fina', 'Tasikmalaya', '31/12/1988', 'B', 'Menikah', 'Hamba Fauzi Rahman', '-', '2', 'S1', 'Perum Taman Sari Indah Blok D35 Rt/Rw 04/11 Tasikmalaya', 'Kawalu ', 'Kota Tasikmalaya', '46182', 'Perum Taman Sari Indah Blok D35 Rt/Rw 04/11 Karsamenak Kawalu ', '6285223848455', 'fina_defiani@yahoo.co.id', '2017', 'Al Iffah', 'Khidmat', '4', 'Kepala Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(19, '012.09.2021', '', '3278025501820000', 'Akhwat', 'Diana Purwita Asih', 'Diana', 'Bandung', '15/01/1982', '-', '-', '-', '-', '-', 'S1', 'Jl Hanura Cikiara Rt/Rw 003/011 Panglayungan Cipedes Tasikmalaya', 'Cipedes ', 'Kota Tasikmalaya', '46134', 'Jl. Hanura Cikiara Rt.003 Rw.011  Desa Panglayungan Kec Cipedes Kota Tasikmalaya', '', NULL, '2020', 'Al-Iffah', 'Suspend', '2', 'Staf', 'Staf Junior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(20, '033.12.2019', '33', '3278036603000000', 'Akhwat', 'Nida Martiana', 'Nida', 'Tasikmalaya', '26/3/2000', 'O', 'Single', '-', '-', '-', 'SLTA', 'Petir,I Rt/Rw.05/08 Kel Cikalang ', 'Tawang', 'Kota Tasikmalaya', '46144', 'Petir, Rt 05/08 Kel Cikalang Kec Tawang Kab Tasikmalaya', '6283830891826', 'nidamartiana@gmail.com', '2019', 'Al-Iffah', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(21, '026.10.2022', '27', '2172026901970000', 'Akhwat', 'Salsabila Fitria Hidayat', 'Selby', 'Batam', '29/01/1997', 'O', 'Single', '-', '-', '-', 'S1', 'Perum Mahkota Alam Permai Blok J No 31', 'Tanjung Pinang Timmur', '', '-', '', '6281222346184', 'salsabilla12160@gmail.com', '2022', 'Al-Iffah', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(22, '027.12.2019', '27', '3204341404960000', 'Ikhwan', 'Apriliandri Dede Yusuf', 'Dede', 'Bandung', '14/4/1996', '', 'Menikah', 'Mia Agustina', '1', '-', 'SLTA', 'Kp. Sukagenah 3, Rt. 002 Rw. 004, Kel. Sambong Jaya, Kec. Mangkubumi, Kota Tasikmalaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Kp. Sukagenah 3, Rt. 002 Rw. 004, Kel. Sambong Jaya, Kec. Mangkubumi', '628999131096', 'amilzakat14@gmail.com', '2019', 'Corporate', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(23, '006.07.2022', '', '', 'Akhwat', 'Gina Adi Mulia', 'Gina', '', NULL, '-', 'Single', '', '-', '', '-', '', 'Sumedang', '', '', '', '', NULL, '2022', 'Corporate', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(24, '052.02.2021', '52', '', 'Akhwat', 'Irma Apriyanti', 'Irma ', 'Tasikmalaya', '10/8/1980', '', 'Single', '', '-', '', 'SLTA', 'Sukarindik 001/001 Sukarindik Bungursari ', '', '', '', 'Sukarindik 001/001 Sukarindik Bungursari ', '6282315183990', NULL, '2020', 'Corporate', 'Suspend', '2', 'Staf', 'Staf Junior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(25, '007.12.2017', '7', '3278090501950000', 'Ikhwan', 'Irpa Maulana', 'Irpa', 'Tasikmalaya', '5/1/1995', 'B', 'Menikah', 'Teni Taqiah', '1', '2', 'SLTA', 'Bantar Rt.003 Rw.005 Kelurahan Bantarsari', 'Bungursari', 'Kota Tasikmalaya', '46151', 'Bantar Rt.003 Rw.005 Kel. Bantarsari Kec. Bungursari Kota Tasikmalaya', '+620821-2766-2364', 'irpamaulana007@gmail.com', '2017', 'Corporate', 'Khidmat', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(26, '028.12.2019', '28', '3278034109970000', 'Akhwat', 'Siti Rohimah', 'Siti', 'Tasikmalaya', '1/9/1997', 'A', 'Janda', '-', '-', '-', 'SLTA', 'Empang Wetan 05/06 Tawang', 'Tawang', 'Kota Tasikmalaya', '46113', 'Empang Wetan 05/06 Empangsari  Tawang Tasikmalaya', '6285324219796', 'strhmh01@gmail.com', '2019', 'Corporate', 'Khidmat', '4', 'Kepala Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(27, '004.03.2022', '3', '3278046105960010', 'Akhwat', 'Anggraeni Devi Lestari', 'Devi', 'Tasikmalaya', '21/5/1996', 'O', 'Single', '-', '', '-', 'SLTA', 'Jl. Re. Martadinata No. 231 Rt/Rw 02/10 Kel Panyingkiran ', 'Indihiang', 'Kota Tasikmalaya', '46411', 'Jl. Re. Martadinata No. 231 Rt/Rw 02/06 Kel Panyingkiran Kec Indihiang', '+620896 6135 7595', 'a.devilestari@gmail.com', '2017', 'Direktorat', 'Khidmat', '5', 'Ka. Bagian ', 'Asisten Manager Senior', 'Ketua', 'Aktif', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(28, '043.02.2021', '43', '3278080203030000', 'Akhwat', 'Ariyana Nurandina', 'Ari', 'Tasikmalaya', '2/3/2003', '', 'Single', '-', '-', '-', 'SMP', 'Peundeuy, Rt 01/18 Kel Linggajaya Kec Mangkubumi', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Peundeuy, Rt 01/18 Kel Linggajaya Kec Mangkubumi', '6287713619531', NULL, '2020', 'Direktorat', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(29, '009.12.2019', '9', '3205056811970000', 'Akhwat', 'Ellen Silviani', 'Ellen', 'Garut', '28/11/1997', 'B', 'Single', '-', '-', '-', 'S1', 'Kp. Salamgede , Rt. 03 Rw. 03 Desa Kersamenak', 'Tarogong Kidul', 'Garut', '44150', 'Kp. Salamgede , Rt. 03 Rw. 03 Desa Kersamenak, Kec. Tarogong Kidul, Kab. Garut ', '6281319016439', 'ellen.silviani13@gmail.com', '2019', 'Direktorat', 'Khidmat', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(30, '008.12.2017', '8', '3206284310960000', 'Akhwat', 'Euis Kurniasih', 'Euis', 'Tasikmalaya', '3/10/1996', 'A', 'Menikah', 'Allief', '1', '-', 'SLTA', 'Kp. Rawa Girang Rt/Rw 011/003 Ds. Linggamulya', 'Leuwisari', ' Tasikmalaya', '46464', 'Kp Rawa Girang Rt/Rw 011/003 Desa Linggamulya, Kec Leuwisari, Kab Tasikmalaya', '6281546971426', 'Euiskurniasih443@yahoo.com', '2017', 'Direktorat', 'Khidmat', '4', 'Kepala Bagian', 'Asisten Manager Junior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(31, '020.09.2022', '', '3303185010030000', 'Akhwat', 'Indah Permata Sari', 'Indah', 'Purbalingga', '10/10/2003', 'A', 'Single', '', '-', '', 'SMA', 'Darma Rt 03/02 Kertanegara Purbalingga', 'Kertanegara', 'Purbalingga', '53358', 'Purbalingga', '6285641705221', 'lndahpermatasari22202@gmail.com', '2022', 'Direktorat', 'Suspend', '0', 'Trainee', 'Trainee', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(32, '031.12.2020', '0', '3278094811020000', 'Akhwat', 'Pitri Natalia', 'Pitri', 'Tasikmalaya', '11/8/2002', 'B', 'Single', '-', '-', '-', 'SLTA', 'Gunung Honje Rt/Rw 01/08 Kel. Sukarindik', 'Indihiang', 'Kota Tasikmalaya', '46151', 'Gunung Honje Rt/Rw 01/08 Kel Sukarindik Kec Bungursari Kota Tasikmalaya', '6289614517849', 'pitrinatalia22@gmail.com', '2020', 'Direktorat', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(33, '008.07.2022', '', '', 'Akhwat', 'Siti Rahma', 'Rahma', '', NULL, '-', '-', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'Direktorat', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(34, '009.07.2022', '', '', 'Ikhwan', 'Allief Mulkan', 'Allief', '', NULL, '-', 'Menikah', '', '1', '', '-', '', '', '', '', '', '', NULL, '2022', 'MPZ', 'Khidmat', '4', 'Kepala Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:34', '2022-11-01 13:38:34'),
(35, '013.09.2021', '55', '3278052408940000', 'Ikhwan', 'Dimas Triyuda Kusumah', 'Dimas', 'Tasikmalaya', '24/8/1994', '-', 'Single', '-', '-', '-', 'SMA', 'Kp Babakanpala Rt/Rw 04/10 Kel. Karsamenak ', 'Kawalu ', 'Kota Tasikmalaya', '46182', 'Kp Babakanpala Rt/Rw 04/10 Kel Karsamenak Kec Kawalu Kota Tasikmalaya', '6285223461661', 'dimastriyuda@gmail.com', '2021', 'MPZ', 'Suspend', '3', 'Staf', 'Staf Senior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(36, '017.08.2022', '', '3278096601960000', 'Akhwat', 'Dinda Fatrahmah', 'Dinda', 'Tasikmalaya', '26/01/1996', 'O', 'Single', '-', '-', '', 'S1', 'Jl. Bantarsari Lengo No 221 Rt 01/07 Bungursari Tasikmalaya', 'Bungursari', '', '', '', '', NULL, '2022', 'MPZ', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(37, '013.07.2022', '', '', 'Akhwat', 'Ika Fadillah', 'Ika', '', NULL, '-', '-', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'MPZ', 'Karya', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(38, '015.10.2021', '53', '3175051803940000', 'Ikhwan', 'Jordi Permana', 'Jordi', 'Jakarta', '18/3/1994', '-', 'Single', '-', '-', '-', 'SMA', 'Jl. H. Taiman Timur Kav.34 Rt.011 Rw. 009 Kelurahan Gedong ', 'Pasar Rebo', 'Jakarta Timur', '13760', 'Jl. H. Taiman Timur Kav.34 Rt.011 Rw. 009 Kelurahan Gedong Kecamatan Pasar Rebo ', '', NULL, '2021', 'MPZ', 'Suspend', '2', 'Staf', 'Staf Junior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(39, '010.07.2022', '', '', 'Ikhwan', 'Mochammad Shifa', 'Shifa', '', NULL, '-', '-', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'MPZ', 'Suspend', '2', 'Staf', 'Staf Junior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(40, '038.02.2021', '38', '3278046810960000', 'Akhwat', 'Nia Kusmiati', 'Nia', 'Tasikmalaya', '28/10/1996', 'O', 'Single', '-', '-', '-', 'SLTA', 'Rarangjami Rt/Rw 03/07 Indihiang', 'Indihiang', 'Kota Tasikmalaya', '46151', 'Rarangjami Rt/Rw 03/07 Indihiang', '6281313592676', 'niakusmiati288gmail.com', '2019', 'MPZ', 'Suspend', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(41, '041.02.2021', '41', '', 'Akhwat', 'Nisa Bela', 'Nisa', 'Tasikmalaya', '10/10/1997', '', 'Single', '', '-', '', 'S1', 'Kp. Cimajaya 003/003 Cidadali Cikalong', '', '', '', 'Rda', '6282320112090', NULL, '2019', 'MPZ', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(42, '017.11.2021', '', '3206335912020000', 'Akhwat', 'Nur Mala Sari', 'Mala', 'Tasikmalaya', '10/12/2002', '-', 'Single', '-', '-', '-', 'SMA', 'Kp Legok 003/007 Banyurasa Sukahening Tasikmalaya', 'Sukahening', 'Kab Tasikmalaya', '', 'Kp Legok 003/007 Banyurasa Sukahening Tasikmalaya', '6283827634214', 'ns4926552@gmail.com', '2021', 'MPZ', 'Khidmat', '3', 'Staf', 'Staf Senior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(43, '034.02.2021', '34', '3278026507980010', 'Akhwat', 'Yulviani Monika', 'Yulvi', 'Tasikmalaya', '25/7/1998', '', 'Menikah', 'Yono Taryono', '-', '1', 'SLTA', 'Kp. Sindanghurip 005/003 Sukamaju Kidul', 'Indihiang', 'Tasikmalaya', '46151', 'Kp. Sindanghurip 005/003 Sukamaju Kidul Indihiang Tasikmalaya', '6289663053303', 'almahira25@gmail.com', '2019', 'MPZ', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(44, '002.03.2022', '2', '', 'Akhwat', 'Fine Afriani, Se, Ak', 'Ummu Fathan', 'Tasikmalaya', '2/4/1986', 'A', 'Menikah', 'Tino Warsito', '-', '0', 'S1', 'Jl. Letnan Harun Rt 03/10 Cijolang Sukarindik Bungursari Kota Tasikmalaya', 'Bungursari', 'Kota Tasikmalaya', '', 'Jl. Letnan Harun Rt 03/10 Cijolang Sukarindik Bungursari Kota Tasikmalaya', '+620877 2809 9095', 'fine_afriani@yahoo.com', '2013', 'Pimpinan', 'Khidmat', '13', 'Pimpinan', 'Pimpinan Utama', 'Bendahara', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:35', '2022-11-01 13:38:35'),
(45, '017.12.2018', '17', '3278044609000010', 'Akhwat', 'Ira Rodiyatam Mardiyyah', 'Ira', 'Tasikmalaya', '6/9/2000', 'A', 'Single', '-', '-', '-', 'SLTA', 'Sukarindik 1  Rt.02 Rw.01 Kel. Sukarindik ', 'Bungursari', 'Kota Tasikmalaya', '46151', 'Sukarindik 1 Rt.02 Rw.01 Sukarindik Bungursari  Tasikmalaya', '6281990680825', 'rodiyatammardiyyah69@gmail.com', '2018', 'Triger P', 'Suspend', '3', 'Staf', 'Staf Senior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(46, '012.12.2018', '12', '3278080811990000', 'Ikhwan', 'Muhammad Rifki Alfikri', 'Rifqi', 'Tasikmalaya', '8/11/1999', '', 'Single', '-', '-', '-', 'SLTA', 'Tundagan Rt. 01 Rw. 07 Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Tundagan Rt. 01 Rw. 07 Kel. Linggajaya Kecamatan  Mangkubumi Kota Tasikmalaya', '+620815 6764 6242', 'rifkialfikri08@gmaiil.com', '2019', 'Triger P', 'Suspend', '2', 'Staf', 'Staf Junior', 'Sekbid', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(47, '018.08.2022', '', '', 'Akhwat', 'Elis', 'Elis', '', NULL, '-', 'Single', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'Triger Q', 'Khidmat', '2', 'Staf', 'Staf Junior', 'Staf', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(48, '029.12.2019', '29', '3271041712990000', 'Ikhwan', 'Raizal Miftahul Maulana', 'Maulana', 'Tasikmalaya', '17/12/1999', 'B-', 'Single', '-', '-', '-', 'SMA', 'Jl. Abr No. 90 Rt/Rw 04/01 Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Jl. Abr No. 90 Rt/Rw 04/01 Linggajaya Mangkubumi Tasikmalaya', '6282123802799', 'raizalbiman@gmail.com', '2019', 'Triger Q', 'Khidmat', '4', 'Ka. Bagian', 'Asisten Manager Junior', 'Ketua', 'Aktif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(49, '012.07.2022', '', '', 'Akhwat', 'Wanti', 'Wanti', '', NULL, '-', '-', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'Triger Q', 'Suspend', '1', 'Staf', 'Staf Percobaan', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(50, '014.09.2021', '', '7604060507010000', 'Akhwat', 'Firmansyah Putra', 'Adam', 'Malaysia', '5/7/2001', '-', 'Single', '-', '-', '-', 'SMA', 'Dusun Kendal Rt/Rw 006/007 Desa Sukahaji', 'Cihaurbeuti', 'Ciamis', '46262', 'Dusun Kendal Rt.006 Rw. 007 Desa Sukahaji Kecamatan Cihaurbeuti ', '', NULL, '2021', 'Triger R', 'Suspend', '2', 'Staf', 'Staf Junior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36'),
(51, '011.07.2022', '', '', 'Ikhwan', 'Muhammad Ilyas', 'Ilyas', '', NULL, '-', '-', '', '-', '', '-', '', '', '', '', '', '', NULL, '2022', 'Triger R', 'Suspend', '2', 'Staf', 'Staf Junior', 'Staf', 'Pasif', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-01 13:38:36', '2022-11-01 13:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `skim`
--

CREATE TABLE `skim` (
  `id` int(15) NOT NULL,
  `golongan` text NOT NULL,
  `sub_golongan` text NOT NULL,
  `honor` text NOT NULL DEFAULT '0',
  `makan` text NOT NULL DEFAULT '0',
  `transport` text NOT NULL DEFAULT '0',
  `t_jab` text NOT NULL DEFAULT '0',
  `t_stt` text NOT NULL DEFAULT '0',
  `t_ank` text NOT NULL DEFAULT '0',
  `t_prg` text NOT NULL DEFAULT '0',
  `t_kes` text NOT NULL DEFAULT '0',
  `acc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skim`
--

INSERT INTO `skim` (`id`, `golongan`, `sub_golongan`, `honor`, `makan`, `transport`, `t_jab`, `t_stt`, `t_ank`, `t_prg`, `t_kes`, `acc`) VALUES
(0, 'TRAINEE', 'TRAINEE', '0', '50000', '20000', '0', '0', '0', '0', '0', 1),
(1, 'STAF', 'STAF PERCOBAAN', '25000', '100000', '25000', '0', '100000', '20000', '100000', '0', 1),
(2, 'STAF', 'STAF JUNIOR', '50000', '150000', '100000', '0', '100000', '20000', '100000', '0', 1),
(3, 'STAF', 'STAF SENIOR', '100000', '150000', '100000', '0', '100000', '20000', '100000', '0', 1),
(4, 'KEPALA BAGIAN', 'ASISTEN MANAGER JUNIOR', '150000', '175000', '120000', '60000', '150000', '50000', '100000', '0', 1),
(5, 'KEPALA BAGIAN', 'ASISTEN MANAGER SENIOR', '175000', '175000', '120000', '60000', '150000', '50000', '100000', '0', 1),
(6, 'KEPALA DIVISI', 'MANAGER JUNIOR', '200000', '200000', '150000', '120000', '200000', '60000', '100000', '0', 1),
(7, 'KEPALA DIVISI', 'MANAGER SENIOR', '225000', '200000', '150000', '120000', '200000', '60000', '100000', '0', 1),
(8, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER MUDA', '250000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 1),
(9, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER MADYA', '275000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 1),
(10, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER UTAMA', '300000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 1),
(11, 'PIMPINAN', 'PIMPINAN MUDA', '325000', '350000', '250000', '250000', '300000', '100000', '200000', '0', 1),
(12, 'PIMPINAN', 'PIMPINAN MADYA', ' 350000', ' 350000', ' 250000', '250000', '300000', '100000', '200000', '0', 1),
(13, 'PIMPINAN', 'PIMPINAN UTAMA', '400000', '350000', '250000', '250000', '300000', '100000', '200000', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `t_jab` varchar(50) NOT NULL DEFAULT '0',
  `t_stt` varchar(50) NOT NULL DEFAULT '0',
  `t_ank` varchar(50) NOT NULL DEFAULT '0',
  `t_rmh` varchar(50) NOT NULL DEFAULT '0',
  `t_prg` varchar(50) NOT NULL DEFAULT '0',
  `t_srg` varchar(50) NOT NULL DEFAULT '0',
  `t_atr` varchar(50) NOT NULL DEFAULT '0',
  `t_kes` varchar(50) NOT NULL DEFAULT '0',
  `t_hra` varchar(50) NOT NULL DEFAULT '0',
  `t_haj` varchar(50) NOT NULL DEFAULT '0',
  `t_dka` varchar(50) NOT NULL DEFAULT '0',
  `t_bns` varchar(50) NOT NULL DEFAULT '0',
  `t_spc` varchar(50) NOT NULL DEFAULT '0',
  `t_eks` varchar(50) NOT NULL DEFAULT '0',
  `acc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `nip`, `nama`, `t_jab`, `t_stt`, `t_ank`, `t_rmh`, `t_prg`, `t_srg`, `t_atr`, `t_kes`, `t_hra`, `t_haj`, `t_dka`, `t_bns`, `t_spc`, `t_eks`, `acc`) VALUES
(1, '007.07.2022', 'Aditya Rizal Gustiawan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(2, '025.09.2022', 'Aisyah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(3, '016.08.2022', 'El Islam', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(4, '039.02.2021', 'Hamba Fauzi Rahman', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(5, '026.12.2019', 'Ima Rohimah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(6, '018.11.2021', 'Iyul Arminanti', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(7, '019.08.2022', 'Kevin Fadrul Fajar', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(8, '010.12.2018', 'Lutfhi Abdul Latief', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(9, '015.08.2022', 'Muhammad Fikri Abdul Alim', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(10, '001.03.2022', 'Nurul Azmi', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(11, '014.07.2022', 'Nurul Azmii', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(12, '048.02.2021', 'Nurul Siti Hajar', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(13, '040.02.2021', 'Rizal Muhammad', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(14, '019.12.2019', 'Sintia Arum', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(15, '045.02.2021', 'Tia Naila Malieha', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(16, '046.02.2021', 'Ufu Fuwaiziah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(17, '024.09.2022', 'Ust Abdul Azis', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(18, '005.03.2022', 'Fina Desia', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(19, '012.09.2021', 'Diana Purwita Asih', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(20, '033.12.2019', 'Nida Martiana', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(21, '026.10.2022', 'Salsabila Fitria Hidayat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(22, '027.12.2019', 'Apriliandri Dede Yusuf', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(23, '006.07.2022', 'Gina Adi Mulia', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(24, '052.02.2021', 'Irma Apriyanti', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(25, '007.12.2017', 'Irpa Maulana', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(26, '028.12.2019', 'Siti Rohimah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(27, '004.03.2022', 'Anggraeni Devi Lestari', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(28, '043.02.2021', 'Ariyana Nurandina', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(29, '009.12.2019', 'Ellen Silviani', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(30, '008.12.2017', 'Euis Kurniasih', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(31, '020.09.2022', 'Indah Permata Sari', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(32, '031.12.2020', 'Pitri Natalia', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(33, '008.07.2022', 'Siti Rahma', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(34, '009.07.2022', 'Allief Mulkan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(35, '013.09.2021', 'Dimas Triyuda Kusumah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(36, '017.08.2022', 'Dinda Fatrahmah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(37, '013.07.2022', 'Ika Fadillah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(38, '015.10.2021', 'Jordi Permana', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(39, '010.07.2022', 'Mochammad Shifa', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(40, '038.02.2021', 'Nia Kusmiati', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(41, '041.02.2021', 'Nisa Bela', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(42, '017.11.2021', 'Nur Mala Sari', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(43, '034.02.2021', 'Yulviani Monika', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(44, '002.03.2022', 'Fine Afriani, Se, Ak', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(45, '017.12.2018', 'Ira Rodiyatam Mardiyyah', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(46, '012.12.2018', 'Muhammad Rifki Alfikri', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(47, '018.08.2022', 'Elis', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(48, '029.12.2019', 'Raizal Miftahul Maulana', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(49, '012.07.2022', 'Wanti', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(50, '014.09.2021', 'Firmansyah Putra', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(51, '011.07.2022', 'Muhammad Ilyas', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`, `nama`, `admin`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'abu.kafa', '$2y$10$N/fnoXZNjpBGDa7ZIXpYguScWzRkvluaQU/KQeujZ.PO2K1CD.MnW', 'Semangka Media', 'Manager', 'Programmer', '2022-10-30 12:31:25', '2022-10-30 12:31:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remun`
--
ALTER TABLE `remun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `skim`
--
ALTER TABLE `skim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kompetensi`
--
ALTER TABLE `kompetensi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `remun`
--
ALTER TABLE `remun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
