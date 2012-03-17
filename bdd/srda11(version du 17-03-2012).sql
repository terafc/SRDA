-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 17 Mars 2012 à 19:17
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

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

CREATE TABLE `enseignant` (
  `num_ens` varchar(255) NOT NULL,
  `nom_ens` varchar(25) NOT NULL,
  `prenom_ens` varchar(25) NOT NULL,
  `email_ens` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`num_ens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` VALUES('1', 'Lorion', 'Richard', 'richard.lorion@rt-iut.re', 'b8c37e33defde51cf91e1e03e51657da');
INSERT INTO `enseignant` VALUES('10', 'Boyer', 'Henri', 'henri.boyer@rt-iut.re', '1e48c4420b7073bc11916c6c1de226bb');
INSERT INTO `enseignant` VALUES('12', 'Faucon', 'Jean-Pierre', 'jean-pierre.faucon@univ-reunion.fr', 'f33ba15effa5c10e873bf3842afb46a6');
INSERT INTO `enseignant` VALUES('13', 'Abel', 'Nicolas', 'nicolas.abel@rt-iut.re', '6b180037abbebea991d8b1232f8a8ca9');
INSERT INTO `enseignant` VALUES('14', 'Vimbouly', 'Joel', 'joel.vimbouly@rt-iut.re', '');
INSERT INTO `enseignant` VALUES('2', 'Jones', 'Dave', 'dave.jones@rt-iut.re', 'fba9d88164f3e2d9109ee770223212a0');
INSERT INTO `enseignant` VALUES('3', 'CKS', 'Laurent', 'lcks@univ-reunion.fr', 'aa68c75c4a77c87f97fb686b2f068676');
INSERT INTO `enseignant` VALUES('4', 'Murad', 'Nour', 'nour.murad@rt-iut.re', 'fed33392d3a48aa149a87a38b875ba4a');
INSERT INTO `enseignant` VALUES('5', 'Hoareau', 'Didier', 'didier.hoareau@rt-iut.re', '2387337ba1e0b0249ba90f55b2ba2521');
INSERT INTO `enseignant` VALUES('6', 'Douyere', 'Alexandre', 'alexandre.douyere@rt-iut.re', '9246444d94f081e3549803b928260f56');
INSERT INTO `enseignant` VALUES('7', 'Hobson', 'Andrew', 'hobson@gmail.com', 'd7322ed717dedf1eb4e6e52a37ea7bcd');
INSERT INTO `enseignant` VALUES('8', 'Grouffaud', 'Joël', '', '1587965fb4d4b5afe8428a4a024feb0d');
INSERT INTO `enseignant` VALUES('9', 'Ammany', 'Robert', '', '31b3b31a1c2f8a370206f111127c0dbd');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
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

INSERT INTO `etudiant` VALUES(27001248, 'GOSSARD', 'Ingrid', 'i.gossard@rt-iut.re', 'RT2', '39e4973ba3321b80f37d9b55f63ed8b8', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(28000527, 'MORBY', 'Damien', 'd.morby@rt-iut.re', 'LP RT', 'fecf4d772f647e978c7daa4b3b446ada', '', '');
INSERT INTO `etudiant` VALUES(29000036, 'BOYER', 'Miguel', 'm.boyer@rt-iut.re', 'RT2', '8ae502a489e46e16512581742d93db9c', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(29000040, 'DIJOUX', 'Thomas', 't.dijoux@rt-iut.re', 'RT2', 'c0f82517af0829daac3a6cf82e9ecc1e', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(29000051, 'TREBALAGE', 'Sybella', 's.trebalage@rt-iut.re', 'LP RT', 'd33f67c5652acb3fac99b9dc16bea0c1', '', '');
INSERT INTO `etudiant` VALUES(29000059, 'CHEVALIER', 'Olivier', 'o.chevalier@rt-iut.re', 'LP RT', '47f91082e4cc7d6d0fcf49d5aa6f3711', '', '');
INSERT INTO `etudiant` VALUES(29000255, 'FERRINO', 'Maxime', 'm.ferrino@rt-iut.re', 'LP RT', '9e80dab2f77072016c135c84cf5c899e', '', '');
INSERT INTO `etudiant` VALUES(29000261, 'LALLEMAND', 'Marie-Vanessa', 'v.lallemand@rt-iut.re', 'LP RT', '761b00dd00830d9ea4713c27591907ae', '', '');
INSERT INTO `etudiant` VALUES(29000277, 'ARNASSALOM', 'Kevin', 'k.arnassalom@rt-iut.re', 'LP RT', '8566418f640c84b79671a915d659087d', '', '');
INSERT INTO `etudiant` VALUES(29000301, 'TELMART', 'Julien', 'j.telmart@rt-iut.re', 'LP RT', '3bd191aadaebb78ea49f12d8228ad4f8', '', '');
INSERT INTO `etudiant` VALUES(29000431, 'SINAMA', 'Laurent', 'l.sinama@rt-iut.re', 'LP RT', '28bf5a0160d4921a4f6c52129ff8342e', '', '');
INSERT INTO `etudiant` VALUES(29000456, 'ALI MOHAMED', 'Ounkache', 'o.ali-mohamed@rt-iut.re', 'RT2', 'fec8038ae4436caa7188b2e3f0bd216f', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(29000481, 'GALAOR', 'Angelique', 'a.galaor@rt-iut.re', 'LP RT', '042bea71b7607e3132ecd3fe54e1cac7', '', '');
INSERT INTO `etudiant` VALUES(29000492, 'LEBON', 'Vincent', 'v.lebon@rt-iut.re', 'LP RT', '86309cb7d4819ee8f927f92a4dea1374', '', '');
INSERT INTO `etudiant` VALUES(29000581, 'ROBERT', 'Nelly', 'n.robert@rt-iut.re', 'RT2', '9064013db48280cd41018d0e19791d48', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30000071, 'MARCOZ TSIDIARISON', 'Francel', 'terafc@gmail.com', 'RT2', '43692f46e3168b32434dd507ebc85dbe', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30000154, 'NECTOUX', 'Benoit', 'b.nectoux@rt-iut.re', 'RT2', 'e85984bd537ecc6d027b43bef22e4f12', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000231, 'PAYET', 'Sebastien', 's.payet@rt-iut.re', 'RT2', 'd60d265e5909f0be46362820c04a387a', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000239, 'HOARAU', 'Daniel', 'd.hoarau@rt-iut.re', 'RT2', '059fffb74fa5f6ebe37bd1df479c02f7', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30000257, 'ROCHEFEUILLE', 'Guillaume', 'g.rochefeuille@rt-iut.re', 'RT2', '8a3fca6bf6bda325a11f7d6a5b06f13c', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000273, 'DEVEAUX', 'Kevin', 'k.deveaux@rt-iut.re', 'RT2', '78c734ebceead5b7b07ffd1414b22eed', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30000302, 'NANDJAN', 'Clement', 'c.nandjan@rt-iut.re', 'RT2', 'd25922edb7ab92c0ca31328cbdcbd42f', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000321, 'BAILLIF', 'Florent', 'f.baillif@rt-iut.re', 'RT2', 'cd2acea595e93463bc8ea3b6d1583fc9', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30000330, 'MOUNIEN', 'Raphael', 'r.mounien@rt-iut.re', 'RT2', '520ffff5e082be9865d99f5b8a8c017a', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30000382, 'PANCHBAYA', 'Louqmane', 'l.panchbaya@rt-iut.re', 'RT2', '629ed941bec4a73720b316dd477c91df', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000395, 'MURAT', 'Christophe', 'christophemurat430@gmail.com', 'RT2', '5aaef74f7f3433fc841d2682f925aa03', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30000424, 'LEBON', 'Sergio', 's.lebon@rt-iut.re', 'RT2', '3810b20210601cb47aae3f1380a264d2', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30000443, 'GIRDARY', 'Loïc', 'l.girdary@rt-iut.re', 'RT2', '06dc9c10cb8eb46b5fcca86460df8662', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30000460, 'PITOY', 'Elodie', 'e.pitoy@rt-iut.re', 'RT2', '62c73adf7f7de2790eaf9e83cb13d481', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000479, 'PERRAULT', 'Alexandre', 'a.perrault@rt-iut.re', 'RT2', 'e0a7abe479216a022d2ed84c74f0eb6d', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000490, 'ODON', 'Thierrico', 't.odon@rt-iut.re', 'RT2', '8a04731eacb74fb3c52e0d50cb2751fb', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30000502, 'FRANCOMME', 'Mathias', 'm.francomme@rt-iut.re', 'RT2', '1da785ade1299722ea5094d2ff0c4dbe', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30000529, 'BIGOT', 'Alex', 'a.bigot@rt-iut.re', 'RT2', '8cee471e62c858d9ecf4b37aca73c677', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30000564, 'TONRU', 'Benjamin', 'b.tonru@rt-iut.re', 'RT2', '417e926e83989b6299e355fbf1b950b7', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30000636, 'RETHORE', 'Sophie', 's.rethore@rt-iut.re', 'RT2', 'd5d70bd86c4760ff5b7a703acd34e5e5', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000645, 'FERRERE', 'Jean Olivier', 'j.ferrere@rt-iut.re', 'RT2', '0bf9a997c615cb6cb3548a65c0218f44', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30000692, 'SOUPRAMANIEN MOUTAMA', 'Gerald', 'g.soupramanien@rt-iut.re', 'RT2', 'afb37e1b9b570200be45bcad6f312fde', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30000734, 'VIENNE', 'Charles', 'c.vienne@rt-iut.re', 'RT1', '6296580f0889e341dd9ba0992333171d', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30001034, 'PAYET', 'Damien', 'd.payet@rt-iut.re', 'RT1', 'bdb106a0560c4e46ccc488ef010af787', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30001506, 'BARRET', 'Ulrick', 'u.barret@rt-iut.re', 'RT1', 'b5488aeff42889188d03c9895255cecc', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30001882, 'RICHAUD', 'Antoine', 'a.richaud@rt-iut.re', 'RT1', 'e1314fc026da60d837353d20aefaf054', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30001909, 'BERILE', 'Renaldo', 'r.berile@rt-iut.re', 'RT2', '0609154fa35b3194026346c9cac2a248', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30001993, 'FOLIO', 'Brice', 'b.folio@rt-iut.re', 'RT2', 'c5a4e7e6882845ea7bb4d9462868219b', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30002155, 'HOARAU', 'Alexandre', 'a.hoarau@rt-iut.re', 'RT2', 'a381c2c35c9157f6b67fd07d5a200ae1', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30002171, 'LEGROS', 'Sebastien', 's.legros@rt-iut.re', 'RT2', 'f8e59f4b2fe7c5705bf878bbd494ccdf', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(30002178, 'DIJOUX', 'Jean Fabrice', 'j.dijoux@rt-iut.re', 'RT2', '169779d3852b32ce8b1a1724dbf5217d', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30002967, 'BATROLO', 'Houfirati', 'h.batrolo@rt-iut.re', 'RT1', '63f44623dd8686aba388944c8810087f', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(30004080, 'GHAZOUANI', 'Soukaina', 's.ghazouani@rt-iut.re', 'RT2', '3b9be7e15b46c42911f39a4a9e861022', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(30004629, 'TOULCANON', 'Loïc', 'l.toulcanon@rt-iut.re', 'RT2', 'bd5c5e1c04111451ed8b63079ea181e7', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(30005167, 'DIJOUX', 'Marc', 'm.dijoux@rt-iut.re', 'RT2', '8c4f839b287d8a4d311eeaad4f8ceb97', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000017, 'IMACHE', 'Jean Yohan', 'j.imache@rt-iut.re', 'RT1', '6858fb45a3d3aef7c29322d3b68dffd1', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000032, 'CHAPELLE', 'Maxime', 'm.chapelle@rt-iut.re', 'RT1', 'c90070ff096dd6858022784617b2f383', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000064, 'BOUDIA', 'Dimitri', 'd.boudia@rt-iut.re', 'RT1', 'b56218f469d935eca49340a717d930f7', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000087, 'PRUVOT', 'Astrid', 'a.pruvot@rt-iut.re', 'RT1', '585869cdf36ea981c9545fcfef880f1d', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000094, 'AURE', 'Joannick', 'j.aure@rt-iut.re', 'RT1', '3d842a955f86c5982f18ed6fea9fa1a9', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000104, 'PELLAN', 'Patrice', 'p.pellan@rt-iut.re', 'RT1', 'be6c5347746fae91bd02a52a114ee14f', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000111, 'CADET', 'Gaël', 'g.cadet@rt-iut.re', 'RT1', '7d7c45b9a935cf9d845fc75679a41559', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000121, 'FRANCOISE-GERBITH', 'Emmanuel', 'e.francoise-gerbith@rt-iut.re', 'RT1', 'fee67cadcc3a0bec8e00641884903c45', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000134, 'PAQUIRY', 'Morgan', 'm.paquiry@rt-iut.re', 'RT1', 'a9bd0eeb3ce6858df275497bb2089ec4', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000154, 'PATEL', 'Oumar', 'o.patel@rt-iut.re', 'RT1', 'e85984bd537ecc6d027b43bef22e4f12', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000181, 'ABOUDOU', 'Salimou', 's.aboudou@rt-iut.re', 'RT1', '5f55a6ece505a982f1ea0f396442bf23', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000205, 'MAZEAU', 'Fabiola', 'f.mazeau@rt-iut.re', 'RT1', '281d5cbef8ded4e9bee409e3b9c67ab2', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000261, 'PAYET', 'Kevin', 'k.payet@rt-iut.re', 'RT1', '761b00dd00830d9ea4713c27591907ae', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000277, 'TIAN-VAN-KAÏ', 'Nicolas', 'n.tian-van-kai@rt-iut.re', 'RT1', '8566418f640c84b79671a915d659087d', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000284, 'MOUROUVIN', 'Mickaël', 'm.mourouvin@rt-iut.re', 'RT1', '33708b5cd432b05542b3a73a24d442db', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000321, 'VILY', 'Mathias', 'm.vily@rt-iut.re', 'RT1', 'cd2acea595e93463bc8ea3b6d1583fc9', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000333, 'LEPINAY', 'Kevin', 'k.lepinay', 'RT1', 'e14337dca990ee77b944d19045b5e927', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000356, 'RIVIERE', 'Gilles', 'g.riviere@rt-iut.re', 'RT1', 'c9d91cb2c696eab32865c0c2e8781380', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000369, 'PICARD', 'Gaetan', 'g.picard@rt-iut.re', 'RT1', 'c602c2531a3b20f2aabf2b05667b7dfe', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000378, 'TETIA', 'Thomas', 't.tetia@rt-iut.re', 'RT1', '4de53ff826398b4d75bdd4051d3e2905', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000396, 'COURTOIS', 'Mathieu', 'm.courtois@rt-iut.re', 'RT1', '1fee9df4bbb1d3a21fbfd782076eb3f1', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000402, 'REALE', 'Geoffroy', 'g.reale@rt-iut.re', 'RT1', 'd25206f06f3137dd920a3e9ae8f0f704', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000459, 'SANDANOM', 'Alexandre', 'a.sandanom@rt-iut.re', 'RT1', '31cc4e34a6d7da69ae0be6ec1869e749', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000492, 'VIDOT', 'Laurianne', 'l.vidot@rt-iut.re', 'RT1', '86309cb7d4819ee8f927f92a4dea1374', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000530, 'NAZE', 'Alexandra', 'a.naze@rt-iut.re', 'RT1', '6252cf639b8797f8ab8f7e73821fee85', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000561, 'LABORDE', 'Yoann', 'y.laborde@rt-iut.re', 'RT1', 'ab7fc7ddc9e45778e8a544181a52222b', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31000572, 'SAUTRON', 'Harris', 'h.sautron@rt-iut.re', 'RT1', 'c40ce525c377b864d98f9720bbf20b13', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000581, 'MAMODALY', 'Chamir', 'c.mamodaly@rt-iut.re', 'RT1', '9064013db48280cd41018d0e19791d48', 'TD1', 'TP2');
INSERT INTO `etudiant` VALUES(31000603, 'RINAUDO', 'Luca', 'l.rinaudo@rt-iut.re', 'RT1', 'c90b7f4378a55a9170642af29922cf5c', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000629, 'SANCHEZ', 'Deborah', 'd.sanchez@rt-iut.re', 'RT1', 'e7690d455e577963ad2b04cf4e6dd9ef', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31000634, 'PIERRE', 'Xavier', 'x.pierre@rt-iut.re', 'RT1', 'e85726ad93c97692c9b137e4293aeed0', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000643, 'PAYET', 'Fabien', 'f.payet@rt-iut.re', 'RT1', 'ab672dae7c05f5595eec0255a0eaea7b', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31000665, 'KOURBANHOUSSEN', 'Malek', 'm.kourbanhoussen@rt-iut.re', 'RT1', 'a073be8fcff86c2f5f8276aedfa5fe25', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31001813, 'ROBERT', 'Adrien', 'a.robert@rt-iut.re', 'RT1', 'f542eae1949358e25d8bfeefe5b199f1', 'TD2', 'TP3');
INSERT INTO `etudiant` VALUES(31001905, 'CHAMAND', 'Ritchy', 'r.chamand@rt-iut.re', 'RT1', '73e0f7487b8e5297182c5a711d20bf26', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31001921, 'FICHERE', 'Jean Mickaël', 'j.fichere@rt-iut.re', 'RT1', '9f6992966d4c363ea0162a056cb45fe5', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31001950, 'ABROUSSE', 'Gaetan', 'g.abrousse@rt-iut.re', 'RT1', '03e7d2ebec1e820ac34d054df7e68f48', 'TD1', 'TP1');
INSERT INTO `etudiant` VALUES(31001983, 'PAYET', 'Tristan', 't.payet@rt-iut.re', 'RT1', '1e4d36177d71bbb3558e43af9577d70e', 'TD2', 'TP2');
INSERT INTO `etudiant` VALUES(31003783, 'RIVIERE', 'Serge', 's.riviere@rt-iut.re', 'RT2', '1aa3d9c6ce672447e1e5d0f1b5207e85', 'TD2', 'TP3');

-- --------------------------------------------------------

--
-- Structure de la table `log_email`
--

CREATE TABLE `log_email` (
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

INSERT INTO `log_email` VALUES('4f6445fce75b77.74089572', '30000321', 'Notification : Nouveau Sujet de Rendu reçue.', 'Nouveau Sujet de Rendu (Test) crée par Lorion Richard', '2012-03-17 12:06:20');
INSERT INTO `log_email` VALUES('4f6445fce77293.61859457', '1', 'Notification : Création d''un sujet.', 'Nouveau Sujet de Rendu (Test) crée par Lorion Richard.', '2012-03-17 12:06:20');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` varchar(255) NOT NULL,
  `id_destinataire` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datePost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` VALUES('4f6445fce73f85.75718354', '30000321', 'Nouveau Sujet de Rendu (<strong>Test</strong>) crée par <strong>Lorion Richard</strong>', '2012-03-17 12:06:20');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
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

INSERT INTO `sujet` VALUES('4f6445fce6c728.85826515', 'Test', '1', '.pdf', '[RT]@Prenom_@Nom[@ID]', '2012-03-22 12:04:00', '2012-03-17 12:06:20', 'Sujet Test', '||30000321||');

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

CREATE TABLE `upload` (
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

