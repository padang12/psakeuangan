-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2020 pada 13.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Dumping data untuk tabel `tb_coa`
--

INSERT INTO `tb_coa` (`no_akun`, `nama_akun`, `saldo_normal`, `laporan`, `kat1`, `kat2`, `kat3`, `status`) VALUES
('1-110', 'Kas', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Kas dan Bank', ''),
('1-111', 'Bank BNI', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Kas dan Bank', ''),
('1-112', 'Bank Mandiri', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Kas dan Bank', ''),
('1-113', 'Bank BRI', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Kas dan Bank', ''),
('1-120', 'Piutang Usaha', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Piutang Usaha', ''),
('1-130', 'Asuransi Dibayar Di Muka', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Asuransi Dibayar Di Muka', ''),
('1-140', 'Perlengkapan Kantor', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Lancar', 'Perlengkapan Kantor', ''),
('1-141', 'Inventaris Kantor', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Inventaris Kantor', ''),
('1-142', 'Kendaraan', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Kendaraan', ''),
('1-143', 'Gedung', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Gedung', ''),
('1-144', 'Kapal', 'Debit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Kapal', ''),
('1-150', 'Akumulasi Penyusutan Inventaris Kantor', 'Kredit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Akumulasi Penyusutan Inventaris Kantor', ''),
('1-151', 'Akumulasi Penyusutan Kendaraan', 'Kredit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Akumulasi Penyusutan Kendaraan', ''),
('1-152', 'Akumulasi Penyusutan Gedung', 'Kredit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Akumulasi Penyusutan Gedung', ''),
('1-153', 'Akumulasi Penyusutan Kapal', 'Kredit', 'Neraca Saldo', 'Aset', 'Aset Tetap', 'Akumulasi Penyusutan Kapal', ''),
('2-110', 'Hutang Usaha', 'Kredit', 'Neraca Saldo', 'Liabilitas', 'Hutang Lancar', 'Hutang Usaha', ''),
('2-120', 'Hutang Bank', 'Kredit', 'Neraca Saldo', 'Liabilitas', 'Hutang Lancar', 'Hutang Bank', ''),
('3-110', 'Modal', 'Kredit', 'Neraca Saldo', 'Ekuitas', 'Modal', 'Modal', ''),
('3-120', 'Prive', 'Kredit', 'Neraca Saldo', 'Ekuitas', 'Modal', 'Prive', ''),
('4-110', 'Pendapatan Jasa', 'Kredit', 'Laba/Rugi', 'Pendapatan', 'Pendapatan', 'Pendapatan Jasa', ''),
('4-120', 'Pendapatan Giro/Bunga', 'Kredit', 'Laba/Rugi', 'Pendapatan', 'Pendapatan Diluar Operasional', 'Pendapatan Giro/Bunga', ''),
('5-110', 'Biaya Gaji, Tunjangan, dan Bonus Karyawan', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Gaji, Tunjangan, dan Bonus Karyawan', ''),
('5-111', 'Biaya Telepon, Pulsa dan INDIHOME', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Telepon, Pulsa dan INDIHOME', ''),
('5-112', 'Biaya Listrik', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Listrik', ''),
('5-113', 'Biaya PDAM', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya PDAM', ''),
('5-114', 'Biaya Keperluan Kapal', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Keperluan Kapal', ''),
('5-115', 'Biaya Berobat', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Berobat', ''),
('5-116', 'Biaya Kirim Dokumen', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Kirim Dokumen', ''),
('5-117', 'Biaya BBM, Servis DLL Kendaraan', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya BBM, Servis DLL Kendaraan', ''),
('5-118', 'Biaya Servis Alat Kantor', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Servis Alat Kantor', ''),
('5-119', 'Biaya Transportasi', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Transportasi', ''),
('5-120', 'Biaya Penginapan', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Penginapan', ''),
('5-121', 'Biaya Pajak', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Pajak', ''),
('5-122', 'Biaya Sumbangan', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Sumbangan', ''),
('5-123', 'Biaya Konsumsi', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Konsumsi', ''),
('5-124', 'Biaya Lain-Lain', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Lain-Lain', ''),
('5-125', 'Biaya Keperluan Rumah Tangga', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Keperluan Rumah Tangga', ''),
('5-126', 'Biaya Perawatan Dermaga', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Perawatan Dermaga', ''),
('5-127', 'Biaya Perbaikan Kantor', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Perbaikan Kantor', ''),
('5-128', 'Biaya Asuransi', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Asuransi', ''),
('5-129', 'Biaya Penyusutan Inventaris Kantor', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Penyusutan Inventaris Kantor', ''),
('5-130', 'Biaya Penyusutan Kendaraan Kantor', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Penyusutan Kendaraan Kantor', ''),
('5-131', 'Biaya Penyusutan Gedung Kantor', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Penyusutan Gedung Kantor', ''),
('5-132', 'Biaya Penyusutan Kapal', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Administrasi dan Umum', 'Biaya Penyusutan Kapal', ''),
('5-133', 'Biaya Administrasi Bank', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Di luar Operasional', 'Biaya Administrasi Bank', ''),
('5-134', 'Biaya Materai', 'Debit', 'Laba/Rugi', 'Biaya ', 'Biaya Di luar Operasional', 'Biaya Materai', '');

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

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`no_customer`, `nama_customer`, `alamat1`, `alamat2`, `alamat3`, `kode_pos`, `tlpn`, `pic`) VALUES
('C-001', 'PT Pelayaran Eka Ivanajasa', 'JL. Budi Karya KOMP-PONTIANAK SQUARE No. 23 C - 25 C', 'Pontianak', 'KALBAR', 78122, '0561 - 760777', 'Haryono'),
('C-002', 'PT Pelayaran Sumber Kapuas Marine', 'JL. Sultan Muhammad No. 201', 'Pontianak', 'KALBAR', 77777, '0561 - 734537', 'Mr. X'),
('C-003', 'PT Fangiono Perkasa Sejati', 'APL TOWER CENTRAL PARK LT. 28', 'Jakarta', 'DKI JAKARTA', 77777, '021 - 00000', 'Natasha');

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
-- AUTO_INCREMENT untuk tabel `tb_asettetap`
--
ALTER TABLE `tb_asettetap`
  MODIFY `id_asettetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `tb_pelunasanhutang`
--
ALTER TABLE `tb_pelunasanhutang`
  MODIFY `id_pelunasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_pelunasanpiutang`
--
ALTER TABLE `tb_pelunasanpiutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_pendapatan_temp`
--
ALTER TABLE `tb_pendapatan_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
