CREATE DATABASE db_peladas;
USE db_peladas;

CREATE TABLE usuarios (

	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	tipo_usuario ENUM('jogador','locador','administrador') NOT NULL,
	email VARCHAR(20) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	endereco TEXT NOT NULL,
	nome_usuario VARCHAR(45) NOT NULL
	
);

ALTER TABLE objeto ADD CONSTRAINT fk_pessoa FOREIGN KEY(id) REFERENCES pessoa (id);

CREATE TABLE jogador (

	idjogador INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(45) NOT NULL,
	nomeUser VARCHAR(20) NOT NULL,
	dtNascimento DATE NOT NULL,
	genero ENUM('feminino','masculino','nbinario') NOT NULL,
	cpf VARCHAR(14) UNIQUE NOT NULL
	
);

CREATE TABLE locador (

	idlocador INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nomeLegal VARCHAR(45) NOT NULL,
	nomeFantasia VARCHAR(45) NOT NULL,
	cnpj VARCHAR(14) UNIQUE NOT NULL,
	horarioFunc DATETIME NOT NULL,
	
);

CREATE TABLE quadras (

	idquadras INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	valor_aluguel FLOAT NOT NULL,
	quantJogadores INT NOT NULL,
	tamanho_quadra FLOAT NOT NULL,
	horarios_funcionamento DATETIME NOT NULL,
	modalidade VARCHAR(45) NULL,
	descricao TEXT NULL
	
);

CREATE TABLE reservas (

	idreservas INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	jogador_id INT NOT NULL,
	quadra_id INT NOT NULL,
	tipo_reserva ENUM('privada','publica') NOT NULL,
	horario_reservado TIME NOT NULL

);

CREATE TABLE partidas_publicas (

	idpartida INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	dtPartida DATETIME NOT NULL,
	horarioInicio TIME NOT NULL,
	horarioFim TIME NOT NULL
	
);

CREATE TABLE disponibilidade (

	idDisponibilidade INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	
);

CREATE TABLE comentarios (

	idcomentarios INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	horario_comentado TIME NOT NULL
	
);


*/