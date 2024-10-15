CREATE DATABASE MagaTest;

USE MagaTest;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,       
    name VARCHAR(100) NOT NULL,                   
    cpf CHAR(11) NOT NULL                  
);

CREATE TABLE contacts (
    id_contact INT AUTO_INCREMENT PRIMARY KEY,       
    type_contact BOOLEAN NOT NULL,                   
    desc_contact VARCHAR(100) NOT NULL,                 
    fk_owner INT,                                 
    
    CONSTRAINT fk_owner FOREIGN KEY (fk_owner) REFERENCES users(id) -- Removidas as aspas
);
