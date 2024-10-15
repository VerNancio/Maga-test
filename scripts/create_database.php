<?php

// Importa a variavel $dbParams, com os parametros do banco
require_once (__DIR__ . "/../config/bd_config.php");

// Transforma o array de parametros do banco em varaiaveis
extract($dbParams);

try {

    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Definindo o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para criar o banco de dados e as tabelas
    $sql = "
    CREATE DATABASE IF NOT EXISTS MagaTest;
    
    USE MagaTest;

    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,       
        name VARCHAR(100) NOT NULL,                   
        cpf CHAR(11) NOT NULL                 
    );

    CREATE TABLE IF NOT EXISTS contacts (
        id_contact INT AUTO_INCREMENT PRIMARY KEY,       
        type_contact BOOLEAN NOT NULL,                   
        desc_contact VARCHAR(100) NOT NULL,                 
        fk_owner INT,                                 
    
        CONSTRAINT fk_owner FOREIGN KEY (fk_owner) REFERENCES users(id)
    );
    ";

    $pdo->exec($sql);
    echo "Banco de dados e tabelas criados com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao executar o script: " . $e->getMessage();
}
