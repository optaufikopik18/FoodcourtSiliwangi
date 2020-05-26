-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 05:24 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembelian`
--

CREATE TABLE `tb_detail_pembelian` (
  `id_order` varchar(25) NOT NULL,
  `id_makanan` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`id_order`, `id_makanan`, `harga`, `kuantitas`, `total`) VALUES
('1', 'M-002', 10000, 8, 80000),
('2', 'M-002', 10000, 4, 40000),
('3', 'M-002', 10000, 9, 90000),
('4', 'M-002', 10000, 6, 60000),
('4', 'M-004', 12000, 4, 48000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kios`
--

CREATE TABLE `tb_kios` (
  `id_kios` varchar(20) NOT NULL,
  `nama_kios` varchar(50) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `hp_kios` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kios`
--

INSERT INTO `tb_kios` (`id_kios`, `nama_kios`, `id_petugas`, `nama`, `hp_kios`) VALUES
('K-001', 'Drink Bar                                         ', 'PT-002', 'Taufik', '089530979227'),
('K-002', 'Asian Food                                        ', 'PT-003', 'Irsan               ', '089530979227'),
('K-003', 'Dapur Cenghar                                     ', 'PT-004', 'Riki                ', '089530979227'),
('K-004', 'Sarimanis                                         ', 'PT-006', 'Dewi                ', '089530979227'),
('K-005', 'Full Hopper                                       ', 'PT-007', 'Sri mulyani         ', '089530979227'),
('K-006', 'Baper                                            ', 'PT-008', 'Siti                ', '089530979227'),
('K-007', 'Pawon Jawa                                        ', 'PT-009', 'Amelia Habsyah      ', '089530979227');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menumakanan`
--

CREATE TABLE `tb_menumakanan` (
  `id_makanan` varchar(20) NOT NULL,
  `id_kios` varchar(20) NOT NULL,
  `nama_kios` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Ada','Habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menumakanan`
--

INSERT INTO `tb_menumakanan` (`id_makanan`, `id_kios`, `nama_kios`, `foto`, `nama_makanan`, `kategori`, `harga`, `status`) VALUES
('M-002', 'K-001', 'Drink Bar', 'jus-apel.png', 'Jus Apel', 'Minuman', 10000, 'Ada'),
('M-003', 'K-001', 'Drink Bar', 'jus-melon.jpg', 'Jus Melon', 'Minuman', 13000, 'Habis'),
('M-004', 'K-001', 'Drink Bar                                         ', 'Jus-Alpukat.png', 'Jus Alpukat', 'Minuman', 12000, 'Ada'),
('M-005', 'K-001', 'Drink Bar                                         ', 'blue.jpg', 'Blue Sky Ice', 'Minuman', 15000, 'Ada'),
('M-006', 'K-001', 'Drink Bar                                         ', 'jeruk.jpg', 'Es Jeruk', 'Minuman', 9000, 'Ada'),
('M-007', 'K-001', 'Drink Bar                                         ', 'strawbery.jpg', 'Jus Strawbery', 'Minuman', 10000, 'Ada'),
('M-008', 'K-001', 'Drink Bar                                         ', 'jus-mangga.jpg', 'Jus Mangga', 'Minuman', 10000, 'Ada'),
('M-009', 'K-001', 'Drink Bar                                         ', 'Vanilla Milkshake.jpg', 'Vanila Milkshake', 'Minuman', 15000, 'Ada'),
('M-010', 'K-001', 'Drink Bar                                         ', 'choco.jpg', 'Ice Chocolate', 'Minuman', 13000, 'Ada'),
('M-011', 'K-001', 'Drink Bar                                         ', 'mojito.jpg', 'Mojito', 'Minuman', 12000, 'Habis'),
('M-012', 'K-002', 'Asian Food                                        ', 'ciken.jpg', 'Chicken Bistik', 'Makanan', 20000, 'Ada'),
('M-013', 'K-002', 'Asian Food                                        ', 'seafod.jpg', 'Sea Food Fried Kwetiau', 'Makanan', 17000, 'Ada'),
('M-014', 'K-002', 'Asian Food                                        ', 'cikennodel.jpg', 'Chicken Fried noodles', 'Makanan', 16500, 'Ada'),
('M-015', 'K-002', 'Asian Food                                        ', 'steak.jpg', 'Sirloin Steak', 'Makanan', 30000, 'Ada'),
('M-016', 'K-002', 'Asian Food                                        ', 'tenderloin.jpg', 'Tenderloin Steak', 'Makanan', 35000, 'Ada'),
('M-017', 'K-002', 'Asian Food                                        ', 'Chicken-Katsu.jpg', 'Chicken Katsu', 'Makanan', 25000, 'Ada'),
('M-018', 'K-002', 'Asian Food                                        ', 'chickenbleu.jpg', 'Chicken Cordon Bleu', 'Makanan', 25000, 'Ada'),
('M-019', 'K-002', 'Asian Food                                        ', 'aglio.jpg', 'Spaghetti Aglio Olio', 'Makanan', 20000, 'Ada'),
('M-020', 'K-002', 'Asian Food                                        ', 'carbonara.jpg', 'Spaghetti Carbonara', 'Makanan', 20000, 'Ada'),
('M-021', 'K-002', 'Asian Food                                        ', 'kentang.jpg', 'Kentang Sosis', 'Makanan', 15000, 'Habis'),
('M-022', 'K-003', 'Dapur Cenghar                                     ', 'cireng.jpg', 'Cireng Merecon', 'Makanan', 8000, 'Habis'),
('M-023', 'K-003', 'Dapur Cenghar                                     ', 'otakotak.jpg', 'Otak Otak TUlang', 'Makanan', 14000, 'Ada'),
('M-024', 'K-003', 'Dapur Cenghar                                     ', 'lumpia4.jpg', 'Lumpia', 'Makanan', 10000, 'Ada'),
('M-025', 'K-003', 'Dapur Cenghar                                     ', 'kwetiautulang.jpg', 'Kwetiau Tulang', 'Makanan', 15000, 'Ada'),
('M-026', 'K-003', 'Dapur Cenghar                                     ', 'kwetiausiram.jpg', 'Kwetiau Siram', 'Makanan', 15000, 'Ada'),
('M-027', 'K-004', 'Sarimanis                                         ', 'ayamkol.jpg', 'Ayam Kol Goreng', 'Makanan', 15000, 'Ada'),
('M-028', 'K-004', 'Sarimanis                                         ', 'nasiayam.jpg', 'Nasi ayam', 'Makanan', 25000, 'Ada'),
('M-029', 'K-004', 'Sarimanis                                         ', 'sotobabat.jpg', 'Soto Babat', 'Makanan', 17500, 'Habis'),
('M-030', 'K-004', 'Sarimanis                                         ', 'sop-iga-bakar.JPG', 'Sop Iga Bakar', 'Makanan', 25000, 'Ada'),
('M-031', 'K-004', 'Sarimanis                                         ', 'sopdengkul.jpg', 'Sop Dengkul', 'Makanan', 25000, 'Ada'),
('M-032', 'K-004', 'Sarimanis                                         ', 'sotoayam.jpg', 'Soto Ayam', 'Makanan', 20000, 'Ada'),
('M-033', 'K-005', 'Full Hopper                                       ', 'expresso.jpg', 'Espresso', 'Minuman', 15000, 'Ada'),
('M-034', 'K-005', 'Full Hopper                                       ', 'mocacino.png', 'Mochaccino', 'Minuman', 15000, 'Ada'),
('M-035', 'K-005', 'Full Hopper                                       ', 'capucino.jpg', 'Cappuccino', 'Minuman', 15000, 'Ada'),
('M-036', 'K-005', 'Full Hopper                                       ', '17BRD_BEV_12_CaffeLatte_FA_LARGE.png', 'Coffee Late', 'Minuman', 15000, 'Ada'),
('M-037', 'K-005', 'Full Hopper                                       ', 'Green-Tea-Latte.jpg', 'Green Tea Latte', 'Minuman', 17000, 'Ada'),
('M-038', 'K-005', 'Full Hopper                                       ', 'vietnamese coffee drip.jpg', 'Coffee Vietnam', 'Minuman', 12000, 'Ada'),
('M-039', 'K-005', 'Full Hopper                                       ', 'images.jpg', 'Coffee Luwak', 'Minuman', 30000, 'Ada'),
('M-040', 'K-005', 'Full Hopper                                       ', 'mojitocofee.jpg', 'Mojito Coffee', 'Minuman', 15000, 'Habis'),
('M-041', 'K-006', 'Baper                                            ', 'steakayam.jpg', 'Steak Ayam', 'Makanan', 22000, 'Ada'),
('M-042', 'K-006', 'Baper                                            ', 'seblak.jpg', 'Seblak', 'Makanan', 10000, 'Ada'),
('M-043', 'K-006', 'Baper                                            ', 'kentanggoreng.jpeg', 'French Fries', 'Makanan', 13000, 'Ada'),
('M-044', 'K-006', 'Baper                                            ', 'sosis bakar.jpg', 'Sosis Bakar', 'Makanan', 15000, 'Ada'),
('M-045', 'K-006', 'Baper                                            ', 'omlet.jpg', 'Omlet', 'Makanan', 15000, 'Habis'),
('M-046', 'K-006', 'Baper                                            ', 'Burger Ramen.jpg', 'Mie Burger', 'Makanan', 15000, 'Ada'),
('M-047', 'K-006', 'Baper                                            ', 'martabak.JPG', 'Martabak', 'Makanan', 10000, 'Ada'),
('M-048', 'K-006', 'Baper                                            ', 'ramen.jpg', 'Ramen', 'Makanan', 15000, 'Ada'),
('M-049', 'K-007', 'Pawon Jawa                                        ', 'nasi rawon.jpg', 'Nasi Rawon', 'Makanan', 25000, 'Ada'),
('M-050', 'K-007', 'Pawon Jawa                                        ', 'rasamasa-ayam-bakar-Ekavianty-Prajatelistia-korea.jpg', 'Ayam Bakar Bumbu Rujak', 'Makanan', 20000, 'Ada'),
('M-051', 'K-007', 'Pawon Jawa                                        ', 'sotoblora.jpg', 'Nasi Soto Blora', 'Makanan', 16000, 'Ada'),
('M-052', 'K-007', 'Pawon Jawa                                        ', 'tongseng-khas-solo.jpg', 'Nasi Tongseng', 'Makanan', 27000, 'Ada'),
('M-053', 'K-007', 'Pawon Jawa                                        ', 'bakmi.jpg', 'Bakmi Godog', 'Makanan', 15000, 'Ada'),
('M-054', 'K-007', 'Pawon Jawa                                        ', 'bebek bakar.JPG', 'Bebek Pedas Manis', 'Makanan', 25000, 'Ada'),
('M-055', 'K-007', 'Pawon Jawa                                        ', 'batagor-daging.jpg', 'Batagor Kering', 'Makanan', 15000, 'Ada'),
('M-056', 'K-007', 'Pawon Jawa                                        ', 'kedai-mie-cici.jpg', 'Batagor Kuah', 'Makanan', 15000, 'Ada'),
('M-057', 'K-007', 'Pawon Jawa                                        ', 'img_9363.jpg', 'Cuanki', 'Makanan', 8000, 'Habis'),
('M-058', 'K-007', 'Pawon Jawa                                        ', 'basoikan.JPG', 'Baso Ikan', 'Makanan', 8000, 'Habis'),
('M-059', 'K-007', 'Pawon Jawa                                        ', 'pempek.jpg', 'Pempek Palembang', 'Makanan', 17000, 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `tgl_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `uid`, `nama`, `nohp`, `status`, `tgl_pembuatan`) VALUES
('PL-18-0001', '12856246115', 'Tresa Iswara Azhari                               ', '089530979227', 'Aktif', '2018-06-27 14:28:59'),
('PL-18-0002', '240141254115', 'Tegar', '121212121', 'Aktif', '2018-06-25 07:33:44'),
('PL-18-0003', '141317333', 'Taufik', '081323066414', 'Aktif', '2018-06-27 09:36:37'),
('PL-18-0004', '6476249115', 'Narko', '081226591015', 'Aktif', '2018-07-03 04:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_order` varchar(25) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_order`, `id_pelanggan`, `tgl_pembelian`, `jumlah`) VALUES
('1', 'PL-18-0002', '2018-07-03 12:11:51', 80000),
('2', 'PL-18-0002', '2018-07-03 12:19:11', 40000),
('3', 'PL-18-0001', '2018-07-06 08:01:28', 90000),
('4', 'PL-18-0003', '2018-07-09 05:18:49', 108000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('Server','Client') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `id_petugas`, `nama`, `username`, `password`, `hak_akses`, `foto`) VALUES
(6, 'PT-001', 'Tresa Iswara Azhari', 'admin', '123                                            ', 'Server', 'admin.jpg'),
(7, 'PT-001', 'Tresa Iswara Azhari', 'client', '12345', 'Client', 'client.jpg'),
(8, 'PT-005', 'Ridwan', 'admin2                                            ', 'admin                                            ', 'Server', 'user.jpg'),
(10, 'PT-005', 'Ridwan', 'client', 'client', 'Client', 'client.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `hak_akses` enum('Admin','Petugas Kios') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `nohp`, `hak_akses`) VALUES
('PT-001', 'Tresa                                            ', '089530979227', 'Admin'),
('PT-002', 'Taufik', '085530989666', 'Petugas Kios'),
('PT-003', 'Irsan', '085222808919', 'Petugas Kios'),
('PT-004', 'Riki', '085323888999', 'Petugas Kios'),
('PT-005', 'Ridwan', '081212878900', 'Admin'),
('PT-006', 'Dewi', '085555333212', 'Petugas Kios'),
('PT-007', 'Sri mulyani                                       ', '085530989676   ', 'Petugas Kios'),
('PT-008', 'Siti Jamila                                       ', '089530000121   ', 'Petugas Kios'),
('PT-009', 'Amelia Habsyah                                    ', '085323888997   ', 'Petugas Kios');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis` enum('Tarik','Tambah','Belanja') NOT NULL,
  `id_petugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tgl_transaksi`, `id_pelanggan`, `nama`, `saldo`, `nominal`, `jenis`, `id_petugas`) VALUES
('TR01-0001', '2018-06-27 11:01:06', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 10000, 10000, 'Tambah', 'PT-001'),
('TR01-0002', '2018-06-27 11:02:26', 'PL-18-0003', 'Taufik', 50000, 50000, 'Tambah', 'PT-001'),
('TR01-0003', '2018-06-27 11:05:54', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 5000, 5000, 'Tambah', 'PT-001'),
('TR01-0004', '2018-06-27 11:24:47', 'PL-18-0003', 'Taufik', 48000, 8000, 'Tambah', 'PT-001'),
('TR01-0005', '2018-06-27 11:25:12', 'PL-18-0003', 'Taufik', 53000, 5000, 'Tambah', 'PT-001'),
('TR01-0006', '2018-06-27 14:29:34', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 13500, 10000, 'Tambah', 'PT-001'),
('TR01-0007', '2018-07-02 00:21:30', 'PL-18-0003', 'Taufik', 130000, 100000, 'Tambah', 'PT-005'),
('TR01-0008', '2018-07-02 05:34:02', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 63500, 50000, 'Tambah', 'PT-005'),
('TR01-0009', '2018-07-03 04:16:39', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 80000, 20000, 'Tambah', 'PT-005'),
('TR01-0010', '2018-07-03 04:20:27', 'PL-18-0004', 'Narko', 10000, 10000, 'Tambah', 'PT-005'),
('TR01-0011', '2018-07-03 05:15:20', 'PL-18-0003', 'Taufik', 630000, 500000, 'Tambah', 'PT-005'),
('TR01-0012', '2018-07-05 02:11:45', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 165000, 100000, 'Tambah', 'PT-005'),
('TR01-0013', '2018-07-05 02:23:09', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 200000, 40000, 'Tambah', 'PT-005'),
('TR01-0014', '2018-07-06 07:56:29', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 200000, 50000, 'Tambah', 'PT-005'),
('TR01-0015', '2018-07-09 04:57:06', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 60000, 50000, 'Tambah', 'PT-001'),
('TR01-0016', '2018-07-09 04:59:52', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 160000, 100000, 'Tambah', 'PT-001'),
('TR02-0001', '2018-06-27 11:01:28', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 0, 10000, 'Tarik', 'PT-001'),
('TR02-0002', '2018-06-27 11:06:14', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 4500, 500, 'Tarik', 'PT-001'),
('TR02-0003', '2018-06-27 11:06:44', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 3500, 1000, 'Tarik', 'PT-001'),
('TR02-0004', '2018-06-27 11:07:12', 'PL-18-0003', 'Taufik', 49500, 500, 'Tarik', 'PT-001'),
('TR02-0005', '2018-06-27 11:11:16', 'PL-18-0003', 'Taufik', 40500, 9000, 'Tarik', 'PT-001'),
('TR02-0006', '2018-06-27 11:13:42', 'PL-18-0003', 'Taufik', 40000, 500, 'Tarik', 'PT-001'),
('TR02-0007', '2018-06-27 11:25:55', 'PL-18-0003', 'Taufik', 43000, 10000, 'Tarik', 'PT-001'),
('TR02-0008', '2018-06-27 11:26:14', 'PL-18-0003', 'Taufik', 40000, 3000, 'Tarik', 'PT-001'),
('TR02-0009', '2018-06-27 14:56:10', 'PL-18-0003', 'Taufik', 30000, 10000, 'Tarik', 'PT-001'),
('TR02-0010', '2018-07-02 05:39:26', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 60000, 3500, 'Tarik', 'PT-005'),
('TR02-0011', '2018-07-03 04:29:47', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 65000, 15000, 'Tarik', 'PT-005'),
('TR02-0012', '2018-07-03 07:21:38', 'PL-18-0003', 'Taufik', 550000, 80000, 'Belanja', 'PT-001'),
('TR02-0013', '2018-07-05 02:13:36', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 160000, 5000, 'Tarik', 'PT-005'),
('TR02-0014', '2018-07-05 02:14:24', 'PL-18-0003', 'Taufik', 500000, 50000, 'Tarik', 'PT-005'),
('TR02-0015', '2018-07-05 02:25:30', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 150000, 50000, 'Tarik', 'PT-005'),
('TR02-0016', '2018-07-06 07:57:46', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 100000, 100000, 'Tarik', 'PT-005'),
('TR02-0017', '2018-07-06 08:01:28', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 10000, 90000, 'Belanja', 'PT-001'),
('TR02-0018', '2018-07-06 08:01:59', 'PL-18-0001', 'Tresa Iswara Azhari                               ', 10000, 0, 'Belanja', 'PT-001'),
('TR02-0019', '2018-07-09 05:18:49', 'PL-18-0003', 'Taufik', 392000, 108000, 'Belanja', 'PT-001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_makanan` (`id_makanan`);

--
-- Indexes for table `tb_kios`
--
ALTER TABLE `tb_kios`
  ADD PRIMARY KEY (`id_kios`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_menumakanan`
--
ALTER TABLE `tb_menumakanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `id_kios` (`id_kios`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kios`
--
ALTER TABLE `tb_kios`
  ADD CONSTRAINT `tb_kios_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_menumakanan`
--
ALTER TABLE `tb_menumakanan`
  ADD CONSTRAINT `tb_menumakanan_ibfk_1` FOREIGN KEY (`id_kios`) REFERENCES `tb_kios` (`id_kios`);

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
