-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2021 pada 15.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `cust_no` int(11) NOT NULL,
  `nm_cost` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`cust_no`, `nm_cost`, `alamat`) VALUES
(1, 'Bagus', 'Sambungmacan'),
(2, 'Doni', 'Sambungmacan'),
(3, 'Pandu', 'Sragen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_order`
--

CREATE TABLE `invoice_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cust_no` int(11) NOT NULL,
  `nm_cost` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `dibayarkan` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_order`
--

INSERT INTO `invoice_order` (`order_id`, `user_id`, `order_date`, `cust_no`, `nm_cost`, `alamat`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `dibayarkan`, `order_total_amount_due`, `note`) VALUES
(5, 1, '2021-07-30 12:41:44', 0, 'Bagus', '', '50000.00', '0.00', '', 50000.00, '60000.00', '-10000.00', ''),
(8, 1, '2021-08-04 12:20:03', 0, 'Bagus', '', '1000000.00', '0.00', '', 1000000.00, '0.00', '1000000.00', ''),
(9, 1, '2021-08-04 12:34:07', 0, 'Bagus', '', '10000000.00', '0.00', '', 10000000.00, '0.00', '10000000.00', ''),
(12, 1, '2021-08-04 12:40:28', 0, 'deni', '', '10000000.00', '0.00', '', 10000000.00, '90.00', '9999910.00', ''),
(15, 1, '2021-08-04 12:47:44', 0, 'Doni', '', '7000000.00', '0.00', '', 7000000.00, '700.00', '6999300.00', ''),
(16, 1, '2021-08-04 12:49:25', 0, 'geri', '', '70000000.00', '0.00', '', 70000000.00, '8.00', '69999992.00', ''),
(17, 1, '2021-08-04 13:00:04', 0, 'ruli', '', '5000000.00', '0.00', '', 5000000.00, '10000000.00', '-5000000.00', ''),
(20, 1, '2021-08-04 13:31:32', 0, 'Doni', '', '5000000.00', '0.00', '', 5000000.00, '99999999.99', '-99999999.99', ''),
(21, 1, '2021-08-04 13:37:44', 0, 'Doni', '', '3500000.00', '0.00', '', 3500000.00, '0.00', '3500000.00', ''),
(22, 1, '2021-08-04 14:31:48', 0, 'Doni', '', '280000.00', '0.00', '', 280000.00, '1000000.00', '-720000.00', ''),
(23, 1, '2021-08-07 15:16:11', 0, 'Bagus', '', '250000.00', '0.00', '', 250000.00, '5000000.00', '-4750000.00', ''),
(24, 1, '2021-08-13 13:06:57', 0, 'Pandu', '', '600000.00', '0.00', '', 600000.00, '5000000.00', '-4400000.00', ''),
(25, 1, '2021-08-13 13:09:17', 0, 'dani', '', '150000.00', '0.00', '', 150000.00, '1000000.00', '-850000.00', ''),
(26, 1, '2021-08-13 13:12:56', 0, 'Pandu', '', '50000.00', '0.00', '', 50000.00, '1000000.00', '-950000.00', ''),
(27, 1, '2021-08-13 14:06:49', 0, 'Pandu', '', '100000.00', '0.00', '', 100000.00, '1000000.00', '-900000.00', ''),
(28, 1, '2021-08-13 14:11:28', 0, 'Pandu', '', '100000.00', '0.00', '', 100000.00, '1000000.00', '-900000.00', ''),
(29, 1, '2021-08-13 14:15:46', 0, 'Pandu', '', '150000.00', '0.00', '', 150000.00, '1000000.00', '-850000.00', ''),
(30, 1, '2021-08-19 12:55:51', 0, 'dian', '', '140000.00', '0.00', '', 140000.00, '1000000.00', '-860000.00', ''),
(31, 1, '2021-08-19 12:57:28', 0, 'dian', '', '150000.00', '0.00', '', 150000.00, '1000000.00', '-850000.00', ''),
(32, 0, '2021-08-24 13:40:32', 0, 'Doni', '', '100000.00', '0.00', '', 100000.00, '1000000.00', '-900000.00', ''),
(34, 1, '2021-08-28 16:21:10', 0, 'Pandu', '', '325000.00', '0.00', '', 325000.00, '400000.00', '-75000.00', ''),
(35, 1, '2021-08-30 13:52:25', 0, 'deka', '', '100000.00', '0.00', '', 100000.00, '100000.00', '0.00', ''),
(36, 1, '2021-09-04 03:25:12', 0, 'adi', '', '26000.00', '0.00', '', 26000.00, '30000.00', '-4000.00', ''),
(37, 1, '2021-09-05 03:38:22', 0, 'Budi', '', '39900.00', '0.00', '', 39900.00, '40000.00', '-100.00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_order_item`
--

CREATE TABLE `invoice_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `kd_barang` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_item_id`, `order_id`, `kd_barang`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(13, 5, 'BRG004', 'Beras Ramos', '5.00', '10000.00', '50000.00'),
(16, 8, 'BRG005', 'Gelas Atom', '100.00', '10000.00', '1000000.00'),
(17, 22, 'BRG001', 'Sabun Lifeboy', '5.00', '50000.00', '250000.00'),
(18, 22, 'BRG004', 'Beras Ramos', '3.00', '10000.00', '30000.00'),
(19, 23, 'BRG002', 'Beras Pulen', '10.00', '25000.00', '250000.00'),
(22, 24, 'BRG001', 'Sabun Lifeboy', '12.00', '50000.00', '600000.00'),
(23, 25, 'BRG005', 'Gelas Atom', '15.00', '10000.00', '150000.00'),
(24, 26, 'BRG005', 'Gelas Atom', '5.00', '10000.00', '50000.00'),
(25, 27, 'BRG005', 'Gelas Atom', '10.00', '10000.00', '100000.00'),
(26, 28, 'BRG005', 'Gelas Atom', '10.00', '10000.00', '100000.00'),
(27, 29, 'BRG005', 'Gelas Atom', '15.00', '10000.00', '150000.00'),
(28, 30, 'BRG005', 'Gelas Atom', '9.00', '10000.00', '90000.00'),
(29, 31, 'BRG005', 'Gelas Atom', '7.00', '10000.00', '70000.00'),
(30, 31, 'BRG004', 'Beras Ramos', '8.00', '10000.00', '80000.00'),
(31, 32, 'BRG005', 'Gelas Atom', '10.00', '10000.00', '100000.00'),
(39, 33, 'BRG002', 'Beras Pulen', '5000.00', '25000.00', '99999999.99'),
(40, 34, 'BRG002', 'Beras Pulen', '13.00', '25000.00', '325000.00'),
(45, 0, '4', 'Beras Ramos', '3.00', '10000.00', '30000.00'),
(46, 35, '4', 'Beras Ramos', '10.00', '10000.00', '100000.00'),
(47, 36, '7', 'kantong plastik', '10.00', '2000.00', '20000.00'),
(48, 36, '8', 'gelas plastik', '5.00', '1200.00', '6000.00'),
(49, 37, '9', 'Waskom Plastik', '5.00', '2300.00', '11500.00'),
(50, 37, '11', 'plastik ctik', '10.00', '2000.00', '20000.00'),
(51, 37, '8', 'gelas plastik', '7.00', '1200.00', '8400.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_user`
--

CREATE TABLE `invoice_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'user',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_user`
--

INSERT INTO `invoice_user` (`user_id`, `username`, `password`, `level`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(1, 'admin', '12345', 'user', 'admin', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax1` decimal(10,2) NOT NULL,
  `order_total_tax2` decimal(10,2) NOT NULL,
  `order_total_tax3` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_total_after_tax` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_actual_amount` decimal(10,2) NOT NULL,
  `order_item_tax1_rate` decimal(10,2) NOT NULL,
  `order_item_tax1_amount` decimal(10,2) NOT NULL,
  `order_item_tax2_rate` decimal(10,2) NOT NULL,
  `order_item_tax2_amount` decimal(10,2) NOT NULL,
  `order_item_tax3_rate` decimal(10,2) NOT NULL,
  `order_item_tax3_amount` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` int(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `kd_jns` varchar(10) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `harga_beli` bigint(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nm_barang`, `kd_jns`, `harga`, `harga_beli`, `stok`, `updated_at`) VALUES
(5, 'Gelas Atom', 'Gelas', 10000, 8000, 44, '2021-07-08 13:49:32'),
(7, 'kantong plastik', 'plastik', 2000, 1300, 40, '2021-09-04 03:23:28'),
(8, 'gelas plastik', 'plastik', 1200, 800, 48, '2021-09-04 03:23:57'),
(9, 'Waskom Plastik', 'Waskom', 2300, 1700, 39, '2021-09-05 03:34:42'),
(10, 'kertas minyak', 'kertas', 4000, 3200, 45, '2021-09-05 03:35:12'),
(11, 'plastik ctik', 'plastik', 2000, 1500, 20, '2021-09-05 03:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'Karyawan',
  `kd_user` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_user`, `nm_user`, `level`, `kd_user`, `password`) VALUES
(1, 'Administrator', 'Admin', 'A001', '202cb962ac59075b964b07152d234b70'),
(3, 'Budi', 'Karyawan', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `order_no` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `item` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`order_no`, `tgl_order`, `item`, `harga`, `jumlah`, `total`) VALUES
(1, '2021-07-05 15:22:57', '', 0, 0, 0),
(2, '2021-07-05 15:23:14', 'Beras', 10000, 4, 0),
(3, '2021-07-05 15:27:35', 'Gula', 35000, 33, 0),
(4, '2021-07-05 15:27:46', 'Gula', 0, 0, 0),
(5, '2021-07-05 15:28:29', '', 0, 0, 0),
(6, '2021-07-05 15:30:36', 'Garam', 10000, 4, 0),
(7, '2021-07-05 15:35:47', 'Garam', 10000, 33, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `nota` int(10) NOT NULL,
  `tgl` datetime NOT NULL,
  `kd_user` varchar(20) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`nota`, `tgl`, `kd_user`, `kd_barang`, `total`) VALUES
(16, '2021-04-13 21:55:03', '', 'BRG002', 50000),
(17, '2021-04-13 22:03:49', '', 'BRG001', 200000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indeks untuk tabel `invoice_order`
--
ALTER TABLE `invoice_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indeks untuk tabel `invoice_user`
--
ALTER TABLE `invoice_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`) USING BTREE;

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `kd_user` (`kd_user`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_no`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `kd_barang` (`kd_barang`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `costumer`
--
ALTER TABLE `costumer`
  MODIFY `cust_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoice_order`
--
ALTER TABLE `invoice_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `invoice_user`
--
ALTER TABLE `invoice_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kd_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
