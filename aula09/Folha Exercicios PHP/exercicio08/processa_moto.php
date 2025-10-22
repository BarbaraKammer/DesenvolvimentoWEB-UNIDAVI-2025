<?php
function calcularParcelaJurosSimples($valor, $taxa_juros, $parcelas) {
    // Juros total (Taxa em % a.m. * Parcelas em meses)
    $juros_total = $valor * ($taxa_juros / 100) * $parcelas;
    
    $total_pagar = $valor + $juros_total;
    
    return $total_pagar / $parcelas;
}

try {
    $valor_vista = 8654.00; // Valor a vista da moto

    // Opções fixas de parcelamento com juros simples
    $opcoes = [
        ['parcelas' => 24, 'taxa' => 1.5],
        ['parcelas' => 36, 'taxa' => 2.0],
        ['parcelas' => 48, 'taxa' => 2.5],
        ['parcelas' => 60, 'taxa' => 3.0]
    ];

    echo "<h3>Opções de Parcelamento:</h3>";

    foreach ($opcoes as $opcao) {
        $valor_parcela = calcularParcelaJurosSimples($valor_vista, $opcao['taxa'], $opcao['parcelas']);
        $total_pago = $valor_parcela * $opcao['parcelas'];
        $juros_total = $total_pago - $valor_vista;

        echo "<p><strong>{$opcao['parcelas']}x (Taxa: {$opcao['taxa']}% a.m.):</strong><br>";
        echo "Parcela: R$ " . number_format($valor_parcela, 2, ',', '.') . "<br>";
        echo "Total a pagar: R$ " . number_format($total_pago, 2, ',', '.') . "<br>";
        echo "Juros total: R$ " . number_format($juros_total, 2, ',', '.') . "</p>";
    }
} catch (Exception $e) {
    echo "<p>Erro: ".$e->getMessage()."</p>";
}
?>