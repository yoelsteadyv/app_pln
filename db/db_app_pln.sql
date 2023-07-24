-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 22.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app_pln`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `KodeLogin` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaLengkap` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`KodeLogin`, `Username`, `Password`, `NamaLengkap`, `Level`) VALUES
(3, 'yoel', '123', 'Yoel Steady Valentino', 'Admin'),
(6, 'jessica', '123', 'Jessica Marcela Suri', 'Petugas'),
(12, 'PLG100000002', 'PLG100000002', 'Daud', 'Pelanggan'),
(13, 'PLG100000003', 'PLG100000003', 'Yulius Granada', 'Pelanggan'),
(14, 'yulius', '123', 'Yulius Granada', 'Petugas'),
(15, 'PLG100000004', 'PLG100000004', 'Solihudin', 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `KodePelanggan` int(11) NOT NULL,
  `NoPelanggan` varchar(100) NOT NULL,
  `NoMeter` varchar(100) NOT NULL,
  `KodeTarif` int(11) NOT NULL,
  `NamaLengkap` varchar(100) NOT NULL,
  `Telp` varchar(16) NOT NULL,
  `Alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`KodePelanggan`, `NoPelanggan`, `NoMeter`, `KodeTarif`, `NamaLengkap`, `Telp`, `Alamat`) VALUES
(8, 'PLG100000002', '83745683', 5, 'Daud', '081343525', ' Jakarta'),
(9, 'PLG100000003', '93847', 6, 'Yulius Granada', '0842359', 'Bekasi '),
(10, 'PLG100000004', '4683535', 8, 'Solihudin', '0812434346', ' Merpati Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `KodePembayaran` int(11) NOT NULL,
  `KodeTagihan` int(11) NOT NULL,
  `TglBayar` date NOT NULL,
  `JumlahTagihan` double(10,0) NOT NULL,
  `BuktiPembayaran` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`KodePembayaran`, `KodeTagihan`, `TglBayar`, `JumlahTagihan`, `BuktiPembayaran`, `Status`) VALUES
(12, 25, '2023-07-25', 150000, 'TGH100000002_XIT7KUC1_1690223166.png', '1'),
(13, 25, '2023-07-25', 150000, 'TGH100000002_RIWV6LSE_1690229537.png', '1'),
(14, 25, '2023-07-25', 150000, 'TGH100000002_GU42CTNQ_1690229709.png', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `KodeTagihan` int(11) NOT NULL,
  `NoTagihan` varchar(100) NOT NULL,
  `NoPelanggan` varchar(100) NOT NULL,
  `TahunTagih` int(20) NOT NULL,
  `BulanTagih` varchar(20) NOT NULL,
  `JumlahPemakaian` varchar(100) NOT NULL,
  `TotalBayar` double(10,0) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`KodeTagihan`, `NoTagihan`, `NoPelanggan`, `TahunTagih`, `BulanTagih`, `JumlahPemakaian`, `TotalBayar`, `Status`) VALUES
(25, 'TGH100000002', 'PLG100000002', 2023, '7', '100', 150000, '2'),
(26, 'TGH100000003', 'PLG100000004', 2023, '9', '20', 32000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `KodeTarif` int(11) NOT NULL,
  `Daya` varchar(50) NOT NULL,
  `TarifPerKwh` double(10,0) NOT NULL,
  `Beban` double(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_tarif`
--

INSERT INTO `tb_tarif` (`KodeTarif`, `Daya`, `TarifPerKwh`, `Beban`) VALUES
(5, '900', 1400, 10000),
(6, '250', 605, 5000),
(7, '100', 415, 2000),
(8, '350', 1400, 4000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`KodeLogin`),
  ADD KEY `Username` (`Username`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`KodePelanggan`),
  ADD KEY `NoPelanggan` (`NoPelanggan`),
  ADD KEY `KodeTarif` (`KodeTarif`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`KodePembayaran`),
  ADD KEY `KodeTagihan` (`KodeTagihan`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`KodeTagihan`),
  ADD KEY `NoPelanggan` (`NoPelanggan`);

--
-- Indeks untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`KodeTarif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `KodeLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `KodePelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `KodePembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `KodeTagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `KodeTarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`NoPelanggan`) REFERENCES `tb_login` (`Username`),
  ADD CONSTRAINT `tb_pelanggan_ibfk_2` FOREIGN KEY (`KodeTarif`) REFERENCES `tb_tarif` (`KodeTarif`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`KodeTagihan`) REFERENCES `tb_tagihan` (`KodeTagihan`);

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`NoPelanggan`) REFERENCES `tb_pelanggan` (`NoPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
