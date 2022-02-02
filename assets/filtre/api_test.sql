-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 09:46
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fh2prog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'Algorithmique'),
(4, 'Wordpress'),
(5, 'HTML/CSS'),
(7, 'SQL'),
(8, 'Bureautique'),
(9, 'Analyse et conception');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `libelle`, `description`, `image`, `categorie_id`) VALUES
(6, 'Les fondamentaux du JavaScript et de Node.JS sans framework', 'Réaliser une application web complète avec les technologies HTML, CSS, JAVASCRIPT, Node JS, et une archi. client/serveur', 'cours1.png', 2),
(7, 'Maîtrisez la création de jeux web JavaScript avec Phaser v3', 'Vos jeux web créés avec le meilleur framework dédié à la création de jeux web pour développeur JavaScript !', 'cours2.png', 2),
(8, 'Maîtrisez PHP et devenez autonome en programmation web', '9 heures de pratique de PHP avec PHP Data Objects (PDO), Bootstrap, MySQL, et la Programmation Orientée Objets (POO)', 'cours3.png', 1),
(9, 'Développement Web JavaScript (no framework): Node.JS & MySQL', 'Réaliser une application de questionnaire avec les technologies du web JavaScript, MySQL, Node JS et Bootstrap', 'cours4.png', 2),
(10, 'Créez votre premier site web Responsive en HTML et CSS', 'Créer un CV sous forme d\'un site internet grâce aux langages de programmation HTML et CSS, et le rendre \"responsive\"', 'cours5.png', 5),
(11, 'Algorithmique JavaScript avancé : créer 3 jeux web avec IA', 'Réaliser puissance 4, la bataille navale et une application de labyrinthe en JavaScript, HTML et CSS sans framework (JS)', 'cours6.png', 2),
(12, 'Développement web de A à Z : créez un site complet sécurisé', 'D\'un site statique à un site dynamique. MVC, HTML/CSS/Bootstrap, PHP, JS/JQuery, MySQL/PDO, sécurité, MCD/MPD (MERISE)..', 'cours7.png', 1),
(13, '101 requêtes pour maîtriser SQL en moins de 3 heures', 'Le cours complet pour apprendre le langage SQL par la pratique au travers de 101 requêtes différentes, sur MySQL', 'cours8.png', 7),
(14, 'Maîtrisez le JavaScript en 30 exercices pratiques', '30exercices JavaScript corrigés en vidéo (20 faciles, 7 moyens, 3 complexes) pour réviser variables, tableaux, objets...', 'cours9.png', 2),
(15, 'Maîtrisez le PHP en 30 exercices pratiques et 3 difficultés', 'Révisez le PHP grâce à 30 exercices pratiques divisés en 3 niveaux de difficulté : PHP, POO, PDO, MySQL, Bootstrap, HTML', 'cours10.png', 1),
(16, 'Bootstrap : créez votre PORTFOLIO responsive (V4 + maj V5)', 'Réalisez votre portfolio en utilisant Bootstrap, HTML, CSS et PHP pour mettre en valeur vos réalisations sur internet', 'cours11.png', 5),
(17, 'Les bases indispensables de la programmation : Algorithmique', 'Maîtriser l\'algorithmique en pseudo-code dans ce cours axé sur la pratique et contenant des dizaines d\'algorithmes', 'cours12.png', 5),
(18, 'Créer 4 applications avec Symfony v4 (évolution progressive)', 'Symfony v4/v5 par la pratique, PHP, CRUD, Doctrine, Fixtures, Authentification, Faker, Pagination, Upload d\'image, MVC..', 'cours13.png', 1),
(19, 'Maîtrisez Excel/Word & Bureautique pro. de 0 à héros', 'Logiciels Bureautique à connaître pour être opérationnel en entreprise - Excel - Word - PowerPoint - Publisher - Outlook', 'cours14.png', 8),
(20, 'Bases indispensables de JavaScript, Node.JS & algorithmique', 'Passez des algorithmes à la réalisation de programmes complets en JavaScript utilisant Node.JS', 'cours15.png', 2),
(21, 'Développement Web JavaScript : Node.JS & MongoDB, archi. MVC', 'Créez une application JavaScript complète en utilisant Node.JS/Express, MongoDB&Mongoose, Twig, Bootstrap, Archi MVC ...', 'cours16.png', 2),
(22, 'Programmation Orientée Objet (POO) & Algorithmique, de A à Z', 'Maîtriser les concepts algorithmique de la POO : Programmation Orientée Objet dans un cours axé sur la pratique', 'cours17.png', 3),
(23, 'Développement Web PHP : POO, MySQL, architecture MVC, CRUD', 'Créer une application PHP (+CRUD), en Programmation Orientée Objet (POO), avec une architecture MVC et une BD MySQL', 'cours18.png', 1),
(24, 'Analyse et conception de Système d’Information (MERISE & co)', 'Apprenez à analyser et concevoir des logiciels informatiques en utilisant des modèles de MERISE', 'cours19.png', 9),
(25, 'Maîtrisez JavaScript de ES6 à ES9 : cours + 28 exercices !', 'Apprenez et pratiquez le langage JavaScript moderne (ES6 à ES9) avec 28 exercices, des quizz et diapositives de synthèse', 'cours20.png', 2),
(26, 'REACT 2020 par la pratique, de A à Z (évolution progressive)', 'Apprenez les bases de React et ses modules importants dont React-Router/Axios/React-Bootstrap en créant 4 applications', 'cours21.png', 2),
(27, 'Full Stack-site complet Front REACT & Back PHP/MySQL/MVC/POO', 'Le développement Full Stack d\'un site web avec une partie Front-end REACT, un Back-end PHP/MySQL/MVC/POO, API REST PHP', 'cours22.png', 1),
(28, '51 exercices d\'algorithmique (avec Milo)', 'Maîtriser l\'algorithmique en pseudo-code dans ce pack contenant 51 exercices et des rappels de cours', 'cours23.png', 3),
(29, 'WP 2021 : Créez un site complet et sécurisé de A à Z', 'Apprenez, avec WordPress, à créer un site internet sécurité et bien référencé sans écrire de code informatique', 'cours24.png', 4),
(30, '40 exercices d\'algorithmique (pseudo-code et programme)', 'Créer des algorithmes en pseudo-code et maîtriser la logique des programmes - Versions programmées (JS, PHP et/ou C#)', 'cours25.png', 3),
(31, 'Le DOM et sa manipulation en JavaScript natif & Intro JQuery', 'Manipulez le DOM en JavaScript (Créer, modifier, supprimer des noeuds...) et gérez les événements. Inclus intro à JQuery', 'cours26.png', 2),
(32, 'Créez une structure de base professionnelle d\'un site en PHP', 'Tutoriel permettant d\'apprendre à créer une structure de base de site PHP réutilisable et de qualité professionnelle', 'cours27.png', 1),
(33, 'Gérez votre catalogue de produits en PHP & MySQL - CRUD (cas pratique)', 'Apprenez à gérer le CRUD en PHP avec PDO et MySQL - 1h30 de vidéos', 'HS1.png', 1),
(34, 'Créez une application JavaScript avec un serveur ExpressJS et node.JS (Cas pratique)', 'Apprenez à créer une application basique en JavaScript avec un serveur node.JS utilisant le module Express JS - 1h30 de vidéos', 'HS2.png', 2),
(35, 'Créer un jeu de mémoire en JavaScript natif', 'Mettre en application ses compétences en JavaScript pour réaliser un jeu web basique sans serveur', 'HS3.png', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORIE_FORMATION` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_CATEGORIE_FORMATION` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
