-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 06 Sty 2023, 12:54
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `hour` int(50) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `visits`
--

INSERT INTO `visits` (`id`, `hour`, `date`, `name`, `phone`, `email`, `purpose`) VALUES
(1, 12, '2023-01-11', 'test test', 111111111, 't.zielinski@best.net.pl', 'hyhyhy'),
(2, 11, '2023-01-07', 'test test', 111111111, 't.zielinski@best.net.pl', 'sdsdsd'),
(3, 14, '2023-01-27', 'Tomasz Zieliński', 570626944, 'tomasz.zielinski98tz@gmail.com', 'sdsds'),
(4, 13, '2023-01-19', 'test test', 111111111, 't.zielinski@best.net.pl', 'yhyhyh'),
(5, 12, '2023-01-19', 'Tomasz Zieliński', 570626944, 'tomasz.zielinski98tz@gmail.com', 'hhyyhyhyhkkk'),
(6, 12, '2023-01-26', 'test test', 111111111, 't.zielinski@best.net.pl', 'tetetet'),
(7, 18, '2023-02-01', 'dupa', 570626944, 't.zielinski@best.net.pl', 'elo'),
(8, 18, '2023-02-02', 'test test', 111111111, 't.zielinski@best.net.pl', 'tetette'),
(9, 14, '2023-01-14', 'test test', 111111111, 't.zielinski@best.net.pl', 'test');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
