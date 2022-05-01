-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Maio-2022 às 13:00
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `orkut`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albumphotocomments`
--

DROP TABLE IF EXISTS `albumphotocomments`;
CREATE TABLE IF NOT EXISTS `albumphotocomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `body` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `albumphotos`
--

DROP TABLE IF EXISTS `albumphotos`;
CREATE TABLE IF NOT EXISTS `albumphotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titulo_album` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `capa` varchar(100) NOT NULL DEFAULT 'album.jpg',
  `somarfotos` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `body` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidademembros`
--

DROP TABLE IF EXISTS `comunidademembros`;
CREATE TABLE IF NOT EXISTS `comunidademembros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comunidade` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidademensagens`
--

DROP TABLE IF EXISTS `comunidademensagens`;
CREATE TABLE IF NOT EXISTS `comunidademensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comunidade` int(11) DEFAULT NULL,
  `id_topico` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidaderelations`
--

DROP TABLE IF EXISTS `comunidaderelations`;
CREATE TABLE IF NOT EXISTS `comunidaderelations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comunidade_from` int(11) NOT NULL,
  `comunidade_to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidades`
--

DROP TABLE IF EXISTS `comunidades`;
CREATE TABLE IF NOT EXISTS `comunidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `avatar` varchar(100) DEFAULT 'avatar.jpg',
  `cover` varchar(100) DEFAULT 'avatar.jpg',
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cep` varchar(9) DEFAULT '00000-000',
  `pais` varchar(100) DEFAULT NULL,
  `idioma` int(11) DEFAULT 0,
  `categoria` int(11) DEFAULT 1,
  `tipo` tinyint(1) DEFAULT 1,
  `privacidade` tinyint(1) DEFAULT 1,
  `somamembros` int(11) NOT NULL DEFAULT 0,
  `somarelacionadas` int(11) DEFAULT 0,
  `somatopicos` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidadetopicos`
--

DROP TABLE IF EXISTS `comunidadetopicos`;
CREATE TABLE IF NOT EXISTS `comunidadetopicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comunidade` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `body` varchar(200) NOT NULL,
  `somamensagens` int(11) NOT NULL DEFAULT 0,
  `ultimapostagem` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
CREATE TABLE IF NOT EXISTS `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enquetes`
--

DROP TABLE IF EXISTS `enquetes`;
CREATE TABLE IF NOT EXISTS `enquetes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enquetesopcoes`
--

DROP TABLE IF EXISTS `enquetesopcoes`;
CREATE TABLE IF NOT EXISTS `enquetesopcoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enquetes` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcoments`
--

DROP TABLE IF EXISTS `postcoments`;
CREATE TABLE IF NOT EXISTS `postcoments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postlikes`
--

DROP TABLE IF EXISTS `postlikes`;
CREATE TABLE IF NOT EXISTS `postlikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recados`
--

DROP TABLE IF EXISTS `recados`;
CREATE TABLE IF NOT EXISTS `recados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userfas`
--

DROP TABLE IF EXISTS `userfas`;
CREATE TABLE IF NOT EXISTS `userfas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userrelations`
--

DROP TABLE IF EXISTS `userrelations`;
CREATE TABLE IF NOT EXISTS `userrelations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sobrenome` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'avatar.jpg',
  `cover` varchar(100) NOT NULL DEFAULT 'cover.jpg',
  `sexo` int(1) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `geral_relacionamento` tinyint(2) DEFAULT NULL,
  `geral_interamigos` tinyint(1) DEFAULT 0,
  `geral_intercompanheiros` tinyint(1) DEFAULT NULL,
  `geral_intercontatos` tinyint(1) DEFAULT NULL,
  `geral_internamoro` tinyint(1) DEFAULT NULL,
  `geral_intertipo` tinyint(2) DEFAULT NULL,
  `social_filhos` tinyint(1) DEFAULT NULL,
  `social_orientsexual` tinyint(3) DEFAULT NULL,
  `social_estilo` varchar(100) DEFAULT NULL,
  `social_fumo` tinyint(1) DEFAULT NULL,
  `social_bebo` tinyint(1) DEFAULT NULL,
  `social_aniestimacao` tinyint(1) DEFAULT NULL,
  `social_cidadenatal` varchar(100) DEFAULT NULL,
  `social_paginaweb` varchar(100) DEFAULT NULL,
  `social_quemsou` varchar(100) DEFAULT NULL,
  `social_paixoes` varchar(100) DEFAULT NULL,
  `social_esportes` varchar(100) DEFAULT NULL,
  `social_atividades` varchar(100) DEFAULT NULL,
  `social_livros` varchar(100) DEFAULT NULL,
  `social_musica` varchar(100) DEFAULT NULL,
  `social_prodetv` varchar(100) DEFAULT NULL,
  `social_gastronomicas` varchar(100) DEFAULT NULL,
  `contato_residencial` varchar(100) DEFAULT NULL,
  `contato_celular` varchar(100) DEFAULT NULL,
  `contato_endereco1` varchar(100) DEFAULT NULL,
  `contato_endereco2` varchar(100) DEFAULT NULL,
  `contato_cep` varchar(100) DEFAULT NULL,
  `contato_pais` varchar(100) DEFAULT NULL,
  `profis_escolaridade` varchar(100) DEFAULT NULL,
  `profis_ensinomedio` varchar(100) DEFAULT NULL,
  `profis_faculdade` varchar(100) DEFAULT NULL,
  `profis_curso` varchar(100) DEFAULT NULL,
  `profis_diploma` varchar(100) DEFAULT NULL,
  `profis_ano` varchar(100) DEFAULT NULL,
  `profis_profissao` varchar(100) DEFAULT NULL,
  `profis_setor` varchar(100) DEFAULT NULL,
  `profis_empresa` varchar(100) DEFAULT NULL,
  `pessoal_titulo` varchar(100) DEFAULT NULL,
  `pessoal_atencao` varchar(100) DEFAULT NULL,
  `pessoal_altura` varchar(100) DEFAULT NULL,
  `pessoal_olhos` varchar(100) DEFAULT NULL,
  `pessoal_cabelo` varchar(100) DEFAULT NULL,
  `pessoal_fisico` varchar(100) DEFAULT NULL,
  `pessoal_corpo` varchar(100) DEFAULT NULL,
  `pessoal_aparencia` varchar(100) DEFAULT NULL,
  `pessoal_gostoemmim` varchar(100) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `frase` varchar(100) DEFAULT NULL,
  `somamigos` int(11) DEFAULT 0,
  `somarcomunidades` int(11) NOT NULL DEFAULT 0,
  `somarcomunidadesdono` int(11) DEFAULT 0,
  `somaseguidores` int(11) NOT NULL DEFAULT 0,
  `somafas` int(11) NOT NULL DEFAULT 0,
  `somafotos` int(11) DEFAULT 0,
  `somarecados` int(11) DEFAULT 0,
  `somastatus` int(11) NOT NULL DEFAULT 0,
  `somavideos` int(11) NOT NULL DEFAULT 0,
  `somadepoimentos` int(11) DEFAULT 0,
  `somadepoescrito` int(11) DEFAULT 0,
  `votosexys` float DEFAULT 0,
  `votoconfiavel` float DEFAULT 0,
  `votolegal` float DEFAULT 0,
  `viewscraps` int(11) DEFAULT 0,
  `write_scraps` int(11) DEFAULT 0,
  `viewphotos` int(11) DEFAULT 0,
  `viewvideo` int(11) DEFAULT 0,
  `viewtestimonialreceived` int(11) DEFAULT 0,
  `viewtestimonialwrote` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titulo_video` varchar(100) NOT NULL,
  `id_video` varchar(100) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votoconfiavels`
--

DROP TABLE IF EXISTS `votoconfiavels`;
CREATE TABLE IF NOT EXISTS `votoconfiavels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votolegals`
--

DROP TABLE IF EXISTS `votolegals`;
CREATE TABLE IF NOT EXISTS `votolegals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votosexys`
--

DROP TABLE IF EXISTS `votosexys`;
CREATE TABLE IF NOT EXISTS `votosexys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
