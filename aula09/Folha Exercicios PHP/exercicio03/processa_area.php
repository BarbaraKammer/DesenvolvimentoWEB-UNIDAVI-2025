<?php
function calcularArea($lado) {
    return $lado * $lado;
}

try {
    if ($_POST) {
        $lado = $_POST['lado'];
        $area = calcularArea($lado);
        echo "<p style='font-weight:bold;'>A área do quadrado de lado $lado metros é $area metros quadrados.</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>
