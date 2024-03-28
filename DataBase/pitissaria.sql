---- Criando o database pitissatiaDB ----

CREATE DATABASE pitissariadb;

---- Usar o DB ----
USE pitissariadb;


---- Criando a tabela pizzaiolo ---
CREATE TABLE pizzaiolo (
  id_pizzaiolo INT AUTO_INCREMENT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50),
  cpf varchar(20),
  email VARCHAR(50),
  carga_horaria int
  entrada_saida TIMESTAMP
);

---- Criando a tabela administrador ---
CREATE TABLE administrador (
  id_adm INT AUTO_INCREMENT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50),
  email VARCHAR(50)
);

---- Criando a tabela de usuario ---
CREATE TABLE user(
	id_user int AUTO_INCREMENT NOT NULL,
  nome varchar(100),
  senha varchar(50)
  cpf varchar(20),
  email VARCHAR(50),
  dt_nasc DATE,
  nome_rua Varchar(100),
  cep varchar(20),
  num_res varchar(20)
  num_telefone varchar(20),
);

---- Criando a tabela de estoque ----
CREATE TABLE `ingredientes` (
  `id` int NOT NULL,
  `id_ingrediente` int NOT NULL,
  `nome_ingrediente` varchar(100) NOT NULL,
  `dt_validade` date NOT NULL,
  `quantidade_ingrediente` float NOT NULL,
  `preco_compra` decimal(20,2) NOT NULL 
);



--- Criando uma tabela para pizzas ja criadas anteriormente ----
CREATE TABLE montadas_cliente(
  id_pizza INT,
  nome varchar(50),
  ingredientes text
);

---- Criando a tabela de pizzas já existentes
CREATE TABLE pizzas(
  id_pizza INT,
  nome varchar(100),
  ingredientes text
);