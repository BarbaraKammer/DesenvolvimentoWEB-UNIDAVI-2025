<?php
require_once "../functions/db.php";
$conn = db();

$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($id > 0) {

    $stmt = $conn->prepare("UPDATE setores SET status = NOT status WHERE id = :id");
    $stmt->execute(['id' => $id]);

    $stmt2 = $conn->prepare("
        UPDATE dispositivos
        SET status = (SELECT status FROM setores WHERE id = :id)
        WHERE setor_id = :id
    ");
    $stmt2->execute(['id' => $id]);
}

header("Location: setores.php?toggle_ok=1");
exit;
