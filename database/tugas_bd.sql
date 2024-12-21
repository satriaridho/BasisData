-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2024 at 03:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_bd`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `editKategori` (IN `p_id` INT(255), IN `p_judul` VARCHAR(255), IN `p_slug` VARCHAR(255))   BEGIN	

UPDATE kategori SET kategori.judul_kategori = p_judul, kategori.slug_kategori = p_slug WHERE kategori.id_kategori = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editPetugas` (IN `p_id` INT(11), IN `p_username` VARCHAR(255), IN `p_namaPetugas` VARCHAR(255), IN `p_level` ENUM('admin','petugas'), IN `p_password` VARCHAR(255))   BEGIN

UPDATE admin SET admin.username = p_username, admin.nama_petugas = p_namaPetugas,
admin.level = p_level, admin.password = p_password WHERE admin.id = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editUsers` (IN `p_id` INT, IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_notelp` INT(20), IN `p_alamat` TEXT)   BEGIN

UPDATE users SET users.username = p_username, users.password = p_password,
users.email = p_email, users.nomor_telephone = p_notelp, users.alamat = p_alamat WHERE users.id_users = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getKategoriId` (IN `p_id` INT)   BEGIN

SELECT*FROM kategori WHERE id_kategori = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getLoginPetugas` (IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN

SELECT * FROM admin
WHERE admin.username = p_username
AND admin.password = p_password;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetugas` ()   BEGIN

SELECT*FROM admin;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetugasId` (IN `p_id` INT(11))   BEGIN

SELECT*FROM admin WHERE admin.id = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProdukId` (IN `p_id` INT)   BEGIN	

SELECT*FROM	produk WHERE id_produk = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsers` ()   BEGIN

SELECT*FROM users;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsersId` (IN `p_id` INT)   BEGIN

SELECT*FROM users WHERE id_users = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusKategori` (IN `p_id` INT(255))   BEGIN

DELETE FROM kategori WHERE id_kategori = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPetugas` (IN `p_id` INT(11))   BEGIN

DELETE FROM admin WHERE admin.id = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusProduct` (IN `p_id` INT)   BEGIN

DELETE FROM produk WHERE id_produk = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusUsers` (IN `p_id` INT(255))   BEGIN

DELETE FROM users WHERE id_users = p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahPetugas` (IN `p_username` VARCHAR(255), IN `p_namaPetugas` VARCHAR(255), IN `p_level` ENUM('admin','petugas'), IN `p_password` VARCHAR(255))   BEGIN

INSERT INTO admin(admin.username, admin.nama_petugas, admin.level, admin.password)
VALUES (p_username, p_namaPetugas, p_level, p_password);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahUsers` (IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_notelp` VARCHAR(20), IN `p_alamat` TEXT)   BEGIN

INSERT INTO users(users.username, users.password, users.email, users.nomor_telephone, users.alamat)
VALUES (p_username, p_password, p_email, p_notelp,p_alamat);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama_petugas`, `level`, `password`) VALUES
(1, 'admin', 'adminSaya', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `judul_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `slug_kategori`) VALUES
(1, 'Tanaman Pangan', 'tanaman-pangan\r\n'),
(2, 'Alat Pertanian', 'alat-pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `isi_komentar` text NOT NULL,
  `created` datetime NOT NULL,
  `id_users` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `isi_komentar`, `created`, `id_users`, `id_produk`) VALUES
(1, 'keren', '2024-12-21 13:31:06', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `judul_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `judul_produk`, `slug_produk`, `deskripsi`, `harga`, `gambar`, `id_kategori`) VALUES
(1, 'Bibit Padi IR64', 'bibit-padi-ir64', 'Bibit unggul padi IR64', 150000, 'bibit.jpg', 1),
(2, 'Traktor Mini', 'traktor-mini', 'Traktor cocok untuk lahan kecil', 7500000, 'traktor.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `bukti_tf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('Accepted','Processed') NOT NULL,
  `id_users` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_harga`, `payment_type`, `time`, `bank`, `bukti_tf`, `status`, `id_users`, `id_produk`) VALUES
(1, '70000.00', 'Bank TF', '2024-12-21 14:49:39', 'BRI', 'tf.jpg', 'Processed', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telephone` varchar(20) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `email`, `nomor_telephone`, `alamat`) VALUES
(1, 'ujang', 'c959810f01adc10791f46e1b3ecab45a', 'ujang12@gmail.com', '0808020808', 'Yogyakarta, DIY'),
(2, 'users99', 'users99', 'users99@gmail.com', '808089999', 'DIY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
