-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/06/2024 às 05:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbcozinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_login`
--

INSERT INTO `tb_login` (`id`, `nome`, `usuario`, `senha`, `created`, `modified`) VALUES
(19, 'Maycon', 'maycon', '123', '2019-03-20 17:24:07', NULL),
(20, 'Yuri Lima', 'yuuhgod', 'yurilima1', '2019-03-27 14:25:40', NULL),
(21, 'Ronald Ribeiro', 'Ronaldinho', 'ronald123', '2019-03-27 14:26:35', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(12) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `ingredientes` text DEFAULT NULL,
  `modo_preparo` text DEFAULT NULL,
  `autor` varchar(255) NOT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`id`, `titulo`, `data`, `imagem`, `descricao`, `ingredientes`, `modo_preparo`, `autor`, `categoria`) VALUES
(1, 'Panquecas Americanas', '2024-05-30', 'panquecas.jpg', 'Panquecas Americanas são uma deliciosa opção para o café da manhã ou brunch. Essas panquecas são macias por dentro e crocantes por fora, perfeitas para serem servidas com xarope de bordo e frutas frescas.', 'Farinha de trigo, açúcar, fermento em pó, sal, leite, ovo, manteiga', 'Misture a farinha, o açúcar, o fermento em pó e o sal. Adicione o leite, o ovo e a manteiga. Misture bem até obter uma massa homogênea.', 'RONALD RIBEIRO', 1),
(2, 'Smoothie de Frutas', '2024-05-30', 'smoothiefrutas.jpg', 'O Smoothie de Frutas é uma opção refrescante e saudável para uma bebida rápida e deliciosa. Feito com frutas frescas e iogurte, este smoothie é perfeito para um café da manhã ou lanche energizante.', 'Banana, morangos congelados, mirtilos congelados, iogurte natural, mel', 'Coloque todos os ingredientes no liquidificador e bata até obter uma mistura homogênea.', 'YURI DAVI', 1),
(3, 'Frango Assado com Batatas', '2024-05-30', 'frangobatata.jpg', 'O Frango Assado com Batatas é uma refeição reconfortante e fácil de preparar. O frango é marinado em uma mistura de ervas e especiarias, e assado junto com batatas até ficar dourado e suculento.', 'Frango inteiro, batatas, alho, azeite de oliva, sal, pimenta, alecrim', 'Esfregue a mistura de temperos por todo o frango. Corte as batatas em pedaços e disponha ao redor do frango em uma assadeira. Asse em forno pré-aquecido a 200°C por 1 hora ou até dourar.', 'MAYCON HENRIQUE', 2),
(4, 'Lasanha à Bolonhesa', '2024-05-30', 'lasanhabolonhesa.jpg', 'A Lasanha à Bolonhesa é um clássico da culinária italiana, feito com camadas de massa, molho de carne e queijo. É uma refeição reconfortante e deliciosa que agrada a toda a família.', 'Massa de lasanha, carne moída, cebola, alho, molho de tomate, queijo mussarela, queijo parmesão, sal, pimenta, azeite', 'Refogue a cebola e o alho até ficarem macios. Adicione a carne moída e cozinhe até dourar. Adicione o molho de tomate e deixe cozinhar por 10 minutos. Monte a lasanha em camadas alternadas de molho de carne, massa e queijo. Asse em forno pré-aquecido a 180°C por 30 minutos.', 'LAURA COSTA', 2),
(5, 'Pudim de Leite Condensado', '2024-05-30', 'pudim.jpg', 'O Pudim de Leite Condensado é uma sobremesa clássica e irresistível, feita com poucos ingredientes e muito sabor. É cremoso, macio e derrete na boca, deixando sempre um gostinho de quero mais.', 'Leite condensado, leite, ovos, açúcar', 'Bata todos os ingredientes no liquidificador. Caramelize uma forma de pudim com açúcar e despeje a mistura. Asse em banho-maria em forno pré-aquecido a 180°C por aproximadamente 1 hora ou até firmar.', 'KAUAN SOUZA', 3),
(6, 'Torta de Limão', '2024-05-30', 'tortadelimao.jpg', 'A Torta de Limão é uma sobremesa refrescante e deliciosa, perfeita para os dias quentes de verão. Feita com uma massa crocante e um recheio cremoso de limão, esta torta vai encantar todos os seus convidados.', 'Farinha de trigo, manteiga, açúcar, limão, leite condensado, creme de leite', 'Misture a farinha, a manteiga e o açúcar até formar uma massa. Forre uma forma de fundo removível com a massa e asse em forno pré-aquecido a 180°C por 15 minutos. Em uma tigela, misture o suco de limão, o leite condensado e o creme de leite. Despeje sobre a massa assada e leve à geladeira por pelo menos 2 horas.', 'RONALD RIBEIRO', 3),
(7, 'Sopa de Legumes', '2024-05-30', 'sopalegumes.jpg', 'A Sopa de Legumes é uma opção saudável e reconfortante para os dias frios. Feita com legumes frescos e temperos aromáticos, esta sopa é uma refeição completa e nutritiva.', 'Cenoura, batata, abobrinha, cebola, alho, tomate, caldo de legumes, sal, pimenta, azeite', 'Refogue a cebola e o alho até dourarem. Acrescente os legumes cortados em cubos e refogue por alguns minutos. Adicione o caldo de legumes, tempere com sal e pimenta, e deixe cozinhar até os legumes ficarem macios.', 'YURI DAVI', 4),
(8, 'Risoto de Camarão', '2024-05-30', 'risotocamarao.jpg', 'O Risoto de Camarão é um prato sofisticado e delicioso, perfeito para ocasiões especiais. Feito com arroz cremoso, camarão suculento e um toque de vinho branco, este risoto vai impressionar seus convidados.', 'Arroz arbóreo, camarão, cebola, alho, vinho branco, caldo de peixe, queijo parmesão, manteiga, sal, pimenta', 'Refogue a cebola e o alho até dourarem. Acrescente o arroz e refogue por alguns minutos. Adicione o vinho branco e deixe evaporar. Gradualmente, adicione o caldo de peixe, mexendo sempre até o arroz ficar macio. Adicione os camarões e cozinhe por mais alguns minutos. Por último, misture o queijo parmesão e a manteiga. Tempere com sal e pimenta a gosto.', 'MAYCON HENRIQUE', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
