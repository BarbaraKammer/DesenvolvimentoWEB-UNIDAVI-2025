<?php 

// Caminho do arquivo original
define("ARQUIVO_ORIGINAL", "dados.txt");

// Caminho do novo arquivo
define("ARQUIVO_SERIALIZADO", "dados2.txt");

// Etapa 1 - Verificar se o arquivo existe
if (file_exists(ARQUIVO_ORIGINAL)) {
    echo "Arquivo encontrado!<br><br>";

    // Ler conteúdo
    $conteudo = file_get_contents(ARQUIVO_ORIGINAL);

    echo "Conteúdo do arquivo:<br>";
    echo "------------------<br>";
    echo nl2br($conteudo) . "<br><br>";

    // Etapa 2 - Serializar os dados
    $serializado = serialize($conteudo);

    // Gravar no novo arquivo
    $resultado = file_put_contents(ARQUIVO_SERIALIZADO, $serializado);

    if ($resultado !== false) {
        echo "Arquivo 'dados2.txt' criado com sucesso!";
    } else {
        echo "Erro ao criar o arquivo 'dados2.txt'.";
    }

} else {
    echo "Arquivo 'dados.txt' não encontrado.";
}

?>
