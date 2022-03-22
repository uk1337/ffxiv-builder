-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Mrz 2022 um 18:55
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ffxiv_2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `builds`
--

CREATE TABLE `builds` (
  `build_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `itmslot1` int(11) NOT NULL,
  `itmslot2` int(11) NOT NULL,
  `itmslot3` int(11) NOT NULL,
  `itmslot4` int(11) NOT NULL,
  `itmslot5` int(11) NOT NULL,
  `itmslot6` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `itm_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `hitrate` int(11) NOT NULL,
  `determination` int(11) NOT NULL,
  `skillspeed` int(11) NOT NULL,
  `vitality` int(11) NOT NULL,
  `slot` int(11) NOT NULL,
  `critical` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `klassen`
--

CREATE TABLE `klassen` (
  `class_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `klassen`
--

INSERT INTO `klassen` (`class_id`, `name`) VALUES
(0, 'Paladin'),
(1, 'Warrior'),
(2, 'Dark_Knight'),
(3, 'Gunbreaker'),
(4, 'White_Mage'),
(5, 'Scholar'),
(6, 'Astrologian'),
(7, 'Sage'),
(8, 'Monk'),
(9, 'Dragoon'),
(10, 'Ninja'),
(11, 'Samurai'),
(12, 'Reaper'),
(13, 'Bard'),
(14, 'Machinist'),
(15, 'Dancer'),
(16, 'Black_Mage'),
(17, 'Summoner'),
(18, 'Red_Mage'),
(19, 'Blue_Mage');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `relation_itm_class`
--

CREATE TABLE `relation_itm_class` (
  `itm_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`build_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itm_id`);

--
-- Indizes für die Tabelle `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`class_id`);

--
-- Indizes für die Tabelle `relation_itm_class`
--
ALTER TABLE `relation_itm_class`
  ADD KEY `itm_id` (`itm_id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `builds`
--
ALTER TABLE `builds`
  MODIFY `build_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `itm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `klassen` (`class_id`);

--
-- Constraints der Tabelle `relation_itm_class`
--
ALTER TABLE `relation_itm_class`
  ADD CONSTRAINT `relation_itm_class_ibfk_1` FOREIGN KEY (`itm_id`) REFERENCES `items` (`itm_id`),
  ADD CONSTRAINT `relation_itm_class_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `klassen` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
