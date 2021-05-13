-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql124.hosting.combell.com:3306
-- Generation Time: Jun 15, 2019 at 10:13 AM
-- Server version: 5.7.20-18
-- PHP Version: 7.1.25-1+0~20181207224605.11+jessie~1.gbpf65b84

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ID281902_20182019`
--

-- --------------------------------------------------------

--
-- Table structure for table `int2_activiteiten`
--

CREATE TABLE `int2_activiteiten` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locatie_id` int(11) NOT NULL,
  `soort_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oneliner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` decimal(10,0) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `niveau_id` int(11) NOT NULL,
  `recuring` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_activiteiten`
--

INSERT INTO `int2_activiteiten` (`id`, `title`, `locatie_id`, `soort_id`, `img`, `oneliner`, `datum`, `prijs`, `description`, `start`, `end`, `niveau_id`, `recuring`) VALUES
(1, 'Knikker kampioen', 1, 1, 'knikkerKampioen', 'Knikker je baan naar de kroon.', '2019-06-22', '7', 'Ben jij bedreven in de kunst van het urban knikkeren? Grijp dan je kans om de knikker kroon te bemachtigen en te bewijzen dat jij weldegelijk de beste bent. Negen targets doorheen de hele stad. Van beginner tot expert niveau. Bewijs dat je het allemaal aan kunt.', '10:00:00', '18:00:00', 3, 0),
(2, 'Wekelijkse verovering', 1, 2, 'wekelijkseVerovering', 'Kom je wekelijks een rondje meespelen?', 'Elke woensdag', '10', 'Ga je mee op onze wekelijkse training? Elke woensdag trekken we de stad in om één van de targets te spelen. Hierbij worden de groepen ingedeeld naargelang de niveaus zodat iedereen kan bijleren. Verbeter je kunnen en word de beste die je kan zijn.', '19:00:00', '20:30:00', 4, 3),
(3, 'Ruilhandel', 3, 2, 'ruilhandel', 'Ruil je knikker-rijk', '2019-12-02', '1', 'Iedereen herinnert het zich wel nog. De essentie van het knikkeren. Op deze ruilbeurs kan je de onderhandelaar in jezelf naar boven halen en iedereen zijn beste knikkers aftroggelen. Bereid je collectie uit en, wie weet, misschien vind je wel een pareltje.', '14:00:00', '17:00:00', 4, 0),
(4, 'Instap initiatie', 4, 2, 'instapInitiatie', 'Voor wie wil maar niet weet hoe.', '2019-09-15', '5', 'Ben je wat weerhoudend om de stap naar het urban knikkeren te zetten? Ben je wel nieuwsgierig en heb je er wel zin in, maar weet je niet goed als het wel iets voor jou is? Kom dan zeker naar de instap initiatie. Tijdens deze initiatie beginnen we met de basis van het knikkeren om dat op te bouwen naar een lichte vorm van urban knikkeren.', '19:00:00', '20:30:00', 1, 0),
(5, 'Raampjes passen', 2, 2, 'raampjesPassen', 'Ben jij de scherpschutter die we zoeken?', '1e maandag van de maand', '3', 'De urban versie van poortjes schieten. We huren gedurende één avond elke maand een groot kantoorgebouw af. In dit gebouw zetten we verschillende ramen open die de poortjes worden van ons spel. Met je katapulten schieten je zo veel mogelijk ruiten binnen. Hoe hoger het raam dat je binnenschiet, hoe meer punten je verdient.', '19:00:00', '20:00:00', 2, 2),
(6, 'Stuiter festijn', 1, 2, 'stuiterfestijn', 'Stuiteren door de stad.', '2019-07-15', '2', 'Knikkeren is één ding, maar wat als we de standaard knikker nu eens vervangen door een stuiterbal? Een extra uitdaging die gegarandeerd voor grappige resultaten zorgt. Ga jij de uitdaging aan? Hopelijk tot dan.', '18:00:00', '20:00:00', 4, 0),
(7, 'Knikkerbaan take-over', 1, 2, 'knikkerbaan', 'Bouw een knikkerbaan doorheen de stad.', '2019-08-28', '5', 'Laat het innerlijke kind in je volledig vrij en haal je constructieve kunsten boven. We bouwen een knikkerbaan doorheen de hele stad. Geen hoogte is te hoog, geen idee te gek. je werkt in team aan een zo lang mogelijke knikkerbaan die de volledige stad gent overneemt.', '14:00:00', '17:00:00', 4, 0),
(8, 'Knikker kunstjes', 4, 1, 'knikkerKunstjes', 'Ben jij de acrobaat die we zoeken?', '2019-11-07', '3', 'Denk dance-battle maar dan knikker editie. Je neemt het telkens één tegen één op in een echte knikker-battle. Je probeert op een zo cool en impressionant mogelijke manier de bolleket in het midden van de cirkel te raken. Nadien beslist het publiek wie de betere moves had.', '19:00:00', '21:00:00', 2, 0),
(9, 'Levend knikkeren', 5, 2, 'levendKnikkeren', 'Verplaats je in de geest van een knikker.', '2019-09-30', '5', 'Heb je altijd al afgevraagd hoe het moet voel voor een knikker om afgevuurd te worden? Hier is je kans om dat gevoel de beleven. In een grote zorb bal word je afgevuurd naar de grote bal in het midden om die zo snel mogelijk buiten de cirkel te krijgen.', '14:00:00', '16:00:00', 4, 0),
(10, 'free-run technieken', 4, 2, 'freerunTechnieken', 'Klimmen, klauwteren en klauwieren', '3e maandag van de maand', '5', 'Evolutie stimuleert en motiveert. Om binnen het urban knikkeren evolutie te maken zal je niet enkel het knikkeren onder de knie moeten krijgen, maar zal je ook moeten leren de hoogtes te trotseren. Op deze training leer je de basis principes van freerunning en kan je oefen in de veilige omgeving van de turnzaal.', '19:00:00', '21:00:00', 1, 1),
(11, 'Klinkende knikkers', 3, 2, 'klinkendeKnikkers', 'Knikkerspelletjes en een frisse pint.', '2019-07-04', '5', 'Het moet niet altijd groots en dynamisch zijn. Met een fris drankje in de hand bieden we je allerhande traditionele café spelletjes aan die helemaal in het teken van het knikkeren werden gezet. Denk bierpong maar dan de knikker editie.', '21:00:00', '00:00:00', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `int2_locaties`
--

CREATE TABLE `int2_locaties` (
  `id` int(11) NOT NULL,
  `locatie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_locaties`
--

INSERT INTO `int2_locaties` (`id`, `locatie`) VALUES
(1, 'Gent centrum'),
(2, 'Gent industrieterrein'),
(3, 'Hoofdkwartier'),
(4, 'Sporthal'),
(5, 'Park');

-- --------------------------------------------------------

--
-- Table structure for table `int2_niveaus`
--

CREATE TABLE `int2_niveaus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_niveaus`
--

INSERT INTO `int2_niveaus` (`id`, `name`, `beschrijving`, `img`, `tagline`) VALUES
(1, 'beginner', 'Wie denkt de hoogtes niet aan te kunnen, niet gevreesd. \r\nWe houden het bij bereikbare plaatsen zoals banken en fonteinranden. De derde dimensie is nog aanwezig maar is toegankelijker gemaakt.', 'level1.png', 'voorzichtige enthousiastelingen'),
(2, 'gevorderd', 'Ben je een waaghals maar mis je nog ervaring? We gaan onze grenzen iets hoger leggen maar de echte aap moet je nog niet uitgangen. We houden het op hoogtes tot 2 meter.', 'level2.png', 'waaghalzen zonder ervaring'),
(3, 'expert', 'Kik je op hoogtes? Bezit je de techniek om die hoogtes te bereiken? Op dit niveau gaan alle remmen los. Geen hoogte is te hoog, geen plaats onbereikbaar.', 'level3.png', 'waaghalzen met ervaring'),
(4, 'iedereen', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `int2_orders`
--

CREATE TABLE `int2_orders` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_orders`
--

INSERT INTO `int2_orders` (`id`, `naam`, `voornaam`, `email`, `time_order`) VALUES
(19, 'ellen', 'ellen', 'ellen.sierens@gmail.com', '2019-06-07 20:57:39'),
(20, 'ellen', 'ellen', 'ellen.sierens@gmail.com', '2019-06-11 07:40:41'),
(21, 'dd', 'dd', 'dd@ff', '2019-06-14 11:21:35'),
(22, 'ss', 'ss', 'ss@dd', '2019-06-14 11:21:39'),
(23, 'ee', 'ee', 'ee@ff', '2019-06-14 11:21:42'),
(24, 'poging1', 'ddd', 'dd@dd', '2019-06-14 11:36:08'),
(25, 'poging2', 'dd', 'dd@dd', '2019-06-14 11:36:18'),
(26, 'poging3', 'ddd', 'dd@ff', '2019-06-14 11:36:28'),
(27, 'sierens', 'ellen', 'ellen.sierens@gmail.com', '2019-06-15 07:17:59'),
(28, 'sierens', 'ellen', 'ss@ss', '2019-06-15 07:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `int2_orders_activiteiten`
--

CREATE TABLE `int2_orders_activiteiten` (
  `id` int(11) NOT NULL,
  `activiteit_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `hoeveelheid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_orders_activiteiten`
--

INSERT INTO `int2_orders_activiteiten` (`id`, `activiteit_id`, `order_id`, `hoeveelheid`) VALUES
(28, 2, 19, '1'),
(29, 2, 20, '1'),
(30, 2, 21, '1'),
(31, 2, 22, '1'),
(32, 2, 23, '1'),
(33, 2, 24, '3'),
(34, 2, 25, '7'),
(35, 2, 26, '6'),
(36, 3, 27, '1'),
(37, 2, 27, '4'),
(38, 2, 28, '2');

-- --------------------------------------------------------

--
-- Table structure for table `int2_soorten`
--

CREATE TABLE `int2_soorten` (
  `id` int(11) NOT NULL,
  `soort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `int2_soorten`
--

INSERT INTO `int2_soorten` (`id`, `soort`) VALUES
(1, 'competitief'),
(2, 'recreatief');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `int2_activiteiten`
--
ALTER TABLE `int2_activiteiten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_locaties`
--
ALTER TABLE `int2_locaties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_niveaus`
--
ALTER TABLE `int2_niveaus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_orders`
--
ALTER TABLE `int2_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_orders_activiteiten`
--
ALTER TABLE `int2_orders_activiteiten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_soorten`
--
ALTER TABLE `int2_soorten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `int2_activiteiten`
--
ALTER TABLE `int2_activiteiten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `int2_locaties`
--
ALTER TABLE `int2_locaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `int2_niveaus`
--
ALTER TABLE `int2_niveaus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `int2_orders`
--
ALTER TABLE `int2_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `int2_orders_activiteiten`
--
ALTER TABLE `int2_orders_activiteiten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `int2_soorten`
--
ALTER TABLE `int2_soorten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
