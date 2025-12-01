### Sistema de Avaliação — Instruções de Instalação e Execução

Este projeto implementa um sistema completo de avaliação via tablets, com painel administrativo, relatórios e geração de métricas.
A seguir estão os passos necessários para instalação e execução em ambiente local.

---
## **Passo 01 - Clonar o repositório no servidor local
🔹 Opção A — via Git

1. Abra o terminal / Git Bash.

2. Entre no diretório do servidor local:

```bash
cd C:\xampp\htdocs
```

3. Clone o repositório:

```bash
git clone https://github.com/BarbaraKammer/DesenvolvimentoWEB-UNIDAVI-2025.git
```

4. Verifique se o diretório foi criado:

```bash
C:\xampp\htdocs\DesenvolvimentoWEB-UNIDAVI-2025\
```

5. A pasta final do projeto é:

```bash
...\DesenvolvimentoWEB-UNIDAVI-2025\trabalho_semestral\
```
🔹 Opção B — Download ZIP

1. Abra o repositório no GitHub.

2. Clique Code → Download ZIP.

3. Extraia o conteúdo do arquivo baixado.

4. Recorte apenas a pasta trabalho_semestral.

5. Cole dentro do servidor local:

```bash
C:\xampp\htdocs\
```

## **Passo 02 - Configurar o Banco de Dados PostgreSQL

1. Abra o pgAdmin (ou terminal psql).

2. Crie o banco:

```bash
CREATE DATABASE trabalho_semestral;
```

3. Execute o script SQL localizado em:

```bash
trabalho_semestral/sql/setup.sql
```

Esse script:
-> cria as tabelas
-> cria o usuário administrador
-> insere registros iniciais (perguntas, setor e dispositivo)


## **Passo 03 - Configurar acesso ao banco de dados

1. Abra o arquivo:

```bash
trabalho_semestral/functions/db.php
```

2. Ajuste conforme o seu ambiente:

```bash
<?php
function db() {
    static $conn;
    if ($conn === null) {
        $conn = new PDO(
            "pgsql:host=localhost;port=5432;dbname=trabalho_semestral",
            "postgres",     // usuário
            "12345",        // senha
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }
    return $conn;
}
```

## **Passo 04 - Rodar o projeto (XAMPP / Apache)

1. Abra o XAMPP Control Panel.

2. Inicie o serviço Apache.

3. Acesse o sistema pelo navegador:

```bash
http://localhost/trabalho_semestral/public/index.php
```

Acesso ao Painel Administrativo

O banco já cria automaticamente um usuário administrativo:

```bash
Login	Senha
admin	admin123
```
O painel administrativo está disponível em:

```bash
http://localhost/trabalho_semestral/admin/login.php
```