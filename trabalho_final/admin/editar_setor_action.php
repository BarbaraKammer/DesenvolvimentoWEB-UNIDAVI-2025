<?php
require_once "../functions/db.php";
$conn = db();

$id = $_POST['id'];
$nome = $_POST['nome'];

$stmt = $conn->prepare("UPDATE setores SET nome = :n WHERE id = :id");
$stmt->execute([
  'n' => $nome,
  'id' => $id
]);

header("Location: setores.php?edit_ok=1");
exit;
