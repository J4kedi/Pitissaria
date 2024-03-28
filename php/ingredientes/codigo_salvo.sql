CREATE TABLE `ingredientes` (
  `id` int NOT NULL,
  `nome_ingrediente` varchar(100) NOT NULL,
  `dt_validade` date NOT NULL,
  `quantidade_ingrediente` float NOT NULL,
  `preco_compra` decimal(20,0) NOT NULL 
);

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nome_ingrediente`, `dt_validade`, `quantidade_ingrediente`, `preco_compra`) VALUES
(1, 'tomate', '2024-04-01', 130, '20 graus', 24);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;