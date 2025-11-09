<?php
/* É uma boa prática fazer a conexão com o SGBD e qualquer outra operação subsequente dentro de um try/catch */
try {
    /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
    $dbconn = pg_connect("host=localhost port=5432 dbname=local user=postgres password=12345");
    if($dbconn) {
        echo "database conectado...";

        /* Etapa 2 - Fazer uma query simples - retornará a quantidade de tabelas no database */
        $result = pg_query($dbconn, "SELECT COUNT(*) AS QTD_TABS FROM PG_TABLES");

        /* Etapa 3 - Buscar os dados da query e percorrer as linhas */
        while($row = pg_fetch_assoc($result)) {
            echo "<br>Result: " . $row['qtd_tabs'];
        }
    }

} catch (Exception $e){
    /* Caso ocorra algum erro, então exibir mensagem */
    echo $e->getMessage();
}
?>
