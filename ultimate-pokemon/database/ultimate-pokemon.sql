-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Mar-2023 às 12:14
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ultimate-pokemon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `player`
--

CREATE TABLE `player` (
  `idPlayer` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `player`
--

INSERT INTO `player` (`idPlayer`, `email`, `nickname`, `senha`) VALUES
(2, 'otaviomaldaner571@gmail.com', 'Otavio_Maldaner', '$2y$10$/WSgLmRE1hB8r.Bre9x4.uZhrnoP0tlmKrlpo.9LMQVbbp6dpE77O');

-- --------------------------------------------------------

--
-- Estrutura da tabela `player_wallet`
--

CREATE TABLE `player_wallet` (
  `idPlayer` tinyint(4) NOT NULL,
  `idPokemon` smallint(6) NOT NULL,
  `idTransacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `player_wallet`
--

INSERT INTO `player_wallet` (`idPlayer`, `idPokemon`, `idTransacao`) VALUES
(2, 150, 4),
(2, 145, 5),
(2, 130, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `idPokemon` smallint(6) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `over` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pokemon`
--

INSERT INTO `pokemon` (`idPokemon`, `nome`, `peso`, `altura`, `tipo`, `over`) VALUES
(1, 'Bulbasaur', 6.9, 0.7, 'Grama / Veneno', 78),
(2, 'Ivysaur', 13, 1, 'Grama / Veneno', 84),
(3, 'Venusaur', 100, 2, 'Grama / Veneno', 88),
(4, 'Charmander', 8.5, 0.6, 'Fogo', 78),
(5, 'Charmeleon', 19, 1.1, 'Fogo', 84),
(6, 'Charizard', 90.5, 1.7, 'Fogo / Voador', 90),
(7, 'Squirtle', 9, 0.5, 'Água', 78),
(8, 'Wartortle', 22.5, 1, 'Água', 83),
(9, 'Blastoise', 85.5, 1.6, 'Água', 88),
(10, 'Caterpie', 2.9, 0.3, 'Inseto', 68),
(11, 'Metapod', 9.9, 0.7, 'Inseto', 50),
(12, 'Butterfree', 32, 1.1, 'Inseto / Voador', 84),
(13, 'Weedle', 3.2, 0.3, 'Inseto / Veneno', 65),
(14, 'Kakuna', 10, 0.6, 'Inseto / Veneno', 50),
(15, 'Beedrill', 29.5, 1, 'Inseto / Veneno', 84),
(16, 'Pidgey', 1.8, 0.3, 'Normal / Voador', 70),
(17, 'Pidgeotto', 30, 1.1, 'Normal / Voador', 80),
(18, 'Pidgeot', 39.5, 1.5, 'Normal / Voador', 87),
(19, 'Rattata', 3.5, 0.3, 'Normal', 76),
(20, 'Raticate', 18.5, 0.7, 'Normal', 84),
(21, 'Spearow', 2, 0.3, 'Normal / Voador', 73),
(22, 'Fearow', 38, 1.2, 'Normal / Voador', 85),
(23, 'Ekans', 6.9, 2, 'Veneno', 77),
(24, 'Arbok', 65, 3.5, 'Veneno', 84),
(25, 'Pikachu', 6, 0.4, 'Elétrico', 80),
(26, 'Raichu', 30, 0.8, 'Elétrico', 86),
(27, 'Sandshrew', 12, 0.6, 'Terra', 76),
(28, 'Sandslash', 29.5, 1, 'Terra', 84),
(29, 'Nidoran♀', 7, 0.4, 'Veneno', 79),
(30, 'Nidorina', 20, 0.8, 'Veneno', 82),
(31, 'Nidoqueen', 60, 1.3, 'Veneno / Terra', 85),
(32, 'Nidoran♂', 9, 0.5, 'Veneno', 78),
(33, 'Nidorino', 19.5, 0.9, 'Veneno', 77),
(34, 'Nidoking', 62, 1.4, 'Veneno / Terra', 84),
(35, 'Clefairy', 7.5, 0.6, 'Fada', 78),
(36, 'Clefable', 40, 1.3, 'Fada', 83),
(37, 'Vulpix', 9.9, 0.6, 'Fogo', 76),
(38, 'Ninetales', 19.9, 1.1, 'Fogo', 84),
(39, 'Jigglypuff', 5.5, 0.5, 'Normal / Fada', 80),
(40, 'Wigglytuff', 12, 1, 'Normal / Fada', 82),
(41, 'Zubat', 7.5, 0.8, 'Veneno / Voador', 74),
(42, 'Golbat', 55, 1.6, 'Veneno / Voador', 83),
(43, 'Oddish', 5.4, 0.5, 'Grama / Veneno', 73),
(44, 'Gloom', 8.6, 0.8, 'Grama / Veneno', 83),
(45, 'Vileplume', 18.6, 1.2, 'Grama / Veneno', 86),
(46, 'Paras', 5.4, 0.3, 'Inseto / Grama', 77),
(47, 'Parasect', 29.5, 1, 'Inseto / Grama', 83),
(48, 'Venonat', 30, 1, 'Inseto / Veneno', 78),
(49, 'Venomoth', 12.5, 1.5, 'Inseto / Veneno', 82),
(50, 'Diglett', 0.8, 0.2, 'Terra', 76),
(51, 'Dugtrio', 33.3, 0.7, 'Terra', 82),
(52, 'Meowth', 4.2, 0.4, 'Normal', 81),
(53, 'Persian', 32, 1, 'Normal', 82),
(54, 'Psyduck', 19.6, 0.8, 'Água', 79),
(55, 'Golduck', 76.6, 1.7, 'Água', 84),
(56, 'Mankey', 28, 0.5, 'Lutador', 76),
(57, 'Primeape', 32, 1, 'Lutador', 82),
(58, 'Growlithe', 19, 0.7, 'Fogo', 77),
(59, 'Arcanine', 155, 1.9, 'Fogo', 85),
(60, 'Poliwag', 12.4, 0.6, 'Água', 76),
(61, 'Poliwhirl', 20, 1, 'Água', 80),
(62, 'Poliwrath', 54, 1.3, 'Água / Lutador', 85),
(63, 'Abra', 19.5, 0.9, 'Psíquico', 79),
(64, 'Kadabra', 56.5, 1.3, 'Psíquico', 84),
(65, 'Alakazam', 48, 1.5, 'Psíquico', 88),
(66, 'Machop', 19.5, 0.8, 'Lutador', 76),
(67, 'Machoke', 70.5, 1.5, 'Lutador', 81),
(68, 'Machamp', 130, 1.6, 'Lutador', 87),
(69, 'Bellsprout', 4, 0.7, 'Grama / Veneno', 74),
(70, 'Weepinbell', 6.4, 1, 'Grama / Veneno', 79),
(71, 'Victreebel', 15.5, 1.7, 'Grama / Veneno', 84),
(72, 'Tentacool', 45.5, 0.9, 'Água / Veneno', 78),
(73, 'Tentacruel', 55, 1.6, 'Água / Veneno', 83),
(74, 'Geodude', 20, 0.4, 'Pedra / Terra', 75),
(75, 'Graveler', 105, 1, 'Pedra / Terra', 79),
(76, 'Golem', 300, 1.4, 'Pedra / Terra', 85),
(77, 'Ponyta', 30, 1, 'Fogo', 77),
(78, 'Rapidash', 95, 1.7, 'Fogo', 83),
(79, 'Slowpoke', 36, 1.2, 'Água / Psíquico', 78),
(80, 'Slowbro', 78.5, 1.6, 'Água / Psíquico', 83),
(81, 'Magnemite', 6, 0.3, 'Elétrico / Aço', 77),
(82, 'Magneton', 60, 1, 'Elétrico / Aço', 83),
(83, 'Farfetch\'d', 15, 0.8, 'Normal / Voador', 80),
(84, 'Doduo', 39.2, 1.4, 'Normal / Voador', 72),
(85, 'Dodrio', 85.2, 1.8, 'Normal / Voador', 82),
(86, 'Seel', 90, 1.1, 'Água', 75),
(87, 'Dewgong', 120, 1.7, 'Água / Gelo', 83),
(88, 'Grimer', 30, 0.9, 'Veneno', 78),
(89, 'Muk', 30, 1.2, 'Veneno', 84),
(90, 'Shellder', 4, 0.3, 'Água', 76),
(91, 'Cloyster', 132.5, 1.5, 'Água / Gelo', 82),
(92, 'Gastly', 0.1, 1.3, 'Fantasma / Veneno', 76),
(93, 'Haunter', 0.1, 1.6, 'Fantasma / Veneno', 81),
(94, 'Gengar', 40.5, 1.5, 'Fantasma / Veneno', 87),
(95, 'Onix', 210, 8.8, 'Pedra / Terra', 84),
(96, 'Drowzee', 32.4, 1, 'Psíquico', 75),
(97, 'Hypno', 75.6, 1.6, 'Psíquico', 81),
(98, 'Krabby', 6.5, 0.4, 'Água', 76),
(99, 'Kingler', 60, 1.3, 'Água', 81),
(100, 'Voltorb', 10.4, 0.5, 'Elétrico', 77),
(101, 'Electrode', 66.6, 1.2, 'Elétrico', 83),
(102, 'Exeggcute', 2.5, 0.4, 'Grama / Psíquico', 77),
(103, 'Exeggutor', 120, 2, 'Grama / Psíquico', 84),
(104, 'Cubone', 6.5, 0.4, 'Terra', 78),
(105, 'Marowak', 45, 1, 'Terra', 83),
(106, 'Hitmonlee', 49.8, 1.5, 'Lutador', 75),
(107, 'Hitmonchan', 50.2, 1.4, 'Lutador', 83),
(108, 'Lickitung', 65.5, 1.2, 'Normal', 83),
(109, 'Koffing', 1, 0.6, 'Veneno', 78),
(110, 'Weezing', 9.5, 1.2, 'Veneno', 82),
(111, 'Rhyhorn', 115, 1, 'Terra / Pedra', 79),
(112, 'Rhydon', 120, 1.9, 'Terra / Pedra', 85),
(113, 'Chansey', 34.6, 1.1, 'Normal', 81),
(114, 'Tangela', 35, 1, 'Grama', 77),
(115, 'Kangaskhan', 80, 2.2, 'Normal', 80),
(116, 'Horsea', 8, 0.4, 'Água', 74),
(117, 'Seadra', 25, 1.2, 'Água', 82),
(118, 'Goldeen', 15, 0.6, 'Água', 76),
(119, 'Seaking', 39, 1.3, 'Água', 83),
(120, 'Staryu', 34.5, 0.8, 'Água', 77),
(121, 'Starmie', 80, 1.1, 'Água / Psíquico', 80),
(122, 'Mr. Mime', 54.5, 1.3, 'Psíquico / Fada', 81),
(123, 'Scyther', 56, 1.5, 'Inseto / Voador', 81),
(124, 'Jynx', 40.6, 1.4, 'Gelo / Psíquico', 80),
(125, 'Electabuzz', 30, 1.1, 'Elétrico', 81),
(126, 'Magmar', 44.5, 1.3, 'Fogo', 84),
(127, 'Pinsir', 55, 1.5, 'Inseto', 80),
(128, 'Tauros', 88.4, 1.4, 'Normal', 82),
(129, 'Magikarp', 10, 0.9, 'Água', 60),
(130, 'Gyarados', 235, 6.5, 'Água / Voador', 89),
(131, 'Lapras', 220, 2.5, 'Água / Gelo', 86),
(132, 'Ditto', 4, 0.3, 'Normal', 100),
(133, 'Eevee', 6.5, 0.3, 'Normal', 75),
(134, 'Vaporeon', 29, 1, 'Água', 83),
(135, 'Jolteon', 24.5, 0.8, 'Elétrico', 83),
(136, 'Flareon', 25, 0.9, 'Fogo', 83),
(137, 'Porygon', 36.5, 0.8, 'Normal', 80),
(138, 'Omanyte', 7.5, 0.4, 'Pedra / Água', 78),
(139, 'Omastar', 35, 1, 'Pedra / Água', 82),
(140, 'Kabuto', 11.5, 0.5, 'Pedra / Água', 74),
(141, 'Kabutops', 40.5, 1.3, 'Pedra / Água', 83),
(142, 'Aerodactyl', 59, 1.8, 'Pedra', 84),
(143, 'Snorlax', 460, 2.1, 'Normal', 88),
(144, 'Articuno', 55.4, 1.7, 'Gelo / Voador', 92),
(145, 'Zapdos', 52.6, 1.6, 'Elétrico / Voador', 92),
(146, 'Moltres', 60, 2, 'Fogo / Voador', 92),
(147, 'Dratini', 3.3, 1.8, 'Dragão', 82),
(148, 'Dragonair', 16.5, 4, 'Dragão', 87),
(149, 'Dragonite', 210, 2.2, 'Dragão / Voador', 93),
(150, 'Mewtwo', 122, 2, 'Psíquico', 98),
(151, 'Mew', 4, 0.4, 'Psíquico', 90);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`idPlayer`);

--
-- Índices para tabela `player_wallet`
--
ALTER TABLE `player_wallet`
  ADD PRIMARY KEY (`idTransacao`),
  ADD KEY `fk_pokemon` (`idPokemon`);

--
-- Índices para tabela `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`idPokemon`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `player`
--
ALTER TABLE `player`
  MODIFY `idPlayer` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `player_wallet`
--
ALTER TABLE `player_wallet`
  MODIFY `idTransacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `player_wallet`
--
ALTER TABLE `player_wallet`
  ADD CONSTRAINT `fk_pokemon` FOREIGN KEY (`idPokemon`) REFERENCES `pokemon` (`idPokemon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
