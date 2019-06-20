-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jun-2019 às 02:05
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
-- Estrutura da tabela `accesses`
--

CREATE TABLE `accesses` (
  `id_access` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date_access` datetime DEFAULT CURRENT_TIMESTAMP,
  `dispositive` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `accesses`
--

INSERT INTO `accesses` (`id_access`, `ip`, `date_access`, `dispositive`, `city`) VALUES
(8, '192.168.0.10', '2019-06-03 20:50:07', 'CELLPHONE', NULL),
(9, '192.168.0.11', '2019-06-03 21:30:44', 'CELLPHONE', NULL),
(10, '192.168.0.11', '2019-06-03 21:39:06', 'CELLPHONE', NULL),
(11, '::1', '2019-06-03 21:50:30', 'COMPUTER', NULL),
(12, '::1', '2019-06-03 21:51:47', 'COMPUTER', NULL),
(13, '::1', '2019-06-03 21:52:12', 'COMPUTER', NULL),
(14, '::1', '2019-06-03 21:53:43', 'COMPUTER', NULL),
(15, '::1', '2019-06-03 21:54:36', 'COMPUTER', NULL),
(16, '::1', '2019-06-03 21:54:55', 'COMPUTER', NULL),
(17, '192.168.0.10', '2019-06-03 22:00:07', 'CELLPHONE', NULL),
(18, '::1', '2019-06-08 13:21:47', 'COMPUTER', NULL),
(19, '::1', '2019-06-09 18:10:25', 'COMPUTER', NULL),
(20, '::1', '2019-06-09 19:23:21', 'COMPUTER', NULL),
(21, '::1', '2019-06-09 19:27:25', 'COMPUTER', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id_banner`, `title`, `description`, `button_content`, `button_link`, `image_path`) VALUES
(5, 'Bem vindo!', 'Cavernas, cachoeiras, trilhas, cânions e muito mais!', 'Confira!', 'http://localhost/pedra-chata-ecoturismo-aventura/passeios', '20190609115147banner.jpg'),
(6, 'Petar!', 'A maior concentração de cavernas do mundo!', 'Confira!', 'http://localhost/pedra-chata-ecoturismo-aventura/passeio/Petar', '20190609115359banner-2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
(4, 'Excursões', 'Diversas excursões por todo Brasil!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `contact_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `message`, `contact_date`) VALUES
(14, 'Olá preciso fazer um orçamento!', 'contato@eduardoem.com.br', 'Olá preciso fazer um orçamento!', '2019-06-03 22:26:31'),
(15, 'dnsaondoandsoandaos', 'eduardomoreira1506@outlook.com', 'dnsaondoandsoandaos', '2019-06-10 19:09:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `highlights`
--

INSERT INTO `highlights` (`id_highlight`, `image_path`, `description`, `title`, `active`) VALUES
(3, '2019061012030262453712_10216032442098041_7173891772953657344_o.jpg', 'Excursão', 'Ponta Grossa', 1),
(4, '2019061012040862098728_10216032282294046_3187622227696680960_n.jpg', 'Lorem ipsum', 'Buraco do Padre', 1),
(5, '2019061012043562021320_10216030613212320_2337466355197935616_n.jpg', 'Arenitos da Vila Velha em Ponta Grossa com uma galerinha muito show, do Colégio Objetivo Itapeva.', 'Arenitos vila velha', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `images_travels`
--

CREATE TABLE `images_travels` (
  `id_image` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `id_travel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `images_travels`
--

INSERT INTO `images_travels` (`id_image`, `image_path`, `id_travel`) VALUES
(9, '20190609110751Campos-Salles-12.jpg', 6),
(10, '20190609110756DSC03830.jpg', 6),
(11, '20190609110809petar-sp.jpg', 6),
(12, '20190609110814petar-1.jpg', 6),
(13, '20190609110819petar-sp-6.jpg', 6),
(15, '20190609110854temimina.jpg', 6),
(16, '2019060911130503626390013406318474fe86b27588df.jpg', 7),
(17, '20190609111309Cachoeira_DJI_0691.jpg', 7),
(18, '20190609111316canion.jpg', 7),
(19, '20190609111321canion-pirituba-vale-do-rio-pirituba-divisa-entre-itapeva-e-itarare-sp-maior.jpg', 7),
(20, '20190609111508poco-do-encanto-senges.jpg', 8),
(21, '20190609111512poço-do-encanto.jpg', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_options`
--

CREATE TABLE `menu_options` (
  `id_menu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu_options`
--

INSERT INTO `menu_options` (`id_menu`, `name`, `link`) VALUES
(3, 'Inicial', ' '),
(4, 'Contato', 'contato'),
(5, 'Sobre', 'sobre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id_subscriber` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subscriber` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id_subscriber`, `email`, `date_subscriber`) VALUES
(1, 'emdesigneroficial@gmail.com', '2019-06-03 19:58:38'),
(2, 'larissanicoli19@gmail.com', '2019-06-03 19:58:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `persons_of_team`
--

CREATE TABLE `persons_of_team` (
  `id_person` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext,
  `image_path` varchar(255) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `persons_of_team`
--

INSERT INTO `persons_of_team` (`id_person`, `name`, `description`, `image_path`, `instagram`, `facebook`) VALUES
(4, 'Ton Texera', 'Lorem Ipsum\r\n\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam commodo placerat interdum. Vestibulum varius sapien vitae pretium hendrerit. Nulla sit amet velit sodales, commodo diam in, cursus augue. Curabitur iaculis neque fermentum euismod lobortis. Suspendisse augue quam, congue sed placerat et, maximus ac lacus. Maecenas id lacus sed ipsum lobortis accumsan in ut lorem. Sed maximus, magna at lobortis ullamcorper, nisl erat pharetra mauris, quis condimentum ipsum justo sit amet libero. Sed tincidunt orci vehicula auctor aliquet. Vestibulum hendrerit sit amet augue et auctor. Vivamus at maximus velit. Nullam in vulputate ipsum, vel dignissim dui. Nulla laoreet, libero eu condimentum pellentesque, tellus ex porttitor nibh, ac lacinia magna elit vitae nunc. Nullam at tincidunt purus. Quisque eu eros lectus.', '2019061012152261602101_10215987462573581_712846300621570048_n.jpg', 'https://instagram.com/tontexera2019/', 'https://www.facebook.com/ton.texera'),
(5, 'Leandro Robson', 'Lorem Ipsum \"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\" \"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam commodo placerat interdum. Vestibulum varius sapien vitae pretium hendrerit. Nulla sit amet velit sodales, commodo diam in, cursus augue. Curabitur iaculis neque fermentum euismod lobortis. Suspendisse augue quam, congue sed placerat et, maximus ac lacus. Maecenas id lacus sed ipsum lobortis accumsan in ut lorem. Sed maximus, magna at lobortis ullamcorper, nisl erat pharetra mauris, quis condimentum ipsum justo sit amet libero. Sed tincidunt orci vehicula auctor aliquet. Vestibulum hendrerit sit amet augue et auctor. Vivamus at maximus velit. Nullam in vulputate ipsum, vel dignissim dui. Nulla laoreet, libero eu condimentum pellentesque, tellus ex porttitor nibh, ac lacinia magna elit vitae nunc. Nullam at tincidunt purus. Quisque eu eros lectus.', '2019061012185962176414_2510024925696006_4832223900358148096_n.jpg', 'https://www.instagram.com/leazeppelin/', 'https://www.facebook.com/leandro.robson.3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE `publications` (
  `id_publication` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` mediumtext NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `publication_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publications`
--

INSERT INTO `publications` (`id_publication`, `title`, `content`, `image_path`, `publication_date`, `id_category`) VALUES
(28, 'Buraco do Padre', '<span style=\"color: rgb(28, 30, 33); font-family: Helvetica, Arial, sans-serif;\">Buraco do Padre</span><br style=\"color: rgb(28, 30, 33); font-family: Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(28, 30, 33); font-family: Helvetica, Arial, sans-serif;\">Ponta Grossa-PR</span>            ', '2019061012120162086677_10216032282854060_1723040956741058560_n.jpg', '2019-06-09 19:12:01', 4),
(29, 'BTS no Allianz Parque', '<p style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; font-family: Helvetica, Arial, sans-serif; color: rgb(28, 30, 33);\">Viagens e Excursões é com a Pedra Chata Turismo!</p><p style=\"margin: 6px 0px 0px; display: inline; font-family: Helvetica, Arial, sans-serif; color: rgb(28, 30, 33);\">BTS no Allianz Parque...valew galera...até a próxima...literalmente Show!!!</p>            ', '2019061012142261296282_10215938957520985_4346951372537593856_n.jpg', '2019-06-09 19:14:22', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id_service` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id_service`, `icon`, `title`, `description`) VALUES
(6, '<i class=\"fas fa-bus\"></i>', 'Excursões', 'Excursões para eventos, parques, pontos turísticos e muito mais.'),
(7, '<i class=\"fab fa-pagelines\"></i>', 'Passeios Naturais', 'Cavernas, trilhas, cachoeiras, passeios e muito mais!'),
(8, '<i class=\"fas fa-bicycle\"></i>', 'Cicloturismo', 'Cicloturismos de longa e baixa distância com destinos a lugares incríveis.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_medias`
--

CREATE TABLE `social_medias` (
  `id_social_media` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `social_medias`
--

INSERT INTO `social_medias` (`id_social_media`, `link`, `name`, `icon`) VALUES
(1, 'https://facebook.com/pedrachataturismo', 'Facebook', '<i class=\"fab fa-facebook\"></i>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `static_images`
--

CREATE TABLE `static_images` (
  `id_static` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `static_images`
--

INSERT INTO `static_images` (`id_static`, `area`, `content`, `last_update`, `page`) VALUES
(2, 'IMAGEM INICIAL', '20190609110421canion.jpg', '2019-06-09 17:10:23', 'INITIAL'),
(3, 'IMAGEM FUNDO VIDEO', '20190609114902Temimina-II-10.jpg', '2019-06-09 17:10:53', 'INITIAL'),
(4, 'IMAGEM BANNER', '20190609115518fx-2010-apr-petar-41.jpg', '2019-06-09 17:11:56', 'CONTACT'),
(5, 'IMAGEM DIREITA', 'dasdsadsadsa.jpg', '2019-06-09 17:12:30', 'CONTACT'),
(7, 'IMAGEM BANNER INICIAL', '2019061012213562349801_2510025982362567_5934542173297967104_n.jpg', '2019-06-09 17:13:28', 'ABOUT US'),
(8, 'IMAGEM DE BAIXO', 'dasdsadsadsa.jpg', '2019-06-09 17:13:41', 'ABOUT US'),
(9, 'IMAGEM BANNER DESTAQUE', '20190610122433chapada-dos-veadeiros2.jpg', '2019-06-09 17:14:18', 'TRAVELS'),
(10, 'IMAGEM BANNER DESTACADO', '20190610122415guia-completo-sobre-ecoturismo-em-bonito-ms.jpg', '2019-06-09 17:14:52', 'BLOG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `static_informations`
--

CREATE TABLE `static_informations` (
  `id_static` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `static_informations`
--

INSERT INTO `static_informations` (`id_static`, `area`, `content`, `last_update`, `page`) VALUES
(3, 'TITULO PRIMEIRO TEXTO', 'Sobre a Empresa', '2019-06-09 23:01:07', 'INITIAL'),
(4, 'TEXTO PRIMEIRO TEXTO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est dui, molestie vitae sem quis, sagittis dapibus nisi. Praesent commodo ultricies dui, ut posuere diam rutrum non. Aenean pellentesque, ipsum non tincidunt scelerisque, justo dui dapibus sapien, nec consequat nibh sapien sodales urna. ', '2019-06-09 23:01:50', 'INITIAL'),
(5, 'LEGENDA PRIMEIRO TEXTO', 'Heverton de Abreu.', '2019-06-09 23:02:23', 'INITIAL'),
(6, 'TITULO AREA DE SERVICOS', 'Passeios', '2019-06-09 12:21:49', 'INITIAL'),
(7, 'SUBTITULO AREA DE SERVICOS', 'Escolha seu destino!', '2019-06-09 12:22:06', 'INITIAL'),
(8, 'TEXTO DO VIDEO', 'Conheça mais de perto!', '2019-06-09 23:36:50', 'INITIAL'),
(9, 'LINK DO VIDEO', 'https://vimeo.com/341241531', '2019-06-09 23:47:50', 'INITIAL'),
(10, 'TITULO AREA DE ICONES DE SERVICO', 'Serviços', '2019-06-09 12:23:48', 'INITIAL'),
(11, 'SUBTITULO AREA DE ICONES DE SERVICO', 'Nós ofereços diversos serviços para você!', '2019-06-09 12:24:07', 'INITIAL'),
(12, 'TITULO AREA DO BLOG', 'Conheça nosso blog!', '2019-06-09 12:24:32', 'INITIAL'),
(13, 'SUBTITULO AREA DO BLOG', 'Todas novidades e notícias para você!', '2019-06-09 12:24:46', 'INITIAL'),
(16, 'TITULO BLOG', 'Blog Pedra Chata', '2019-06-09 13:03:19', 'BLOG'),
(17, 'TITULO CONTATO', 'Entre em contato', '2019-06-09 13:10:54', 'CONTACT'),
(18, 'TELEFONES CONTATO', '(15) 99798-6248', '2019-06-09 13:11:12', 'CONTACT'),
(19, 'EMAIL CONTATO', 'contato@pedrachata.com.br', '2019-06-09 13:11:26', 'CONTACT'),
(20, 'TITULO TEXTO CONTATO', 'Mais informações.', '2019-06-10 00:00:28', 'CONTACT'),
(21, 'TEXTO CONTATO', 'A Agência Pedra Chata não só trabalha com passeios particulares, como também oferece diversos tipos de excursões sendo ela para eventos ou não.', '2019-06-10 00:00:55', 'CONTACT'),
(22, 'BOTAO TEXTO CONTATO', 'Conheça-nos!', '2019-06-09 13:12:16', 'CONTACT'),
(23, 'TITULO PASSEIOS', 'Todos passeios', '2019-06-09 13:16:36', 'TRAVELS'),
(24, 'TITULO SOBRE', 'SOBRE NÓS', '2019-06-09 13:18:45', 'ABOUT US'),
(25, 'TITULO TEXTO SOBRE', 'Sobre nós', '2019-06-09 13:18:59', 'ABOUT US'),
(26, 'TOPICO 1 TEXTO SOBRE', 'Vitae cumque eius modi expedita dsadsa', '2019-06-09 18:21:11', 'ABOUT US'),
(27, 'TOPICO 2 TEXTO SOBRE', 'Totam at maxime Accusantium dsadassda', '2019-06-09 18:21:22', 'ABOUT US'),
(28, 'TOPICO 3 TEXTO SOBRE', 'Distinctio temporibus', '2019-06-09 13:19:46', 'ABOUT US'),
(29, 'TEXTO SOBRE', 'b dsaoibdosabdosabodbaodbaso', '2019-06-09 18:28:57', 'ABOUT US'),
(30, 'TITULO ESQUERDO', 'Sobre nósss', '2019-06-09 22:35:16', 'FOOTER'),
(31, 'TEXTO ESQUERDO', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!', '2019-06-09 17:31:39', 'FOOTER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testimonies`
--

CREATE TABLE `testimonies` (
  `id_testimony` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `testimony` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `testimonies`
--

INSERT INTO `testimonies` (`id_testimony`, `person_name`, `image_path`, `testimony`) VALUES
(6, 'Gabriel Ferreira', '2019061012094957462707_2669489339733559_834760003880484864_n.jpg', 'Profissionalismo e muita aventura!!!!');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `travels`
--

INSERT INTO `travels` (`id_travel`, `featured_image`, `title`, `description`, `price`) VALUES
(6, '20190609110646IMG_6797-1920x1440.jpg', 'Petar', 'PETAR, a maior porção de Mata Atlântica preservada do Brasil e mais de 300 cavernas', 150),
(7, '20190609111247563e84b266914.jpg', 'Canion Pirituba', 'Cachoeiras e vistas maravilhosas!', 150),
(8, '201906091114581cd1d0e547cd8f04106316f5ae2304a7.jpg', 'Poço do Encanto', 'Poço do Encanto. Parada obrigatória, se você for para Sengés, um lugar mágico e de muita beleza.', 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(1, 'Antonio Eduardo Moreira', 'contato@eduardoem.com.br', 'zvl0GlGPlDhNOEs/AZaYWIVFINsilZ4m8jwhyLlczMyyKvOaHPS7Pul9yUg+d24eNJd0VtM3WnCjA9J6hDskMA=='),
(2, 'Heverton de Abreu Moreira', 'tontexera13@gmail.com', '3t37MpIgtPP90hp5CKoV0kPGNrtl7TjOLD3QWwRoY6Hn5MYh+KN9BLwE80ui938mshQgVKGPiG13IMwBEnofaQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id_access`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

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
-- Indexes for table `static_images`
--
ALTER TABLE `static_images`
  ADD PRIMARY KEY (`id_static`),
  ADD UNIQUE KEY `area` (`area`);

--
-- Indexes for table `static_informations`
--
ALTER TABLE `static_informations`
  ADD PRIMARY KEY (`id_static`),
  ADD UNIQUE KEY `area` (`area`);

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
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id_highlight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images_travels`
--
ALTER TABLE `images_travels`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu_options`
--
ALTER TABLE `menu_options`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persons_of_team`
--
ALTER TABLE `persons_of_team`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id_social_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `static_images`
--
ALTER TABLE `static_images`
  MODIFY `id_static` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `static_informations`
--
ALTER TABLE `static_informations`
  MODIFY `id_static` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id_testimony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
