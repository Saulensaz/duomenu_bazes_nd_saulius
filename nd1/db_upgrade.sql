--
-- Table structure for table `BooksToAuthors`
--

CREATE TABLE IF NOT EXISTS `BooksToAuthors` (
  `id` int(11) NOT NULL auto_increment,
  `authorId` int(11) default NULL,
  `bookId` int(11) default NULL,
   PRIMARY KEY (`id`)
);

ALTER TABLE `Books` ADD COLUMN IF NOT EXISTS `genre` varchar(50) DEFAULT NULL;

ALTER TABLE `Books` DROP COLUMN IF EXISTS `authorId`;

ALTER TABLE `Books` CONVERT TO CHARACTER SET utf8mb4;

ALTER TABLE `Books` MODIFY `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

DELETE FROM `Books` WHERE `authorId` IS NULL;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`name`) VALUES 
("Saulius"), ("Petras"), ("Paulius");

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`authorId`, `title`, `year`) VALUES 
(8, "Sauliaus Knyga", 2016), 
(9, "Pažinkime Lietuvą", 2015), 
(10, "Pauliaus Knyga", 2015);

--
-- Dumping data for table `BooksToAuthors`
--

INSERT INTO `BooksToAuthors` (`authorId`, `bookId`) VALUES 
(1, 1), 
(2, 2), 
(3,3), 
(4, 3), 
(3, 2), 
(2,1);
