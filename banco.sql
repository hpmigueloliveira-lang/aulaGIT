CREATE DATABASE IF NOT EXISTS livraria;

USE livraria;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL
);

INSERT INTO livros (titulo, autor, preco, quantidade) VALUES 
('O Alquimista', 'Paulo Coelho', 29.90, 10),
('Dom Casmurro', 'Machado de Assis', 19.90, 5);