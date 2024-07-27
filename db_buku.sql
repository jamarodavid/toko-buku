-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2024 pada 11.05
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
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pesan` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'fadil', 'fadil@gmail.com', 'keren bukunya'),
(2, 'jamaro', 'admin@gmail.com', 'gokil'),
(3, 'angga', 'angga@gmail.com', 'buku bukunya bagus'),
(4, 'ikhsan', 'ikhsan@gmail.com', 'buku nya perbanyak lagi'),
(5, 'jamaro', 'admin@gmail.com', 'assa'),
(6, 'abiyu', 'abiyu@gmail.com', 'update terus komik nya min'),
(7, 'ayu', 'l.comayu@gmaio', 'gokil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `tahun_terbit` varchar(20) NOT NULL,
  `halaman` varchar(25) NOT NULL,
  `harga` float NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul`, `pengarang`, `tahun_terbit`, `halaman`, `harga`, `cover`) VALUES
(5, 'dilan 1990', 'pidi baiq', '2014-12-30', '107', 30000, 'pertemuan 3 lagi.png'),
(7, 'malin kundang', 'radit', '2021-12-28', '199', 17000, 'attachment_11.jpg'),
(8, 'si juki', 'hanif', '2019-11-14', '179', 25000, 'Untitled.png'),
(10, 'si pitung', 'angga', '2024-07-19', '342', 10000, 'WIN_20231101_13_46_36_Pro.jpg'),
(11, 'sejarah indonesia', 'furqon', '2024-07-03', '212', 20000, 'WIN_20240516_14_50_09_Pro.jpg'),
(14, 'kamus bahasa jepang', 'faruz', '2024-07-19', '213', 35000, 'RobloxScreenShot20220412_210254423.png'),
(15, 'malin kundang', 'pidi baiq', '2024-07-12', '200', 25000, 'contoh png 1.png'),
(19, 'kamus bahasa jerman', 'altaff', '2023-06-06', '199', 23000, 'RobloxScreenShot20230909_213744349.png'),
(20, 'cara handal jadi programm', 'ridwan', '2024-07-02', '422', 40000, 'DSC_0694.JPG'),
(26, 'kamus bahasa indonesia', 'syamsul', '2024-07-11', '321', 34000, 'pertemuan 2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kategori`
--

INSERT INTO `data_kategori` (`id`, `kategori`, `deskripsi`) VALUES
(1, 'Novel', 'Novel adalah salah satu genre karya sastra yang berbentuk prosa.'),
(2, 'Cerita Rakyat', 'kisah atau cerita yang berasal dari masyarakat zaman dahulu dan berkembang secara luas dari mulut ke'),
(5, 'Biografi', 'Biografi merupakan teks yang berisikan riwayat hidup dan kisah tokoh yang diceritakan. Biografi dapa'),
(6, 'Horor', 'horor adalah sebuah genre film yang berusaha untuk memancing emosi berupa ketakutan atau rasa jijik ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','delivered') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_address`, `product_name`, `quantity`, `total_price`, `status`) VALUES
(2, 'radit', 'kamjat', '', 0, 17000.00, 'pending'),
(3, 'furqon', 'cipinang muara', '', 0, 30000.00, 'pending'),
(4, 'fadil', 'duren sawit', '', 0, 17000.00, 'pending'),
(5, 'renal', 'kamjat', '', 0, 55000.00, 'pending'),
(6, 'abiyyu', 'cipnang besar selatan', '', 0, 60000.00, 'pending'),
(9, 'hanif', 'hanif', '', 0, 35000.00, 'pending'),
(10, 'ruben', 'kamjat', '', 0, 50000.00, 'pending'),
(11, 'ayuni', 'kajat', '', 0, 30000.00, 'pending'),
(14, 'xena', 'cakung', '', 0, 30000.00, 'pending'),
(15, 'altaf', 'buaran', '', 0, 25000.00, 'pending'),
(16, 'fariz', 'haji fatimah', '', 0, 20000.00, 'pending'),
(17, 'pak randi', 'cakung', '', 0, 30000.00, 'pending'),
(18, 'reynaldi', 'kalimalang, curug', '', 0, 40000.00, 'pending'),
(19, 'ayuni', 'cakung', '', 0, 25000.00, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(3, 2, 'malin kundang', 17000.00, 1),
(4, 3, 'dilan 1990', 30000.00, 1),
(5, 4, 'malin kundang', 17000.00, 1),
(6, 5, 'dilan 1990', 30000.00, 1),
(7, 5, 'si juki', 25000.00, 1),
(8, 6, 'si juki', 25000.00, 1),
(9, 6, 'kamus bahasa jepang', 35000.00, 1),
(12, 9, 'kamus bahasa jepang', 35000.00, 1),
(13, 10, 'si juki', 25000.00, 1),
(14, 10, 'si juki', 25000.00, 1),
(15, 11, 'dilan 1990', 30000.00, 1),
(19, 14, 'dilan 1990', 30000.00, 1),
(20, 15, 'si juki', 25000.00, 1),
(21, 16, 'sejarah indonesia', 20000.00, 1),
(22, 17, 'dilan 1990', 30000.00, 1),
(23, 18, 'cara handal jadi programm', 40000.00, 1),
(24, 19, 'si juki', 25000.00, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'angga', 9.00, 'yaa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'angga', 'angga'),
(2, 'fariz', 'faris'),
(3, 'admin', 'admin'),
(4, 'jamaro', 'jamaro'),
(5, 'ruben', 'ruben');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userr`
--

CREATE TABLE `userr` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userr`
--

INSERT INTO `userr` (`id`, `username`, `password`, `email`) VALUES
(4, 'renal', 'renal', 'renal@gmail.com'),
(5, 'hanif', 'hanif', 'hanif@gmail.com'),
(6, 'jamaro', 'jamaro', 'jamaro@gmail.com'),
(8, 'mulyana', '04012007', 'angga@gmail.com'),
(9, 'reyval', 'reyval', 'reyvala@gmail.com'),
(10, 'bnsp', 'bnsp', 'bnsp@gmail.com'),
(11, 'ayu', 'ayu', 'ayu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_ibfk_1` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `userr`
--
ALTER TABLE `userr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
