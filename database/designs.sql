-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jul 2024 pada 00.25
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
-- Database: `sibk1922_cloud_music`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `designs`
--

CREATE TABLE `designs` (
  `UID` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `filter` enum('Poster','Video','Logo','Art') NOT NULL DEFAULT 'Poster',
  `type` enum('work-image','gallery-link','work-content','work-video') NOT NULL DEFAULT 'work-image',
  `asset_link` varchar(255) DEFAULT NULL,
  `thumb_link` varchar(255) NOT NULL,
  `extra_link` longtext DEFAULT NULL,
  `p1_content` tinytext DEFAULT NULL,
  `p2_content` tinytext DEFAULT NULL,
  `caption_content` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `designs`
--

INSERT INTO `designs` (`UID`, `title`, `filter`, `type`, `asset_link`, `thumb_link`, `extra_link`, `p1_content`, `p2_content`, `caption_content`) VALUES
(1, 'Registration IWDM 2022', 'Poster', 'work-image', 'https://sibeux.my.id/images/works/iwdm-full.png', 'https://sibeux.my.id/images/works/iwdm.png', NULL, NULL, NULL, NULL),
(2, 'ID CARD Member BEM 2021/2022', 'Art', 'gallery-link', NULL, 'https://sibeux.my.id/images/works/id%20(1).png', '\"https://sibeux.my.id/images/works/id%20(2).png\"-\"https://sibeux.my.id/images/works/id%20(3).png\"-\"https://sibeux.my.id/images/works/id%20(4).png\"', NULL, NULL, NULL),
(3, 'Teaser Study Excursie 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=ZgBDq6sc_ec', 'images/works/teaser-se.png', NULL, NULL, NULL, NULL),
(4, 'Backdrop Study Excursie 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=fXktpTsh9hM', 'https://sibeux.my.id/images/works/back-se.png', NULL, NULL, NULL, NULL),
(5, 'The impression message of FORTRAN HIMASIF 2020', 'Video', 'work-content', 'https://sibeux.my.id/images/works/kesan.png', 'https://sibeux.my.id/images/works/pesan.png', 'https://www.youtube.com/watch?v=-lyoDSUDAA8', 'video impressions & messages during the implementation of FORTRAN HIMASIF 2022.', 'This video was made using the Kinemaster Android application.', 'View on Youtube'),
(6, 'Logo Catra Sahitya 2021/2022', 'Logo', 'work-content', 'https://raw.githubusercontent.com/bemilkomunej/bem-website/master/public/landing2/assets/img/cover%20kabinet.png', 'images/works/logos.png', 'https://www.instagram.com/p/Cc_40h-JXLF/', 'Logo of Catra Sahitya cabinet of BEM FASILKOM UNEJ period 2021/2022', NULL, 'View on Instagram'),
(7, 'Open Recruitmen BEM 2021/2022', 'Poster', 'gallery-link', NULL, 'images/works/oprec.png', '\"images/works/wawancara bem_2 1.png\"-\"images/works/wawancara bem 1.png\"', NULL, NULL, NULL),
(8, 'Coming Soon IDLE Fasilkom 2022', 'Poster', 'gallery-link', NULL, 'images/works/cs-idle.png', '\"images/works/cs-idle1.png\"-\"images/works/lr-idle.png\"', NULL, NULL, NULL),
(9, 'Teaser IWDM 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=HicxTDHWWyc', 'images/works/iwdm (2).png', NULL, NULL, NULL, NULL),
(10, 'Ied Mubarak 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=kkXMmEcAKfQ', 'images/works/ied.png', NULL, NULL, NULL, NULL),
(11, 'Ceremony Potong Pita IDLE 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=oSiAZ8nZAXc', 'images/works/op-idle.png', NULL, NULL, NULL, NULL),
(12, 'Live Report Study Excursie 2022', 'Video', 'work-video', 'https://www.youtube.com/shorts/PHA2ACkaGaA', 'images/works/lr-se.png', NULL, NULL, NULL, NULL),
(13, 'Coming Soon OPREC BEM 2022', 'Poster', 'work-image', 'images-works/oprec-cs (2).png', 'images-works/oprec-cs (1).png', NULL, NULL, NULL, NULL),
(14, 'Header Gform OPREC BEM 2022', 'Art', 'work-image', 'images-works/header-oprec (1).png', 'images-works/header-oprec (2).png', NULL, NULL, NULL, NULL),
(15, 'Poster OPREC BEM 2022', 'Poster', 'work-image', 'images-works/poster-oprec (1).png', 'images-works/poster-oprec (2).png', NULL, NULL, NULL, NULL),
(16, 'Cover Reels SKPI', 'Art', 'work-image', 'images-works/cover skpi (1).png', 'images-works/cover skpi (2).png', NULL, NULL, NULL, NULL),
(17, 'Cover Reels Profile BEM', 'Art', 'work-image', 'images-works/cover-bem-profil (1).png', 'images-works/cover-bem-profil (2).png', NULL, NULL, NULL, NULL),
(18, 'Poster Birthday November', 'Poster', 'work-image', 'images-works/nov hbd (1).png', 'images-works/nov hbd (2).png', NULL, NULL, NULL, NULL),
(19, 'Cover After Movie MAKRAB 2023', 'Poster', 'work-image', 'images-works/Cover After Movie Makrab 2023 1.png', 'images-works/Cover After Movie Makrab 2023 2.png', NULL, NULL, NULL, NULL),
(20, 'Poster Birthday April 2023', 'Poster', 'work-image', 'images-works/Poster Birthday April 2023 1.png', 'images-works/Poster Birthday April 2023 2.png', NULL, NULL, NULL, NULL),
(21, 'Video Ucapan Lebaran 2023', 'Video', 'work-video', 'https://www.youtube.com/watch?v=u6HLW44ug0c', 'images-works/Video Ucapan Lebaran 2023 1.png', NULL, NULL, NULL, NULL),
(22, 'Avatar Silent Day BEM 2022', 'Art', 'work-image', 'images/works/nyepi (2).png', 'images/works/nyepi (1).png', NULL, NULL, NULL, NULL),
(23, 'Final Tournament Free Fire', 'Poster', 'work-image', 'images/works/final-ff1.png', 'images/works/final-ff.png', NULL, NULL, NULL, NULL),
(24, 'Filter Instagram Diesnatalis BEM 2022', 'Video', 'work-video', 'https://drive.google.com/file/d/1AOmxh09RD1TpvKNUlfdGRDHTLe63jsxm/view?usp=drive_link', 'images/works/filter.png', NULL, NULL, NULL, NULL),
(25, 'Presentation MKWU Semester 2', 'Video', 'work-content', 'images/works/wolly.png', 'images/works/mkwu.png', 'https://www.youtube.com/watch?v=ESP1oFWU-68', 'Management and entrepreneurship course presentation video in semester 4 with product is WhollyBox.', 'This video was made using the Kinemaster Android application.', 'View on Youtube'),
(26, 'The history behind the Penataran Temple, Blitar Regency, East Java Province', 'Video', 'work-content', 'images/works/rifki (2).png', 'images/works/rifki (1).png', 'https://www.youtube.com/watch?v=4wssf4qXXg0', 'Visit the Penataran Temple in Blitar to explore the cultural values ​​in it.', 'This video was made using the Kinemaster Android application.', 'View on Youtube'),
(27, 'Certificate Tournament Free Fire', 'Art', 'gallery-link', NULL, 'images/works/sertif-ff.png', '\"images/works/serfiff (1).png\"-\"images/works/serfiff (2).png\"', NULL, NULL, NULL),
(28, 'Poster Rapat Kerja BEM 2023', 'Poster', 'work-image', 'images-works/poster (2) 2.png', 'images-works/poster (2) 1.png', NULL, NULL, NULL, NULL),
(29, 'Backdrop Zoom Rapat Kerja BEM 2023', 'Art', 'work-image', 'images-works/backdrop 2.png', 'images-works/backdrop 1.png', NULL, NULL, NULL, NULL),
(30, 'Header Form Presensi Rapat Kerja BEM 2023', 'Art', 'work-image', 'images-works/Asset 3 2.png', 'images-works/Asset 3 1.png', NULL, NULL, NULL, NULL),
(31, 'Video Prestasi FASILKOM', 'Video', 'work-video', 'https://www.youtube.com/watch?v=T8SUP2j-K6M', 'images-works/part_2/prestasi-wisuda.png', NULL, NULL, NULL, NULL),
(32, 'Teaser Supporter Grey Mamba', 'Video', 'work-video', 'https://www.youtube.com/watch?v=GCG2rboF6PU', 'images-works/part_2/teaser-supporter.png', NULL, NULL, NULL, NULL),
(33, 'Poster Sosialisasi Prestasi', 'Poster', 'work-image', 'images-works/part_2/full-poster-prestasi.png', 'images-works/part_2/cover-poster-prestasi.png', NULL, NULL, NULL, NULL),
(34, 'Feed Instagram BEM Fasilkom', 'Art', 'gallery-link', NULL, 'images/works/feed.png', '\"images/works/ig (2).png\"-\"images/works/ig (1).png\"', NULL, NULL, NULL),
(35, 'Vandel Comparative Study on February 2022', 'Art', 'work-image', 'images/works/vandel (2).png', 'images/works/vandel (1).png', NULL, NULL, NULL, NULL),
(36, 'Thumbnail FAQ Fasilkom UNEJ', 'Art', 'work-image', 'images/works/faq (2).png', 'images/works/faq (1).png', NULL, NULL, NULL, NULL),
(37, 'Art Design With Pixellab Android', 'Art', 'gallery-link', NULL, 'images/works/art (1).png', '\"images/works/art (2).png\"-\"images/works/art (3).png\"-\"images/works/art (4).png\"', NULL, NULL, NULL),
(38, 'Tatakan MC IWDM 2022', 'Art', 'work-image', 'images/works/tatak (2).png', 'images/works/tatak (1).png', NULL, NULL, NULL, NULL),
(39, 'Poster Igs BEM Fasilkom', 'Poster', 'gallery-link', NULL, 'images/works/art-1 (1).png', '\"images/works/art-1 (2).png\"-\"images/works/art-1 (3).png\"-\"images/works/art-1 (4).png\"', NULL, NULL, NULL),
(40, 'Poster Register Workshop Digistar', 'Poster', 'work-image', 'images/works/workshop-proposal 1.png', 'images/works/poster-digistar.png', NULL, NULL, NULL, NULL),
(41, 'Template PowerPoint Muslub BEM', 'Art', 'work-image', 'images/works/ppt-muslub 21 (1).png', 'images/works/ppt-muslub 21 (2).png', NULL, NULL, NULL, NULL),
(42, 'Welcome April Feed Instagram', 'Art', 'work-image', 'images/works/april (2).png', 'images/works/april (1).png', NULL, NULL, NULL, NULL),
(43, 'Header Presensi Welcoming 2022/2023', 'Art', 'work-image', 'images-works/headerwelcomfull.png', 'images-works/headerwelcom.png', NULL, NULL, NULL, NULL),
(44, 'Poster Welcoming BEM FASILKOM 2022/2023', 'Poster', 'work-image', 'images-works/poster-welcoming-full.png', 'images-works/poster-welcoming.png', NULL, NULL, NULL, NULL),
(45, 'Live Report Welcoming BEM FASILKOM 2022/2023', 'Poster', 'work-image', 'images-works/lr-welcom-full.png', 'images-works/lr-welcom.png', NULL, NULL, NULL, NULL),
(46, 'Poster Calon Ketua HIMASIF No 1', 'Poster', 'work-image', 'images-works/akbar 1.png', 'images-works/akbartum.png', NULL, NULL, NULL, NULL),
(47, 'Poster Birthday December 2022', 'Poster', 'work-image', 'images-works/fir 1.png', 'images-works/firtum.png', NULL, NULL, NULL, NULL),
(48, 'Feed Welcoming January 2023', 'Art', 'work-image', 'images-works/Januari 1.png', 'images-works/jantum.png', NULL, NULL, NULL, NULL),
(49, 'Banner Study Excursie 2022', 'Art', 'gallery-link', NULL, 'images/works/banner se (3).png', '\"images/works/banner se (2).png\"-\"images/works/banner se (1).png\"', NULL, NULL, NULL),
(50, 'Certificate Committee IWDM 2022', 'Art', 'gallery-link', NULL, 'images/works/sertif-iwdm (1).png', '\"images/works/sertif-iwdm (2).png\"-\"images/works/36.png\"', NULL, NULL, NULL),
(51, 'Live Report Sosialisasi BEM', 'Video', 'work-video', 'https://youtube.com/shorts/Qxech1soZ8U', 'images/works/lr-musluv.png', NULL, NULL, NULL, NULL),
(52, 'Poster Ulang Tahun Januari 2023', 'Poster', 'work-image', 'images-works/al 1 (1).png', 'images-works/al 1.png', NULL, NULL, NULL, NULL),
(53, 'Poster Ulang Tahun Februari 2023', 'Poster', 'work-image', 'images-works/rio 1 (1).png', 'images-works/rio 1.png', NULL, NULL, NULL, NULL),
(54, 'Poster Sosialisasi Magang Mandiri', 'Poster', 'work-image', 'images-works/Asset 4 2.png', 'images-works/Asset 4 1.png', NULL, NULL, NULL, NULL),
(55, 'Video Iklan Meubel UD. Meubel Lumintu', 'Video', 'work-video', 'https://www.youtube.com/watch?v=AU4_FXjsL1s', 'https://raw.githubusercontent.com/sibeux/license-sibeux/7d7cd419f405d2cb937d1ea511fcd819ad2424a1/Thumbnail.png', NULL, NULL, NULL, NULL),
(56, 'Video Intro Kajian Jumat Grand Corp', 'Video', 'work-video', 'https://www.youtube.com/watch?v=VjklcZJva8E', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/3242r2.png', NULL, NULL, NULL, NULL),
(57, 'The funny cow character is angry', 'Art', 'work-image', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Asset%205%40300x%201.png', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Thumbnail.png', NULL, NULL, NULL, NULL),
(58, 'Teaser PKKMB UNEJ 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=FmghMyJLrxU', 'images-works/pkkmb.png', NULL, NULL, NULL, NULL),
(59, 'Pengenalan Dosen & Staff FASILKOM UNEJ', 'Video', 'work-video', 'https://www.youtube.com/watch?v=7UeO9tfKtas', 'images-works/pengenalan-dosen.png', NULL, NULL, NULL, NULL),
(60, 'Teaser PORMABA UNEJ 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=API7KOslmlc', 'images-works/pormaba.png', NULL, NULL, NULL, NULL),
(61, 'Certificate IDLE 2022', 'Art', 'work-image', 'images-works/sertif-idlee.png', 'images-works/sertif-idle.png', NULL, NULL, NULL, NULL),
(62, 'Instagram Story Feed BEM September 2022', 'Art', 'work-image', 'images-works/sep-bd-full.png', 'images-works/sep-bd.png', NULL, NULL, NULL, NULL),
(63, 'Welcoming Feed Instagram BEM September 2022', 'Art', 'work-image', 'images-works/sep-well-full.png', 'images-works/sep-well.png', NULL, NULL, NULL, NULL),
(64, 'Panitia PPMB Cover 2022', 'Video', 'work-video', 'https://www.youtube.com/shorts/hvgjBkxzh74', 'images-works/panit-ppmb.png', NULL, NULL, NULL, NULL),
(65, 'After Movie PORMABA 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=Xs9NHcVGdkQ', 'images-works/aftermpor.png', NULL, NULL, NULL, NULL),
(66, 'Video Profile BEM FASILKOM UNEJ 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=WD3EN3okT1A', 'images-works/probem.png', NULL, NULL, NULL, NULL),
(67, 'Vandel Comparative Study on October 2022', 'Art', 'work-image', 'images-works/vandel-oct-full.png', 'images-works/vandel-oct.png', NULL, NULL, NULL, NULL),
(68, 'Coming Soon Digital Creative & Innovative Day 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=mF7-WTHiwg0', 'images-works/bayu.png', NULL, NULL, NULL, NULL),
(69, 'Video Publikasi Digital Creative & Innovative Day 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=yS5bdAF-aHY', 'images-works/pub dc.png', NULL, NULL, NULL, NULL),
(70, 'Video Peresmian Digital Creative & Innovative Day 2022', 'Video', 'work-video', 'https://www.youtube.com/watch?v=izPVH_piAzE', 'images-works/tapdn.png', NULL, NULL, NULL, NULL),
(71, 'News Paslon 1 Ketua & Wakil Ketua BEM FASILKOM UNEJ', 'Video', 'work-video', 'https://www.youtube.com/watch?v=fPdWH9O6Va0', 'images-works/news-01.png', NULL, NULL, NULL, NULL),
(72, 'Live Report MUBES BEM FASILKOM UNEJ', 'Video', 'work-video', 'https://www.youtube.com/shorts/-yvqs5PZz0Q', 'images-works/lr-mubes.png', NULL, NULL, NULL, NULL),
(73, 'Portfolio Magang Lhealthycream', 'Poster', 'gallery-link', NULL, 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/429827394_701706412035993_711569566531437460_n.png', '\"https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/429089399_1483410095575611_4763368054491850160_n.png\"-\"https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/429131156_662798212554032_1089773062764292862_n.png\"-\"https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/429641617_711583221060178_2011896704296033323_n.png\"', NULL, NULL, NULL),
(74, 'Portfolio Magang Lhealthycream', 'Poster', 'work-image', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/420535117_924323189357477_2876133791850380287_n.png', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/423600026_7200486126687164_5395084020001219322_n.png', NULL, NULL, NULL, NULL),
(75, 'Portfolio Magang Lhealthycream', 'Poster', 'work-image', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/423455168_933250411324179_7552237085909218696_n.png', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/Akeboshi%20-%20Wind/423454418_25098781303102120_531835036720154477_n.png', NULL, NULL, NULL, NULL),
(76, 'Certificate BEM FASILKOM Sandyakala 2022/2022', 'Art', 'work-image', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/test/M.%20Nasrul%20Wahabi_14x%201%20(2).png', 'https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/test/M.%20Nasrul%20Wahabi_14x%201%20(1).png', NULL, NULL, NULL, NULL),
(77, 'Banner Bengkel Las & Alumunium RRN JAYA', 'Art', 'work-image', 'https://drive.google.com/file/d/10g0_n6YOTQhwkebcMelEIGgt5SAzq1uD/view?usp=drive_link', 'https://drive.google.com/file/d/10gY96Y2C_4nby8TwkP8zNGcomy0sBpho/view?usp=drive_link', NULL, NULL, NULL, NULL),
(78, 'Halalbihalal dan milad halaqoh ahad 2024', 'Poster', 'work-image', 'https://drive.google.com/file/d/110rBQwZ259PYYdNjakXxz5jUCJDtCVzG/view?usp=drive_link', 'https://drive.google.com/file/d/111XS-9K776eMgndv3eqex3QmPPlFXWsM/view?usp=drive_link', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `designs`
--
ALTER TABLE `designs`
  MODIFY `UID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
