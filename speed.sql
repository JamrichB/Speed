-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 16.Dec 2020, 20:44
-- Verzia serveru: 10.4.13-MariaDB
-- Verzia PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `speed`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `modely`
--

CREATE TABLE `modely` (
  `id` int(11) NOT NULL,
  `znacka` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `1-4` varchar(3) NOT NULL,
  `5-10` varchar(3) NOT NULL,
  `11-20` varchar(3) NOT NULL,
  `21-30` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `modely`
--

INSERT INTO `modely` (`id`, `znacka`, `model`, `photo`, `1-4`, `5-10`, `11-20`, `21-30`) VALUES
(2, 'BMW', 'X5', 'img/x5.png', '47', '42', '39', '36'),
(5, 'BMW', 'X7', 'img/x7.png', '49', '45', '42', '36'),
(6, 'Audi', 'A3', 'img/a3.png', '47', '45', '41', '35');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `rezervacie`
--

CREATE TABLE `rezervacie` (
  `id` int(11) NOT NULL,
  `meno` varchar(30) NOT NULL,
  `priezvisko` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `auto` varchar(255) NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `miestoPrevzatia` varchar(30) NOT NULL,
  `miestoOdovzdania` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `rezervacie`
--

INSERT INTO `rezervacie` (`id`, `meno`, `priezvisko`, `phone`, `auto`, `od`, `do`, `miestoPrevzatia`, `miestoOdovzdania`) VALUES
(2, 'Lívia', 'Kováčová', '0902865237', 'BMW X5', '2020-12-15', '2020-12-30', 'Prievidza', 'Trenčín'),
(3, 'Adam', 'Holik', '0904215789', 'Audi A3', '2020-12-28', '2020-12-31', 'Nitra', 'Bratislava'),
(6, 'Klaudia', 'Kuklová', '0904215789', 'BMW X7', '2020-12-21', '2020-12-27', 'Komárno', 'Trnava');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `modely`
--
ALTER TABLE `modely`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `rezervacie`
--
ALTER TABLE `rezervacie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `modely`
--
ALTER TABLE `modely`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `rezervacie`
--
ALTER TABLE `rezervacie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
