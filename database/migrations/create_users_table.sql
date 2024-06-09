CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_login` (`id`, `nome`, `usuario`, `senha`, `created`, `modified`) VALUES
(19, 'Maycon', 'maycon', '123', '2019-03-20 17:24:07', NULL),
(20, 'Yuri Lima', 'yuuhgod', 'yurilima1', '2019-03-27 14:25:40', NULL),
(21, 'Ronald Ribeiro', 'Ronaldinho', 'ronald123', '2019-03-27 14:26:35', NULL);