-- Ativar módulo necessário para crypt/gen_salt
CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    status BOOLEAN DEFAULT TRUE
);

CREATE TABLE dispositivos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    setor_id INT REFERENCES setores(id),
    status BOOLEAN DEFAULT TRUE
);

CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status BOOLEAN DEFAULT TRUE
);

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,
    setor_id INT NOT NULL REFERENCES setores(id),
    dispositivo_id INT NOT NULL REFERENCES dispositivos(id),
    pergunta_id INT NOT NULL REFERENCES perguntas(id),
    nota INT NOT NULL CHECK (nota BETWEEN 0 AND 10),
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT NOW()
);

-- Criar admin padrão
INSERT INTO usuarios(login, senha)
VALUES ('admin', crypt('admin123', gen_salt('bf')));

-- Dados iniciais
INSERT INTO setores (nome) VALUES ('Recepção');
INSERT INTO dispositivos (nome, setor_id) VALUES ('Tablet Recepção', 1);
INSERT INTO perguntas (texto) VALUES
('Como você avalia o atendimento?'),
('Como está a limpeza do ambiente?'),
('Como você avalia o tempo de espera?');
