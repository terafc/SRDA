-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 17 Février 2012 à 08:13
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `srda`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `num_ens` int(3) NOT NULL AUTO_INCREMENT,
  `nom_ens` varchar(25) NOT NULL,
  `prenom_ens` varchar(25) NOT NULL,
  `email_ens` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`num_ens`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`num_ens`, `nom_ens`, `prenom_ens`, `email_ens`, `pass`) VALUES
(1, 'Lorion', 'Richard', 'richard.lorion@univ-reunion.fr', 'b8c37e33defde51cf91e1e03e51657da'),
(2, 'Jones', 'Dave', 'dave.jones@univ-reunion.fr', 'fba9d88164f3e2d9109ee770223212a0'),
(3, 'CKS', 'Laurent', 'lcks@univ-reunion.fr', 'aa68c75c4a77c87f97fb686b2f068676'),
(4, 'Murad', 'Nour', 'nour.murad@univ-reunion.fr', 'fed33392d3a48aa149a87a38b875ba4a'),
(5, 'Hoareau', 'Didier', 'didier.hoareau@univ-reunion.fr', '2387337ba1e0b0249ba90f55b2ba2521'),
(6, 'Douyere', 'Alexandre', 'alexandre.douyere@univ-reunion.fr', '9246444d94f081e3549803b928260f56'),
(7, 'Hobson', 'Andrew', 'hosbon@gmail.com', 'd7322ed717dedf1eb4e6e52a37ea7bcd'),
(8, 'Grouffaud', 'Joël', '', '1587965fb4d4b5afe8428a4a024feb0d'),
(9, 'Ammany', 'Robert', '', '31b3b31a1c2f8a370206f111127c0dbd'),
(10, 'Boyer', 'Henri', '', '1e48c4420b7073bc11916c6c1de226bb'),
(11, 'Rivière', 'Samuel', '', '7f975a56c761db6506eca0b37ce6ec87'),
(12, 'Faucon', 'Jean-Pierre', 'jean-pierre.faucon@univ-reunion.fr', 'f33ba15effa5c10e873bf3842afb46a6'),
(13, 'Abel', 'Nicolas', 'nicolas.abel@univ-reunion.fr', '6b180037abbebea991d8b1232f8a8ca9');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_etd` int(8) NOT NULL,
  `nom_etd` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_etd` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email_etd` varchar(320) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `promo` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tp` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`num_etd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etd`, `nom_etd`, `prenom_etd`, `email_etd`, `promo`, `pass`, `td`, `tp`) VALUES
(27001248, 'GOSSARD', 'Ingrid', '', 'RT2', '39e4973ba3321b80f37d9b55f63ed8b8', 'TD1', 'TP1'),
(28000527, 'MORBY', 'Damien', '', 'LP RT', 'fecf4d772f647e978c7daa4b3b446ada', '', ''),
(29000036, 'BOYER', 'Miguel', '', 'RT2', '8ae502a489e46e16512581742d93db9c', 'TD1', 'TP1'),
(29000040, 'DIJOUX', 'Thomas', '', 'RT2', 'c0f82517af0829daac3a6cf82e9ecc1e', 'TD1', 'TP1'),
(29000051, 'TREBALAGE', 'Sybella', '', 'LP RT', 'd33f67c5652acb3fac99b9dc16bea0c1', '', ''),
(29000059, 'CHEVALIER', 'Olivier', '', 'LP RT', '47f91082e4cc7d6d0fcf49d5aa6f3711', '', ''),
(29000255, 'FERRINO', 'Maxime', '', 'LP RT', '9e80dab2f77072016c135c84cf5c899e', '', ''),
(29000261, 'LALLEMAND', 'Marie-Vanessa', '', 'LP RT', '761b00dd00830d9ea4713c27591907ae', '', ''),
(29000277, 'ARNASSALOM', 'Kevin', '', 'LP RT', '8566418f640c84b79671a915d659087d', '', ''),
(29000301, 'TELMART', 'Julien', '', 'LP RT', '3bd191aadaebb78ea49f12d8228ad4f8', '', ''),
(29000431, 'SINAMA', 'Laurent', '', 'LP RT', '28bf5a0160d4921a4f6c52129ff8342e', '', ''),
(29000456, 'ALI MOHAMED', 'Ounkache', '', 'RT2', 'fec8038ae4436caa7188b2e3f0bd216f', 'TD1', 'TP1'),
(29000481, 'GALAOR', 'Angelique', '', 'LP RT', '042bea71b7607e3132ecd3fe54e1cac7', '', ''),
(29000492, 'LEBON', 'Vincent', '', 'LP RT', '86309cb7d4819ee8f927f92a4dea1374', '', ''),
(29000581, 'ROBERT', 'Nelly', '', 'RT2', '9064013db48280cd41018d0e19791d48', 'TD1', 'TP1'),
(30000071, 'MARCOZ TSIDIARISON', 'Francel', 'terafc@gmail.com', 'RT2', '43692f46e3168b32434dd507ebc85dbe', 'TD2', 'TP2'),
(30000154, 'NECTOUX', 'Benoit', '', 'RT2', 'e85984bd537ecc6d027b43bef22e4f12', 'TD2', 'TP3'),
(30000231, 'PAYET', 'Sebastien', '', 'RT2', 'd60d265e5909f0be46362820c04a387a', 'TD2', 'TP3'),
(30000239, 'HOARAU', 'Daniel', '', 'RT2', '059fffb74fa5f6ebe37bd1df479c02f7', 'TD1', 'TP2'),
(30000257, 'ROCHEFEUILLE', 'Guillaume', '', 'RT2', '8a3fca6bf6bda325a11f7d6a5b06f13c', 'TD2', 'TP3'),
(30000273, 'DEVEAUX', 'Kevin', '', 'RT2', '78c734ebceead5b7b07ffd1414b22eed', 'TD1', 'TP1'),
(30000302, 'NANDJAN', 'Clement', '', 'RT2', 'd25922edb7ab92c0ca31328cbdcbd42f', 'TD2', 'TP3'),
(30000321, 'BAILLIF', 'Florent', '', 'RT2', 'cd2acea595e93463bc8ea3b6d1583fc9', 'TD2', 'TP2'),
(30000330, 'MOUNIEN', 'Raphael', '', 'RT2', '520ffff5e082be9865d99f5b8a8c017a', 'TD2', 'TP2'),
(30000382, 'PANCHBAYA', 'Louqmane', '', 'RT2', '629ed941bec4a73720b316dd477c91df', 'TD2', 'TP3'),
(30000395, 'MURAT', 'Christophe', 'christophemurat430@gmail.com', 'RT2', '5aaef74f7f3433fc841d2682f925aa03', 'TD2', 'TP2'),
(30000424, 'LEBON', 'Sergio', '', 'RT2', '3810b20210601cb47aae3f1380a264d2', 'TD1', 'TP2'),
(30000443, 'GIRDARY', 'Loïc', '', 'RT2', '06dc9c10cb8eb46b5fcca86460df8662', 'TD1', 'TP1'),
(30000460, 'PITOY', 'Elodie', '', 'RT2', '62c73adf7f7de2790eaf9e83cb13d481', 'TD2', 'TP3'),
(30000479, 'PERRAULT', 'Alexandre', '', 'RT2', 'e0a7abe479216a022d2ed84c74f0eb6d', 'TD2', 'TP3'),
(30000490, 'ODON', 'Thierrico', '', 'RT2', '8a04731eacb74fb3c52e0d50cb2751fb', 'TD1', 'TP2'),
(30000502, 'FRANCOMME', 'Mathias', '', 'RT2', '1da785ade1299722ea5094d2ff0c4dbe', 'TD1', 'TP2'),
(30000529, 'BIGOT', 'Alex', '', 'RT2', '8cee471e62c858d9ecf4b37aca73c677', 'TD1', 'TP1'),
(30000564, 'TONRU', 'Benjamin', '', 'RT2', '417e926e83989b6299e355fbf1b950b7', 'TD2', 'TP2'),
(30000636, 'RETHORE', 'Sophie', '', 'RT2', 'd5d70bd86c4760ff5b7a703acd34e5e5', 'TD2', 'TP3'),
(30000645, 'FERRERE', 'Jean Olivier', '', 'RT2', '0bf9a997c615cb6cb3548a65c0218f44', 'TD1', 'TP2'),
(30000692, 'SOUPRAMANIEN MOUTAMA', 'Gerald', '', 'RT2', 'afb37e1b9b570200be45bcad6f312fde', 'TD2', 'TP3'),
(30000734, 'VIENNE', 'Charles', '', 'RT1', '6296580f0889e341dd9ba0992333171d', 'TD2', 'TP3'),
(30001034, 'PAYET', 'Damien', '', 'RT1', 'bdb106a0560c4e46ccc488ef010af787', 'TD1', 'TP2'),
(30001506, 'BARRET', 'Ulrick', '', 'RT1', 'b5488aeff42889188d03c9895255cecc', 'TD1', 'TP1'),
(30001882, 'RICHAUD', 'Antoine', '', 'RT1', 'e1314fc026da60d837353d20aefaf054', 'TD2', 'TP3'),
(30001909, 'BERILE', 'Renaldo', '', 'RT2', '0609154fa35b3194026346c9cac2a248', 'TD1', 'TP1'),
(30001993, 'FOLIO', 'Brice', '', 'RT2', 'c5a4e7e6882845ea7bb4d9462868219b', 'TD1', 'TP1'),
(30002155, 'HOARAU', 'Alexandre', '', 'RT2', 'a381c2c35c9157f6b67fd07d5a200ae1', 'TD1', 'TP2'),
(30002171, 'LEGROS', 'Sebastien', '', 'RT2', 'f8e59f4b2fe7c5705bf878bbd494ccdf', 'TD2', 'TP2'),
(30002178, 'DIJOUX', 'Jean Fabrice', '', 'RT2', '169779d3852b32ce8b1a1724dbf5217d', 'TD1', 'TP1'),
(30002967, 'BATROLO', 'Houfirati', '', 'RT1', '63f44623dd8686aba388944c8810087f', 'TD1', 'TP2'),
(30004080, 'GHAZOUANI', 'Soukaina', '', 'RT2', '3b9be7e15b46c42911f39a4a9e861022', 'TD1', 'TP1'),
(30004629, 'TOULCANON', 'Loïc', '', 'RT2', 'bd5c5e1c04111451ed8b63079ea181e7', 'TD2', 'TP3'),
(30005167, 'DIJOUX', 'Marc', '', 'RT2', '8c4f839b287d8a4d311eeaad4f8ceb97', 'TD2', 'TP3'),
(31000017, 'IMACHE', 'Jean Yohan', '', 'RT1', '6858fb45a3d3aef7c29322d3b68dffd1', 'TD1', 'TP1'),
(31000032, 'CHAPELLE', 'Maxime', '', 'RT1', 'c90070ff096dd6858022784617b2f383', 'TD1', 'TP1'),
(31000064, 'BOUDIA', 'Dimitri', '', 'RT1', 'b56218f469d935eca49340a717d930f7', 'TD1', 'TP1'),
(31000087, 'PRUVOT', 'Astrid', '', 'RT1', '585869cdf36ea981c9545fcfef880f1d', 'TD2', 'TP3'),
(31000094, 'AURE', 'Joannick', '', 'RT1', '3d842a955f86c5982f18ed6fea9fa1a9', 'TD1', 'TP1'),
(31000104, 'PELLAN', 'Patrice', '', 'RT1', 'be6c5347746fae91bd02a52a114ee14f', 'TD2', 'TP2'),
(31000111, 'CADET', 'Gaël', '', 'RT1', '7d7c45b9a935cf9d845fc75679a41559', 'TD1', 'TP1'),
(31000121, 'FRANCOISE-GERBITH', 'Emmanuel', '', 'RT1', 'fee67cadcc3a0bec8e00641884903c45', 'TD1', 'TP1'),
(31000134, 'PAQUIRY', 'Morgan', '', 'RT1', 'a9bd0eeb3ce6858df275497bb2089ec4', 'TD1', 'TP2'),
(31000154, 'PATEL', 'Oumar', '', 'RT1', 'e85984bd537ecc6d027b43bef22e4f12', 'TD2', 'TP2'),
(31000181, 'ABOUDOU', 'Salimou', '', 'RT1', '5f55a6ece505a982f1ea0f396442bf23', 'TD1', 'TP1'),
(31000205, 'MAZEAU', 'Fabiola', '', 'RT1', '281d5cbef8ded4e9bee409e3b9c67ab2', 'TD1', 'TP2'),
(31000261, 'PAYET', 'Kevin', '', 'RT1', '761b00dd00830d9ea4713c27591907ae', 'TD2', 'TP2'),
(31000277, 'TIAN-VAN-KAÏ', 'Nicolas', '', 'RT1', '8566418f640c84b79671a915d659087d', 'TD2', 'TP3'),
(31000284, 'MOUROUVIN', 'Mickaël', '', 'RT1', '33708b5cd432b05542b3a73a24d442db', 'TD1', 'TP2'),
(31000321, 'VILY', 'Mathias', '', 'RT1', 'cd2acea595e93463bc8ea3b6d1583fc9', 'TD2', 'TP3'),
(31000333, 'LEPINAY', 'Kevin', '', 'RT1', 'e14337dca990ee77b944d19045b5e927', 'TD1', 'TP2'),
(31000356, 'RIVIERE', 'Gilles', '', 'RT1', 'c9d91cb2c696eab32865c0c2e8781380', 'TD2', 'TP3'),
(31000369, 'PICARD', 'Gaetan', '', 'RT1', 'c602c2531a3b20f2aabf2b05667b7dfe', 'TD2', 'TP2'),
(31000378, 'TETIA', 'Thomas', '', 'RT1', '4de53ff826398b4d75bdd4051d3e2905', 'TD2', 'TP3'),
(31000396, 'COURTOIS', 'Mathieu', '', 'RT1', '1fee9df4bbb1d3a21fbfd782076eb3f1', 'TD1', 'TP1'),
(31000402, 'REALE', 'Geoffroy', '', 'RT1', 'd25206f06f3137dd920a3e9ae8f0f704', 'TD2', 'TP3'),
(31000459, 'SANDANOM', 'Alexandre', '', 'RT1', '31cc4e34a6d7da69ae0be6ec1869e749', 'TD2', 'TP3'),
(31000492, 'VIDOT', 'Laurianne', '', 'RT1', '86309cb7d4819ee8f927f92a4dea1374', 'TD2', 'TP3'),
(31000530, 'NAZE', 'Alexandra', '', 'RT1', '6252cf639b8797f8ab8f7e73821fee85', 'TD1', 'TP2'),
(31000561, 'LABORDE', 'Yoann', '', 'RT1', 'ab7fc7ddc9e45778e8a544181a52222b', 'TD1', 'TP1'),
(31000572, 'SAUTRON', 'Harris', '', 'RT1', 'c40ce525c377b864d98f9720bbf20b13', 'TD2', 'TP3'),
(31000581, 'MAMODALY', 'Chamir', '', 'RT1', '9064013db48280cd41018d0e19791d48', 'TD1', 'TP2'),
(31000603, 'RINAUDO', 'Luca', '', 'RT1', 'c90b7f4378a55a9170642af29922cf5c', 'TD2', 'TP3'),
(31000629, 'SANCHEZ', 'Deborah', '', 'RT1', 'e7690d455e577963ad2b04cf4e6dd9ef', 'TD2', 'TP3'),
(31000634, 'PIERRE', 'Xavier', '', 'RT1', 'e85726ad93c97692c9b137e4293aeed0', 'TD2', 'TP2'),
(31000643, 'PAYET', 'Fabien', '', 'RT1', 'ab672dae7c05f5595eec0255a0eaea7b', 'TD2', 'TP2'),
(31000665, 'KOURBANHOUSSEN', 'Malek', '', 'RT1', 'a073be8fcff86c2f5f8276aedfa5fe25', 'TD1', 'TP1'),
(31001813, 'ROBERT', 'Adrien', '', 'RT1', 'f542eae1949358e25d8bfeefe5b199f1', 'TD2', 'TP3'),
(31001905, 'CHAMAND', 'Ritchy', '', 'RT1', '73e0f7487b8e5297182c5a711d20bf26', 'TD1', 'TP1'),
(31001921, 'FICHERE', 'Jean Mickaël', '', 'RT1', '9f6992966d4c363ea0162a056cb45fe5', 'TD1', 'TP1'),
(31001950, 'ABROUSSE', 'Gaetan', '', 'RT1', '03e7d2ebec1e820ac34d054df7e68f48', 'TD1', 'TP1'),
(31001983, 'PAYET', 'Tristan', '', 'RT1', '1e4d36177d71bbb3558e43af9577d70e', 'TD2', 'TP2'),
(31003783, 'RIVIERE', 'Serge', '', 'RT2', '1aa3d9c6ce672447e1e5d0f1b5207e85', 'TD2', 'TP3');

-- --------------------------------------------------------

--
-- Structure de la table `log_email`
--

CREATE TABLE IF NOT EXISTS `log_email` (
  `id` varchar(255) NOT NULL,
  `id_destinataire` varchar(255) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  `datePost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `log_email`
--


-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` varchar(255) NOT NULL,
  `id_destinataire` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datePost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notification`
--


-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `id` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `createur` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `syntaxe` varchar(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `datePost` datetime NOT NULL,
  `description` text,
  `destinataire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sujet`
--


-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` varchar(255) NOT NULL,
  `idUploader` varchar(255) NOT NULL,
  `idSubject` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `size` int(11) NOT NULL COMMENT 'En octet',
  `type` varchar(255) NOT NULL,
  `datePost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `upload`
--

