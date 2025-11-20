<?php
require_once "../functions/db.php";
$conn = db();

$texto = $_POST['texto'];

$stmt = $conn->prepare("INSERT INTO perguntas (texto, status) VALUES (:t, TRUE)");
$stmt->execute(['t' => $texto]);

header("Location: perguntas.php?add_ok=1");
exit;
