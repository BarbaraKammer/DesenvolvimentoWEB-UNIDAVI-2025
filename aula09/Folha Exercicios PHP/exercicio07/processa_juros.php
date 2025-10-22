<?php
function calcularJuros($vista, $parcelas, $valor_parcela) {
    $total_pago = $parcelas * $valor_parcela;
    return $total_pago - $vista;
}

try {
    if ($_POST) {
        $valor_vista = $_POST['valor_vista'];
        $parcelas = $_POST['parcelas'];
        $valor_parcela = $_POST['valor_parcela'];

        $juros = calcularJuros($valor_vista, $parcelas, $valor_parcela);
        $total_pago = $parcelas * $valor_parcela;

        echo "<h3>Resultado:</h3>";
        echo "<p>Valor à vista do carro: R$ " . number_format($valor_vista, 2, ',', '.') . "</p>";
        echo "<p>Total financiado em $parcelas parcelas: R$ " . number_format($total_pago, 2, ',', '.') . "</p>";
        echo "<p style='font-weight:bold;'>Mariazinha pagará R$ " . number_format($juros, 2, ',', '.') . " só de juros!</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>

<a href="index.html">Voltar</a>
