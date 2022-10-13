-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 juin 2022 à 03:10
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepter`
--

CREATE TABLE `accepter` (
  `id_A` int(20) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `CIN` varchar(30) NOT NULL,
  `isbn` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `rendu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`aid`, `nom`, `password`) VALUES
(2, 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Steve', 'd69403e2673e611d4cbd3fad6fd1788e'),
(4, 'Eddy', '5aa8fed9741d33c63868a87f1af05ab7');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `isbn` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `qte` int(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id` double NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`isbn`, `name`, `author`, `genre`, `qte`, `image`, `id`, `Description`) VALUES
(0, 'STATISTIQUE ET PROBABILITÉS ', 'Abdesselam Rafik', 'SCIENCE', 9, '9782340047259_1_75.jpg', 9782340047259, 'Ce livre présente une synthèse rigoureuse de la théorie mathématique de la statistique et des probabilités. Sa présentation structurée avec une approche volontairement pratique facilite l’apprentissage et la compréhension .Il traite du calcul des probabilités et de modèles probabilistes et explique comment les appliquer à des problèmes bien concrets issus de la réalité.'),
(0, 'MATHS POUR BTS', 'Studyrama', 'SCIENCE', 29, 'bts.jpg', 9782759021, 'Enfin un manuel de mathématiques pour les groupements E et F des BTS.'),
(0, 'python proba stat', 'M Vincent Vigon ', 'INFORMATIQUE', 99, '41SkUoEfspL._SX385_BO1,204,203,200_.jpg', 9798636799368, 'En alternant théorie et scripts en Python, ce livre offre une illustration concrète des probabilités avec une belle ouverture sur les statistiques. Basé sur le programme de modélisation de l’agrégation de mathématiques, il se destine toutefois à un plus large public.'),
(0, 'Exercices corrigés en probabilités', 'jean pierre', 'Examen', 71, '51x05+WFP8L._SX329_BO1,204,203,200_.jpg', 9872167276, ''),
(0, 'Exercices corrigés d`Analyse', 'Mohammed Aassila', 'Examen', 86, '41PxHBn-5sL._SX389_BO1,204,203,200_.jpg', 9782652521, 'Ce livre rassemble des rappels de cours clairs et complets ainsi que des exercices corrigés en analyse .'),
(0, 'HTML et Developpement Web ', 'Franzi François', 'INFORMATIQUE', 40, '41WJ38SKC2L._SX391_BO1,204,203,200_.jpg', 9787478271, 'Cet ouvrage de référence se base sur SELFHTML la documentation la plus connue concernant la programmation web ');

-- --------------------------------------------------------

--
-- Structure de la table `issue`
--

CREATE TABLE `issue` (
  `id` int(255) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rendu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `issue`
--

INSERT INTO `issue` (`id`, `utilisateur`, `CIN`, `isbn`, `name`, `author`, `date`, `rendu`) VALUES
(102, 'OHAPOUNE', 'BA2596', '9872167276', 'Exercices corrigés en probabilités', 'jean pierre', '2022-06-04 00:25:36', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

CREATE TABLE `request` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `request`
--

INSERT INTO `request` (`id`, `name`, `author`, `CIN`) VALUES
(1, 'Mathématiques licence 1', 'Frédéric Bertrand', 'NA991');

-- --------------------------------------------------------

--
-- Structure de la table `suspendu`
--

CREATE TABLE `suspendu` (
  `ids` int(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modeDePasse` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suspendu`
--

INSERT INTO `suspendu` (`ids`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `modeDePasse`, `CIN`) VALUES
(38, ' RQIQ', 'hicham', 'CASABLANCA', 988888, 'admin@gmai.ma', 'hicham', 'ZB2233');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modeDePasse` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `modeDePasse`, `CIN`) VALUES
(9, 'OHAPOUNE', 'Nouhaila', 'Casablanca', 62222222, 'n.ohapoune@mundiapolis.ma', '01b8b4f5da6c1d23584551963f983050', 'BA2596');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Index pour la table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CIN` (`CIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
