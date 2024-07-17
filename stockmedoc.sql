-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juil. 2024 à 11:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_pharamatruc`
--

-- --------------------------------------------------------

--
-- Structure de la table `stockmedoc`
--

CREATE TABLE `stockmedoc` (
  `id` int(11) NOT NULL,
  `nom_du_medoc` varchar(80) NOT NULL,
  `forme` varchar(80) NOT NULL,
  `date_de_peremption` date NOT NULL,
  `Dose` decimal(10,0) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stockmedoc`
--

INSERT INTO `stockmedoc` (`id`, `nom_du_medoc`, `forme`, `date_de_peremption`, `Dose`, `stock`) VALUES
(1, 'DOLIPRANE', 'comprimer', '2030-01-31', 1000, 1),
(2, 'EFFERALGAN', 'Comprimer', '2033-06-15', 500, 0),
(3, 'SPASFON', 'comprimer', '2024-06-16', 1000, 0),
(4, 'GAVISCON', 'flacon', '2034-10-04', 1000, 0),
(5, 'XANAX', 'capsule', '2024-06-30', 500, 0),
(6, 'HELICIDINE', 'Sirop', '2031-11-27', 800, 0),
(7, 'TOPLEXIL', 'Sirop', '2024-12-03', 1000, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `stockmedoc`
--
ALTER TABLE `stockmedoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stockmedoc`
--
ALTER TABLE `stockmedoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
