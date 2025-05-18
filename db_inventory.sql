-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2025 pada 16.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL DEFAULT '',
  `jumlah_barang` int(10) NOT NULL DEFAULT 0,
  `satuan_barang` varchar(20) NOT NULL DEFAULT '0',
  `harga_beli` double(20,2) NOT NULL DEFAULT 0.00,
  `status_barang` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_inventory`
--

INSERT INTO `tb_inventory` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
(1, 'BRG001', 'Kabel HDMI', 20, 'pcs', 25000.00, 1),
(2, 'BRG002', 'Mouse Wireless', 50, 'pcs', 50000.00, 1),
(3, 'BRG003', 'Keyboard Mechanical', 15, 'pcs', 200000.00, 1),
(4, 'BRG004', 'Adaptor Charger', 0, 'pcs', 20000.00, 0),
(5, 'BRG005', 'Flashdisk 128Gb', 0, 'pcs', 120000.00, 0),
(6, 'BRG006', 'Monitor 24 inch', 3, 'unit', 1500000.00, 1),
(7, 'BRG007', 'Speaker Bluetooth', 5, 'pcs', 100000.00, 0),
(8, 'BRG008', 'Webcam Logitech', 5, 'pcs', 1000000.00, 1),
(9, 'BRG009', 'Earphone Wireless', 0, 'pcs', 125000.00, 0),
(10, 'BRG010', 'Kabel Data', 10, 'pcs', 75000.00, 1),
(11, 'BRG011', 'Kabel Lan 10m', 10, 'meter', 50000.00, 0),
(12, 'BRG012', 'Harddisk Eksternal 1TB', 0, 'pcs', 700000.00, 0),
(13, 'BRG013', 'Printer Epson', 1, 'unit', 800000.00, 1),
(14, 'BRG014', 'Tinta Printer', 6, 'pcs', 75000.00, 1),
(15, 'BRG015', 'Kertas A4', 0, 'rim', 100000.00, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
