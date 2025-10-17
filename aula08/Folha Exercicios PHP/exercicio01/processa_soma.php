<?php
function calcularSoma($a, $b, $c) {
    return $a + $b + $c;
}

function definirCor($v1, $v2, $v3) {
    if ($v1 > 10) return "blue";
    if ($v2 < $v3) return "green";
    if ($v3 < $v1 && $v3 < $v2) return "red";
    return "black";
}

try {
    if ($_POST) {
        $v1 = $_POST['valor1'];
        $v2 = $_POST['valor2'];
        $v3 = $_POST['valor3'];

        $resultado = calcularSoma($v1, $v2, $v3);
        $cor = definirCor($v1, $v2, $v3);

        echo "<p style='color:$cor; font-weight:bold;'>Resultado: $resultado</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>