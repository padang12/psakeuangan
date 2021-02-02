-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2021 pada 14.22
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psa_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_asettetap`
--

CREATE TABLE `tb_asettetap` (
  `id_asettetap` int(11) NOT NULL,
  `no` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `tipe_bayar` varchar(50) NOT NULL,
  `tipe_aset` varchar(50) NOT NULL,
  `nama_aset` varchar(500) NOT NULL,
  `nilai` double NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL,
  `keterangan` text NOT NULL,
  `kelompok` int(11) NOT NULL,
  `umur_ekonomis` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_coa`
--

CREATE TABLE `tb_coa` (
  `no_akun` varchar(15) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `saldo_normal` varchar(10) NOT NULL,
  `laporan` varchar(25) NOT NULL,
  `kat1` varchar(50) NOT NULL,
  `kat2` varchar(50) NOT NULL,
  `kat3` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `no_customer` varchar(15) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat1` varchar(150) NOT NULL,
  `alamat2` varchar(150) NOT NULL,
  `alamat3` varchar(150) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `tlpn` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutangusaha`
--

CREATE TABLE `tb_hutangusaha` (
  `no_trxhutang` varchar(40) NOT NULL,
  `no_supplier` varchar(15) NOT NULL,
  `no_akun` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `nilai` double NOT NULL,
  `tgl_hutang` date NOT NULL,
  `note` text NOT NULL,
  `sisahutang` double NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnalumum`
--

CREATE TABLE `tb_jurnalumum` (
  `id_jurnal` varchar(40) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `ket1` varchar(50) NOT NULL,
  `ket2` varchar(50) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL,
  `sumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelunasanhutang`
--

CREATE TABLE `tb_pelunasanhutang` (
  `id_pelunasan` int(11) NOT NULL,
  `no_trxhutang` varchar(25) NOT NULL,
  `no_supplier` varchar(15) NOT NULL,
  `no_akun` varchar(50) NOT NULL,
  `tipe_bayar` varchar(15) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `nilai_bayar` double NOT NULL,
  `tgl_bayar` date NOT NULL,
  `note` text NOT NULL,
  `sisa_hutang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelunasanpiutang`
--

CREATE TABLE `tb_pelunasanpiutang` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `kode_customer` varchar(100) NOT NULL,
  `kode_akun` varchar(100) NOT NULL,
  `tipe_bayar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` double NOT NULL,
  `tanggal` date NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `tipe_bayar` varchar(50) NOT NULL,
  `no_biaya` varchar(50) NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendapatan`
--

CREATE TABLE `tb_pendapatan` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `ppn` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendapatan_temp`
--

CREATE TABLE `tb_pendapatan_temp` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `ppn` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pen_ket_cust`
--

CREATE TABLE `tb_pen_ket_cust` (
  `no_invoice` varchar(100) NOT NULL,
  `kode_customer` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kapal` varchar(225) NOT NULL,
  `pelabuhan_asal` varchar(225) NOT NULL,
  `tanggal_tiba` date NOT NULL,
  `tanggal` date NOT NULL,
  `pelabuhan_tujuan` varchar(225) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piutang`
--

CREATE TABLE `tb_piutang` (
  `id` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `no_invoice` varchar(100) DEFAULT NULL,
  `kd_customer` varchar(100) DEFAULT NULL,
  `jmlh_piutang` double DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jmlh_bayar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `no_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat1` varchar(150) NOT NULL,
  `alamat2` varchar(150) NOT NULL,
  `alamat3` varchar(150) NOT NULL,
  `tlpn` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_asettetap`
--
ALTER TABLE `tb_asettetap`
  ADD PRIMARY KEY (`id_asettetap`);

--
-- Indeks untuk tabel `tb_coa`
--
ALTER TABLE `tb_coa`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`no_customer`);

--
-- Indeks untuk tabel `tb_hutangusaha`
--
ALTER TABLE `tb_hutangusaha`
  ADD PRIMARY KEY (`no_trxhutang`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indeks untuk tabel `tb_jurnalumum`
--
ALTER TABLE `tb_jurnalumum`
  ADD KEY `no_akun` (`nama_akun`);

--
-- Indeks untuk tabel `tb_pelunasanhutang`
--
ALTER TABLE `tb_pelunasanhutang`
  ADD PRIMARY KEY (`id_pelunasan`),
  ADD KEY `no_supplier` (`no_supplier`),
  ADD KEY `no_trxhutang` (`no_trxhutang`);

--
-- Indeks untuk tabel `tb_pelunasanpiutang`
--
ALTER TABLE `tb_pelunasanpiutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pendapatan_temp`
--
ALTER TABLE `tb_pendapatan_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pen_ket_cust`
--
ALTER TABLE `tb_pen_ket_cust`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `kode_customer` (`kode_customer`);

--
-- Indeks untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`no_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_asettetap`
--
ALTER TABLE `tb_asettetap`
  MODIFY `id_asettetap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pelunasanhutang`
--
ALTER TABLE `tb_pelunasanhutang`
  MODIFY `id_pelunasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pelunasanpiutang`
--
ALTER TABLE `tb_pelunasanpiutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pendapatan_temp`
--
ALTER TABLE `tb_pendapatan_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
