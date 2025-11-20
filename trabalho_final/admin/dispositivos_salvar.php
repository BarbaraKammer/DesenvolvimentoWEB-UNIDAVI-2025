<?php
require_once "../functions/db.php";

$conn = db();
$stmt = $conn->prepare("INSERT INTO dispositivos (nome, setor_id) VALUES (:n, :s)");
$stmt->execute([ "n" => $_POST["nome"], "s" => $_POST["setor_id"] ]);
header("Location: dispositivos.php");