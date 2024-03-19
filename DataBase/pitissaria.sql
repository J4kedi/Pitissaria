CREATE DATABASE pitissariadb;
USE pitissariadb;

CREATE TABLE pizzaiolo (
  id_pizzaiolo INT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50)
);


CREATE TABLE administrador (
  id_adm INT NOT NULL,
  Nome varchar(100) NOT NULL,
  senha varchar(50)
);


CREATE TABLE user(
	id_user int,
    nome varchar(100),
    senha varchar(100)
);

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
);




