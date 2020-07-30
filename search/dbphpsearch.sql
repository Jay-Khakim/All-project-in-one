-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2020 at 04:11 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbphpsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `a_title` varchar(100) NOT NULL,
  `a_text` text NOT NULL,
  `a_author` varchar(60) NOT NULL,
  `a_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `a_title`, `a_text`, `a_author`, `a_date`) VALUES
(1, 'Our Best Education Articles of 2019', 'Looking for inspiration to start the new decade off on the right foot? Our most popular education articles of 2019 explore how children develop purpose, how we can best support our students’ mental health and social-emotional development, why we benefit from listening to each other’s stories, and more.\r\n       And…if you want to put the scientific findings from these articles into practice, check out our new website for educators, Greater Good in Education (GGIE), officially launching on February 20, 2020.\r\n       In response to our readers’ call for more practical resources for the classroom, GGIE features free research-based practices, lessons, and strategies for educators to foster their students’ and their own well-being, and for school leaders to develop positive school climates—all in the service of cultivating kinder, happier, and more equitable classrooms and schools.', 'Amy L. Eva', '2019-12-23 13:13:13'),
(2, 'Cisco Networking Academy\'s Introduction to Scaling Networks', 'This chapter introduces strategies that can be used to systematically design a highly functional network, such as the hierarchical network design model, the Cisco Enterprise Architecture, and appropriate device selections.', '\r\nBy Cisco Networking Academy', '2014-04-17 13:13:13'),
(3, 'A Virtual Reality Bias Simulator', 'In the wake of new Black Lives Matter protests, one company hopes to use virtual reality to help people better understand others by putting them in their colleagues’ shoes. The aim is to create better workplaces by helping employees develop and practice more respectful ways of interacting with each other.\r\n\r\nBy immersing people in realistic digital environments, virtual reality (VR) can lead to mind-bending experiences, such as making users feel as if they have swapped bodies with someone else. The effects of VR can persist long after these experiences; psychologists hope this can help in therapies for ailments such as phobias and post-traumatic stress disorder.\r\n\r\nPreviously, clinical psychologist Robin Rosenberg and her colleagues found that when people could use “superpowers” in VR, they acted more virtuously afterward. After this work, as the Black Lives Matter movement rose to prominence in 2014, Rosenberg remembered hearing how some white people responded by saying “white lives matter” or “all lives matter.”', '\r\nCharles Q. Choi', '2020-07-10 13:13:13'),
(4, 'U.S. Women in Tech Are Paid Less Than Men—Except in Minnesota', 'Women across the United States who work in tech are generally paid less than their male counterparts, even when education, years of experience, and specific occupations match.\r\n\r\nThat’s not exactly news; study after study has confirmed the differential. The latest analysis, a review of three years’ worth of salary survey data collected by job search site provider Dice, once again found that the overall gap persists.\r\n\r\nThe Dice analysis did find some interesting differences in regions and engineering disciplines. For instance, women in cloud engineering, systems architecture, and network engineering might be doing better than their male counterparts, though the sample sizes for cloud engineering and systems architecture were too small to be conclusive, and the differences were not statistically significant.', '\r\nTekla S. Perry', '2020-03-12 13:13:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
