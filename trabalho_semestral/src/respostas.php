<?php
session_start();
require_once 'perguntas.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recuperação segura dos dados
    $idPergunta = $_SESSION['pergunta_atual'] ?? null;
    $resposta   = $_POST['resposta'] ?? null;
    $feedback   = $_POST['feedback'] ?? '';

    // Sanitização dos valores
    $idPergunta = filter_var($idPergunta, FILTER_SANITIZE_NUMBER_INT);
    $resposta   = filter_var($resposta, FILTER_SANITIZE_NUMBER_INT);
    $feedback   = filter_var($feedback, FILTER_SANITIZE_SPECIAL_CHARS);

    // Validação dos dados
    $erros = [];

    if (!$idPergunta || $idPergunta <= 0) {
        $erros[] = "ID da pergunta inválido.";
    }

    if ($resposta === null || $resposta === '' || $resposta < 0 || $resposta > 10) {
        $erros[] = "A resposta deve ser um número entre 0 e 10.";
    }

    if (strlen($feedback) > 500) {
        $erros[] = "O comentário ultrapassa o limite de 500 caracteres.";
    }

    // Se houver erros, exibe mensagem e interrompe
    if (!empty($erros)) {
        echo "<h3>Erro ao processar avaliação:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li>" . htmlspecialchars($erro) . "</li>";
        }
        echo "</ul><a href='../public/index.php'>Voltar</a>";
        exit;
    }

    //  Inserção no banco
    $conn = conectarBanco();
    $sql = "INSERT INTO avaliacoes (id_pergunta, resposta, feedback, datahora) VALUES ($1, $2, $3, NOW())";
    $result = pg_query_params($conn, $sql, [$idPergunta, $resposta, $feedback]);

    if (!$result) {
        echo "<p>Erro ao registrar a avaliação. Tente novamente.</p>";
        exit;
    }

    // Busca da próxima pergunta
    $proxima = obterProximaPergunta($idPergunta);

    if ($proxima) {
        $_SESSION['pergunta_atual'] = $proxima['id'];
        header("Location: ../public/index.php");
    } else {
        // Última pergunta — finaliza avaliação
        session_destroy();
        header("Location: ../public/obrigado.php");
    }

    exit;
}
?>
