---- Criando o database pitissatiaDB ----

CREATE DATABASE pitissariadb;

---- Usar o DB ----
USE pitissariadb;


---- Criando a tabela pizzaiolo ---
CREATE TABLE pizzaiolo (
  id_pizzaiolo INT AUTO_INCREMENT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50)
);

---- Criando a tabela administrador ---
CREATE TABLE administrador (
  id_adm INT AUTO_INCREMENT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50)
);

---- Criando a tabela de usuario ---
CREATE TABLE user(
	id_user int AUTO_INCREMENT NOT NULL,
  nome varchar(100),
  senha varchar(50)
);

---- Criando a tabela de estoque ----
CREATE TABLE estoque(
	farinha FLOAT,
  sal FLOAT,
  fermento FLOAT,
  acucar FLOAT,
  ovo FLOAT,
  oleo FLOAT,
  tomate FLOAT,
  molho_de_tomate FLOAT,	
  queijo_mussarela FLOAT,
  queijo_parmesao FLOAT,
  presunto FLOAT,
  calabresa FLOAT,
  bacon FLOAT,
  champignon FLOAT,
  cebola FLOAT,
  pimentao FLOAT,
  azeitona FLOAT,
  milho FLOAT,
  ervilha FLOAT,
  palmito FLOAT,
  alho FLOAT,
  oregano FLOAT,
  manjericao FLOAT,
  requeijao_cremoso FLOAT,
  queijo_provolone FLOAT,
  queijo_gorgonzola FLOAT,
  queijo_cheddar FLOAT,
  frango FLOAT,
  carne_bovina FLOAT,
  linguica FLOAT,
  camarao FLOAT,
  atum FLOAT,
  salmao FLOAT,
  anchova FLOAT,
  alcaparra FLOAT,
  banana FLOAT,
  abacaxi FLOAT,
  morango FLOAT,
  chocolate FLOAT,
  creme_de_leite FLOAT,
  leite_condensado FLOAT,
  batata_palha FLOAT
)

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


CREATE TABLE pedido(
  id_pedido INT,
  
);