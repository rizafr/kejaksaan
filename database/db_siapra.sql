-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2015 pada 02.30
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_siapra`
--
CREATE DATABASE `db_siapra` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_siapra`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(30) NOT NULL,
  `id_disposisi` int(10) NOT NULL,
  `tgl_paraf_kasi` date NOT NULL,
  `tgl_paraf_kajari` date NOT NULL,
  `status` varchar(5) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `tgl_agenda` date NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
  `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(30) NOT NULL,
  `isi_instruksi` text NOT NULL,
  `tgl_instruksi` date NOT NULL,
  `waktu_lama_instruksi` int(5) NOT NULL,
  `paraf_kasi` varchar(100) NOT NULL,
  `paraf_kajari` varchar(100) NOT NULL,
  `status_disposisi` varchar(5) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `id_instansi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(150) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `logo_instansi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaksa`
--

CREATE TABLE IF NOT EXISTS `jaksa` (
  `id_jaksa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jaksa` varchar(150) NOT NULL,
  PRIMARY KEY (`id_jaksa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Bagian Administrasi'),
(3, 'Kasi Pidum'),
(4, 'Kajari'),
(5, 'Jaksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `id_level` int(10) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_penahanan`
--

CREATE TABLE IF NOT EXISTS `posisi_penahanan` (
  `id_posisi_penahanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_posisi_penahanan` varchar(100) NOT NULL,
  `lama_posisi_penahanan` int(10) NOT NULL,
  PRIMARY KEY (`id_posisi_penahanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `posisi_penahanan`
--

INSERT INTO `posisi_penahanan` (`id_posisi_penahanan`, `nama_posisi_penahanan`, `lama_posisi_penahanan`) VALUES
(1, 'Penyidik', 20),
(2, 'Perpanjangan Tuntutan Hukum', 40),
(3, 'Pengadilan', 30),
(4, 'Penuntut Umum', 20),
(5, 'Perpanjangan Pengadilan', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_perkara`
--

CREATE TABLE IF NOT EXISTS `posisi_perkara` (
  `id_posisi_perkara` int(11) NOT NULL AUTO_INCREMENT,
  `nama_posisi_perkara` varchar(300) NOT NULL,
  PRIMARY KEY (`id_posisi_perkara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `posisi_perkara`
--

INSERT INTO `posisi_perkara` (`id_posisi_perkara`, `nama_posisi_perkara`) VALUES
(1, 'Pemberitahuan Mulainya Penyidikan (SPDP)'),
(2, 'Penelitian'),
(3, 'Pengecekan Berkas'),
(4, 'Pelimpahan Berkas Perkara'),
(5, 'Pembacaan Dakwaan'),
(6, 'Pemeriksaan Saksi'),
(7, 'Pemeriksaan Ahli'),
(8, 'Pemeriksaan Tersangka'),
(9, 'Pembacaan Tuntutan'),
(10, 'Putusan Pengadilan'),
(11, 'Upaya Hukum'),
(12, 'Eksekusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_instansi`
--

CREATE TABLE IF NOT EXISTS `struktur_instansi` (
  `id_struktur_instansi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ketua` varchar(150) NOT NULL,
  `nama_sekretaris` varchar(150) NOT NULL,
  `nama_bendahara` varchar(150) NOT NULL,
  PRIMARY KEY (`id_struktur_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_surat_masuk` varchar(30) NOT NULL,
  `no_surat_masuk` varchar(15) NOT NULL,
  `asal_surat_masuk` varchar(100) NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `status_surat_masuk` varchar(5) NOT NULL,
  `perihal_surat_masuk` text NOT NULL,
  `index_surat_masuk` varchar(100) NOT NULL,
  `no_agenda` varchar(30) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_posisi_penahanan`
--

CREATE TABLE IF NOT EXISTS `transaksi_posisi_penahanan` (
  `id_transaksi_posisi_penahanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(30) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `id_posisi_penahanan` int(10) NOT NULL,
  PRIMARY KEY (`id_transaksi_posisi_penahanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_posisi_perkara`
--

CREATE TABLE IF NOT EXISTS `transaksi_posisi_perkara` (
  `id_transaksi_posisi_perkara` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` varchar(30) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `id_jaksa` int(5) NOT NULL,
  `perkara` varchar(250) NOT NULL,
  `nama_terdakwa` varchar(100) NOT NULL,
  `id_posisi_perkara` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `ket` varchar(150) NOT NULL,
  PRIMARY KEY (`id_transaksi_posisi_perkara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
