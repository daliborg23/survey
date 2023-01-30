-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Počítač: innodb.endora.cz:3306
-- Vytvořeno: Pon 30. led 2023, 14:52
-- Verze serveru: 10.3.35-MariaDB
-- Verze PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `cviceniphp`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `anketniotazky`
--

CREATE TABLE `anketniotazky` (
  `id_otazky` int(11) NOT NULL,
  `text_otazky` varchar(10000) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `anketniotazky`
--

INSERT INTO `anketniotazky` (`id_otazky`, `text_otazky`) VALUES
(1, 'prvni dotaz... ?'),
(2, 'Napiste dotaz'),
(3, 'Napiste dotaz3'),
(4, 'Asi ctvrty dotaz?'),
(5, 'Snezi venku?'),
(6, 'Nejaky dotaz?'),
(7, 'Jdeme kurit???'),
(8, 'Dame dalsi svacinu?'),
(9, 'Devata otazko o nicem... ?');

-- --------------------------------------------------------

--
-- Struktura tabulky `odpovedi`
--

CREATE TABLE `odpovedi` (
  `id_odpovedi` int(11) NOT NULL,
  `id_otazky_odpoved` int(11) NOT NULL,
  `text_odpovedi` varchar(10000) COLLATE utf8_czech_ci DEFAULT NULL,
  `pocet_hlasu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `odpovedi`
--

INSERT INTO `odpovedi` (`id_odpovedi`, `id_otazky_odpoved`, `text_odpovedi`, `pocet_hlasu`) VALUES
(1, 1, 'Prvni odpoved???', 6),
(2, 1, 'Druha odpoved k prvni otazce.', 2),
(3, 1, 'Napiste odpoved k otazce c.1', 1),
(4, 5, 'Nesnezi', 0),
(5, 5, 'Prave zaclo snezit...', 0),
(6, 7, 'Jdu', 0),
(7, 8, 'Jasne', 0),
(8, 9, 'Uplne o nicem.', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `anketniotazky`
--
ALTER TABLE `anketniotazky`
  ADD PRIMARY KEY (`id_otazky`);

--
-- Klíče pro tabulku `odpovedi`
--
ALTER TABLE `odpovedi`
  ADD PRIMARY KEY (`id_odpovedi`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `anketniotazky`
--
ALTER TABLE `anketniotazky`
  MODIFY `id_otazky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `odpovedi`
--
ALTER TABLE `odpovedi`
  MODIFY `id_odpovedi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
