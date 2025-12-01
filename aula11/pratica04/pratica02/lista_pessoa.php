<?php
require_once "conexao.php";

// Verifica se o campo de busca foi preenchido
$filtro = $_GET['busca'] ?? '';

// Mostra a quantidade de pessoas cadastradas
$result = pg_query($connection, "SELECT COUNT(*) AS qtd FROM tbpessoa");
if ($result) {
    $row = pg_fetch_assoc($result);
    echo "<h3>Quantidade de pessoas cadastradas: " . htmlspecialchars($row['qtd']) . "</h3>";
}

if (!empty($filtro)) {
    $query = "SELECT * FROM tbpessoa WHERE pesnome ILIKE $1 ORDER BY pescodigo";
    $params = ["%" . $filtro . "%"];
    $result = pg_query_params($connection, $query, $params);
    echo "<p>Filtrando por nome que contém: <strong>" . htmlspecialchars($filtro, ENT_QUOTES, 'UTF-8') . "</strong></p>";
} else {
    $query = "SELECT * FROM tbpessoa ORDER BY pescodigo";
    $result = pg_query($connection, $query);
}

// Exibe tabela de resultados
if ($result) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['pescodigo'], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row['pesnome'], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row['pessobrenome'], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row['pesemail'], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row['pescidade'], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row['pesestado'], ENT_QUOTES, 'UTF-8') . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Erro ao buscar dados.";
}
?>
