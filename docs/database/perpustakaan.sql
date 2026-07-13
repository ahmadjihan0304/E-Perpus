-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2026 pada 18.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `lokasi_rak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`, `lokasi_rak`) VALUES
(1, 'MISTERI LAPTOP GHAIB ANAK IT', 1, 'saya sendiri', 'nda tawu', '2025', 10, 'A1'),
(2, 'Mengejar Tugas Pemweb', 2, 'saya ', 'w', '2024', 4, '1B'),
(3, 'TUTORIAL JAGO BIKIN PROGRAM TANPA SKILL CODING', 4, 'saya sendiri', 'NGOTAK STUDIO', '2025', 1, '1C'),
(4, 'KISAH CINTA KELAS 3E', 3, 'sayah', 'sayah juga', '2025', 12, '1D'),
(5, 'MASTERING Machine Learning', 4, 'sayah', 'sayah juga', '2025', 1, '1C'),
(6, 'Memahami anak ngabers', 2, 'yondaktau', 'aku', '2025', 5, '1B'),
(7, 'Belajar SQL Dasar', 4, 'Andi', 'Informatika', '2023', 5, 'A1'),
(8, 'Pemrograman Web Lanjut', 4, 'Budi', 'Elex Media', '2022', 3, 'A2'),
(9, 'Cerita Horor Malam Jumat', 1, 'Citra', 'Gramedia', '2021', 7, 'B1'),
(10, 'Stand Up Comedy Indonesia', 2, 'Deni', 'Kompas', '2020', 4, 'B2'),
(11, 'Romansa di Kampus', 3, 'Eka', 'Mizan', '2023', 6, 'C1'),
(12, 'Python untuk Pemula', 4, 'Fajar', 'Informatika', '2024', 2, 'A3'),
(13, 'Hantu di Perpustakaan', 1, 'Gina', 'Gramedia', '2025', 5, 'B1'),
(14, 'Ngakak Bareng Komika', 2, 'Hadi', 'Kompas', '2023', 3, 'B2'),
(15, 'Cinta Tak Sampai', 3, 'Intan', 'Mizan', '2022', 4, 'C1'),
(16, 'Machine Learning Praktis', 4, 'Joko', 'Elex Media', '2025', 1, 'A4'),
(17, 'SQL Advanced', 4, 'Kiki', 'Informatika', '2023', 5, 'A1'),
(18, 'Web Design Modern', 4, 'Lina', 'Elex Media', '2022', 3, 'A2'),
(19, 'Misteri Rumah Kosong', 1, 'Mira', 'Gramedia', '2021', 7, 'B1'),
(20, 'Sarjana Komedi \"S.KOM\"', 2, 'Nino', 'Kompas', '2020', 4, 'B2'),
(21, 'Cinta di Perpustakaan', 3, 'Oka', 'Mizan', '2023', 6, 'C1'),
(22, 'Java untuk Pemula', 4, 'Putra', 'Informatika', '2024', 2, 'A3'),
(23, 'Hantu di Asrama', 1, 'Qila', 'Gramedia', '2025', 5, 'B1'),
(24, 'Ngakak Bareng Standup', 2, 'Rian', 'Kompas', '2023', 3, 'B2'),
(25, 'Cinta SMA', 3, 'Sinta', 'Mizan', '2022', 4, 'C1'),
(26, 'AI dan Masa Depan', 4, 'Tono', 'Elex Media', '2025', 1, 'A4'),
(27, 'Database MySQL', 4, 'Uli', 'Informatika', '2023', 5, 'A1'),
(28, 'Frontend Developer', 4, 'Vina', 'Elex Media', '2022', 3, 'A2'),
(29, 'Misteri Kampus Tua', 1, 'Wawan', 'Gramedia', '2021', 7, 'B1'),
(30, 'Komedi Mahasiswa', 2, 'Xena', 'Kompas', '2020', 4, 'B2'),
(31, 'Cinta Online', 3, 'Yogi', 'Mizan', '2023', 6, 'C1'),
(32, 'React JS Dasar', 4, 'Zara', 'Informatika', '2024', 2, 'A3'),
(33, 'Hantu di Lift', 1, 'Ayu', 'Gramedia', '2025', 5, 'B1'),
(34, 'Ngakak Bareng Teman', 2, 'Bayu', 'Kompas', '2023', 3, 'B2'),
(35, 'Cinta di Musim Hujan', 3, 'Cici', 'Mizan', '2022', 4, 'C1'),
(36, 'Deep Learning', 4, 'Dodi', 'Elex Media', '2025', 1, 'A4'),
(37, 'SQL Optimization', 4, 'Evi', 'Informatika', '2023', 5, 'A1'),
(38, 'Vue JS Modern', 4, 'Fani', 'Elex Media', '2022', 3, 'A2'),
(39, 'Misteri Gedung Tua', 1, 'Gilang', 'Gramedia', '2021', 7, 'B1'),
(40, 'Komedi Keluarga', 2, 'Hana', 'Kompas', '2020', 4, 'B2'),
(41, 'Cinta di Desa', 3, 'Iwan', 'Mizan', '2023', 6, 'C1'),
(42, 'Node JS Praktis', 4, 'Jeni', 'Informatika', '2024', 2, 'A3'),
(43, 'Hantu di Toilet', 1, 'Kamal', 'Gramedia', '2025', 5, 'B1'),
(44, 'Ngakak Bareng Keluarga', 2, 'Lusi', 'Kompas', '2023', 3, 'B2'),
(45, 'Cinta di Pagi Hari', 3, 'Miko', 'Mizan', '2022', 4, 'C1'),
(46, 'Data Science', 4, 'Nana', 'Elex Media', '2025', 1, 'A4'),
(47, 'Cara Cepat Jadi Programmer Tanpa Ngoding', 4, 'Anonim', 'Ngimpi Press', '2025', 3, 'X1'),
(48, 'Ngopi Dulu Sebelum Debug', 2, 'KopiKoding', 'Santuy Media', '2024', 5, 'X2'),
(49, 'Romantis Tapi Error 404', 3, 'Cinta Segitiga', 'BrokenHeart Publisher', '2023', 2, 'X3'),
(50, 'Tutorial Hidup Tanpa Skripsi', 4, 'Mahasiswa Abadi', 'Lulusin Aja', '2025', 1, 'X4'),
(51, 'Hantu Deadline Menyapa di Tengah Malam', 1, 'Si Penunggu Tugas', 'Gramedia Mistis', '2025', 4, 'X5'),
(52, 'Stand Up Coding: Ketawa Sambil Compile', 2, 'Komika Dev', 'Ngakak Studio', '2022', 6, 'X6'),
(53, 'Cinta Ditolak, Debug Bertindak', 3, 'Si Tukang Fix Bug', 'Heartbreak Compiler', '2023', 3, 'X7'),
(54, 'Ngoding di Tengah Lautan Masalah', 4, 'Si Pelaut StackOverflow', 'Survivor Dev', '2025', 2, 'X8'),
(55, 'Misteri Keyboard yang Bisa Ngetik Sendiri', 1, 'Ghost Coder', 'Paranormal Tech', '2025', 1, 'X9'),
(56, 'Komedi Kampus: Skripsi Jadi Stand Up Materi', 2, 'Standup Mahasiswa', 'Ketawa Terus', '2024', 5, 'X10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Horror'),
(2, 'Comedy'),
(3, 'Romance'),
(4, 'Education'),
(7, 'Fiction');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jurusan`, `angkatan`, `no_hp`, `alamat`, `id_user`) VALUES
(1, '2313020200', 'Darmo W', 'TI', '2023', '0812345678', 'kediri', 2),
(2, '2310101022', 'rama', 'TI', '2024', '0819999999', 'lek', 3),
(3, '123131313', 'eko', 'TM', '2022', '08999999999', 'OK', 4),
(4, '2313134567', 'nana sniper', 'TS', '2011', '081268038211', 'Hope County', 5),
(5, '2373193181', 'nanda', 'THHI', '2020', '08183913617', 'Jogja', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `status`) VALUES
(3, 1, 1, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(4, 2, 1, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(5, 2, 1, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(6, 3, 1, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(7, 3, 1, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(8, 3, 5, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(9, 4, 5, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(10, 3, 2, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(11, 2, 3, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(12, 2, 51, '2025-11-01', NULL, '2025-11-01', 'dikembalikan'),
(13, 2, 20, '2025-11-01', NULL, '2025-11-02', 'dikembalikan'),
(14, 5, 20, '2025-11-01', NULL, '2025-11-02', 'dikembalikan'),
(15, 6, 29, '2025-11-01', NULL, '2025-11-04', 'dikembalikan'),
(16, 3, 3, '2025-11-02', NULL, '2025-11-02', 'dikembalikan'),
(17, 2, 3, '2025-11-04', NULL, NULL, 'dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$7bU5aJSjGfoQVbMP6iBh.OThVVxw8n5NWU412lgzrJqlDAdEJpx2e', 'admin'),
(2, 'darmo', '$2y$10$1Krj3q.Qfj.ClezBOYH5WekGpk0TE4yc5UAAg4qXcl9sQxGucmb1G', 'admin'),
(3, 'rama', '$2y$10$rJdbRpSs2b8v6.EQg9.4F.zTPGjy2yoJ3aQG94C9iz8Y1.7p1/7qS', 'mahasiswa'),
(4, 'eko', '$2y$10$sq.lvJGrqIaXc38l6ZyYq.ajMCB6YoWMQPZAXXh00R6FZdHX81HQy', 'mahasiswa'),
(5, 'nana', '$2y$10$8a4wGfTMb/wdzdanxXPLWuC4lazwzNcymYz0mwrbujAAaSAnExhf2', 'mahasiswa'),
(6, 'nanda', '$2y$10$NSYb16CCkr1Ea/rqk9192O8R6sBcC5/VZ.JNI2KL4zWyMwakKuKsK', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
