use db_peladas;

create TABLE usuarios (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	tipo_usuario ENUM('jogador', 'locador', 'admin') NOT NULL,
	email VARCHAR(20) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	endereco TEXT NOT NULL,
	senha TEXT NOT NULL,
	situacao ENUM('ativo', 'inativo') NULL
);

create TABLE jogadores (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	usuario_id INT NOT NULL,
	nome_jogador VARCHAR(70) NOT NULL,
	cpf VARCHAR(15) NOT NULL,
	data_nascimento DATE NOT NULL,
	apelido VARCHAR(45) NULL
);
ALTER TABLE jogadores ADD CONSTRAINT fk_jogadores_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id);

create TABLE locadores (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	usuario_id INT NOT NULL,
	nome_fantasia VARCHAR(70) NOT NULL,
	razao_social VARCHAR(70) NOT NULL,
	cnpj VARCHAR(30) UNIQUE NOT NULL
);
ALTER TABLE locadores ADD CONSTRAINT fk_locadores_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id);

create TABLE quadras (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	locador_id INT NOT NULL,
	valor_aluguel FLOAT NOT NULL,
	quant_min_jogadores INT NOT NULL,
	tamanho_quadra VARCHAR(45) NOT NULL,
	horarios_funcionamento VARCHAR(45) NOT NULL,
	identificador VARCHAR(45) NOT NULL,
	modalidade VARCHAR(45) NULL,
	descricao TEXT NULL
);
ALTER TABLE quadras ADD CONSTRAINT fk_quadras_locador FOREIGN KEY (locador_id) REFERENCES locadores (id);

create TABLE reservas (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	jogador_id INT NOT NULL, 
	quadra_id INT NOT NULL,
	tipo_reserva ENUM('privada', 'publica') NOT NULL,
	horario_reservado DATETIME NOT NULL,
	quantidade_jogadores INT NULL
);
ALTER TABLE reservas ADD CONSTRAINT fk_reservas_jogador FOREIGN KEY (jogador_id) REFERENCES jogadores (id);
ALTER TABLE reservas ADD CONSTRAINT fk_reservas_quadra FOREIGN KEY (quadra_id) REFERENCES quadras (id);

CREATE TABLE disponibilidades (
	id 	INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	quadra_id INT NOT NULL,
	horario_inicio TIME NOT NULL,
	horario_fim TIME NOT NULL
);
ALTER TABLE disponibilidades ADD CONSTRAINT fk_disponibilidades_quadra FOREIGN KEY (quadra_id) REFERENCES quadras (id);

CREATE TABLE inadimplentes (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	locador_id INT NOT NULL,
	jogador_id INT NOT NULL,
	data_inadimplencia DATETIME NOT NULL,
	motivo VARCHAR(100) NOT NULL,
	situacao ENUM('pendente', 'quitado') NOT NULL,
	valor FLOAT NOT NULL
);
ALTER TABLE inadimplentes ADD CONSTRAINT fk_inadimplentes_locador FOREIGN KEY (locador_id) REFERENCES locadores (id);
ALTER TABLE inadimplentes ADD CONSTRAINT fk_inadimplentes_jogador FOREIGN KEY (jogador_id) REFERENCES jogadores (id);

CREATE TABLE partidas_publicas (
	jogador_id INT NOT NULL,
	reserva_id INT NOT NULL
);
ALTER TABLE partidas_publicas ADD CONSTRAINT fk_jogador FOREIGN KEY (jogador_id) REFERENCES jogadores (id);
ALTER TABLE partidas_publicas ADD CONSTRAINT fk_reserva FOREIGN KEY (reserva_id) REFERENCES reservas (id);




