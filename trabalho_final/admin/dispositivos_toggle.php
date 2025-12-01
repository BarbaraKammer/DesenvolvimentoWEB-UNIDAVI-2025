<?php
require_once "../functions/db.php";
$conn = db();

$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($id > 0) {
    $stmt = $conn->prepare("UPDATE dispositivos SET status = NOT status WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

header("Location: dispositivos.php");
exit;
