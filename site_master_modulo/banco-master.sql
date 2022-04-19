-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para master_radios
CREATE DATABASE IF NOT EXISTS `master_radios` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `master_radios`;

-- Copiando estrutura para tabela master_radios.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `matricula_func` int(11) NOT NULL,
  `nome_func` varchar(50) DEFAULT NULL,
  `login_func` varchar(15) DEFAULT NULL,
  `senha_func` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`matricula_func`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela master_radios.funcionario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`matricula_func`, `nome_func`, `login_func`, `senha_func`) VALUES
	(101, 'Karoline da Silva', 'karol', '4667'),
	(104, 'Maylon Henrique de Oliveira', 'maylon', '4667');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela master_radios.tarefas
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `data_tarefa` datetime DEFAULT NULL,
  `nome_tarefa` varchar(50) DEFAULT NULL,
  `descricao_tarefa` varchar(100) DEFAULT NULL,
  `urgencia_tarefa` varchar(10) DEFAULT NULL,
  `criador_tarefa` varchar(20) DEFAULT NULL,
  `grau_conclusao` int(11) DEFAULT 0,
  `finalizado_tarefa` varchar(100) DEFAULT '',
  PRIMARY KEY (`id_tarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela master_radios.tarefas: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` (`id_tarefa`, `data_tarefa`, `nome_tarefa`, `descricao_tarefa`, `urgencia_tarefa`, `criador_tarefa`, `grau_conclusao`, `finalizado_tarefa`) VALUES
	(7, '2022-04-11 12:18:44', 'Bateria Enaex colocar', 'Visita técnica na enaex para colocar a bateria na repetidora', 'Leve', 'ANIBAL', 5, 'MAYLO, TESTE, TESTE, KAROL, MAYLON'),
	(8, '2022-04-11 15:32:18', 'Revisão dos rádios DGM devolução Armac', 'Revisar e limpar todos os rádios DGM devolvidos pela armac', 'Leve', 'EMILY', 1, ', KAROL'),
	(9, '2022-04-11 15:33:16', 'Devolução de 1 rádio DGP8050e do Lima', 'Devolução de 1 rádio DGP8050e do Lima', 'Leve', 'ANIBAL', 0, ''),
	(10, '2022-04-11 15:33:57', 'Manutenção Integral Médica', 'Relizar manutenção nos rádios DTR620 da Integral Médica', 'Alta', 'ELIANA', 1, ', MAYLON'),
	(11, '2022-04-11 15:34:54', 'Manutenção FCA', 'Relizar manutenção nos rádios DGP8050 da FCA Cubatão', 'Alta', 'KAROL', 2, ', TESTE, MAYLON'),
	(12, '2022-04-11 15:37:18', 'Mobilização FCA (Leticia)', 'Mobilizar 4 DEP450 VHF com frequencia da ferrovia, com mais 3 baterias reserva', 'Moderada', 'MAYLON', 5, 'MAYLON, NORTON, TESTE, MAYLON, MAYLON'),
	(13, '2022-04-12 09:00:59', 'TESTE', 'TESTANDO', 'Urgente', 'MAYLON', 4, ', TESTE, MAYLON, MAYLON, KAROL'),
	(16, '2022-04-12 09:53:36', 'Substituição Neovias', 'Substituir 4 rádios EP450 que foram emprestados', 'Leve', 'KAROL', 5, ', KAROL, KAROL, KAROL, MAYLON, MAYLON'),
	(17, '2022-04-13 09:52:10', 'devolução 30 radios WM', 'devolução 30 radios WM', 'Alta', 'MAYLON', 1, ', MAYLON'),
	(18, '2022-04-13 10:02:07', 'Teste Repetidora CHIMBINHA', 'Teste Repetidora CHIMBINHA', 'Urgente', 'MAYLON', 0, '');
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
