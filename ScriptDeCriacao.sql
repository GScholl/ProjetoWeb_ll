
CREATE DATABASE projeto_web2;
use projeto_web2;
CREATE TABLE categoria(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(64),
    PRIMARY KEY(id)
);

CREATE TABLE produto(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(1024) NOT NULL,
    descricao TEXT NOT NULL,
    id_categoria INT NOT NULL,
    valor DECIMAL(10, 2),
    PRIMARY KEY (id),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);

CREATE TABLE fotos_produto(
    id INT NOT NULL AUTO_INCREMENT,
    url TEXT NOT NULL,
    alt VARCHAR(64),
    id_produto INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_produto) REFERENCES produto(id)
);
