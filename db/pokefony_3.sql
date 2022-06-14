-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 18:08
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pokefony`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220505071825', '2022-05-05 07:18:44', 488),
('DoctrineMigrations\\Version20220505082310', '2022-05-05 08:23:31', 60),
('DoctrineMigrations\\Version20220505082929', '2022-05-05 08:29:42', 42),
('DoctrineMigrations\\Version20220505083150', '2022-05-05 08:31:54', 80),
('DoctrineMigrations\\Version20220505083250', '2022-05-05 08:32:56', 176),
('DoctrineMigrations\\Version20220505083902', '2022-05-05 08:39:07', 69),
('DoctrineMigrations\\Version20220505094939', '2022-05-05 09:49:44', 169),
('DoctrineMigrations\\Version20220505095126', '2022-05-05 09:51:30', 43),
('DoctrineMigrations\\Version20220505125702', '2022-05-05 12:57:17', 193),
('DoctrineMigrations\\Version20220505145724', '2022-05-05 14:57:29', 127),
('DoctrineMigrations\\Version20220505150044', '2022-05-05 15:00:49', 107),
('DoctrineMigrations\\Version20220609074953', '2022-06-09 07:50:05', 409),
('DoctrineMigrations\\Version20220609084416', '2022-06-09 08:44:25', 77),
('DoctrineMigrations\\Version20220610085354', '2022-06-10 08:54:04', 300);

-- --------------------------------------------------------

--
-- Structure de la table `espece_pokemon`
--

DROP TABLE IF EXISTS `espece_pokemon`;
CREATE TABLE IF NOT EXISTS `espece_pokemon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_1_id` int DEFAULT NULL,
  `type_2_id` int DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `evolution` tinyint(1) NOT NULL,
  `starter` tinyint(1) NOT NULL,
  `type_courbe_niveau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_84A0E63827DC99F2` (`type_1_id`),
  KEY `IDX_84A0E6383569361C` (`type_2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `espece_pokemon`
--

INSERT INTO `espece_pokemon` (`id`, `type_1_id`, `type_2_id`, `libelle`, `evolution`, `starter`, `type_courbe_niveau`, `image`) VALUES
(13, 29, 19, 'Bulbizare', 0, 1, 'P', 'https://www.pokepedia.fr/images/thumb/e/ef/Bulbizarre-RFVF.png/250px-Bulbizarre-RFVF.png'),
(14, 29, 30, 'Herbizarre', 1, 0, 'P', 'https://www.pokepedia.fr/images/4/44/Herbizarre-RFVF.png'),
(15, 29, 30, 'Florizarre', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/4/42/Florizarre-RFVF.png/1200px-Florizarre-RFVF.png'),
(16, 25, 19, 'Salamèche', 0, 1, 'P', 'https://www.pokepedia.fr/images/thumb/8/89/Salam%C3%A8che-RFVF.png/250px-Salam%C3%A8che-RFVF.png'),
(17, 25, 19, 'Reptincel', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/6/64/Reptincel-RFVF.png/250px-Reptincel-RFVF.png'),
(18, 25, 35, 'Dracaufeu', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/1/17/Dracaufeu-RFVF.png/1200px-Dracaufeu-RFVF.png'),
(19, 23, 19, 'Carapuce', 0, 1, 'P', 'https://www.pokepedia.fr/images/thumb/c/cc/Carapuce-RFVF.png/250px-Carapuce-RFVF.png'),
(20, 23, 19, 'Carabaffe', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/2/2a/Carabaffe-RFVF.png/250px-Carabaffe-RFVF.png'),
(21, 23, 19, 'Tortank', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/2/24/Tortank-RFVF.png/250px-Tortank-RFVF.png'),
(22, 27, 19, 'Chenipan', 0, 0, 'M', 'https://www.pokepedia.fr/images/c/c7/Chenipan-RFVF.png'),
(23, 27, 19, 'Chrysacier', 1, 0, 'M', 'https://www.pokepedia.fr/images/6/6c/Chrysacier-RFVF.png'),
(24, 27, 35, 'Papilusion', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/8/83/Papilusion-RFVF.png/1200px-Papilusion-RFVF.png'),
(25, 27, 30, 'Aspicot', 0, 0, 'M', 'https://www.pokepedia.fr/images/9/9b/Aspicot-RFVF.png'),
(26, 27, 30, 'Coconfort', 1, 0, 'M', 'https://www.pokepedia.fr/images/b/b6/Coconfort-RFVF.png'),
(27, 27, 30, 'Dardagnan', 1, 0, 'M', 'https://www.pokepedia.fr/images/e/ee/Dardargnan-RFVF.png'),
(28, 28, 35, 'Roucool', 0, 0, 'P', 'https://www.pokepedia.fr/images/9/94/Roucool-RFVF.png'),
(29, 28, 35, 'Roucoups', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/d/dc/Roucoups-RFVF.png/1200px-Roucoups-RFVF.png'),
(30, 28, 35, 'Roucarnage', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/d/d8/Roucarnage-RFVF.png/1200px-Roucarnage-RFVF.png'),
(31, 28, 19, 'Rattata', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/019.png'),
(32, 28, 19, 'Rattatac', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/020.png'),
(33, 28, 35, 'Piafabec', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/7/7d/Piafabec-RFVF.png/250px-Piafabec-RFVF.png'),
(34, 28, 35, 'Rapasdepic', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/f/f2/Rapasdepic-RFVF.png/250px-Rapasdepic-RFVF.png'),
(35, 30, 19, 'Abo', 0, 0, 'M', 'https://www.pokepedia.fr/images/5/56/Abo-RFVF.png'),
(36, 30, 19, 'Arbok', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/024.png'),
(37, 24, 19, 'Pikachu', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png'),
(38, 24, 19, 'Raichu', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/026.png'),
(39, 33, 19, 'Sabelette', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/6/66/Sabelette-RFVF.png/250px-Sabelette-RFVF.png'),
(40, 33, 19, 'Sablaireau', 1, 0, 'M', 'data:image/jpeg;base64,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'),
(41, 30, 19, 'Nidoran♀', 0, 0, 'P', 'https://www.pokepedia.fr/images/c/ca/Nidoran%E2%99%80-RFVF.png'),
(42, 30, 19, 'Nidorina', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/b/b5/Nidorina-RFVF.png/250px-Nidorina-RFVF.png'),
(43, 30, 33, 'Nidoqueen', 1, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/031.png'),
(44, 30, 19, 'Nidoran♂️', 0, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/032.png'),
(45, 30, 19, 'Nidorino', 1, 0, 'P', 'https://www.pokepedia.fr/images/1/1c/Nidorino-RFVF.png'),
(46, 30, 33, 'Nidoking', 1, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/034.png'),
(47, 36, 19, 'Mélofée', 0, 0, 'R', 'https://www.pokepedia.fr/images/thumb/4/4d/M%C3%A9lof%C3%A9e-RFVF.png/250px-M%C3%A9lof%C3%A9e-RFVF.png'),
(48, 36, 19, 'Mélodelfe', 1, 0, 'R', 'https://www.pokepedia.fr/images/thumb/3/3f/M%C3%A9lodelfe-RFVF.png/250px-M%C3%A9lodelfe-RFVF.png'),
(49, 25, 19, 'Goupix', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/f/f6/Goupix-RFVF.png/250px-Goupix-RFVF.png'),
(50, 25, 19, 'Feunard', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/0/0c/Feunard-RFVF.png/250px-Feunard-RFVF.png'),
(51, 28, 36, 'Rondoudou', 0, 0, 'R', 'https://www.pokepedia.fr/images/thumb/c/cd/Rondoudou-RFVF.png/250px-Rondoudou-RFVF.png'),
(52, 28, 36, 'Grodoudou', 1, 0, 'R', 'https://www.pokepedia.fr/images/thumb/7/7e/Grodoudou-RFVF.png/250px-Grodoudou-RFVF.png'),
(53, 30, 35, 'Nosferapti', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/2/2b/Nosferapti-RFVF.png/250px-Nosferapti-RFVF.png'),
(54, 30, 35, 'Nosferalto', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/6/64/Nosferalto-RFVF.png/250px-Nosferalto-RFVF.png'),
(55, 29, 30, 'Mystherbe', 0, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/043.png'),
(56, 29, 31, 'Ortide', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/3/39/Ortide-RFVF.png/250px-Ortide-RFVF.png'),
(57, 29, 30, 'Rafflesia', 1, 0, 'P', 'https://www.pokepedia.fr/images/c/cd/Rafflesia-RFVF.png'),
(58, 27, 29, 'Paras', 0, 0, 'M', 'https://www.pokepedia.fr/images/5/52/Paras-RFVF.png'),
(59, 27, 29, 'Parasect', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/047.png'),
(60, 27, 30, 'Mimitoss', 0, 0, 'M', 'https://www.pokepedia.fr/images/a/a5/Mimitoss-RFVF.png'),
(61, 27, 30, 'Aéromite', 1, 0, 'M', 'https://www.pokepedia.fr/images/0/0f/A%C3%A9romite-RFVF.png'),
(62, 33, 19, 'Taupiqueur', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/a/aa/Taupiqueur-RFVF.png/250px-Taupiqueur-RFVF.png'),
(63, 33, 19, 'Triopikeur', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/8/85/Triopikeur-RFVF.png/250px-Triopikeur-RFVF.png'),
(64, 28, 19, 'Miaouss', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/b/b8/Miaouss-RFVF.png/250px-Miaouss-RFVF.png'),
(65, 28, 19, 'Persian', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/4/41/Persian-RFVF.png/250px-Persian-RFVF.png'),
(66, 23, 19, 'Psykokwak', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/4/44/Psykokwak-RFVF.png/250px-Psykokwak-RFVF.png'),
(67, 23, 19, 'Akwakwak', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/6/6e/Akwakwak-RFVF.png/250px-Akwakwak-RFVF.png'),
(68, 21, 19, 'Férosinge', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/8/8e/F%C3%A9rosinge-RFVF.png/250px-F%C3%A9rosinge-RFVF.png'),
(69, 21, 19, 'Colossinge', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/057.png'),
(70, 25, 19, 'Caninos', 0, 0, 'L', 'https://www.pokepedia.fr/images/e/e2/Caninos-RFVF.png'),
(71, 25, 19, 'Arcanin', 1, 0, 'L', 'https://www.pokepedia.fr/images/thumb/7/7e/Arcanin-RFVF.png/250px-Arcanin-RFVF.png'),
(72, 23, 19, 'Ptitard', 0, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/060.png'),
(73, 23, 19, 'Têtarte', 1, 0, 'P', 'https://www.pokepedia.fr/images/5/54/T%C3%AAtarte-RFVF.png'),
(74, 23, 21, 'Tartard', 1, 0, 'P', 'https://www.pokepedia.fr/images/3/38/Tartard-RFVF.png'),
(75, 31, 19, 'Abra', 0, 0, 'P', 'https://www.pokepedia.fr/images/3/36/Abra-RFVF.png'),
(76, 31, 19, 'Kadabra', 1, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/064.png'),
(77, 31, 19, 'Alakazam', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/6/68/Alakazam-RFVF.png/250px-Alakazam-RFVF.png'),
(78, 21, 19, 'Machoc', 0, 0, 'P', 'https://www.pokepedia.fr/images/thumb/7/75/Machoc-RFVF.png/250px-Machoc-RFVF.png'),
(79, 21, 19, 'Machopeur', 1, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/067.png'),
(80, 21, 19, 'Mackogneur', 1, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/068.png'),
(81, 29, 30, 'Chétiflor', 0, 0, 'P', 'https://www.pokepedia.fr/images/f/f9/Ch%C3%A9tiflor-RFVF.png'),
(82, 29, 30, 'Boustiflor', 1, 0, 'P', 'https://www.pokepedia.fr/images/f/f5/Boustiflor-RFVF.png'),
(83, 29, 30, 'Empiflor', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/4/41/Empiflor-RFVF.png/250px-Empiflor-RFVF.png'),
(84, 23, 30, 'Tentacool', 0, 0, 'L', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/072.png'),
(85, 23, 30, 'Tentacruel', 1, 0, 'L', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/073.png'),
(86, 32, 33, 'Racaillou', 0, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/074.png'),
(87, 32, 33, 'Gravalanch', 1, 0, 'P', 'https://www.pokepedia.fr/images/a/a5/Gravalanch-RFVF.png'),
(88, 32, 33, 'Grolem', 1, 0, 'P', 'https://www.pokepedia.fr/images/thumb/a/a3/Grolem-RFVF.png/250px-Grolem-RFVF.png'),
(89, 25, 19, 'Ponyta', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/077.png'),
(90, 25, 19, 'Galopa', 1, 0, 'M', 'https://www.pokepedia.fr/images/9/9c/Galopa-RFVF.png'),
(91, 23, 31, 'Ramoloss', 0, 0, 'M', 'https://www.pokepedia.fr/images/5/5a/Ramoloss-RFVF.png'),
(92, 23, 31, 'Flagadoss', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/b/b4/Flagadoss-RFVF.png/250px-Flagadoss-RFVF.png'),
(93, 24, 20, 'Magnéti', 0, 0, 'M', 'https://www.pokepedia.fr/images/b/b9/Magn%C3%A9ti-RFVF.png'),
(94, 24, 20, 'Magnéton', 1, 0, 'M', 'https://www.pokepedia.fr/images/3/36/Magn%C3%A9ton-RFVF.png'),
(95, 28, 35, 'Canarticho', 0, 0, 'M', 'https://www.pokepedia.fr/images/0/07/Canarticho-RFVF.png'),
(96, 28, 35, 'Doduo', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/2/2a/Doduo-RFVF.png/250px-Doduo-RFVF.png'),
(97, 28, 35, 'Dodrio', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/2/2e/Dodrio-RFVF.png/250px-Dodrio-RFVF.png'),
(98, 23, 19, 'Otaria', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/3/31/Otaria-RFVF.png/250px-Otaria-RFVF.png'),
(99, 23, 26, 'Lamantine', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/9/93/Lamantine-RFVF.png/250px-Lamantine-RFVF.png'),
(100, 30, 19, 'Tadmorv', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/088.png'),
(101, 30, 19, 'Grotadmorv', 1, 0, 'M', 'https://www.pokepedia.fr/images/8/8f/Grotadmorv-RFVF.png'),
(102, 23, 19, 'Kokiyas', 0, 0, 'L', 'https://www.pokepedia.fr/images/e/eb/Kokiyas-RFVF.png'),
(103, 23, 26, 'Crustabri', 1, 0, 'L', 'https://www.pokepedia.fr/images/thumb/8/84/Crustabri-RFVF.png/1200px-Crustabri-RFVF.png'),
(104, 34, 30, 'Fantominus', 0, 0, 'P', 'https://www.pokepedia.fr/images/thumb/9/9f/Fantominus-RFVF.png/250px-Fantominus-RFVF.png'),
(105, 34, 30, 'Spectrum', 1, 0, 'P', 'https://www.pokepedia.fr/images/0/09/Spectrum-RFVF.png'),
(106, 34, 30, 'Ectoplasma', 1, 0, 'P', 'https://www.pokepedia.fr/images/8/8d/Ectoplasma-RFVF.png'),
(107, 32, 33, 'Onix', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/095.png'),
(108, 31, 19, 'Soporifik', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/9/94/Soporifik-RFVF.png/250px-Soporifik-RFVF.png'),
(109, 31, 19, 'Hypnomade', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/3/3a/Hypnomade-RFVF.png/250px-Hypnomade-RFVF.png'),
(110, 23, 19, 'Krabby', 0, 0, 'M', 'https://www.pokepedia.fr/images/e/ed/Krabby-RFVF.png'),
(111, 23, 19, 'Krabboss', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/5/55/Krabboss-RFVF.png/250px-Krabboss-RFVF.png'),
(112, 24, 19, 'Voltorbe', 0, 0, 'M', 'https://www.pokepedia.fr/images/5/59/Voltorbe-RFVF.png'),
(113, 24, 19, 'Electrode', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/101.png'),
(114, 29, 31, 'Noeunoeuf', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/3/39/Noeunoeuf-RFVF.png/250px-Noeunoeuf-RFVF.png'),
(115, 29, 31, 'Noadkoko', 1, 0, 'L', 'https://www.pokepedia.fr/images/thumb/1/1f/Noadkoko-RFVF.png/1200px-Noadkoko-RFVF.png'),
(116, 33, 19, 'Osselait', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/5/58/Osselait-RFVF.png/250px-Osselait-RFVF.png'),
(117, 33, 19, 'Ossatueur', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/3/39/Ossatueur-RFVF.png/250px-Ossatueur-RFVF.png'),
(118, 21, 19, 'Kicklee', 0, 0, 'M', 'https://www.pokepedia.fr/images/e/e7/Kicklee-RFVF.png'),
(119, 21, 19, 'Tygnon', 0, 0, 'M', 'https://www.pokepedia.fr/images/9/9c/Tygnon-RFVF.png'),
(120, 28, 19, 'Excelangue', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/7/74/Excelangue-RFVF.png/175px-Excelangue-RFVF.png'),
(121, 30, 19, 'Smogo', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/5/53/Smogo-RFVF.png/250px-Smogo-RFVF.png'),
(122, 30, 19, 'Smogogo', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/110.png'),
(123, 33, 32, 'Rhinocorne', 0, 0, 'L', 'data:image/jpeg;base64,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'),
(124, 33, 32, 'Rhinoféroce', 1, 0, 'L', 'https://www.pokepedia.fr/images/8/80/Rhinof%C3%A9ros-RFVF.png'),
(125, 28, 19, 'Leveinard', 0, 0, 'R', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/113.png'),
(126, 29, 19, 'Saquedeneu', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/114.png'),
(127, 28, 19, 'Kangourex', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/7/78/Kangourex-RFVF.png/250px-Kangourex-RFVF.png'),
(128, 23, 19, 'Hypotrempe', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/3/3e/Hypotrempe-RFVF.png/250px-Hypotrempe-RFVF.png'),
(129, 23, 19, 'Hypocéan', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/f/fc/Hypoc%C3%A9an-RFVF.png/250px-Hypoc%C3%A9an-RFVF.png'),
(130, 23, 19, 'Poissirène', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/1/1f/Poissir%C3%A8ne-RFVF.png/250px-Poissir%C3%A8ne-RFVF.png'),
(131, 23, 19, 'Poissoroy', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/e/ed/Poissoroy-RFVF.png/250px-Poissoroy-RFVF.png'),
(132, 23, 19, 'Stari', 0, 0, 'L', 'https://www.pokepedia.fr/images/3/34/Stari-RFVF.png'),
(133, 23, 31, 'Staross', 1, 0, 'L', 'https://www.pokepedia.fr/images/8/85/Staross-RFVF.png'),
(134, 31, 36, 'M. Mime', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/122.png'),
(135, 27, 35, 'Insécateur', 0, 0, 'M', 'https://www.pokepedia.fr/images/a/a4/Ins%C3%A9cateur-RFVF.png'),
(136, 26, 31, 'Lippoutou', 0, 0, 'M', 'https://www.pokepedia.fr/images/4/44/Lippoutou-RFVF.png'),
(137, 24, 19, 'Elektek', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/1/18/%C3%89lektek-RFVF.png/1200px-%C3%89lektek-RFVF.png'),
(138, 25, 19, 'Magmar', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/8/8d/Magmar-RFVF.png/1200px-Magmar-RFVF.png'),
(139, 27, 19, 'Scarabrute', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/9/92/Scarabrute-RFVF.png/1200px-Scarabrute-RFVF.png'),
(140, 28, 19, 'Tauros', 0, 0, 'L', 'https://www.pokepedia.fr/images/4/48/Tauros-RFVF.png'),
(141, 23, 19, 'Magicarpe', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/0/06/Magicarpe-RFVF.png/250px-Magicarpe-RFVF.png'),
(142, 23, 35, 'Léviator', 1, 0, 'L', 'https://www.pokepedia.fr/images/thumb/f/f2/L%C3%A9viator-RFVF.png/250px-L%C3%A9viator-RFVF.png'),
(143, 23, 26, 'Lokhlass', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/4/4d/Lokhlass-RFVF.png/1200px-Lokhlass-RFVF.png'),
(144, 28, 19, 'Métamorph', 0, 0, 'M', 'https://www.pokepedia.fr/images/e/e3/M%C3%A9tamorph-RFVF.png'),
(145, 28, 19, 'Evoli', 0, 0, 'M', 'https://www.pokepedia.fr/images/8/8b/%C3%89voli-RFVF.png'),
(146, 23, 19, 'Aquali', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/6/6b/Aquali-RFVF.png/250px-Aquali-RFVF.png'),
(147, 24, 19, 'Voltali', 1, 0, 'M', 'https://www.pokepedia.fr/images/8/89/Voltali-RFVF.png'),
(148, 25, 19, 'Pyroli', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/6/64/Pyroli-RFVF.png/1200px-Pyroli-RFVF.png'),
(149, 28, 19, 'Porygnon', 0, 0, 'M', 'https://www.pokepedia.fr/images/0/01/Porygon-RFVF.png'),
(150, 32, 23, 'Amonita', 0, 0, 'M', 'https://www.pokepedia.fr/images/thumb/8/83/Amonita-RFVF.png/250px-Amonita-RFVF.png'),
(151, 32, 23, 'Amonistar', 1, 0, 'M', 'https://www.pokepedia.fr/images/thumb/f/f2/Amonistar-RFVF.png/250px-Amonistar-RFVF.png'),
(152, 32, 23, 'Kabuto', 0, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/140.png'),
(153, 32, 23, 'Kabutops', 1, 0, 'M', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/141.png'),
(154, 32, 35, 'Ptéra', 0, 0, 'L', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/142.png'),
(155, 28, 19, 'Ronflex', 0, 0, 'L', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/143.png'),
(156, 26, 35, 'Artikodin', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/b/bb/Artikodin-RFVF.png/250px-Artikodin-RFVF.png'),
(157, 24, 35, 'Electhor', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/8/81/%C3%89lecthor-RFVF.png/1200px-%C3%89lecthor-RFVF.png'),
(158, 25, 35, 'Sulfura', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/e/ed/Sulfura-PDM1.png/1200px-Sulfura-PDM1.png'),
(159, 22, 19, 'Minidraco', 0, 0, 'L', 'https://www.pokepedia.fr/images/thumb/1/11/Minidraco-RFVF.png/250px-Minidraco-RFVF.png'),
(160, 22, 19, 'Draco', 1, 0, 'L', 'https://www.pokepedia.fr/images/d/d1/Draco-RFVF.png'),
(161, 22, 35, 'Dracolosse', 1, 0, 'L', 'https://www.pokepedia.fr/images/thumb/8/87/Dracolosse-RFVF.png/250px-Dracolosse-RFVF.png'),
(162, 31, 19, 'Mewtwo', 0, 0, 'L', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/150.png'),
(163, 31, 19, 'Mew', 0, 0, 'P', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/151.png');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id`, `libelle`, `image`) VALUES
(1, 'montagne', 'https://www.pokepedia.fr/images/thumb/5/58/Couronneige_EB.png/1200px-Couronneige_EB.png'),
(2, 'prairie', 'https://legends.pokemon.com/assets/story/story_region_1.jpg'),
(3, 'ville', 'https://www.pokepedia.fr/images/f/fa/Fleurville.png'),
(4, 'foret', 'https://zupimages.net/up/20/39/2nfs.png'),
(5, 'plage', 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `espece_id` int DEFAULT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `xp` int NOT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrainement` datetime DEFAULT NULL,
  `date_chasse` datetime DEFAULT NULL,
  `dresseur_id` int DEFAULT NULL,
  `niveau` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_62DC90F32D191E7A` (`espece_id`),
  KEY `IDX_62DC90F3A1A01CBE` (`dresseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_localisation`
--

DROP TABLE IF EXISTS `type_localisation`;
CREATE TABLE IF NOT EXISTS `type_localisation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int DEFAULT NULL,
  `localisation_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3890748AC54C8C93` (`type_id`),
  KEY `IDX_3890748AC68BE09C` (`localisation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_localisation`
--

INSERT INTO `type_localisation` (`id`, `type_id`, `localisation_id`) VALUES
(1, 20, 1),
(2, 21, 3),
(3, 22, 1),
(4, 22, 5),
(5, 23, 5),
(6, 24, 3),
(7, 25, 2),
(8, 26, 1),
(9, 27, 4),
(10, 28, 1),
(11, 28, 2),
(12, 28, 3),
(13, 28, 4),
(14, 28, 5),
(15, 29, 2),
(16, 30, 5),
(17, 31, 3),
(18, 32, 1),
(19, 33, 2),
(20, 34, 4),
(21, 35, 2),
(22, 35, 4),
(23, 36, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_pokemon`
--

DROP TABLE IF EXISTS `type_pokemon`;
CREATE TABLE IF NOT EXISTS `type_pokemon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_pokemon`
--

INSERT INTO `type_pokemon` (`id`, `libelle`) VALUES
(19, ' '),
(20, 'acier'),
(21, 'combat'),
(22, 'dragon'),
(23, 'eau'),
(24, 'electrik'),
(25, 'feu'),
(26, 'glace'),
(27, 'insecte'),
(28, 'normal'),
(29, 'plante'),
(30, 'poison'),
(31, 'psy'),
(32, 'roche'),
(33, 'sol'),
(34, 'spectre'),
(35, 'vol'),
(36, 'fee');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pieces` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vente_pokemon`
--

DROP TABLE IF EXISTS `vente_pokemon`;
CREATE TABLE IF NOT EXISTS `vente_pokemon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pokemon_id` int DEFAULT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3DD60C132FE71C3E` (`pokemon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `espece_pokemon`
--
ALTER TABLE `espece_pokemon`
  ADD CONSTRAINT `FK_84A0E63827DC99F2` FOREIGN KEY (`type_1_id`) REFERENCES `type_pokemon` (`id`),
  ADD CONSTRAINT `FK_84A0E6383569361C` FOREIGN KEY (`type_2_id`) REFERENCES `type_pokemon` (`id`);

--
-- Contraintes pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `FK_62DC90F32D191E7A` FOREIGN KEY (`espece_id`) REFERENCES `espece_pokemon` (`id`),
  ADD CONSTRAINT `FK_62DC90F3A1A01CBE` FOREIGN KEY (`dresseur_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `type_localisation`
--
ALTER TABLE `type_localisation`
  ADD CONSTRAINT `FK_3890748AC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_pokemon` (`id`),
  ADD CONSTRAINT `FK_3890748AC68BE09C` FOREIGN KEY (`localisation_id`) REFERENCES `localisation` (`id`);

--
-- Contraintes pour la table `vente_pokemon`
--
ALTER TABLE `vente_pokemon`
  ADD CONSTRAINT `FK_3DD60C132FE71C3E` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
