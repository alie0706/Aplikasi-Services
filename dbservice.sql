-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Sep 2022 pada 11.02
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbservice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_log`
--

CREATE TABLE `history_log` (
  `id_log` int(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `recmod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_barang`
--

CREATE TABLE `log_barang` (
  `id_log` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `id_user` int(2) NOT NULL,
  `insert_at` datetime NOT NULL,
  `recmod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `id_barang` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL,
  `id_jenis_obat` int(5) NOT NULL,
  `id_konektor` int(5) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:tidak aktif, 1:aktif',
  `qr_code` varchar(50) NOT NULL,
  `insert_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id_barang`, `id_kategori`, `id_jenis`, `id_merk`, `id_jenis_obat`, `id_konektor`, `kd_barang`, `nama_barang`, `keterangan`, `stok`, `harga`, `status`, `qr_code`, `insert_at`) VALUES
(23, 4, 3, 2, 1, 1, '4020101010001', 'Test Penion', 'test penion', 8, 0, 1, '4020101010001.png', '0000-00-00 00:00:00'),
(24, 5, 5, 0, 0, 0, '5010001', 'Test 2', 'hjhjhk', 6, 0, 1, '5010001.png', '0000-00-00 00:00:00'),
(25, 4, 3, 2, 1, 0, '40201010001', 'C Test', 'hghjg', 7, 0, 1, '40201010001.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang_stok`
--

CREATE TABLE `m_barang_stok` (
  `id_stok` int(11) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `stok` int(3) NOT NULL,
  `insert_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_customer`
--

CREATE TABLE `m_customer` (
  `id_customer` int(5) NOT NULL,
  `kd_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` text NOT NULL,
  `tlp_customer` varchar(15) NOT NULL,
  `email_customer` varchar(25) NOT NULL,
  `pic_customer` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:tidak aktif, 1:aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_customer`
--

INSERT INTO `m_customer` (`id_customer`, `kd_customer`, `nama_customer`, `alamat_customer`, `tlp_customer`, `email_customer`, `pic_customer`, `status`) VALUES
(1, 'KS-001', 'Customer 1', 'Jl. customer 1', '86767686', 'customer1@yajoo.com', 'test', 1),
(2, 'KS-002', 'Customer 222', 'Jl. customer 2', '45678978', 'customer2@yajoo.com', 'jaja cust', 1),
(3, 'KS-003', 'ghghjgjgdsf', 'gghghj', '8987879', 'hghg@yahoo.com', 'jhjhjk', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_customer_alat`
--

CREATE TABLE `m_customer_alat` (
  `id_customer_alat` int(10) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `kd_customer_alat` varchar(15) NOT NULL,
  `nama_customer_alat` varchar(25) NOT NULL,
  `keterangan_customer_alat` text NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_customer_alat`
--

INSERT INTO `m_customer_alat` (`id_customer_alat`, `id_customer`, `kd_customer_alat`, `nama_customer_alat`, `keterangan_customer_alat`, `qr_code`) VALUES
(1, 1, 'ALT001', 'Alat 11', 'Ket alat 2', '1-ALT001.png'),
(2, 1, 'ALT002', 'Alat 2', 'Ket alat 2', '1-ALT002.png'),
(3, 2, 'ALT003', 'Alat 3', 'Ket Alat 3', ''),
(4, 1, 'ALT004', 'Test Alat', 'jjhjh', '1-ALT004.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis`
--

CREATE TABLE `m_jenis` (
  `id_jenis` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `kd_jenis` varchar(2) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jenis`
--

INSERT INTO `m_jenis` (`id_jenis`, `id_kategori`, `kd_jenis`, `nama_jenis`) VALUES
(2, 4, '01', 'Ventilator'),
(3, 4, '02', 'Vaporizer'),
(5, 5, '01', 'Kabel ECG'),
(6, 5, '04', 'Kabel Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_obat`
--

CREATE TABLE `m_jenis_obat` (
  `id_jenis_obat` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `kd_jenis_obat` varchar(5) NOT NULL,
  `nama_jenis_obat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jenis_obat`
--

INSERT INTO `m_jenis_obat` (`id_jenis_obat`, `id_merk`, `id_jenis`, `id_kategori`, `kd_jenis_obat`, `nama_jenis_obat`) VALUES
(1, 2, 3, 4, '01', 'ISO'),
(3, 3, 3, 4, '02', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:tidak aktif, 1:aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `m_kategori`
--

INSERT INTO `m_kategori` (`id_kategori`, `nama_kategori`, `keterangan`, `status`) VALUES
(4, 'Anastesi', 'Anastesi', 1),
(5, 'Monitoring', 'Ket Monitoring', 1),
(6, 'Test', 'Test', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_konektor`
--

CREATE TABLE `m_konektor` (
  `id_konektor` int(5) NOT NULL,
  `id_jenis_obat` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `kd_konektor` varchar(5) NOT NULL,
  `nama_konektor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_konektor`
--

INSERT INTO `m_konektor` (`id_konektor`, `id_jenis_obat`, `id_merk`, `id_jenis`, `id_kategori`, `kd_konektor`, `nama_konektor`) VALUES
(1, 1, 2, 3, 4, '01', 'Selectatec'),
(2, 1, 2, 3, 4, '02', 'Cagemount');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_merk`
--

CREATE TABLE `m_merk` (
  `id_merk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `kd_merk` varchar(3) NOT NULL,
  `nama_merk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_merk`
--

INSERT INTO `m_merk` (`id_merk`, `id_kategori`, `id_jenis`, `kd_merk`, `nama_merk`) VALUES
(2, 4, 3, '01', 'Penion'),
(3, 4, 3, '02', 'Drager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_supplier`
--

CREATE TABLE `m_supplier` (
  `id_supplier` int(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `tlp_supplier` varchar(15) NOT NULL,
  `email_supplier` varchar(25) NOT NULL,
  `pic_supplier` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:tidak aktif, 1:aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_supplier`
--

INSERT INTO `m_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `tlp_supplier`, `email_supplier`, `pic_supplier`, `status`) VALUES
(1, 'PT. ABC', 'Jl. abc', '56756756', 'abcd@yahoo.com', 'Jaja', 1),
(3, 'PT. XYZ', 'Jl. xyz', '876766768', 'xyz@yahoo.com', 'Jojo', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `id_transaksi_keluar` int(10) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_harga` int(15) NOT NULL,
  `biaya_services` int(15) NOT NULL,
  `pajak` int(10) NOT NULL,
  `total_all` int(15) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`id_transaksi_keluar`, `no_transaksi`, `id_customer`, `id_user`, `tgl_transaksi`, `total_harga`, `biaya_services`, `pajak`, `total_all`, `tgl_input`) VALUES
(62, 'TR/20220918/065918', 1, 1, '2022-09-18', 80000, 100000, 0, 180000, '2022-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar_detail`
--

CREATE TABLE `transaksi_keluar_detail` (
  `id_transaksi_keluar_detail` int(10) NOT NULL,
  `id_transaksi_keluar` int(10) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar_detail`
--

INSERT INTO `transaksi_keluar_detail` (`id_transaksi_keluar_detail`, `id_transaksi_keluar`, `id_barang`, `kd_barang`, `qty`, `harga`, `total`, `keterangan`, `tgl_order`) VALUES
(19, 62, 23, '4020101010001', 1, 20000, 20000, '', '2022-09-18'),
(20, 62, 24, '5010001', 2, 30000, 60000, '', '2022-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar_detail_temp`
--

CREATE TABLE `transaksi_keluar_detail_temp` (
  `id_transaksi_keluar_detail` int(10) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_session` varchar(50) NOT NULL,
  `tgl_order_temp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi` int(10) NOT NULL,
  `no_tanda_terima` varchar(25) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi`, `no_tanda_terima`, `id_supplier`, `id_user`, `tgl_terima`, `tgl_input`) VALUES
(34, 'TD/09/2022/0001', 1, 1, '2022-09-18', '2022-09-18'),
(35, 'TD/09/2022/0002', 3, 1, '2022-09-19', '2022-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk_detail`
--

CREATE TABLE `transaksi_masuk_detail` (
  `id_transaksi_detail` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_merk` int(5) NOT NULL,
  `id_jenis_obat` int(5) NOT NULL,
  `id_konektor` int(5) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk_detail`
--

INSERT INTO `transaksi_masuk_detail` (`id_transaksi_detail`, `id_transaksi`, `id_kategori`, `id_jenis`, `id_merk`, `id_jenis_obat`, `id_konektor`, `kd_barang`, `qty`) VALUES
(20, 34, 4, 3, 2, 1, 1, '4020101010001', 5),
(21, 34, 5, 5, 0, 0, 0, '5010001', 8),
(22, 35, 4, 3, 2, 1, 1, '4020101010001', 4),
(23, 35, 4, 3, 2, 1, 0, '40201010001', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_services`
--

CREATE TABLE `transaksi_services` (
  `id_transaksi_services` int(10) NOT NULL,
  `no_services` varchar(25) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `id_customer_alat` int(10) NOT NULL,
  `keluhan_services` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_services`
--

INSERT INTO `transaksi_services` (`id_transaksi_services`, `no_services`, `id_customer`, `id_customer_alat`, `keluhan_services`, `id_user`, `tgl_terima`, `tgl_input`) VALUES
(4, 'TS/09/2022/0001', 1, 1, 'hghgjg', 1, '2022-09-18', '2022-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_services_detail`
--

CREATE TABLE `transaksi_services_detail` (
  `id_transaksi_services_detail` int(10) NOT NULL,
  `id_transaksi_services` int(10) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_services_detail`
--

INSERT INTO `transaksi_services_detail` (`id_transaksi_services_detail`, `id_transaksi_services`, `kd_barang`, `qty`) VALUES
(8, 4, '4020101010001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_tlp`, `level`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', '', 'admin', '2022-09-18'),
(6, 'demo', '44d9771117536544ac58ca3060c69c4c', 'Demo Test', 'demo@indoarsip.co.id', '0854676575', 'admin', '0000-00-00'),
(24, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', '', '', 'user', '2022-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `m_barang_stok`
--
ALTER TABLE `m_barang_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `m_customer_alat`
--
ALTER TABLE `m_customer_alat`
  ADD PRIMARY KEY (`id_customer_alat`);

--
-- Indexes for table `m_jenis`
--
ALTER TABLE `m_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `m_jenis_obat`
--
ALTER TABLE `m_jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `m_konektor`
--
ALTER TABLE `m_konektor`
  ADD PRIMARY KEY (`id_konektor`);

--
-- Indexes for table `m_merk`
--
ALTER TABLE `m_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`);

--
-- Indexes for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  ADD PRIMARY KEY (`id_transaksi_keluar_detail`);

--
-- Indexes for table `transaksi_keluar_detail_temp`
--
ALTER TABLE `transaksi_keluar_detail_temp`
  ADD PRIMARY KEY (`id_transaksi_keluar_detail`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_masuk_detail`
--
ALTER TABLE `transaksi_masuk_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `transaksi_services`
--
ALTER TABLE `transaksi_services`
  ADD PRIMARY KEY (`id_transaksi_services`);

--
-- Indexes for table `transaksi_services_detail`
--
ALTER TABLE `transaksi_services_detail`
  ADD PRIMARY KEY (`id_transaksi_services_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_barang`
--
ALTER TABLE `log_barang`
  MODIFY `id_log` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `m_barang_stok`
--
ALTER TABLE `m_barang_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id_customer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_customer_alat`
--
ALTER TABLE `m_customer_alat`
  MODIFY `id_customer_alat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_jenis`
--
ALTER TABLE `m_jenis`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_jenis_obat`
--
ALTER TABLE `m_jenis_obat`
  MODIFY `id_jenis_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_konektor`
--
ALTER TABLE `m_konektor`
  MODIFY `id_konektor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_merk`
--
ALTER TABLE `m_merk`
  MODIFY `id_merk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  MODIFY `id_transaksi_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  MODIFY `id_transaksi_keluar_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaksi_keluar_detail_temp`
--
ALTER TABLE `transaksi_keluar_detail_temp`
  MODIFY `id_transaksi_keluar_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `transaksi_masuk_detail`
--
ALTER TABLE `transaksi_masuk_detail`
  MODIFY `id_transaksi_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `transaksi_services`
--
ALTER TABLE `transaksi_services`
  MODIFY `id_transaksi_services` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi_services_detail`
--
ALTER TABLE `transaksi_services_detail`
  MODIFY `id_transaksi_services_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
