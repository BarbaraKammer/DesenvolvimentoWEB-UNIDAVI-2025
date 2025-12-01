<?php
require_once "../functions/db.php";
$conn = db();

$stmt = $conn->query("SELECT id, texto, 10 AS escala FROM perguntas WHERE status = TRUE ORDER BY id");

header('Content-Type: application/json; charset=utf-8');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
