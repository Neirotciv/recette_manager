-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id_categorie` bigint NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1,	'Entrée'),
(2,	'Plat principal'),
(3,	'Dessert');

DROP TABLE IF EXISTS `categorie_recette`;
CREATE TABLE `categorie_recette` (
  `id_recette` bigint NOT NULL,
  `id_categorie` bigint NOT NULL,
  KEY `FK_categorie_recette_id_recette` (`id_recette`),
  KEY `FK_categorie_recette_id_categorie` (`id_categorie`),
  CONSTRAINT `FK_categorie_recette_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_categorie_recette_id_recette` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categorie_recette` (`id_recette`, `id_categorie`) VALUES
(1,	2),
(2,	1);

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id_commentaire` bigint NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id_recette` bigint NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `FK_commentaire_id_recette` (`id_recette`),
  CONSTRAINT `FK_commentaire_id_recette` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `commentaire` (`id_commentaire`, `auteur`, `contenu`, `id_recette`, `note`) VALUES
(1,	'janedoe',	'Trop bien la recette',	1,	2),
(2,	'jimsmith',	'Ça me donne faim',	1,	3),
(3,	'sarahjones',	'Très bonne recette',	2,	4),
(4,	'mikebrown',	'Ça me donne faim',	2,	5);

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
  `id_ingredient` bigint NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `quantite` int NOT NULL,
  `unite` varchar(255) NOT NULL,
  `id_recette` bigint NOT NULL,
  PRIMARY KEY (`id_ingredient`),
  KEY `FK_ingredient_id_recette` (`id_recette`),
  CONSTRAINT `FK_ingredient_id_recette` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `ingredient` (`id_ingredient`, `nom`, `quantite`, `unite`, `id_recette`) VALUES
(1,	'Pommes de terre',	750,	'g',	1),
(2,	'Reblochon',	1,	'u',	1),
(3,	'Lardons',	200,	'g',	1),
(4,	'Crème fraîche épaisse',	3,	'cs',	1),
(5,	'Oignons',	2,	'u',	1),
(6,	'Beurre',	20,	'g',	1),
(7,	'Sel',	1,	'cc',	1),
(8,	'Poivre',	1,	'p',	1),
(9,	'Carottes',	800,	'g',	2),
(10,	'Oignon',	1,	'u',	2),
(11,	'Bouillon de volaille',	1,	'l',	2),
(12,	'Cumin',	1,	'cs',	2),
(13,	'Crème fraîche épaisse',	2,	'cs',	2),
(14,	'Huile d’olive',	2,	'cs',	2),
(15,	'Sel',	1,	'cc',	2),
(16,	'Poivre',	1,	'p',	2);

DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id_membre` bigint NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `membre` (`id_membre`, `pseudo`, `nom`, `email`, `mdp`, `date_inscription`) VALUES
(1,	'Nicolas',	'Nicolas',	'nicolas@gmail.com',	'lzjgfozef',	'2023-02-10 12:00:00'),
(2,	'janedoe',	'Jane Doe',	'janedoe@example.com',	'MotDePasse2',	'2023-02-10 12:01:00'),
(3,	'jimsmith',	'Jim Smith',	'jimsmith@example.com',	'MotDePasse3',	'2023-02-10 12:02:00'),
(4,	'sarahjones',	'Sarah Jones',	'sarahjones@example.com',	'MotDePasse4',	'2023-02-10 12:03:00'),
(5,	'mikebrown',	'Mike Brown',	'mikebrown@example.com',	'nouveaumotdepasse',	'2023-02-10 12:04:00'),
(6,	'Nicolas',	'Nicolas',	'nicolas@gmail.com',	'lzjgfozef',	'2023-02-10 12:00:00');

DROP TABLE IF EXISTS `recette`;
CREATE TABLE `recette` (
  `id_recette` bigint NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_membre` bigint NOT NULL,
  PRIMARY KEY (`id_recette`),
  KEY `FK_recette_id_membre` (`id_membre`),
  CONSTRAINT `FK_recette_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `recette` (`id_recette`, `titre`, `auteur`, `date_creation`, `description`, `photo`, `id_membre`) VALUES
(1,	'Tartiflette',	'Mike Brown',	'2012-02-03 00:00:00',	'La tartiflette savoyarde est un gratin de pommes de terre avec du Reblochon fondu dessus',	'tartiflette.jpg',	1),
(2,	'Velouté de carottes au cumin',	'Nicolas',	'2012-02-04 00:00:00',	'Un velouté de carotte au cumin',	'veloute-de-carotte-au-cumin.jpg',	1);

-- 2023-02-10 15:22:52