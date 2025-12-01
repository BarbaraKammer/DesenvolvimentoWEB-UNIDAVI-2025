<?php
require_once "../functions/db.php";
$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: perguntas.php");
    exit;
}

$texto = isset($_POST['texto']) ? trim($_POST['texto']) : '';

if ($texto === '') {
    header("Location: perguntas.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO perguntas (texto, status) VALUES (:t, TRUE)");
$stmt->execute(['t' => $texto]);

header("Location: perguntas.php?add_ok=1");
exit;
