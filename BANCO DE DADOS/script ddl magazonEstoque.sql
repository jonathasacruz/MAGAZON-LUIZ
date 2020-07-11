CREATE DATABASE IF NOT EXISTS magazonEstoque CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
USE magazonEstoque;

CREATE TABLE IF NOT EXISTS usuarios (
    idUsuario INT NOT NULL AUTO_INCREMENT,
    matricula INT(20) ZEROFILL NOT NULL UNIQUE,
    nome VARCHAR (255) NOT NULL,
    login VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    PRIMARY KEY (idUsuario)
);

CREATE TABLE IF NOT EXISTS categorias(
    idCategoria INT NOT NULL AUTO_INCREMENT,
    nomeCategoria VARCHAR(30) NOT NULL UNIQUE,
    descCategoria VARCHAR(500),
    PRIMARY KEY (idCategoria)
);


CREATE TABLE IF NOT EXISTS produtos(
	idProduto INT NOT NULL AUTO_INCREMENT,
    nomeProduto VARCHAR(255) NOT NULL,
    descProduto VARCHAR(500),
    precoCompraProduto DECIMAL(10,2) NOT NULL,
    precoVendaProduto DECIMAL(10,2) NOT NULL,
    dataInsercao DATE NOT NULL,
    dataAtualizacao DATE,
    qtdEstoque INT NOT NULL,
    idCategoria INT NOT NULL,
    PRIMARY KEY (idProduto),
    FOREIGN KEY (idCategoria) REFERENCES categorias (idCategoria) ON DELETE CASCADE
);
