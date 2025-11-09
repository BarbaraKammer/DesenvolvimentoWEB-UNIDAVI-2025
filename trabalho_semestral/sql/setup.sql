-- Tabela de dispositivos
CREATE TABLE dispositivos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    status VARCHAR(10) DEFAULT 'ativo'
);

-- Tabela de perguntas
CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status VARCHAR(10) DEFAULT 'ativa'
);

-- Tabela de avaliações
CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,
    id_setor INT,
    id_pergunta INT REFERENCES perguntas(id),
    id_dispositivo INT REFERENCES dispositivos(id),
    resposta INT NOT NULL CHECK (resposta BETWEEN 0 AND 10),
    feedback TEXT,
    datahora TIMESTAMP DEFAULT NOW()
);

-- Inserir dispositivo de exemplo
INSERT INTO dispositivos (nome, status)
VALUES ('Tablet Recepção', 'ativo');

-- Inserir perguntas de exemplo
INSERT INTO perguntas (texto, status) VALUES
('Como você avalia o atendimento recebido?', 'ativa'),
('Como você avalia a limpeza e organização do ambiente?', 'ativa'),
('Qual sua satisfação com a qualidade dos produtos oferecidos?', 'ativa'),
('Qual sua opinião sobre o tempo de espera?', 'ativa'),
('De modo geral, como avalia sua experiência conosco?', 'ativa');
