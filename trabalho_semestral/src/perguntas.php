<?php
require_once __DIR__ . '/db.php';

/**
 * Retorna uma pergunta ativa com base no ID.
 */
function obterPergunta($id) {
    $conn = conectarBanco();

    // Sanitiza e valida o ID
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    if (!$id || $id <= 0) {
        return null; // evita consultas inválidas
    }
    $sql = "SELECT * FROM perguntas WHERE id = $1 AND status = 'ativa'";
    $res = pg_query_params($conn, $sql, [$id]);

    return ($res && pg_num_rows($res) > 0) ? pg_fetch_assoc($res) : null;
}

/**
 * Retorna a próxima pergunta ativa, após a atual.
 */
function obterProximaPergunta($idAtual) {
    $conn = conectarBanco();

    // Sanitiza e valida o ID atual
    $idAtual = filter_var($idAtual, FILTER_SANITIZE_NUMBER_INT);

    if (!$idAtual || $idAtual <= 0) {
        return null;
    }

    $sql = "SELECT * FROM perguntas WHERE id > $1 AND status = 'ativa' ORDER BY id ASC LIMIT 1";
    $res = pg_query_params($conn, $sql, [$idAtual]);

    return ($res && pg_num_rows($res) > 0) ? pg_fetch_assoc($res) : null;
}
?>
