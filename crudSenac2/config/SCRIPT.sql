CREATE DATABASE IF NOT EXISTS crudSenac;
USE crudSenac;

CREATE TABLE IF NOT EXISTS usuarios (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome_completo TEXT,
  data_nasc TEXT,
  email TEXT,
  senha TEXT,
  telefone TEXT
);

CREATE TABLE IF NOT EXISTS tarefas (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  titulo TEXT,
  descricao TEXT,
  inicio TEXT,
  termino TEXT,
  id_usuario INTEGER,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

INSERT INTO usuarios
(nome_completo, data_nasc, email, senha, telefone)
VALUES
('ADM','01/01/1980','admin@gmail.com', '123', '40028922');