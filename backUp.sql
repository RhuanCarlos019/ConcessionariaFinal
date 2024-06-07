CREATE TABLE clientes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20)
);

CREATE TABLE carros (
    id SERIAL PRIMARY KEY,
    modelo VARCHAR(100),
    placa VARCHAR(10)
);

CREATE TABLE alugueis (
    id SERIAL PRIMARY KEY,
    cliente_id INT,
    carro_id INT,
    data_inicio TIMESTAMP,
    data_fim TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (carro_id) REFERENCES carros(id),
    UNIQUE (carro_id, data_inicio, data_fim)
);

CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    cargo VARCHAR(50)
);


-- Inserts Clientes

INSERT INTO clientes (nome, email, telefone) VALUES
('João Silva', 'joao.silva@example.com', '123456789'),
('Maria Oliveira', 'maria.oliveira@example.com', '987654321'),
('Carlos Souza', 'carlos.souza@example.com', '555123456'),
('Ana Lima', 'ana.lima@example.com', '444987654'),
('Pedro Santos', 'pedro.santos@example.com', '111222333'),
('Fernanda Costa', 'fernanda.costa@example.com', '666777888'),
('Paulo Ribeiro', 'paulo.ribeiro@example.com', '999000111'),
('Julia Mendes', 'julia.mendes@example.com', '222333444'),
('Ricardo Araujo', 'ricardo.araujo@example.com', '333444555'),
('Mariana Alves', 'mariana.alves@example.com', '444555666');

-- Inserts carros

INSERT INTO carros (modelo, placa) VALUES
('Ford Ka', 'ABC1234'),
('Chevrolet Onix', 'DEF5678'),
('Volkswagen Gol', 'GHI9012'),
('Fiat Uno', 'JKL3456'),
('Renault Sandero', 'MNO7890'),
('Toyota Corolla', 'PQR1234'),
('Honda Civic', 'STU5678'),
('Hyundai HB20', 'VWX9012'),
('Nissan Kicks', 'YZA3456'),
('Jeep Renegade', 'BCD7890');

-- Inserts alugueis

INSERT INTO alugueis (cliente_id, carro_id, data_inicio, data_fim) VALUES
(1, 1, '2024-06-01 08:00:00', '2024-06-05 18:00:00'),
(2, 2, '2024-06-02 09:00:00', '2024-06-06 19:00:00'),
(3, 3, '2024-06-03 10:00:00', '2024-06-07 20:00:00'),
(4, 4, '2024-06-04 11:00:00', '2024-06-08 21:00:00'),
(5, 5, '2024-06-05 12:00:00', '2024-06-09 22:00:00'),
(6, 6, '2024-06-06 13:00:00', '2024-06-10 23:00:00'),
(7, 7, '2024-06-07 14:00:00', '2024-06-11 00:00:00'),
(8, 8, '2024-06-08 15:00:00', '2024-06-12 01:00:00'),
(9, 9, '2024-06-09 16:00:00', '2024-06-13 02:00:00'),
(10, 10, '2024-06-10 17:00:00', '2024-06-14 03:00:00');

-- Inserts funcionários

INSERT INTO funcionarios (nome, email, cargo) VALUES
('Alice Ferreira', 'alice.ferreira@example.com', 'Gerente'),
('Bruno Rocha', 'bruno.rocha@example.com', 'Vendedor'),
('Clara Martins', 'clara.martins@example.com', 'Mecânico'),
('Daniel Barbosa', 'daniel.barbosa@example.com', 'Vendedor'),
('Elena Nunes', 'elena.nunes@example.com', 'Assistente'),
('Fábio Mendes', 'fabio.mendes@example.com', 'Gerente'),
('Gustavo Almeida', 'gustavo.almeida@example.com', 'Mecânico'),
('Helena Costa', 'helena.costa@example.com', 'Vendedor'),
('Igor Lima', 'igor.lima@example.com', 'Assistente'),
('Juliana Pereira', 'juliana.pereira@example.com', 'Vendedor');

-- MAIS 15 INSERTS DE CADA TABELA

-- Clientes

INSERT INTO clientes (nome, email, telefone) VALUES
('João Silva', 'joao@example.com', '(11) 1234-5678'),
('Maria Santos', 'maria@example.com', '(21) 9876-5432'),
('Pedro Oliveira', 'pedro@example.com', '(31) 2468-1357'),
('Ana Souza', 'ana@example.com', '(41) 3698-7412'),
('Carlos Ferreira', 'carlos@example.com', '(51) 7531-8426'),
('Fernanda Lima', 'fernanda@example.com', '(61) 9874-1236'),
('Rafaela Costa', 'rafaela@example.com', '(71) 3698-7412'),
('Lucas Martins', 'lucas@example.com', '(81) 1357-2468'),
('Amanda Oliveira', 'amanda@example.com', '(91) 7531-8426'),
('Rodrigo Santos', 'rodrigo@example.com', '(10) 9874-1236'),
('Juliana Pereira', 'juliana@example.com', '(12) 3698-7412'),
('Bruno Silva', 'bruno@example.com', '(13) 1357-2468'),
('Mariana Souza', 'mariana@example.com', '(14) 7531-8426'),
('Gustavo Costa', 'gustavo@example.com', '(15) 9874-1236'),
('Laura Ferreira', 'laura@example.com', '(16) 3698-7412');

-- Funcionários

INSERT INTO funcionarios (nome, email, cargo) VALUES
('Marcos Oliveira', 'marcos@example.com', 'Gerente'),
('Camila Santos', 'camila@example.com', 'Vendedor'),
('Luiz Silva', 'luiz@example.com', 'Vendedor'),
('Roberta Souza', 'roberta@example.com', 'Vendedor'),
('Renato Costa', 'renato@example.com', 'Vendedor'),
('Ana Paula Ferreira', 'anapaula@example.com', 'Vendedor'),
('José Lima', 'jose@example.com', 'Vendedor'),
('Mariana Oliveira', 'mariana@example.com', 'Vendedor'),
('Felipe Santos', 'felipe@example.com', 'Vendedor'),
('Tatiane Silva', 'tatiane@example.com', 'Vendedor'),
('Pedro Henrique', 'pedro@example.com', 'Vendedor'),
('Fernanda Lima', 'fernanda@example.com', 'Vendedor'),
('Carlos Eduardo', 'carlos@example.com', 'Vendedor'),
('Vanessa Costa', 'vanessa@example.com', 'Vendedor'),
('Lucas Oliveira', 'lucas@example.com', 'Vendedor');


-- Carros

INSERT INTO carros (modelo, placa) VALUES
('Toyota Corolla', 'ABC-1234'),
('Honda Civic', 'DEF-5678'),
('Volkswagen Gol', 'GHI-9012'),
('Chevrolet Onix', 'JKL-3456'),
('Ford Fiesta', 'MNO-7890'),
('Fiat Palio', 'PQR-1234'),
('Renault Kwid', 'STU-5678'),
('Hyundai HB20', 'VWX-9012'),
('Nissan Versa', 'YZA-3456'),
('Kia Sportage', 'BCD-7890'),
('BMW Série 3', 'EFG-1234'),
('Mercedes-Benz Classe C', 'HIJ-5678'),
('Audi A3', 'KLM-9012'),
('Volvo XC40', 'PQR-3456'),
('Mitsubishi Outlander', 'STU-7890');

-- Alugueis

INSERT INTO alugueis (cliente_id, carro_id, data_inicio, data_fim) VALUES
(1, 1, '2024-06-01 08:00:00', '2024-06-03 18:00:00'),
(2, 2, '2024-06-02 10:00:00', '2024-06-05 15:00:00'),
(3, 3, '2024-06-03 09:00:00', '2024-06-06 12:00:00'),
(4, 4, '2024-06-04 07:00:00', '2024-06-07 14:00:00'),
(5, 5, '2024-06-05 11:00:00', '2024-06-08 16:00:00'),
(6, 6, '2024-06-06 12:00:00', '2024-06-09 17:00:00'),
(7, 7, '2024-06-07 13:00:00', '2024-06-10 11:00:00'),
(8, 8, '2024-06-08 14:00:00', '2024-06-11 10:00:00'),
(9, 9, '2024-06-09 15:00:00', '2024-06-12 09:00:00'),
(10, 10, '2024-06-10 16:00:00', '2024-06-13 08:00:00'),
(11, 11, '2024-06-11 17:00:00', '2024-06-14 07:00:00'),
(12, 12, '2024-06-12 18:00:00', '2024-06-15 06:00:00'),
(13, 13, '2024-06-13 19:00:00', '2024-06-16 17:00:00'),
(14, 14, '2024-06-14 20:00:00', '2024-06-17 16:00:00'),
(15, 15, '2024-06-15 21:00:00', '2024-06-18 15:00:00');

-- MAIS 25 INSERTS 

-- Clientes

INSERT INTO clientes (nome, email, telefone) VALUES
('Ana Oliveira', 'ana@example.com', '(11) 1234-5678'),
('Marcos Santos', 'marcos@example.com', '(21) 9876-5432'),
('Carla Pereira', 'carla@example.com', '(31) 2468-1357'),
('Ricardo Souza', 'ricardo@example.com', '(41) 3698-7412'),
('Renata Ferreira', 'renata@example.com', '(51) 7531-8426'),
('Gustavo Lima', 'gustavo@example.com', '(61) 9874-1236'),
('Juliana Costa', 'juliana@example.com', '(71) 3698-7412'),
('Lucas Oliveira', 'lucas@example.com', '(81) 1357-2468'),
('Amanda Santos', 'amanda@example.com', '(91) 7531-8426'),
('Roberto Silva', 'roberto@example.com', '(10) 9874-1236'),
('Camila Pereira', 'camila@example.com', '(12) 3698-7412'),
('Bruno Santos', 'bruno@example.com', '(13) 1357-2468'),
('Mariana Ferreira', 'mariana@example.com', '(14) 7531-8426'),
('Fernando Costa', 'fernando@example.com', '(15) 9874-1236'),
('Laura Oliveira', 'laura@example.com', '(16) 3698-7412'),
('João Oliveira', 'joao@example.com', '(17) 1234-5678'),
('Sandra Santos', 'sandra@example.com', '(18) 9876-5432'),
('Felipe Pereira', 'felipe@example.com', '(19) 2468-1357'),
('Ana Souza', 'ana2@example.com', '(20) 3698-7412'),
('Paulo Ferreira', 'paulo@example.com', '(21) 7531-8426'),
('Marta Lima', 'marta@example.com', '(22) 9874-1236'),
('Rodrigo Costa', 'rodrigo@example.com', '(23) 3698-7412'),
('Cristina Oliveira', 'cristina@example.com', '(24) 1357-2468'),
('Luciana Santos', 'luciana@example.com', '(25) 7531-8426');

--Funcionários 

INSERT INTO funcionarios (nome, email, cargo) VALUES
('Mariana Silva', 'mariana@example.com', 'Gerente'),
('Pedro Santos', 'pedro@example.com', 'Vendedor'),
('Luiza Oliveira', 'luiza@example.com', 'Vendedor'),
('Diego Souza', 'diego@example.com', 'Vendedor'),
('Fernanda Costa', 'fernanda@example.com', 'Vendedor'),
('Thiago Lima', 'thiago@example.com', 'Vendedor'),
('Gabriela Santos', 'gabriela@example.com', 'Vendedor'),
('Lucas Pereira', 'lucas@example.com', 'Vendedor'),
('Vanessa Ferreira', 'vanessa@example.com', 'Vendedor'),
('Gustavo Oliveira', 'gustavo@example.com', 'Vendedor'),
('Marcela Silva', 'marcela@example.com', 'Vendedor'),
('Rafaela Costa', 'rafaela@example.com', 'Vendedor'),
('Ricardo Santos', 'ricardo@example.com', 'Vendedor'),
('Aline Pereira', 'aline@example.com', 'Vendedor'),
('Carlos Silva', 'carlos@example.com', 'Vendedor'),
('André Santos', 'andre@example.com', 'Vendedor'),
('Luana Oliveira', 'luana@example.com', 'Vendedor'),
('Bruno Costa', 'bruno@example.com', 'Vendedor'),
('Carolina Souza', 'carolina@example.com', 'Vendedor'),
('Roberto Santos', 'roberto@example.com', 'Vendedor'),
('Jéssica Lima', 'jessica@example.com', 'Vendedor'),
('Marcos Silva', 'marcos@example.com', 'Vendedor'),
('Fernanda Oliveira', 'fernanda@example.com', 'Vendedor'),
('Rafael Santos', 'rafael@example.com', 'Vendedor'),
('Carla Lima', 'carla@example.com', 'Vendedor');

-- Carros

INSERT INTO carros (modelo, placa) VALUES
('Ford Ranger', 'ABC1234'),
('Chevrolet S10', 'DEF5678'),
('Volkswagen Amarok', 'GHI9012'),
('Fiat Toro', 'JKL3456'),
('Toyota Hilux', 'MNO7890'),
('Honda CR-V', 'PQR123'),
('Hyundai Tucson', 'STU567'),
('Nissan Frontier', 'VWX901'),
('Renault Duster', 'YZA345'),
('Jeep Compass', 'BCD789'),
('Land Rover Discovery', 'EFG123'),
('Mercedes-Benz Classe X', 'HIJ567'),
('BMW X5', 'KLM901'),
('Audi Q7', 'PQR345'),
('Volvo XC90', 'STU789'),
('Tesla Model S', 'TESLA001'),
('Porsche Taycan', 'PORSCHE001'),
('Jaguar I-PACE', 'JAGUAR001'),
('Audi e-tron', 'AUDI001'),
('Mercedes-Benz EQC', 'MBEQC001'),
('BMW iX3', 'BMWiX3001'),
('Volkswagen ID.4', 'VWID4001'),
('Nissan Ariya', 'ARIYA001'),
('Rivian R1T', 'R1T001'),
('Lucid Air', 'LUCID001');

-- Alugueis

INSERT INTO alugueis (cliente_id, carro_id, data_inicio, data_fim) VALUES 
(26, 26, '2024-06-01 08:00:00', '2024-06-03 18:00:00'), 
(27, 27, '2024-06-02 10:00:00', '2024-06-05 15:00:00'), 
(28, 28, '2024-06-03 09:00:00', '2024-06-06 12:00:00'), 
(29, 29, '2024-06-04 07:00:00', '2024-06-07 14:00:00'), 
(30, 30, '2024-06-05 11:00:00', '2024-06-08 16:00:00'), 
(31, 31, '2024-06-06 12:00:00', '2024-06-09 17:00:00'), 
(32, 32, '2024-06-07 13:00:00', '2024-06-10 11:00:00'), 
(33, 33, '2024-06-08 14:00:00', '2024-06-11 10:00:00'), 
(34, 34, '2024-06-09 15:00:00', '2024-06-12 09:00:00'), 
(35, 35, '2024-06-10 16:00:00', '2024-06-13 08:00:00'), 
(36, 36, '2024-06-11 17:00:00', '2024-06-14 07:00:00'), 
(37, 37, '2024-06-12 18:00:00', '2024-06-15 06:00:00'), 
(38, 38, '2024-06-13 19:00:00', '2024-06-16 17:00:00'), 
(39, 39, '2024-06-14 20:00:00', '2024-06-17 16:00:00'), 
(40, 40, '2024-06-15 21:00:00', '2024-06-18 15:00:00'),
(1, 41, '2024-06-16 22:00:00', '2024-06-19 14:00:00'),
(2, 42, '2024-06-17 23:00:00', '2024-06-20 13:00:00'),
(3, 43, '2024-06-18 00:00:00', '2024-06-21 12:00:00'),
(4, 44, '2024-06-19 01:00:00', '2024-06-22 11:00:00'),
(5, 45, '2024-06-20 02:00:00', '2024-06-23 10:00:00'),
(6, 46, '2024-06-21 03:00:00', '2024-06-24 09:00:00'),
(7, 47, '2024-06-22 04:00:00', '2024-06-25 08:00:00'),
(8, 48, '2024-06-23 05:00:00', '2024-06-26 07:00:00'),
(9, 49, '2024-06-24 06:00:00', '2024-06-27 06:00:00'),
(10, 50, '2024-06-25 07:00:00', '2024-06-28 05:00:00');

-- MAIS 30 INSERTS DE CADA TABELA

-- Clientes

INSERT INTO clientes (nome, email, telefone) VALUES
('Lucas Oliveira', 'lucas@example.com', '(11) 1234-5678'),
('Sandra Santos', 'sandra@example.com', '(21) 9876-5432'),
('Felipe Pereira', 'felipe@example.com', '(31) 2468-1357'),
('Ana Souza', 'ana2@example.com', '(41) 3698-7412'),
('Paulo Ferreira', 'paulo@example.com', '(51) 7531-8426'),
('Marta Lima', 'marta@example.com', '(61) 9874-1236'),
('Rodrigo Costa', 'rodrigo@example.com', '(71) 3698-7412'),
('Cristina Oliveira', 'cristina@example.com', '(81) 1357-2468'),
('Luciana Santos', 'luciana@example.com', '(91) 7531-8426'),
('Ricardo Ferreira', 'ricardo@example.com', '(10) 9874-1236'),
('Isabela Lima', 'isabela@example.com', '(12) 3698-7412'),
('Carlos Ferreira', 'carlos2@example.com', '(13) 1357-2468'),
('Mariana Souza', 'mariana2@example.com', '(14) 7531-8426'),
('Gustavo Costa', 'gustavo2@example.com', '(15) 9874-1236'),
('Laura Ferreira', 'laura2@example.com', '(16) 3698-7412'),
('João Oliveira', 'joao2@example.com', '(17) 1234-5678'),
('Sandra Santos', 'sandra2@example.com', '(18) 9876-5432'),
('Felipe Pereira', 'felipe2@example.com', '(19) 2468-1357'),
('Ana Souza', 'ana3@example.com', '(20) 3698-7412'),
('Paulo Ferreira', 'paulo2@example.com', '(21) 7531-8426'),
('Marta Lima', 'marta2@example.com', '(22) 9874-1236'),
('Rodrigo Costa', 'rodrigo2@example.com', '(23) 3698-7412'),
('Cristina Oliveira', 'cristina2@example.com', '(24) 1357-2468'),
('Luciana Santos', 'luciana2@example.com', '(25) 7531-8426'),
('Ricardo Ferreira', 'ricardo2@example.com', '(26) 9874-1236'),
('Isabela Lima', 'isabela2@example.com', '(27) 3698-7412'),
('Carlos Ferreira', 'carlos3@example.com', '(28) 1357-2468'),
('Mariana Souza', 'mariana3@example.com', '(29) 7531-8426'),
('Gustavo Costa', 'gustavo3@example.com', '(30) 9874-1236');

-- Funcionários

INSERT INTO funcionarios (nome, email, cargo) VALUES
('Mariana Silva', 'mariana2@example.com', 'Gerente'),
('Pedro Santos', 'pedro2@example.com', 'Vendedor'),
('Luiza Oliveira', 'luiza2@example.com', 'Vendedor'),
('Diego Souza', 'diego2@example.com', 'Vendedor'),
('Fernanda Costa', 'fernanda2@example.com', 'Vendedor'),
('Thiago Lima', 'thiago2@example.com', 'Vendedor'),
('Gabriela Santos', 'gabriela2@example.com', 'Vendedor'),
('Lucas Pereira', 'lucas2@example.com', 'Vendedor'),
('Vanessa Ferreira', 'vanessa2@example.com', 'Vendedor'),
('Gustavo Oliveira', 'gustavo2@example.com', 'Vendedor'),
('Marcela Silva', 'marcela2@example.com', 'Vendedor'),
('Rafaela Costa', 'rafaela2@example.com', 'Vendedor'),
('Ricardo Santos', 'ricardo2@example.com', 'Vendedor'),
('Aline Pereira', 'aline2@example.com', 'Vendedor'),
('Carlos Silva', 'carlos2@example.com', 'Vendedor'),
('André Santos', 'andre2@example.com', 'Vendedor'),
('Luana Oliveira', 'luana2@example.com', 'Vendedor'),
('Bruno Costa', 'bruno2@example.com', 'Vendedor'),
('Carolina Souza', 'carolina2@example.com', 'Vendedor'),
('Roberto Santos', 'roberto2@example.com', 'Vendedor'),
('Jéssica Lima', 'jessica2@example.com', 'Vendedor'),
('Marcos Silva', 'marcos2@example.com', 'Vendedor'),
('Fernanda Oliveira', 'fernanda2@example.com', 'Vendedor'),
('Rafael Santos', 'rafael2@example.com', 'Vendedor'),
('Carla Lima', 'carla2@example.com', 'Vendedor'),
('Vanessa Ferreira', 'vanessa3@example.com', 'Vendedor'),
('Gustavo Oliveira', 'gustavo3@example.com', 'Vendedor'),
('Marcela Silva', 'marcela3@example.com', 'Vendedor'),
('Rafaela Costa', 'rafaela3@example.com', 'Vendedor'),
('Ricardo Santos', 'ricardo3@example.com', 'Vendedor');

-- Carros (continuação)

INSERT INTO carros (modelo, placa) VALUES
('Toyota Land Cruiser', 'TOYOTA02'),
('Honda Accord', 'HONDA02'),
('Hyundai Santa Fe', 'HYUNDAI02'),
('Nissan Murano', 'NISSAN02'),
('Renault Captur', 'RENAULT02'),
('Jeep Wrangler', 'JEEP02'),
('Land Rover Range Rover Sport', 'RANGEROVE2'),
('Mercedes-Benz Classe G', 'MB02'),
('BMW X7', 'BMW02'),
('Audi Q8', 'AUDI02'),
('Volvo XC60', 'VOLVO02'),
('Lexus RX', 'LEXUS02'),
('Mazda CX-5', 'MAZDA02'),
('Kia Sorento', 'KIA02'),
('Subaru Outback', 'SUBARU02'),
('Buick Enclave', 'BUICK02'),
('Lincoln Aviator', 'LINCOLN02'),
('Infiniti QX60', 'INFINITI02'),
('Acura MDX', 'ACURA02'),
('Genesis GV80', 'GENESIS02'),
('Polestar 2', 'POLESTAR02'),
('Rivian R1T', 'RIVIAN02'),
('Lucid Air', 'LUCID02'),
('Tesla Model S', 'TESLA02');

-- Alugueis

INSERT INTO alugueis (cliente_id, carro_id, data_inicio, data_fim) VALUES 
(11, 51, '2024-06-26 22:00:00', '2024-06-29 14:00:00'),
(12, 52, '2024-06-27 23:00:00', '2024-06-30 13:00:00'),
(13, 53, '2024-06-28 00:00:00', '2024-07-01 12:00:00'),
(14, 54, '2024-06-29 01:00:00', '2024-07-02 11:00:00'),
(15, 55, '2024-06-30 02:00:00', '2024-07-03 10:00:00'),
(16, 56, '2024-07-01 03:00:00', '2024-07-04 09:00:00'),
(17, 57, '2024-07-02 04:00:00', '2024-07-05 08:00:00'),
(18, 58, '2024-07-03 05:00:00', '2024-07-06 07:00:00'),
(19, 59, '2024-07-04 06:00:00', '2024-07-07 06:00:00'),
(20, 60, '2024-07-05 07:00:00', '2024-07-08 05:00:00'),
(21, 61, '2024-07-06 08:00:00', '2024-07-09 04:00:00'),
(22, 62, '2024-07-07 09:00:00', '2024-07-10 03:00:00'),
(23, 63, '2024-07-08 10:00:00', '2024-07-11 02:00:00'),
(24, 64, '2024-07-09 11:00:00', '2024-07-12 01:00:00'),
(25, 65, '2024-07-10 12:00:00', '2024-07-13 00:00:00'),
(26, 66, '2024-07-11 13:00:00', '2024-07-14 23:00:00'),
(27, 67, '2024-07-12 14:00:00', '2024-07-15 22:00:00'),
(28, 68, '2024-07-13 15:00:00', '2024-07-16 21:00:00'),
(29, 69, '2024-07-14 16:00:00', '2024-07-17 20:00:00'),
(30, 70, '2024-07-15 17:00:00', '2024-07-18 19:00:00');