-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 15 Avril 2020 à 11:39
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `istm_dip`
--
CREATE DATABASE `istm_dip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `istm_dip`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noms` varchar(150) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `noms`, `login`, `password`) VALUES
(1, 'Deborah', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `postnom` varchar(150) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `idService` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idService` (`idService`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id`, `nom`, `postnom`, `login`, `password`, `idService`) VALUES
(1, 'Jules', 'Kasole', 'jules', '1234', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `typeDiplome` varchar(25) NOT NULL,
  `borderau` varchar(25) NOT NULL,
  `rG1` varchar(150) DEFAULT NULL,
  `rG2` varchar(150) DEFAULT NULL,
  `rG3` varchar(150) DEFAULT NULL,
  `rL1` varchar(150) DEFAULT NULL,
  `rL2` varchar(150) DEFAULT NULL,
  `statut` varchar(25) NOT NULL,
  `idEtud` int(11) NOT NULL,
  `idAgent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEtud` (`idEtud`),
  KEY `idAgent` (`idAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `dateCommande`, `typeDiplome`, `borderau`, `rG1`, `rG2`, `rG3`, `rL1`, `rL2`, `statut`, `idEtud`, `idAgent`) VALUES
(1, '2020-03-11', 'grade', '1.jpg', '1.png', '1.png', '1.png', NULL, NULL, 'valide', 1, NULL),
(2, '2020-03-11', 'grade', '2.png', '2.png', '2.png', '2.png', '2.png', '2.png', 'valide', 1, NULL),
(3, '2020-03-25', 'grade', '3.png', '3.png', '3.png', '3.png', NULL, NULL, 'valide', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `matricule` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `matricule`, `tel`, `login`, `password`) VALUES
(1, 'jean', 'Sefu', 'Arlin', 'masculin', '024561', '0976776337', 'jean', '1234'),
(2, 'Déborah', 'Musole', 'Déborah', 'feminin', '012365', '0976776337', 'deborah', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `ozekimessageout`
--

CREATE TABLE IF NOT EXISTS `ozekimessageout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` varchar(1024) DEFAULT NULL,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `ozekimessageout`
--

INSERT INTO `ozekimessageout` (`id`, `sender`, `receiver`, `msg`, `senttime`, `receivedtime`, `status`, `msgtype`, `operator`) VALUES
(1, '', '0978333654', 'Bonjour jean Sefu nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 11-03-2020 est disponible\r\n						', '2020-03-12 21:54', '', 'Send', '', ''),
(2, '', '0975965421', 'Bonjour jean Sefu nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 11-03-2020 est disponible\r\n						', '2020-03-12 21:58', '', 'Send', '', ''),
(3, '', '0976776337', 'Bonjour dÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-25 11:53', '', 'Send', '', ''),
(4, '', '0976776337', '							Bonjour dÃƒÂ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-25 11:57', '', 'Send', '', ''),
(5, '', '0976671421', 'Bonjour dÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:43', '', 'Send', '', ''),
(6, '', '0976671421', 'Bonjour dÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:49', '', 'Send', '', ''),
(7, '', '0976671421', 'Bonjour dÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:52', '', 'Send', '', ''),
(8, '', '', 'Bonjour dÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:55', '', 'Send', '', ''),
(9, '', '', 'Bonjour DÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:57', '', 'Send', '', ''),
(10, '', '0976776337', 'Bonjour DÃ©borah Musole nous tenons Ã  vous informer que  votre diplome de grade commandÃ© le 25-03-2020 est disponible\r\n						', '2020-03-27 14:59', '', 'Send', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `retrait`
--

CREATE TABLE IF NOT EXISTS `retrait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numOrdre` varchar(25) NOT NULL,
  `numEnreg` varchar(25) NOT NULL,
  `optionChoix` varchar(25) NOT NULL,
  `orientation` varchar(25) NOT NULL,
  `mention` varchar(25) NOT NULL,
  `dateDelib` date NOT NULL,
  `dateEtabliss` date NOT NULL,
  `dateEnterine` date NOT NULL,
  `dateRetrait` date NOT NULL,
  `idEtud` int(11) NOT NULL,
  `idAgent` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEtud` (`idEtud`),
  KEY `idAgent` (`idAgent`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `retrait`
--

INSERT INTO `retrait` (`id`, `numOrdre`, `numEnreg`, `optionChoix`, `orientation`, `mention`, `dateDelib`, `dateEtabliss`, `dateEnterine`, `dateRetrait`, `idEtud`, `idAgent`, `idCommande`) VALUES
(1, '002', '0123', 'Pharmacie', 'SantÃ©', 'Satisfaction', '2020-03-06', '2020-03-14', '2020-03-23', '2020-03-12', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `designation`) VALUES
(1, 'AcadÃ©mique'),
(2, 'Inscription');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idAgent`) REFERENCES `agent` (`id`);

--
-- Contraintes pour la table `retrait`
--
ALTER TABLE `retrait`
  ADD CONSTRAINT `retrait_ibfk_1` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `retrait_ibfk_2` FOREIGN KEY (`idAgent`) REFERENCES `agent` (`id`),
  ADD CONSTRAINT `retrait_ibfk_3` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
