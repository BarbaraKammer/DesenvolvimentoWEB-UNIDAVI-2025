<?php
require_once "../functions/db.php";
$conn = db();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: setores.php");
    exit;
}

$nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : '';

if ($nome === '') {
    header("Location: setores.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO setores (nome) VALUES (:n)");
$stmt->execute([ "n" => $nome ]);

header("Location: setores.php?add_ok=1");
exit;
