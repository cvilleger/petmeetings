-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 10 Juillet 2016 à 16:08
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `petmeetings`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` decimal(3,1) DEFAULT NULL,
  `kind` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `race` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `behavior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8_unicode_ci,
  `pictureName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id`, `name`, `gender`, `age`, `kind`, `race`, `behavior`, `biography`, `pictureName`) VALUES
(7, 'Haru', 'Femelle', '2.0', 'chat', 'europeen', 'sociable', 'chat tres joueur et assez gourmand', NULL),
(8, 'Myrta', 'Femelle', '2.0', 'chat', 'europeen', 'sociable', 'chat tres joueur et assez gourmand', NULL),
(9, 'Melissa', 'Femelle', '2.0', 'chat', 'europeen', 'sociable', 'chat tres joueur et assez gourmand', NULL),
(10, 'Markovic Julien', 'choice.animal.gender.1', '12.0', 'choice.animal.kind.2', 'Pingon', NULL, NULL, '0.303748001468079011.jpeg'),
(11, 'Pepito', 'choice.animal.gender.1', '12.0', 'choice.animal.kind.1', 'Chat des bois', NULL, NULL, '0.139276001468106266.jpeg'),
(12, 'Roupette', 'choice.animal.gender.1', '12.0', 'choice.animal.kind.2', 'Batard', NULL, NULL, '0.139276001468106266.jpeg'),
(13, 'Bunker', 'choice.animal.gender.1', NULL, 'choice.animal.kind.2', 'Bulldog', NULL, NULL, '0.942287001468153950.png'),
(14, 'Chico', 'choice.animal.gender.2', '14.0', 'choice.animal.kind.2', 'Chihuahua', NULL, NULL, '0.892695001468154817.png'),
(15, 'Pakito', 'choice.animal.gender.2', '12.0', 'choice.animal.kind.1', 'Chat relou', NULL, NULL, '0.261159001468158939.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `biography` longtext COLLATE utf8_unicode_ci,
  `size` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orientation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meetingtype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startsub` datetime DEFAULT NULL,
  `endsub` datetime DEFAULT NULL,
  `pictureName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `woofs` int(11) DEFAULT NULL,
  `woofsLeft` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `animal_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`, `city`, `birthday`, `biography`, `size`, `weight`, `gender`, `orientation`, `meetingtype`, `startsub`, `endsub`, `pictureName`, `status`, `woofs`, `woofsLeft`) VALUES
(7, 10, 'mamadou', 'mamadou', 'marko@yopmail.com', 'marko@yopmail.com', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', '2016-07-10 15:46:42', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Markovic', 'Julien', 'Villetaneuse', '1990-12-23 00:00:00', NULL, 189, 56, 'choice.user.gender.1', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.299520001468079011.jpeg', 'boostedLover', 0, 5),
(8, 11, 'chat', 'chat', 'chat@yopmail.com', 'chat@yopmail.com', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', '2016-07-10 01:17:56', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Cristina', 'Cordula', 'Paris', '1990-12-12 00:00:00', NULL, 198, 54, 'choice.user.gender.2', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.131465001468106266.png', 'classic', 0, 0),
(9, 12, 'philippe', 'philippe', 'phi@yopmail.com', 'phi@yopmail.com', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Philippe', 'risoli', 'Saint-etienne', '1908-12-12 00:00:00', 'Philippe Risoli, né le 9 septembre 1953 à Saint-Ouen dans la région Île-de-France, est un animateur de télévision, de radio et comédien français de père italien et de mère française. Il est également chanteur de manière plus confidentielle.', 129, 54, 'choice.user.gender.1', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.579367001468107103.png', 'classic', 0, 0),
(10, 13, 'cristiano', 'cristiano', 'cricri@yopmail.com', 'cricri@yopmail.com', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Cristiano', 'Ronaldo', 'Porto', '1990-09-01 00:00:00', NULL, 189, 78, 'choice.user.gender.1', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.938803001468153950.png', 'classic', 0, 0),
(11, 14, 'martine', 'martine', 'mar@ho.fr', 'mar@ho.fr', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', '2016-07-10 15:56:01', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Martine', 'Aubry', 'Lille', '1980-11-12 00:00:00', 'Martine Aubry, née Martine Louise Marie Delors le 8 août 1950 à Paris, est une femme politique française', 145, 43, 'choice.user.gender.2', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.889770001468154817.png', 'classic', 0, 0),
(12, 15, 'yassine', 'yassine', 'yassine@humansrelais.fr', 'yassine@humansrelais.fr', 1, 'lsjt96cxvpsccc880kw40wsgocgkcog', 'vvNe9QyypRZxst3ifa1VR5TZGxxl1CpQs/kGUSFu9XqVEVy4Msw8cUkeFuy4fFTx4qv1X8cnguqAew27q2wmCA==', '2016-07-10 15:55:44', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Yassine', 'Pingou', 'Paris', '1990-12-12 00:00:00', 'né le 13 février 1990 à Paris, est un footballeur international français. Il évolue au poste de défenseur central au Liverpool FC et en équipe de France', 145, 56, 'choice.user.gender.1', 'choice.user.orientation.1', 'choice.user.meetingtype.2', NULL, NULL, '0.257014001468158939.jpeg', 'classic', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_user`
--

CREATE TABLE `user_user` (
  `user_source` int(11) NOT NULL,
  `user_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D6498E962C16` (`animal_id`);

--
-- Index pour la table `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`user_source`,`user_target`),
  ADD KEY `IDX_F7129A803AD8644E` (`user_source`),
  ADD KEY `IDX_F7129A80233D34C1` (`user_target`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6498E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`);

--
-- Contraintes pour la table `user_user`
--
ALTER TABLE `user_user`
  ADD CONSTRAINT `FK_F7129A80233D34C1` FOREIGN KEY (`user_target`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F7129A803AD8644E` FOREIGN KEY (`user_source`) REFERENCES `user` (`id`) ON DELETE CASCADE;
