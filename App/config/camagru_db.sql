-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : sam. 23 jan. 2021 à 13:24
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camagru_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`) VALUES
(19, 17, 7, 'nice'),
(20, 17, 6, 'emmmmm'),
(21, 17, 6, 'www'),
(22, 17, 8, 'x'),
(23, 17, 11, 'wqwq'),
(24, 17, 11, 'wqq'),
(25, 17, 10, 'wqwq'),
(26, 17, 10, 'wqq'),
(27, 17, 11, 'ses'),
(28, 17, 11, 'dsl');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(111, 18, 2),
(113, 18, 3),
(127, 17, 2),
(128, 17, 1),
(130, 17, 3),
(134, 17, 6);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` int NOT NULL DEFAULT '0',
  `likes` int NOT NULL DEFAULT '0',
  `like_nbr` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `create_at`, `comments`, `likes`, `like_nbr`) VALUES
(6, 17, 'hello', 'https://images.pexels.com/photos/5969456/pexels-photo-5969456.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500', '2021-01-23 00:30:05', 0, 0, 1),
(7, 17, 'hello', 'https://images.pexels.com/photos/2974623/pexels-photo-2974623.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500', '2021-01-23 00:30:40', 0, 0, 0),
(10, 17, 'old', 'https://images.pexels.com/photos/5231279/pexels-photo-5231279.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500', '2021-01-23 00:36:46', 0, 0, 0),
(11, 17, 'old', 'https://images.pexels.com/photos/4153800/pexels-photo-4153800.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500', '2021-01-23 00:37:31', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png',
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `profile_img`, `password`, `token`, `create_date`, `verified`) VALUES
(3, 'test1', 'test@gmail.com', 'test1', 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png', '$2y$10$pW0B/Xrgz2iIyeDXO84A5eByIkEBSbkWlMVk0Fk6PkRiDJxbhRA3e', '6b889e0b32e63cca347395bdb4321ede', '2021-01-02 02:34:34', 0),
(16, 'jef', 'izweansh@effobe.com', 'jef1', 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', '$2y$10$ZJHSTqBgNELj.alKEbKnr.J3T2RJ2T8/qQnSxP3oav6e8/2.6pBaK', 'd2bec12ee3396b65852f66a6022ee691', '2021-01-03 03:33:13', 1),
(17, 'sisok mi7fada', 'petexa9190@majorsww.com', 'sisok1', 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png', '$2y$10$NtSN1D1en0395lmjFbULyut7LBMWUfpDm0rjaOozePn.WHU7TJQFi', '7f65ea8750e2b380dab4e662898b0ee7', '2021-01-17 14:19:06', 1),
(18, 'issam', 'pineli2698@febula.com', 'Zouiten', 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png', '$2y$10$9qBQUVXl5o/xx.O5qnwKmex5ATrgoJRweadTJ44oM4M3UCezwM15q', '521d4f75e9824b8c3827e891721899f4', '2021-01-21 01:27:25', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
