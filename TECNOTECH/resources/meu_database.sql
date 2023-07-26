-- meu_database.sql

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS meu_database;

-- Utilize o banco de dados
USE meu_database;

-- Criação da tabela "associados"
CREATE TABLE IF NOT EXISTS associados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_filiacao DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Criação da tabela "anuidades"
CREATE TABLE IF NOT EXISTS anuidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano INT NOT NULL,
    valor DECIMAL(8, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
