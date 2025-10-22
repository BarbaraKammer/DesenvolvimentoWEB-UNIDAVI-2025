<?php
function calcularMontanteJurosCompostos($capital, $taxa_juros, $tempo) {
    $i = $taxa_juros / 100; // converter para decimal
    
    $fator = 1 + $i;
    $resultado = 1;
    
    for ($contador = 0; $contador < $tempo; $contador++) {
        $resultado *= $fator;
    }
    
    $montante = $capital * $resultado;
    return $montante;
}

if ($_POST) {
    $valor_vista = $_POST['valor_vista'];
    $opcoes = [
        ['parcelas' => 24, 'taxa' => 2.0],
        ['parcelas' => 36, 'taxa' => 2.3],
        ['parcelas' => 48, 'taxa' => 2.6],
        ['parcelas' => 60, 'taxa' => 2.9]
    ];
    
    echo "<h3>Opções de Parcelamento (Juros Compostos):</h3>";
    
    foreach ($opcoes as $opcao) {
        // Calcular montante total com juros compostos
        $montante_total = calcularMontanteJurosCompostos($valor_vista, $opcao['taxa'], $opcao['parcelas']);
        
        // Calcular valor da parcela
        $valor_parcela = $montante_total / $opcao['parcelas'];
        
        $juros_total = $montante_total - $valor_vista;
        
        echo "<p><strong>{$opcao['parcelas']}x (Taxa: {$opcao['taxa']}% a.m.):</strong><br>";
        echo "Parcela: R$ " . number_format($valor_parcela, 2, ',', '.') . "<br>";
        echo "Total: R$ " . number_format($montante_total, 2, ',', '.') . "<br>";
        echo "Juros: R$ " . number_format($juros_total, 2, ',', '.') . "</p>";
    }
} else {
    echo "<p>Nenhum valor foi enviado. Volte para o <a href='index.html'>formulário</a>.</p>";
}
?>
