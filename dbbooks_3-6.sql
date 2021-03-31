-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 11:52 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdress`
--

CREATE TABLE `tbladdress` (
  `AddressId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `AddressText` text NOT NULL,
  `StateId` int(11) NOT NULL,
  `CityId` int(11) NOT NULL,
  `IsDefault` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladdress`
--

INSERT INTO `tbladdress` (`AddressId`, `UserId`, `AddressText`, `StateId`, `CityId`, `IsDefault`) VALUES
(4, 2, '3,madhav row house', 1, 6, 1),
(5, 1, '40/383,Khatodara Colony', 1, 6, 0),
(6, 6, '10,Sagrampura', 1, 6, 0),
(8, 3, 'egehgojfk', 4, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `ImageUrl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminId`, `AdminName`, `EmailId`, `Password`, `ContactNo`, `ImageUrl`) VALUES
(1, 'Admin', 'dhvanigondaliya@gmail.com', 'zMbc2Nlib28=', '9825144670', 'avatar2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `BannerId` int(11) NOT NULL,
  `ImageName` varchar(100) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`BannerId`, `ImageName`, `IsActive`, `CreatedOn`) VALUES
(5, 'books_tom_beer_NBCC_logo1.jpg', 0, '2019-04-18 15:06:53'),
(6, 'My_Post.jpg', 1, '2019-05-24 14:00:47'),
(7, 'My_Post2.jpg', 1, '2019-05-24 14:01:02'),
(8, 'My_Post3.jpg', 1, '2019-05-24 14:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `BookId` int(11) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `PublisherId` int(11) DEFAULT NULL,
  `Language` varchar(20) NOT NULL,
  `Edition` varchar(20) NOT NULL,
  `Qty` int(11) NOT NULL,
  `OriginalPrice` int(11) NOT NULL,
  `SalePrice` int(11) NOT NULL,
  `ISBNno` varchar(50) DEFAULT NULL,
  `ImageName` varchar(150) NOT NULL,
  `Description` text,
  `IsNew` tinyint(4) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`BookId`, `BookName`, `CategoryId`, `SubCategoryId`, `Author`, `PublisherId`, `Language`, `Edition`, `Qty`, `OriginalPrice`, `SalePrice`, `ISBNno`, `ImageName`, `Description`, `IsNew`, `UserId`) VALUES
(29, 'The Girl in the Room 105', 3, 10, 'Chetan Bhagat', 21, 'English', '3', 4, 222, 222, '1352degt', 'chetanB1.jpg', 'story about a girl named zara', 0, 1),
(33, 'Computer Network', 1, 3, 'Tanenbaum', 30, 'English', '5', 3, 450, 299, '978-9332518742', '5.jpg', 'The book is an introduction to computer networking for those seeking information on various aspects of establishing and maintaining wireless networks. ', 1, 3),
(34, '3 Mistakes of my Life', 3, 10, 'Chetan Bhagat', 7, 'English', '3', 2, 300, 200, '123dc', '3mistake1.jpg', 'ghh', 1, 2),
(35, 'Life of Pi', 2, 26, 'Yann Martel', 9, 'English', 'Kindle Edition', 5, 123, 123, 'B002RI9UBS', 'life_of_pi2.jpg', 'One boy, one boat, one tiger . . .\n The scene is set for one of the most extraordinary and best-loved works of fiction in recent years.', 1, 1),
(36, 'Harry Potter and Goblet of Fire', 2, 26, 'J. K. Rowling', 11, 'Hindi', 'Paperback 2007', 9, 310, 270, '8183220525', 'harry_potter_hindi.jpg', 'Story of Harry Potter ', 0, 1),
(37, 'Treasure Island', 2, 26, 'Robert Louis Stevenson', 12, 'English', '1', 15, 99, 99, '978-8172344764', 'treasure_island.jpg', 'Think of the high seas and of a buccaneer ship; of a wild seaman with a sea chest full of gold; of Long John Silver; of a buried treasure and of young Jim Hawkins, the boy with the treasure map the key to it all. \n\nThis is the Treasure Island and if you don\'t think of all this, the pirates will hunt you down and when they find you, for find you they sure will, they will truss you and carry you back to their ship and just before they feed you to the sharks, as you walk the gangplank with a sword digging sharp and sure into your back, they will sing their one last song for you.\n\n“Fifteen men on the dead man\'s chest \n\nYo-ho-ho and a bottle of rum!”', 1, 1),
(38, 'Harry Potter And The Order Of The Phoenix', 2, 26, 'J. K. Rowling', 13, 'English', '1', 6, 401, 401, '9780439358071', 'harry_potter_order_.jpg', 'In his fifth year at Hogwart\'s, Harry faces challenges at every turn, from the dark threat of He-Who-Must-Not-Be-Named and the unreliability of the government of the magical world to the rise of Ron Weasley as the keeper of the Gryffindor Quidditch Team. ', 1, 1),
(39, 'The Magic of the Lost Temple', 2, 26, 'Sudha Murty', 15, 'English', '1', 5, 179, 179, '978-0143333166', 'magic_lost_temple.jpg', 'Join the very curious character of Nooni as she unfolds the mystery behind the stepwell.', 1, 2),
(40, 'Peek-A Who?', 2, 9, 'Nina Laden', 16, 'English', '1', 5, 420, 380, '978-0811826020', 'peek_a_who_.jpg', 'Peek-a-Who! takes the most loved baby and toddler game and puts it in book form!', 0, 1),
(42, 'Children\'s Big Book of Activities', 2, 9, 'VS Editorial Board', 18, 'Hindi', '1', 3, 99, 99, '978-9381588888', 'kid_hindi_craft.jpg', 'The above mentioned brain-teasers and puzzles will not only help in sharpening the mental abilities of the tiny-tots, but also prepare them thoroughly for the higher classes in school. \n', 1, 1),
(43, 'Charlie and the Chocolate Factory ', 2, 30, 'Roald Dahl', 19, 'English', '1', 3, 317, 99, '9780141365374', 'charlie_choc_fct.jpg', 'Willy Wonka\'s famous chocolate factory is opening at last! But only five lucky children will be allowed inside.', 0, 3),
(44, 'The BFG', 2, 30, 'Roald Dahl', 19, 'English', '1', 2, 252, 175, '978-0141365428', 'bfg.jpg', 'Phizzwhizzing new cover look and branding for the World\'s NUMBER ONE Storyteller WIGGLE YOUR EARS! This new edition includes MAKE-YOUR-OWN GIANT EARS for dress-up! On a dark, silvery moonlit night, Sophie is snatched from her bed by a giant. Luckily it is the Big Friendly Giant, the BFG, who only eats snozzcumbers and glugs frobscottle. But there are other giants in Giant Country. Fifty foot brutes who gallop far and wide every night to find human beans to eat. Can Sophie and her friend the BFG stop them? Let\'s hope so - otherwise the next child a gruesome giant guzzles could be YOU. Also look out for new Roald Dahl apps in the App store and Google Play- including the disgusting TWIT OR MISS! and HOUSE OF TWITS inspired by the revolting Twits.', 0, 1),
(45, 'James and the Giant Peach', 2, 30, 'Roald Dahl', 19, 'English', '', 10, 315, 315, '978-0141365459', 'james_gaint1.jpg', 'Phizzwhizzing new cover look and branding for the World\'s NUMBER ONE Storyteller! James Henry Trotter lives with two ghastly hags. Aunt Sponge is enormously fat with a face that looks boiled and Aunt Spiker is bony and screeching. He\'s very lonely until one day something peculiar happens. At the end of the garden a peach starts to grow and GROW AND GROW. Inside that peach are seven very unusual insects - all waiting to take James on a magical adventure. ', 1, 6),
(46, '100 Great Inspiring Stories', 2, 29, ' G. Francis Xavier', 20, 'Gujarati', '1', 1, 120, 120, '978-8184957327', 'guj.jpg', 'Now in Gujarati stories and anecdotes are the best way to convey a powerful message. Here is a collection of inspirational and motivational stories, which everyone will enjoy reading and you can learn something from each story too', 1, 1),
(47, 'Number the Stars', 2, 27, 'Lois Lawry', 17, 'English', '1', 4, 255, 255, '978-0007395200', 'nodstars.jpg', 'As the German troops begin their campaign to \"relocate\" all the Jews of Denmark, Annemarie Johansen’s family takes in Annemarie’s best friend, Ellen Rosen, and conceals her as part of the family.Through the eyes of ten-year-old Annemarie, we watch as the Danish Resistance smuggles almost the entire Jewish population of Denmark, nearly seven thousand people, across the sea to Sweden. The heroism of an entire nation reminds us that there was pride and human decency in the world even during a time of terror and war.With a new introduction by the author.', 1, 4),
(48, 'Giver', 2, 27, 'Lois Lawry', 17, 'English', '1', 5, 277, 277, '978-8180549281', 'giver.jpg', 'A PBS Great American Read Top 100 PickThe Giver, the 1994 Newbery Medal winner, has become one of the most influential novels of our time. The haunting story centers on twelve-year-old Jonas, who lives in a seemingly ideal, if colorless, world of conformity and contentment. Not until he is given his life assignment as the Receiver of Memory does he begin to understand the dark, complex secrets behind his fragile community. Lois Lowry has written three companion novels to The Giver, including Gathering Blue, Messenger, and Son.', 1, 1),
(50, 'Five Lies My Teacher Told Me: Success Tips for the New Generation', 2, 27, 'Chandan Deshmukh', 21, 'English', '1', 2, 100, 100, '978-9386850607', 'lies1.jpg', 'Who determines your success? Choose: Suma Aunty, that nosy relative whom you meet in family functions a) Ravi, your Facebook friend whose posts are all about his ‘great’ life b) You\r\n\r\nSuccess of course means different things for different people, but wanting success is universal. Many of us make the mistake of being flabbergasted by the achievements of those who have gone before us. We see them as superiors and consequently, belittle ourselves and thus end up with far lesser than what we deserve. We become our greatest enemy.\r\n\r\nIs success something that happens by chance or are there a few things that one can do to achieve it? In this wonderful new book by the best-selling author of Six Secrets Smart Students Don’t Tell You, success is unpacked and its many secrets defined in simple terms.\r\n\r\nThe lessons of 5 Lies My Teacher Told Me are simple. They are easy to put into action from Day 1. And they are guaranteed to take you where you belong.', 1, 3),
(51, 'The Barbecue! Bible', 12, 39, 'Steven Raichlen', 22, 'English', '1', 4, 350, 350, '9780761149439', 'bbq.jpg', 'The Barbecue Bible now includes full-color photographs illustrating food preparation, grilling techniques, ingredients, and of course those irresistible finished dishes.', 1, 1),
(52, 'Barbecue! Bible : Sauces, Rubs, and Marinades, Bastes, Butters, and Glazes', 12, 39, 'Steven Raichlen', 22, 'English', '1', 5, 450, 450, '9780761120131', 'bbq2.jpg', 'Barbecue sauces, rubs, and marinades are every griller’s secret weapon—the flavor boosters that give grilled food its character, personality, depth, and soul.', 1, 4),
(53, 'Sizzlers & Barbeques: 1 (Total Health Series)', 12, 39, 'Tarla Dalal', 23, 'English', '1', 3, 225, 175, ' 978-8186469729', 'sizzler.jpg', 'This time I bring you two rather unusual subjects that I am particularly fond of Sizzlers and Barbeques. Sizzlers are a recent innovation that consists of an entire meal served on a cast iron platter that is placed on a wooden base. This is a collection of eleven innovative sizzler combinations inspired by world cuisines featuring many authentic recipes that presented on sizzling platters to make innovative combinations. Four of these are delectable dessert sizzlers, an eclectic way to end a meal! Barbeques are for outdoor cooking. ', 0, 1),
(54, 'Sizzlers & Barbeques: 1 (Total Health Series)', 12, 39, 'Tarla Dalal', 23, 'English', '1', 3, 225, 225, ' 978-8186469729', 'sizzler1.jpg', 'This time I bring you two rather unusual subjects that I am particularly fond of Sizzlers and Barbeques. Sizzlers are a recent innovation that consists of an entire meal served on a cast iron platter that is placed on a wooden base. This is a collection of eleven innovative sizzler combinations inspired by world cuisines featuring many authentic recipes that presented on sizzling platters to make innovative combinations. Four of these are delectable dessert sizzlers, an eclectic way to end a meal! Barbeques are for outdoor cooking. ', 1, 5),
(55, 'Eggless Desserts', 12, 38, 'Tarla Dalal', 23, 'English', '1', 8, 150, 150, '978-8178693255', 'bakecakejpg.jpg', 'No meal is complete without a dessert. An elegant dessert rounds off the success of any dinner party. Whether its a special family dinner, a birthday, a festive occasion or just to pamper your loved ones.', 1, 1),
(56, 'Baking Recipes', 12, 38, 'Nita Mehta', 24, 'Hindi', '1', 5, 26, 26, ' 978-8178693255', 'Hindi_me_bake.jpg', 'Whether you are looking for a baked dish to serve a family meal or something special to choose for a party, there are lots of ideas for you. The book will help you perfect savory dishes like Pancakes in Paprika Sauce, Cheese and Bean Enchiladas, Potato Broccoli and many more.', 1, 4),
(57, 'Gujarati Vangion', 12, 40, 'Tarla Dalal', 23, 'Gujarati', '1', 8, 200, 200, '978-8186469514', 'gujju.jpg', 'Gujaratis have perhaps truly perfected the art of vegetarian cooking! Using a little intergrity, they have succeeded in transforming the simplest ingredients into mouth watering delicacies. Gujarati cuisine is a subtle blend of flavours and textures. All the three main regions of Gujarat have their own unique culinary styles. A Guajarati meal served in a thali is an experience by itself. Beginning with cumin spiked buttermilk, followed by fluffy rotis, accompanied by a variety of lentils (kathols), vegetables, curds, pickles, mithais and farsans finished with rice or khichdi. Apart from pampering the palate, it is also a well balanced meal. Most Guajarati recipes were traditionally handed down from mother to daughter and a very few attempts were made to document them. In the process much has been lost, at the same time as a result of improvisations made by each generation to suit their changing tastes and also to adopt to their lifestyles, there have also been many gains. This book is an attempt to document the classic recipes so that it can help both the inexperienced beginner as well as the connoisseur.', 1, 1),
(58, 'Indian Thali', 12, 40, 'Vaishali Tripathi', 25, 'English', '1', 13, 780, 640, '978-1482800753', 'indian_food_.jpg', 'Thali refers to a complete Indian meal that showcases a range of different food items. Indian cuisine has attracted the people from the world over, and Indian restaurants overseas are among the more popular joints to eat out in most cities abroad. In India, you will find a wider variety of all dishes, snacks, meal preparations, and desserts as well. Different food items, like rice, puris, bread, two to three vegetable dishes, curd, pickles, and sweets are included in the thali, depending on the type and variety of the thali. Thalis are usually referred to with the region included in the name, like Rajasthani Thali, Gujarati Thali, Punjabi Thali, Marathi Thali, and South Indian Thali.', 1, 2),
(59, 'The Everyday Healthy Vegetarian: Delicious Meals from the Indian Kitchen', 12, 40, 'Nandita Iyer', 26, 'English', '1', 1, 180, 150, '978-9350098271', 'veg.jpg', 'Cooking healthy meals can be creative, easy and downright fun!\nIn The Everyday Healthy Vegetarian, Dr Nandita Iyer, trained nutritionist and self-taught celebrity chef, provides a fantastic combination of myth-busting nutritional advice and simple, fuss-free vegetarian recipes using everyday ingredients from the Indian kitchen.', 0, 5),
(60, 'Database System Concepts', 1, 20, 'Silberschatz', 27, 'English', '6', 15, 474, 474, '978-9332901384', 'db.jpg', 'The sixth edition of Database System Concepts is popularly considered to be one of the cornerstone texts of database education. The basic and fundamental concepts are presented in an intuitive manner, and is designed to help students begin working with databases as soon as possible.', 1, 5),
(61, 'Database Systems Concepts', 1, 20, 'Silberschatz', 27, 'English', '5', 5, 390, 300, '978-0071244763', 'db5.jpg', 'Database System Concepts, 5/e, is intended for a first course in databases at the junior or senior undergraduate, or first-year graduate, level. In addition to basic material for a first course, the text contains advanced material that can be used for course supplements, or as introductory material for an advanced course.\nThe authors assume only a familiarity with basic data structures, computer organization, and a high-level programming language such as Java, C, or Pascal. Concepts are presented as intuitive descriptions, and many are based on the running example of a bank enterprise. Important theoretical results are covered, but formal proofs are omitted. In place of proofs, figures and examples are used to suggest why a result is true.', 0, 1),
(62, 'ORACLE PL/SQL', 1, 20, 'Vibrant Publishers', 28, 'English', '3', 3, 429, 300, '978-1946383112', 'pl_interview_db1.jpg', 'Book Includes:\r\n\r\n(a) 261 ORACLE PL/SQL Interview Questions, Answers and Proven Strategies for getting hired as an ORACLE PL/SQL Professional\r\n\r\n(b) Dozens of examples to respond to interview questions\r\n\r\n(c) 77 HR Questions with Answers and Proven strategies to give specific, impressive, answers that help nail the interviews\r\n\r\n(d) 2 Aptitude Tests included on the CD-ROM', 0, 1),
(63, 'Programming in ANSI C', 1, 4, 'Balagurusamy', 27, 'English', '7', 3, 410, 410, '978-1946383112', 'ANSI.jpg', 'This seventh edition is thoroughly updated with outcome based learning approach as per standard Bloom’s Taxonomy. The new additions are important contents like “Graphic programming using C. Self-explanatory interactive simulation videos and case studies are integrated throughout the book using QR codes. Additional write-ups and projects are also available for reference of the user.', 1, 7),
(64, 'The Digital Photography Book : The Step-by-Step Secrets for How to Make Your Photos Look Like the Pr', 1, 5, 'Scott Kelby', 29, 'English', '1', 6, 299, 200, '9780321474049', 'comp_Sci1.jpg', 'This text tackles the most important side of digital photography - how to take professional-quality shots using the same tricks today\'s top digital pros use.', 0, 7),
(65, 'Computer Networks: A Top - Down Approach', 1, 3, 'FOROUZAN', 27, 'English', '1', 2, 475, 290, '978-1259001567', 'top_down.jpg', '\"Overview: This new networking text follows a top-down approach. The presentation begins with anexplanation of the application layer, which makes it easier for students to understandhow network devices work, and then moves on to discuss the other layers, ending withthe physical layer.', 0, 7),
(66, 'Bakes Cakes', 12, 38, 'Nita Mehta', 24, 'English', '1', 0, 199, 100, '978-8186004777', 'bakecakes.jpg', 'Aims to present many traditional and more intricate recipes to choose from.', 0, 2),
(67, 'Baking Recipes', 12, 38, 'Nita Mehta', 24, 'Gujarati', '1', 4, 199, 199, '978-8186004777', 'gujbake.jpg', 'Aims to present many traditional and more intricate recipes to choose from.', 1, 1),
(68, 'Modern Operating Systems 4e', 1, 2, 'Tanenbaum', 30, 'English', '4', 8, 655, 655, '978-9332575776', 'os.jpg', 'Modern Operating Systems, Fourth Edition, is intended for introductory courses in Operating Systems in Computer Science, Computer Engineering and Electrical Engineering programs. \r\n\r\nThe widely anticipated revision of this worldwide best-seller incorporates the latest developments in operating systems (OS) technologies. The Fourth Edition includes up-to-date materials on relevant OS. Tanenbaum also provides information on current research based on his experience as an operating systems researcher.', 1, 7),
(69, 'Operating Systems Design and Implementat: Design and Implementation', 1, 2, 'Tanenbaum and Woodhull', 30, 'English', '3', 3, 540, 380, '978-9332550513', 'os2.jpg', 'Revised to address the latest version of MINIX (MINIX 3), this streamlined, simplified new edition remains the only operating systems text to first explain relevant principles, then demonstrate their applications using a Unix-like operating system as a detailed example. It has been especially designed for high reliability, for use in embedded systems and for ease of teaching.', 0, 7),
(70, 'Operating System Concepts: Windows XP Update', 1, 2, 'Silberschatz,Galvin,Gagne', 31, 'English', '6', 4, 550, 275, '978-8126508853', 'os3.jpg', 'The sixth Updated Edition offers improved conceptual coverage, added content to bridge the gap between concepts and actual implementations and a new chapter on the newest Operating System to capture the attention of critics, consumers and industry alike Windows XP\r\nBrand new chapter on the newest operating system, Windows XP\r\nBrand new chapter on Threads has been added and includes coverage of Pthreads and Java threads\r\nBrand new chapter on Windows 2000 replaces Windows NT\r\nOut with the old, in with the new! All code examples have been rewritten and are now in C\r\nClient-server models and NFS coverage has been moved to an earlier part of the text\r\nThe sixth edition now offers increased coverage of small footprint operating systems such as Palm OS and real-time operating systems\r\nUpdated, core material in every chapter has been updated, as has coverage of Linux, Solaris and FreeBSD.', 0, 7),
(71, 'Rich Dad\'s Guide to Investing : What the Rich Invest in, That the Poor and the Middle Class Do Not!', 8, 46, 'Robert T. Kiyosaki', 32, 'English', '1', 1, 250, 120, '9781612680200', 'finance.jpg', 'Investing means different things to different people and there is a huge difference between passive investing and becoming an active, engaged investor. Rich Dad s Guide to Investing, one of the three core titles in the Rich Dad Series, covers the basic rules of investing, how to reduce your investment risk, how to convert your earned income into passive income plus Rich Dad s 10 Investor Controls. The Rich Dad philosophy makes a key distinction between managing your money and growing it and understanding key principles of investing is the first step toward creating and growing wealth. This book delivers guidance, not guarantees, to help anyone begin the process of becoming an active investor on the road to financial freedom. \" ', 0, 2),
(72, 'Think & Grow Rich', 8, 46, 'Napoleon Hill', 12, 'English', '1', 4, 99, 99, '978-8172345648', 'finance2.jpg', 'One of the best inspirational books ever written, Think and Grow Rich is probably the most important financial book you can ever hope to read. Inspiring generations of readers since the time it was first published in 1937, Think and Grow Rich—Hill’s biggest best-seller—has been used by millions of business leaders around the world to create a concrete plan for success that, when followed, never fails. However, it will be incorrect to limit the book to be just about achieving financial richness. a motivational personal development and self-help book, its core strength lies in the fact that it not only expounds upon material wealth but that at the heart of it, it is a treatise on helping individuals succeed in all lines of work and to do or be almost anything they want in this world. ', 1, 2),
(73, 'Rich Dad Poor Dad', 8, 46, 'Robert T. Kiyosaki', 11, 'Hindi', '2017', 3, 119, 119, '978-8186775219', 'hindifinance.jpg', 'Finance Related book ', 1, 2),
(74, 'Bharat nu Arthtantra (Economy of India)', 8, 47, 'Ajay Patel,Sanjay Paghdal', 33, 'Gujarati', '2', 0, 220, 120, 'B07GTLBHN5', 'bharat_economics.jpg', 'Indian Economy related things discussed here...', 0, 1),
(75, 'Indian Economy: For UPSC Civil Services & Other State PSC Examinations', 8, 47, 'Ramesh Singh', 27, 'English', '10', 1, 400, 400, '978-9387572867', 'ind_eco1.jpg', 'Having sold more than 1 million copies in the last 10 years, Ramesh Singh’s Indian Economy is a comprehensive text with detailed coverage of all topics prescribed by the UPSC for Preliminary and Main examinations. Written by a subject expert and renowned teacher on the subject, the book has proved to be of immense importance to the aspirants of the Union and State civil services examinations, academics, researchers and those with an abiding passion for the subject. This book is a stellar product with many years of bestselling performance which is now in its 10th edition. ', 1, 3),
(76, 'Indian Economy', 8, 47, 'Ramesh Singh', 27, 'English', '11', 3, 385, 385, '978-9353166366', 'indiaeco.jpg', '1) detailed revision and critical analysis of concurrent burning issues that consistently remained in the limelight. 2) comprehensive coverage of contemporary issues such as—Niti’s aayog’s Niyatam and or Niti initiative to yield aspirational targets and actionable means, women and farmers, climate smart Agriculture, logistics and housing for all, Insolvency and bankruptcy, GST and increasing tax compliance, NPAs, lous, Swift, etc. 3) written by a subject expert who has several books on economics including contemporary essays etc. To his credit, the book is of immense importance to academics, researchers, aspirants of Civil Services Examinations and those with an abiding passion for the discipline. 4) questions are based on the emerging trends of UPSC examination.', 1, 1),
(77, 'Last Secrifice', 3, 14, 'Richelle Mead', 15, 'English', '1', 4, 250, 250, '9781595144409', 'horror1.jpg', 'Murder. Love. Jealousy. And the ultimate sacrifice. The Queen is dead and the Moroi world will never be the same. Now, with Rose awaiting wrongful execution and Lissa in a deadly struggle for the royal throne, the girls find themselves forced to rely upon enemies and to question those they thought they could trust. . . . But what if true freedom means sacrificing the most important thing of all? Each other. Can\'t get enough? Look out for \"Bloodlines,\" Richelle Mead\'s bestselling spinoff series set in the world of \"Vampire Academy\"', 1, 2),
(78, 'It: Film Tie-In', 3, 14, 'Stephen King', 34, 'English', '1', 2, 250, 250, '978-1473666931', 'horror_it.jpg', 'Derry, Maine is just an ordinary town: familiar, well-ordered for the most part, a good place to live.\r\n\r\nIt is a group of children who see - and feel - what makes Derry so horribly different. In the storm drains, in the sewers, IT lurks, taking on the shape of every nightmare, each one\'s deepest dread. Sometimes is appears as an evil clown named Pennywise and sometimes IT reaches up, seizing, tearing, killing . . .\r\n\r\nTime passes and the children grow up, move away and forget. Until they are called back, once more to confront IT as IT stirs and coils in the sullen depths of their memories, emerging again to make their past nightmares a terrible present reality.', 1, 2),
(79, 'Walking Dead', 3, 14, 'Robert Kirkman', 35, 'English', '1', 6, 299, 299, '978-0330541367', 'walkdead.jpg', 'The Road to Woodbury by Robert Kirkman and Jay Bonansinga is the second novel in the New York Times bestselling series based on the award-winning comic books and blockbuster television show. It is a dangerous world that Lilly lives in. The walking dead lurk in every corner, destroying anyone they can get their hands on. Nowhere is safe. But when a terrifying ordeal leaves numerous dead, Lilly and her companions are forced out of their tented community and into the open. Safety seems to come in the form of Woodbury, a gated compound with food and protection. Yet it’s not long before the wanton dangers of Woodbury reveal themselves, and the Governor’s despotic rule of the compound threatens to undermine everything Lilly believes in. Because sometimes the dead aren\'t the biggest threat. It’s the living . . .', 1, 2),
(80, 'Sherlock Holmes', 3, 10, 'Conan Doyle', 36, 'English', '2014', 2, 170, 70, '978-8192910925', 'sherlock.jpg', 'Meet the world’s favorite detective-Sherlock Holmes. Journey through the seamy underbelly of late 19th century England with Sherlock Holmes and his friend Dr. John Watson as they go on a series of adventures, each more exciting than the next. It is an exhilarating ride as Holmes and Watson set about solving the most extraordinary mysteries featuring some of the most fascinating characters in modern-day fiction, and even solve a diplomatic crisis or two. Read each story in chronological order in the first of a special two volume series brought to you by Amazing Reads. The two volumes contain all four novels and 56 short stories. Volume I reveals the unconventional genius that is Sherlock Holmes in A Study in Scarlet, a fascinating tale of murder and revenge. The Sign of Four is a mystery featuring an exotic Indian treasure lost in the First War of Indian Independence in 1857, and also introduces the readers to Miss Mary Morstan, John Watson’s intrepid lady love. The Adventures of Sherlock Holmes, and The Memoirs of Sherlock Holmes, are collections of short stories that propel Sherlock Holmes through a series of classic investigations that include the spectacular stories; The Adventure of the Speckled Band and The Musgrave Ritual as well as Holmes’ first encounter with the notorious Irene Adler in A Scandal in Bohemia. Sherlock’s arch-nemesis and intellectual rival; Professor Moriarty, makes a formidable appearance in The Final Problem, rounding off this collection of classic tales featuring the world’s most iconic detective.', 0, 1),
(81, 'Last Seen Alive', 3, 10, 'Claire Douglas', 15, 'English', '1', 1, 223, 200, 'B01N28VBPY', 'lastalive_mystry.jpg', 'Libby Hall needs to escape from everything for a while. which is why the house swap is a godsend. The chance for Libby and her husband Jamie to exchange their tiny Bath flat for a beautiful haven on the wild Cornish coast.\r\nBut before they can begin to heal their fragile marriage, Libby makes some disturbing discoveries about the house. And soon the peace and isolation begin to feel threatening. How alone are they? Why does she feel watched?\r\nWhat is Jamie hiding? Is Libby being paranoid? And why does the house bring back such terrible memories? Memories of the night she last saw her best friend alive . . . and what she did. ', 0, 1),
(82, 'Sidney Sheldon\'s The Silent Widow', 3, 13, 'Sidney Sheldon', 17, 'English', '2018', 0, 221, 221, '978-0008229634', 'western.jpg', 'Sweeping from Mexico City to the dark underbelly of LA, The Silent Widow has all the trademark glamour, suspense and unexpected twists of a classic Sidney Sheldon novel.\r\n\r\nA young American au pair, Charlotte Clancy, vanishes without a trace in Mexico City. The case is left cold, but its legacy will be devastating.\r\n\r\nA decade later, LA is shaken by a spate of violent murders. Psychologist Nikki Roberts is the common link between the victims, her patients at the heart of this treacherous web.', 0, 5),
(83, 'A Game of Thrones (A Song of Ice and Fire)', 3, 12, 'George R. R. Martin', 17, 'English', '1', 16, 550, 550, '978-0007428540', 'got_is_love.jpg', ' A Game of Thrones During 2011, the first volume of George R R Martin\'s glorious high fantasy will be aired as an HBO series on Foxtel. Martin unfolds with astonishing skill a tale of truly epic dimensions, thronged with memorable characters, a story of treachery and ambition, love and magic. Set in a fabulous world scarred by battle and catastrophe over 8000 years of recorded history, it tells of the deeds of men and women locked in the deadliest of conflicts and the terrible legacy they will leave their children. In the game of thrones, you win or you die. About the Author: George R. R. Martin As a child growing up in New Jersey, George R.R. Martin displayed an early interest in \"the writing life\" by selling monster stories of his own invention to the children in his Bayonne neighborhood. In high school he became an avid comic book collector and began to write for comic fanzines. He sold his first story to Galaxy in 1970 when he was 21 years old. Martin received his bachelor\'s and master\'s degrees in journalism from Northwestern University. After graduation he served two years in VISTA, then worked as a teacher and chess tournament director in the Midwest, while continuing to craft award-winning short fiction. His first full-length novel, Dying of the Light, was published in 1977. A dark, lyrical sci-fi tone poem set on a doomed world without a sun, the book was nominated for a Hugo Award.', 1, 5),
(84, 'The Subtle Art of Not Giving a F*ck', 5, 34, 'Mark Manson', 17, 'English', 'Int Edition', 5, 265, 265, '978-0062641540', 'subtle_art.jpg', 'In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be “positive” all the time so that we can truly become better, happier people\r\n\r\nFor decades, we’ve been told that positive thinking is the key to a happy, rich life. “Fuck positivity,” Mark Manson says. “Let’s be honest, shit is fucked and we have to live with it.” In his wildly popular Internet blog, Manson doesn’t sugar-coat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, let’s-all-feel-good mind-set that has infected', 1, 5),
(85, 'The Power of Your Subconscious Mind', 5, 34, 'Joseph Murphy', 12, 'English', '2015', 1, 75, 75, '978-8172345662', 'power1.jpg', 'This remarkable book by Dr. Joseph Murphy, one of the pioneering voices of affirmative thinking, will unlock for you the truly staggering powers of your subconscious mind. Combining time-honored spiritual wisdom with cutting edge scientific research, Dr. Murphy explains how the subconscious mind influences every single thing that you do and how, by understanding it and learning to control its incredible force, you can improve the quality of your daily life.', 1, 1),
(86, 'Dhyan Sadhana ka Saral Abhyas', 5, 31, 'Swami Rama', 11, 'Hindi', '2016', 8, 81, 50, ' 978-818322701', 'meditate.jpg', '?????? ??? ?????? ????? ??? ?????? ?? ??? ????????? ?? ??? ?????? ??????? ?? ????? ????? ??, ?? ???? ?? ?? ????? ??? ????? ?? ???, ????? ?? ???? ??? ???? ???? ????? | ?? ?????? ??? - ??????? ?? ??? ??????? ???, ????? ????? ?? ?????? ?? ???? ?? ??? ???? ?? ???? ?????? ??? ??? ???? ????? ?? ??? ????? ???????? ??????? ?? ????, ???? ?? ????????? ?? ????? ???? ?? ??? ????? ???? ???? ?? ????? ?? ??? ???? |', 0, 1),
(87, 'Heartfulness Way', 5, 34, 'Kamlesh Patel', 21, 'Gujarati', '2018', 3, 165, 165, '978-9387578111', 'motivae_in_guj.jpg', 'Kamlesh D. Patel, widely known as Daaji reveals the core principles of the Heartfulness practice and philosophy to Joshua Pollock, a Heartfulness practitioner and trainer.\r\n\r\nFrom reflecting on the essence of prayer and yogic transmission to demystifying the act of meditation through practical tips, this book will enable us to live beyond the filters of our sensory limitations and discover unity within ourselves. To practise Heartfulness is to seek the essence beyond the form, the reality behind the ritual. It is to centre oneself at the core of one’s heart and find true meaning and contentment there.', 1, 1),
(88, 'Breaking Addictio: A 7 - Step Handbook for Ending Any Addiction', 5, 32, 'Lance M Dodes', 38, 'English', 'new', 7, 399, 399, '978-0061987397', 'breakaddiction.jpg', 'Dr. Dodes’s approach runs directly counter to the paralyzing, but standard, message of ‘powerlessness’—a mes­sage that reinforces the sense of helplessness that is at the root of addicts’ life predicaments! Many psychiatrists recognize that this is where we must head, but Dr. Dodes is one with the guts to shine a beacon in the right direction.', 1, 6),
(89, 'Essentials of Public Health Dentistry', 4, 51, 'Soben Peter', 24, 'English', '6', 4, 730, 730, '978-8186809648', 'dentistry.jpg', 'This book includes all the chapters and fully covers the syllabus prescribed by the Dental Council of India. Extensive coverage in depth into various related topics have been done in order to reduce the task of students searching for many books.', 1, 6),
(90, 'Oxford Handbook of Clinical Dentistry', 4, 51, 'Laura Mitchell', 40, 'English', '', 7, 655, 655, '978-0198824718', 'oxford_dentistry.jpg', 'Oxford Hand Book Of Clinical Dentistry', 1, 6),
(91, 'Grossman’s Endodontic Practice', 4, 51, 'Suresh Chandra', 41, 'English', '13', 10, 730, 600, '978-8184739176', 'dentistry3.jpg', 't incorporates the changes that have occurred in endodontic theory and practice in terms of materials, concepts and protocols. The presentation of the concepts and techniques has also been revised.', 0, 1),
(92, 'Triumph’s Complete Review of Dentistry - Vol.1&2', 4, 51, 'K.Rajkumar & R.Ramya', 41, 'English', '', 2, 1200, 890, '978-9388313216', 'completedentistry.jpg', 'This preparatory manual is a single source reference for postgraduate exam preparation. Intense efforts have gone in preparation of the book to make it complete in all aspects. In-depth coverage of every subject in the form of synopsis is the highlight of the book. To enhance rapid reading, quick learning facts have been framed as an effective learning tool. Multiple-choice questions have been designed to suit both national and international competitive postgraduate entrance examinations. Salient Features \r\nIn-depth consolidation of all subjects of dentistry to make it a single source reference \r\nStructured and comprehensive synopsis ', 0, 5),
(93, 'Handbook of Local Anesthesia', 4, 51, 'Stanley F. Malamed', 43, 'English', '', 4, 350, 350, '9780323074131', 'local.jpg', 'A practical, \"how-to\" guide to safe anesthesia practices in dentistry, Handbook of Local Anesthesia, 6th Edition covers all the latest advances in science, instrumentation, and pain control techniques. From basic concepts to specific injection techniques, from dosage charts to the proper care and handling of equipment, this book provides in-depth, full-color coverage of key anesthesia topics, including specific hazards and errors in technique that may result in complications. Written by Dr. Stanley Malamed, dentistry\'s leading expert on this subject, Handbook of Local Anesthesia is a valuable reference that will help you prevent, recognize, and manage complications of local anesthesia administration.', 1, 1),
(94, 'Medical-Surgical Nursing: Assessment and Management of Clinical Problems', 4, 49, 'Shannon Ruff Dirksen', 43, 'English', '', 12, 675, 675, '9780323065801', 'nursing.jpg', 'Written by a dedicated team of expert authors led by Sharon Lewis, Medical-Surgical Nursing, 8th Edition offers up-to-date coverage of the latest trends, hot topics, and clinical developments in the field, to help you provide exceptional care in today\'s fast-paced health care environment. Completely revised and updated content explores patient care in various clinical settings and focuses on key topics such as prioritization, clinical decision-making, patient safety, and NCLEX® exam preparation.', 1, 4),
(95, 'Pediatric Nursing (As per INC Syllabus)', 4, 49, 'Parul Datta', 41, 'English', '4', 5, 500, 350, '978-9352701186', 'pediatric_nursing.jpg', 'Thoroughly updated and revised edition has been made with an intention to make error-free. Provides a concise overview of child health nursing for GNM, BSc students and nursing professional working for children. Written in accordance with nursing syllabus as recommended by Indian Nursing Council (INC). ', 0, 1),
(96, 'Structure & Function of the Body', 4, 49, 'Gary A Thibodeau & Kevin T. Patton', 44, 'English', '', 7, 499, 450, '9780801664045', 'struct_n_func_of_bdy.jpg', 'Emphasizing vocabulary and basic anatomy and physiology concepts, this work is correlated to Mosby\'s \"Dynamic Human\" CD-ROM and \"Dissectable Human\" CD-ROM. An instructor\'s resource manual and textbank, transparencies, and study guide are also available.', 1, 3),
(97, 'Nursing Research and Statistics', 4, 49, 'Sharma Suresh', 43, 'English', '317', 19, 431, 431, '978-8131252697', 'nursing_research.jpg', 'Inclusion of Emerging Topics in Nursing Research – Clinical Significance & Mixed Research, New Advances in Nursing Research Technology and Methodology.', 1, 1),
(98, 'Essentials of Clinical Pathology', 4, 16, 'Sirish M. Kawthalkar', 45, 'English', '2', 1, 537, 420, '978-938615069', 'clinic.jpg', 'Essentials of Clinical Pathology, Second Edition is a concise textbook that provides basic information about laboratory techniques in clinical chemistry, haematology and blood transfusion for diagnosis and management of diseases . In this thoroughly updated edition, newer chapters have been added, existing chapters have been modified and recent concepts have been incorporated. Apart from numerous illustrations, tables and boxes, this edition also contains appendices on reference ranges, critical values and a list of laboratory tests/results with associated diseases.', 0, 2),
(99, 'Textbook of Clinical Neuroanatomy', 4, 16, 'Vishram Singh', 43, 'English', '3', 10, 570, 500, '978-8131244647', 'nero.jpg', '', 1, 1),
(100, 'Textbook of Clinical Pharmacy Practice ', 4, 16, 'Parthasarathi', 46, 'English', '', 3, 570, 345, '978-8173717567', 'pharmacy.jpg', 'This book aims to equip pharmacists with the knowledge and skills required to discharge their clinical pharmacy practice responsibilities in the Indian scenario. The focus is on providing information about how clinical pharmacy is practiced rather than what they need to know about drugs and therapeutics. \r\n\r\nCompletely revised and updated, this edition includes four new chapters: Community Pharmacy Practice, Medication Use in Pregnancy and Lactation, Ethical Issues in Clinical Research and Poison Information. These chapters address practice areas of great relevance to Indian pharmacists and result in a more comprehensive text overall. \r\n\r\nA balanced mix of content, case studies, references and website links has been provided to make the topics as clear and interesting to the reader as possible. Additional appendices comprise laboratory reference values for adults and how to take medication history. ', 0, 1),
(101, 'Clinical Neuroanatomy with the Point Access Scratch Code', 4, 16, 'Snell', 41, 'English', '7', 2, 1256, 1000, '978-8184732214', 'neuro.jpg', 'Organized classically by system, this popular text gives medical and health professions students a complete, clinically oriented introduction to neuroanatomy.', 0, 5),
(102, 'Manual of Practical Medicine', 4, 16, 'R. Alagappan', 45, 'English', '6', 11, 767, 767, '978-9352702381', 'manual_of_md.jpg', 'Thoroughly revised and updated chapters in full color.\n\n\n• Reflects the growth in different fields of internal medicine.\n\n\n• Added recently updated treatment protocols and guidelines.\n\n\n• Focuses on basic history taking and clinical examination.\n\n• A large number of diagrams and MR, CT images have been incorporated.\n\n\n• Reproduction of imaging studies is well presented.\n\n• Inclusion of attractive tables and clinical photographs for easy understanding.\n\n\n• Extensive use of color-codes for highlighting clinical features, investigations, treatment, management and complications for easy and interesting learning.', 1, 3),
(103, 'Bailey & Love\'s Short Practice of Surgery, 27th Edition: International Student\'s Edition (set volume', 4, 17, 'Norman Williams, P. Ronan O\'Connell, Andrew McCask', 47, 'English', '27', 4, 3075, 2890, '978-1138031647', 'surgery.jpg', 'Bailey & Love is the world famous textbook of surgery. Its complete coverage includes the scientific basis of surgical practice, investigation, diagnosis, & pre-operative care. Its reputation for unambiguous advice makes it the first point of reference for students & practising surgeons worldwide.', 1, 1),
(104, 'Long Cases in General Surgery', 4, 17, 'R.Rajmahendran', 45, 'English', '3', 8, 456, 356, '978-9352705467', 'long_surgery.jpg', 'Primarily intended for MBBS students preparing for their final clinically. \nThoroughly revised and updated from latest journals and new editions of books, like Bailey and Love (27/e), Sabiston (20/e) and Schwartz (10/e). \nProvides the complete knowledge about the history to be asked in the long cases for examinations and points out all the examination aspects. \nImportant points to remember have been highlighted in attractive color background as Author’s Note, Recent Updates/Advances, Extra Edge/Mile and Viva Stop Questions, etc. \nLoaded with evening session topics of Instruments, Procedures, Specimens and X-rays. \nIncludes a lot of must-know tables and flowcharts for easy learning. \nHandy in size makes it easier for the readers to carry it to the wards and outpatient departments. \nCan be used by MS/DNB postgraduates to strengthen their basics.', 0, 2),
(105, 'Naruto', 9, 56, 'Masashi Kishimoto', 48, 'English', '', 4, 250, 250, '9781591161875', 'naruto_dreams.jpg', 'Naruto is a ninja-in-training with a need for attention, a knack for mischief, and sealed within him, a strange, formidable power. His antics amuse his instructor Kakashi and irritate his teammates, intense Sasuki and witty Sakura, but Naruto is serious about becoming the greatest ninja in the village.', 1, 1),
(106, 'Alibaba aur Chalis Chor', 9, 56, 'Maple Press', 49, 'Hindi', '', 2, 120, 120, '978-9350332764', 'alijpg.jpg', 'We believe that it is every child’s right to be able to read exciting stories. Currently 200 million children in India do not have access to stories because they cannot afford to buy books. This meticulously handpicked and colourfully illustrated collection ranges from hilarious adventures to tales that impart moral values. It is our vision to provide heartwarming stories from India and the world at large, to every child at the minimum possible price.', 1, 1),
(107, 'Akbar aur Birbal', 9, 56, 'Maple Press', 49, 'Hindi', '', 4, 25, 25, '978-9350332788', 'akbar.jpg', 'We believe that it is every child’s right to be able to read exciting stories. Currently 200 million children in India do not have access to stories because they cannot afford to buy books. This meticulously handpicked and colourfully illustrated collection ranges from hilarious adventures to tales that impart moral values. It is our vision to provide heartwarming stories from India and the world at large, to every child at the minimum possible price.', 0, 1),
(108, 'Punchtantra Ni 75 Vato', 9, 56, 'Ratilal G. Panchal', 50, 'Gujarati', '', 2, 45, 35, 'B06X9M9PHD', '5nchTantra.jpg', 'Gujarati comic book for children', 0, 5),
(109, 'Beauty and the Beast : Illustrated Classic', 9, 56, 'Om Books', 51, 'English', '', 6, 159, 159, '978-9380070865', 'bb.jpg', 'Beauty is a kind and gentle soul-beautiful not only to look at, but pure of heart. Her father, once a rich merchant, loses his fortune at A strange twist of fate bring Beauty closer to a Beast, but is he Read this enchanting fairy tale about a most unlikely love, about sea and the family comes upon hard times. really one how the beauty of the heart can conquer the stragest adversities.', 1, 1),
(110, 'Black Island', 9, 56, 'Herge', 52, 'English', 'New Edition', 8, 359, 359, '978-1405206181', 'blackisland.jpg', 'Tintin investigates a plane\'s crash landing and is shot by the pilot of plane, he then travels to Britain to uncover a sinister plot.', 1, 2),
(111, 'Batman: The Dark Knight Returns 30th Anniversary Edition', 9, 55, 'Frank Miller', 53, 'English', '', 13, 250, 250, '9781401263119', 'batman_dc.jpg', 'Writer/artist Frank Miller completely reinvents the legend of Batman in this saga of a near-future Gotham City gone to rot, 10 years after the Dark Knight’s retirement. Forced to take action, the Dark Knight returns in a blaze of fury, taking on a whole new generation of criminals and matching their level of violence. He is soon joined by a new Robin—a girl named Carrie Kelley, who proves to be just as invaluable as her predecessors. Can Batman and Robin deal with the threat posed by their deadliest enemies, after years of incarceration have turned them into perfect psychopaths? And more important, can anyone survive the coming fallout from an undeclared war between the superpowers—or the clash of what were once the world’s greatest heroes?Hailed as a comics masterpiece, THE DARK KNIGHT RETURNS is Frank Miller’s (300 and Sin City) reinvention of Gotham’s legendary protector. It remains one of the most influential stories ever told in comics, with its echoes felt in all media forms of DC’s storytelling. Collects issues #1-4.', 1, 1),
(112, 'Batman : The Killing Joke', 9, 55, 'Brian Bolland and Alan Moore', 53, 'English', '', 14, 270, 250, '1401216676', 'joker.jpg', 'No Synopsis Available.', 1, 1),
(113, 'Dark Entries', 9, 55, 'Ian Rankin', 53, 'English', '', 5, 150, 100, '9781401213862', 'darkentry.jpg', 'HELLBLAZER\'s John Constantine must become part of HAUNTED PALACE -- a closed-set reality game-show (think BIG BROTHER or SCI-FI\'s new reality show, ESTATE OF PANIC) in order to deal with a supernatural murder of one of the contestants. He enters as a \'surprise\' contestant and meets the other participants, learning that they all have secrets and that one of them must be \'channeling\' poltergeists and/or be the murderer. However, John soon learns that he is in fact in a game-show which is being broadcast only to the denizens of Hell, who have chosen him to be the next contestant. Now he has to figure out who\'s the killer but also how to escape with his own soul in one piece.', 0, 1),
(114, 'Deadpool Kills the Marvel Universe', 9, 54, 'Cullen Bunn', 54, 'English', '', 15, 220, 200, '978-0785164036', 'deadpool.jpg', 'What if everything you thought was funny about Deadpool was actually just disturbing? What if he decided to kill everyone and everything that makes up the Marvel Universe? What if he actually pulled it off? Would that be FUN for you? The Merc with a Mouth takes a turn for the twisted in a horror comic like no other! Collecting DEADPOOL KILLS THE MARVEL UNIVERSE ', 1, 3),
(115, 'Doctor Strange: Mystery of the Dark Magic (A Mighty Marvel Chapter Book)', 9, 54, 'Brandon T. Snider', 55, 'English', '', 12, 325, 325, '978-1484731277', 'DrStrange.jpg', 'When Thor and the Avengers battle a group of enchantedbeasts that mysteriously appear at a Long Island Mall, they call the best inthe magic business to help them out-Doctor Strange. But the good doctor isoverworked and underpaid. These days he\'s become the go-to hero for all thingsmagic and he\'s exhausted. He\'d really prefer to work alone since it\'s not likejust anyone can understand his Mastery of the Mystic Arts. More bizarre attacks occur around New YorkCity and Strange finds himself seeking guidance from a number of mysticalallies despite his desire to remain solitary. And when the threats grow wildlybeyond his control, he may have no choice but to accept the counsel of hissuper hero comrades in order save his best friend and the world. This 128 pagechapter book, focusing on Dr. Strange will feature full-color interactiveillustrations throughout. And just in time for his new film!', 0, 5),
(116, 'Marvel Avengers Alliance ', 9, 54, 'Fabian Nicieza', 55, 'English', '', 20, 360, 300, 'B01D3W5SIK', 'avengers.jpg', 'War has been declared on Earth by the Black Order...and the Avengers Alliance is the planet\'s only hope for survival! A Chitauri invasion means the core team is going to need reinforcements! Nova, Ms. Marvel, and Squirrel Girl join the fray—with a special appearance by the Guardians of the Galaxy! But will they be enough to stave off the invasions? It\'s all hands on deck for the Avengers Alliance as they combat a powerful new threat in the Redwood Forest. The battle for Earth reaches a critical stage in this epic adventure bridging the story between the smash hit mobile game Marvel: Avengers Alliance and the upcoming Marvel: Avengers Alliance 2!', 1, 1),
(117, 'Captain Marvel', 9, 54, 'Kelly Sue DeConnick', 55, 'English', 'Kindle Edition', 20, 370, 370, 'B00NAHL15I', 'captainMarvel.jpg', 'One of Marvel\'s most beloved Avengers launches into her own ongoing series! Carol Danvers has played many roles in her life; hero, pilot, Avenger, and now, deep-space adventurer! Join Captain Marvel as she attempts to return an alien girl to her home world, and defend the rights of aliens revolting against the Galactic Alliance. Guest-starring Guardians of the Galaxy!', 1, 2);
INSERT INTO `tblbook` (`BookId`, `BookName`, `CategoryId`, `SubCategoryId`, `Author`, `PublisherId`, `Language`, `Edition`, `Qty`, `OriginalPrice`, `SalePrice`, `ISBNno`, `ImageName`, `Description`, `IsNew`, `UserId`) VALUES
(118, 'Thor : in the Shadow of Mangog ', 9, 54, 'Stan Lee', 55, 'English', '', 18, 348, 300, '978-1846531910', 'thor.jpg', 'Banished to Earth and forced to live his life as a mortal, the once-arrogant Asgardian prince Thor learnt a harsh lesson in humility from his exile. Now, with his mighty uru hammer Mjolnir in hand, he uses his incredible power to protect bith Asgard and Earth from peril.', 1, 1),
(119, 'Black Panther : Soul of a Machine', 9, 54, 'Geoffrey Thorne', 55, 'English', 'Kindle Edition', 4, 200, 140, 'B076MKYRJG', 'black_panther.jpg', 'Chapter Two – Visionary Anticipation: As the conflict with Machinesmith escalates, the clone shifts to Wakanda.', 0, 1),
(120, 'Civil War II : Amazing Spiderman', 9, 54, 'Christos Gage', 55, 'English', 'Graph Edition', 2, 275, 175, '978-1302902506', 'civilwar.jpg', 'Where does Spider-Man stand on predictive justice? Well, just think of what it would have done for Uncle Ben. Spider-Man goes one on one with the Profiler and you see the full impact of Civil War II on the Amazing Spider-Man\'s life.', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookinquiry`
--

CREATE TABLE `tblbookinquiry` (
  `InquiryId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PersonName` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `IsReplied` tinyint(4) NOT NULL,
  `RepliedOn` datetime DEFAULT NULL,
  `RepliedBy` varchar(100) DEFAULT NULL,
  `Reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookinquiry`
--

INSERT INTO `tblbookinquiry` (`InquiryId`, `UserId`, `PersonName`, `EmailId`, `Subject`, `Description`, `CreatedOn`, `IsReplied`, `RepliedOn`, `RepliedBy`, `Reply`) VALUES
(1, 1, 'abcd', 'meghamistry09@gmail.com', 'sbcjdhv jhfie', 'abcd', '2019-04-17 00:00:00', 1, '2019-05-11 12:08:32', 'Admin', 'helloo'),
(2, 2, 'abcd', 'dhvanigondaliya@gmail.com', 'w2tfr', 'ry5r bdehr5', '2019-04-22 03:30:07', 0, '2019-04-30 18:02:57', 'Admin', 'book inquiry mail'),
(3, 2, 'megha', 'megha@gmail.com', 'shdsisnhi', 'shcjwuc', '2019-04-18 04:12:27', 1, '2019-04-18 12:44:08', 'Admin', NULL),
(4, NULL, 'aaa', 'aa@gmail.com', 'abcdef', 'nishci ihciwh ihci', '0000-00-00 00:00:00', 0, NULL, NULL, NULL),
(5, 1, NULL, 'meghamistry09@gmail.com', 'dvmlskvs', 'lecmfodev', '0000-00-00 00:00:00', 1, '2019-05-29 21:58:25', 'Admin', 'idjcorldvrj kfnvir iviodr'),
(6, 1, NULL, 'donlymaya1@gmail.com', '122wdeiuj92w', 'nqidhow3fjd niwhfdoiwudn ', '2019-05-24 17:53:10', 1, '2019-05-30 15:20:25', 'Admin', 'wijdpwodikmvl');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookrequest`
--

CREATE TABLE `tblbookrequest` (
  `RequestId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Edition` varchar(20) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooktransit`
--

CREATE TABLE `tblbooktransit` (
  `TransitId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `OrderDetailId` int(11) NOT NULL,
  `CourierServiceProvider` varchar(20) NOT NULL,
  `TrackingNo` varchar(50) NOT NULL,
  `Image` varchar(150) NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `CartId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`CartId`, `UserId`, `BookId`, `Qty`, `Price`, `Total`, `CreatedOn`) VALUES
(21, 4, 54, 2, 225, 450, '2019-05-14 16:58:45'),
(39, 4, 60, 1, 474, 474, '2019-05-15 11:58:52'),
(40, 4, 70, 1, 275, 275, '2019-05-15 11:58:52'),
(69, 2, 68, 1, 655, 655, '2019-05-22 20:53:36'),
(73, 2, 82, 1, 221, 221, '2019-05-23 13:03:45'),
(92, 1, 33, 1, 299, 299, '2019-05-31 16:46:07'),
(93, 1, 65, 1, 290, 290, '2019-05-31 16:46:32'),
(94, 1, 64, 6, 200, 1200, '2019-06-03 14:53:17'),
(95, 1, 116, 1, 300, 300, '2019-06-03 14:53:17'),
(96, 1, 115, 12, 325, 3900, '2019-06-03 14:53:17'),
(97, 1, 117, 1, 370, 370, '2019-06-03 14:53:17'),
(98, 1, 114, 1, 200, 200, '2019-06-03 14:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CategoryId`, `CategoryName`, `IsActive`) VALUES
(1, 'Computer & Technology', 1),
(2, 'Children', 1),
(3, 'Novels', 1),
(4, 'Medical', 1),
(5, 'Philosophy & Self Help', 1),
(6, 'Religion & Spirituality', 0),
(7, 'Education & Reference', 1),
(8, 'Business & Management', 1),
(9, 'Comics', 1),
(11, 'Biographies', 0),
(12, 'Cooking', 1),
(13, 'Hobbies & Craft', 0),
(14, 'Health & Fitness', 0),
(16, 'Entertainment', 0),
(17, 'Literature & Fiction', 0),
(19, 'Social Sciences', 1),
(20, 'Science & Math', 1),
(24, 'Travel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `CityId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `CityName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`CityId`, `StateId`, `CityName`) VALUES
(1, 3, 'Jaipur'),
(4, 4, 'Mumbai'),
(5, 4, 'Pune'),
(6, 1, 'Surat'),
(7, 1, 'Ahmedabad'),
(8, 1, 'Baroda'),
(9, 3, 'Udaipur'),
(10, 3, 'Jodhpur');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FeedbackId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PersonName` varchar(50) DEFAULT NULL,
  `BookId` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Feedback` text NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`FeedbackId`, `UserId`, `PersonName`, `BookId`, `Rate`, `Feedback`, `CreatedOn`) VALUES
(1, 1, NULL, 29, 3, 'best novel i have ever read', '2019-04-16 04:12:11'),
(2, 4, NULL, 29, 4, 'Good Book For beginners to learn C Programming', '2019-04-17 07:22:21'),
(3, 2, NULL, 29, 3, 'wscfegf', '2019-05-23 12:35:33'),
(4, 6, NULL, 64, 3, 'Good Book for Photography Lovers', '2019-05-30 12:14:30'),
(6, NULL, 'Shubhi', 69, 4, 'lwdjow jcoes', '2019-05-30 12:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `OrderId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `IsPaid` tinyint(4) NOT NULL,
  `Status` int(11) NOT NULL,
  `AddressId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`OrderId`, `UserId`, `CreatedOn`, `TotalAmount`, `IsPaid`, `Status`, `AddressId`) VALUES
(38, 2, '2019-03-22 15:43:20', 1050, 1, 0, 4),
(39, 1, '2019-07-22 15:59:30', 199, 1, 0, 5),
(40, 1, '2019-08-22 16:39:37', 1011, 0, 1, 5),
(41, 1, '2019-06-22 16:42:39', 1870, 1, 0, 5),
(42, 1, '2019-11-22 16:47:22', 1020, 1, 0, 5),
(43, 6, '2019-05-22 17:45:18', 520, 1, 0, 6),
(48, 2, '2019-03-22 20:37:36', 120, 1, 0, 4),
(50, 2, '2019-05-22 20:40:45', 150, 1, 0, 4),
(51, 1, '2019-12-23 11:14:26', 200, 0, 0, 5),
(52, 1, '2019-06-23 11:37:11', 200, 1, 0, 5),
(53, 1, '2019-04-23 11:44:38', 255, 0, 0, 5),
(54, 1, '2018-05-24 15:53:18', 990, 0, 0, 5),
(55, 1, '2019-02-24 15:55:28', 119, 1, 1, 5),
(56, 3, '2019-01-27 15:49:37', 750, 1, 0, 7),
(57, 3, '2019-10-27 15:51:32', 350, 1, 0, 8),
(58, 3, '2019-09-27 15:54:27', 730, 0, 0, 8),
(59, 6, '2019-05-30 15:10:26', 400, 0, 0, 6),
(60, 6, '2019-05-30 15:10:57', 0, 1, 0, 6),
(61, 6, '2019-05-30 15:11:44', 0, 1, 0, 6),
(62, 6, '2019-05-30 15:49:21', 150, 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `OrderDetailId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`OrderDetailId`, `OrderId`, `BookId`, `Quantity`, `Price`, `Status`) VALUES
(26, 38, 111, 2, 250, 'Delivered'),
(27, 38, 83, 1, 550, 'In Transit'),
(28, 39, 43, 1, 99, 'In Transit'),
(29, 39, 50, 1, 100, 'In Transit'),
(30, 40, 78, 2, 250, 'Delivered'),
(31, 40, 82, 1, 221, 'Delivered'),
(32, 40, 65, 1, 290, 'Delivered'),
(33, 41, 89, 1, 730, 'In Transit'),
(34, 41, 69, 3, 380, 'In Transit'),
(35, 42, 63, 2, 410, 'In Transit'),
(36, 42, 64, 1, 200, 'In Transit'),
(37, 43, 106, 1, 120, 'Delivered'),
(38, 43, 75, 1, 400, 'In Transit'),
(39, 48, 46, 1, 120, 'In Transit'),
(40, 50, 55, 1, 150, 'In Transit'),
(41, 51, 64, 1, 200, 'In Transit'),
(42, 52, 64, 1, 200, 'In Transit'),
(43, 53, 47, 1, 255, 'In Transit'),
(44, 54, 64, 1, 200, 'In Transit'),
(45, 54, 63, 1, 410, 'In Transit'),
(46, 54, 69, 1, 380, 'In Transit'),
(47, 55, 73, 1, 119, 'Delivered'),
(48, 56, 64, 1, 200, 'In Transit'),
(49, 56, 83, 1, 550, 'In Transit'),
(50, 57, 64, 1, 200, 'In Transit'),
(51, 57, 55, 1, 150, 'In Transit'),
(52, 58, 89, 1, 730, 'In Transit'),
(53, 59, 75, 1, 400, 'In Transit'),
(54, 62, 85, 2, 75, 'In Transit');

-- --------------------------------------------------------

--
-- Table structure for table `tblpublisher`
--

CREATE TABLE `tblpublisher` (
  `PublisherId` int(11) NOT NULL,
  `PublisherName` varchar(150) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpublisher`
--

INSERT INTO `tblpublisher` (`PublisherId`, `PublisherName`, `CreatedBy`, `CreatedOn`) VALUES
(7, 'Haider Ali', 0, '2017-11-16 04:09:09'),
(9, 'Canongate Canons', 1, '2019-05-02 14:24:39'),
(11, 'Manjul Publishing House', 1, '2019-05-02 20:34:04'),
(12, 'Fingerprint', 1, '2019-05-02 20:43:47'),
(13, 'Scholastic Paperbacks', 1, '2019-05-02 20:48:58'),
(15, 'Penguin Books India', 1, '2019-05-02 21:03:56'),
(16, 'Chronicle Books', 1, '2019-05-02 22:10:36'),
(17, 'Harper Collins', 1, '2019-05-02 22:17:23'),
(18, 'V&S Publishers', 1, '2019-05-02 22:25:35'),
(19, 'Puffin', 1, '2019-05-02 23:53:12'),
(20, 'Jaico Publishing House', 1, '2019-05-03 00:09:36'),
(21, 'Westland', 1, '2019-05-03 00:28:37'),
(22, 'Workman Publishing Company', 1, '2019-05-03 17:54:57'),
(23, 'Sanjay & Company', 1, '2019-05-03 18:29:21'),
(24, 'Snab Publishers ', 1, '2019-05-03 18:42:37'),
(25, 'Partridge Publishing', 1, '2019-05-03 18:50:52'),
(26, 'Hachette India', 1, '2019-05-03 18:55:29'),
(27, 'McGraw Hill Education', 1, '2019-05-04 17:07:09'),
(28, 'Vibrant', 1, '2019-05-04 17:14:51'),
(29, 'Peachpit Press', 1, '2019-05-04 17:35:23'),
(30, 'Pearson Education India', 1, '2019-05-04 17:43:12'),
(31, 'Wiley', 1, '2019-05-06 13:08:00'),
(32, 'Plata Publishing', 1, '2019-05-06 17:43:00'),
(33, 'Yuva Upnishad Publication', 1, '2019-05-06 18:02:18'),
(34, 'Hodder Paperbacks', 1, '2019-05-06 18:29:40'),
(35, 'Pan', 1, '2019-05-06 18:32:59'),
(36, 'Amazing Reads', 1, '2019-05-06 18:36:02'),
(38, 'Harper Perennial', 1, '2019-05-07 00:43:20'),
(40, 'Oxford University Press', 1, '2019-05-08 20:01:56'),
(41, 'Wolters Kluwer India Pvt. Ltd.', 1, '2019-05-08 20:21:40'),
(43, 'Elsevier - Health Sciences Division', 1, '2019-05-08 20:35:09'),
(44, 'Mosby, Incorporated', 1, '2019-05-08 20:52:33'),
(45, 'Jaypee Brothers Medical Publishers', 1, '2019-05-08 21:02:45'),
(46, 'Orient Blackswan Private Limited ', 1, '2019-05-08 21:08:52'),
(47, 'CRC Press', 1, '2019-05-08 21:22:44'),
(48, 'Viz Media', 1, '2019-05-08 23:11:59'),
(49, 'Maple Press', 1, '2019-05-08 23:15:50'),
(50, 'Shree Pustak Mandir', 1, '2019-05-08 23:20:53'),
(51, 'Om Books International', 1, '2019-05-08 23:25:35'),
(52, 'Egmont', 1, '2019-05-08 23:29:09'),
(53, 'DC Comics', 1, '2019-05-08 23:32:45'),
(54, 'Hachette Book Group Us Agency', 1, '2019-05-08 23:46:59'),
(55, 'Marvel Press', 1, '2019-05-08 23:51:35'),
(59, 'Merriam-Webster Mass Market', 1, '2019-05-11 11:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`StateId`, `StateName`) VALUES
(1, 'Gujarat'),
(3, 'Rajasthan'),
(4, 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `SubCategoryName` varchar(40) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `SubCategoryName`, `CategoryId`, `IsActive`) VALUES
(2, 'Operating System', 1, 1),
(3, 'Computer Networking', 1, 1),
(4, 'Computer Programming', 1, 1),
(5, 'Computer Science', 1, 1),
(9, 'Activity, Crafts & Games', 2, 1),
(10, 'Mysteries', 3, 1),
(12, 'Fantasy', 3, 1),
(13, 'Westerns', 3, 1),
(14, 'Horror', 3, 1),
(16, 'Clinical & Internal Medicine', 4, 1),
(17, 'Surgery', 4, 1),
(18, 'Globalization', 8, 1),
(20, 'Databases', 1, 1),
(21, 'E-Commerce', 1, 1),
(23, 'Microsoft', 1, 1),
(25, 'Web Development', 1, 1),
(26, 'Action & Adventure', 2, 1),
(27, 'Growing Up', 2, 1),
(29, 'Younger Children\'s Books', 2, 1),
(30, 'Older Children\'s Books', 2, 1),
(31, 'Meditation', 5, 1),
(32, 'Addiction', 5, 1),
(34, 'Motivational', 5, 1),
(35, 'Stress', 5, 1),
(38, 'Baking', 12, 1),
(39, 'BBQ', 12, 1),
(40, 'Indian', 12, 1),
(42, 'Caring', 18, 1),
(44, 'Fairy Tales', 0, 1),
(45, 'Cars & Trains', 0, 1),
(46, 'Finance', 8, 1),
(47, 'Economics', 8, 1),
(48, 'Self Help', 0, 1),
(49, 'Nursing', 4, 1),
(51, 'Dentistry', 4, 1),
(53, 'Abroad', 24, 1),
(54, 'Marvel', 9, 1),
(55, 'DC', 9, 1),
(56, 'Comic Books', 9, 1),
(57, 'Dictionary', 0, 1),
(59, 'Collage', 0, 1),
(60, 'Collage', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `TestimonialId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `IsApproved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`TestimonialId`, `UserId`, `Comment`, `IsApproved`) VALUES
(1, 1, 'Best website for Book Lovers.', 1),
(2, 2, 'Nice', 1),
(3, 2, 'kamishcskcio', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `ImageUrl` varchar(250) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `IsVarified` tinyint(4) NOT NULL,
  `Balance` int(11) NOT NULL,
  `IsBlock` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserId`, `FirstName`, `LastName`, `Password`, `EmailId`, `ContactNo`, `ImageUrl`, `CreatedOn`, `IsVarified`, `Balance`, `IsBlock`) VALUES
(1, 'Megha', 'Mistry', '2MfW18yToaI=', 'meghamistry09@gmail.com', '9081155133', 'avatar2.png', '2019-04-16 00:00:00', 1, 620, 0),
(2, 'Dhvani', 'Gondaliya', 'z8rl0NnLoKE=', 'dhvanigondaliya@gmail.com', '9081155133', 'admin.jpg', '2019-04-16 00:00:00', 1, 95, 0),
(3, 'maya', 'sonava', '2MPo0JyUom8=', 'maya@gmail.com', '7624076379', 'black_panther2.jpg', '2019-05-11 13:06:02', 1, 100, 1),
(4, 'Shubham', 'Jasani', 'shubham123', 'jasanishubham@gmail.com', '7405272851', 'practical_chem.jpg', '2019-05-14 16:57:16', 1, 50, 1),
(5, 'snehal', 'lodaliya', '3tDU18zOoKE=', 'snehal@gmail.com', '9712244534', 'download.png', '2019-05-22 11:52:11', 1, 50, 0),
(6, 'Dinal', 'Chauhan', 'z8vd0NeToaI=', 'dinal@gmail.com', '7984882598', 'download.png', '2019-05-22 12:00:02', 1, 50, 0),
(7, 'Smit', 'Sethiya', '3s/Y45yUom8=', 'smit@gmail.com', '9723205749', '20170926_135938-1.jpg', '2019-05-22 12:05:05', 1, 50, 0),
(10, 'Gaurang', 'Joshi', '0sPk4czQ1qA=', 'gaurang@gmail.com', '8597412345', 'download2.png', '2019-05-29 13:05:08', 1, 50, 0),
(11, 'Kevin', 'Bhutwala', '1sfl2NmToaI=', 'kevinbhut@gmail.com', '8745962100', 'download11.png', '2019-05-30 14:34:00', 0, 50, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD PRIMARY KEY (`AddressId`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`BannerId`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `tblbookinquiry`
--
ALTER TABLE `tblbookinquiry`
  ADD PRIMARY KEY (`InquiryId`);

--
-- Indexes for table `tblbookrequest`
--
ALTER TABLE `tblbookrequest`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `tblbooktransit`
--
ALTER TABLE `tblbooktransit`
  ADD PRIMARY KEY (`TransitId`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`CartId`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FeedbackId`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`OrderDetailId`);

--
-- Indexes for table `tblpublisher`
--
ALTER TABLE `tblpublisher`
  ADD PRIMARY KEY (`PublisherId`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`TestimonialId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `BannerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tblbookinquiry`
--
ALTER TABLE `tblbookinquiry`
  MODIFY `InquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbookrequest`
--
ALTER TABLE `tblbookrequest`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbooktransit`
--
ALTER TABLE `tblbooktransit`
  MODIFY `TransitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `OrderDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tblpublisher`
--
ALTER TABLE `tblpublisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `TestimonialId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
