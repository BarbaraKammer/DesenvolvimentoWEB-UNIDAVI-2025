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
            if(is_array($valor)){
                echo str_repeat("-", $nivel) . $elemento . "<br>";
                listarPastas($valor);
            }else{
                echo str_repeat("-", $nivel + 1) . $valor . "<br>";
            }
        }
    } else {
        echo str_repeat("-", $nivel) . $pasta . "<br>";
    }
}

listarPastas($pastas);
?>
