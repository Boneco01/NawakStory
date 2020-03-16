-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 mars 2020 à 13:53
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nawakstory`
--

-- --------------------------------------------------------

--
-- Structure de la table `apossedeo`
--

DROP TABLE IF EXISTS `apossedeo`;
CREATE TABLE IF NOT EXISTS `apossedeo` (
  `id_aventure` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `aventure`
--

DROP TABLE IF EXISTS `aventure`;
CREATE TABLE IF NOT EXISTS `aventure` (
  `id_aventure` int(255) NOT NULL AUTO_INCREMENT,
  `nom_aventure` varchar(10000) NOT NULL,
  `resume_aventure` varchar(10000) NOT NULL,
  `image_aventure` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_aventure`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aventure`
--

INSERT INTO `aventure` (`id_aventure`, `nom_aventure`, `resume_aventure`, `image_aventure`) VALUES
(1, 'Entrée dans la guilde', 'Vous venez d\'arriver devant la guilde la plus prestigieuse du monde d\'Adeyfinir, une guilde remplie d\'aventuriers de tous les horizons. L\'excitation monte, Vous êtes enfin un membre à part entière, votre rêve depuis tout petit ! Sans plus d\'hésitation, vous vous décidez à pousser les portes, prêt à entamer votre histoire ! ', 'images/adventure1.jpg'),
(2, 'Les ruines de l\'incompréhension', 'A faire', 'images/ruines.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `aventurier`
--

DROP TABLE IF EXISTS `aventurier`;
CREATE TABLE IF NOT EXISTS `aventurier` (
  `id_aventurier` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(10000) NOT NULL,
  `mdp` varchar(10000) NOT NULL,
  `stat_force` int(255) NOT NULL DEFAULT 0,
  `stat_endurance` int(255) NOT NULL DEFAULT 0,
  `stat_intelligence` int(255) NOT NULL DEFAULT 0,
  `stat_chance` int(255) NOT NULL DEFAULT 0,
  `or_aventurier` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_aventurier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aventurier`
--

INSERT INTO `aventurier` (`id_aventurier`, `pseudo`, `mdp`, `stat_force`, `stat_endurance`, `stat_intelligence`, `stat_chance`, `or_aventurier`) VALUES
(6, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 5, 11, 8, 7, 10),
(7, 'Alex', '4135aa9dc1b842a653dea846903ddb95bfb8c5a10c504a7fa16e10bc31d1fdf0', 12, 8, 4, 8, 10),
(8, 'Aled', '9b8198ae22594f4f52b45178ce99a3d64ca69ddafec5632c70acc7d62887a240', 7, 5, 12, 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id_boutique` int(255) NOT NULL AUTO_INCREMENT,
  `nom_boutique` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_boutique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bpossedeo`
--

DROP TABLE IF EXISTS `bpossedeo`;
CREATE TABLE IF NOT EXISTS `bpossedeo` (
  `id_boutique` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id_objet` int(255) NOT NULL AUTO_INCREMENT,
  `nom_objet` varchar(10000) NOT NULL,
  `image_objet` varchar(10000) NOT NULL,
  `prix_objet` int(255) NOT NULL,
  PRIMARY KEY (`id_objet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sac`
--

DROP TABLE IF EXISTS `sac`;
CREATE TABLE IF NOT EXISTS `sac` (
  `id_aventurier` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
