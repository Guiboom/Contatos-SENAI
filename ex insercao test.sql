-- 1. Inserindo 10 registros na tabela Pessoas
INSERT INTO Pessoas (nome, email, idade) VALUES
('Ana Silva', 'ana.silva@email.com', 28),
('Bruno Souza', 'bruno.souza@email.com', 34),
('Carlos Oliveira', 'carlos.oliveira@email.com', 45),
('Daniela Lima', 'daniela.lima@email.com', 22),
('Eduardo Santos', 'eduardo.santos@email.com', 31),
('Fernanda Costa', 'fernanda.costa@email.com', 29),
('Gabriel Rodrigues', 'gabriel.rodrigues@email.com', 40),
('Helena Martins', 'helena.martins@email.com', 52),
('Igor Pereira', 'igor.pereira@email.com', 19),
('Julia Carvalho', 'julia.carvalho@email.com', 26);

-- 2. Inserindo 10 registros na tabela Contato vinculados aos IDs de 1 a 10
INSERT INTO Contato (pessoa_id, tipo, numero) VALUES
(1, 'Celular', '(11) 99999-1111'),
(1, 'Residencial', '(11) 3333-1111'),
(2, 'WhatsApp', '(21) 98888-2222'),
(3, 'Comercial', '(31) 3222-3333'),
(3, 'Celular', '(31) 97777-3333'),
(4, 'Celular', '(41) 96666-4444'),
(5, 'WhatsApp', '(51) 95555-5555'),
(6, 'Residencial', '(61) 3444-6666'),
(7, 'Celular', '(71) 94444-7777'),
(8, 'Comercial', '(81) 3222-8888');