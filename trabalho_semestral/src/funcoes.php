<?php
require_once __DIR__ . '/perguntas.php';

function carregarPerguntaAtual($id = 1) {
    return obterPergunta($id);
}

?>
