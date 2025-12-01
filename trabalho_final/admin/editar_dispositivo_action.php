<?php
require_once "../functions/db.php";
$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dispositivos.php");
    exit;
}

$id       = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : 0;
$nome     = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$setor_id = isset($_POST['setor_id']) && is_numeric($_POST['setor_id']) ? (int)$_POST['setor_id'] : 0;

if ($id <= 0 || $nome === '' || $setor_id <= 0) {
    header("Location: dispositivos.php?edit_ok=0");
    exit;
}

$stmt = $conn->prepare("UPDATE dispositivos SET nome = :n, setor_id = :s WHERE id = :id");
$stmt->execute([
  'n'   => $nome,
  's'   => $setor_id,
  'id'  => $id
]);

header("Location: dispositivos.php?edit_ok=1");
exit;
