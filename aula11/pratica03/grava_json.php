<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Pega os dados do formulário
    $pessoa = [
        'nome' => $_POST['campo_primeiro_nome'] ?? '',
        'sobrenome' => $_POST['campo_sobrenome'] ?? '',
        'email' => $_POST['campo_email'] ?? '',
        'senha' => $_POST['campo_password'] ?? '',
        'cidade' => $_POST['campo_cidade'] ?? '',
        'estado' => $_POST['campo_estado'] ?? ''
    ];

    // Caminho do arquivo JSON
    $arquivo = 'pessoas.json';
    $pessoas = [];

    // Se o arquivo existir, lê o conteúdo atual
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $pessoas = json_decode($conteudo, true) ?? [];
    }

    // Adiciona a nova pessoa ao array
    $pessoas[] = $pessoa;

    // Grava de volta no arquivo
    file_put_contents($arquivo, json_encode($pessoas, JSON_PRETTY_PRINT));

    echo "<h3> Dados gravados com sucesso!</h3>";
    echo "<a href='index.html'>Voltar</a>";

} else {
    echo "Nenhum dado recebido.";
}
?>
