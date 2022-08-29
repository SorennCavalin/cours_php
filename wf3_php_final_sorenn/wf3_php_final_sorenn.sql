-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 août 2022 à 16:50
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_final_sorenn`
--

-- --------------------------------------------------------

--
-- Structure de la table `contest`
--

CREATE TABLE `contest` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `winner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contest`
--

INSERT INTO `contest` (`id`, `game_id`, `start_date`, `winner_id`) VALUES
(1, 23, '2019-12-25', 2),
(2, 25, '2020-12-25', NULL),
(8, 24, '2022-08-25', NULL),
(9, 24, '2022-08-11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `min_players` int(2) NOT NULL,
  `max_players` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `title`, `min_players`, `max_players`) VALUES
(23, '7 Wonders', 2, 7),
(24, 'Ticket to ride', 2, 5),
(25, 'Pandemic', 2, 4),
(26, 'Munchkin', 3, 6),
(27, 'Saute mouton', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nickname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `email`, `nickname`) VALUES
(1, 'luke.skywalker@rogue.sw', 'Luke'),
(2, 'amidala.padme@naboo.gov', 'Padme'),
(3, 'han.solo@millenium-falcon.com ', 'HanSolo'),
(4, 'chewbacca@wook.ie ', 'Chewbie'),
(5, 'rey@jakku.planet ', 'Rey'),
(6, 'sosolekilr@gmail.com', 'Alfy');

-- --------------------------------------------------------

--
-- Structure de la table `player_contest`
--

CREATE TABLE `player_contest` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `player_contest`
--

INSERT INTO `player_contest` (`id`, `player_id`, `contest_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 2, 2),
(7, 3, 2),
(8, 5, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `winner_id` (`winner_id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `player_contest`
--
ALTER TABLE `player_contest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `player_contest`
--
ALTER TABLE `player_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `contest_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `player_contest` (`player_id`);

--
-- Contraintes pour la table `player_contest`
--
ALTER TABLE `player_contest`
  ADD CONSTRAINT `player_contest_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  ADD CONSTRAINT `player_contest_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
