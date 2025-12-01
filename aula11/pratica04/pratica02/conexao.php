<?php
    $connectionString = "host=localhost port=5432 dbname=local user=postgres password=12345";
    
    $connection = pg_connect($connectionString);
    
    if (!$connection) {
        echo "Erro na conexão com o banco de dados.";
    }
?>