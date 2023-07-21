-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2023 pada 10.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsnfproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `password`, `registered_at`) VALUES
(1, 'farisid', 'farisi danuarta', 'farisi13@gmail.com', 'qgfwegbwwwwwwwwgh', '2023-07-18 05:22:44'),
(3, 'Farisi', 'faris', 'arema87@gmail.com', '$2y$10$FIO.JzNDHcLh8c5Ay8FnkesT9dX/RH6ON3Mdr6OXT9rC6k7bPH3Ha', '2023-07-21 07:20:08'),
(4, 'nabill', 'faris', 'pelerr@gmail.com', '$2y$10$7/QdA3so0e1pznRYUJUlIO5fEmFzPGmiswcm3k/dgQB2jszPdpSzy', '2023-07-21 07:39:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `occupation_nama` int(11) NOT NULL,
  `detail` text DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_profile` varchar(255) DEFAULT NULL,
  `employee_status` enum('FIRED','WORKING') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id`, `namee`, `occupation_nama`, `detail`, `salary`, `created_at`, `updated_at`, `image_profile`, `employee_status`) VALUES
(12, 'nabillion', 3, 'tampan banget', 6766858, '2023-07-20 13:41:47', '2023-07-20 03:11:47', 'profilfaris2.jpeg', 'FIRED'),
(13, 'Farisifhfdsghs', 1, 'dghowengoljw', 567977, '2023-07-20 13:42:42', '2023-07-20 03:07:59', '248796567_190337303159478_1415624375772678082_n.jpg', 'FIRED'),
(14, 'gdfhdfh', 2, 'dfkgnklfng', 463453, '2023-07-21 07:54:24', NULL, '248937931_892431298060385_6149247008792094696_n.jpg', 'FIRED'),
(15, 'gkvghjk', 1, 'jhdohafoasdf', 25645346, '2023-07-20 13:03:32', NULL, '248796567_930824944481297_7254396225752503125_n.jpg', 'WORKING'),
(16, 'giyhgiggguoig', 3, 'fufuofo8iou', 8758976, '2023-07-20 13:33:59', '2023-07-20 03:03:59', 'LOGO LSNF TERBARU.png', 'WORKING'),
(17, 'nkbgkreghk', 2, 'ksdhfjlksdhjpgf', 8942, '2023-07-20 13:37:08', NULL, 'profilfaris1.jpeg', 'WORKING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `occupation`
--

CREATE TABLE `occupation` (
  `id_occupation` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `occupation`
--

INSERT INTO `occupation` (`id_occupation`, `name`) VALUES
(1, 'Designer'),
(2, 'Digital Marketing'),
(3, 'Photo Product');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_occupation` (`occupation_nama`);

--
-- Indeks untuk tabel `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id_occupation`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id_occupation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`occupation_nama`) REFERENCES `occupation` (`id_occupation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
