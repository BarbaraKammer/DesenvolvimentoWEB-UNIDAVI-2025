<?php
require_once "../functions/db.php";

$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dispositivos.php");
    exit;
}

$nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : '';
$setor_id = isset($_POST["setor_id"]) && is_numeric($_POST["setor_id"]) ? (int)$_POST["setor_id"] : null;

if ($nome === '' || $setor_id === null) {
    header("Location: dispositivos.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO dispositivos (nome, setor_id) VALUES (:n, :s)");
$stmt->execute([
    "n" => $nome,
    "s" => $setor_id
]);

header("Location: dispositivos.php");
exit;
