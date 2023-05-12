-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 12:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cloting`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(4, 'Aksesoris'),
(1, 'Baju'),
(2, 'Celana'),
(3, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(11) NOT NULL,
  `order_number` varchar(45) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_cust` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `order_number`, `tanggal`, `nama_cust`, `alamat`, `produk_id`, `qty`) VALUES
(1, 'ORD0001', '2023-05-12 17:42:34', 'Rahmat', 'Jaxel', 3, 2),
(2, 'ORD0002', '2023-05-12 17:48:25', 'Hani', 'Jakarta', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `harga` int(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `sku`, `nama_produk`, `harga`, `stok`, `kategori_id`, `deskripsi`, `thumbnail`) VALUES
(1, 'PO-001', 'Kaos Basic Putih', 75000, 50, 1, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'kaos-basic-putih.jpg'),
(2, 'PO-002', 'Kemeja Lengan Pendek Polos', 120000, 30, 1, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'kemeja-lp-polos.jpg'),
(3, 'PO-003', 'Jaket Jeans', 250000, 20, 1, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'jaket-jeans.jpg'),
(4, 'PO-004', 'Celana Panjang Chino', 150000, 40, 1, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'celana-chino.jpg'),
(5, 'PO-005', 'Sweater Tebal', 180000, 25, 1, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'sweater-garis.jpg'),
(6, 'PO-006', 'Celana Jeans Slim Fit', 200000, 30, 2, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'celana-jeans-slim.jpg'),
(7, 'PO-007', 'Celana Jogger Pants', 175000, 40, 2, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'jogger-pants.jpg'),
(8, 'PO-008', 'Celana Cargo', 225000, 20, 2, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'celana-cargo.jpg'),
(9, 'PO-009', 'Celana Pendek Chino', 100000, 50, 2, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'celana-pendek-chino.jpg'),
(10, 'PO-010', 'Celana Training', 150000, 35, 2, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'celana-training.jpg'),
(11, 'PO-011', 'Sneakers Casual', 300000, 25, 3, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'sneakers-casual.jpg'),
(12, 'PO-012', 'Sepatu Loafers', 250000, 30, 3, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'sepatu-loafers.jpg'),
(13, 'PO-013', 'Sepatu Formal Hitam', 400000, 15, 3, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'sepatu-formal-hitam.jpg'),
(14, 'PO-014', 'Sandals', 100000, 50, 3, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'sandals.jpg'),
(15, 'PO-015', 'Boots', 350000, 20, 3, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'boots.jpg'),
(16, 'PO-016', 'Gelang Emas', 250000, 10, 4, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'gelang-emas.jpg'),
(17, 'PO-017', 'Topi Trucker', 150000, 20, 4, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'topi-trucker.jpg'),
(18, 'PO-018', 'Dompet Kulit', 300000, 15, 4, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'dompet-kulit.jpg'),
(19, 'PO-019', 'Jam Tangan', 500000, 5, 4, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'jam-tangan.jpg'),
(20, 'PO-020', 'Kacamata Hitam', 200000, 8, 4, 'Fashion selalu berkembang dan salah satu elemen yang tidak boleh terlewatkan adalah aksesoris. Namun, selain aksesoris, pakaian juga menjadi bagian penting dalam tampilan kita. Baju dan celana merupakan pakaian yang selalu ada dalam lemari, dan bisa digunakan untuk berbagai acara. Tidak hanya pakaian, sepatu juga menjadi elemen yang tidak boleh diabaikan. Sepatu yang sesuai dengan tampilan bisa membuat penampilan kita semakin menarik. Selain itu, tas juga menjadi aksesoris yang sangat penting bagi sebagian orang. Tas tidak hanya berfungsi untuk membawa barang-barang, tetapi juga bisa menjadi elemen fashion yang bisa meningkatkan tampilan kita. Dengan begitu, kita harus pintar memilih tas yang sesuai dengan tampilan dan kebutuhan kita.', 'kacamata-hitam.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
