
-- UTF8 WITH BOM

DROP TABLE IF EXISTS `Afzet`;
DROP TABLE IF EXISTS `Klant`;
DROP TABLE IF EXISTS `Product`;
DROP TABLE IF EXISTS `Verkoper`; 
DROP TABLE IF EXISTS `Kamer`;

CREATE TABLE `Product` (
	`ProdNr` int,
	`ProdNaam` varchar(40),
	`Prijs` decimal(10,2),
	CONSTRAINT `ProductPK` PRIMARY KEY (`ProdNr`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `Kamer` (
        `KamerNr` int,
        `Telefoon` varchar(12),
        `Grootte` int,
	CONSTRAINT `KamerPK` PRIMARY KEY (`KamerNr`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `Verkoper` (
	`VerkNr` int,
	`VerkNaam` varchar(40),
	`ComPct` int,
	`InDienst` int,
	`KamerNr` int,
	CONSTRAINT `VerkoperPK` PRIMARY KEY (`VerkNr`),
	CONSTRAINT `KamerFK` FOREIGN KEY (`KamerNr`) 
		REFERENCES `Kamer` (`KamerNr`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `Afzet` (
	`VerkNr` int,
	`ProdNr` int,
	`Aantal` int,
	CONSTRAINT `AfzetPK` PRIMARY KEY (`VerkNr`,`ProdNr`),
	CONSTRAINT `AfzetProduct` FOREIGN KEY (`ProdNr`) 
		REFERENCES `Product` (`ProdNr`) ON UPDATE CASCADE,
	CONSTRAINT `AfzetVerkoper` FOREIGN KEY (`VerkNr`) 
		REFERENCES `Verkoper` (`VerkNr`) ON 
		UPDATE CASCADE
		ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `Klant` (
	`KlantNr` INT NOT NULL AUTO_INCREMENT,
	`KlantNaam` varchar(40),
	`VerkNr` INT,
	`PlaatsHfdkntr` varchar(40),
	CONSTRAINT `KlantPK` PRIMARY KEY (`KlantNr`),
	CONSTRAINT `KlantVerkoper` FOREIGN KEY (`VerkNr`)
		REFERENCES `Verkoper` (`VerkNr`) 
		ON UPDATE CASCADE
		ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

INSERT INTO `Kamer` VALUES 
('101', '', '100'),
('102', '', '120'),
('103', '', '120'),
('109', '', '140'),
('111', '', '110'),
('113', '', '220'),
('122', '', '200');

INSERT INTO `Verkoper` VALUES
('137', 'Moeglen', '10', '2005', '101'),
('244', 'Küçük', '10', '2014', '111'), 
('186', 'Warnink', '15', '2001', '103'),
('204', 'Ubags', '10', '1998', '109'),
('123', 'Spijkerman', '10', '2014', '113'),
('361', 'Van Haperen', '20', '2011', '122');

INSERT INTO `Product` VALUES
('16386', 'Voorhamer', '28.50'),
('19440', 'Steeksleutel 14/15', '4.00'),
('19442', 'Steeksleutel 16/17', '4.30'),
('21765', 'Hamer 250g', '9.78'),
('24013', 'Emmer 10L', '16.65'),
('26722', 'Kruiwagen', '199.50');

INSERT INTO `Klant` VALUES
('121', 'Werk aan de Winkel', '137', 'Rotterdam'),
('933', 'Doe Het Zelf!', '137', 'Den Haag'),
('839', 'De Werkwinkel', '186', 'Antwerpen'),
('1047', 'Hank’s Hardware Store', '137', 'Den Haag'),
('1700', 'De Klusclub', '361', 'Etten-Leur'),
('1826', 'Whistle While You Work', '137', 'Rotterdam'),
('2198', 'Tool Box', '204', 'Amsterdam'),
('2267', 'Hobby Center', '186', 'Breda'),
('2288', 'Nieuwe Hamers', NULL, 'Gorinchem'),
('1525', 'Henks Gereedschap', '361', 'Breda');

INSERT INTO `Afzet` VALUES
('137', '19440', '473'),
('137', '24013', '170'),
('137', '26722', '688'),
('186', '16386', '1745'),
('186', '19440', '2529'),
('186', '21765', '1962'),
('186', '24013', '3071'),
('204', '21765', '809'),
('204', '26722', '734'),
('361', '16386', '3729'),
('361', '21765', '3110'),
('361', '26722', '2738');

