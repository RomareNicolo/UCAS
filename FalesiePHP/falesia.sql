-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 18, 2024 alle 21:52
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falesia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `falesie`
--

CREATE TABLE `falesie` (
  `Proprietario` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Difficoltà` int(11) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `AnnoApertura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `falesie`
--

INSERT INTO `falesie` (`Proprietario`, `Name`, `Difficoltà`, `Descrizione`, `AnnoApertura`) VALUES
('Nico', '1234', 1234, '1234', 1234),
('toni', 'falesia de toni', 100000, 'La se na falesia imposibile...no ghea fa nesuni', 2024),
('Nico', 'Falesia di cogollo', 6, 'Ci sono varie vie e ne stanno continuando ad aprire di nuove', 12345);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Nico', '1234@gmail.com', '$2y$10$WIY06.d8nx2KkyQbsQJn5.R65b0K/eW6gwzt8vMbXXu8RjcxRnY0m'),
(2, 'toni', 'toni@gmail.com', '$2y$10$COW9Jb6ei9ke5ttXXb5Ag.fy88g8exXv.9VnRKjCXeh3hA2hPZhCO');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `falesie`
--
ALTER TABLE `falesie`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
