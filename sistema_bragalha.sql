-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2018 às 22:51
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_bragalha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(45) NOT NULL,
  `nome_cliente` varchar(110) NOT NULL,
  `telefone_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf_cliente`, `email_cliente`, `nome_cliente`, `telefone_cliente`) VALUES
('camila@mail.com', 'camila@mail.com', 'Camilha', 2147483647),
('93498293', 'mail@mail', 'Camis', 384239482),
('1984985761', 'abc@mail.com', 'Acb', 2147483647),
('95848973287', 'mail@mail.com.br', 'Camila Sousa', 2147483647),
('38348453881', 'camila.s.rizzi@gmail.com', 'Camila Rizzi', 1197564664);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_exames`
--

CREATE TABLE `resultado_exames` (
  `nome_paciente` varchar(110) NOT NULL,
  `especialidade_exame` varchar(100) NOT NULL,
  `dt_exame` date NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `cpf_paciente` varchar(15) NOT NULL,
  `file_uploaded` varchar(200) NOT NULL,
  `dt_upload` date NOT NULL,
  `medico_exame` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resultado_exames`
--

INSERT INTO `resultado_exames` (`nome_paciente`, `especialidade_exame`, `dt_exame`, `file_name`, `cpf_paciente`, `file_uploaded`, `dt_upload`, `medico_exame`) VALUES
('Camila Rizzi', 'Elastografia Hepatica', '0000-00-00', 'Camila Rizzi-Camila_Sousa_Rizzi_resume.pdf', '38348453881', 'Web/aprovacao/bragalhaCamila Rizzi-Camila_Sousa_Rizzi_resume.pdf', '2018-05-18', 'Rodrigo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
