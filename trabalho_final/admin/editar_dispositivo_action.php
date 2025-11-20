<?php
require_once "../functions/db.php";
$conn = db();

$id       = $_POST['id'];
$nome     = $_POST['nome'];
$setor_id = $_POST['setor_id'];

$stmt = $conn->prepare("UPDATE dispositivos SET nome = :n, setor_id = :s WHERE id = :id");
$stmt->execute([
  'n'   => $nome,
  's'   => $setor_id,
  'id'  => $id
]);

header("Location: dispositivos.php?edit_ok=1");
exit;
