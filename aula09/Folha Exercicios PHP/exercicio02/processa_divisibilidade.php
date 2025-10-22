<?php
function verificarDivisibilidade($num) {
    if ($num % 2 == 0) {
        return "Valor divisível por 2";
    } else {
        return "O valor não é divisível por 2";
    }
}

try {
    if ($_POST) {
        $num = $_POST['numero'];
        $resultado = verificarDivisibilidade($num);
        echo "<p style='font-weight:bold;'>$resultado</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>
