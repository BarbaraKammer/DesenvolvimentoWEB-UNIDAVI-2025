<?php
require_once "../functions/db.php";
$conn = db();
$stmt = $conn->prepare("INSERT INTO setores (nome) VALUES (:n)");
$stmt->execute([ "n" => $_POST["nome"] ]);
header("Location: setores.php");