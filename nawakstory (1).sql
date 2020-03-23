-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 mars 2020 à 15:12
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
  `id_objet` int(255) NOT NULL,
  PRIMARY KEY (`id_aventure`,`id_objet`)
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
(2, 'Les ruines de l\'incompréhension', 'Après quelques embûches, vous voici enfin devant le tableau de quête. Une vous attire particulièrement : explorer des ruines anciennes. Pour cela, vous devez rejoindre votre informateur. Vous voici ainsi parti dans votre première quête, en espérant que tout se passe bien ...\r\n', 'images/ruines.jpg');

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
  `histoire_actuelle` int(11) NOT NULL,
  PRIMARY KEY (`id_aventurier`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aventurier`
--

INSERT INTO `aventurier` (`id_aventurier`, `pseudo`, `mdp`, `stat_force`, `stat_endurance`, `stat_intelligence`, `stat_chance`, `or_aventurier`, `histoire_actuelle`) VALUES
(6, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 5, 11, 8, 7, 735, 2),
(7, 'Alex', '4135aa9dc1b842a653dea846903ddb95bfb8c5a10c504a7fa16e10bc31d1fdf0', 12, 8, 4, 8, 10, 1),
(8, 'Aled', '9b8198ae22594f4f52b45178ce99a3d64ca69ddafec5632c70acc7d62887a240', 7, 5, 12, 7, 10, 1),
(9, 'Boneco', '4d7aeb8df73438cfbb94e2b0726c24a034ca39d5b653bad0f0ef2344caac724a', 12, 8, 4, 4, 20, 1),
(10, 'Théo', '42078f34d2388a81df131352543155f748b436f78d947f109c8b28b00f4afe90', 5, 11, 8, 6, 10, 1),
(11, 'Yolo', '425607c17791b9eb16f86cd2bb3350fdedca8e720a0ac42fe0490b798b9e31a8', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id_boutique` int(255) NOT NULL AUTO_INCREMENT,
  `nom_boutique` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_boutique`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `nom_boutique`) VALUES
(1, 'boutique_caserne');

-- --------------------------------------------------------

--
-- Structure de la table `bpossedeo`
--

DROP TABLE IF EXISTS `bpossedeo`;
CREATE TABLE IF NOT EXISTS `bpossedeo` (
  `id_boutique` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL,
  PRIMARY KEY (`id_boutique`,`id_objet`),
  KEY `FK_id_objet` (`id_objet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bpossedeo`
--

INSERT INTO `bpossedeo` (`id_boutique`, `id_objet`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

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
  `description_objet` text NOT NULL,
  PRIMARY KEY (`id_objet`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id_objet`, `nom_objet`, `image_objet`, `prix_objet`, `description_objet`) VALUES
(1, 'Potara', 'images/objets/potara.png', 50, 'Une boucle d\'oreille aux origines inconnues, finement ouvragée.'),
(2, 'Anneau gravé', 'images/objets/anneau_grave.png\r\n', 25, 'Un anneau en or gravé, simpliste en apparence, qui pourtant vous attire étrangement.'),
(3, 'Dofus', 'images/objets/dofus.png\r\n', 75, 'Un véritable oeuf de dragon, à en croire les dires des marchands ! Les légendes étaient donc vraies ?'),
(4, 'La Vérité', 'images/objets/laverite.png\r\n', 100, 'Un écrit ancien dont le contenu se voudrait détenir la vérité au sujet d\'un débat millénaire, qui n\'a cesse de hanter le coeur et l\'esprit des mortels.'),
(5, 'Test', '	\r\nimages/objets/potara.png', 1000, 'C\'est un objet de test'),
(6, 'Medaillon ancien', 'images/objets/medaillon.png', 100, 'Un médaillon aux origines inconnues. Un texte étrange y est marqué dessus. Peut-être que certaines personnes ou objets pourraient vous aider quant à son utilité ou à sa signification');

-- --------------------------------------------------------

--
-- Structure de la table `sac`
--

DROP TABLE IF EXISTS `sac`;
CREATE TABLE IF NOT EXISTS `sac` (
  `id_aventurier` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL,
  PRIMARY KEY (`id_aventurier`,`id_objet`),
  KEY `id_objet` (`id_objet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sac`
--

INSERT INTO `sac` (`id_aventurier`, `id_objet`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 6),
(9, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apossedeo`
--
ALTER TABLE `apossedeo`
  ADD CONSTRAINT `FK_id_aventure` FOREIGN KEY (`id_aventure`) REFERENCES `aventure` (`id_aventure`);

--
-- Contraintes pour la table `bpossedeo`
--
ALTER TABLE `bpossedeo`
  ADD CONSTRAINT `FK_id_boutique` FOREIGN KEY (`id_boutique`) REFERENCES `boutique` (`id_boutique`),
  ADD CONSTRAINT `FK_id_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id_objet`);

--
-- Contraintes pour la table `sac`
--
ALTER TABLE `sac`
  ADD CONSTRAINT `FK_id_aventurier` FOREIGN KEY (`id_aventurier`) REFERENCES `aventurier` (`id_aventurier`),
  ADD CONSTRAINT `sac_ibfk_1` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id_objet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
