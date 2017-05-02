-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 02 Mai 2017 à 10:29
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sistr`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(16) UNSIGNED NOT NULL,
  `nom` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `login` varchar(256) CHARACTER SET utf8 NOT NULL,
  `motdepasse` varchar(256) CHARACTER SET utf8 NOT NULL,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `connexion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `login`, `motdepasse`, `creation`, `connexion`) VALUES
(11, 'Ruchaud', 'William', 'ruchaud@3il.fr', 'ruchaud', '2a46f4d15cef107fdc3b67e0796d59a82988e57e6630ec1f9c0ec0f5bb2fce1c', '2016-11-25 21:10:25', '2016-11-25 21:10:25'),
(19, 'Willy', 'sss', 'test@3il.fr', 'sanwilly', '6185651dbaa9dd543d35c43aa2eecf26307e51232e2768f24c24376f4b4c342d', '2016-11-30 14:21:41', '2016-11-30 14:21:41'),
(54, 'Willy', 'nyan', 'will@3il.fr', 'camerlion', '783eb5bfbdc5ec3e8e29d51a77de3a715a51b4653c7a7668cc4bd3b1e78d0154', '2016-12-19 17:45:12', '2016-12-19 17:45:12');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
