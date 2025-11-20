<?php
require_once "../functions/db.php";
$conn = db();

$id = $_POST['id'];
$texto = $_POST['texto'];

$stmt = $conn->prepare("UPDATE perguntas SET texto = :t WHERE id = :id");
$stmt->execute([
  't' => $texto,
  'id' => $id
]);

header("Location: perguntas.php?edit_ok=1");
exit;
