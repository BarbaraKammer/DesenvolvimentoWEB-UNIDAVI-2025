<?php
function db() {
    static $conn;
    if ($conn === null) {
        $conn = new PDO("pgsql:host=localhost;port=5432;dbname=avaliacao", "postgres", "12345");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $conn;
}