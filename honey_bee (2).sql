-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 أغسطس 2019 الساعة 10:04
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honey_bee`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `first_name`, `lastname`, `password`, `create_date`, `update_date`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2019-07-09 18:31:21', '2019-07-15 17:19:33'),
(2, 'test', 'test2@test.sy', '', '', 'cGJTMnZJb1Ewa3F5anhpY0NsQkVidz09', '2019-07-09 18:44:00', '2019-07-09 18:44:00');

-- --------------------------------------------------------

--
-- بنية الجدول `autobiography`
--

CREATE TABLE `autobiography` (
  `autobiography` int(11) NOT NULL,
  `text` text NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `type` enum('autobiography','notes') NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `budgets`
--

CREATE TABLE `budgets` (
  `budget_id` int(11) NOT NULL,
  `budget_date` date NOT NULL,
  `budget_name` varchar(200) NOT NULL,
  `total_value` int(20) NOT NULL,
  `rest_value` int(20) NOT NULL,
  `paid_value` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `budget_term` varchar(100) NOT NULL,
  `approaching_limit` tinyint(1) NOT NULL,
  `override_limit` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `budget_category`
--

CREATE TABLE `budget_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `budget_sub_category`
--

CREATE TABLE `budget_sub_category` (
  `budget_sub_category` int(11) NOT NULL,
  `budget_sub_cateogry_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `business_scheduling`
--

CREATE TABLE `business_scheduling` (
  `business_scheduling_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `repetition` varchar(100) NOT NULL,
  `reminder` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `business_scheduling`
--

INSERT INTO `business_scheduling` (`business_scheduling_id`, `name`, `date`, `time`, `repetition`, `reminder`, `user_id`, `create_date`, `update_date`) VALUES
(1, 'test', '2019-07-18', '10:00:00', 'every-day', 1, 1, '2019-07-31 19:22:38', '2019-07-31 19:22:38');

-- --------------------------------------------------------

--
-- بنية الجدول `category_loans`
--

CREATE TABLE `category_loans` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'Andorra', 1),
(5, 'Angola', 1),
(6, 'Antigua and Barbuda', 1),
(7, 'Argentina', 1),
(8, 'Armenia', 1),
(9, 'Australia', 1),
(10, 'Austria', 1),
(11, 'Azerbaijan', 1),
(12, 'Bahamas', 1),
(13, 'Bahrain', 1),
(14, 'Bangladesh', 1),
(15, 'Barbados', 1),
(16, 'Belarus', 1),
(17, 'Belgium', 1),
(18, 'Belize', 1),
(19, 'Benin', 1),
(20, 'Bhutan', 1),
(21, 'Bolivia', 1),
(22, 'Bosnia and Herzegovina', 1),
(23, 'Botswana', 1),
(24, 'Brazil', 1),
(25, 'Brunei', 1),
(26, 'Bulgaria', 1),
(27, 'Burkina Faso', 1),
(28, 'Burundi', 1),
(29, 'Cabo Verde', 1),
(30, 'Cambodia', 1),
(31, 'Cameroon', 1),
(32, 'Canada', 1),
(33, 'Central African Republic', 1),
(34, 'Chad', 1),
(35, 'Chile', 1),
(36, 'China', 1),
(37, 'Colombia', 1),
(38, 'Comoros', 1),
(39, 'Congo, Republic of the', 1),
(40, 'Congo, Democratic Republic of the', 1),
(41, 'Costa Rica', 1),
(42, 'Cote d Ivoire', 1),
(43, 'Croatia', 1),
(44, 'Cuba', 1),
(45, 'Cyprus', 1),
(46, 'Czech Republic', 1),
(47, 'Denmark', 1),
(48, 'Djibouti', 1),
(49, 'Dominica', 1),
(50, 'Dominican Republic', 1),
(51, 'Ecuador', 1),
(52, 'Egypt', 1),
(53, 'El Salvador', 1),
(54, 'Equatorial Guinea', 1),
(55, 'Eritrea', 1),
(56, 'Estonia', 1),
(57, 'Ethiopia', 1),
(58, 'Fiji', 1),
(59, 'Finland', 1),
(60, 'France', 1),
(61, 'Gabon', 1),
(62, 'Gambia', 1),
(63, 'Georgia', 1),
(64, 'Germany', 1),
(65, 'Ghana', 1),
(66, 'Greece', 1),
(67, 'Grenada', 1),
(68, 'Guatemala', 1),
(69, 'Guinea', 1),
(70, 'Guinea-Bissau', 1),
(71, 'Guyana', 1),
(72, 'Haiti', 1),
(73, 'Honduras', 1),
(74, 'Hungary', 1),
(75, 'Iceland', 1),
(76, 'India', 1),
(77, 'Indonesia', 1),
(78, 'Iran', 1),
(79, 'Iraq', 1),
(80, 'Ireland', 1),
(81, 'Italy', 1),
(82, 'Jamaica', 1),
(83, 'Japan', 1),
(84, 'Jordan', 1),
(85, 'Kazakhstan', 1),
(86, 'Kenya', 1),
(87, 'Kiribati', 1),
(88, 'Kosovo', 1),
(89, 'Kuwait', 1),
(90, 'Kyrgyzstan', 1),
(91, 'Laos', 1),
(92, 'Latvia', 1),
(93, 'Lebanon', 1),
(94, 'Lesotho', 1),
(95, 'Liberia', 1),
(96, 'Libya', 1),
(97, 'Liechtenstein', 1),
(98, 'Lithuania', 1),
(99, 'Luxembourg', 1),
(100, 'Macedonia', 1),
(101, 'Madagascar', 1),
(102, 'Malawi', 1),
(103, 'Malaysia', 1),
(104, 'Maldives', 1),
(105, 'Mali', 1),
(106, 'Malta', 1),
(107, 'Marshall Islands', 1),
(108, 'Mauritania', 1),
(109, 'Mauritius', 1),
(110, 'Mexico', 1),
(111, 'Micronesia', 1),
(112, 'Moldova', 1),
(113, 'Monaco', 1),
(114, 'Mongolia', 1),
(115, 'Montenegro', 1),
(116, 'Morocco', 1),
(117, 'Mozambique', 1),
(118, 'Myanmar (Burma)', 1),
(119, 'Namibia', 1),
(120, 'Nauru', 1),
(121, 'Nepal', 1),
(122, 'Netherlands', 1),
(123, 'New Zealand', 1),
(124, 'Nicaragua', 1),
(125, 'Niger', 1),
(126, 'Nigeria', 1),
(127, 'North Korea', 1),
(128, 'Norway', 1),
(129, 'Oman', 1),
(130, 'Pakistan', 1),
(131, 'Palau', 1),
(132, 'Palestine', 1),
(133, 'Panama', 1),
(134, 'Papua New Guinea', 1),
(135, 'Paraguay', 1),
(136, 'Peru', 1),
(137, 'Philippines', 1),
(138, 'Poland', 1),
(139, 'Portugal', 1),
(140, 'Qatar', 1),
(141, 'Romania', 1),
(142, 'Russia', 1),
(143, 'Rwanda', 1),
(144, 'St. Kitts and Nevis', 1),
(145, 'St. Lucia', 1),
(146, 'St. Vincent and The Grenadines', 1),
(147, 'Samoa', 1),
(148, 'San Marino', 1),
(149, 'Sao Tome and Principe', 1),
(150, 'Saudi Arabia', 1),
(151, 'Senegal', 1),
(152, 'Serbia', 1),
(153, 'Seychelles', 1),
(154, 'Sierra Leone', 1),
(155, 'Singapore', 1),
(156, 'Slovakia', 1),
(157, 'Slovenia', 1),
(158, 'Solomon Islands', 1),
(159, 'Somalia', 1),
(160, 'South Africa', 1),
(161, 'South Korea', 1),
(162, 'South Sudan', 1),
(163, 'Spain', 1),
(164, 'Sri Lanka', 1),
(165, 'Sudan', 1),
(166, 'Suriname', 1),
(167, 'Swaziland', 1),
(168, 'Sweden', 1),
(169, 'Switzerland', 1),
(170, 'Syria', 1),
(171, 'Taiwan', 1),
(172, 'Tajikistan', 1),
(173, 'Tanzania', 1),
(174, 'Thailand', 1),
(175, 'Timor-Leste', 1),
(176, 'Togo', 1),
(177, 'Tonga', 1),
(178, 'Trinidad and Tobago', 1),
(179, 'Tunisia', 1),
(180, 'Turkey', 1),
(181, 'Turkmenistan', 1),
(182, 'Tuvalu', 1),
(183, 'Uganda', 1),
(184, 'Ukraine', 1),
(185, 'United Arab Emirates', 1),
(186, 'United Kingdom (UK)', 1),
(187, 'United States of America (USA)', 1),
(188, 'Uruguay', 1),
(189, 'Uzbekistan', 1),
(190, 'Vanuatu', 1),
(191, 'Vatican City (Holy See)', 1),
(192, 'Venezuela', 1),
(193, 'Vietnam', 1),
(194, 'Yemen', 1),
(195, 'Zambia', 1),
(196, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `english_words`
--

CREATE TABLE `english_words` (
  `word_id` int(11) NOT NULL,
  `word_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `value` int(20) NOT NULL,
  `notes` text,
  `date` date NOT NULL,
  `repetition` enum('every day','every two day','weekend','every week','every two weeks','every four weeks','every month','every two months','every three months','every six month','every year') DEFAULT NULL,
  `reminder` enum('same day','before day','before two days','before week') DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `value`, `notes`, `date`, `repetition`, `reminder`, `category_id`, `user_id`, `create_date`, `update_date`) VALUES
(1, 30000, 'test', '2019-07-04', 'every day', 'same day', 2, 1, '2019-07-31 17:21:34', '2019-07-31 19:21:34'),
(2, 10000, NULL, '2019-08-01', '', NULL, 1, 1, '2019-08-01 19:27:25', '2019-08-01 21:27:25'),
(3, 10000, NULL, '2019-08-01', '', NULL, 1, 1, '2019-08-01 19:27:57', '2019-08-01 21:27:57'),
(4, 10000, NULL, '2019-08-01', 'every day', 'same day', 1, 1, '2019-08-01 19:29:37', '2019-08-01 21:29:37');

-- --------------------------------------------------------

--
-- بنية الجدول `fiance_goal_category`
--

CREATE TABLE `fiance_goal_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `financial_categories`
--

CREATE TABLE `financial_categories` (
  `category_id` int(11) NOT NULL,
  `category_name_en` varchar(250) NOT NULL,
  `category_name_ar` varchar(250) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `shape` varchar(200) NOT NULL,
  `type` enum('revenu','expenses') NOT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `color` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `financial_categories`
--

INSERT INTO `financial_categories` (`category_id`, `category_name_en`, `category_name_ar`, `category_name`, `currency`, `shape`, `type`, `icon`, `create_date`, `update_date`, `color`, `user_id`) VALUES
(1, 'food and drink', 'طعام و شراب', '', '', '', 'expenses', 'files\\images\\category\\45332.png', '2019-07-16 17:40:46', '2019-07-17 20:20:33', 'bg-danger', 0),
(2, 'shopping', 'تسوق', '', '', '', 'expenses', 'files\\images\\category\\45332.png', '2019-07-16 17:41:50', '2019-07-17 20:25:58', 'bg-info', 0),
(3, 'residence', 'مسكن', '', '', '', 'revenu', 'files\\images\\category\\45332.png', '2019-07-17 17:32:44', '2019-07-17 20:26:02', 'bg-success', 0),
(4, '', '', 'test', '$', '', 'expenses', NULL, '2019-08-01 23:01:41', '2019-08-01 23:01:41', 'bg-sccuess', 1),
(5, '', '', 'test', '$', '', 'expenses', NULL, '2019-08-02 09:49:35', '2019-08-02 09:49:35', 'bg-sccuess', 1),
(6, '', '', 'test6', 'ل.س', '', 'revenu', NULL, '2019-08-02 09:51:27', '2019-08-02 09:51:27', 'bg-sccuess', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `financial_categories_user`
--

CREATE TABLE `financial_categories_user` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `shape` varchar(100) NOT NULL,
  `type` enum('revenu','expenses') NOT NULL,
  `icon` varchar(300) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `financial_categories_user`
--

INSERT INTO `financial_categories_user` (`category_id`, `category_name`, `currency`, `shape`, `type`, `icon`, `color`, `create_date`, `update_date`, `user_id`) VALUES
(1, 'family', '', '', 'expenses', 'files\\images\\category\\45332.png', 'bg-success', '2019-07-31 19:30:10', '2019-07-31 19:30:10', 1),
(2, 'test', '200', '', 'revenu', 'files\\images\\category\\45332.png', 'bg-success\r\n', '2019-07-31 19:46:01', '2019-07-31 19:46:01', 1),
(4, 'test4', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:35:11', '2019-07-31 22:35:11', 1),
(5, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:36:28', '2019-07-31 22:36:28', 1),
(8, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:47:36', '2019-07-31 22:47:36', 1),
(9, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:50:25', '2019-07-31 22:50:25', 1),
(10, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:50:54', '2019-07-31 22:50:54', 1),
(11, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 22:51:03', '2019-07-31 22:51:03', 1),
(12, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-07-31 23:04:27', '2019-07-31 23:04:27', 1),
(13, 'test6', 'ل.س', '', 'revenu', NULL, 'bg-sccuess', '2019-08-01 20:19:06', '2019-08-01 20:19:06', 1),
(14, 'test6', 'ل.س', '', 'revenu', NULL, 'bg-sccuess', '2019-08-01 20:22:25', '2019-08-01 20:22:25', 1),
(15, 'test', '$', '', 'expenses', NULL, 'bg-sccuess', '2019-08-01 20:52:36', '2019-08-01 20:52:36', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `financial_goals`
--

CREATE TABLE `financial_goals` (
  `financial_goals_id` int(11) NOT NULL,
  `goal_name` varchar(200) NOT NULL,
  `value saved` int(20) NOT NULL,
  `reached_value` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `financial_sub_category`
--

CREATE TABLE `financial_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name_en` varchar(250) NOT NULL,
  `sub_category_name_ar` varchar(250) NOT NULL,
  `sub_category_name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `class` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `financial_sub_category`
--

INSERT INTO `financial_sub_category` (`sub_category_id`, `sub_category_name_en`, `sub_category_name_ar`, `sub_category_name`, `category_id`, `create_date`, `update_date`, `class`, `user_id`) VALUES
(1, 'restaurant', 'مطاعم', '', 1, '2019-07-16 20:45:07', '2019-07-16 20:45:07', '', 0),
(2, 'general', 'عام', '', 3, '2019-07-17 17:33:36', '2019-07-17 17:33:36', '', 0),
(3, '', '', 'gsg', 5, '2019-08-02 09:49:36', '2019-08-02 09:49:36', '', 1),
(4, '', '', 'qqqqqqq', 6, '2019-08-02 09:51:28', '2019-08-02 09:51:28', '', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `financial_sub_category_user`
--

CREATE TABLE `financial_sub_category_user` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `financial_sub_category_user`
--

INSERT INTO `financial_sub_category_user` (`sub_category_id`, `sub_category_name`, `category_id`, `create_date`, `update_date`, `user_id`) VALUES
(1, 'child', 1, '2019-07-31 20:01:32', '2019-07-31 20:01:32', 1),
(2, 'تيست', 2, '2019-07-31 20:27:23', '2019-07-31 20:27:23', 1),
(3, 'gsg', 12, '2019-07-31 23:04:27', '2019-07-31 23:04:27', 1),
(4, 'qqqqqqq', 14, '2019-08-01 20:22:25', '2019-08-01 20:22:25', 1),
(5, 'gsg', 15, '2019-08-01 20:52:36', '2019-08-01 20:52:36', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `goals`
--

CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `health`
--

CREATE TABLE `health` (
  `health_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `capacity` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `person_name` varchar(200) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `value` int(20) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `loan_term` varchar(100) NOT NULL,
  `benefits` varchar(100) NOT NULL,
  `value_installment` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_expenses` varchar(50) NOT NULL,
  `project_revenue` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `revenue`
--

CREATE TABLE `revenue` (
  `revenue_id` int(11) NOT NULL,
  `value` int(20) NOT NULL,
  `note` text,
  `date` date NOT NULL,
  `repetition` enum('every day','every two day','weekend','every week','every two weeks','every four weeks','every month','every two months','every three months','every six month','every year') NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `revenue`
--

INSERT INTO `revenue` (`revenue_id`, `value`, `note`, `date`, `repetition`, `category_id`, `user_id`, `create_date`, `update_date`) VALUES
(1, 300, 'test', '2019-07-12', 'every day', 1, 1, '2019-07-31 19:20:53', '2019-07-31 19:20:53'),
(2, 500, NULL, '2019-08-01', 'every day', 2, 1, '2019-08-01 21:50:51', '2019-08-01 21:50:51'),
(3, 500, 'test', '2019-08-01', 'every day', 2, 1, '2019-08-01 21:51:14', '2019-08-01 21:51:14');

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `session_id`, `create_date`, `update_date`) VALUES
(1, '8ca8699cdb05663258df2b61146c77db', '2019-07-09 17:00:10', '2019-07-09 18:59:10'),
(2, 'af9028790bd09ca7ecac96cc126e7476', '2019-07-09 17:00:29', '2019-07-09 18:59:29'),
(3, 'bc2a5ced755ddbc28a5436dacf57e2d1', '2019-07-09 17:00:31', '2019-07-09 18:59:31'),
(4, '472b79563a11d9fac6b87be70acceab5', '2019-07-09 18:15:19', '2019-07-09 20:14:19'),
(5, 'bef2e85ffe52d83a5d8f03d08ccbb1d9', '2019-07-09 18:31:53', '2019-07-09 20:30:53'),
(6, 'e430c759c1e54ae8c4cb248af35780d4', '2019-07-09 18:32:21', '2019-07-09 20:31:21');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Honey Bee'),
(2, 'system_title', 'Honey Bee');

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `link` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `sliders`
--

INSERT INTO `sliders` (`slider_id`, `image_name`, `status`, `link`, `create_date`, `update_date`) VALUES
(1, 'optimum/plugins/images/heading-bg/slide2.jpg', 1, '', '2019-07-28 20:19:13', '2019-07-28 20:19:13'),
(2, 'optimum/plugins/images/heading-bg/slide3.jpg', 1, '', '2019-07-28 21:07:23', '2019-07-28 21:07:23');

-- --------------------------------------------------------

--
-- بنية الجدول `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `achievement_time` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `task_category`
--

CREATE TABLE `task_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `country`, `created_at`, `status`, `role`) VALUES
(1, 'Super', 'Admin', 'admin1@admin.com', '0100 500 600', '8d788385431273d11e8b43bb78f3aa41', 14, '2018-03-02 14:51:38', 1, 'admin'),
(16, 'Esther', 'User', 'teacher@teacher.com', '08053433', '8d788385431273d11e8b43bb78f3aa41', 11, '2019-02-27 00:10:25', 0, 'user'),
(17, 'New user', 'New Admin', 'test@test.com', '08053433', '81dc9bdb52d04dc20036dbd8313ed055', 126, '2019-02-27 23:51:25', 1, 'admin');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `lastname`, `password`, `status`, `admin_id`, `create_date`, `update_time`, `role`) VALUES
(1, 'test', 'test@test.com', 'test', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, '2019-07-31 19:20:11', '2019-07-31 19:20:11', '');

-- --------------------------------------------------------

--
-- بنية الجدول `user_power`
--

CREATE TABLE `user_power` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user_power`
--

INSERT INTO `user_power` (`id`, `name`, `power_id`) VALUES
(2, 'edit', 2),
(3, 'delete', 3),
(4, 'add', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `action`) VALUES
(1, 11, 1),
(2, 11, 3),
(3, 13, 2),
(4, 14, 1),
(5, 14, 3),
(6, 15, 1),
(7, 15, 3),
(11, 16, 1),
(12, 16, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `autobiography`
--
ALTER TABLE `autobiography`
  ADD PRIMARY KEY (`autobiography`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `budget_category`
--
ALTER TABLE `budget_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `budget_sub_category`
--
ALTER TABLE `budget_sub_category`
  ADD PRIMARY KEY (`budget_sub_category`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `business_scheduling`
--
ALTER TABLE `business_scheduling`
  ADD PRIMARY KEY (`business_scheduling_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category_loans`
--
ALTER TABLE `category_loans`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fiance_goal_category`
--
ALTER TABLE `fiance_goal_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `financial_categories`
--
ALTER TABLE `financial_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `financial_categories_user`
--
ALTER TABLE `financial_categories_user`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `financial_goals`
--
ALTER TABLE `financial_goals`
  ADD PRIMARY KEY (`financial_goals_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `financial_sub_category`
--
ALTER TABLE `financial_sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `financial_sub_category_user`
--
ALTER TABLE `financial_sub_category_user`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`health_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`revenue_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `user_power`
--
ALTER TABLE `user_power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `autobiography`
--
ALTER TABLE `autobiography`
  MODIFY `autobiography` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_category`
--
ALTER TABLE `budget_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_sub_category`
--
ALTER TABLE `budget_sub_category`
  MODIFY `budget_sub_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_scheduling`
--
ALTER TABLE `business_scheduling`
  MODIFY `business_scheduling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_loans`
--
ALTER TABLE `category_loans`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fiance_goal_category`
--
ALTER TABLE `fiance_goal_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_categories`
--
ALTER TABLE `financial_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `financial_categories_user`
--
ALTER TABLE `financial_categories_user`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `financial_goals`
--
ALTER TABLE `financial_goals`
  MODIFY `financial_goals_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_sub_category`
--
ALTER TABLE `financial_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financial_sub_category_user`
--
ALTER TABLE `financial_sub_category_user`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_power`
--
ALTER TABLE `user_power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `autobiography`
--
ALTER TABLE `autobiography`
  ADD CONSTRAINT `autobiography_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `budget_category` (`category_id`),
  ADD CONSTRAINT `budgets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- القيود للجدول `budget_category`
--
ALTER TABLE `budget_category`
  ADD CONSTRAINT `budget_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `budgets` (`category_id`),
  ADD CONSTRAINT `budget_category_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- القيود للجدول `budget_sub_category`
--
ALTER TABLE `budget_sub_category`
  ADD CONSTRAINT `budget_sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `budget_category` (`category_id`),
  ADD CONSTRAINT `budget_sub_category_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `business_scheduling`
--
ALTER TABLE `business_scheduling`
  ADD CONSTRAINT `business_scheduling_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `financial_categories` (`category_id`),
  ADD CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `financial_categories_user`
--
ALTER TABLE `financial_categories_user`
  ADD CONSTRAINT `financial_categories_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `financial_goals`
--
ALTER TABLE `financial_goals`
  ADD CONSTRAINT `financial_goals_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `fiance_goal_category` (`category_id`);

--
-- القيود للجدول `financial_sub_category`
--
ALTER TABLE `financial_sub_category`
  ADD CONSTRAINT `financial_sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `financial_categories` (`category_id`);

--
-- القيود للجدول `financial_sub_category_user`
--
ALTER TABLE `financial_sub_category_user`
  ADD CONSTRAINT `financial_sub_category_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `financial_sub_category_user_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `financial_categories_user` (`category_id`);

--
-- القيود للجدول `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `health`
--
ALTER TABLE `health`
  ADD CONSTRAINT `health_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `revenue`
--
ALTER TABLE `revenue`
  ADD CONSTRAINT `revenue_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `financial_categories` (`category_id`),
  ADD CONSTRAINT `revenue_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `task_category`
--
ALTER TABLE `task_category`
  ADD CONSTRAINT `task_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
