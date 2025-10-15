create database siteprojeto;
use siteprojeto;

create table user (
    id int primary key auto_increment,
    nome VARCHAR(200),
    idade INT NOT NULL,
    cpf CHAR(11) UNIQUE,
    endereco VARCHAR(200),
    senha VARCHAR(20)
);

create table agenda (
    id INT PRIMARY KEY auto_increment,
    id_user INT NOT NULL,
    titulo VARCHAR(200),
    descricao VARCHAR(500),
    data_cri date
);