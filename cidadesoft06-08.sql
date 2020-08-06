-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2020 às 19:13
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cidadesoft`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicional_osped`
--

CREATE TABLE `adicional_osped` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_item` int(11) NOT NULL DEFAULT 0,
  `Cod_Ref` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Qtd_Alterar` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `Cod_Item_Dev` int(11) NOT NULL DEFAULT 0,
  `Cod_Ref_Dev` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qtd_Dev` decimal(10,4) NOT NULL DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adicional_osped`
--

INSERT INTO `adicional_osped` (`Codigo`, `user_id`, `Cod_item`, `Cod_Ref`, `Descricao`, `Valor`, `Qtd_Alterar`, `Cod_Item_Dev`, `Cod_Ref_Dev`, `Qtd_Dev`) VALUES
(1, 2, 1212, '121212', 'erro na venda', '100.00', '2.0000', 1212, '121212', '2.0000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto_remessa`
--

CREATE TABLE `boleto_remessa` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Numero_Rem` int(11) NOT NULL,
  `Data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Arquivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Conv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `boleto_remessa`
--

INSERT INTO `boleto_remessa` (`Codigo`, `user_id`, `Numero_Rem`, `Data`, `Hora`, `Arquivo`, `Cod_Conv`) VALUES
(1, 2, 100001, '2020-06-25', '09:48:45', 'desktop', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto_titulo`
--

CREATE TABLE `boleto_titulo` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Sel` int(11) NOT NULL DEFAULT 0,
  `Cod_Conta` int(11) NOT NULL DEFAULT 0,
  `Data_Doc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vencimento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nro_Doc` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nosso_Num` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Msg_1` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Msg_2` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Msg_3` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Inst_1` int(11) DEFAULT 0,
  `Inst_2` int(11) DEFAULT 0,
  `Multa` decimal(3,2) NOT NULL DEFAULT 0.00,
  `Taxa_Juros` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Acrescimo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Cod_CliFor` int(11) NOT NULL DEFAULT 0,
  `Cod_NF` int(11) DEFAULT 0,
  `Cod_CtaRec` int(11) DEFAULT 0,
  `Data_Bai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_Liq` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Situacao` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `Cod_Rem` int(11) DEFAULT 0,
  `Transacao` int(11) NOT NULL DEFAULT 0,
  `Empresa` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `boleto_titulo`
--

INSERT INTO `boleto_titulo` (`Codigo`, `user_id`, `Sel`, `Cod_Conta`, `Data_Doc`, `Vencimento`, `Nro_Doc`, `Nosso_Num`, `Valor`, `Msg_1`, `Msg_2`, `Msg_3`, `Inst_1`, `Inst_2`, `Multa`, `Taxa_Juros`, `Acrescimo`, `Desconto`, `Cod_CliFor`, `Cod_NF`, `Cod_CtaRec`, `Data_Bai`, `Data_Liq`, `Situacao`, `Cod_Rem`, `Transacao`, `Empresa`) VALUES
(4, 1, 0, 0, '2020-08-05', '2020-08-07', '123', '123', '0.00', '123', '123', '123', 123, 123, '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, '2020-08-08', '2020-08-08', 'C', 0, 33, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_osped`
--

CREATE TABLE `categoria_osped` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Descricao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria_osped`
--

INSERT INTO `categoria_osped` (`Codigo`, `user_id`, `Descricao`) VALUES
(1, 2, 'Categoria1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_custo`
--

CREATE TABLE `centro_custo` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Descricao` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `centro_custo`
--

INSERT INTO `centro_custo` (`Codigo`, `user_id`, `Descricao`) VALUES
(1, 2, 'Centro1'),
(2, 1, 'Centro12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cest`
--

CREATE TABLE `cest` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `CEST` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NCM` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cest`
--

INSERT INTO `cest` (`Codigo`, `user_id`, `CEST`, `NCM`, `Descricao`) VALUES
(1, 2, 'cest1', '12', 'cest1'),
(6, 1, 'cest2', '12', 'cest2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clifor`
--

CREATE TABLE `clifor` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Class_ABC` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `Tip` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `Ativo` int(11) NOT NULL DEFAULT 1,
  `Data_Cadastro` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fis_Jur` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `Razao_Social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nome_Fantasia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Data_Nascimento` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado_Civil` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sexo` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CNPJ` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IE` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IEST` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IM` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RG` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Operadora1` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Celular` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Operadora2` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comercial` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Operadora3` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cli_Atacado` int(11) NOT NULL DEFAULT 0,
  `Perfil` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Profissao` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SitFinanc` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `LimiCred` decimal(10,2) DEFAULT 0.00,
  `PercDescAcresc` decimal(3,2) DEFAULT 0.00,
  `Vendedor` int(10) UNSIGNED NOT NULL,
  `Local_UltMov` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_UltMov` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aviso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Empresa` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clifor`
--

INSERT INTO `clifor` (`Codigo`, `user_id`, `Class_ABC`, `Tip`, `Ativo`, `Data_Cadastro`, `Fis_Jur`, `Razao_Social`, `Nome_Fantasia`, `Data_Nascimento`, `Estado_Civil`, `Sexo`, `CNPJ`, `IE`, `IEST`, `IM`, `CPF`, `RG`, `Telefone`, `Operadora1`, `Celular`, `Operadora2`, `Comercial`, `Operadora3`, `Email`, `Site`, `Cli_Atacado`, `Perfil`, `Profissao`, `SitFinanc`, `LimiCred`, `PercDescAcresc`, `Vendedor`, `Local_UltMov`, `Data_UltMov`, `Observacoes`, `Aviso`, `Empresa`) VALUES
(1, 2, 'A', 'C', 1, '16/06/2020', 'F', NULL, 'ACME', NULL, NULL, '0', '72.992.431/0001-92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Consumidor', NULL, 'L', '0.00', '0.00', 4, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clifor_contato`
--

CREATE TABLE `clifor_contato` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Setor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Data_Nasc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RG` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Celular` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clifor_contato`
--

INSERT INTO `clifor_contato` (`Codigo`, `Cod_CliFor`, `user_id`, `Tipo`, `Setor`, `Nome`, `Data_Nasc`, `RG`, `CPF`, `Celular`, `Email`) VALUES
(1, 1, 2, 'Pai', 'Financeiro', 'Dath Vader 29653927850', '20/12/1930', '8888888888888', '29653927850', '42-99999-9999', 'dath@darth.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clifor_endereco`
--

CREATE TABLE `clifor_endereco` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `CEP` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tipo_Endereco` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `Endereco` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Bairro` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Complemento` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ponto_Referencia` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_IBGE` int(11) DEFAULT NULL,
  `Cidade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clifor_endereco`
--

INSERT INTO `clifor_endereco` (`Codigo`, `Cod_CliFor`, `user_id`, `CEP`, `Tipo_Endereco`, `Endereco`, `Numero`, `Bairro`, `Complemento`, `Ponto_Referencia`, `Cod_IBGE`, `Cidade`, `Estado`) VALUES
(1, 1, 2, '85040130', 'E', 'Rua Francisco Carneiro Martins', 33, 'Vila Carli', 'a', 'logo ali', 4109401, 'Guarapuava', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clifor_referencia`
--

CREATE TABLE `clifor_referencia` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Loja_Banco` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Conta` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ult_Compra` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Valor_UltCompra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Limite` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clifor_referencia`
--

INSERT INTO `clifor_referencia` (`Codigo`, `Cod_CliFor`, `user_id`, `Loja_Banco`, `Conta`, `Telefone`, `Ult_Compra`, `Valor_UltCompra`, `Limite`) VALUES
(1, 1, 2, 'C&A', '145278', '42-3333-3333', '25/06/2020', '29.90', '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_cadastro`
--

CREATE TABLE `conta_cadastro` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Descricao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Banco` int(11) NOT NULL DEFAULT 0,
  `Dig_Banco` int(11) NOT NULL DEFAULT 0,
  `Nome_Banco` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Banco_Cob` int(15) DEFAULT NULL,
  `Dig_Banco_Cob` int(11) NOT NULL DEFAULT 0,
  `Praca` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Age` int(11) NOT NULL DEFAULT 0,
  `Dig_Age` int(11) NOT NULL DEFAULT 0,
  `CC` int(11) NOT NULL DEFAULT 0,
  `Digito` int(11) NOT NULL DEFAULT 0,
  `Tipo_Conta` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `Tipo_Cobranca` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_Cedente` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Convenio` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Carteira` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Uso_Bco` int(11) DEFAULT NULL,
  `Cod_Moeda` int(11) NOT NULL DEFAULT 9,
  `Especie` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'R$',
  `Especie_Doc` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DM',
  `Aceite` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `Local_Pgto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PAGAVEL EM QUALQUER BANCO ATE O VENCIMENTO',
  `Dias_Desc` int(11) DEFAULT 0,
  `Perc_Desc` decimal(3,2) DEFAULT 0.00,
  `Perc_Multa` decimal(3,2) DEFAULT 0.00,
  `Perc_Juros` decimal(3,2) DEFAULT 0.00,
  `Dias_AvisoProt` int(11) DEFAULT 0,
  `Dias_Prot` int(11) DEFAULT 0,
  `Tx_Emissao` decimal(3,2) DEFAULT 0.00,
  `Empresa` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conta_cadastro`
--

INSERT INTO `conta_cadastro` (`Codigo`, `user_id`, `Descricao`, `Cod_Banco`, `Dig_Banco`, `Nome_Banco`, `Cod_Banco_Cob`, `Dig_Banco_Cob`, `Praca`, `Cod_Age`, `Dig_Age`, `CC`, `Digito`, `Tipo_Conta`, `Tipo_Cobranca`, `Cod_Cedente`, `Convenio`, `Carteira`, `Uso_Bco`, `Cod_Moeda`, `Especie`, `Especie_Doc`, `Aceite`, `Local_Pgto`, `Dias_Desc`, `Perc_Desc`, `Perc_Multa`, `Perc_Juros`, `Dias_AvisoProt`, `Dias_Prot`, `Tx_Emissao`, `Empresa`) VALUES
(1, 2, 'Conta Principal', 22, 2, 'BB', 231, 2, 'Gothan', 2131, 8, 20345, 8, 'B', 'BB', NULL, NULL, NULL, NULL, 9, 'R$', 'DM', 'N', 'PAGÁVEL EM QUALQUER BANCO ATE O VENCIMENTO', 0, '0.00', '0.00', '0.00', 0, 0, '0.00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_fluxo`
--

CREATE TABLE `conta_fluxo` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_Conta` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Saldo` decimal(10,2) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conta_fluxo`
--

INSERT INTO `conta_fluxo` (`Codigo`, `user_id`, `Cod_Conta`, `Data`, `Saldo`, `Empresa`) VALUES
(2, 1, 1, '2020-07-27', '10.50', 2),
(3, 2, 1, '2020-07-26', '150.00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_movimento`
--

CREATE TABLE `conta_movimento` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `Especie` int(11) NOT NULL DEFAULT 0,
  `Documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NFF',
  `Num_Doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Clifor` int(11) NOT NULL,
  `Nome_Clifor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Historico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Operador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `Cod_Conta` int(11) NOT NULL,
  `Cod_Conta_Saldo` int(11) NOT NULL,
  `Plano_Ctas` int(11) NOT NULL,
  `Centro_Custo` int(11) NOT NULL,
  `Transacao` int(11) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conta_movimento`
--

INSERT INTO `conta_movimento` (`Codigo`, `user_id`, `data_id`, `Especie`, `Documento`, `Num_Doc`, `Cod_Clifor`, `Nome_Clifor`, `Historico`, `Valor`, `Operador`, `Cod_Conta`, `Cod_Conta_Saldo`, `Plano_Ctas`, `Centro_Custo`, `Transacao`, `Empresa`) VALUES
(1, 2, 1, 2, 'REC', '12345', 1, 'ACME', 'venda', '1000.00', 'C', 1, 1, 0, 1, 35, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_saldo`
--

CREATE TABLE `conta_saldo` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Turno` int(11) NOT NULL DEFAULT 1,
  `Cod_Fun` int(11) NOT NULL,
  `Saldo_Inicial` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Ent` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Sai` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Saldo_Final` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Dinheiro` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Cheque` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Cartao` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Total_Duplicata` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Situacao` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `Cod_Conta` int(10) UNSIGNED NOT NULL,
  `Empresa` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conta_saldo`
--

INSERT INTO `conta_saldo` (`Codigo`, `Data`, `Turno`, `Cod_Fun`, `Saldo_Inicial`, `Total_Ent`, `Total_Sai`, `Saldo_Final`, `Total_Dinheiro`, `Total_Cheque`, `Total_Cartao`, `Total_Duplicata`, `Situacao`, `Cod_Conta`, `Empresa`) VALUES
(1, '2020-06-16 09:14:27', 1, 2, '0.00', '1000.00', '0.00', '1000.00', '0.00', '1000.00', '0.00', '0.00', 'A', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(11) NOT NULL DEFAULT 0,
  `Dia_Venc` int(11) NOT NULL DEFAULT 0,
  `Parceria` int(11) NOT NULL DEFAULT 0,
  `Parceiro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Perc_Comissao` decimal(3,2) NOT NULL,
  `Data` date NOT NULL,
  `Tipo_Cob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Convenio` int(11) NOT NULL DEFAULT 0,
  `Valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`Codigo`, `user_id`, `Cod_CliFor`, `Dia_Venc`, `Parceria`, `Parceiro`, `Perc_Comissao`, `Data`, `Tipo_Cob`, `Convenio`, `Valor`, `Observacoes`) VALUES
(1, 2, 1, 20, 1, 'SONY', '2.00', '2020-06-10', 'Boleto', 2, '10000.00', 'cheque nominal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenio`
--

CREATE TABLE `convenio` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Convenio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comissao` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `convenio`
--

INSERT INTO `convenio` (`Codigo`, `user_id`, `Convenio`, `Comissao`) VALUES
(1, 2, 'Convenio1', '12.00'),
(2, 2, 'Convenio2', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cotacao`
--

CREATE TABLE `cotacao` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Moeda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Data` date NOT NULL,
  `Cotacao` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cotacao`
--

INSERT INTO `cotacao` (`Codigo`, `user_id`, `Moeda`, `Data`, `Cotacao`) VALUES
(1, 2, 'Dolar', '2020-06-24', '5.31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ctas_pagar`
--

CREATE TABLE `ctas_pagar` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Sel` int(11) NOT NULL DEFAULT 0,
  `Num_Doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parcela` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Clifor` int(11) NOT NULL,
  `Forma_Pag` int(11) NOT NULL,
  `Cond_Pag` int(11) NOT NULL,
  `Data_Entrada` date NOT NULL,
  `Vencimento` date NOT NULL,
  `Data_Juros` date NOT NULL,
  `Valor_Origem` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Valor_Divida` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Multa` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Taxa_Juros` decimal(3,2) NOT NULL DEFAULT 0.00,
  `Desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Juros` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Divida_Estimada` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Origem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Local_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_Boleto` int(11) DEFAULT NULL,
  `Nosso_Numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Linha_Digitavel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NF` int(11) DEFAULT NULL,
  `Credito` int(11) NOT NULL DEFAULT 0,
  `Transacao` int(11) NOT NULL,
  `Plano_Ctas` int(11) DEFAULT NULL,
  `Centro_Custo` int(11) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ctas_pagar`
--

INSERT INTO `ctas_pagar` (`Codigo`, `user_id`, `Sel`, `Num_Doc`, `Parcela`, `Cod_Clifor`, `Forma_Pag`, `Cond_Pag`, `Data_Entrada`, `Vencimento`, `Data_Juros`, `Valor_Origem`, `Valor_Divida`, `Multa`, `Taxa_Juros`, `Desconto`, `Juros`, `Divida_Estimada`, `Origem`, `Local_Pag`, `Observacoes`, `Cod_Boleto`, `Nosso_Numero`, `Linha_Digitavel`, `NF`, `Credito`, `Transacao`, `Plano_Ctas`, `Centro_Custo`, `Empresa`) VALUES
(1, 2, 0, '123456', '01/03', 1, 1, 1, '2020-06-24', '2020-06-25', '2020-06-26', '1000.00', '1500.00', '1.00', '2.00', '2.00', '2.00', '500.00', 'n-1110000', 'CX', 'teste dev', 1, '333333', '10000004564562137653123123', 0, 1, 22, 0, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ctas_pagas`
--

CREATE TABLE `ctas_pagas` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_Conta` int(11) NOT NULL,
  `Num_Doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Parcela` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_Clifor` int(11) DEFAULT NULL,
  `Forma_Pag` int(11) DEFAULT NULL,
  `Cond_Pag` int(11) DEFAULT NULL,
  `Data_Pagto` date DEFAULT NULL,
  `Data_Baixa` date DEFAULT NULL,
  `Tipo_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Valor_Origem` decimal(10,2) DEFAULT 0.00,
  `Valor_Pago` decimal(10,2) DEFAULT 0.00,
  `Valor_Divida` decimal(10,2) DEFAULT 0.00,
  `Multa` decimal(10,2) DEFAULT 0.00,
  `Desconto` decimal(10,2) DEFAULT 0.00,
  `Juros` decimal(10,2) DEFAULT 0.00,
  `Origem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Local_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Num_DocCxBco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Recibo` int(11) DEFAULT NULL,
  `Plano_Ctas` int(11) DEFAULT NULL,
  `Centro_Custo` int(11) DEFAULT NULL,
  `Empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ctas_pagas`
--

INSERT INTO `ctas_pagas` (`Codigo`, `user_id`, `Cod_Conta`, `Num_Doc`, `Parcela`, `Cod_Clifor`, `Forma_Pag`, `Cond_Pag`, `Data_Pagto`, `Data_Baixa`, `Tipo_Pag`, `Valor_Origem`, `Valor_Pago`, `Valor_Divida`, `Multa`, `Desconto`, `Juros`, `Origem`, `Local_Pag`, `Num_DocCxBco`, `Observacoes`, `Recibo`, `Plano_Ctas`, `Centro_Custo`, `Empresa`) VALUES
(1, 2, 1, '12345', '01/02', 1, 1, 1, '2020-06-24', '2020-06-24', 'Total', '500.00', '500.00', '1000.00', '0.00', '0.00', '0.00', NULL, 'BCO', NULL, NULL, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ctas_receber`
--

CREATE TABLE `ctas_receber` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Sel` int(11) NOT NULL DEFAULT 0,
  `Num_Doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parcela` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Clifor` int(11) NOT NULL,
  `Forma_Pag` int(11) NOT NULL,
  `Cond_Pag` int(11) NOT NULL,
  `Data_Entrada` date NOT NULL,
  `Vencimento` date NOT NULL,
  `Data_Juros` date NOT NULL,
  `Valor_Origem` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Valor_Divida` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Multa` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Taxa_Juros` decimal(3,2) NOT NULL DEFAULT 0.00,
  `Desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Juros` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Divida_Estimada` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Origem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Local_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_Boleto` int(11) DEFAULT NULL,
  `Nosso_Numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Linha_Digitavel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NF` int(11) DEFAULT NULL,
  `Credito` int(11) NOT NULL DEFAULT 0,
  `Transacao` int(11) NOT NULL,
  `Plano_Ctas` int(11) DEFAULT NULL,
  `Centro_Custo` int(11) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ctas_receber`
--

INSERT INTO `ctas_receber` (`Codigo`, `user_id`, `Sel`, `Num_Doc`, `Parcela`, `Cod_Clifor`, `Forma_Pag`, `Cond_Pag`, `Data_Entrada`, `Vencimento`, `Data_Juros`, `Valor_Origem`, `Valor_Divida`, `Multa`, `Taxa_Juros`, `Desconto`, `Juros`, `Divida_Estimada`, `Origem`, `Local_Pag`, `Observacoes`, `Cod_Boleto`, `Nosso_Numero`, `Linha_Digitavel`, `NF`, `Credito`, `Transacao`, `Plano_Ctas`, `Centro_Custo`, `Empresa`) VALUES
(1, 2, 1, '12345 66', '01/03', 1, 1, 1, '2020-06-24', '2020-06-24', '2020-06-25', '1000.00', '50000.00', '2.00', '2.00', '2.00', '2.00', '49000.00', 'n-1110000', 'BCO', 'teste dev', 1, '333333', '10000004564562137653123123', 0, 1, 22, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ctas_recebidas`
--

CREATE TABLE `ctas_recebidas` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_Conta` int(11) NOT NULL,
  `Num_Doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Parcela` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_Clifor` int(11) DEFAULT NULL,
  `Forma_Pag` int(11) DEFAULT NULL,
  `Cond_Pag` int(11) DEFAULT NULL,
  `Data_Pagto` date DEFAULT NULL,
  `Data_Baixa` date DEFAULT NULL,
  `Tipo_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Valor_Origem` decimal(10,2) DEFAULT 0.00,
  `Valor_Pago` decimal(10,2) DEFAULT 0.00,
  `Valor_Divida` decimal(10,2) DEFAULT 0.00,
  `Multa` decimal(10,2) DEFAULT 0.00,
  `Desconto` decimal(10,2) DEFAULT 0.00,
  `Juros` decimal(10,2) DEFAULT 0.00,
  `Origem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Local_Pag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Num_DocCxBco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Recibo` int(11) DEFAULT NULL,
  `Plano_Ctas` int(11) DEFAULT NULL,
  `Centro_Custo` int(11) DEFAULT NULL,
  `Empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ctas_recebidas`
--

INSERT INTO `ctas_recebidas` (`Codigo`, `user_id`, `Cod_Conta`, `Num_Doc`, `Parcela`, `Cod_Clifor`, `Forma_Pag`, `Cond_Pag`, `Data_Pagto`, `Data_Baixa`, `Tipo_Pag`, `Valor_Origem`, `Valor_Pago`, `Valor_Divida`, `Multa`, `Desconto`, `Juros`, `Origem`, `Local_Pag`, `Num_DocCxBco`, `Observacoes`, `Recibo`, `Plano_Ctas`, `Centro_Custo`, `Empresa`) VALUES
(1, 2, 1, '12345', '01/03', 1, 1, 1, '2020-07-21', '2020-07-21', 'Total', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 'BCO', NULL, NULL, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_conta_movimento`
--

CREATE TABLE `data_conta_movimento` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Num_caixa` int(11) DEFAULT NULL,
  `Turno` int(11) DEFAULT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `data_conta_movimento`
--

INSERT INTO `data_conta_movimento` (`Codigo`, `user_id`, `Num_caixa`, `Turno`, `Data`) VALUES
(1, 2, 1, 2, '2020-06-16'),
(3, 1, 2, 1, '2020-06-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Razao_Social` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nome_Fantasia` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CEP` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Endereco` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Numero` int(10) UNSIGNED DEFAULT NULL,
  `Bairro` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cod_IBGE` int(10) UNSIGNED DEFAULT NULL,
  `Cidade` varchar(42) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Celular` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAX` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IM` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IE` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CNPJ` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Site` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Atividade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CNAE` int(11) DEFAULT NULL,
  `CliFor_Saida` int(11) DEFAULT NULL,
  `CliFor_Entrada` int(11) DEFAULT NULL,
  `Cfg_DataUltExec` date DEFAULT NULL,
  `Cfg_Ultbackup` date DEFAULT NULL,
  `Cfg_DirRel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_PreviewRel` int(11) NOT NULL DEFAULT 1,
  `Cfg_ImpOrcamento` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_ImpPedido` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_ImpOs` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_ImpNfe` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_ImpEtiq` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_ImpEtiqMod` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_TranSeq` int(10) UNSIGNED DEFAULT NULL,
  `Cfg_LembCliAniv` int(11) NOT NULL DEFAULT 0,
  `Cfg_PesqCep` int(11) NOT NULL DEFAULT 0,
  `Cfg_DirFotoProd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cfg_IdentChamada` int(11) NOT NULL DEFAULT 0,
  `Cfg_AtuPrecoPrazo` int(11) NOT NULL DEFAULT 1,
  `Cfg_PermDuplicar` int(11) NOT NULL DEFAULT 1,
  `SMTP_CorpoEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMTP_Serv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMTP_Porta` int(11) DEFAULT NULL,
  `SMTP_Usuario` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMTP_Senha` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMTP_Seguro` int(11) NOT NULL DEFAULT 1,
  `SMTP_SSL` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TLS',
  `SMTP_EmailCopia` int(11) NOT NULL DEFAULT 1,
  `WS_Plataforma` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WB_Endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WS_WSDL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WS_Usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WS_Senha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FTP_Endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FTP_Porta` int(11) DEFAULT NULL,
  `FTP_Usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FTP_Senha` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fin_CFixo` decimal(3,2) DEFAULT 0.00,
  `Fin_Desloc` decimal(3,2) DEFAULT 0.00,
  `Fin_Comissao` decimal(3,2) DEFAULT 0.00,
  `Fin_Lucro` decimal(3,2) DEFAULT 0.00,
  `Fin_Inad` decimal(3,2) DEFAULT 0.00,
  `Fin_DescPV` decimal(3,2) DEFAULT 0.00,
  `Fin_PerDano` decimal(3,2) DEFAULT 0.00,
  `Fin_JurosPadrao` decimal(3,2) DEFAULT 0.00,
  `Fin_MsgPadrao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fin_ControlaCaixa` int(11) NOT NULL DEFAULT 1,
  `Fin_MultaPadrao` decimal(3,2) DEFAULT 0.00,
  `Fin_ForImposto` int(11) NOT NULL DEFAULT 0,
  `Fin_ComiFrac` int(11) NOT NULL DEFAULT 0,
  `Fin_ContrComi` int(11) NOT NULL DEFAULT 0,
  `Fisc_Tributacao` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fisc_ICMS` decimal(3,2) DEFAULT 0.00,
  `Fisc_PIS` decimal(3,2) DEFAULT 0.00,
  `Fisc_COFINS` decimal(3,2) DEFAULT 0.00,
  `Fisc_ISSQN` decimal(3,2) DEFAULT 0.00,
  `Fisc_IRPJ` decimal(3,2) DEFAULT 0.00,
  `Fisc_CSLL` decimal(3,2) DEFAULT 0.00,
  `Fisc_Simples` decimal(3,2) DEFAULT 0.00,
  `Fisc_CFOP` int(11) NOT NULL DEFAULT 0,
  `Fisc_ICMSFixo` int(11) NOT NULL DEFAULT 0,
  `NFe_CertDig` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_WebServ` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT 'PR',
  `NFe_Ambiente` int(11) NOT NULL DEFAULT 2,
  `NFe_Proxy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_Porta` int(11) DEFAULT NULL,
  `NFe_Usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_Senha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_DirXML` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_FormaEmiss` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_Serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `NFe_Modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '55',
  `NFe_Versao` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT '3.1',
  `NFe_Orient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFe_Valida` int(11) NOT NULL DEFAULT 1,
  `NFe_Obs` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFCe_Ambiente` int(11) NOT NULL DEFAULT 2,
  `NFCe_Serie` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '3.1',
  `NFCe_Modelo` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '65',
  `NFCe_Versao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '3.1',
  `NFCe_idToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NFCe_CSC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_Email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_ContNome` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_ContCRC` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_ContINSS` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_contCPF` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_ContFone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_RegLocal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_RegNumero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ctb_RegData` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vend_PedSimp` int(11) NOT NULL DEFAULT 1,
  `Vend_CliForPadrao` int(11) DEFAULT NULL,
  `Vend_CondPadrao` int(11) DEFAULT NULL,
  `Vend_FormPadrao` int(11) DEFAULT NULL,
  `Vend_DescAdicOrca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vend_DescAdicPed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vend_DescAdicOS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vend_AltPrTot` int(11) NOT NULL DEFAULT 0,
  `Vend_ExibeEst` int(11) NOT NULL DEFAULT 0,
  `Vend_AgrupaltPed` int(11) NOT NULL DEFAULT 0,
  `Vend_FreteIncorp` int(11) NOT NULL DEFAULT 1,
  `Vend_BxEstOSOrc` int(11) NOT NULL DEFAULT 1,
  `Vend_DiasLocacao` int(10) UNSIGNED DEFAULT NULL,
  `Vend_MudaStatOS` int(11) NOT NULL DEFAULT 1,
  `Vend_BuscObs` int(11) NOT NULL DEFAULT 1,
  `Vend_ProgFide` int(11) NOT NULL DEFAULT 0,
  `Vend_ProgPtos` decimal(10,2) DEFAULT 0.00,
  `Vend_TranspPadrao` int(11) DEFAULT NULL,
  `Vend_FiltroIniMes` int(11) NOT NULL DEFAULT 1,
  `Vend_VlrHora` decimal(10,2) DEFAULT 0.00,
  `Vend_VlrMinimo` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`Codigo`, `user_id`, `Razao_Social`, `Nome_Fantasia`, `CEP`, `Endereco`, `Numero`, `Bairro`, `Cod_IBGE`, `Cidade`, `Estado`, `Telefone`, `Celular`, `FAX`, `Email`, `IM`, `IE`, `CNPJ`, `Logo`, `Site`, `Atividade`, `CNAE`, `CliFor_Saida`, `CliFor_Entrada`, `Cfg_DataUltExec`, `Cfg_Ultbackup`, `Cfg_DirRel`, `Cfg_PreviewRel`, `Cfg_ImpOrcamento`, `Cfg_ImpPedido`, `Cfg_ImpOs`, `Cfg_ImpNfe`, `Cfg_ImpEtiq`, `Cfg_ImpEtiqMod`, `Cfg_TranSeq`, `Cfg_LembCliAniv`, `Cfg_PesqCep`, `Cfg_DirFotoProd`, `Cfg_IdentChamada`, `Cfg_AtuPrecoPrazo`, `Cfg_PermDuplicar`, `SMTP_CorpoEmail`, `SMTP_Serv`, `SMTP_Porta`, `SMTP_Usuario`, `SMTP_Senha`, `SMTP_Seguro`, `SMTP_SSL`, `SMTP_EmailCopia`, `WS_Plataforma`, `WB_Endereco`, `WS_WSDL`, `WS_Usuario`, `WS_Senha`, `FTP_Endereco`, `FTP_Porta`, `FTP_Usuario`, `FTP_Senha`, `Fin_CFixo`, `Fin_Desloc`, `Fin_Comissao`, `Fin_Lucro`, `Fin_Inad`, `Fin_DescPV`, `Fin_PerDano`, `Fin_JurosPadrao`, `Fin_MsgPadrao`, `Fin_ControlaCaixa`, `Fin_MultaPadrao`, `Fin_ForImposto`, `Fin_ComiFrac`, `Fin_ContrComi`, `Fisc_Tributacao`, `Fisc_ICMS`, `Fisc_PIS`, `Fisc_COFINS`, `Fisc_ISSQN`, `Fisc_IRPJ`, `Fisc_CSLL`, `Fisc_Simples`, `Fisc_CFOP`, `Fisc_ICMSFixo`, `NFe_CertDig`, `NFe_WebServ`, `NFe_Ambiente`, `NFe_Proxy`, `NFe_Porta`, `NFe_Usuario`, `NFe_Senha`, `NFe_DirXML`, `NFe_FormaEmiss`, `NFe_Serie`, `NFe_Modelo`, `NFe_Versao`, `NFe_Orient`, `NFe_Valida`, `NFe_Obs`, `NFCe_Ambiente`, `NFCe_Serie`, `NFCe_Modelo`, `NFCe_Versao`, `NFCe_idToken`, `NFCe_CSC`, `Ctb_Email`, `Ctb_ContNome`, `Ctb_ContCRC`, `Ctb_ContINSS`, `Ctb_contCPF`, `Ctb_ContFone`, `Ctb_RegLocal`, `Ctb_RegNumero`, `Ctb_RegData`, `Vend_PedSimp`, `Vend_CliForPadrao`, `Vend_CondPadrao`, `Vend_FormPadrao`, `Vend_DescAdicOrca`, `Vend_DescAdicPed`, `Vend_DescAdicOS`, `Vend_AltPrTot`, `Vend_ExibeEst`, `Vend_AgrupaltPed`, `Vend_FreteIncorp`, `Vend_BxEstOSOrc`, `Vend_DiasLocacao`, `Vend_MudaStatOS`, `Vend_BuscObs`, `Vend_ProgFide`, `Vend_ProgPtos`, `Vend_TranspPadrao`, `Vend_FiltroIniMes`, `Vend_VlrHora`, `Vend_VlrMinimo`) VALUES
(2, 2, 'Dev. Ubisoft', 'Dev. Ubisoft', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '72.992.431/0001-92', 'dev.-ubisoftdev.-ubisoft.jpeg', NULL, '0', NULL, NULL, NULL, '2020-01-06', '2020-01-06', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 'TLS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 1, '0.00', 1, 0, 0, 'Simples Nacional', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, '0', 2, NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, '.', 'R', 1, NULL, 2, '0', NULL, '3.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '--', NULL, NULL, NULL, 1, 4, 1, 1, NULL, NULL, NULL, 0, 0, 0, 1, 1, 0, 1, 1, 0, '0.00', 1, 1, '0.00', '0.00'),
(3, 2, 'Rockstar', 'Rockstar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.997.418/0001-53', 'rockstarrockstar.png', NULL, '0', NULL, NULL, NULL, '1969-12-31', '1969-12-31', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 'TLS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 1, '0.00', 1, 0, 0, 'Simples Nacional', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, '0', 2, NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, '.', 'R', 1, NULL, 2, '0', NULL, '3.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '--', NULL, NULL, NULL, 1, 4, 1, 1, NULL, NULL, NULL, 0, 0, 0, 1, 1, 0, 1, 1, 0, '0.00', 1, 1, '0.00', '0.00'),
(4, 1, 'Lucas Arts', 'Lucas Arts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '77.890.846/0007-64', 'lucas-artslucas-arts.jpeg', NULL, '0', NULL, NULL, NULL, '1969-12-31', '1969-12-31', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 'TLS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 1, '0.00', 1, 0, 0, 'Simples Nacional', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, '0', 2, NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, '.', 'R', 1, NULL, 2, '0', NULL, '3.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '--', NULL, NULL, NULL, 1, 0, 1, 1, NULL, NULL, NULL, 0, 0, 0, 1, 1, 0, 1, 1, 0, '0.00', 1, 1, '0.00', '0.00'),
(5, 1, 'ALE ME', 'Alessando ME', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alessando-m-ea-l-e-m-e.jpeg', NULL, '0', NULL, NULL, NULL, '1969-12-31', '1969-12-31', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 'TLS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 1, '0.00', 0, 0, 0, 'Simples Nacional', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, '0', 2, NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, NULL, 'R', 1, NULL, 2, '0', NULL, '3.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 1, 1, 0, 1, 1, 0, '0.00', 0, 1, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(11) NOT NULL,
  `Nro_Serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Placa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Equipamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nro_Frota` int(11) DEFAULT NULL,
  `Fabricacao` int(11) DEFAULT NULL,
  `Combustivel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Acessorios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`Codigo`, `user_id`, `Cod_CliFor`, `Nro_Serie`, `Placa`, `Equipamento`, `Marca`, `Modelo`, `Nro_Frota`, `Fabricacao`, `Combustivel`, `Acessorios`, `Estado`, `Foto`) VALUES
(12, 1, 1, '12345', NULL, 'serra circular', 'dewalt', '012as', NULL, 2020, NULL, 'caixa', 'novo', '12345serra-circular.jpeg'),
(14, 2, 1, '12345', NULL, 'maquina do tempo', 'sic mundus', NULL, NULL, 1953, 'plutonio', 'capsulas', 'nova', '12345maquina-do-tempo.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `user_id`, `cod_usuario`, `evento`, `descricao`, `cor`, `data_inicio`, `data_fim`) VALUES
(1, 1, 1, 'Teste1', '', '#ef4006', '2020-06-04', '2020-06-05'),
(4, 2, 4, 'Visitar clientes', 'cliente X', '#f41606', '2020-06-08', '2020-06-09'),
(5, 2, 1, 'Teste12', 'teste12', '#92dde3', '2020-07-28', '2020-07-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fidelidade`
--

CREATE TABLE `fidelidade` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_CliFor` int(11) NOT NULL,
  `Venda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Pontos` int(5) NOT NULL,
  `Pedidos` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Data` date NOT NULL,
  `Usado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fidelidade`
--

INSERT INTO `fidelidade` (`Codigo`, `user_id`, `Cod_CliFor`, `Venda`, `Valor`, `Pontos`, `Pedidos`, `Data`, `Usado`) VALUES
(2, 1, 1, '123', '500.00', 5, '135246, 123123, 125128', '2020-07-28', 1),
(3, 2, 1, '123', '500.00', 15689, '15689', '2020-07-28', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_condpag`
--

CREATE TABLE `fin_condpag` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Condicao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tab_Preco` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'À Prazo',
  `ParcDias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParcForma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParcJuros` decimal(3,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fin_condpag`
--

INSERT INTO `fin_condpag` (`Codigo`, `user_id`, `Condicao`, `Tab_Preco`, `ParcDias`, `ParcForma`, `ParcJuros`) VALUES
(1, 2, '1x', 'À Vista', '0', '1', '2.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_formapag`
--

CREATE TABLE `fin_formapag` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Descricao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comi_Operad` decimal(3,2) NOT NULL DEFAULT 0.00,
  `Tx_Antecip` decimal(3,2) NOT NULL DEFAULT 0.00,
  `Tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DI',
  `Destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CX',
  `Dest_CliFor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fin_formapag`
--

INSERT INTO `fin_formapag` (`Codigo`, `user_id`, `Descricao`, `Comi_Operad`, `Tx_Antecip`, `Tipo`, `Destino`, `Dest_CliFor`) VALUES
(1, 2, 'Forma1', '1.00', '2.00', 'CH', 'BC', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RG` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CEP` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Endereco` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bairro` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cidade` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Celular` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Usuario` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Senha` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ComiVend` decimal(4,2) NOT NULL DEFAULT 0.00,
  `ComiServ` decimal(4,2) NOT NULL DEFAULT 0.00,
  `LimDescPV` decimal(4,2) NOT NULL DEFAULT 0.00,
  `LimDescPP` decimal(4,2) NOT NULL DEFAULT 0.00,
  `idmsgs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Codigo`, `user_id`, `Nome`, `CPF`, `RG`, `CEP`, `Endereco`, `Bairro`, `Cidade`, `Estado`, `Telefone`, `Celular`, `Email`, `Usuario`, `Senha`, `ComiVend`, `ComiServ`, `LimDescPV`, `LimDescPP`, `idmsgs`) VALUES
(1, 3, 'Funcionario Teste', NULL, NULL, '85040130', 'Rua Francisco Carneiro Martins', 'Vila Carli', 'Guarapuava', 'PR', NULL, NULL, NULL, 'teste@email.com', 'teste20', '0.00', '0.00', '0.00', '0.00', 1),
(2, 2, 'Clark Kent', '45317828791', NULL, '85040130', 'Rua Francisco Carneiro Martins', 'Vila Carli', 'Guarapuava', 'PR', '42-9999-9999', '42-99999-9999', 'clark@gmail.com', 'superman', '132028', '0.00', '0.00', '0.00', '0.00', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario`
--

CREATE TABLE `inventario` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Responsavel` int(11) NOT NULL,
  `Data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `inventario`
--

INSERT INTO `inventario` (`Codigo`, `user_id`, `Responsavel`, `Data`, `Descricao`) VALUES
(1, 1, 1, '2020-07-24', 'Inventario Inicial...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_25_100649_create_empresa_table', 1),
(4, '2020_04_27_143513_create_roles_table', 1),
(5, '2020_04_27_143559_create_permissions_table', 1),
(6, '2020_04_28_151724_create_funcionarios_table', 1),
(10, '2020_04_28_154113_create_clifor_table', 2),
(11, '2020_04_28_154504_create_clifor_contato_table', 2),
(12, '2020_04_28_154949_create_clifor_endereco_table', 3),
(13, '2020_04_28_155025_create_clifor_referencia_table', 4),
(14, '2020_04_28_155158_create_find_condpag_table', 5),
(15, '2020_04_28_155424_create_fin_formpag_table', 6),
(16, '2020_04_28_155746_create_transportadora_table', 6),
(17, '2020_04_28_160350_create_transportadora_destino_table', 7),
(18, '2020_04_28_160410_create_transportadora_valor_table', 7),
(19, '2020_04_28_160520_create_centro_custo_table', 8),
(20, '2020_04_28_160627_create_categoria_osped_table', 8),
(21, '2020_04_28_160842_create_conta_cadastro_table', 9),
(22, '2020_04_28_161013_create_conta_saldo_table', 9),
(23, '2020_04_28_161107_create_cest_table', 10),
(24, '2020_04_28_161233_create_ncm_table', 10),
(25, '2020_04_28_161447_create_adicional_osped_table', 11),
(26, '2020_04_28_161643_create_boleto_remessa_table', 12),
(27, '2020_04_28_161657_create_boleto_titulo_table', 12),
(28, '2020_05_07_105132_alter_foreign_key_funcionario', 13),
(30, '2020_05_07_173423_create_clifor_contato_table', 14),
(31, '2020_05_08_091902_create_clifor_endereco_table', 15),
(32, '2020_05_08_093405_create_clifor_referencia_table', 16),
(33, '2020_05_08_143438_create_transportadora_destino_table', 17),
(34, '2020_05_08_143705_create_transportadora_valor_table', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ncm`
--

CREATE TABLE `ncm` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `NCM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AliqIBPT` decimal(3,2) NOT NULL DEFAULT 0.00,
  `AliqImp` decimal(3,2) NOT NULL DEFAULT 0.00,
  `AliqEst` decimal(3,2) DEFAULT 0.00,
  `AliqMun` decimal(3,2) DEFAULT 0.00,
  `Ex` int(11) NOT NULL,
  `Tipo` int(11) DEFAULT NULL,
  `VigenciaIni` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VigenciaFim` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Versao` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Chave` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ncm`
--

INSERT INTO `ncm` (`Codigo`, `user_id`, `NCM`, `Descricao`, `AliqIBPT`, `AliqImp`, `AliqEst`, `AliqMun`, `Ex`, `Tipo`, `VigenciaIni`, `VigenciaFim`, `Versao`, `Chave`) VALUES
(1, 2, '12', 'ncm1', '2.00', '2.00', '2.00', '3.00', 12, 12, '16/06/2020', '16/06/2020', '222', '21215'),
(2, 1, 'ncm brasil', 'brasil sul', '0.00', '0.00', '0.00', '0.00', 12, 12, NULL, NULL, '222', '21215');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacaofiscal`
--

CREATE TABLE `operacaofiscal` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `CFOP` int(11) NOT NULL,
  `Descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aplicacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dispositivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ES` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AlimFin` int(11) NOT NULL DEFAULT 0,
  `AlimFisc` int(11) NOT NULL DEFAULT 0,
  `ObsnaNFe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `operacaofiscal`
--

INSERT INTO `operacaofiscal` (`Codigo`, `user_id`, `CFOP`, `Descricao`, `Aplicacao`, `Dispositivo`, `ES`, `AlimFin`, `AlimFisc`, `ObsnaNFe`) VALUES
(2, 1, 1010, 'qwe 1', 'qweqwe 1', 'qweqweqwe 1', 'E', 0, 0, 'qweqweqweqwe 1'),
(3, 2, 111122, 'asdf', 'asdfg', 'asdfgh', 'S', 0, 1, 'asdfghj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dev.aleraymann@gmail.com', '$2y$10$eGTG97BRchJo7f.WFpYjtu2kE1VhWlOR0zw.vB.W9M.UzqyXaYPS6', '2020-06-19 13:35:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission`
--

INSERT INTO `permission` (`id`, `name`, `label`) VALUES
(1, 'insere_empresa', 'Adicionar Empresas'),
(2, 'edita_empresa', 'Edição de Empresas'),
(3, 'visual_empresa', 'Visualizar Empresa'),
(4, 'deleta_empresa', 'Deletar Empresas'),
(5, 'view_users', 'Visualizar Usuários Cadastrados'),
(6, 'insere_func', 'Inserir Funcionários'),
(7, 'insere_cliente', 'Adicionar Clientes'),
(8, 'edita_cliente', 'Edição de Clientes'),
(9, 'deleta_cliente', 'Exclusão de Clientes'),
(10, 'visual_cliente', 'Visualizar Cliente'),
(11, 'insere_transp', 'Adicionar Transportadora'),
(12, 'edita_transp', 'Edição de Transportadoras'),
(13, 'deleta_transp', 'Exclusão de Transportadoras'),
(14, 'visual_transp', 'Visualizar Transportadora'),
(15, 'view_financeiro', 'Visualizar Menu Financeiro'),
(16, 'gerar_relatorio', 'Gerar Relatórios'),
(17, 'menu', 'Acesso Menu Lateral'),
(18, 'insere_condPag', 'Adicionar Condição de Pagamento'),
(19, 'edita_condPag', 'Edição de Condição de Pagamento'),
(20, 'deleta_condPag', 'Exclusão de Condição de Pagamento'),
(22, 'insere_formPag', 'Adicionar Forma de Pagamento'),
(23, 'edita_formPag', 'Edição de Formas de Pagamento'),
(24, 'deleta_formPag', 'Exclusão de Formas de Pagamento'),
(25, 'insere_centroCusto', 'Adicionar Centro de Custo'),
(26, 'edita_centroCusto', 'Edição de Centro de Custo'),
(27, 'deleta_centroCusto', 'Exclusão de Centro de Custo'),
(28, 'insere_catOS', 'Adicionar Categoria Pedidos'),
(29, 'edita_catOS', 'Edição de Categoria Pedidos'),
(30, 'deleta_catOS', 'Exclusão de Categoria Pedidos'),
(31, 'insere_adiOS', 'Adicionar Adicionais em OS/Ped'),
(32, 'edita_adiOS', 'Edição de Adicionais em OS/Ped'),
(33, 'deleta_adiOS', 'Exclusão de Adicinais em OS/Ped'),
(34, 'insere_boletoRem', 'Adicionar Boleto Remessa'),
(35, 'edita_boletoRem', 'Edição de Boleto Remessa'),
(36, 'deleta_boletoRem', 'Exclusão de Boleto Remessa'),
(37, 'insere_boletoTit', 'Adicionar Boleto Titulo'),
(38, 'edita_boletoTit', 'Edição de Boleto Titulo'),
(39, 'deleta_boletoTit', 'Exclusão de Boleto Titulo'),
(40, 'visual_boletoTit', 'Visualizar Boleto Titulo'),
(41, 'insere_conta', 'Adicionar Conta Bancária'),
(42, 'edita_conta', 'Edição de Conta Bancária'),
(43, 'deleta_conta', 'Exclusão de Conta Bancária'),
(44, 'visual_conta', 'Visualizar Conta Bancária'),
(45, 'insere_saldo', 'Adicionar Saldo em Conta'),
(46, 'deleta_saldo', 'Exclusão de Saldo em Conta'),
(47, 'visual_saldo', 'Visualizar Saldo em Conta'),
(48, 'insere_ncm', 'Adicionar NCM'),
(49, 'edita_ncm', 'Edição de NCM'),
(50, 'deleta_ncm', 'Exclusão de NCM'),
(51, 'insere_cest', 'Adicionar CEST'),
(52, 'edita_cest', 'Edição de CEST'),
(53, 'deleta_cest', 'Exclusão de CEST'),
(54, 'insere_evento', 'Adicionar Evento no Calendário'),
(55, 'edita_evento', 'Edição de Evento no Calendário'),
(56, 'deleta_evento', 'Exclusão de Evento no Calendário'),
(57, 'visual_evento', 'Visualizar Listagem de  Eventos'),
(59, 'insere_convenio', 'Adicionar Convenio de Cobrança'),
(60, 'edita_convenio', 'Edição de Convênio de Cobrança'),
(61, 'deleta_convenio', 'Exclusão de Convênios de Cobrança'),
(62, 'insere_contrato', 'Adicionar Contrato de Cli/For'),
(63, 'edita_contrato', 'Edição de Contrato de Cli/For'),
(64, 'deleta_contrato', 'Exclusão de Contrato de Cli/For'),
(65, 'visual_contrato', 'Visualizar Contrato de Cli/For'),
(66, 'insere_data_mov', 'Adicionar Data de Movimento de Contas'),
(67, 'visual_data_mov', 'Visualizar Data de Movimento de Contas'),
(68, 'deleta_data_mov', 'Exclusão de Datas de Movimento de Contas'),
(69, 'insere_mov', 'Adicionar Movimento de Contas'),
(70, 'edita_mov', 'Edição de Movimento de Contas'),
(71, 'visual_mov', 'Visualizar Movimento de Contas'),
(72, 'deleta_mov', 'Exclusão de Movimento de Contas'),
(73, 'insere_cotacao', 'Adicionar Cotação'),
(74, 'edita_cotacao', 'Edição de Cotação'),
(75, 'deleta_cotacao', 'Exclusão de Cotação'),
(76, 'insere_ctas_pagar', 'Adicionar Contas a Pagar'),
(77, 'edita_ctas_pagar', 'Edição de Contas a Pagar'),
(78, 'deleta_ctas_pagar', 'Exclusão de Contas a Pagar'),
(79, 'visual_ctas_pagar', 'Visualizar Contas a Pagar'),
(80, 'insere_ctas_pagas', 'Adicionar Contas Pagas'),
(81, 'edita_ctas_pagas', 'Edição de Contas Pagas'),
(82, 'deleta_ctas_pagas', 'Exclusão de Contas Pagas'),
(83, 'visual_ctas_pagas', 'Visualizar Contas Pagas'),
(84, 'insere_ctas_receber', 'Adicionar Contas a Receber'),
(85, 'edita_ctas_receber', 'Edição de Contas a Receber'),
(86, 'deleta_ctas_receber', 'Exclusão de Contas  a Receber'),
(87, 'visual_ctas_receber', 'Visualizar Contas a Receber'),
(88, 'insere_ctas_recebidas', 'Adicionar Contas Recebidas'),
(89, 'edita_ctas_recebidas', 'Edição de Contas Recebidas'),
(90, 'deleta_ctas_recebidas', 'Exclusão de Contas Recebidas'),
(91, 'visual_ctas_recebidas', 'Visualizar Contas Recebidas'),
(92, 'insere_fluxo', 'Adicionar Fluxo de Conta'),
(93, 'edita_fluxo', 'Edição de Fluxo de Conta'),
(94, 'deleta_fluxo', 'Exclusão de Fluxo de Contas'),
(95, 'insere_fidelidade', 'Adicionar Fidelidade'),
(96, 'edita_fidelidade', 'Edição de Fidelidade'),
(97, 'deleta_fidelidade', 'Exclusão de Fidelidade'),
(98, 'insere_cfop', 'Adicionar CFOP'),
(99, 'edita_cfop', 'Edição de CFOP'),
(100, 'deleta_cfop', 'Exclusão de CFOP'),
(101, 'visual_cfop', 'Visualizar CFOP'),
(102, 'insere_recibo', 'Adicionar Recibos'),
(103, 'edita_recibo', 'Edição de Recibos'),
(104, 'deleta_recibo', 'Exclusão de Recibos'),
(105, 'visual_recibo', 'Visualizar Recibos'),
(106, 'insere_equipamento', 'Adicionar Equipamento'),
(107, 'deleta_equipamento', 'Exclusão de Equipamento'),
(108, 'edita_equipamento', 'Edição de Equipamento'),
(109, 'visual_equipamento', 'Visualizar Equipamento'),
(110, 'insere_recibo_tit', 'Adicionar Recibo de Titulos'),
(111, 'deleta_recibo_tit', 'Exclusão de Recibo de Títulos'),
(112, 'edita_recibo_tit', 'Edição de Recibo de Titulos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 6, 2),
(6, 7, 2),
(7, 8, 2),
(8, 9, 2),
(9, 10, 2),
(10, 11, 2),
(11, 12, 2),
(12, 13, 2),
(13, 14, 2),
(14, 15, 2),
(15, 16, 2),
(16, 17, 2),
(17, 18, 2),
(18, 19, 2),
(19, 20, 2),
(20, 22, 2),
(21, 23, 0),
(22, 24, 0),
(23, 25, 2),
(24, 26, 2),
(25, 27, 2),
(26, 28, 2),
(27, 29, 2),
(28, 30, 2),
(29, 31, 2),
(30, 32, 2),
(31, 33, 2),
(32, 34, 2),
(33, 35, 2),
(34, 36, 2),
(35, 37, 2),
(36, 38, 2),
(37, 39, 2),
(38, 40, 2),
(39, 41, 2),
(40, 42, 2),
(41, 43, 2),
(42, 44, 2),
(43, 45, 2),
(44, 46, 2),
(45, 47, 2),
(46, 48, 2),
(47, 49, 2),
(48, 50, 2),
(49, 51, 2),
(50, 52, 2),
(51, 53, 2),
(52, 54, 2),
(53, 55, 2),
(54, 56, 2),
(55, 57, 2),
(56, 17, 3),
(57, 57, 3),
(58, 59, 2),
(59, 60, 2),
(60, 61, 2),
(61, 62, 2),
(62, 63, 2),
(63, 64, 2),
(64, 65, 2),
(65, 66, 2),
(66, 67, 2),
(67, 68, 2),
(68, 69, 2),
(69, 70, 2),
(70, 71, 2),
(71, 72, 2),
(72, 44, 3),
(73, 67, 3),
(74, 71, 3),
(75, 65, 3),
(76, 73, 2),
(77, 74, 2),
(78, 75, 2),
(79, 76, 2),
(80, 77, 2),
(81, 78, 2),
(82, 83, 2),
(83, 79, 2),
(84, 79, 3),
(85, 80, 2),
(86, 81, 2),
(87, 82, 2),
(88, 83, 2),
(89, 83, 3),
(90, 84, 2),
(91, 85, 2),
(92, 86, 2),
(93, 87, 2),
(94, 87, 3),
(95, 15, 3),
(96, 88, 2),
(97, 89, 2),
(98, 90, 2),
(99, 91, 2),
(100, 91, 3),
(101, 92, 2),
(102, 93, 2),
(103, 94, 2),
(104, 95, 2),
(105, 96, 2),
(106, 97, 2),
(107, 98, 2),
(108, 99, 2),
(109, 100, 2),
(110, 101, 2),
(112, 101, 3),
(113, 102, 2),
(114, 103, 2),
(115, 104, 2),
(116, 105, 2),
(117, 105, 3),
(118, 106, 2),
(119, 107, 2),
(120, 108, 2),
(121, 109, 2),
(122, 109, 3),
(123, 110, 2),
(124, 111, 2),
(125, 112, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo`
--

CREATE TABLE `recibo` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Pag_Rec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rec_De` int(11) DEFAULT 0,
  `Pag_Para` int(11) DEFAULT 0,
  `Valor` decimal(10,2) NOT NULL,
  `Referente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data` date NOT NULL,
  `Ben_Nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ben_End` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ben_CPF_CNPJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Em_Nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Em_End` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Em_CPF_CNPJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Transacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recibo`
--

INSERT INTO `recibo` (`Codigo`, `user_id`, `Pag_Rec`, `Rec_De`, `Pag_Para`, `Valor`, `Referente`, `Data`, `Ben_Nome`, `Ben_End`, `Ben_CPF_CNPJ`, `Em_Nome`, `Em_End`, `Em_CPF_CNPJ`, `Transacao`, `Empresa`) VALUES
(3, 1, 'P', 1, 1, '23.00', 'bombas', '2020-07-23', 'aaa', 'Rua Francisco Carneiro Martins', '45997418000153', 'qqq', 'Rua Francisco Carneiro Martins', '45317828791', '333', '3'),
(4, 2, 'R', 1, 1, '520.00', 'tinta', '2020-07-30', 'ads', 'ads', '45317828791', 'qqq', 'Rua Francisco Carneiro Martinsasd', '45997418000153', '333', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo_tit`
--

CREATE TABLE `recibo_tit` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Cod_Rec` int(11) NOT NULL,
  `Cod_Tit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recibo_tit`
--

INSERT INTO `recibo_tit` (`Codigo`, `user_id`, `Cod_Rec`, `Cod_Tit`) VALUES
(2, 1, 4, 4),
(3, 1, 4, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `name`, `label`) VALUES
(1, 's_adm', 'Super Admin'),
(2, 'adm', 'Administrador da Empresa'),
(3, 'vendedor', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Fis_Jur` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'J',
  `Razao_Social` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome_Fantasia` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Endereco` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bairro` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cidade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CEP` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Celular` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comercial` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RG` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IE` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CNPJ` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tipo_Frete` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FreteM2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `FreteM3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `FretePor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FreteM` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transportadora`
--

INSERT INTO `transportadora` (`Codigo`, `user_id`, `Fis_Jur`, `Razao_Social`, `Nome_Fantasia`, `Endereco`, `Bairro`, `Cidade`, `Estado`, `CEP`, `Telefone`, `Celular`, `Comercial`, `Email`, `RG`, `CPF`, `IE`, `CNPJ`, `Tipo_Frete`, `FreteM2`, `FreteM3`, `FretePor`, `FreteM`, `Empresa`) VALUES
(1, 2, 'J', 'Dev. TransAle', 'Dev. TransAle', 'Rua Júlio de Castilho', 'Vila Carli', 'Guarapuava', 'PR', '85040170', '44-3033-5488', '44-99999-9999', '42-3035-2222', 'transale@gmail.com', NULL, NULL, '1222222222222', '72.992.431/0001-92', 'KM', '0.00', '0.00', 'K', '0.00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora_destino`
--

CREATE TABLE `transportadora_destino` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Cod_Transp` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `Destino_Cidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Destino_UF` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Indice` decimal(3,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transportadora_destino`
--

INSERT INTO `transportadora_destino` (`Codigo`, `Cod_Transp`, `user_id`, `Destino_Cidade`, `Destino_UF`, `Indice`) VALUES
(1, 1, 2, 'Rio de Janeiro', 'RJ', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora_valor`
--

CREATE TABLE `transportadora_valor` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Cod_Transp` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `KmIni` int(11) NOT NULL,
  `KmFim` int(11) NOT NULL,
  `Indice_v` decimal(3,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transportadora_valor`
--

INSERT INTO `transportadora_valor` (`Codigo`, `Cod_Transp`, `user_id`, `KmIni`, `KmFim`, `Indice_v`) VALUES
(1, 1, 2, 100, 120, '3.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm` int(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `adm`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, 'Alessandro Raymann', '1alessandro-raymann.gif', 'aleraymann@gmail.com', NULL, NULL, '$2y$10$mUqYDbusRT0QvESpFD0PseAH7rNBG2dXFIs4fRS0XTylqlHEfPLYm', 'kmMGTSp8Yf3Pur6tfTrcol0bOdCVZABFqFIDQzDqbapsBGM2fZDtwlxOqBkd'),
(2, 'Dev. Aleraymann', '2dev.-aleraymann.jpeg', 'dev.aleraymann@gmail.com', NULL, NULL, '$2y$10$Oq9mkq.l1XWv1ice16T7ZeaW5scsSompUwvk3n.EsPluOBVddKb6m', 'ZJvZqOZs4wUgPQWfUdQALzAU39J5yYQEuLYXqZ3VfwsWJCVJ1O9cdlfRXEcv'),
(4, 'Clark Kent', '4clark-kent.jpeg', 'clark@gmail.com', 2, NULL, '$2y$10$epc4B.K63Te87nB4dMyVneUivAxCdaq1KJKbirSKtEaBhEf67poIG', 'Gyz94f13KX9COGHU7Man8258WvKYfBiT63ZoJKlHQ3VVQFbga466wga8E1jK');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adicional_osped`
--
ALTER TABLE `adicional_osped`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `adicional_osped_user_id_foreign` (`user_id`);

--
-- Índices para tabela `boleto_remessa`
--
ALTER TABLE `boleto_remessa`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `boleto_remessa_user_id_foreign` (`user_id`);

--
-- Índices para tabela `boleto_titulo`
--
ALTER TABLE `boleto_titulo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `boleto_titulo_user_id_foreign` (`user_id`);

--
-- Índices para tabela `categoria_osped`
--
ALTER TABLE `categoria_osped`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `categoria_osped_user_id_foreign` (`user_id`);

--
-- Índices para tabela `centro_custo`
--
ALTER TABLE `centro_custo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `centro_custo_user_id_foreign` (`user_id`);

--
-- Índices para tabela `cest`
--
ALTER TABLE `cest`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `cest_user_id_foreign` (`user_id`);

--
-- Índices para tabela `clifor`
--
ALTER TABLE `clifor`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `clifor_user_id_foreign` (`user_id`),
  ADD KEY `clifor_vendedor_foreign` (`Vendedor`);

--
-- Índices para tabela `clifor_contato`
--
ALTER TABLE `clifor_contato`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `clifor_contato_user_id_foreign` (`user_id`);

--
-- Índices para tabela `clifor_endereco`
--
ALTER TABLE `clifor_endereco`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `clifor_endereco_user_id_foreign` (`user_id`),
  ADD KEY `clifor_endereco_cod_clifor_foreign` (`Cod_CliFor`);

--
-- Índices para tabela `clifor_referencia`
--
ALTER TABLE `clifor_referencia`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `clifor_referencia_cod_clifor_foreign` (`Cod_CliFor`),
  ADD KEY `clifor_referencia_user_id_foreign` (`user_id`);

--
-- Índices para tabela `conta_cadastro`
--
ALTER TABLE `conta_cadastro`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `conta_cadastro_user_id_foreign` (`user_id`);

--
-- Índices para tabela `conta_fluxo`
--
ALTER TABLE `conta_fluxo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `conta_fluxo_user_id_foreign` (`user_id`);

--
-- Índices para tabela `conta_movimento`
--
ALTER TABLE `conta_movimento`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `conta_movimento_user_id_foreign` (`user_id`),
  ADD KEY `conta_movimento_data_id_foreign` (`data_id`);

--
-- Índices para tabela `conta_saldo`
--
ALTER TABLE `conta_saldo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `conta_saldo_cod_conta_foreign` (`Cod_Conta`);

--
-- Índices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `contrato_user_id_foreign` (`user_id`);

--
-- Índices para tabela `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `convenio_user_id_foreign` (`user_id`);

--
-- Índices para tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `cotacao_user_id_foreign` (`user_id`);

--
-- Índices para tabela `ctas_pagar`
--
ALTER TABLE `ctas_pagar`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ctas_pagar_user_id_foreign` (`user_id`);

--
-- Índices para tabela `ctas_pagas`
--
ALTER TABLE `ctas_pagas`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ctas_pagas_user_id_foreign` (`user_id`);

--
-- Índices para tabela `ctas_receber`
--
ALTER TABLE `ctas_receber`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ctas_receber_user_id_foreign` (`user_id`);

--
-- Índices para tabela `ctas_recebidas`
--
ALTER TABLE `ctas_recebidas`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ctas_recebidas_user_id_foreign` (`user_id`);

--
-- Índices para tabela `data_conta_movimento`
--
ALTER TABLE `data_conta_movimento`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `data_conta_movimento_user_id_foreign` (`user_id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `empresa_user_id_foreign` (`user_id`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `equipamento_user_id_foreign` (`user_id`);

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fidelidade`
--
ALTER TABLE `fidelidade`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fidelidade_user_id_foreign` (`user_id`);

--
-- Índices para tabela `fin_condpag`
--
ALTER TABLE `fin_condpag`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fin_condpag_user_id_foreign` (`user_id`);

--
-- Índices para tabela `fin_formapag`
--
ALTER TABLE `fin_formapag`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fin_formpag_user_id_foreign` (`user_id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `funcionario_user_id_foreign` (`user_id`);

--
-- Índices para tabela `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `inventario_user_id_foreign` (`user_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ncm`
--
ALTER TABLE `ncm`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ncm_user_id_foreign` (`user_id`);

--
-- Índices para tabela `operacaofiscal`
--
ALTER TABLE `operacaofiscal`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `operacaofiscal_user_id_foreign` (`user_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Índices para tabela `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Índices para tabela `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `recibo_user_id_foreign` (`user_id`);

--
-- Índices para tabela `recibo_tit`
--
ALTER TABLE `recibo_tit`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `recibo_tit_user_id_foreign` (`user_id`);

--
-- Índices para tabela `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Índices para tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `transportadora_user_id_foreign` (`user_id`);

--
-- Índices para tabela `transportadora_destino`
--
ALTER TABLE `transportadora_destino`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `transportadora_destino_cod_transp_foreign` (`Cod_Transp`),
  ADD KEY `transportadora_destino_user_id_foreign` (`user_id`);

--
-- Índices para tabela `transportadora_valor`
--
ALTER TABLE `transportadora_valor`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `transportadora_valor_cod_transp_foreign` (`Cod_Transp`),
  ADD KEY `transportadora_valor_user_id_foreign` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(191));

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adicional_osped`
--
ALTER TABLE `adicional_osped`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `boleto_remessa`
--
ALTER TABLE `boleto_remessa`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `boleto_titulo`
--
ALTER TABLE `boleto_titulo`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categoria_osped`
--
ALTER TABLE `categoria_osped`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `centro_custo`
--
ALTER TABLE `centro_custo`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cest`
--
ALTER TABLE `cest`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `clifor`
--
ALTER TABLE `clifor`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clifor_contato`
--
ALTER TABLE `clifor_contato`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clifor_endereco`
--
ALTER TABLE `clifor_endereco`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clifor_referencia`
--
ALTER TABLE `clifor_referencia`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `conta_cadastro`
--
ALTER TABLE `conta_cadastro`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `conta_fluxo`
--
ALTER TABLE `conta_fluxo`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `conta_movimento`
--
ALTER TABLE `conta_movimento`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `conta_saldo`
--
ALTER TABLE `conta_saldo`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `convenio`
--
ALTER TABLE `convenio`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cotacao`
--
ALTER TABLE `cotacao`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ctas_pagar`
--
ALTER TABLE `ctas_pagar`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ctas_pagas`
--
ALTER TABLE `ctas_pagas`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ctas_receber`
--
ALTER TABLE `ctas_receber`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ctas_recebidas`
--
ALTER TABLE `ctas_recebidas`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `data_conta_movimento`
--
ALTER TABLE `data_conta_movimento`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fidelidade`
--
ALTER TABLE `fidelidade`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fin_condpag`
--
ALTER TABLE `fin_condpag`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fin_formapag`
--
ALTER TABLE `fin_formapag`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ncm`
--
ALTER TABLE `ncm`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `operacaofiscal`
--
ALTER TABLE `operacaofiscal`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de tabela `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de tabela `recibo`
--
ALTER TABLE `recibo`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `recibo_tit`
--
ALTER TABLE `recibo_tit`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `transportadora`
--
ALTER TABLE `transportadora`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `transportadora_destino`
--
ALTER TABLE `transportadora_destino`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `transportadora_valor`
--
ALTER TABLE `transportadora_valor`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta_fluxo`
--
ALTER TABLE `conta_fluxo`
  ADD CONSTRAINT `conta_fluxo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `convenio`
--
ALTER TABLE `convenio`
  ADD CONSTRAINT `convenio_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD CONSTRAINT `cotacao_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `ctas_pagar`
--
ALTER TABLE `ctas_pagar`
  ADD CONSTRAINT `ctas_pagar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `ctas_pagas`
--
ALTER TABLE `ctas_pagas`
  ADD CONSTRAINT `ctas_pagas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `ctas_receber`
--
ALTER TABLE `ctas_receber`
  ADD CONSTRAINT `ctas_receber_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `ctas_recebidas`
--
ALTER TABLE `ctas_recebidas`
  ADD CONSTRAINT `ctas_recebidas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `data_conta_movimento`
--
ALTER TABLE `data_conta_movimento`
  ADD CONSTRAINT `data_conta_movimento_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `fidelidade`
--
ALTER TABLE `fidelidade`
  ADD CONSTRAINT `fidelidade_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `operacaofiscal`
--
ALTER TABLE `operacaofiscal`
  ADD CONSTRAINT `operacaofiscal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `recibo_tit`
--
ALTER TABLE `recibo_tit`
  ADD CONSTRAINT `recibo_tit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
