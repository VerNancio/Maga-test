<?php

// Importa a variavel $dbParams, com os parametros do banco
require_once (__DIR__ . "/../config/bd_config.php");

// Transforma o array de parametros do banco em varaiaveis
extract($dbParams);

try {

    // Conexão com o banco de dados usando PDO
    // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo = new PDO("mysql:host=$host", $user, $password);

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
    echo "Banco de dados e tabelas criados com sucesso!\n";


    // PDO com db
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Definindo o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL pupulando as tabelas
    $sql = "
    INSERT users (name, cpf) VALUES ('Vinicius Oliveira', '79747054000');
    INSERT users (name, cpf) VALUES ('Rafael Liberato', '94364964000');
    INSERT users (name, cpf) VALUES ('Yuri Alberto', '21602233012');

    INSERT contacts (type_contact, desc_contact, fk_owner) VALUES (1, 'luciana.paes@outlook.com', 1);
    INSERT contacts (type_contact, desc_contact, fk_owner) VALUES (1, 'gil.bueno@outlook.com', 1);
    INSERT contacts (type_contact, desc_contact, fk_owner) VALUES (0, '11976238817', 1);
    INSERT contacts (type_contact, desc_contact, fk_owner) VALUES (1, 'leon116@outlook.com', 2);
    INSERT contacts (type_contact, desc_contact, fk_owner) VALUES (0, '11976038795', 3);
    ";

    $pdo->exec($sql);
    echo "Inserção de usuários e contatos realizada com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao executar o script: " . $e->getMessage();
}
