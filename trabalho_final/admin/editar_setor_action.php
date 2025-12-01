<?php
require_once "../functions/db.php";
$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: setores.php");
    exit;
}

$id   = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : 0;
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';

if ($id <= 0 || $nome === '') {
    header("Location: setores.php?edit_ok=0");
    exit;
}

$stmt = $conn->prepare("UPDATE setores SET nome = :n WHERE id = :id");
$stmt->execute([
  'n' => $nome,
  'id' => $id
]);

header("Location: setores.php?edit_ok=1");
exit;
