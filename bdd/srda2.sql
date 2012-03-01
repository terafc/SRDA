-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 18 Novembre 2011 à 04:28
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `srda2`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `num_ens` int(3) NOT NULL AUTO_INCREMENT,
  `nom_ens` varchar(25) CHARACTER SET utf8 NOT NULL,
  `prenom_ens` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email_ens` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`num_ens`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

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
  `nom_etd` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom_etd` varchar(30) COLLATE utf8_bin NOT NULL,
  `email_etd` varchar(320) COLLATE utf8_bin NOT NULL,
  `promo` varchar(10) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`num_etd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etd`, `nom_etd`, `prenom_etd`, `email_etd`, `promo`, `pass`) VALUES
(29000456, 'ALI MOHAMED', 'Ounkache', '', 'RT1', 'fec8038ae4436caa7188b2e3f0bd216f'),
(30000321, 'BAILLIF', 'Florent', '', 'RT1', 'ac0ddf9e65d57b6a56b2453386cd5db5'),
(30001506, 'BARRET', 'Ulrick', '', 'RT1', 'b5488aeff42889188d03c9895255cecc'),
(30002967, 'BATROLO', 'Houfirati', '', 'RT1', '63f44623dd8686aba388944c8810087f'),
(30001909, 'BERILE', 'Renaldo', '', 'RT1', '0609154fa35b3194026346c9cac2a248'),
(30000529, 'BIGOT', 'Alex', '', 'RT1', '8cee471e62c858d9ecf4b37aca73c677'),
(30003170, 'BOYER', 'Jeremie', '', 'RT1', '73e5080f0f3804cb9cf470a8ce895dac'),
(29000036, 'BOYER', 'Miguel', '', 'RT1', '8ae502a489e46e16512581742d93db9c'),
(30000273, 'DEVEAUX', 'Kevin', '', 'RT1', '78c734ebceead5b7b07ffd1414b22eed'),
(30002178, 'DIJOUX', 'Jean Fabrice', '', 'RT1', '169779d3852b32ce8b1a1724dbf5217d'),
(29000040, 'DIJOUX', 'Thomas', '', 'RT1', 'c0f82517af0829daac3a6cf82e9ecc1e'),
(30000645, 'FERRERE', 'Jean Olivier', '', 'RT1', '0bf9a997c615cb6cb3548a65c0218f44'),
(30001993, 'FOLIO', 'Brice', '', 'RT1', 'c5a4e7e6882845ea7bb4d9462868219b'),
(30000502, 'FRANCOMME', 'Mathias', '', 'RT1', '1da785ade1299722ea5094d2ff0c4dbe'),
(30004080, 'GHAZOUANI', 'Soukaina', '', 'RT1', '3b9be7e15b46c42911f39a4a9e861022'),
(30000443, 'GIRDARY', 'Loïc', '', 'RT1', '06dc9c10cb8eb46b5fcca86460df8662'),
(27001248, 'GOSSARD', 'Ingrid', '', 'RT1', '39e4973ba3321b80f37d9b55f63ed8b8'),
(30002155, 'HOARAU', 'Alexandre', '', 'RT1', 'a381c2c35c9157f6b67fd07d5a200ae1'),
(30000239, 'HOARAU', 'Daniel', '', 'RT1', '059fffb74fa5f6ebe37bd1df479c02f7'),
(30000251, 'HOAREAU', 'Nicolas', '', 'RT1', '9e6d4dd4c62c53b79e9acb0434870435'),
(30000424, 'LEBON', 'Sergio', '', 'RT1', '3810b20210601cb47aae3f1380a264d2'),
(30002171, 'LEGROS', 'Sebastien', '', 'RT1', 'f8e59f4b2fe7c5705bf878bbd494ccdf'),
(30000132, 'MARCHAL', 'Mathieu', '', 'RT1', 'dad2fd502d209b12ac27f451b0b9c17e'),
(30000071, 'MARCOZ TSIDIARISON', 'Francel', 'terafc@gmail.com', 'RT2', '43692f46e3168b32434dd507ebc85dbe'),
(30000330, 'MOUNIEN', 'Raphael', '', 'RT1', '520ffff5e082be9865d99f5b8a8c017a'),
(30000395, 'MURAT', 'Christophe', 'christophemurat430@gmail.com', 'RT1', '5aaef74f7f3433fc841d2682f925aa03'),
(30000302, 'NANDJAN', 'Clement', '', 'RT1', 'd25922edb7ab92c0ca31328cbdcbd42f'),
(30000154, 'NECTOUX', 'Benoit', '', 'RT1', 'e85984bd537ecc6d027b43bef22e4f12'),
(30000490, 'ODON', 'Thierrico', '', 'RT1', '8a04731eacb74fb3c52e0d50cb2751fb'),
(30000382, 'PANCHBAYA', 'Louqmane', '', 'RT1', '629ed941bec4a73720b316dd477c91df'),
(30000231, 'PAYET', 'Sebastien', '', 'RT1', 'd60d265e5909f0be46362820c04a387a'),
(30000479, 'PERRAULT', 'Alexandre', '', 'RT1', 'e0a7abe479216a022d2ed84c74f0eb6d'),
(30000460, 'PITOY', 'Elodie', '', 'RT1', '62c73adf7f7de2790eaf9e83cb13d481'),
(30000364, 'RELIQUE', 'Prisca', '', 'RT1', '83822f5159c98d493a11ffbcd05df7f9'),
(30000636, 'RETHORE', 'Sophie', '', 'RT1', 'd5d70bd86c4760ff5b7a703acd34e5e5'),
(30001882, 'RICHAUD', 'Antoine', '', 'RT1', 'e1314fc026da60d837353d20aefaf054'),
(30000168, 'RIVIERE', 'Audrey', '', 'RT1', '9061198a99f995e44314503d643e49a8'),
(29000581, 'ROBERT', 'Nelly', '', 'RT1', '9064013db48280cd41018d0e19791d48'),
(30000257, 'ROCHEFEUILLE', 'Guillaume', '', 'RT1', '8a3fca6bf6bda325a11f7d6a5b06f13c'),
(30000692, 'SOUPRAMANIEN MOUTAMA', 'Gerald', '', 'RT1', 'afb37e1b9b570200be45bcad6f312fde'),
(30000564, 'TONRU', 'Benjamin', '', 'RT1', '417e926e83989b6299e355fbf1b950b7'),
(30004629, 'TOULCANON', 'Loïc', '', 'RT1', 'bd5c5e1c04111451ed8b63079ea181e7'),
(30000734, 'VIENNE', 'Charles', '', 'RT1', '6296580f0889e341dd9ba0992333171d'),
(29000540, 'AH-YONNE', 'Marie Sophie', '', 'RT2', '97001231a709c6dc5ff546ab635c5b70'),
(29000406, 'ALECTON DELETRE', 'Yannis', '', 'RT2', '39322734e276ebaea98ff0d97d981750'),
(29000277, 'ARNASSALOM', 'Kevin', '', 'RT2', '8566418f640c84b79671a915d659087d'),
(29000958, 'ATTAMA', 'Sebastien', '', 'RT2', '8d664e7ce5d7b9c806538d97a0b9dfbf'),
(29000357, 'BIGOT', 'Simon', '', 'RT2', 'c4bb45b78fef29b0e8f0ca96a2e0d3af'),
(29000066, 'BONNEAU', 'Karine', '', 'RT2', '8a68db05bb4617cf7bdc2901679a28d7'),
(29000266, 'CHEN-YEN-SU', 'Arnaud', '', 'RT2', '198f9e9f064617952401a90cfbff7461'),
(29000059, 'CHEVALIER', 'Olivier', '', 'RT2', '47f91082e4cc7d6d0fcf49d5aa6f3711'),
(28001074, 'DARID', 'Mathias', '', 'RT2', '708f3cf8100d5e71834b1db77dfa15d6'),
(29000612, 'DE LARICHAUDY', 'Romain', '', 'RT2', '9b7de329e29300a138ed67f0916e3c74'),
(29000255, 'FERRINO', 'Maxime', '', 'RT2', '9e80dab2f77072016c135c84cf5c899e'),
(28001033, 'GALANT', 'Remi', '', 'RT2', 'e17184bcb70dcf3942c54e0b537ffc6d'),
(29000481, 'GALAOR', 'Angelique', '', 'RT2', '042bea71b7607e3132ecd3fe54e1cac7'),
(29000384, 'GALLIX', 'Laurent', '', 'RT2', 'c8ebfcbb09277bca8ae729a27be6248f'),
(28000293, 'GRONDIN', 'Mathieu', '', 'RT2', 'a3363a6147d5ccb2bbd06d1fa3c7f276'),
(28000371, 'HOARAU', 'Jean-Yann', '', 'RT2', 'cf17919db51b07c8187d2f9531f1fb9e'),
(29000044, 'IMACHE', 'Christophe', '', 'RT2', 'd1f06d78c49ae2f50ed110bf71b14d5d'),
(29000261, 'LALLEMAND', 'Marie-Vanessa', '', 'RT2', '761b00dd00830d9ea4713c27591907ae'),
(29000492, 'LEBON', 'Vincent', '', 'RT2', '86309cb7d4819ee8f927f92a4dea1374'),
(29000628, 'LEVENEUR', 'Emmanuel', '', 'RT2', 'b62e8626ca7f5d5c9abfa7faf04644e5'),
(29000073, 'MAILLOT', 'Ludovic', '', 'RT2', '533e708938a41768fa8e38b3be11a82a'),
(29000466, 'MAITRE', 'Mathieu', '', 'RT2', '89f05cb285f636e4a39d7f14fffc796e'),
(29000272, 'MIRANVILLE', 'Jean Ulrick', '', 'RT2', 'b94d71e6bc4cc21ffbaaef5e4aca6f03'),
(28000527, 'MORBY', 'Damien', '', 'RT2', 'fecf4d772f647e978c7daa4b3b446ada'),
(28000327, 'MUSSARD', 'Vincent', '', 'RT2', 'b66e006887ffc2f80406dab915ecddb2'),
(29004183, 'NAZROO', 'Yousuf', '', 'RT2', '217f5e7754c92d28fc6835d42f43548d'),
(29000566, 'PADEAU', 'Julien', '', 'RT2', '336e7e53cf0e3fbc9eb41bfaf6dc4847'),
(29000503, 'PAYET', 'Benjamin-Loic', '', 'RT2', 'ed1b95b0728d4e8e4496598550e2fb9d'),
(28000790, 'PAYET', 'Julien', '', 'RT2', '0111ce77801c36b76b07263f4dda44ca'),
(29001067, 'RECULIN', 'Xavier', '', 'RT2', '31857b449c407203749ae32dd0e7d64a'),
(29000443, 'SCHNEEBELI', 'Nicolas', '', 'RT2', '06dc9c10cb8eb46b5fcca86460df8662'),
(29000431, 'SINAMA', 'Laurent', '', 'RT2', '28bf5a0160d4921a4f6c52129ff8342e'),
(29000301, 'TELMART', 'Julien', '', 'RT2', '3bd191aadaebb78ea49f12d8228ad4f8'),
(29001136, 'THIA SONG FAT', 'Antoine', '', 'RT2', '47a658229eb2368a99f1d032c8848542'),
(29001128, 'THIA SONG FAT', 'Nicolas', '', 'RT2', '3fe78a8acf5fda99de95303940a2420c'),
(29000351, 'THIBURCE', 'Jeremy', '', 'RT2', '5538aa8fdcb1ab7d32e95b774cc72db5'),
(29000051, 'TREBALAGE', 'Sybella', '', 'RT2', 'd33f67c5652acb3fac99b9dc16bea0c1'),
(28000529, 'TURPIN', 'Dimitri', '', 'RT2', '8cee471e62c858d9ecf4b37aca73c677'),
(28000022, 'VIRAMA-LATCHOUMY', 'Romain', '', 'RT2', '147768d3955e38c4e662c0a95d807abc'),
(28000578, 'ANETTE', 'Ludovic', '', 'LP RT', 'b6298f271e699d3987aafb1471c70ef8'),
(30003187, 'BARRET', 'Teddy Nicolas', '', 'LP RT', '31c0c178a9fc26ffecffd8670e6d746d'),
(27000426, 'DIJOUX', 'Christopher', '', 'LP RT', '5167aca0cc67fe216140fd438eb906e3'),
(30003001, 'LEPERLIER', 'Paul-Antoine', '', 'LP RT', '908c9a564a86426585b29f5335b619bc'),
(26001254, 'LUNG-TUNG', 'Kevin', '', 'LP RT', '884ce4bb65d328ecb03c598409e2b168'),
(28000984, 'MANGROO', 'Julien', '', 'LP RT', '9c964e5baf57b36750ae26bc78ba9cb0'),
(26000138, 'OMARJEE', 'Riyadh', '', 'LP RT', '61c0a1c102fcea5965d8ea8e941e16b0'),
(28000496, 'PAYET', 'Didiet', '', 'LP RT', '7f541fe1ba15e1df0075de40b25078b8'),
(28000918, 'PAYET', 'Julien', '', 'LP RT', '921e691f871caa6e729d47babff8ead6'),
(28000692, 'PAYET', 'Mathias', '', 'LP RT', 'afb37e1b9b570200be45bcad6f312fde'),
(28000554, 'PAYET', 'Mathieu', '', 'LP RT', '2ca73012d3ce0e035f4649b6c14d9acc'),
(30003877, 'POUZET', 'Andre Patrice', '', 'LP RT', '8d9a6e908ed2b731fb96151d9bb94d49'),
(28001037, 'RAJAOBELINA', 'Mathieu', '', 'LP RT', 'eddb904a6db773755d2857aacadb1cb0'),
(30004381, 'SELLAYE', 'Jean Loïc', '', 'LP RT', 'd2e9dd9dcd97fd12a2cb62e2bf7cbe35'),
(30004740, 'SITALAPRESAD', 'Ludovic', '', 'LP RT', '0f304eddb4ad6007a3093fd6d963a1d2'),
(30004573, 'VALMY', 'Jean Christophe', '', 'LP RT', '0b24d8469d6c1277a4acb549d97b8a25');
