-- 1. Criação da tabela Pessoas
CREATE TABLE Pessoas (
    pessoa_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    idade INT
);

-- 2. Criação da tabela Contato com relacionamento (Chave Estrangeira)
CREATE TABLE Contato (
    contato_id INT AUTO_INCREMENT PRIMARY KEY,
    pessoa_id INT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    
    -- Definindo a chave estrangeira vinculada à tabela Pessoas
    CONSTRAINT fk_contato_pessoa 
        FOREIGN KEY (pessoa_id) 
        REFERENCES Pessoas(pessoa_id)
        ON DELETE CASCADE 
        ON UPDATE CASCADE
);