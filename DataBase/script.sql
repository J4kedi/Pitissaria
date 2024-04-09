-- Criando o database pitissatiaDB
CREATE DATABASE IF NOT EXISTS pitissaria;

-- Usar o DB
USE pitissariadb;

-- Criando a tabela pizzaiolo
CREATE TABLE IF NOT EXISTS pizzaiolo (
  id_pizzaiolo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome varchar(100) NOT NULL,
  usuario varchar(50) UNIQUE NOT NULL,
  senha varchar(32) NOT NULL,
  cpf varchar(14) UNIQUE,
  email VARCHAR(50) UNIQUE NOT NULL,
  num_telefone VARCHAR(14),
  carga_horaria int,
  entrada_saida TIMESTAMP
);

-- Criando a tabela administrador
CREATE TABLE IF NOT EXISTS administrador (
  id_adm INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome varchar(100) NOT NULL,
  usuario varchar(50) UNIQUE NOT NULL,
  senha varchar(32) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL
);

-- Criando a tabela de usuario
CREATE TABLE IF NOT EXISTS user (
  id_cliente INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  usuario VARCHAR(50) UNIQUE NOT NULL,
  cpf VARCHAR(14) UNIQUE,
  email VARCHAR(50) UNIQUE NOT NULL,
  senha VARCHAR(32) NOT NULL,
  dt_nascimento DATE,
  num_telefone VARCHAR(14),
  tipo_usuario ENUM('cliente', 'pizzaiolo') DEFAULT 'cliente',
  CONSTRAINT ck_tipo_usuario CHECK (tipo_usuario IN ('cliente', 'pizzaiolo'))
);

-- Criando a tabela de endereços dos usuários
CREATE TABLE IF NOT EXISTS endereco_usuario (
  id_endereco INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  endereco VARCHAR(200) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  estado VARCHAR(50) NOT NULL,
  cep VARCHAR(10) NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES user(id_cliente)
);

-- Criando a tabela de ingredientes
CREATE TABLE IF NOT EXISTS ingredientes (
  id_ingrediente INT PRIMARY KEY AUTO_INCREMENT,
  nome_ingrediente VARCHAR(100) NOT NULL,
  dt_validade DATE NOT NULL,
  preco_compra DECIMAL(20, 2) NOT NULL
);

-- Criando a tabela de estoque
CREATE TABLE IF NOT EXISTS estoque (
  id_estoque INT PRIMARY KEY AUTO_INCREMENT,
  id_ingrediente INT NOT NULL,
  quantidade_ingrediente FLOAT NOT NULL,
  quantidade_minima FLOAT DEFAULT 10,
  FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id_ingrediente),
  CHECK (quantidade_ingrediente >= 0)
);

-- Criando a tabela de pizzas montadas pelos clientes
CREATE TABLE IF NOT EXISTS montadas_cliente (
  id_pizza INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50),
  data_montagem DATE
);

-- Criando a tabela de ingredientes das pizzas montadas pelos clientes
CREATE TABLE IF NOT EXISTS ingredientes_pizza (
  id_ingrediente_pizza INT PRIMARY KEY AUTO_INCREMENT,
  id_pizza INT NOT NULL,
  id_ingrediente INT NOT NULL,
  quantidade FLOAT NOT NULL,
  FOREIGN KEY (id_pizza) REFERENCES montadas_cliente(id_pizza),
  FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id_ingrediente)
);

-- Criando a tabela de pizzas já existentes
CREATE TABLE IF NOT EXISTS pizza (
  id_pizza INT PRIMARY KEY,
  nome varchar(100),
  ingrediente text
);

-- Criando a tabela de logs de consultas de estoque
CREATE TABLE IF NOT EXISTS logs_consultas (
    id_log INT PRIMARY KEY AUTO_INCREMENT,
    nome_ingrediente VARCHAR(100),
    quantidade_minima_consultada FLOAT,
    quantidade_disponivel FLOAT,
    data_consulta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nome_ingrediente) REFERENCES ingredientes(nome_ingrediente) ON DELETE CASCADE
);

-- Criando a tabela de logs de alertas de estoque
CREATE TABLE IF NOT EXISTS logs_alertas (
    id_alerta INT PRIMARY KEY AUTO_INCREMENT,
    nome_ingrediente VARCHAR(100),
    quantidade_minima FLOAT,
    quantidade_disponivel FLOAT,
    data_alerta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nome_ingrediente) REFERENCES ingredientes(nome_ingrediente) ON DELETE CASCADE
);

-- Criando a tabela de logs de acesso
CREATE TABLE IF NOT EXISTS logs_acesso (
    id_log_acesso INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    tipo_usuario ENUM('cliente', 'administrador', 'pizzaiolo') NOT NULL,
    data_acesso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES user(id_cliente) ON DELETE CASCADE
);

-- Criando a tabela de logs de alterações nos dados
CREATE TABLE IF NOT EXISTS logs_alteracoes (
    id_log_alteracao INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    tipo_usuario ENUM('cliente', 'administrador', 'pizzaiolo') NOT NULL,
    tabela_afetada VARCHAR(50) NOT NULL,
    tipo_operacao ENUM('insercao', 'atualizacao', 'exclusao') NOT NULL,
    data_alteracao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES user(id_cliente) ON DELETE CASCADE
);

-- Criando a view para clientes
CREATE OR REPLACE VIEW view_clientes AS
SELECT id_cliente, nome, cpf, email, dt_nascimento, endereco, num_telefone
FROM user
WHERE tipo_usuario = 'cliente';

-- Criando a view para administradores
CREATE OR REPLACE VIEW view_administradores AS
SELECT id_adm, Nome, email
FROM administrador;

-- Criando a view para pizzas montadas pelos clientes
CREATE OR REPLACE VIEW view_pizzas_montadas AS
SELECT id_pizza, nome, data_montagem
FROM montadas_cliente;

-- Criando a view para pizzas existentes
CREATE OR REPLACE VIEW view_pizzas_existentes AS
SELECT id_pizza, nome, ingredientes
FROM pizzas;

-- Criando a view para endereços dos clientes
CREATE OR REPLACE VIEW view_enderecos_clientes AS
SELECT id_endereco, id_usuario, endereco, cidade, estado, cep
FROM endereco_usuario;

-- Delimitador para definir o corpo da procedure
DELIMITER //

-- Procedure para consultar o estoque com alerta
CREATE PROCEDURE ConsultarEstoqueComAlerta(
    IN nome_ingredientes VARCHAR(100),
    IN quantidade_minima FLOAT,
    IN margem_aceitavel FLOAT
)
BEGIN
    -- Declaração da variável para armazenar a quantidade disponível
    DECLARE quantidade_disponivel FLOAT;

    -- Consulta o estoque do ingrediente
    SELECT quantidade_ingrediente INTO quantidade_disponivel
    FROM estoque
    JOIN ingredientes ON estoque.id_ingrediente = ingredientes.id_ingrediente
    WHERE ingredientes.nome_ingrediente = nome_ingredientes;

    -- Registra log da consulta
    INSERT INTO logs_consultas (nome_ingrediente, quantidade_minima_consultada, quantidade_disponivel, data_consulta)
    VALUES (nome_ingredientes, quantidade_minima, quantidade_disponivel, NOW());

    -- Verifica se a quantidade mínima está acima da margem aceitável
    IF quantidade_disponivel >= quantidade_minima AND quantidade_disponivel <= (quantidade_minima + margem_aceitavel) THEN
        -- Retorna as informações do estoque
        SELECT nome_ingrediente, quantidade_ingrediente
        FROM ingredientes
        WHERE nome_ingrediente = nome_ingredientes;
    ELSE
        -- Registra alerta no log
        INSERT INTO logs_alertas (nome_ingrediente, quantidade_minima, quantidade_disponivel, data_alerta)
        VALUES (nome_ingredientes, quantidade_minima, quantidade_disponivel, NOW());
        
        -- Retorna mensagem de alerta
        SELECT 'Alerta: Estoque abaixo da margem aceitável' AS mensagem,
               nome_ingrediente,
               quantidade_ingrediente AS quantidade_disponivel,
               quantidade_minima AS quantidade_minima_necessaria,
               (quantidade_minima + margem_aceitavel) AS margem_aceitavel;
    END IF;
END //

-- Procedure para adicionar usuário (cliente)
CREATE PROCEDURE AdicionarUsuario(
    IN nome_cliente VARCHAR(100),
    IN cpf_cliente VARCHAR(20),
    IN email_cliente VARCHAR(50),
    IN dt_nascimento DATE,
    IN endereco_cliente VARCHAR(200),
    IN num_telefone_cliente VARCHAR(20)
)
BEGIN
    -- Insere o novo usuário na tabela de usuários
    INSERT INTO user (nome, cpf, email, dt_nascimento, endereco, num_telefone)
    VALUES (nome_cliente, cpf_cliente, email_cliente, dt_nascimento, endereco_cliente, num_telefone_cliente);

    -- Registra log de inserção de usuário
    INSERT INTO logs_alteracoes (id_usuario, tipo_usuario, tabela_afetada, tipo_operacao)
    VALUES (LAST_INSERT_ID(), 'cliente', 'user', 'insercao');
END //

-- Procedure para adicionar administrador
CREATE PROCEDURE AdicionarAdministrador(
    IN nome_administrador VARCHAR(100),
    IN senha_administrador VARCHAR(50),
    IN email_administrador VARCHAR(50)
)
BEGIN
    -- Insere o novo administrador na tabela de administradores
    INSERT INTO administrador (Nome, senha, email)
    VALUES (nome_administrador, senha_administrador, email_administrador);

    -- Registra log de inserção de administrador
    INSERT INTO logs_alteracoes (id_usuario, tipo_usuario, tabela_afetada, tipo_operacao)
    VALUES (LAST_INSERT_ID(), 'administrador', 'administrador', 'insercao');
END //

-- Procedure para adicionar nova pizza
CREATE PROCEDURE AdicionarPizza(
    IN id_pizza INT,
    IN nome_pizza VARCHAR(100),
    IN ingredientes_pizza TEXT
)
BEGIN
    -- Insere a nova pizza na tabela de pizzas
    INSERT INTO pizzas (id_pizza, nome, ingredientes)
    VALUES (id_pizza, nome_pizza, ingredientes_pizza);

    -- Registra log de inserção de pizza
    INSERT INTO logs_alteracoes (id_usuario, tipo_usuario, tabela_afetada, tipo_operacao)
    VALUES (LAST_INSERT_ID(), 'pizzaiolo', 'pizzas', 'insercao');
END //

-- Procedure para adicionar pizza montada pelo cliente
CREATE PROCEDURE AdicionarPizzaMontada(
    IN id_pizza INT,
    IN nome_cliente VARCHAR(50),
    IN ingredientes_pizza TEXT,
    IN data_montagem DATE
)
BEGIN
    -- Insere a pizza montada na tabela de pizzas montadas pelos clientes
    INSERT INTO montadas_cliente (id_pizza, nome, ingredientes, data_montagem)
    VALUES (id_pizza, nome_cliente, ingredientes_pizza, data_montagem);

    -- Registra log de inserção de pizza montada
    INSERT INTO logs_alteracoes (id_usuario, tipo_usuario, tabela_afetada, tipo_operacao)
    VALUES (LAST_INSERT_ID(), 'cliente', 'montadas_cliente', 'insercao');
END //

-- Procedure para alterar informações do usuário
CREATE PROCEDURE AlterarInformacoesUsuario(
    IN id_usuario INT,
    IN novo_numero_telefone VARCHAR(20),
    IN novo_endereco VARCHAR(200),
    IN nova_cidade VARCHAR(100),
    IN novo_estado VARCHAR(50),
    IN novo_cep VARCHAR(10),
    IN novo_email VARCHAR(50),
    IN nova_senha VARCHAR(50) -- Nova senha será armazenada como um hash
)
BEGIN
    -- Atualiza o número de telefone
    UPDATE user
    SET num_telefone = novo_numero_telefone
    WHERE id_cliente = id_usuario;

    -- Atualiza o endereço na tabela de endereços
    INSERT INTO endereco_usuario (id_usuario, endereco, cidade, estado, cep)
    VALUES (id_usuario, novo_endereco, nova_cidade, novo_estado, novo_cep)
    ON DUPLICATE KEY UPDATE
    endereco = novo_endereco,
    cidade = nova_cidade,
    estado = novo_estado,
    cep = novo_cep;

    -- Atualiza o email
    UPDATE user
    SET email = novo_email
    WHERE id_cliente = id_usuario;

    -- Atualiza a senha (se necessário)
    IF nova_senha IS NOT NULL THEN
        UPDATE user
        SET senha = nova_senha
        WHERE id_cliente = id_usuario;
    END IF;
    
    -- Registra log de alteração de informações do usuário
    INSERT INTO logs_alteracoes (id_usuario, tipo_usuario, tabela_afetada, tipo_operacao)
    VALUES (id_usuario, 'cliente', 'user', 'atualizacao');
END //

-- Adicionando índices para melhorar o desempenho
CREATE INDEX IF NOT EXISTS idx_id_pizza ON montadas_cliente (id_pizza);
CREATE INDEX IF NOT EXISTS idx_id_ingrediente ON ingredientes (id_ingrediente);
CREATE INDEX IF NOT EXISTS idx_nome_ingrediente ON ingredientes (nome_ingrediente);
CREATE INDEX IF NOT EXISTS idx_id_usuario ON user (id_cliente);
CREATE INDEX IF NOT EXISTS idx_id_ingrediente_pizza ON ingredientes_pizza (id_ingrediente_pizza);

-- Restaurando o delimitador padrão
DELIMITER ;