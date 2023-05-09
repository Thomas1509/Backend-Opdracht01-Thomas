DROP DATABASE IF EXISTS BEOpdracht1;
CREATE DATABASE BEOpdracht1;
USE BEOpdracht1;
SET FOREIGN_KEY_CHECKS=0;

-- Create Product Tabel
CREATE TABLE Magazijn (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    VerpakkingsEenheid VARCHAR(50) NOT NULL,
    AantalAanwezig INT NULL,
	FOREIGN KEY (product_id) REFERENCES Product(Id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

-- Create Product Tabel
CREATE TABLE Product (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50) NOT NULL,
    Barcode BIGINT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE ProductPerAllergeen (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    allergeen_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (product_id) REFERENCES Product(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (allergeen_id) REFERENCES Allergeen(Id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Allergeen (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50) NOT NULL,
    Omschrijving VARCHAR(100) NULL
)ENGINE=InnoDB;

CREATE TABLE ProductPerLeverancier (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    leverancier_id INT UNSIGNED NOT NULL,
	DatumLevering DATE NOT NULL,
    Aantal INT NOT NULL,
	DatumEerstVolgendeLevering DATE NULL,
	FOREIGN KEY (product_id) REFERENCES Product(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (leverancier_id) REFERENCES Leverancier(Id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Leverancier (
    Id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Naam VARCHAR(50) NOT NULL,
	ContactPersoon VARCHAR(100) NOT NULL,
	LeverancierNummer VARCHAR(14) NOT NULL,
	Mobiel VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

 -- Insert Values
 INSERT INTO Magazijn (product_id, VerpakkingsEenheid, AantalAanwezig)
VALUES (1, '5kg', 453),
	   (2, '2,5g', 400),
       (3, '5kg', 1),
       (4, '1kg', 800),
       (5, '3kg', 234),
       (6, '2kg', 345),
       (7, '1kg', 795),
       (8, '10kg', 233),
       (9, '2,5kg', 123),
       (10, '3kg', NULL),
       (11, '2kg', 367),
       (12, '1kg', 467),
       (13, '5kg', 20);
              
INSERT INTO Product (Naam, Barcode)
VALUES ('Mintnopjes', 8719587231278),
       ('Schoolkrijt', 8719587326713),
	   ('Honingdrop', 8719587327836),
       ('Zure Beren', 8719587321441),
       ('Cola Flesjes', 8719587321237),
       ('Turtles', 8719587322245),
       ('Witte Muizen', 8719587328256),
       ('Reuzen Slangen', 8719587325641),
       ('Zoute Rijen', 8719587322739),
       ('Winegums', 8719587327527),
       ('Drop Munten', 8719587322345),
       ('Kruis Drop', 8719587322265),
       ('Zoute Ruitjes', 8719587323256);
       
INSERT INTO ProductPerAllergeen (product_id, allergeen_id)
VALUES (1,	2),
       (1,	1),
       (1,	3),
       (3,	4),
       (6,	5),
       (9,	2),
       (9,	5),
       (10,	2),
       (12,	4),
       (13,	1),
       (13,	4),
       (13,	5);
       
INSERT INTO Allergeen (Naam, Omschrijving)
VALUES ('Gluten', 'Dit product bevat gluten'),
       ('Gelatine', 'Dit product bevat gelatine'),
       ('AZO-Kleurstof','Dit product bevat AZO-kleurstoffen'),
       ('Lactose', 'Dit product bevat lactose'),
       ('Soja', 'Dit product bevat soja');
       
INSERT INTO ProductPerLeverancier (leverancier_id, product_id, DatumLevering, Aantal, DatumEerstVolgendeLevering)
VALUES (1,	1, '2023-04-09', 23, '2023-04-16'),
       (1,	1, '2023-04-18', 21, '2023-04-25'),
       (1,	2, '2023-04-09', 12, '2023-04-16'),
       (1,	3, '2023-04-10', 11, '2023-04-17'),
       (2,	4, '2023-04-14', 16, '2023-04-21'),
       (2,	4, '2023-04-21', 23, '2023-04-28'),
       (2,	5, '2023-04-14', 45, '2023-04-21'),
       (2,	6, '2023-04-14', 30, '2023-04-21'),
       (3,	7, '2023-04-12', 12, '2023-04-19'),
       (3,	7, '2023-04-19', 23, '2023-04-26'),
       (3,	8, '2023-04-10', 12, '2023-04-17'),
       (3,	9, '2023-04-11', 1, '2023-04-18'),
       (4,	10, '2023-04-16', 24, '2023-04-30'),
       (5,	11, '2023-04-10', 47, '2023-04-17'),
       (5,	11, '2023-04-19', 60, '2023-04-26'),
       (5,	12, '2023-04-11', 45, NULL),
       (5,	13, '2023-04-12', 23, NULL);
       
INSERT INTO Leverancier (Naam, ContactPersoon, LeverancierNummer, Mobiel)
VALUES ('Venco', 'Bert van Linge', 'L1029384719', '06-28493827'),
       ('Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734'),
       ('Haribo','Sven Stalman', 'L1029324748', '06-24383291'),
       ('Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823'),
       ('De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234');
-- Selects
SELECT * FROM Allergeen;
SELECT * FROM Leverancier;
SELECT * FROM Magazijn;
SELECT * FROM Product;
SELECT * FROM ProductPerAllergeen;
SELECT * FROM ProductPerLeverancier;
