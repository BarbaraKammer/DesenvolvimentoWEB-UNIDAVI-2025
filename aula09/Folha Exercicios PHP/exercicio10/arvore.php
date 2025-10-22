<?php
$pastas = array(
    "bsn" => array(
        "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
        "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
    )
);

function listarPastas($pasta, $nivel = 1){
    if (is_array($pasta)) {
        foreach ($pasta as $elemento => $valor) {
            if (is_array($valor)) {
                // Mostra o nome do diretório
                echo str_repeat("-", $nivel) . " " . $elemento . "<br>";
                // Chamada recursiva p aumentar o nível
                listarPastas($valor, $nivel + 1);
            } else {
                // Mostra o arquivo ou subpasta
                echo str_repeat("-", $nivel) . " " . $valor . "<br>";
            }
        }
    } else {
        echo str_repeat("-", $nivel) . " " . $pasta . "<br>";
    }
}

// Chamada inicial
listarPastas($pastas);
?>
