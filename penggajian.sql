-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jul 2020 pada 15.20
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_freelance`
--

CREATE TABLE `tb_freelance` (
  `nik` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `email` varchar(20) NOT NULL,
  `telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_freelance`
--

INSERT INTO `tb_freelance` (`nik`, `nama`, `alamat`, `jenis_kelamin`, `email`, `telp`) VALUES
(1242, 'sygh', 'SSFSG', 'Perempuan', 'aquasone9@gmail.com', 234352),
(12422, 'syghe', 'SSFSG', 'Laki-laki', 'aquasone9@gmail.com', 234352);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jobdesk`
--

CREATE TABLE `tb_jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `jobdesk` varchar(20) NOT NULL,
  `persen_upah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nip` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `jabatan` enum('Ketua Komisaris','CEO','Chief of Human Resource','Chief of Technology Officer') NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nip`, `nama`, `jenis_kelamin`, `jabatan`, `telp`, `alamat`) VALUES
(55645, 'wqA', 'Laki-laki', 'Ketua Komisaris', 234352, 'SSFSG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proyek`
--

CREATE TABLE `tb_proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(150) NOT NULL,
  `nama_client` varchar(150) NOT NULL,
  `deadline_proyek` date NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_mulai_proyek` date NOT NULL,
  `total_budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_proyek`
--

INSERT INTO `tb_proyek` (`id_proyek`, `nama_proyek`, `nama_client`, `deadline_proyek`, `keterangan`, `tanggal_mulai_proyek`, `total_budget`) VALUES
(2344, 'rgrg', 'r ft', '2020-07-11', 'yeay', '2020-03-11', 2000000),
(3311, 'wewrwr', 'r ft', '2020-07-15', 'teet', '2020-07-12', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`) VALUES
('1234', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_freelance`
--
ALTER TABLE `tb_freelance`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_jobdesk`
--
ALTER TABLE `tb_jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_proyek` (`id_proyek`,`nik`,`id_jobdesk`),
  ADD KEY `id_jobdesk` (`id_jobdesk`);

--
-- Indexes for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD CONSTRAINT `tb_penggajian_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `tb_proyek` (`id_proyek`),
  ADD CONSTRAINT `tb_penggajian_ibfk_2` FOREIGN KEY (`id_penggajian`) REFERENCES `tb_freelance` (`nik`),
  ADD CONSTRAINT `tb_penggajian_ibfk_3` FOREIGN KEY (`id_jobdesk`) REFERENCES `tb_jobdesk` (`id_jobdesk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
