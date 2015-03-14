--
-- Struktura tabulky `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
`id` int(11) NOT NULL,
  `id_acl_roles` int(11) NOT NULL,
  `id_acl_resources` int(11) DEFAULT NULL,
  `id_acl_privileges` int(11) DEFAULT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `acl`
--

INSERT INTO `acl` (`id`, `id_acl_roles`, `id_acl_resources`, `id_acl_privileges`, `allowed`) VALUES
(1, 1, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktura tabulky `acl_privileges`
--

CREATE TABLE IF NOT EXISTS `acl_privileges` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `acl_privileges`
--

INSERT INTO `acl_privileges` (`id`, `name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Struktura tabulky `acl_resources`
--

CREATE TABLE IF NOT EXISTS `acl_resources` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `acl_resources`
--

INSERT INTO `acl_resources` (`id`, `name`) VALUES
(1, 'Admin:Homepage');

-- --------------------------------------------------------

--
-- Struktura tabulky `acl_roles`
--

CREATE TABLE IF NOT EXISTS `acl_roles` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_acl_roles` int(11) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `acl_roles`
--

INSERT INTO `acl_roles` (`id`, `name`, `id_acl_roles`, `description`) VALUES
(1, 'admin', NULL, 'Allpowerful');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$RoxCCBd6zPceznN3bAuicOptIIhpJct714BQneNpHLQ1aR7cMbDb.', 'admin');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `acl`
--
ALTER TABLE `acl`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `acl_privileges`
--
ALTER TABLE `acl_privileges`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `acl_resources`
--
ALTER TABLE `acl_resources`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `acl_roles`
--
ALTER TABLE `acl_roles`
 ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `acl`
--
ALTER TABLE `acl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `acl_privileges`
--
ALTER TABLE `acl_privileges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `acl_resources`
--
ALTER TABLE `acl_resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `acl_roles`
--
ALTER TABLE `acl_roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;