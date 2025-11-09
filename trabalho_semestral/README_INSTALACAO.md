### Instruções de Instalação e Execução

---
## **Passo 01 - Clonar o Repositório (direto no XAMPP)**

**Opção 1 – Via Git:**

1. Acesse o repositório do projeto no GitHub.
2. Copie o link HTTPS do repositório.
3. Abra o terminal (ou Git Bash) e navegue até o diretório do servidor local:

    ```bash
   cd C:\xampp\htdocs
   ```
    
4. Execute o comando:

   ```bash
   git clone https://github.com/BarbaraKammer/DesenvolvimentoWEB-UNIDAVI-2025.git
   ```
   
5. Após o download, verifique se a pasta foi criada em:

   ```
   C:\xampp\htdocs\DesenvolvimentoWEB-UNIDAVI-2025\
   ```
   
6. Dentro dela, localize a pasta do projeto: trabalho_semestral


**Opção 2 – Via Download ZIP:**

1. Acesse o repositório do projeto no GitHub.
2. Clique em **Code → Download ZIP**.
3. Extraia o conteúdo do arquivo `.zip`.
4. Recorte apenas a pasta **trabalho_semestral** (`Ctrl + X`).
5. Cole dentro do diretório do servidor local:

   ```
   C:\xampp\htdocs\
   ```

---

## **Passo 02 - Configurar o banco de dados PostgreSQL**

1. Abra o **pgAdmin** (ou terminal SQL do PostgreSQL).
2. Crie o banco de dados com o nome:

   ```sql
   CREATE DATABASE trabalho_semestral;
   ```
3. Rode o script **setup.sql** que está dentro da pasta `trabalho_semestral/sql/`.
   Esse script cria todas as tabelas necessárias e insere as perguntas iniciais automaticamente.

---

## **Passo 03 - Configurar o acesso ao banco (config.php)**

1. Vá até a pasta principal do projeto:

   ```
   C:\xampp\htdocs\trabalho_semestral\
   ```
2. Abra o arquivo **config.php** e configure as informações de acesso conforme seu ambiente local.
   Exemplo:

   ```php
   <?php
   define('DB_HOST', 'localhost');
   define('DB_PORT', '5432');
   define('DB_NAME', 'trabalho_semestral');
   define('DB_USER', 'postgres');   // seu usuário do PostgreSQL
   define('DB_PASS', '1234');       // sua senha
   ?>
   ```

---

## **Passo 04 - Configurar o ambiente local (XAMPP)**

1. Abra o **Painel de Controle do XAMPP**.
2. Inicie o serviço **Apache**.
3. No navegador, informe o endereço do projeto:
Exemplo:
 ```
   http://localhost/DesenvolvimentoWEB-UNIDAVI-2025/trabalho_semestral/public/index.php
   ```

   ```
   http://localhost/trabalho_semestral/public/index.php
   ```
4. A página de avaliação será exibida automaticamente.

