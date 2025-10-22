<?php
function calcularAreaTriangulo($base, $altura) {
    return ($base * $altura) / 2;
}

try {
    if ($_POST) {
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        $area = calcularAreaTriangulo($base, $altura);

        echo "<p style='font-weight:bold;'>A área do triângulo retângulo de base $base m e altura $altura m é $area m².</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>
