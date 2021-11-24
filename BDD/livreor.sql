-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 nov. 2021 à 15:07
-- Version du serveur : 5.7.31
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'hdfgiqsgliezvfhzahksofgslvffijeshlkHLsjqvkyuGVLcoij', 4, '2021-11-23 18:21:53'),
(2, 'DSFLSDNKLFNSDNV JKDFBNSONEDVLBKDNN IFDNKSL', 4, '2021-11-23 18:22:25'),
(3, 'aaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaa aaa aaaaaaaaaaaa aaaa     aaa aaaaaaaaaaaaaa6', 4, '2021-11-24 11:37:58'),
(4, 'Je suis admin\r\n', 1, '2021-11-24 13:47:18'),
(5, 'Je sui admin 2 et je viens juste de créé mon compte , je suis très content de rejoindre votre communauté', 5, '2021-11-24 15:59:07');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$argon2i$v=19$m=65536,t=4,p=1$bkZjL2wwWFYyZUl1UnpNWA$pX6q4uBYnldnTs5aV9iPOQxQmUqG74Tkud1EmNMqjYU'),
(2, 'aa', '$argon2i$v=19$m=65536,t=4,p=1$Wnd2UDVPNmhucFdhOGx0eg$Q/CV48j2xJXxmzZdmVtKmCATS7XQ478++YHD64bTDTQ'),
(3, 'admin4', '$argon2i$v=19$m=65536,t=4,p=1$d1ZmRXdSczJqRGVxTm4vMQ$pN9orqTAKBHIgCkez+PnlTVX6JL+NXe/8yqB4gn4BKU'),
(4, 'a', '$argon2i$v=19$m=65536,t=4,p=1$dE1QQzhWYmhWQW1wZjI2dA$/cfZdsZtYSSrUaUDNotJ2r6TfMFOxUlay5xxOatyQKA'),
(5, 'lataupe', 'lataupe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
