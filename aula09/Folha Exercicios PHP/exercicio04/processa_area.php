<?php
function calcularAreaRetangulo($a, $b) {
    return $a * $b;
}

try {
    if ($_POST) {
        $a = $_POST['lado_a'];
        $b = $_POST['lado_b'];
        $area = calcularAreaRetangulo($a, $b);
        
        $frase = "A área do retângulo de lados $a e $b metros é $area metros quadrados.";
        
        if ($area > 10) {
            echo "<h1>$frase</h1>";
        } else {
            echo "<h3>$frase</h3>";
        }
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>
