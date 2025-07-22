-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 juil. 2025 à 15:01
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
-- Base de données : `nike_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `indicatif` varchar(10) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `paiement` varchar(100) DEFAULT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `prenom`, `adresse`, `email`, `indicatif`, `numero`, `paiement`, `date_commande`) VALUES
(1, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:32:54'),
(2, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:35:18'),
(3, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:35:21'),
(4, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:35:26'),
(5, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:35:46'),
(6, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 14:39:31'),
(7, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-22 23:37:03'),
(8, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-23 00:03:54'),
(9, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '549107247', '473747342378', '2025-04-23 01:19:49'),
(10, 'matouk', 'akram', 'hfuidjiogh', 'hfuzejiohui@gmail.com', '+213', '648245766', '432845789', '2025-04-23 01:23:02'),
(11, 'benlalam', 'akram', 'bab ezzouar', 'hfuzejiohui@gmail.com', '+213', '657483526', '74359856732056', '2025-04-23 01:25:43'),
(12, 'matouk', 'rayane', 'hfuidjiogh', 'benlalamrayane@gmail.com', '+213', '54388765', '857924306548932', '2025-04-23 00:28:08'),
(13, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '54388765', '74359856732056', '2025-04-23 01:41:10'),
(14, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '543887656', '473747342378', '2025-04-29 13:59:40'),
(15, 'benlalam', 'rayane', 'bab ezzouar', 'hfuzejiohui@gmail.com', '+213', '543887656', '857924306548932', '2025-04-30 00:42:12'),
(16, 'benlalam', 'rayane', 'bab ezzouar', 'hfuzejiohui@gmail.com', '+213', '543887656', '857924306548932', '2025-04-30 01:03:24'),
(17, 'benlalam', 'akram', 'bab ezzouar', 'hfuzejiohui@gmail.com', '+213', '543887657', '74359856732056', '2025-04-30 01:06:16'),
(18, 'matouk', 'akram', 'hfuidjiogh', 'hfuzejiohui@gmail.com', '+213', '543887657', '473747342378', '2025-04-30 01:09:22'),
(19, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '54388765', '473747342378', '2025-04-30 11:27:54'),
(20, 'benlalam', 'rayane', 'bab ezzouar', 'benlalamrayane@gmail.com', '+213', '543887656', '473747342378', '2025-04-30 11:38:29');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_ajout` datetime DEFAULT current_timestamp(),
  `tailles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `prix`, `description`, `date_ajout`, `tailles`) VALUES
(2, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:25:50', '39'),
(3, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:26:56', '40'),
(4, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:54:14', '41'),
(5, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:54:26', '42'),
(6, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:54:50', '43'),
(7, 'NIKE TN Black Black', 'images (7).jpg', 189.99, NULL, '2025-04-29 14:55:04', '44'),
(8, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:00:20', '39'),
(9, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:00:33', '40'),
(11, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:01:39', '41'),
(12, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:01:51', '42'),
(13, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:02:25', '43'),
(14, 'NIKE TN White White', 'images (8).jpg', 189.99, NULL, '2025-04-29 15:02:38', '44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
