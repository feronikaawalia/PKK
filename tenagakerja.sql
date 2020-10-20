-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jun 2020 pada 15.40
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenagakerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti`
--

CREATE TABLE `bukti` (
  `id_bukti` int(3) NOT NULL,
  `id_transaksi` int(3) NOT NULL,
  `bulan` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(3) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'majikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id_negara` int(3) NOT NULL,
  `nama_negara` varchar(100) NOT NULL,
  `gaji_admin` int(10) NOT NULL,
  `gaji_tki` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`, `gaji_admin`, `gaji_tki`) VALUES
(1, 'Singapura', 6000000, 4800000),
(2, 'Malaysia', 3500000, 2800000),
(3, 'Hongkong', 7000000, 5600000),
(4, 'Taiwan', 8000000, 6400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(3) NOT NULL,
  `id_tenaga` int(3) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `keterampilan` varchar(50) NOT NULL,
  `nilai_kedisiplinan` int(3) NOT NULL,
  `nilai_praktek` int(3) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `id_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_tenaga`, `bahasa`, `keterampilan`, `nilai_kedisiplinan`, `nilai_praktek`, `keterangan`, `id_status`) VALUES
(11, 13, 'Inggris', 'Memasak', 100, 90, 'Baik', 1),
(12, 9, 'Mandarin', 'Bersih-bersih', 100, 100, 'Baik', 1),
(13, 12, 'Melayu', 'Menjaga anak', 90, 90, 'Bagus', 1),
(16, 14, 'Mandarin', 'Bersih-bersih', 99, 99, 'Baik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(3) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Lulus'),
(2, 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kerja`
--

CREATE TABLE `tenaga_kerja` (
  `id_tenaga` int(3) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kota_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_tenaga` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_negara` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tenaga_kerja`
--

INSERT INTO `tenaga_kerja` (`id_tenaga`, `nama`, `kota_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `nohp`, `pendidikan`, `status_tenaga`, `status`, `id_negara`) VALUES
(9, 'Tiara', 'Mojokerto', '2019-12-03', 'Malang', 'Perempuan', '082257151881', 'SMK', 'Sudah Menikah', '', 3),
(12, 'Rara', 'Indonesia', '2019-12-20', 'Malang', 'Perempuan', '08123456789', 'SMP', 'Belum Menikah', '', 2),
(13, 'Amara', 'Surabaya', '2019-12-19', 'Malang', 'Perempuan', '089282928928', 'SMP', 'Sudah Menikah', 'Terima', 4),
(14, 'Lala', 'Surabaya', '2019-12-05', 'Malang', 'Perempuan', '082268162869', 'SMA', 'Belum Menikah', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_tenaga` int(3) NOT NULL,
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_tenaga`, `status_transaksi`) VALUES
(26, 2, 13, 'Terima'),
(27, 3, 9, 'Terima'),
(28, 3, 13, 'Terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `id_level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_level`) VALUES
(1, 'tiara', 'ara', 'ara', 1),
(2, 'ain', 'ain', 'ain', 2),
(3, 'fero', 'fero', 'fero', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(3) NOT NULL,
  `id_tenaga` int(3) NOT NULL,
  `kartukeluarga` varchar(100) NOT NULL,
  `aktakelahiran` varchar(100) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `datakesehatan` varchar(100) NOT NULL,
  `pasfoto` varchar(100) NOT NULL,
  `bukutabungan` varchar(100) NOT NULL,
  `id_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `id_tenaga`, `kartukeluarga`, `aktakelahiran`, `passport`, `datakesehatan`, `pasfoto`, `bukutabungan`, `id_status`) VALUES
(7, 13, 'red-velvet.jpg', 'red-velvet.jpg', 'red-velvet.jpg', 'red-velvet.jpg', 'red-velvet.jpg', 'red-velvet.jpg', 1),
(9, 9, 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 1),
(13, 14, 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 'iu.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_tenaga` (`id_tenaga`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD PRIMARY KEY (`id_tenaga`),
  ADD KEY `id_negara` (`id_negara`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_majikan` (`id_user`),
  ADD KEY `id_tenaga` (`id_tenaga`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_tenaga` (`id_tenaga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bukti` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id_negara` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  MODIFY `id_tenaga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `bukti_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`id_tenaga`) REFERENCES `tenaga_kerja` (`id_tenaga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD CONSTRAINT `tenaga_kerja_ibfk_1` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id_negara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tenaga`) REFERENCES `tenaga_kerja` (`id_tenaga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `verifikasi_ibfk_2` FOREIGN KEY (`id_tenaga`) REFERENCES `tenaga_kerja` (`id_tenaga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
