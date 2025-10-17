
<?php
$connectionString = "host=localhost port=5432 dbname=local user=postgres password=12345";
    
    $connection = pg_connect($connectionString);
    
    if (!$connection) {
        echo "Erro na conexão com o banco de dados.";
    } else {
        echo "Conexão bem-sucedida!<br>";}

        $result = pg_query($connection, "SELECT COUNT(*) AS qtd FROM tbpessoa");

        if (!$result) {
            echo "Erro na consulta.";
        } else {
            $row = pg_fetch_assoc($result);
            echo "Quantidade de tabelas no database: " . $row['qtd'];
        }
        $result = pg_query($connection, "SELECT * FROM tbpessoa");

        if ($result){
            echo "<table border='1'><tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Estado</th>
                </tr>";

            $row = pg_fetch_assoc($result);
            while ($row) {
                echo "<tr>
                    <td>" . $row['pescodigo'] . "</td>
                    <td>" . $row['pesnome'] . "</td>
                    <td>" . $row['pessobrenome'] . "</td>
                    <td>" . $row['pesemail'] . "</td>
                    <td>" . $row['pescidade'] . "</td>
                    <td>" . $row['pesestado'] . "</td>
                    </tr>";
                $row = pg_fetch_assoc($result);
                
            }
        echo "</table>";
        }

?>
<a href="index.html">Voltar</a>