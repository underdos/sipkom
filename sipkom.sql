-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2016 at 11:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `kode` varchar(3) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat_cabang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode`, `nama_cabang`, `alamat_cabang`) VALUES
('001', 'JAKARTA BARAT', 'Jl. Raya Duri Kosambi No.36-37 Kel.Duri Kosambi, Cengkareng'),
('002', 'JAKARTA UTARA', 'Jl. Cempaka No.2 Tanjung Priok'),
('004', 'JAKARTA SELATAN', 'Jalan Ciputat Raya No.2 Pondok Pinang'),
('005', 'BOGOR', 'Jl. Ir. H. Juanda No.64'),
('007', 'SEMARANG BARAT', 'Puri Anjasmoro Blok H-5 No. 3'),
('008', 'SOLO', 'Jl. Lubuk Sikaran No.20'),
('009', 'YOGYAKARTA', 'Jl. Panembahan Senopati No.20'),
('010', 'SURABAYA TIMUR', 'Jl. Bukit Darmo Golf No. 1'),
('011', 'TANGERANG', 'Jl. Satria Sudirman Komplek Perkantoran?Kota Tang'),
('012', 'DENPASAR TIMUR', 'Jl.Raya Puputan No.29 Renon'),
('013', 'PEMATANG SIANTAR', 'Jl. Sisingamangaraja No.79'),
('014', 'MEDAN TIMUR', 'Jl. P. Diponegoro No. 30A GKN I Lt. II'),
('015', 'PALEMBANG BARAT', 'Jl. Kapten A. Rivai No.10'),
('016', 'CIREBON', 'Jl. Evakuasi No.9'),
('017', 'PADANG', 'Jl. Kenanga No.99'),
('018', 'MALANG TIMUR', 'Jl. Panji Suroso'),
('019', 'TASIKMALAYA', 'Jl. Sutisna Senjaya No.154'),
('020', 'PURWOKERTO', 'Jl. Gerilya No. 567'),
('023', 'BANDAR LAMPUNG', 'Jl. Dr. Susilo No.19 BDL'),
('024', 'JAMBI', 'Jl. Mayjen.Yusuf Singadekane No.46'),
('025', 'JAKARTA PUSAT', 'Jl. Gunung Sahari Raya No.25'),
('026', 'MEDAN BARAT', 'Jl. Asrama No.7-A'),
('027', 'MANADO', 'Jl. Gunung Klabat'),
('028', 'SURABAYA BARAT', 'Jl. Jagir Wonokromo No. 104'),
('029', 'MAKASAR TIMUR', 'Jl. Sudirman No.54 B'),
('030', 'JEMBER', 'Jl.Karimata 54 A?'),
('031', 'PEKANBARU', 'Jl.MR.SM Amin, Ring Road Arengka II?'),
('032', 'BALIKPAPAN', 'Jl. Kapten Piere Tendean No.30'),
('033', 'BANDA ACEH', 'Jl. Tgk. H. M. Daud Beureueh No.20'),
('035', 'MATARAM LOMBOK', 'Jl. Raya Langko No. 74'),
('036', 'PONTIANAK', 'Jl. Sultan Abdurachman No.1'),
('037', 'BANJARMASIN', 'Jl. Lambung Mangkurat No.46'),
('038', 'BEKASI', 'Jl. MH. Thamrin Kav. 107'),
('040', 'SAMARINDA', 'Jl. MT. Haryono No.17 '),
('041', 'KALIBATA', 'Jl. Raya Pasar Minggu Kav. 34'),
('043', 'SIDOARJO', 'Jl. Raya Juanda, Semambung'),
('044', 'BANDUNG BARAT', 'Jl. Soekarno Hatta No. 781'),
('046', 'SEMARANG TIMUR', 'Jl. Ki Mangun Sarkoro No.34'),
('049', 'KEDIRI', 'Jl. Brawijaya No.6'),
('053', 'PALEMBANG TIMUR', 'Jl. Kapten A. Rivai No.4'),
('054', 'BUKIT TINGGI', 'Jl. Prof. M. Yamin No.60 Aur Kuning'),
('055', 'BATAM', 'Jl. Kuda Laut No. 1 Batu Ampar'),
('056', 'MAKASAR BARAT', 'Jl. Balaikota no.15'),
('059', 'CIMAHI', 'Jl. Raya Barat No.574 Kotak Pos 112'),
('060', 'BENGKULU', 'Jl. Pembangunan No.6 PO BOX-59'),
('061', 'RANTAU PRAPAT', 'Jl. Ahmad Yani No. 56'),
('063', 'DUMAI', 'Jl. Sultan Syarif Qasim No. 18'),
('065', 'MADIUN', 'Jl. D.I Panjaitan No.4'),
('067', 'PALU', 'Jl. Prof. Moh. Yamin No.94'),
('068', 'GORONTALO', 'Jl. Arif Rahman Hakim?'),
('070', 'TARAKAN', 'Jl. Jend. Sudirman No.104'),
('071', 'BANGKA', 'Jl. Kapten A. Rivai No.4?'),
('073', 'SINTANG', 'Jl. Apang Semangai No.61'),
('074', 'KENDARI', 'Jl. Saranani?kel. Wua-Wua No. 188'),
('075', 'BANDUNG POE', 'Jl. Asia Afrika No.114?');

-- --------------------------------------------------------

--
-- Stand-in structure for view `komisi`
--
CREATE TABLE IF NOT EXISTS `komisi` (
`tanggal_so` date
,`no_so` varchar(10)
,`no_nis_sales` varchar(10)
,`nama_sales` varchar(100)
,`quantity` int(2)
,`no_seri_produk` varchar(10)
,`nama_produk` varchar(50)
,`persentase` double
,`harga` int(10)
,`komisi` double
,`cabang` varchar(3)
);
-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no_so` varchar(10) NOT NULL,
  `tanggal_so` date NOT NULL,
  `no_seri_produk` varchar(10) NOT NULL,
  `no_nis_sales` varchar(10) NOT NULL,
  `quantity` int(2) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat_customer` text NOT NULL,
  `telp_customer` varchar(15) NOT NULL,
  `cabang` varchar(3) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_so`, `tanggal_so`, `no_seri_produk`, `no_nis_sales`, `quantity`, `nama_customer`, `alamat_customer`, `telp_customer`, `cabang`, `status`) VALUES
('001001', '2015-01-01', '0120112015', '01020920', 1, 'Makmur Mustakim.SH.H, Bp', 'Jl. Tatehe No. 62 Kel. Apengsembeka Tahuna', '085700816430', '001', 'approve'),
('001002', '2015-01-01', '0120112015', '01060365', 1, 'A. M. Idrus, Bp', 'Gd. Graha Sucofindo Lt. II-IV Jl. Achmad Yani No.106', '087700845301', '001', 'approve'),
('001003', '2015-01-01', '0120112016', '01020920', 2, 'A.Fatimah Mustaman.MM.Dra, Ny', 'Jl. Achmad Yani No.6', '089800809955', '001', 'approve'),
('001004', '2015-01-01', '0120112018', '01060365', 1, 'Firdaus,Bp', 'Jl. Jend. Sudriman No. 81', '084800705043', '001', 'approve'),
('001005', '2015-01-01', '0120112018', '01020920', 1, 'Hj. Basri, Ny', 'Jl. Pangsuma No. 35?', '088800859313', '001', 'approve'),
('001006', '2015-01-01', '0120112015', '01060365', 1, 'Kasmiati, Ny', 'Jl. Soekarno Hatta No.117', '085700843418', '001', 'approve'),
('002001', '2015-01-01', '0120112015', '02020926', 1, 'A. Dachri. A.Mappidjeppu,Bp', 'Jl. Teuku Umar No. 3 Pasir Putih?', '088800772387', '002', 'approve'),
('002002', '2015-01-01', '0120112018', '02020442', 1, 'A. Muh. Ali, Bp', 'Gedung GKN I Jl. Indrapura No. 5', '084800924558', '002', 'approve'),
('002003', '2015-01-01', '0120112015', '02020926', 1, 'Asdar, Bp', 'Jl. Diponegoro 163', '085700876407', '002', 'approve'),
('002004', '2015-01-01', '0120112018', '02020442', 1, 'Fitri,Ny', 'Jl. Kenanga No.99', '084800720531', '002', 'approve'),
('002005', '2015-01-01', '0120112018', '02020926', 1, 'Hj. Darwati DG Ranga, Ny', 'Jl. Perintis Kemerdekaan No.62', '084800920873', '002', 'approve'),
('002006', '2015-01-02', '0120112017', '02020442', 1, 'Abd. Kadir, Prof, Hj, Ny', 'Jl. Benteng Kapaha No.3', '085800597964', '002', 'approve'),
('004001', '2015-01-01', '0120112018', '04020931', 1, 'A. Darwis, Bp', 'Jl. Teuku Umar No.17', '084800847181', '004', 'approve'),
('004002', '2015-01-01', '0120112017', '04030224', 1, 'A. Muh. Idrus, Bp', 'Gedung Probes Jl. Gunung Sahari Raya No.25?', '085800846438', '004', 'approve'),
('004003', '2015-01-01', '0120112015', '04020931', 1, 'ASMA, NY', 'Jl. Evakuasi No.9', '085700800130', '004', 'approve'),
('004004', '2015-01-01', '0120112016', '04030224', 1, 'Fitriani/Yanto, Ny/Bp', 'Jl. Kwini No.7', '089800787120', '004', 'approve'),
('004005', '2015-01-01', '0120112016', '04020931', 1, 'Hj. Fatmawati, Ny', 'Jl. Prof. M. Yamin', '089800864996', '004', 'approve'),
('004006', '2015-01-27', '0120112017', '04030224', 1, 'Lili, Ny', 'Jl. Bethesda No.24', '085800911957', '004', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `no_seri` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`no_seri`, `nama_produk`, `harga`, `persentase`) VALUES
('0120112015', 'Mesin Cuci (WH)', 8000000, 5.5),
('0120112016', 'Vacum Cleaner', 4000000, 6),
('0120112017', 'Air Purify', 6000000, 4),
('0120112018', 'Water POE', 10000000, 8.1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `nis` varchar(10) NOT NULL,
  `nama_sales` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `cabang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`nis`, `nama_sales`, `alamat`, `telp`, `cabang`) VALUES
('01020920', 'M.RIZA WISNU.B', 'Dusun Pudatte No. 85, desa Juppandang kec. Enrekang', '087801020920', '001'),
('01060365', 'HOTMAN MALAU', 'Jalan Jend. Sudirman Kav.56', '075801060365', '001'),
('02020442', 'ABU SOFYAN', 'Jalan T.B. Simatupang Kav.5 Kebagusan', '089802020442', '002'),
('02020926', 'FITRIYATUN', 'Gedung Graha Niaga II Lt.3-6, Jl. Putri Hijau No. 20', '075801020926', '002'),
('04020931', 'EDI SANTOSO', 'Jababeka Education Park Jl. Ki Hajar Dewantara Kav. 7, Cikarang Baru', '088801020931', '004'),
('04030224', 'PARADAMEAN', 'Jl Tebet Raya no 9', '091602030224', '004');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nip` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `cabang` varchar(3) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama`, `username`, `password`, `jabatan`, `cabang`, `level`) VALUES
(11470009, 'Sri Indrawati', 'iin@lux', '123456', 'kasir', '002', 5),
(23470012, 'Sri Mulyani', 'sri@lux', '123456', 'kasir', '001', 5),
(64440006, 'Supriyanto', 'supriyanto@lux', '123456', 'bc', '004', 4),
(81440006, 'Thio Irawan Setiawan', 'thio@lux', '123456', 'bc', '002', 4),
(82450007, 'Haryadi', 'haryadi@lux', '123456', 'staff accounting', '000', 2),
(82450009, 'Abdul Aziz', 'abdul@lux', '123456', 'staff ccc', '000', 3),
(82450089, 'Kusnadi', 'kusnadi@lux', '123456', 'admin', '000', 1),
(85320010, 'Darwin Silalahi', 'darwin@lux', '123456', 'bc', '001', 4),
(87470014, 'Anna Vitria', 'anna@lux', '123456', 'kasir', '004', 5);

-- --------------------------------------------------------

--
-- Structure for view `komisi`
--
DROP TABLE IF EXISTS `komisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `komisi` AS select `penjualan`.`tanggal_so` AS `tanggal_so`,`penjualan`.`no_so` AS `no_so`,`penjualan`.`no_nis_sales` AS `no_nis_sales`,`sales`.`nama_sales` AS `nama_sales`,`penjualan`.`quantity` AS `quantity`,`penjualan`.`no_seri_produk` AS `no_seri_produk`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`persentase` AS `persentase`,`produk`.`harga` AS `harga`,(((`produk`.`persentase` * `produk`.`harga`) / 100) * `penjualan`.`quantity`) AS `komisi`,`penjualan`.`cabang` AS `cabang` from ((`penjualan` join `produk`) join `sales`) where ((`penjualan`.`status` = 'approve') and (`produk`.`no_seri` = `penjualan`.`no_seri_produk`) and (`sales`.`nis` = `penjualan`.`no_nis_sales`)) order by `penjualan`.`no_nis_sales`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`no_so`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
