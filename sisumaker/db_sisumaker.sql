-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2020 pada 13.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisumaker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenissurat` int(11) NOT NULL,
  `kode_jenissurat` varchar(10) NOT NULL,
  `nama_jenissurat` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenissurat`, `kode_jenissurat`, `nama_jenissurat`, `id_user`) VALUES
(7, 'JS001', 'Permohonan', 1),
(8, 'JS002', 'Undangan', 1),
(9, 'JS003', 'Peringatan', 1),
(10, 'JS004', 'Himbauan', 1),
(11, 'JS005', 'Pemberitahuan', 1),
(12, 'JS006', 'Edaran', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_legalisir`
--

CREATE TABLE `tb_legalisir` (
  `id_legalisir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noreg` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_legalisir`
--

INSERT INTO `tb_legalisir` (`id_legalisir`, `nama`, `noreg`, `tgl_keluar`, `alamat`, `keterangan`, `id_user`) VALUES
(6, 'Lismawandari', '474/55/KSL/SEKRET/2020', '2020-09-17', 'Raden Fatah Pondok Indah', 'KTP', 1),
(7, 'Efendi', '474/54/KSL/SEKRET/2020', '2020-09-17', 'Jalan Raden Fatah', 'KK', 1),
(8, 'Pattrad Tua', '474/53/KSL/SEKRET/2020', '2020-09-12', 'JL Negara 5', 'KK', 1),
(9, 'Erasya', '474/56/KSL/SEKRET/2020', '2020-09-17', 'Sumur Dewa', 'KK', 1),
(10, 'Dodi Hartono', '474/57/KSL/SEKRET/2020', '2020-09-20', 'Sukarami', 'KK', 1),
(11, 'Serikandi', '474/58/KSL/SEKRET/2020', '2020-09-20', 'Sukarami', 'KK', 1),
(12, 'Sutrisno', '474/42/KSL/SEKRET/2020', '2020-09-14', 'Perum Betungan', 'KK', 1),
(13, 'Biro Saputra', '474/43/KSL/SEKRET/2020', '2020-09-14', 'Jalan H. Adam Moksin', 'KK', 1),
(14, 'Yeza Saputra', '474/44/KSL/SEKRET/2020', '2020-09-14', 'Jalan H Agam Moksin', 'Akte', 1),
(15, 'Sokjan Arsaid', '474/45/KSL/SEKRET/2020', '2020-09-15', 'Jl Ranarkan Blob', 'KK', 1),
(16, 'Dodi Haraso', '474/46/KSL/SEKRET/2020', '2020-09-15', 'Perum BNA', 'KK', 1),
(17, 'Efriadi', '474/47/KSL/SEKRET/20', '2020-09-16', 'Jl Pancurmas 2 Perum BNA Blok E15', 'KK', 1),
(18, 'Baryan Martura Lubis', '474/48/KSL/SEKRET/2020', '2020-09-16', 'Jl Pancurmas RT10 RW 02 Kel Sukarami', 'KK', 1),
(19, 'M Fiktri Lubis', '474/49/KSL/SEKRET/2020', '2020-09-16', 'Jl Pancurmas RT10 RW 02 Kel Sukarami', 'Akte', 1),
(20, 'Shesya Nayla Putri', '474/50/KSL/SEKRET/2020', '2020-09-17', 'Pagar Dewa', 'Akte', 1),
(21, 'Muslim', '474/51/KSL/SEKRET/2020', '2020-09-17', 'Raden Fatah', 'KK', 1),
(22, 'Elsa Putri', '474/52/SEKRET/2020', '2020-09-17', 'Perum Pondok Indah Sukarami', 'Akte', 1),
(23, 'Khairul Kenedi', '474/33/KS/SEKRET/2020', '2020-09-04', 'JL Air Selagan IV No 74 RT 12/002', 'KK', 1),
(24, 'Heru Ashadi', '474/34/KSL/SEKRET/2020', '2020-09-14', 'Jl Sungai Rupat RT 39 RW 07', 'KK', 1),
(25, 'Peroki Simanjuntak', '474/35/KSL/SEKRET/2020', '2020-09-14', 'Jalan Raden Fatah', 'KK', 1),
(26, 'Sunarko', '474/36/KSL/SEKRET/2020', '2020-09-14', 'Jalan Re Martadinata', 'KK', 1),
(27, 'Rahmi', '474/37/KSL/SEKRET/2020', '2020-09-14', 'Jalan Air Sebakul', 'KK', 1),
(28, 'Efriadi', '474/38/KSL/SEKRET/2020', '2020-09-14', 'Jl Pancurmas', 'KK', 1),
(29, 'Srikandi', '474/39/KSL/SEKRET/2020', '2020-09-14', 'Perum BNA', 'KK', 1),
(30, 'Ade Kosasi', '474/40/KSL/SEKRET/2020', '2020-09-14', 'Jalan Garing urus', 'KK', 1),
(31, 'Aryanto', '474/56/KSL/SEKRET/2020', '2020-09-14', 'Jalan Re Martadinata', 'KK', 1),
(32, 'Aryanto', '474/41/KSL/SEKRET/2020', '2020-09-14', 'Jalan Re Martadinata', 'KK', 1),
(33, 'Catur Afdinal Surono', '474/24/KSL/SEKRET/2020', '2020-07-03', 'JL pancur mas perum bna blok d no 13', 'KK', 1),
(34, 'Mahput', '474/25/KSL/SEKRET/2020', '2020-07-03', 'Jalan Re Martadinata', 'KK', 1),
(35, 'Rama Setiawan', '474/26/KSL/SEKRET/2020', '2020-07-13', 'Jl Bumi Ayu', 'Surat Keterangan', 1),
(36, 'Ferdian Delta', '474/27/KSL/SEKRET/2020', '2020-08-03', 'Jalan Deputi Negara VII No 11', 'Ket Ahli Waris', 1),
(37, 'Mashudulak', '800/28/KSL/SEKRET/2020', '2020-08-12', '-', 'Pesyaratan Pensiun', 1),
(38, 'Efendi', '800/29/KSL/SEKRET/2020', '2020-08-13', '-', 'Pesyaratan Pensiun', 1),
(39, 'Misnah', '474/30/KSL/SEKRET/2020', '2020-08-13', 'Jl aru jajar', 'KK', 1),
(40, 'Siti Mazna', '474/31/KSL/SEKRET/2020', '2020-08-28', 'Jalan Deputi Negara RT 2 Rw 1', 'KTP', 1),
(41, 'Siti Mazna', '474/32/KSL/SEKRET/2020', '2020-08-28', 'Jalan Deputi Negara RT 2 Rw 1', 'Pesyaratan Pensiun', 1),
(42, 'Wahyudi Santoso', '474/14/KSL/SEKRET/2020', '2020-03-13', 'Perum Citra Garden Blok A2 RT 20 RW 004', 'KTP', 1),
(43, 'Wahyudi Santoso', '474/15/KSL/SEKRET/2020', '2020-03-13', 'Perum Citra Garden Blok A2 RT 20 RW 004', 'KK', 1),
(44, 'Wiwin Indarti', '474/16/KSL/SEKRET/2020', '2020-05-11', 'Jalan Padat Karya ', 'KK', 1),
(45, 'Yenni Fetrianingsih', '800/18/KSL/SEKRET/20', '2020-05-12', '-', 'Persyaratan Naik Pangkat', 1),
(46, 'Zulkifli', '474/19/KSL/SEKRET/2020', '2020-05-13', 'JL Deputi Negara nomor 12', 'KK', 1),
(47, 'Mahdani', '800/20/KSL/SEKRET/2020', '2020-05-13', 'JL Hibrida 1 No 23', 'Persyaratan Pensiun', 1),
(48, 'Novindo Malindo', '474/21/KSL/SEKRET/2020', '2020-05-27', 'Perum Green View RT 60 RW 03 Kel Betungan', 'Identitas Diri', 1),
(49, 'Djuharto. ZR S.Sos', '800/22/KSL/SEKRET/2020', '2020-06-09', 'ASN Kel Pagar Dewa', 'Persyaratan Naik Pangkat', 1),
(50, 'Eritawati', '800/23/KSL/SEKRET/2020', '2020-06-24', 'JL Tanjung Permain', 'Persyaratan Pensiun', 1),
(51, 'Nilawati', '800/07/KSL/SEKRET/2020', '2020-01-23', '-', 'SKP', 1),
(52, 'Baharudin', '474/08/KSL/SEKRET/2020', '2020-01-23', 'Jalan Padat Karya ', 'KK', 1),
(53, 'Witono', '474/09/KSL/SEKRET/2020', '2020-02-07', 'Jl Sungai Rupat 13', 'KK', 1),
(54, 'Iskandar', '474/10/KSL/SEKRET/2020', '2020-02-12', 'JL Deputi Negara', 'KK', 1),
(55, 'Suryadi', '474/12/KSL/SEKRET/2020', '2020-02-19', 'Jl Bumi Ayu', 'KK', 1),
(56, 'Baharudin', '474/11/KSL/SEKRET/2020', '2020-02-17', 'Jalan Bumi Ayu', 'KK', 1),
(57, 'Soni Febriani', '474/13/KSL/SEKRET/2020', '2020-02-25', 'JL Deputi Negara', 'KTP', 1),
(58, 'Jahirin', '800/01/KSL/SEKRET/2020', '2020-01-04', '-', 'SKP', 1),
(59, 'Megri', '800/02/KSL/SEKRET/2020', '2020-01-06', '-', 'SKP', 1),
(60, 'Eka', '800/03/KSL/SEKRET/2020', '2020-01-06', '-', 'SKP', 1),
(61, 'Dian Puspita Sari', '800/04/KSL/SEKRET/2020', '2020-01-07', '-', 'SKP', 1),
(62, 'Emiza Winarti', '800/05/KSL/SEKRET/2020', '2020-01-08', '-', 'SKP', 1),
(63, 'Heni Suliswati', '800/06/KSL/SEKRET/2020', '2020-01-08', '-', 'SKP', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lemari`
--

CREATE TABLE `tb_lemari` (
  `id_lemari` int(11) NOT NULL,
  `kode_lemari` varchar(4) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lemari`
--

INSERT INTO `tb_lemari` (`id_lemari`, `kode_lemari`, `keterangan`, `id_user`) VALUES
(1, 'A', 'SURAT MASUK', 1),
(2, 'B', 'SURAT KELUAR', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(25) NOT NULL,
  `id_file` varchar(20) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_lemari` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`, `id_file`, `tahun`, `id_lemari`, `id_user`) VALUES
(1, 'Rak 1', 'A1', '2019', 1, 1),
(2, 'Rak 1', 'A2', '2020', 1, 1),
(3, 'Rak 1', 'B1', '2019', 2, 1),
(4, 'Rak 1', 'B2', '2020', 2, 1),
(5, 'Rak 2', 'A3', '2020', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spt`
--

CREATE TABLE `tb_spt` (
  `id_spt` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nosurat` varchar(30) NOT NULL,
  `tmt` date NOT NULL,
  `pengelola` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spt`
--

INSERT INTO `tb_spt` (`id_spt`, `tgl_keluar`, `nosurat`, `tmt`, `pengelola`, `keterangan`, `id_user`) VALUES
(5, '2019-12-10', '800/08/K.SL/Sekret/2019', '2019-12-10', 'Drs Sehmi, M.Pd', 'Untuk Menjadi Narasumber Dalam Penyusunan RUU dan RPK Tahun 2020', 1),
(6, '2020-03-16', '800/403/BKPP-IV/2020', '2020-03-16', 'Febby Herlita, S.Sos', 'Mengikuti Pelatihan Karakter Teladan Aparatur Sipil di Lingkungan Pemerintah Kota Bengkulu', 1),
(7, '2019-11-20', '800/20/KSL/SEKRET/2019', '2019-07-19', '-', 'SPT AN Hadi Sultan Sateri', 1),
(8, '2019-03-21', '800/21/KSL/SEKRET/2019', '2019-04-01', '-', 'SPT AN Hadi Sultan Sateri', 1),
(9, '2019-04-30', '800/22/KSL/SEKRET/2019', '2019-05-01', '-', 'SPT AN Hadi Sultan Sateri', 1),
(10, '2019-06-25', '800/23/KSL/SEKRET/2019', '2019-06-03', '-', 'SPT AN Eritawati', 1),
(11, '2019-06-25', '800/24/KSL/SEKRET/2019', '2019-06-10', '-', 'SPT AN Yenni Fetrianingsih', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nosurat` varchar(60) NOT NULL,
  `ringkasan` varchar(100) NOT NULL,
  `id_jenissurat` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tujuan`, `perihal`, `tgl_keluar`, `nosurat`, `ringkasan`, `id_jenissurat`, `id_suratmasuk`, `id_rak`, `id_user`, `keterangan`, `file`) VALUES
(2, 'Seluruh Lurah Sekecamatan Selebar Bengkulu', 'Undangan', '2020-02-05', '005/25/KSL/SEKRET/2020', 'Pembahasan masalah Keuangan WTP, PBB, dan lain-lain', 8, 0, 4, 1, '', 'SK_2020-02-05_Seluruh_Lurah_Sekecamatan_Selebar_Bengkulu1.jpeg'),
(3, 'Seluruh Lurah Sekecamatan Selebar Bengkulu', 'Peringatan HUT RI Ke-75 2020', '2020-08-14', '100/160/K.SL/Sekret/2020', 'Hal-hal yang harus dilaksanakan dalam peringatan HUT RI ke-75', 11, 0, 4, 1, '', 'SK_2020-08-14_Seluruh_Lurah_Sekecamatan_Selebar_Bengkulu1.jpeg'),
(6, 'Seluruh Lurah Sekecamatan Selebar Bengkulu', 'Himbauan', '2020-01-15', '300/.../KSL/SEKRET/2020', 'Persiapan perayaan Ultang Tahun Kota Bengkulu ke 301', 10, 0, 4, 1, '-', 'SK_2020-01-15_Seluruh_Lurah_Sekecamatan_Selebar_Bengkulu.jpeg'),
(7, 'Ketua Bawaslu Kecamatan Selebar Kota Bengkulu', 'Permohonan Peminjaman Barang', '2020-01-16', '023/08/KSL/SEKRET/2020', 'Peminjaman meja dan kursi', 7, 0, 4, 1, '', 'SK_2020-01-16_Ketua_Bawaslu_Kecamatan_Selebar_Kota_Bengkulu.jpeg'),
(8, 'Drs Sehmi MPd', 'Surat Keterangan', '2020-02-05', '300/26/KSL/SEKRET/2020', 'Surat keterangan tidak pernah dijatuhi hukuman disiplin tingkat sedang atau berat', 11, 0, 4, 1, '', 'SK_2020-02-05_Drs_Sehmi_MPd.jpeg'),
(9, 'Seluruh Lurah Sekecamatan Selebar Bengkulu', 'Himbauan Pelayanan New Normal', '2020-06-08', '800/121/KSL/SEKRET/2020', 'pelayanan new normal', 10, 0, 4, 1, '', 'SK_2020-06-08_Seluruh_Lurah_Sekecamatan_Selebar_Bengkulu.jpeg'),
(10, 'Sekretaris Daerah Kota Bengkulu', 'Permohonan penandatanganan surat persetujuan', '2020-03-24', '800/80/KSL/SEKRET/2020', 'Permohonan penandatanganan surat persetujuan untuk mengikuti seleksi terbuka pengisian jabatan JPT', 7, 0, 4, 1, '', 'SK_2020-03-24_Sekretaris_Daerah_Kota_Bengkulu.jpeg'),
(11, 'Kepala Dinas Sosial Kota Bengkulu', 'Permohonan Bantuan Rumah', '2020-08-03', '600/148/KSL/PMK/2020', 'Bantuan Rumah Korban Kebakaran', 7, 0, 4, 1, '', 'SK_2020-08-03_Kepala_Dinas_Sosial_Kota_Bengkulu.jpeg'),
(12, 'Kepala BPKAD Kota Bengkulu', 'Permohonan Peminjaman BPKB', '2020-08-06', '800/152/KSL/SEKRET/2020', 'Permohonan Peminjaman BPKB Motor BD-5669-AY dan BD-257-CY', 7, 0, 4, 1, '', 'SK_2020-08-06_Kepala_BPKAD_Kota_Bengkulu.jpeg'),
(13, 'Seluruh Lurah Sekecamatan Selebar Bengkulu', 'Tanggap Darurat', '2020-08-07', '800/150/KSL/SEKRET/2020', 'Rapat Tanggap Darurat', 11, 0, 4, 1, '', 'SK_2020-08-07_Seluruh_Lurah_Sekecamatan_Selebar_Bengkulu.jpeg'),
(14, 'Kepala Kelurahan Betungan', 'Penyampaian Data Tunggakan Pajak Kendaraan Dinas', '2020-09-09', '800/209/KSL/SEKRET/2020', 'Penyampaian Data Tunggakan Pajak Kendaraan Dinas', 8, 0, 4, 1, '', 'SK_2020-09-09_Kepala_Kelurahan_Betungan.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `nosurat` varchar(50) NOT NULL,
  `ringkasan` varchar(100) NOT NULL,
  `pejabat` varchar(25) NOT NULL,
  `disposisi` varchar(100) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenissurat` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `pengirim`, `perihal`, `tgl_masuk`, `tgl_terima`, `nosurat`, `ringkasan`, `pejabat`, `disposisi`, `id_rak`, `id_user`, `id_jenissurat`, `keterangan`, `file`) VALUES
(29, 'BAWASLU kecamata Selebar', 'Permohonan Peminjaman Barang', '2020-01-06', '2020-01-07', '02/K.BE-06/TU.00.01/I/2020', 'Kegiatan Pemilihan Serentak Pemilihan Gubernur dan Wakil Gubernur Provinsi Bengkulu 2019', 'Tidak Ada', 'segera', 2, 1, 7, '', 'SM_2020-01-06_BAWASLU_kecamata_Selebar.jpeg'),
(30, 'Pemerintah Kota Bengkulu', 'Undangan', '2020-03-03', '2020-03-04', '005/32/D.Kes/III/2020', 'Pembentukan Panitia Penyelenggara Hari Jadi Kota Bengkulu Ke-301 Tahun 2020', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-03-03_Pemerintah_Kota_Bengkulu.jpeg'),
(31, 'Pemerintah Kota Bengkulu', 'Undangan', '2020-03-06', '2020-03-07', '005/121/D.PKP/2020', 'Upacara Ulang Tahun Damkar ke 101, Satpol PP ke 70, dan Satlinmas Ke 58', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-03-06_Pemerintah_Kota_Bengkulu.jpeg'),
(33, 'Pemerintah Kota Bengkulu', 'Pemberitahuan PPDB', '2020-06-18', '2020-06-19', '421.3/51/1003/Pemb/2020', 'Informasi Jumlah RT, RW dan Penduduk', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-06-19_Pemerintah_Kota_Bengkulu.jpeg'),
(36, 'Universitas prof DR hazairin SH', 'Undangan Acara', '2020-06-29', '2020-06-30', '45/LPPM-Unihaz/A-6/VI/2020', 'Undangan upacara pelepasan peserta KKN periode XXXI Tahun 2020', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-06-29_Universitas_prof_DR_hazairin_SH.jpeg'),
(37, 'PLN', 'Izin Penanaman Tiang dan Pembebasan Tanam Tumbuh', '2020-03-24', '2020-03-25', '0166/HKM.07.02/110100/2020', 'Pembangunan Jaringan Listrik Saluran Udara Tegangan Menengah (SUTM) ', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-03-24_PLN.jpeg'),
(38, 'Pemerintah Kota Bengkulu', 'Pemberlakuan peraturan walikota bengkulu nomor 4 tahun 2020', '2020-03-27', '2020-03-28', '800/540/BKPP/2020', 'peraturan tentang pemberian tambahan penghasilan lain PNS dan CPNS', 'Tidak Ada', '', 2, 1, 12, '', 'SM_2020-03-27_Pemerintah_Kota_Bengkulu.jpeg'),
(40, 'Pemerintah Kota Bengkulu', 'Verifikasi Data LPPD Perangkat Daerah Tahun 2020', '2020-01-17', '2020-01-20', '001/22/V/Insp/2020', 'Laporan dan Evaluasi Penyelenggaraan Pemerintahan Daerah', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-01-17_Pemerintah_Kota_Bengkulu.jpeg'),
(41, 'Pemerintah Kota Bengkulu', 'Penyampaian IsianDUK dan Rekapitulasi Data PNS', '2020-01-09', '2020-01-10', '800/53/BKPP/2020', 'Pemberitahuan Format Laporan Isian DUK', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-01-09_Pemerintah_Kota_Bengkulu.jpeg'),
(42, 'Pondok Pesantern As-Salam', 'Undangan Tabligh Akbar dan Pertemuan Wali Santri', '2020-02-12', '2020-02-13', '125/YPAS/PPA/III/2020', 'Undangan Acara', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-02-12_Pondok_Pesantern_As-Salam.jpeg'),
(43, 'Pemerintah Kota Bengkulu', 'Undangan', '2020-02-25', '2020-02-26', '005/44/B.Kebangsaan/2020', 'Undangan HUT Kota Bengkulu', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-02-25_Pemerintah_Kota_Bengkulu.jpeg'),
(44, 'Pemerintah Kota Bengkulu', 'Perintah Untuk Prioritas Pemanfaatn Guest House R', '2020-01-27', '2020-01-28', '700/40/V/Insp', 'Pemanfaatan Bangunan sebagai tempat pengadaan kegiatan diluarkantor', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-01-27_Pemerintah_Kota_Bengkulu.jpeg'),
(45, 'Pegadaian', 'Permintaan Audisensi dan Literasi Produk PT. Pegadaian', '2020-08-04', '2020-08-05', '477/10687.00/2019', 'Permintaan Audisensi dan Literasi Produk PT. Pegadaian', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-08-04_Pegadaian.jpeg'),
(46, 'Kelurahan Betungan', 'Undangan', '2020-09-04', '2020-09-07', '005/320/09/1003/Pem/2020', 'Undangan musyawarah penyelesaian masalah tanah', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-09-04_Kelurahan_Betungan.jpeg'),
(47, 'Kelurahan Pagar Dewa', 'Surat Keterangan Kebakaran', '2020-08-03', '2020-08-03', '474/237/1002/2020', 'Informasi Kerugian Atas Kebakaran atas nama Jonsi Hamza', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-08-03_Kelurahan_Pagar_Dewa.jpeg'),
(48, 'Kejaksaan Negeri Bengkulu', 'Permohonan Bantuan untuk mengumumkan Pengembalian Barang Bukti di Kantor Kecamatan', '2020-05-08', '2020-05-11', 'B-503/L.7.10/Eoh.3/2020', 'Permohonan Bantuan untuk mengumumkan Pengembalian Barang Bukti di Kantor Kecamatan', 'Tidak Ada', '', 2, 1, 7, '', 'SM_2020-05-08_Kejaksaan_Negeri_Bengkulu.jpeg'),
(49, 'Pemerintah Kota Bengkulu', 'Penyederhanaan Birokrasi Pada Jabatan Administrasi', '2020-02-06', '2020-02-07', '061/KP/B.VII', 'Pengisian Formulir', 'Tidak Ada', '', 2, 1, 7, '', 'SM_2020-02-06_Pemerintah_Kota_Bengkulu.jpeg'),
(50, 'Korem Garuda Emas', 'Undangan', '2020-06-22', '2020-06-22', 'B/276/VI/2020', 'Undangan Komunikasi Sosial', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-06-22_Korem_Garuda_Emas.jpeg'),
(51, 'Kelurahan Betungan', 'Pengukuhan LPM dan CMB', '2020-07-15', '2020-07-15', '450/201/07/1003/2020', 'Undangan Pelantikan', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-07-15_Kelurahan_Betungan.jpeg'),
(52, 'Pemerintah Kota Bengkulu', 'Surat Edaran', '2020-03-27', '2020-03-30', '800/540/BKPP.IV/2020', 'Surat edaran peraturan walikota', 'Tidak Ada', '', 2, 1, 11, '', 'SM_2020-03-27_Pemerintah_Kota_Bengkulu1.jpeg'),
(53, 'Polda Bengkulu', 'Undangan', '2020-04-16', '2020-04-16', 'B/401/IV/2020', 'Launching Dapur Umum', 'Tidak Ada', '', 2, 1, 8, '', 'SM_2020-04-16_Polda_Bengkulu.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `id_sessions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `no_hp`, `level`, `blokir`, `id_sessions`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '123465', 'admin', 'N', ''),
(2, 'operator', 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator@gmail.com', '1234', 'operator', 'N', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenissurat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_legalisir`
--
ALTER TABLE `tb_legalisir`
  ADD PRIMARY KEY (`id_legalisir`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_lemari`
--
ALTER TABLE `tb_lemari`
  ADD PRIMARY KEY (`id_lemari`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `id_lemari` (`id_lemari`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_spt`
--
ALTER TABLE `tb_spt`
  ADD PRIMARY KEY (`id_spt`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD KEY `id_jenissurat` (`id_jenissurat`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenissurat` (`id_jenissurat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenissurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_legalisir`
--
ALTER TABLE `tb_legalisir`
  MODIFY `id_legalisir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_lemari`
--
ALTER TABLE `tb_lemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_spt`
--
ALTER TABLE `tb_spt`
  MODIFY `id_spt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD CONSTRAINT `tb_jenis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_legalisir`
--
ALTER TABLE `tb_legalisir`
  ADD CONSTRAINT `tb_legalisir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_lemari`
--
ALTER TABLE `tb_lemari`
  ADD CONSTRAINT `tb_lemari_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD CONSTRAINT `tb_rak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rak_ibfk_2` FOREIGN KEY (`id_lemari`) REFERENCES `tb_lemari` (`id_lemari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_spt`
--
ALTER TABLE `tb_spt`
  ADD CONSTRAINT `tb_spt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD CONSTRAINT `tb_suratkeluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratkeluar_ibfk_2` FOREIGN KEY (`id_jenissurat`) REFERENCES `tb_jenis` (`id_jenissurat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratkeluar_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD CONSTRAINT `tb_suratmasuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratmasuk_ibfk_2` FOREIGN KEY (`id_jenissurat`) REFERENCES `tb_jenis` (`id_jenissurat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratmasuk_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
