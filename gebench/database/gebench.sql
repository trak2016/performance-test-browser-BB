-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2016, 18:54
-- Wersja serwera: 5.6.26
-- Wersja PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gebench`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`id`, `user_id`, `title`, `summary`, `content`, `status`, `category`, `created_at`, `updated_at`, `type`, `parent`) VALUES
(4, 1, 'Podstawy tworzenia gry', 'Cocos2d-x jest oparty na koncepcji scen, które pełnią rolę poziomów lub ekranów w grze. Każda scena musi zawierać w swojej implementacji niezbędne elementy do poprawnego kompilowania i działania programu. Implementacja aplikacji wykorzystującej bibliotekę Cocos2d-x, której zadaniem będzie wyświetlenie tradycyjnego powitania "HelloWorld".', '<p>#include &quot;cocos2d.h&quot;</p>\r\n\r\n<p>class HelloWorld : public cocos2d::CCLayer{</p>\r\n\r\n<p>public:</p>\r\n\r\n<p>&nbsp;virtual bool init();</p>\r\n\r\n<p>&nbsp;static cocos2d::CCScene* scene();</p>\r\n\r\n<p>&nbsp;CREATE_FUNC(HelloWorld);</p>\r\n\r\n<p>};</p>\r\n', 1, 1, 1452425777, 1452425777, '1', NULL),
(5, 1, 'Hello word image', 'This is hello word image', '<p><img alt="Hello word image" src="/uploads/hello.jpg" style="height:300px; width:390px" /><br />\r\n&nbsp;</p>\r\n', 2, 1, 1452426908, 1452428004, '2', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('member', 2, 1448999482),
('theCreator', 1, 1446832456);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1446829687, 1446829687),
('adminArticle', 2, 'Allows admin+ roles to manage articles', NULL, NULL, 1446829687, 1446829687),
('createArticle', 2, 'Allows editor+ roles to create articles', NULL, NULL, 1446829687, 1446829687),
('deleteArticle', 2, 'Allows admin+ roles to delete articles', NULL, NULL, 1446829687, 1446829687),
('editor', 1, 'Editor of this application', NULL, NULL, 1446829687, 1446829687),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1446829687, 1446829687),
('member', 1, 'Registered users, members of this site', NULL, NULL, 1446829687, 1446829687),
('premium', 1, 'Premium members. They have more permissions than normal members', NULL, NULL, 1446829687, 1446829687),
('support', 1, 'Support staff', NULL, NULL, 1446829687, 1446829687),
('theCreator', 1, 'You!', NULL, NULL, 1446829687, 1446829687),
('updateArticle', 2, 'Allows editor+ roles to update articles', NULL, NULL, 1446829687, 1446829687),
('updateOwnArticle', 2, 'Update own article', 'isAuthor', NULL, 1446829687, 1446829687),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1446829687, 1446829687);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('theCreator', 'admin'),
('editor', 'adminArticle'),
('editor', 'createArticle'),
('admin', 'deleteArticle'),
('admin', 'editor'),
('admin', 'manageUsers'),
('support', 'member'),
('support', 'premium'),
('editor', 'support'),
('admin', 'updateArticle'),
('updateOwnArticle', 'updateArticle'),
('editor', 'updateOwnArticle'),
('premium', 'usePremiumContent');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:28:"common\\rbac\\rules\\AuthorRule":3:{s:4:"name";s:8:"isAuthor";s:9:"createdAt";i:1446829687;s:9:"updatedAt";i:1446829687;}', 1446829687, 1446829687);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `avatarlink` text COLLATE utf8_unicode_ci,
  `manner` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `orderlist` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1446829578),
('m141022_115823_create_user_table', 1446829587),
('m141022_115912_create_rbac_tables', 1446829588),
('m141022_115922_create_session_table', 1446829588),
('m150104_153617_create_article_table', 1446829588);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `session`
--

INSERT INTO `session` (`id`, `expire`, `data`) VALUES
('22vmj691cf4c4855m6deebuvv1', 1452435352, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('6glutu1090jd98phj64388h0r4', 1452420981, 0x5f5f666c6173687c613a303a7b7d),
('c6888pu37u2pvdrf96m8bvbsb5', 1452362372, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('ea86r1h55i7c8he29ro334d3b4', 1452420697, 0x5f5f666c6173687c613a303a7b7d),
('h1ntpl0r89q40itc6chtc39qb3', 1452429448, 0x5f5f666c6173687c613a303a7b7d),
('ou71hnnoq9sl1gdku3k4l6url7', 1452429405, 0x5f5f666c6173687c613a303a7b7d),
('pdbjh8p69h5sdf4tl7kreb0kd6', 1452359261, 0x5f5f666c6173687c613a303a7b7d),
('q0sjkcn9rprnlbpe3pq0g7f261', 1452420988, 0x5f5f666c6173687c613a303a7b7d),
('rkmv12q6lnqtbhrdj8cem898o6', 1452443801, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('sgv6hnr903dj9p9q2g0b867te7', 1452420693, 0x5f5f666c6173687c613a303a7b7d);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `role_id` smallint(6) NOT NULL DEFAULT '1',
  `user_type_id` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`, `status`, `role_id`, `user_type_id`) VALUES
(1, 'lhmaster', 'admin@admin.pl', '$2y$13$qP1BbYpjy3vU/SPjmNZRGu4CQKl00zyVJ4VkUJp.IiLORh3x3FEAa', 'WhIgrOUhs8klMLiByPpLERGO22xNRuGs', NULL, NULL, 1446832455, 1446832455, 10, 1, 1),
(2, 'userOne', 'one@one.pl', '$2y$13$EyMTZHILpqPUGlDR9mBvn.LQ9hzvyWD9RQz9MnCE7ibpCqvH0HlVe', 'F1aL2RW-6NRagxx8cJVSwjQaI22P3zVj', NULL, NULL, 1448999482, 1448999482, 10, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
