<?php
require_once __DIR__ . '/../config.php';

function conectarBanco() {
    try {
        $connString = "host=" . DB_HOST .
                    " port=" . DB_PORT .
                    " dbname=" . DB_NAME .
                    " user=" . DB_USER .
                    " password=" . DB_PASS;

        $conn = pg_connect($connString);

        if (!$conn) {
            throw new Exception("Erro ao conectar ao banco de dados.");
        }

        return $conn;

    } catch (Exception $e) {
        die("Falha na conexão: " . $e->getMessage());
    }
}
?>
