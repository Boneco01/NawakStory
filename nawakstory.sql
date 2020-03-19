-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 mars 2020 à 16:51
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nawakstory`
--

-- --------------------------------------------------------

--
-- Structure de la table `apossedeo`
--

CREATE TABLE `apossedeo` (
  `id_aventure` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `aventure`
--

CREATE TABLE `aventure` (
  `id_aventure` int(255) NOT NULL,
  `nom_aventure` varchar(10000) NOT NULL,
  `resume_aventure` varchar(10000) NOT NULL,
  `image_aventure` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aventure`
--

INSERT INTO `aventure` (`id_aventure`, `nom_aventure`, `resume_aventure`, `image_aventure`) VALUES
(1, 'Entrée dans la guilde', 'Vous venez d\'arriver devant la guilde la plus prestigieuse du monde d\'Adeyfinir, une guilde remplie d\'aventuriers de tous les horizons. L\'excitation monte, Vous êtes enfin un membre à part entière, votre rêve depuis tout petit ! Sans plus d\'hésitation, vous vous décidez à pousser les portes, prêt à entamer votre histoire ! ', 'images/adventure1.jpg'),
(2, 'Les ruines de l\'incompréhension', 'Nique sa mère', 'images/ruines.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `aventurier`
--

CREATE TABLE `aventurier` (
  `id_aventurier` int(255) NOT NULL,
  `pseudo` varchar(10000) NOT NULL,
  `mdp` varchar(10000) NOT NULL,
  `stat_force` int(255) NOT NULL DEFAULT 0,
  `stat_endurance` int(255) NOT NULL DEFAULT 0,
  `stat_intelligence` int(255) NOT NULL DEFAULT 0,
  `stat_chance` int(255) NOT NULL DEFAULT 0,
  `or_aventurier` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aventurier`
--

INSERT INTO `aventurier` (`id_aventurier`, `pseudo`, `mdp`, `stat_force`, `stat_endurance`, `stat_intelligence`, `stat_chance`, `or_aventurier`) VALUES
(6, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 5, 11, 8, 7, 750),
(7, 'Alex', '4135aa9dc1b842a653dea846903ddb95bfb8c5a10c504a7fa16e10bc31d1fdf0', 12, 8, 4, 8, 10),
(8, 'Aled', '9b8198ae22594f4f52b45178ce99a3d64ca69ddafec5632c70acc7d62887a240', 7, 5, 12, 7, 10),
(9, 'Boneco', '4d7aeb8df73438cfbb94e2b0726c24a034ca39d5b653bad0f0ef2344caac724a', 12, 8, 4, 4, 20);

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_boutique` int(255) NOT NULL,
  `nom_boutique` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `nom_boutique`) VALUES
(1, 'boutique_caserne');

-- --------------------------------------------------------

--
-- Structure de la table `bpossedeo`
--

CREATE TABLE `bpossedeo` (
  `id_boutique` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
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

CREATE TABLE `objet` (
  `id_objet` int(255) NOT NULL,
  `nom_objet` varchar(10000) NOT NULL,
  `image_objet` varchar(10000) NOT NULL,
  `prix_objet` int(255) NOT NULL,
  `description_objet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id_objet`, `nom_objet`, `image_objet`, `prix_objet`, `description_objet`) VALUES
(1, 'Potara', 'images/objets/potara.png', 50, 'Une boucle d\'oreille aux origines inconnues, finement ouvragée.'),
(2, 'Anneau gravé', 'images/objets/anneau_grave.png\r\n', 25, 'Un anneau en or gravé, simpliste en apparence, qui pourtant vous attire étrangement.'),
(3, 'Dofus', 'images/objets/dofus.png\r\n', 75, 'Un véritable oeuf de dragon, à en croire les dires des marchands ! Les légendes étaient donc vraies ?'),
(4, 'La Vérité', 'images/objets/laverite.png\r\n', 100, 'Un écrit ancien dont le contenu se voudrait détenir la vérité au sujet d\'un débat millénaire, qui n\'a cesse de hanter le coeur et l\'esprit des mortels.'),
(5, 'Test', '	\r\nimages/objets/potara.png', 1000, 'C\'est un objet de test');

-- --------------------------------------------------------

--
-- Structure de la table `sac`
--

CREATE TABLE `sac` (
  `id_aventurier` int(255) NOT NULL,
  `id_objet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sac`
--

INSERT INTO `sac` (`id_aventurier`, `id_objet`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(9, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apossedeo`
--
ALTER TABLE `apossedeo`
  ADD PRIMARY KEY (`id_aventure`,`id_objet`);

--
-- Index pour la table `aventure`
--
ALTER TABLE `aventure`
  ADD PRIMARY KEY (`id_aventure`);

--
-- Index pour la table `aventurier`
--
ALTER TABLE `aventurier`
  ADD PRIMARY KEY (`id_aventurier`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_boutique`);

--
-- Index pour la table `bpossedeo`
--
ALTER TABLE `bpossedeo`
  ADD PRIMARY KEY (`id_boutique`,`id_objet`),
  ADD KEY `FK_id_objet` (`id_objet`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id_objet`);

--
-- Index pour la table `sac`
--
ALTER TABLE `sac`
  ADD PRIMARY KEY (`id_aventurier`,`id_objet`),
  ADD KEY `id_objet` (`id_objet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aventure`
--
ALTER TABLE `aventure`
  MODIFY `id_aventure` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `aventurier`
--
ALTER TABLE `aventurier`
  MODIFY `id_aventurier` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_boutique` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `id_objet` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
