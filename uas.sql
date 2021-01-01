-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jan 2021 pada 03.35
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15358400_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Ahmad Abu Hasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Bandung', 50000),
(2, 'Semarang', 75000),
(3, 'Surabaya', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `hp_pelanggan` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `hp_pelanggan`, `username`, `password`, `alamat_pelanggan`) VALUES
(1, 'Ahmad Abu Hasan', 'ahmadabuhasan@mhs.stmik-yadika.ac.id', '08123456789', 'user', 'user', ''),
(2, 'Cristiano Ronaldo', 'cristianoronaldo@gmail.com', '08987654321', 'user1', 'user1', ''),
(3, 'Lionel Messi', 'lionelmessi@gmail.com', '08123456789', 'user2', 'user2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'Ahmad Abu Hasan', 'BCA', 900000, '2020-01-01', '20200101175345kecebong.png'),
(2, 2, 'Ahmad Abu Hasan', 'BNI', 975000, '2020-01-01', '20200101175421kecebong.png'),
(3, 3, 'Ahmad Abu Hasan', 'Mandiri', 390000, '2020-01-01', '20200101175455kecebong.png'),
(4, 8, 'Cristiano Ronaldo', 'BCA', 730000, '2020-01-02', '20200102170937kecebong.png'),
(5, 7, 'Cristiano Ronaldo', 'BNI', 440000, '2020-01-02', '20200102171000kecebong.png'),
(6, 6, 'Cristiano Ronaldo', 'Mandiri', 975000, '2020-01-02', '20200102171018kecebong.png'),
(7, 9, 'Lionel Messi', 'BCA', 200000, '2020-01-05', '20200105053428kecebong.png'),
(8, 10, 'Lionel Messi', 'BNI', 165000, '2020-01-05', '20200105053450kecebong.png'),
(9, 11, 'Lionel Messi', 'Mandiri', 130000, '2020-01-05', '20200105053514kecebong.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Menunggu Pembayaran',
  `resi_pengiriman` varchar(50) NOT NULL,
  `tgl_pengiriman` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `tgl_pengiriman`) VALUES
(1, 1, 3, '2020-01-01', 900000, 'Surabaya', 100000, 'Jl. Pahlawan No.110, Kel. Alun-alun Contong, Kec. Bubutan, Kota Surabaya, Jawa Timur 60175', 'Transaksi Selesai', '12345678910', '2020-01-02'),
(2, 1, 2, '2020-01-01', 975000, 'Semarang', 75000, 'Jl. Pahlawan No.9, Kel. Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah 50249', 'Barang Dikirim', '10987654321', '2020-01-02'),
(3, 1, 1, '2020-01-01', 390000, 'Bandung', 50000, 'Jl. Diponegoro No. 22, Kel. Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'Dibayar', '', NULL),
(4, 1, 3, '2020-01-01', 780000, 'Surabaya', 100000, 'Jl. Pahlawan No.110, Kel. Alun-alun Contong, Kec. Bubutan, Kota Surabaya, Jawa Timur 60175', 'Menunggu Pembayaran', '', NULL),
(5, 2, 1, '2020-01-02', 850000, 'Bandung', 50000, 'Jl. Diponegoro No. 22, Kel. Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'Menunggu Pembayaran', '', NULL),
(6, 2, 2, '2020-01-02', 975000, 'Semarang', 75000, 'Jl. Pahlawan No.9, Kel. Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah 50249', 'Dibayar', '', NULL),
(7, 2, 3, '2020-01-02', 440000, 'Surabaya', 100000, 'Jl. Pahlawan No.110, Kel. Alun-alun Contong, Kec. Bubutan, Kota Surabaya, Jawa Timur 60175', 'Barang Dikirim', '10987654321', '2020-01-03'),
(8, 2, 1, '2020-01-02', 730000, 'Bandung', 50000, 'Jl. Diponegoro No. 22, Kel. Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'Transaksi Selesai', '12345678910', '2020-01-03'),
(9, 3, 3, '2020-01-05', 200000, 'Surabaya', 100000, 'Jl. Pahlawan No.110, Kel. Alun-alun Contong, Kec. Bubutan, Kota Surabaya, Jawa Timur 60175', 'Transaksi Selesai', '12345678910', '2020-01-06'),
(10, 3, 2, '2020-01-05', 165000, 'Semarang', 75000, 'Jl. Pahlawan No.9, Kel. Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah 50249', 'Barang Dikirim', '10987654321', '2020-01-06'),
(11, 3, 1, '2020-01-05', 130000, 'Bandung', 50000, 'Jl. Diponegoro No. 22, Kel. Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', 'Dibayar', '', NULL),
(12, 3, 3, '2020-01-05', 170000, 'Surabaya', 100000, 'Jl. Pahlawan No.110, Kel. Alun-alun Contong, Kec. Bubutan, Kota Surabaya, Jawa Timur 60175', 'Menunggu Pembayaran', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000),
(2, 1, 2, 2, 'Boneka Bantal BLACKPINK Rose', 90000, 180000),
(3, 1, 3, 3, 'Boneka Bantal BLACKPINK Jennie', 80000, 240000),
(4, 1, 4, 4, 'Boneka Bantal BLACKPINK Jisoo', 70000, 280000),
(5, 2, 1, 4, 'Boneka Bantal BLACKPINK Lisa', 100000, 400000),
(6, 2, 2, 3, 'Boneka Bantal BLACKPINK Rose', 90000, 270000),
(7, 2, 3, 2, 'Boneka Bantal BLACKPINK Jennie', 80000, 160000),
(8, 2, 4, 1, 'Boneka Bantal BLACKPINK Jisoo', 70000, 70000),
(9, 3, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000),
(10, 3, 2, 1, 'Boneka Bantal BLACKPINK Rose', 90000, 90000),
(11, 3, 3, 1, 'Boneka Bantal BLACKPINK Jennie', 80000, 80000),
(12, 3, 4, 1, 'Boneka Bantal BLACKPINK Jisoo', 70000, 70000),
(13, 4, 1, 2, 'Boneka Bantal BLACKPINK Lisa', 100000, 200000),
(14, 4, 2, 2, 'Boneka Bantal BLACKPINK Rose', 90000, 180000),
(15, 4, 3, 2, 'Boneka Bantal BLACKPINK Jennie', 80000, 160000),
(16, 4, 4, 2, 'Boneka Bantal BLACKPINK Jisoo', 70000, 140000),
(17, 5, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000),
(18, 5, 2, 2, 'Boneka Bantal BLACKPINK Rose', 90000, 180000),
(19, 5, 3, 3, 'Boneka Bantal BLACKPINK Jennie', 80000, 240000),
(20, 5, 4, 4, 'Boneka Bantal BLACKPINK Jisoo', 70000, 280000),
(21, 6, 1, 4, 'Boneka Bantal BLACKPINK Lisa', 100000, 400000),
(22, 6, 2, 3, 'Boneka Bantal BLACKPINK Rose', 90000, 270000),
(23, 6, 3, 2, 'Boneka Bantal BLACKPINK Jennie', 80000, 160000),
(24, 6, 4, 1, 'Boneka Bantal BLACKPINK Jisoo', 70000, 70000),
(25, 7, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000),
(26, 7, 2, 1, 'Boneka Bantal BLACKPINK Rose', 90000, 90000),
(27, 7, 3, 1, 'Boneka Bantal BLACKPINK Jennie', 80000, 80000),
(28, 7, 4, 1, 'Boneka Bantal BLACKPINK Jisoo', 70000, 70000),
(29, 8, 1, 2, 'Boneka Bantal BLACKPINK Lisa', 100000, 200000),
(30, 8, 2, 2, 'Boneka Bantal BLACKPINK Rose', 90000, 180000),
(31, 8, 3, 2, 'Boneka Bantal BLACKPINK Jennie', 80000, 160000),
(32, 8, 4, 2, 'Boneka Bantal BLACKPINK Jisoo', 70000, 140000),
(33, 9, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000),
(34, 10, 2, 1, 'Boneka Bantal BLACKPINK Rose', 90000, 90000),
(35, 11, 3, 1, 'Boneka Bantal BLACKPINK Jennie', 80000, 80000),
(36, 12, 4, 1, 'Boneka Bantal BLACKPINK Jisoo', 70000, 70000),
(37, 0, 1, 1, 'Boneka Bantal BLACKPINK Lisa', 100000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(1, 'Boneka Bantal BLACKPINK Lisa', 100000, 'lisa.jpeg', 'Blackpink in Your Area <br>\r\nBlinks <br>\r\nMaterial Velboa <br>\r\nIsi Dacron <br>\r\nSize : 30cm x 35cm', 32),
(2, 'Boneka Bantal BLACKPINK Rose', 90000, 'rose.jpeg', 'Blackpink in Your Area <br>\r\nBlinks <br>\r\nMaterial Velboa <br>\r\nIsi Dacron <br>\r\nSize : 30cm x 35cm', 33),
(3, 'Boneka Bantal BLACKPINK Jennie', 80000, 'jennie.jpeg', 'Blackpink in Your Area <br>\r\nBlinks <br>\r\nMaterial Velboa <br>\r\nIsi Dacron <br>\r\nSize : 30cm x 35cm', 33),
(4, 'Boneka Bantal BLACKPINK Jisoo', 70000, 'jisoo.jpeg', 'Blackpink in Your Area <br>\r\nBlinks <br>\r\nMaterial Velboa <br>\r\nIsi Dacron <br>\r\nSize : 30cm x 35cm', 33),
(5, 'Boneka Bantal BLACKPINK K-pop', 60000, 'blackpink.jpeg', 'Blackpink in Your Area <br>\r\nBlinks <br>\r\nMaterial Velboa <br>\r\nIsi Dacron <br>\r\nSize : 30cm x 35cm', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_tugas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password_tugas` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `email_tugas`, `password_tugas`) VALUES
(1, 'Ahmad Abu Hasan', 'ahmadabuhasan@mhs.stmik-yadika.ac.id', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'User 1', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_data`
--

CREATE TABLE `tugas_data` (
  `id_data` int(11) NOT NULL,
  `nim_data` int(15) NOT NULL,
  `nama_data` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ttl_data` date NOT NULL,
  `status_data` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tugas_data`
--

INSERT INTO `tugas_data` (`id_data`, `nim_data`, `nama_data`, `alamat_data`, `ttl_data`, `status_data`) VALUES
(7, 117227004, 'Si D', 'Pasuruan', '2020-04-04', 'Mata Kuliah'),
(9, 117227009, 'Si I', 'Jawa Timur', '2020-09-09', 'Mata Kuliah'),
(10, 117227010, 'Si J', 'Bangil', '2020-10-10', 'Mahasiswa'),
(11, 117227011, 'Si K', 'Pasuruan', '2020-11-11', 'Dosen'),
(18, 117227003, 'Si C', 'Jonggol', '2020-12-29', 'Dosen'),
(19, 117227001, 'Si A', 'Bangil', '2020-12-14', 'Mahasiswa'),
(20, 117227002, 'Si B', 'Pasuruan', '2020-12-14', 'Mahasiswa'),
(29, 117227006, 'Hasan Abu', 'Pasuruan Jatim', '2021-01-01', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tugas_data`
--
ALTER TABLE `tugas_data`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugas_data`
--
ALTER TABLE `tugas_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
