<?php
$notas = (10,9,8);
$faltas = (1,0,1);

function calculaMedia($notas){
    $soma = 0;
    $totalNotas = count($notas)
    for ($x = 0; $x < $totalNotas; $x++){
        $soma = $soma + $notas[x];
    };
    $media = $soma / $totalNotas;

    return $media;
}

function verificaAprovacaoNotas($media){
    $aprovacao = ($media >= 7);
    return $aprovacao;
}

function calculaFrequencia($faltas){
    $totalFaltas = 0;
    $totalAulas = count($faltas);

    for ($x = 0; $x < $totalAulas; $x++){
        $frequencia = ($totalAulas - $totalFaltas) / $totalAulas * 100;
    };
    return $frequencia;
}

function verificaAprovacaoFrequencia($frequencia){
    $aprovacao = ($frequencia >= 70);

    return $aprovacao;
}

if (verificaAprovacaoNotas($notas)){
    echo "Aprovado por nota <br>";
else {}
}
?>