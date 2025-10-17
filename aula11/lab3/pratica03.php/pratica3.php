<?php 

    define("arquivo", "labs/dados.txt");

    if(file_exists(arquivo)){
        echo "Arquivo encontrado!<br>";
        
        $conteudo = file_get_contents(arquivo);
        echo "Conteudo do arquivo:<br>";
        echo "------------------<br>";
        echo nl2br($conteudo);
    } else {
        echo "Arquivo nao encontrado.";
    }

?>