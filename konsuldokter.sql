-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2023 pada 04.36
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsuldokter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `spesialis` varchar(126) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id`, `nama_dokter`, `spesialis`, `telepon`, `alamat`, `gambar`) VALUES
(11, 'Anggun Melati Rahayu Ph.D', 'Anak', '62897563345', 'Yogyakarta', 'download1.jpg'),
(12, 'Dave', 'Hati', '6289667757413', 'Surabaya', 'portrait-of-a-happy-young-doctor-in-his-clinic-royalty-free-image-16614324412.jpg'),
(13, 'Arc', 'Kulit', '6285493049348', 'Jakarta', 'sinopsis-doctor-chajpg-20230416124144.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(11) NOT NULL,
  `id_data_dokter` int(11) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam_praktek` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `id_data_dokter`, `hari`, `jam_praktek`) VALUES
(2, 11, 'Senin', '09.00-14.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `id_data_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `dokter` varchar(128) NOT NULL,
  `pasien` varchar(128) NOT NULL,
  `usia` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_konsultasi` time NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `id_data_dokter`, `id_pasien`, `dokter`, `pasien`, `usia`, `tanggal`, `waktu_konsultasi`, `no_telepon`, `status`) VALUES
(23, 12, 4, 'Dave', 'Riki Awaludin', 21, '2023-08-19', '13:36:00', '6289667757413', 'Confirmed'),
(24, 12, 5, 'Dave', 'Riki Awaludin', 21, '2023-08-21', '13:38:00', '6289667757413', 'Confirmed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(250) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `usia` int(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(10) NOT NULL,
  `is_active` int(2) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `telepon`, `alamat`, `usia`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Nita Misbahullail', 'nitamisbahullail@gmail.com', 'Gambar_WhatsApp_2023-02-27_pukul_21_38_531.jpg', '+6289736485937', 'Cisaranten', 19, '$2y$10$RoiEiVt0ANQ0DHAYWK6EX.dXv2nuwE473ShU2M2u8kVaFKXOGnSLa', 1, 1, 1690005623),
(4, 'Riki Awaludin', 'awaludinriki61@gmail.com', 'default.jpg', '+628955773474', 'Cigondewah', 21, '$2y$10$pAzDf3ZNMYHqYaouav/GD.Q8fr3wP2bBnJA4WBuIL1W5wBu2HmqPe', 2, 1, 1690273329),
(5, 'Riki Awaludin', 'aplikasireservasi@gmail.com', 'default.jpg', '+6287327492737', 'Bandung', 21, '$2y$10$rv12OtpU0i1GOW6gUszONOsjK2QNeolL4/CDn/Yl6whEJ5fqIQ27q', 2, 1, 1690424578);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 2),
(4, 1, 1),
(6, 1, 3),
(7, 2, 4),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(4, 'Janji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(126) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Profil Saya', 'user/index', 'fas fa-fw fa-user', 1),
(2, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-hospital-alt', 1),
(3, 1, 'Data Dokter', 'admin/datadokters', 'fas fa-fw fa-user-md', 1),
(4, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 2, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-lock', 1),
(6, 4, 'Reservasi', 'reservasi/index', 'fas fa-fw fa-calendar-alt', 1),
(7, 1, 'Data User', 'admin/datausers', 'fas fa-fw fa-users', 0),
(8, 1, 'Jadwal Dokter', 'admin/jadwaldokter', 'fas fa-fw fa-calendar-plus', 1),
(9, 1, 'Permintaan Pasien', 'admin/permintaanpasien', 'fas fa-users', 1),
(10, 4, 'Status Reservasi', 'reservasi/statusreservasi', 'fas fa-fw fa-address-card', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `name`, `email`, `token`, `date_created`) VALUES
(1, '', 'aplikasireservasi@gmail.com', 'NDcT7/NhXcJSc26ni+/yQaQUYIJc38zdHC3rTvxq1Y8=', 1692331642);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_data_dokter` (`id_data_dokter`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_data_dokter` (`id_data_dokter`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_data_dokter`) REFERENCES `data_dokter` (`id`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_data_dokter`) REFERENCES `data_dokter` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
