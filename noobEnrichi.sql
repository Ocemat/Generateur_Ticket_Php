-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 avr. 2019 à 13:41
-- Version du serveur :  5.7.23-log
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `noob`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `ville`, `age`) VALUES
(1, 'MARTIN', 'Elodie', 'FRANS', 37),
(2, 'BROSSARD', 'Alban', 'Lyon', 30),
(3, 'CELIKBAS', 'Mikail', 'Lyon', 30),
(4, 'FACCHINO', 'Jeremy', 'Saint-Didier Beach', 30),
(5, 'FRANCISCO', 'Cyril', 'Saint-Chamond', 26),
(6, 'SAUVAGEON', 'Audrey', 'Chazay d\'Azergues', 31),
(21, 'RAOELINA', 'Brian', 'Lyon', 30),
(8, 'GRENERON', 'Mylene', 'Cosmos', 162),
(20, 'MONTERRAT', 'Alexis', 'Lyon', 29),
(22, 'SOUBEYRAND', 'Adrien', 'Saint Etienne', 30),
(23, 'VILAIN', 'Raphael', 'Lyon', 30);

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`id`, `nom`, `prenom`) VALUES
(1, 'COTE', 'FX'),
(2, 'B.', 'Vincent'),
(3, ' ', 'Ludo'),
(4, ' ', 'Samuel');

-- --------------------------------------------------------

--
-- Structure de la table `reason`
--

DROP TABLE IF EXISTS `reason`;
CREATE TABLE IF NOT EXISTS `reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reason`
--

INSERT INTO `reason` (`id`, `libelle`) VALUES
(1, 'Je suis bloquee sur mon code'),
(2, 'J\'ai une question sur le cours'),
(3, 'Je suis perdu, au secours !'),
(4, 'NullPointerException');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_noob` int(11) NOT NULL,
  `id_reason` int(11) NOT NULL,
  `id_formateur` int(11) NOT NULL,
  `id_urgence` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_noob` (`id_noob`),
  KEY `id_reason` (`id_reason`),
  KEY `id_formateur` (`id_formateur`),
  KEY `id_urgence` (`id_urgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `urgence`
--

DROP TABLE IF EXISTS `urgence`;
CREATE TABLE IF NOT EXISTS `urgence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `urgence`
--

INSERT INTO `urgence` (`id`, `libelle`) VALUES
(1, 'Je me noye'),
(2, 'Je suis en apnee'),
(3, 'Je barbotte'),
(4, 'Je veux me perfectionner');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
