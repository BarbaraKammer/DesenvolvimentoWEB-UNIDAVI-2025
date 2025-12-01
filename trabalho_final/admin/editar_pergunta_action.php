<?php
require_once "../functions/db.php";
$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: perguntas.php");
    exit;
}

$id    = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : 0;
$texto = isset($_POST['texto']) ? trim($_POST['texto']) : '';

if ($id <= 0 || $texto === '') {
    header("Location: perguntas.php?edit_ok=0");
    exit;
}

$stmt = $conn->prepare("UPDATE perguntas SET texto = :t WHERE id = :id");
$stmt->execute([
  't' => $texto,
  'id' => $id
]);

header("Location: perguntas.php?edit_ok=1");
exit;
