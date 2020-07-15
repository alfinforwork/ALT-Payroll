-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 11:57 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `tb_freelance`
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
-- Dumping data for table `tb_freelance`
--

INSERT INTO `tb_freelance` (`nik`, `nama`, `alamat`, `jenis_kelamin`, `email`, `telp`) VALUES
(1242, 'sygh', 'SSFSG', 'Perempuan', 'aquasone9@gmail.com', 234352),
(12422, 'syghe', 'SSFSG', 'Laki-laki', 'aquasone9@gmail.com', 234352);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesk`
--

CREATE TABLE `tb_jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `jobdesk` varchar(20) NOT NULL,
  `persen_upah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jobdesk`
--

INSERT INTO `tb_jobdesk` (`id_jobdesk`, `jobdesk`, `persen_upah`) VALUES
(1, 'Frontend', 40),
(2, 'backend', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
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
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nip`, `nama`, `jenis_kelamin`, `jabatan`, `telp`, `alamat`) VALUES
(55645, 'wqA', 'Laki-laki', 'Ketua Komisaris', 234352, 'SSFSG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penggajian`
--

INSERT INTO `tb_penggajian` (`id_penggajian`, `id_proyek`, `nik`, `id_jobdesk`, `gaji`) VALUES
(14, 2, 1242, 1, 400000),
(15, 2, 12422, 2, 600000),
(16, 1, 1242, 2, 74),
(17, 1, 1242, 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyek`
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
-- Dumping data for table `tb_proyek`
--

INSERT INTO `tb_proyek` (`id_proyek`, `nama_proyek`, `nama_client`, `deadline_proyek`, `keterangan`, `tanggal_mulai_proyek`, `total_budget`) VALUES
(1, 'asd', 'asd', '2020-07-17', 'ada', '2020-07-16', 123),
(2, 'iapodn', 'asd', '2020-07-31', 'Infus Josss', '2020-07-15', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
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
  ADD KEY `id_jobdesk` (`id_jobdesk`),
  ADD KEY `tb_penggajian_ibfk_2` (`nik`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD CONSTRAINT `tb_penggajian_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `tb_proyek` (`id_proyek`),
  ADD CONSTRAINT `tb_penggajian_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_freelance` (`nik`),
  ADD CONSTRAINT `tb_penggajian_ibfk_3` FOREIGN KEY (`id_jobdesk`) REFERENCES `tb_jobdesk` (`id_jobdesk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
