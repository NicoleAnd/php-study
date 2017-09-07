-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2017 at 09:08 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `php105`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, '123', '123'),
(2, '234', '234');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `intime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `username`, `msg`, `intime`) VALUES
(1, '冰心', '修养的花儿在寂静中开过去了，成功的果子便要在光明里结实。', '0000-00-00 00:00:00'),
(4, '洛克', '人生的磨难是很多的，所以我们不可对于每一件轻微的伤害都过于敏感。在生活磨难面前，精神上的坚强和无动于衷是我们抵抗罪恶和人生意外的最好武器。', '0000-00-00 00:00:00'),
(6, '萧伯纳', '躯体总是以惹人厌烦告终。除思想以外，没有什么优美和有意思的东西留下来，因为思想就是生命。', '0000-00-00 00:00:00'),
(7, '契诃夫', '人在智慧上应当是明豁的，道德上应该是清白的，身体上应该是清洁的。', '0000-00-00 00:00:00'),
(10, '苏霍姆林斯基', '世界上没有才能的人是没有的。问题在于教育者要去发现每一位学生的禀赋、兴趣、爱好和特长，为他们的表现和发展提供充分的条件和正确引导。 ', '2015-04-25 00:00:00'),
(11, '孟德斯鸠', '我所谓共和国里的美德，是指爱祖国也就是爱平等而言。这并不是一种道德上的美德，也不是一种基督教的美德，而是政治上的美德。', '2015-04-25 00:00:00'),
(13, '列宁', '谁不会休息，谁就不会工作。', '0000-00-00 00:00:00'),
(15, '巴尔扎克', '我们破灭的希望，流产的才能，失败的事业，受了挫折的雄心，往往积聚起来变为忌妒。', '2017-09-04 00:00:00'),
(16, '欧里庇得斯', '有远大抱负的人不可忽略眼前的工作。', '2017-09-04 00:00:00'),
(17, '毛泽东', '睡眠和休息丧失了时间，却取得了明天工作的精力。', '2017-09-04 04:51:50'),
(18, '乔治·桑', '那种用美好的感情和思想使我们升华并赋予我们力量的爱情，才能算是一种高尚的热情；而使我们自私自利，胆小怯弱，使我们流于盲目本能的下流行为的爱情，应该算是一种邪恶的热情。 ', '2017-09-04 10:54:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;