<?php
require_once "conexao.php";

// SANITIZAÇÃO DOS CAMPOS
$nome      = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$sobrenome = trim(filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING));
$email     = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$senha     = $_POST['senha'] ?? '';
$cidade    = trim(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
$estado    = strtoupper(trim(filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING)));

$erros = [];

// VALIDAÇÃO
if (strlen($nome) < 2)        $erros[] = "O nome deve ter pelo menos 2 caracteres.";
if (strlen($sobrenome) < 2)   $erros[] = "O sobrenome deve ter pelo menos 2 caracteres.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = "Email inválido.";
if (strlen($senha) < 6)       $erros[] = "A senha deve ter no mínimo 6 caracteres.";
if (strlen($cidade) < 2)      $erros[] = "Cidade inválida.";
if (!preg_match("/^[A-Z]{2}$/", $estado)) $erros[] = "O estado deve conter apenas 2 letras (ex: SC, SP, RJ).";

// Se houver erros, exibir e parar execução
if (!empty($erros)) {
    echo "<h3>⚠ Problemas encontrados:</h3><ul>";
    foreach ($erros as $msg) {
        echo "<li>" . htmlspecialchars($msg) . "</li>";
    }
    echo "</ul><a href='index.html'>Voltar</a>";
    exit;
}

// Criptografia da senha 
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);


// GRAVAÇÃO NO BD — PREVENÇÃO A SQL INJECTION
$aDadosPessoa = [
    $nome,
    $sobrenome,
    $email,
    $senhaHash,
    $cidade,
    $estado
];

$sql = "INSERT INTO tbpessoa (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado)
        VALUES ($1, $2, $3, $4, $5, $6)";

$resultInsert = pg_query_params($connection, $sql, $aDadosPessoa);

if ($resultInsert) {
    echo "<br> Dados inseridos com sucesso!";
} else {
    echo "<br> Erro ao inserir dados: " . pg_last_error($connection);
}
?>

<a href="index.html">Voltar</a>
