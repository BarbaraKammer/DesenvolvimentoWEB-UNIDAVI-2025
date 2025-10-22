<?php
function calcularTotal($precos, $quantidades) {
    $total = 0;
    foreach ($precos as $produto => $preco) {
        $total += $preco * $quantidades[$produto];
    }
    return $total;
}

try {
    if ($_POST) {
        $precos = [
            'maca' => $_POST['preco_maca'],
            'melancia' => $_POST['preco_melancia'],
            'laranja' => $_POST['preco_laranja'],
            'repolho' => $_POST['preco_repolho'],
            'cenoura' => $_POST['preco_cenoura'],
            'batata' => $_POST['preco_batata']
        ];

        $quantidades = [
            'maca' => $_POST['qtd_maca'],
            'melancia' => $_POST['qtd_melancia'],
            'laranja' => $_POST['qtd_laranja'],
            'repolho' => $_POST['qtd_repolho'],
            'cenoura' => $_POST['qtd_cenoura'],
            'batata' => $_POST['qtd_batata']
        ];

        $orcamento = 50.00;
        $total_gasto = calcularTotal($precos, $quantidades);
        $diferenca = abs($total_gasto - $orcamento);

        echo "<h3>Total da compra: R$ " . number_format($total_gasto, 2, ',', '.') . "</h3>";

        if ($total_gasto > $orcamento) {
            echo "<p style='color:red; font-weight:bold;'>Faltou R$ " . number_format($diferenca, 2, ',', '.') . " para pagar a conta!</p>";
        } elseif ($total_gasto < $orcamento) {
            echo "<p style='color:blue; font-weight:bold;'>Joãozinho ainda pode gastar R$ " . number_format($diferenca, 2, ',', '.') . "</p>";
        } else {
            echo "<p style='color:green; font-weight:bold;'>O saldo para compras foi esgotado!</p>";
        }
    }
} catch (Exception $e) {
    echo "<p>Erro: " . $e->getMessage() . "</p>";
}
?>

<a href="index.html">Voltar</a>
