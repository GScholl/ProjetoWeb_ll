-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2023 às 18:16
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE projeto_web2;
USE projeto_web2;
--
-- Banco de dados: `projeto_web2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Acessórios'),
(2, 'Smartphones'),
(3, 'Notebooks'),
(4, 'Fones Bluetoth');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(2, 'Guilherme', 'teste', 'guilhermescholl99@gmail.com', '$2y$10$uUg37GeLXU0oTvSFp7KDv.YJl/9XNwQx1OH2tMfIBu1mMu4yM7fQq'),
(3, 'Débora', 'Pasquali', 'deborapasquali20@gmail.com', '$2y$10$rXKf5yGwxs3HQJMu/NU6Gu6SAlnRJvczSE69u2udPmXXrlswvHBu.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_produto`
--

CREATE TABLE `fotos_produto` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `alt` varchar(64) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `foto_capa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fotos_produto`
--

INSERT INTO `fotos_produto` (`id`, `url`, `alt`, `id_produto`, `foto_capa`) VALUES
(0, 'https://microimport.com.br/storage/placa-mae-original-apple-watch-series-7-gps-alum-45mm.png', 'Foto do Apple Watch', 1, 1),
(1, 'https://m.media-amazon.com/images/I/716GA5MQQkL._AC_SL1500_.jpg', 'WAP ROBOT W90 - Aspirador de Pó Robô, Automático 3 em 1 Varre, A', 2, 1),
(2, 'https://electrolux.vtexassets.com/arquivos/ids/218367-1200-auto?v=637826174421270000&width=1200&height=auto&aspect=true', 'Robô Aspirador de Pó Electrolux Home-E Control Experience com Au', 3, 1),
(3, 'https://http2.mlstatic.com/D_NQ_NP_2X_816458-MLU70683376955_072023-F.webp', 'Aspirador Inteligente Xiaomi Mi Vacuum-mop S10 Bhr6389us Cor Bra', 4, 1),
(4, 'https://http2.mlstatic.com/D_NQ_NP_908583-MLU72650776069_112023-O.webp', 'Robô Aspirador De Pó 30w Preto Rb08 Mondial Bivolt 110V/220V', 5, 1),
(5, 'https://m.media-amazon.com/images/I/61fYIhvPnfL._AC_SL1500_.jpg', 'Amazfit GTS 4 MINI Smartwatch 120+ Modos Esportivos 1,65 \"HD AMO', 6, 1),
(6, 'https://m.media-amazon.com/images/I/71aWDnZOfLL._AC_SL1500_.jpg', 'Amazfit GTR 4, Superspeed, Preto', 7, 1),
(7, 'https://m.media-amazon.com/images/I/512JJg85LgL._AC_SL1000_.jpg', 'Apple Watch SE (2a geração) GPS, Smartwatch com caixa prateada d', 8, 1),
(8, 'https://m.media-amazon.com/images/I/618SMjjwMVL._AC_SL1500_.jpg', 'Samsung Galaxy Watch4 BT 40mm - Relógio inteligente, Preto', 9, 1),
(9, 'https://m.media-amazon.com/images/I/61UxfXTUyvL._AC_SL1500_.jpg', '\r\nMouse Gamer Logitech G203 LIGHTSYNC RGB, Efeito de Ondas de Co', 10, 1),
(10, 'https://http2.mlstatic.com/D_NQ_NP_736729-MLU69994776392_062023-O.webp', 'Mouse Gamer Acer Predator Cestus 310 LED Retroiluminado 6 Botões', 11, 1),
(11, 'https://m.media-amazon.com/images/I/8189uwDnMkL._AC_SL1500_.jpg', 'Razer Mouse essencial para jogos DeathAdder: sensor óptico 6400 ', 12, 1),
(12, 'https://m.media-amazon.com/images/I/51DYDLykzoL._AC_SL1500_.jpg', '\r\nMouse Gamer Sem Fio Logitech G305 LIGHTSPEED com 6 Botões Prog', 13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(1024) NOT NULL,
  `descricao` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `titulo`, `descricao`, `id_categoria`, `valor`) VALUES
(1, 'Apple Watch', 'Melhor Pulseira', 1, 1499.90),
(2, 'WAP ROBOT W90', 'Aspirador de Pó Robô, Automático 3 em 1 Varre, Aspira, Passa Pano, MOP para Limpeza, 30W, Bateria Recarregável, Bivolt, Preto', 1, 348.00),
(3, ' Electrolux Home-E Control Experience', 'O Robô Aspirador de Pó Electrolux Home-e Control Experience com Autonomous Technology ERB20, é seu aliado para tornar a limpeza de sua casa mais prática. Devido a sua versatilidade de uso, ele varre, aspira e passa pano no chão, te trazendo mais praticidade na limpeza e otimizando seu tempo. Por ter controle remoto, você pode escolher opções pré-programadas de limpezas de áreas.', 1, 1549.00),
(4, ' Xiaomi Mi Vacuum-mop S10', 'Ter um aspirador de pó robô vai lhe permitir economizar tempo e esforço. É a solução para que a limpeza da sua casa seja realizada com mais frequência e possa manter os ambientes sempre impecáveis. O Xiaomi S10 fará a tarefa por você.', 1, 2211.30),
(5, 'Rb08 Mondial Bivolt', 'O Robô Aspirador De Pó 30w Preto E Cinza Rb08 Mondial Bivolt mantém a casa sempre limpa. Limpeza inteligente, ele varre, aspira e limpa com apenas 1 toque! A limpeza do dia a dia ficou mais fácil e prática. Super Slim com 7,5cm de altura e função MOP - Entra com facilidade debaixo de móveis, camas, sofás. Possui escovas laterais para a limpeza de cantos. Com a função MOP passa pano enquanto aspira.', 1, 337.99),
(6, 'Amazfit GTS 4 MINI', 'O Amazfit GTS4 Mini suporta 5 sistemas de posicionamento por satélite e usa tecnologia patenteada de antena circularmente polarizada para melhorar o desempenho e a precisão do posicionamento. Acompanhe seus movimentos ao ar livre com alta precisão.', 2, 599.99),
(7, 'Amazfit GTR 4', 'Embora inspirado no estilo aerodinâmico e na precisão dos carros esportivos modernos, o Amazfit GTR 4 também fica de olho no espelho retrovisor, homenageando os clássicos com seu corpo de relógio redondo vintage', 2, 1199.00),
(8, 'Apple Watch SE', 'Trabalha de forma integrada com seus aparelhos e serviços Apple. Ouça música com seus AirPods. Desbloqueie seu Mac automaticamente. Encontre seus aparelhos com um toque. O Apple Watch requer iPhone 6s ou posterior com a versão mais recente do iOS.\r\nIdeal para nadar e projetado para durar. Faça uma caminhada, vá à academia ou pegue ondas sem se preocupar.', 2, 2421.55),
(9, 'Galaxy Watch 4', 'Com um novo sistema operacional, exclusivo da Samsung, o Wear OS, o Smartwatch Samsung Galaxy Watch 4 40mm é a sua melhor opção para te acompanhar em várias ocasiões. Com uma variedade de aplicativos, se torna um gadget necessário para seu dia a dia. Acesse diversos aplicativos favoritos com acesso integrado direto do seu pulso.  Com um novo hardware, CPU e GPU mais rápidos, o seu Galaxy Watch 4 possui uma maior capacidade de memória interna. Além de uma durabilidade padrão Militar(MIL-STD-810G), com resistência à água (5 ATM ) e poeira (IP-68).', 2, 1259.50),
(10, 'Logitech G203 LIGHTSYNC RGB', 'LIGHTSYNC RGB - Jogue em cores com nosso mais vibrante LIGHTSYNC RGB, com efeitos de ondas de cores personalizáveis em aproximadamente 16,8 milhões de cores. Instale o software Logitech G HUB para escolher cores e animações predefinidas ou criar suas próprias.', 3, 139.90),
(11, 'Acer Predator Cestus 310', 'O Cestus 310 tem um design confortável para você aguentar diversas horas jogando. Seu design ergonômico garante o melhor manuseio para longas disputas. Com dimensões compactas, você pode levar seu Cestus 310 para onde quiser.', 3, 299.90),
(12, 'Razer DeathAdder', 'O fabricante número 1 de periféricos de jogos mais vendido nos EUA: Fonte - The NPD Group, Inc.\r\nSensor óptico de 6.400 DPI de alta precisão: oferece ajuste de sensibilidade imediato através de botões DPI dedicados (reprogramáveis) para jogos e trabalho criativo\r\n', 3, 153.70),
(13, 'Logitech G305 LIGHTSPEED', 'O sensor HERO de última geração economiza 10 vezes mais energia em relação às outras gerações. Este sensor ótico possui precisão e capacidade de resposta excepcionais com a precisão de 400 IPS e a sensibilidade de até 12.000 DPI.\r\nA tecnologia ultrarrápida LIGHTSPEED sem fio proporciona uma experiência de jogo sem atrasos. O G305 oferece capacidade de resposta e confiabilidade incríveis com uma taxa de transmissão super-rápida de 1 ms, proporcionando o desempenho esperado em competições.', 3, 249.90);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Índices para tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  ADD CONSTRAINT `fotos_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
