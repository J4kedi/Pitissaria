/* Pitissaria_logico: */

DROP DATABASE pitissariadb;

CREATE DATABASE pitissariadb;

USE pitissariadb;

CREATE TABLE user_endereco_user (
    id_user INT AUTO_INCREMENT,
    nome VARCHAR(100),
    tp_user VARCHAR(100) DEFAULT "cliente",
    username VARCHAR(100),
    cpf VARCHAR(15) UNIQUE,
    email VARCHAR(100),
    senha VARCHAR(100),
    dt_nasc DATE,
    num_telefone VARCHAR(20),
    estado VARCHAR(100),
    cep VARCHAR(15),
    cidade VARCHAR(100),
    rua VARCHAR(100)
);

CREATE TABLE ingrediente (
    id_ingrediente INT AUTO_INCREMENT PRIMARY KEY,
    nome_ingrediente VARCHAR(100),
    dt_validade DATE,
    quantidade_ingrediente VARCHAR(100),
    preco_compra VARCHAR(100),
    fk_estoque_id_estoque INT
);

CREATE TABLE estoque (
    id_estoque INT AUTO_INCREMENT PRIMARY KEY,
    quantidade_minima FLOAT,
    quantidade_ingrediente FLOAT
);

CREATE TABLE pizza (
    id_pizza INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
);

CREATE TABLE pizza_compradas(
    id_pizza_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_user_endereco_user INT,
    id_pizza INT,
    status_pizza ENUM('value_1','value_2','value_3'),  
);

CREATE TABLE pizza_montada (
    id_pizza_montada INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    data_montagem DATE
);

CREATE TABLE possui (
    fk_ingrediente_id_ingrediente INT,
    fk_pizza_id_pizza INT
);

CREATE TABLE monta (
    fk_user_endereco_user_id_user INT,
    fk_user_endereco_user_id_endereco INT,
    fk_pizza_montada_id_pizza_montada INT
);

CREATE TABLE pede (
    fk_user_endereco_user_id_user INT,
    fk_user_endereco_user_id_endereco INT,
    fk_pizza_id_pizza INT
);

ALTER TABLE pizza_compradas ADD CONSTRAINT FK_user_endereco_user
    FOREIGN KEY (id_user_endereco_user)
    REFERENCES user_endereco_user(id_user);

ALTER TABLE pizza_compradas ADD CONSTRAINT FK_id_pizza
    FOREIGN KEY(id_pizza)
    REFERENCES pizza (id_pizza)
 
ALTER TABLE ingrediente ADD CONSTRAINT FK_ingrediente_2
    FOREIGN KEY (fk_estoque_id_estoque)
    REFERENCES estoque (id_estoque)
    ON DELETE CASCADE;
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_1
    FOREIGN KEY (fk_ingrediente_id_ingrediente)
    REFERENCES ingrediente (id_ingrediente)
    ON DELETE RESTRICT;
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_2
    FOREIGN KEY (fk_pizza_id_pizza)
    REFERENCES pizza (id_pizza)
    ON DELETE RESTRICT;
 
ALTER TABLE monta ADD CONSTRAINT FK_monta_1
    FOREIGN KEY (fk_user_endereco_user_id_user, fk_user_endereco_user_id_endereco)
    REFERENCES user_endereco_user (id_user, id_endereco)
    ON DELETE SET NULL;
 
ALTER TABLE monta ADD CONSTRAINT FK_monta_2
    FOREIGN KEY (fk_pizza_montada_id_pizza_montada)
    REFERENCES pizza_montada (id_pizza_montada)
    ON DELETE SET NULL;
 
ALTER TABLE pede ADD CONSTRAINT FK_pede_1
    FOREIGN KEY (fk_user_endereco_user_id_user, fk_user_endereco_user_id_endereco)
    REFERENCES user_endereco_user (id_user, id_endereco)
    ON DELETE SET NULL;
 
ALTER TABLE pede ADD CONSTRAINT FK_pede_2
    FOREIGN KEY (fk_pizza_id_pizza)
    REFERENCES pizza (id_pizza)
    ON DELETE SET NULL;


-- Criando Gerente
INSERT INTO user_endereco_user(nome, tp_user, username, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua, id_endereco) VALUES ("Arthur", "gerente","Arthur", "07571839998", "arthurfhermes@gmail.com", md5("123"), "2005/03/13","41995664344", "Parana","81940210", "Curitiba", "Bortolo Pelanda", 1);


-- Criando Pizzaiolo
INSERT INTO user_endereco_user(nome, tp_user, username, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua, id_endereco) VALUES ("Ricardo", "pizzaiolo","Ricardo", "01661628930", "rapedreira@gmail.com", md5("123"), "2002/05/12","41478666784", "Parana","81510220", "Curitiba", "Agostinho Brusamolin", 2);


-- Select em todos os usuarios
SELECT * FROM user_endereco_user;