-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db681799114.db.1and1.com
-- Généré le :  Dim 21 Mai 2017 à 11:12
-- Version du serveur :  5.5.54-0+deb7u2-log
-- Version de PHP :  5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db681799114`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposition` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pseudo` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `contenu` text COLLATE latin1_general_ci NOT NULL,
  `_date` datetime NOT NULL,
  `autorisation` int(11) NOT NULL,
  `date_autorisation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `propositions`
--

CREATE TABLE IF NOT EXISTS `propositions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` text COLLATE latin1_general_ci,
  `id_user` int(11) NOT NULL,
  `titre` text COLLATE latin1_general_ci NOT NULL,
  `mots_cles` text COLLATE latin1_general_ci NOT NULL,
  `contenu` text COLLATE latin1_general_ci NOT NULL,
  `_date` datetime NOT NULL,
  `autorisation` int(11) NOT NULL,
  `date_autorisation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` text COLLATE latin1_general_ci NOT NULL,
  `pseudo` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nom` text COLLATE latin1_general_ci NOT NULL,
  `prenom` text COLLATE latin1_general_ci NOT NULL,
  `adresse` text COLLATE latin1_general_ci NOT NULL,
  `ville` text COLLATE latin1_general_ci NOT NULL,
  `code_postal` text COLLATE latin1_general_ci NOT NULL,
  `confirm` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `moderateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `votes_propositions`
--

CREATE TABLE IF NOT EXISTS `votes_propositions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposition` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pour` int(11) NOT NULL,
  `contre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
