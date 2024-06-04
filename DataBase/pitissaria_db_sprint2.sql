-- Derrubando banco de dados
DROP DATABASE IF EXISTS pitissariadb;

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS pitissariadb;
USE pitissariadb;

-- Tabela de ingredientes
CREATE TABLE IF NOT EXISTS ingredientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    preco DECIMAL(8,2) NOT NULL,
    data_entrada DATE NOT NULL,
    data_validade DATE NOT NULL,
    quantidade INT
);

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    tipo_usuario ENUM('cliente', 'pizzaiolo', 'gerente') DEFAULT 'cliente',
    data_nascimento DATE,
    celular VARCHAR(20),
    username VARCHAR(50)
);

-- ALTER TABLE usuarios ADD cor VARCHAR(50);

-- Tabela de endereços
CREATE TABLE IF NOT EXISTS enderecos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    num_res VARCHAR(4) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL
);

-- ALTER TABLE nome_da_tabela MODIFY COLUMN nome_da_coluna novo_tipo;

-- Tabela intermediária para a relação muitos para muitos entre usuários e endereços
CREATE TABLE IF NOT EXISTS usuario_endereco (
    usuario_id INT,
    endereco_id INT,
    PRIMARY KEY (usuario_id, endereco_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (endereco_id) REFERENCES enderecos(id)
);

-- Tabela de pizzas
CREATE TABLE IF NOT EXISTS pizzas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(8,2) NOT NULL,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) -- Restrição de chave estrangeira com a tabela usuarios
);

--  ALTER TABLE nome_da_tabela CHANGE COLUMN nome_antigo novo_nome novo_tipo;

-- Tabela de ingredientes das pizzas
CREATE TABLE IF NOT EXISTS ingredientes_pizzas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pizza INT,
    id_ingrediente INT,
    quantidade INT,
    FOREIGN KEY (id_pizza) REFERENCES pizzas(id), -- Restrição de chave estrangeira com a tabela pizzas
    FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id) -- Restrição de chave estrangeira com a tabela ingredientes
);

-- Tabela de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    data_pedido DATE,
    total DECIMAL(8,2) NOT NULL,
    endereco_entrega_id INT,
    status_pedido VARCHAR(50) DEFAULT 'Preparando',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (endereco_entrega_id) REFERENCES enderecos(id)
);

-- Tabela de itens do pedido para pizzas
CREATE TABLE IF NOT EXISTS itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_pizza INT,
    quantidade INT,
    preco_unitario DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_pizza) REFERENCES pizzas(id)
);

-- Inserção de dados de exemplo
INSERT INTO ingredientes (nome, preco, data_entrada, data_validade, quantidade) VALUES
('Molho de tomate', 5.00, '2021-05-01', '2024-12-01', 1000),
('mossarela', 10.00, '2021-05-01', '2024-12-01', 1000),
('Calabresa', 15.00, '2021-05-01', '2024-12-01', 1000),
('Catupiry', 20.00, '2021-05-01', '2024-12-01', 1000),
('Pepperoni', 25.00, '2021-05-01', '2024-12-01', 1000),
('Azeitona', 5.00, '2021-05-01', '2024-12-01', 1000),
('Cebola', 5.00, '2021-05-01', '2024-12-01', 1000),
('Tomate', 5.00, '2021-05-01', '2024-12-01', 1000),
('Manjericao', 5.00, '2021-05-01', '2024-12-01', 1000),
('Presunto', 10.00, '2021-05-01', '2024-12-01', 1000),
('Ovo', 5.00, '2021-05-01', '2024-12-01', 1000),
('Ervilha', 5.00, '2021-05-01', '2024-12-01', 1000),
('Gorgonzola', 15.00, '2021-05-01', '2024-12-01', 1000),
('Parmesão', 10.00, '2021-05-01', '2024-12-01', 1000),
('Queijo', 4.00, '2021-05-01', '2024-12-01', 1000),
('Bacon', 3.00, '2024-05-01', '2024-12-01', 1000),
('Camarão', 8.00, '2024-05-01', '2024-12-01', 1000),
('Chocolate', 8.00, '2024-05-01', '2024-12-01', 1000),
('Banana', 8.00, '2024-05-01', '2024-12-01', 1000),
('Orégano', 8.00, '2024-05-01', '2024-12-01', 1000),
('Canela', 8.00, '2024-05-01', '2024-12-01', 1000),
('Creme de leite', 8.00, '2024-05-01', '2024-12-01', 1000),
('Milho', 2.00, '2024-05-01', '2024-12-01', 1000),
('Frango', 8.00, '2024-05-01', '2024-12-01', 1000);

-- Inserir alguns registros na tabela de usuários
INSERT INTO usuarios (nome, email, senha, cpf, tipo_usuario, data_nascimento, celular, username)
VALUES ('João', 'joao@email.com', md5('123'), '123.456.789-01', 'cliente', '1990-05-20', '999999999', 'joao123'),
       ('Maria', 'maria@email.com', md5('123'), '987.654.321-09', 'cliente', '1988-08-15', '888888888', 'maria456'),
       ('Pizzaiolo1', 'pizzaiolo1@email.com', md5('123'), '111.111.111-11', 'pizzaiolo', '1995-01-15', '111111111', 'pizzaiolo1'),
       ('Pizzaiolo2', 'pizzaiolo2@email.com', md5('123'), '222.222.222-22', 'pizzaiolo', '1990-03-25', '222222222', 'pizzaiolo2'),
       ('Gerente1', 'gerente1@email.com', md5('123'), '333.333.333-33', 'gerente', '1980-07-10', '333333333', 'gerente1'),
       ('Gerente2', 'gerente2@email.com', md5('123'), '444.444.444-44', 'gerente', '1975-11-20', '444444444', 'gerente2');

-- Inserir alguns registros na tabela de endereços
INSERT INTO enderecos (cep, rua, num_res, cidade, estado)
VALUES ('12345-678', 'Rua A', '123', 'Cidade A', 'Paraná'),
       ('98765-432', 'Rua B', '456', 'Cidade B', 'Paraná');

-- Associar usuários aos endereços na tabela intermediária
INSERT INTO usuario_endereco (usuario_id, endereco_id)
VALUES (1, 1), -- João com endereço da Rua A
	   (1, 2),
       (2, 2), -- Maria com endereço da Rua B
       (3, 2),
       (4, 2),
       (5, 1),
       (6, 1),
       (5, 2);

-- ADICIONANDO PIZZAS (O ID É O ID DA PIZZA QUE ESTÁ NO ARQUIVO SCRIPT.JS))
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Calabresa", "calabresa queijo azeitona ", 20, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Pepperoni", "tomate queijo mossarela pepperoni", 30, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Marguerita", "tomate queijo mossarela manjericao", 25, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Portuguesa", "tomate queijo mossarela presunto ovo ervilha", 35, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Quatro queijos", "tomate queijo mossarela gorgonzola parmesao catupiry", 40, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Frango catupiry", "tomate queijo mossarela frango catupiry", 35, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Bacon", "azeitona oregano ovos bacon queijo mossarela ", 25, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ("Camarao", "camarao mossarela oregano", 45, 1);
INSERT INTO pizzas(nome, descricao, preco, id_usuario) VALUES ('Banana com chocolate', 'banana chocolate canela creme de leite mossarela', 40, 1);

select * from usuarios;
select * from enderecos;
select * from usuario_endereco;
select * from pizzas;
select * from ingredientes;

SELECT e.cep, e.rua, e.num_res, e.cidade, e.estado
FROM usuarios u
INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id
INNER JOIN enderecos e ON ue.endereco_id = e.id
WHERE u.id = 5;
SELECT * FROM enderecos WHERE cep = "12345-678" AND num_res = 123;