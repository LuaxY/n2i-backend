-- --------------------------------------------------------
-- Host:                         voidmx.net
-- Server version:               10.0.20-MariaDB-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for n2i_2015
CREATE DATABASE IF NOT EXISTS `n2i_2015` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `n2i_2015`;


-- Dumping structure for table n2i_2015.AGENCE
CREATE TABLE IF NOT EXISTS `AGENCE` (
  `AGENCE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ASSOC_ID` int(11) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `AGENCE_CP` varchar(6) NOT NULL,
  `AGENCE_VILLE` varchar(50) NOT NULL,
  `AGENCE_E_MAIL` varchar(75) NOT NULL,
  PRIMARY KEY (`AGENCE_ID`),
  KEY `FK_AGENCE_ASSOC_ID` (`ASSOC_ID`),
  CONSTRAINT `FK_AGENCE_ASSOC_ID` FOREIGN KEY (`ASSOC_ID`) REFERENCES `ASSOCIATION` (`ASSOC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.AGENCE: ~3 rows (approximately)
/*!40000 ALTER TABLE `AGENCE` DISABLE KEYS */;
INSERT INTO `AGENCE` (`AGENCE_ID`, `ASSOC_ID`, `ADRESSE`, `AGENCE_CP`, `AGENCE_VILLE`, `AGENCE_E_MAIL`) VALUES
	(1, 2, '12 rue de la molle', '13100', 'Aix-En-Provence', 'aixenprovence@croixrouge.com'),
	(2, 3, '38 rue Jean Jaurès', '13010', 'Marseille', 'marseille@erasmus.com'),
	(3, 4, '19 boulevard Victor Hugo', '26120', 'Valence', 'valence@restoducoeur.com');
/*!40000 ALTER TABLE `AGENCE` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.ASSOCIATION
CREATE TABLE IF NOT EXISTS `ASSOCIATION` (
  `ASSOC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_ASSOC` varchar(50) NOT NULL,
  PRIMARY KEY (`ASSOC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.ASSOCIATION: ~3 rows (approximately)
/*!40000 ALTER TABLE `ASSOCIATION` DISABLE KEYS */;
INSERT INTO `ASSOCIATION` (`ASSOC_ID`, `NOM_ASSOC`) VALUES
	(2, 'Croix-Rouge Française'),
	(3, 'Emmaus'),
	(4, 'Resto du coeur');
/*!40000 ALTER TABLE `ASSOCIATION` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.DON_ARGENT
CREATE TABLE IF NOT EXISTS `DON_ARGENT` (
  `DON_ARGENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ASSOC_ID` int(11) NOT NULL,
  `MONTANT` double NOT NULL,
  PRIMARY KEY (`DON_ARGENT_ID`),
  KEY `FK_DON_ARGENT_USER_ID` (`USER_ID`),
  KEY `FK_DON_ARGENT_ASSOC_ID` (`ASSOC_ID`),
  CONSTRAINT `FK_DON_ARGENT_ASSOC_ID` FOREIGN KEY (`ASSOC_ID`) REFERENCES `ASSOCIATION` (`ASSOC_ID`),
  CONSTRAINT `FK_DON_ARGENT_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.DON_ARGENT: ~0 rows (approximately)
/*!40000 ALTER TABLE `DON_ARGENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `DON_ARGENT` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.DON_MATERIEL
CREATE TABLE IF NOT EXISTS `DON_MATERIEL` (
  `DON_MATERIEL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ASSOC_ID` int(11) NOT NULL,
  `TEXTE` text NOT NULL,
  PRIMARY KEY (`DON_MATERIEL_ID`),
  KEY `FK_DON_MATERIEL_USER_ID` (`USER_ID`),
  KEY `FK_DON_MATERIEL_ASSOC_ID` (`ASSOC_ID`),
  CONSTRAINT `FK_DON_MATERIEL_ASSOC_ID` FOREIGN KEY (`ASSOC_ID`) REFERENCES `ASSOCIATION` (`ASSOC_ID`),
  CONSTRAINT `FK_DON_MATERIEL_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.DON_MATERIEL: ~1 rows (approximately)
/*!40000 ALTER TABLE `DON_MATERIEL` DISABLE KEYS */;
INSERT INTO `DON_MATERIEL` (`DON_MATERIEL_ID`, `USER_ID`, `ASSOC_ID`, `TEXTE`) VALUES
	(2, 1, 2, '2 lambo morray');
/*!40000 ALTER TABLE `DON_MATERIEL` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.IDEE
CREATE TABLE IF NOT EXISTS `IDEE` (
  `id_idee` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(200) DEFAULT NULL,
  `message` varchar(1000) NOT NULL,
  `dateHeure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valide` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_idee`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.IDEE: ~5 rows (approximately)
/*!40000 ALTER TABLE `IDEE` DISABLE KEYS */;
INSERT INTO `IDEE` (`id_idee`, `objet`, `message`, `dateHeure`, `valide`) VALUES
	(15, 'Standard gratuit', 'Pourquoi ne pas mettre en place un standard gratuit pour les clients fidèles ?', '2015-12-04 00:24:22', 0),
	(16, 'Service client', 'Meilleur prise en charge des dossiers liés aux accidents', '2015-12-04 00:28:59', 0),
	(17, 'Pays étranger', 'Améliorer les services en cas d\'accident dans un pays étranger', '2015-12-04 00:31:42', 0),
	(18, 'Contrat', 'Rendre le contrat plus clair', '2015-12-04 00:40:31', 0),
	(20, 'Carte bancaire', 'Founir un service avec carte bancaire simplifié et plus rapide', '2015-12-04 00:48:42', 0),
	(21, 'Améliorer le design', 'OK ?', '2015-12-04 06:11:17', 0),
	(23, 'Je veux un lapin', 'Je veux un beau lapin pour le manger demain midi.', '2015-12-04 06:22:01', 0),
	(24, 'Faire une nuit de l\'info', 'Blablablablabla', '2015-12-04 06:48:10', 0);
/*!40000 ALTER TABLE `IDEE` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.NOTE
CREATE TABLE IF NOT EXISTS `NOTE` (
  `ID_note` int(11) NOT NULL AUTO_INCREMENT,
  `note` float NOT NULL,
  `ID_idee_IDEES` int(11) NOT NULL,
  PRIMARY KEY (`ID_note`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.NOTE: ~6 rows (approximately)
/*!40000 ALTER TABLE `NOTE` DISABLE KEYS */;
INSERT INTO `NOTE` (`ID_note`, `note`, `ID_idee_IDEES`) VALUES
	(8, 3, 15),
	(9, 1, 16),
	(10, 1, 17),
	(11, 5, 17),
	(12, 5, 18),
	(13, 1, 19);
/*!40000 ALTER TABLE `NOTE` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.QUESTION
CREATE TABLE IF NOT EXISTS `QUESTION` (
  `QUESTION_ID` int(10) NOT NULL AUTO_INCREMENT,
  `QUESTION` varchar(1000) NOT NULL,
  `REPONSES` varchar(1000) NOT NULL,
  `EXPLICATION` varchar(1000) NOT NULL,
  `RANG` int(1) NOT NULL,
  PRIMARY KEY (`QUESTION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.QUESTION: ~4 rows (approximately)
/*!40000 ALTER TABLE `QUESTION` DISABLE KEYS */;
INSERT INTO `QUESTION` (`QUESTION_ID`, `QUESTION`, `REPONSES`, `EXPLICATION`, `RANG`) VALUES
	(1, 'Quel numéro appeler, peu importe l\'urgence ?', '18;112;17;15', 'Le 112. Il s\'agit du numéro universel permettant d\'être redirigé vers le service dont on a besoin.', 2),
	(2, 'A quoi est du l\'étouffement ?', 'Augmentation du rythme cardiaque;Manger trop de Lapin;Obstruction des voies aériennes;Un abus de sport', 'Obstruction des voies aériennes car la rentrée d\'air dans les poumons est gênée ou bloquée et provoque un étouffement', 3),
	(3, 'Qu\'est ce que la PLS ?\r\n', 'Un plat de nouilles ?;Un type de défibrillateur ?;La Pierre Longue Secrète ?;La position laterale de securité', 'La PLS est la position latérale de sécurité c\'est un geste de premiers secours à pratiquer systématiquement lorsque l\'on est en présence d\'une personne inconsciente, qui respire normalemen', 4),
	(4, 'Dois t\'on enlever le casque d\'un motard accidenté ?', 'Oui absolument;Si son etat ne parais pas trop grave;Non jamais;C\'est obligatoire dans le cas ou la victime est marseillaise', 'Non jamais, le risque en enlevant un casque, c\'est d\'avoir une plaie, un traumatisme crânien, un traumatisme au niveau du rachis cervical. Et en enlevant le casque on va aggraver la situation.', 3),
	(5, 'Que faire en cas d’incendie dans votre immeuble ?', 'Prendre ses affaires et courir le plus vite possible;Aller voir tous vos voisins pour les secourir;Sauter par la fenêtre;Suivre le plan d\'évacuation de l\'immeuble', 'Il faut suivre les instructions du plan d\'évacuation de l’immeuble et appeler les pompiers, ne vous prenez pas pour un héros. ', 4);
/*!40000 ALTER TABLE `QUESTION` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.RDV
CREATE TABLE IF NOT EXISTS `RDV` (
  `RDV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AGENCE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `RDV_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MATERIEL` text NOT NULL,
  PRIMARY KEY (`RDV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.RDV: ~2 rows (approximately)
/*!40000 ALTER TABLE `RDV` DISABLE KEYS */;
INSERT INTO `RDV` (`RDV_ID`, `AGENCE_ID`, `USER_ID`, `RDV_DATE`, `MATERIEL`) VALUES
	(7, 1, 1, '2015-12-05 01:59:00', '2 lambo morray'),
	(8, 1, 1, '2015-12-05 00:59:00', 'fff'),
	(9, 1, 1, '2015-12-11 01:58:00', 'ddd'),
	(10, 1, 1, '2015-12-18 01:57:00', '2 lambo morray'),
	(11, 1, 1, '2015-12-16 00:59:00', '2 labmo'),
	(12, 1, 1, '2015-12-16 00:59:00', '2 labmo'),
	(13, 1, 1, '2015-12-16 00:59:00', '2 labmo'),
	(14, 1, 1, '0000-00-00 00:00:00', 'ddd'),
	(15, 1, 1, '2015-12-09 00:59:00', 'ddd'),
	(16, 1, 11, '2015-12-12 23:00:00', 'thibaut');
/*!40000 ALTER TABLE `RDV` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.USER
CREATE TABLE IF NOT EXISTS `USER` (
  `USER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_NOM` varchar(30) NOT NULL,
  `USER_PRENOM` varchar(30) NOT NULL,
  `USER_PWD` varchar(129) NOT NULL,
  `USER_E_MAIL` varchar(75) NOT NULL,
  `USER_CP` varchar(6) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.USER: ~2 rows (approximately)
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` (`USER_ID`, `USER_NOM`, `USER_PRENOM`, `USER_PWD`, `USER_E_MAIL`, `USER_CP`) VALUES
	(1, 'Guineau', 'Yann', '53acf1fda99ea2d0963fe68b1b4b626652158344856f3efbaa55f618e11a87676510088640afbe18c709eb378e0733a7316d7a0d18a4ae498edf8f371d65d459', 'yann.guineau@voidmx.net', '13100'),
	(2, 'Mezhoud', 'Saïd', '53acf1fda99ea2d0963fe68b1b4b626652158344856f3efbaa55f618e11a87676510088640afbe18c709eb378e0733a7316d7a0d18a4ae498edf8f371d65d459', 'said.mezhoud@voidmx.net', '78000'),
	(10, 'B', 'A', '53acf1fda99ea2d0963fe68b1b4b626652158344856f3efbaa55f618e11a87676510088640afbe18c709eb378e0733a7316d7a0d18a4ae498edf8f371d65d459', 'yann@voidmx.net', '13100'),
	(11, 'tedst', 'test', 'bf29e91f8f7c3d114745a4dec513f7f3d6113b1f8e6608ca5871c0346095a7e456489f4e0d5e1d461df3dda529237f6bd0a89bbe2baa8f2a926be2200186b76f', 'jean@test.com', '13163');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;


-- Dumping structure for table n2i_2015.USER_BAI
CREATE TABLE IF NOT EXISTS `USER_BAI` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table n2i_2015.USER_BAI: ~0 rows (approximately)
/*!40000 ALTER TABLE `USER_BAI` DISABLE KEYS */;
/*!40000 ALTER TABLE `USER_BAI` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
