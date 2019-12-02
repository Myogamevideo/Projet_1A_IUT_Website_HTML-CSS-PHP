-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 28 Octobre 2018 à 18:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `myogame`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) NOT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `categorie`, `tel`, `message`, `sexe`) VALUES
(48, 'quentin', 'baillypro18@gmail.com', '$2y$10$T60wWZyyZrJKqv589x8BFe5TJNoNBfb4DVhb1PIjARnBmjeWkLv06', NULL, '2018-04-17 08:12:53', '', NULL, '', '', '', '', ''),
(49, 'coco', 'wwcorentin777ww@gmail.com', '$2y$10$WJTSLpEJPoPZm3BOxnznDOlPje1YWUto6RfxoDyaJwm5eoOAb1WvG', NULL, '2018-04-23 12:48:13', '', NULL, '', '', '', '', ''),
(50, 'Maxence', 'niahmax2711@gmail.com', '$2y$10$C6P6Tn2CiNa9lj/6BPwSP.571wYKmws6s.f6k7Zi./Sz4jmx0muQO', NULL, '2018-04-23 19:47:15', '', NULL, '', '', '', '', ''),
(51, 'Myogamevideo', 'alexandre.bougrat@hotmail.fr', '$2y$10$lTxCmrkbE2Xbe4Pg6MtkaOdJo2hwggaGVhM8rzNimyXeZxJ/MFlNC', NULL, '2018-04-23 21:16:12', 'hJuWzivliGWGLEaQLEHAYz9ffoqA8lOkgST8oVRFkkUy44LcV2c85h2TX6QY', '2018-10-11 19:52:15', '', '', '', '', ''),
(46, 'alekseb', 'alekseb.alekseb@gmail.com', '$2y$10$sDVo2bsXyaXi5Q.y/mUh7eZj98e.oQomPQYMNTCwVs/DAZ5hwieEW', NULL, '2018-04-10 09:35:53', '', NULL, '', '', '', '', ''),
(72, 'licorne', 'licorne@yopmail.com', '$2y$10$qMwffybDv2Oa02LfwqE5Ne7i8kUke1W58OF.hLzphAJuW/wQwMSY2', '6ybk60sXNZk078SyxNBcQDhJcLbzPv7EgNRCrZc9AKP2YMKDT46AwASubTju', NULL, '', NULL, '', '- 18 ans', '51616464864', 'gfezvtezvezyfeztyfzteyftyezftezfyzegfyzeyeufzyeufyzefyuezfyezfyefyuezyfyzefyuefyuezfuyezfyeufyezfeyfyzefeuzyfgyezfyzefyefeyufeyfyezfyefyfyezfgyfyzfgyu', 'homme');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
