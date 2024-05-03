-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 apr 2024 om 10:21
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `id` int(11) NOT NULL,
  `klantid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `aantal` int(255) NOT NULL,
  `besteldatum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`id`, `klantid`, `productid`, `aantal`, `besteldatum`) VALUES
(3, 3, 8, 5000, '2024-04-03 13:34:14'),
(4, 3, 8, 3578, '2024-04-03 13:52:00'),
(6, 6, 4, 100, '2024-04-03 14:15:06');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `voornaam`, `achternaam`, `woonplaats`, `email`, `admin`) VALUES
(3, 'Tim', 'Bosma', 'Hellevoetsluis', '9012598@student.tcrmbo.nl', 1),
(5, 'Wissam', 'Hatat', 'Rotterdam', '9022692@student.tcrmbo.nl', 1),
(6, 'Emily', 'van den Berg', 'Rotterdam', '9023166@student.tcrmbo.nl', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productnaam` varchar(255) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `productnaam`, `prijs`, `foto`, `type`) VALUES
(1, 'Katapult', 99.99, 'Katapult.png', 'DIY'),
(2, 'Hut', 49.99, 'Hut.png', 'DIY'),
(3, 'USB', 9.99, 'USB.png', 'Elektronica'),
(4, 'Laptop', 749.99, 'Laptop.png', 'Elektronica'),
(5, 'Schrift', 1.49, 'Schrift.png', 'Schrijfspul'),
(6, 'Stift', 0.99, 'Stift.png', 'Schrijfspul'),
(7, 'Tim Hoodie', 20.99, 'Timhoodie.png', 'Merchandise'),
(8, 'Where there\'s a whip there\'s a way', 24.99, 'Whiphoodie.png', 'Merchandise');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `klantid` int(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `productid`, `klantid`, `review`, `rating`) VALUES
(1, 1, 6, 'Ik heb alles gedaan voor Tim. Hij is wel een goede scrum master daarentegen.', 7);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klantid` (`klantid`,`productid`),
  ADD KEY `productid` (`productid`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klantid` (`klantid`),
  ADD KEY `productid` (`productid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`id`),
  ADD CONSTRAINT `bestelling_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
