-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2019 às 00:23
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedra_chata_ecoturismo_aventura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id_banner` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `button_content` varchar(10) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id_banner`, `title`, `description`, `button_content`, `button_link`, `image_path`) VALUES
(2, 'titulo', 'dsadsadsadasdsadasdasdsa', 'clique', 'http://localhost/pedra-chata-ecoturismo-aventura', '20190527084343divulgacao-facebook.png'),
(3, 'dsdsa', 'dsadsa', 'dsadsa', 'http://facebook.com', '20190527084838banner-1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `highlights`
--

CREATE TABLE `highlights` (
  `id_highlight` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `active` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `highlights`
--

INSERT INTO `highlights` (`id_highlight`, `image_path`, `description`, `title`, `active`) VALUES
(1, '20190527092107area-depoimentos.jpg', 'dsadsadsa', 'Nome auiii', 1),
(2, '20190527092411area-depoimentos.jpg', 'dsadsadsa', 'Titulo aqui', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `images_travels`
--

CREATE TABLE `images_travels` (
  `id_image` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `id_travel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_options`
--

CREATE TABLE `menu_options` (
  `id_menu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu_options`
--

INSERT INTO `menu_options` (`id_menu`, `name`, `link`) VALUES
(3, 'Inicial', ' ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id_subscriber` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `persons_of_team`
--

CREATE TABLE `persons_of_team` (
  `id_person` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE `publications` (
  `id_publication` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `publication_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id_service` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_medias`
--

CREATE TABLE `social_medias` (
  `id_social_media` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `social_medias`
--

INSERT INTO `social_medias` (`id_social_media`, `link`, `name`, `icon`) VALUES
(1, 'https://www.facebook.com/Pedra-Chata-Ecoturismo-e-Aventura-140900813277645/', 'Facebook', '<i class=\"fab fa-facebook\"></i>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenu_options`
--

CREATE TABLE `submenu_options` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `testimonies`
--

CREATE TABLE `testimonies` (
  `id_testimony` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `travels`
--

CREATE TABLE `travels` (
  `id_travel` int(11) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(1, 'Antonio Eduardo Moreira', 'contato@eduardoem.com.br', 'zvl0GlGPlDhNOEs/AZaYWIVFINsilZ4m8jwhyLlczMyyKvOaHPS7Pul9yUg+d24eNJd0VtM3WnCjA9J6hDskMA==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id_highlight`);

--
-- Indexes for table `images_travels`
--
ALTER TABLE `images_travels`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Indexes for table `menu_options`
--
ALTER TABLE `menu_options`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indexes for table `persons_of_team`
--
ALTER TABLE `persons_of_team`
  ADD PRIMARY KEY (`id_person`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id_social_media`);

--
-- Indexes for table `submenu_options`
--
ALTER TABLE `submenu_options`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id_testimony`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id_travel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id_highlight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images_travels`
--
ALTER TABLE `images_travels`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_options`
--
ALTER TABLE `menu_options`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons_of_team`
--
ALTER TABLE `persons_of_team`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id_social_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenu_options`
--
ALTER TABLE `submenu_options`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id_testimony` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `images_travels`
--
ALTER TABLE `images_travels`
  ADD CONSTRAINT `images_travels_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id_travel`);

--
-- Limitadores para a tabela `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Limitadores para a tabela `submenu_options`
--
ALTER TABLE `submenu_options`
  ADD CONSTRAINT `submenu_options_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu_options` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
