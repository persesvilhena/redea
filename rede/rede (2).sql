-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.15
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `rede`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nomefoto` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`id`, `nomefoto`, `us`, `usn`, `nome`) VALUES
(12, '', '4', 'perses', '4c6012bc47c5a1c799053f8a095e147a.gif'),
(11, '', '6', 'Leonardo', '9c7f922452bd53e966269a50dd5e4fd1.jpg'),
(5, 'fotas', '4', 'Perses', 'foto5.jpg'),
(6, 'fotas', '4', 'Perses', 'foto6.jpg'),
(9, 'php', '4', 'perses', '884df7bbafd971417456289d862093df.jpeg'),
(10, 'a real', '4', 'perses', 'fc99778017a08ca3b8aa1311cc6c6cc5.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us1` varchar(255) NOT NULL,
  `us2` varchar(255) NOT NULL,
  `us1name` varchar(255) NOT NULL,
  `us2name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`id`, `us1`, `us2`, `us1name`, `us2name`) VALUES
(15, '4', '10', 'perses', 'mauro'),
(16, '10', '4', 'mauro', 'perses'),
(19, '15', '15', 'teste1', 'teste1'),
(18, '4', '4', 'perses', 'perses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `com_news`
--

CREATE TABLE IF NOT EXISTS `com_news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `newsid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `com_news`
--

INSERT INTO `com_news` (`id`, `us`, `usn`, `msg`, `newsid`) VALUES
(1, '4', 'perses', 'teste', '2'),
(2, '4', 'perses', 'porra, funcionaaaaaa', '2'),
(3, '4', 'perses', 'teste', '1'),
(4, '4', 'perses', 'teste', '3'),
(5, '4', 'perses', 'novo', '3'),
(6, '4', 'perses', 'testando site....', '3'),
(7, '4', 'perses', 'teste', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `com_post`
--

CREATE TABLE IF NOT EXISTS `com_post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `com` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `com_post`
--

INSERT INTO `com_post` (`id`, `uid`, `us`, `usn`, `com`) VALUES
(1, '5', '10', 'mauro sergio', 'dasdasda'),
(2, '5', '10', 'mauro sergio', 'testa'),
(3, '5', '4', 'Perses', 'asdsada'),
(4, '5', '4', 'Perses', 'fdsfsdfs'),
(5, '1', '4', 'Perses', 'asdasdas'),
(6, '1', '4', 'Perses', 'asdasda'),
(7, '1', '4', 'Perses', 'sdasd'),
(8, '8', '6', 'Leonardo', 'dfsfds'),
(9, '12', '4', 'perses', 'teste'),
(10, '12', '4', 'perses', 'asdasdasd'),
(11, '12', '4', 'perses', 'z\\\\mnbjzhxb c\\\\jzczx'),
(12, '13', '15', 'teste1', 'teste'),
(13, '12', '4', 'perses', 'dsfsds'),
(14, '11', '4', 'perses', 'adasdas'),
(15, '11', '4', 'perses', 'adasdas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `msg`) VALUES
(1, 'perses', 'persesvilhena@gmail.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite`
--

CREATE TABLE IF NOT EXISTS `convite` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `deid` varchar(255) NOT NULL,
  `paraid` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite1`
--

CREATE TABLE IF NOT EXISTS `convite1` (
  `deid` varchar(255) NOT NULL,
  `paraid` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`deid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convite1`
--

INSERT INTO `convite1` (`deid`, `paraid`, `desc`, `nome`) VALUES
('4', '4', 'aaaa', 'perses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convite2`
--

CREATE TABLE IF NOT EXISTS `convite2` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `deid` varchar(255) NOT NULL,
  `paraid` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `nome1` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `convite2`
--

INSERT INTO `convite2` (`id`, `deid`, `paraid`, `descricao`, `nome1`, `nome`) VALUES
(21, '4', '10', '', 'perses', 'perses'),
(23, '4', '4', '', 'perses', 'perses'),
(24, '10', '13', '', 'mauro', 'mauro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `del`
--

CREATE TABLE IF NOT EXISTS `del` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us1` varchar(255) NOT NULL,
  `us2` varchar(255) NOT NULL,
  `us1name` varchar(255) NOT NULL,
  `us2name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `erros`
--

CREATE TABLE IF NOT EXISTS `erros` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `erro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `erros`
--

INSERT INTO `erros` (`id`, `nome`, `email`, `erro`) VALUES
(1, 'perses', 'persesvilhena@gmail.com', 'nenhum erro'),
(2, 'teste', 'aaaaaaaaa', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `facebookfake`
--

CREATE TABLE IF NOT EXISTS `facebookfake` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `nomearquivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`id`, `nome`, `foto`) VALUES
(11, '4', '51d94a88807953398fff4eb6015f0207.jpeg'),
(12, '6', '16e39c81e3c5e22238d81ecea6d3c7c4.jpg'),
(13, '13', 'semfoto.jpeg'),
(16, '10', 'b5ed18abcf324099ee8518a95e87db41.jpg'),
(18, '14', 'c7369173eba9a8cc9d29bd022b6aa300.jpg'),
(19, '15', 'semfoto.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `deid` varchar(255) DEFAULT NULL,
  `paraid` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id`, `deid`, `paraid`, `assunto`, `msg`, `nome`) VALUES
(2, '14', '10', 'eeeeeeee', 'terjinhu, eu sou gayy', 'silas'),
(3, '14', '6', 'assunta', 'aiii', 'silas'),
(4, '4', '4', 'aaaaaaaa', 'aaaaaaaa', 'perses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `nome`, `autor`, `msg`) VALUES
(1, 'persesteste', 'perses', 'msg'),
(2, 'novo', 'perses', 'msg'),
(3, 'novoo', 'perses', 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `us` varchar(255) DEFAULT NULL,
  `usn` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `us`, `usn`, `msg`, `assunto`) VALUES
(13, '15', 'teste1', 'coisa', 'qurque'),
(12, '10', 'mauro', 'aaaaaaaaaaaaaa', 'postar'),
(11, '4', 'perses', 'negrito\r\nteste', 'aaaaaaaa'),
(10, '4', 'perses', 'zczxcaaaa', 'dasdsa'),
(9, '4', 'perses', 'teste teste\r\n', 'aaaaaaaaaaaaa'),
(8, '6', 'Leonardo', 'aaaaaaaa', 'teste'),
(14, '4', 'perses', 'testando', 'teste'),
(15, '4', 'perses', 'aaaaaaaa', 'novo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `shows`
--

INSERT INTO `shows` (`id`, `data`, `local`, `preco`) VALUES
(1, '23/12/2011', 'Muzambinho,CENTRO', 'gratuito'),
(2, '30/12/2011', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `speed_hero`
--

CREATE TABLE IF NOT EXISTS `speed_hero` (
  `pointgain` text NOT NULL,
  `uid` text NOT NULL,
  `heroname` text NOT NULL,
  `type` text NOT NULL,
  `healthofhero` text NOT NULL,
  `timetoborn` text NOT NULL,
  `hero` text NOT NULL,
  `attackpower` text NOT NULL,
  `defpower` text NOT NULL,
  `attackbonus` text NOT NULL,
  `defbonus` text NOT NULL,
  `regspeed` text NOT NULL,
  `pointused` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `nome`, `msg`, `data`) VALUES
(1, 'perses', 'teste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE IF NOT EXISTS `topicos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usautor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `nome`, `autor`, `data`, `descricao`, `usautor`) VALUES
(1, 'teste', '', '20:51:23 - 30/01/2012', 'aaaaaa', NULL),
(2, 'novo topico', 'Perses/>\r\n        \r\n      \r\n      \r\n        \r\n        \r\n          ', '', 'aaaaaaaa', ''),
(3, 'teste2', 'Perses', '', 'aaaaaaa', '4/>\r\n        \r\n      \r\n      \r\n        \r\n        \r\n          '),
(4, 'teste3', 'Perses', '17:11:30 - 31/01/2012', 'aaaaaaaaa', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome1` varchar(255) NOT NULL,
  `descricao1` varchar(255) NOT NULL,
  `nome2` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `users1`
--

INSERT INTO `users1` (`id`, `nome`, `senha`, `email`, `nome1`, `descricao1`, `nome2`, `foto`) VALUES
(4, 'perses', 'teste', 'persesvilhena@gmail.com', 'Perses', 'PHP', 'De Vilhena', 'f9f144c616e56c924c8611e74875ee77.jpeg'),
(6, 'Leonardo', 'pepigay', 'leo_bjc@yahoo.com.br', '<span class=adm><strong>Leonardo</strong></span>', 'Irm?o do Perses', '<span class=adm><strong>Vilhena</strong></span>', '6e8425d99ff3818acec8bbba9bd11d6c.jpg'),
(7, 'Paula', '123456', 'aninha-muz@hotmail.com', 'Anna Paula Guida', 'nada', '', 'anon/anon.jpg'),
(8, 'perses1', 'teste', 'aaaaaaaaaaaaaaa1', 'azaaaaaaaaaaa', 'aaaaaaaaaaa', '', 'anon/anon.jpg'),
(9, 'teste', 'senha', '$email', '$nome1', '$descricao1', '$nome2', 'anon/anon.jpg'),
(10, 'mauro', '2587', 'num tem', 'mauro sergio', 'fofinho e boin', 'almeida bueno filho', 'anon/anon.jpg'),
(11, 'nariz', '123', 'matheusa', 'matheusa', 'aaaa', 'gay', 'anon/anon.jpg'),
(12, 'pepi', 'pepi', 'silviaantoniaguida@gmail.com', '<span class=adm><strong>Silvia</strong></span>', 'mamae', '<span class=adm><strong>Guida</strong></span>', 'anon/anon.jpg'),
(13, 'novouser', 'teste', 'persesvilhena01@gmail.com', 'Teste', 'nenhum', 'teste', 'anon/anon.jpg'),
(14, 'silas', 'gay', 'gay', '<h3>Silas', 'muito Gay', 'Gay', 'anon/anon.jpg'),
(15, 'teste1', 'teste', 'email', 'Perses', 'NENHUMA', 'Vilhena', 'anon/anon.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
