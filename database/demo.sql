-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-03 07:13:56
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `article` longtext CHARACTER SET utf8 NOT NULL,
  `word_length` int(11) NOT NULL DEFAULT '0' COMMENT '字数',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `detail`
--

INSERT INTO `detail` (`id`, `title`, `article`, `word_length`, `views`, `user_id`) VALUES
(1, '一个很温情但并不鸡汤的故事', '先是老生常谈的原因——4G的全面普及带来的是流量、带宽费用的降低。 -智能机日新月异的硬件性能带来的是如丝般顺滑的操作体验、感同身受的视觉体验。 -编程技术的不断提高，优化短视频的加载方式和大小等。 -本身的内容消费升级。从早期社交1.0论坛文字进化到贴吧微博、Instagram、nice的图片社交再到现如今的短视频。表现形式越来越丰富，互动性、实时性也越来越明显。但是随着人口红利的消失，流量的获取越来越难，用户平均上网时间的恒定，因此碎片化的商业模式在当下大受欢迎，而短视频无疑是其中的佼佼者。 2.生产的去专业化和分发算法的进步 -现今短视频的制作趋势呈去专业化，一部手机一个app足矣，智能添加滤镜、特效等。操作流程简单化，对小白用户极其友好，门槛低。 -在分发渠道上，今日头条的嗅觉是最为敏锐的，背靠着5.5亿人的大数据算法系统，个性化推荐给用户的内容还是较为可靠的，而其余的竞品反应好像慢了不只半拍？没有意味到个性化推荐算法的重要性。 现在的短视频遵守着“马太效应”，绝大多数的流量聚集在首页，大量的普通短视频无人问津，没有流量分给垂直小众内容，对这些冷启动的创作者不太友好。而短视频的绝大部分内容是依赖UGC的，这毫无疑问的是马太效应的天敌——长尾理论。 诸位不要忘了国外的Youtube、国内的今日头条乃至网易云音乐是如何实现弯道超车的，靠的就是个性化推荐算法，精准快速的实现了视频内容和用户的匹配，以至于后来的Youtube、Facebook的广告也基于此特性，这些案例正是对长尾理论最好的诠释。 3.社交需求的升级 -在尝试过文字、语音、图片、长视频社交之后，短视频便成了新的发力点。短视频有以上种种社交方式的优点：简单直观、代入感和参与感强烈，同时又没有长视频的杀时间。', 747, 44, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` char(10) NOT NULL,
  `user_pass` char(32) NOT NULL,
  `creat_at` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
