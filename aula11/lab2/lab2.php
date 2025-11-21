<?php
try {
    // Conexão
    $dbconn = pg_connect("host=localhost port=5432 dbname=local user=postgres password=12345");

    if (!$dbconn) {
        die("Erro ao conectar ao banco.");
    }

    echo "Database conectado...<br>";

    // SANITIZAÇÃO DOS CAMPOS
    $primeiroNome = trim(filter_input(INPUT_POST, 'campo_primeiro_nome', FILTER_SANITIZE_STRING));
    $sobrenome    = trim(filter_input(INPUT_POST, 'campo_sobrenome', FILTER_SANITIZE_STRING));
    $email        = trim(filter_input(INPUT_POST, 'campo_email', FILTER_SANITIZE_EMAIL));
    $senha        = trim($_POST['campo_password']);
    $cidade       = trim(filter_input(INPUT_POST, 'campo_cidade', FILTER_SANITIZE_STRING));
    $estado       = strtoupper(trim(filter_input(INPUT_POST, 'campo_estado', FILTER_SANITIZE_STRING)));

    // VALIDAÇÕES
    $erros = [];

    if (strlen($primeiroNome) < 2) $erros[] = "Primeiro nome deve ter ao menos 2 caracteres.";
    if (strlen($sobrenome) < 2) $erros[] = "Sobrenome deve ter ao menos 2 caracteres.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = "Email inválido.";
    if (strlen($senha) < 6) $erros[] = "Senha deve ter no mínimo 6 caracteres.";
    if (strlen($cidade) < 2) $erros[] = "Cidade inválida.";
    if (!preg_match("/^[A-Z]{2}$/", $estado)) $erros[] = "UF deve ter apenas 2 letras (ex.: SC, SP, RJ).";

    // Se houver erros, mostrar e parar execução
    if (!empty($erros)) {
        echo "<h3>⚠ Problemas encontrados:</h3><ul>";
        foreach ($erros as $msg) echo "<li>$msg</li>";
        echo "</ul><a href='index.html'>Voltar e corrigir</a>";
        exit;
    }

    // Hash da senha 
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // INSERÇÃO SEGURA
    $aDados = [$primeiroNome, $sobrenome, $email, $senhaHash, $cidade, $estado];

    $result = pg_query_params(
        $dbconn,
        "INSERT INTO TBPESSOA
            (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
        VALUES ($1, $2, $3, $4, $5, $6)",
        $aDados
    );

    if ($result) {
        echo "<h3> Registro inserido com sucesso!</h3>";
    } else {
        echo "<h3> Erro ao inserir:</h3>" . pg_last_error($dbconn);
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
