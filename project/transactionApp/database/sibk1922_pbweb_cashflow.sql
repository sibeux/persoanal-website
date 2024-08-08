-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Agu 2024 pada 17.53
-- Versi server: 10.3.39-MariaDB-cll-lve
-- Versi PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibk1922_pbweb_cashflow`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cash`
--

CREATE TABLE `cash` (
  `id_cash` smallint(5) NOT NULL,
  `id_customer` smallint(5) NOT NULL,
  `total_cash` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cash`
--

INSERT INTO `cash` (`id_cash`, `id_customer`, `total_cash`) VALUES
(2, 12, 195000),
(4, 14, 10000000),
(5, 15, 0),
(6, 16, 0),
(7, 17, 0),
(8, 18, 85000),
(9, 19, 0),
(10, 20, 4500000),
(11, 21, -95000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customer` smallint(5) NOT NULL,
  `id_user` smallint(5) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `name`) VALUES
(12, 60, 'M Nasrul Wahabi'),
(14, 62, 'sakura'),
(15, 63, 'sakuro'),
(16, 64, 'sibe rei'),
(17, 65, 'Nasrul Wahabi'),
(18, 66, 'Betrand '),
(19, 67, 'Saka Dicesort'),
(20, 68, 'Pitek Keprok'),
(21, 69, 'Sasuke Uchiha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` smallint(5) NOT NULL,
  `id_customer` smallint(5) NOT NULL,
  `date_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `name_transaksi` varchar(128) NOT NULL,
  `total_transaksi` int(30) NOT NULL,
  `type_transaksi` enum('pemasukan','pengeluaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `date_transaksi`, `name_transaksi`, `total_transaksi`, `type_transaksi`) VALUES
(39, 14, '2024-04-11', 'Crypto', 15000000, 'pemasukan'),
(40, 14, '2024-05-04', 'iPhone', 5000000, 'pengeluaran'),
(46, 18, '2024-05-27', 'Gaji', 100000, 'pemasukan'),
(47, 18, '2024-05-18', 'iPhone', 15000, 'pengeluaran'),
(53, 12, '2024-06-01', 'Angpau', 100000, 'pemasukan'),
(56, 12, '2024-06-01', 'Investasi', 100000, 'pemasukan'),
(59, 12, '2024-06-14', 'Investasi', 5000, 'pengeluaran'),
(60, 20, '2024-06-02', 'Gaji', 15000000, 'pemasukan'),
(61, 20, '2017-01-10', 'Laptop', 10500000, 'pengeluaran'),
(62, 21, '2024-06-05', 'Gaji', 5000, 'pemasukan'),
(64, 21, '2024-06-01', 'Apel', 100000, 'pengeluaran'),
(65, 12, '2024-06-19', 'Apel', 2000000, 'pengeluaran'),
(66, 20, '2024-06-19', 'Apel', 2000000, 'pengeluaran'),
(67, 20, '2024-06-19', 'Anggur', 2000000, 'pengeluaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`) VALUES
(60, 'wahabinasrul@gmail.com', '$2y$10$sQxjSseLILab6dKjVYLPqu8HkYVppH1hRkGripUrMMK/0z8VFDEKO'),
(62, 'sakura@gmail.com', '$2y$10$9DZcRhQDwFuNeEt3aihJ6uxUmdJNd669yQ2rLsb9fNWpGZbk7y5wO'),
(63, 'sakuro@gmail.com', '$2y$10$iPgaovFu6Zpd7RsVPTQJ2Oig3olmOTxnjWl9OrdlKKefTNs5Zm4aK'),
(64, 'siberei@gmail.com', '$2y$10$ZJjJirBooQbTRkRZW3scWeC7rMJiPhvSaYZw1PDspjgkISkFcBaBS'),
(65, 'sakuraji@gmail.com', '$2y$10$O8vCgltGkE6VRF27Jp4KEetklycPnImNRsgottpg5q9P5dsm1UhbS'),
(66, 'betrand123@gmail.com', '$2y$10$wB7Wh9MOynL9dEyrZGwmFePh4VovLmmD.AdhvoxFIUqwHH9/yhY1q'),
(67, 'sakadicesort@gmail.com', '$2y$10$ehsvHpPo3LuGGit3q18bne6SdQ485Cs91B5Gha2fOMual19TFLzpG'),
(68, 'pitekkeprok@gmail.com', '$2y$10$egb.bW.1SWJF2IoxyPzII.XMDscg/D9fglr5MLiHH0ckIAnLI32QC'),
(69, 'sasuke@gmail.com', '$2y$10$4pEXoh5WYuHEzHXl8y6p9uiOs3w6pFFC1gx26veHiQI4tt.uxNkqC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id_cash`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cash`
--
ALTER TABLE `cash`
  MODIFY `id_cash` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cash`
--
ALTER TABLE `cash`
  ADD CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
