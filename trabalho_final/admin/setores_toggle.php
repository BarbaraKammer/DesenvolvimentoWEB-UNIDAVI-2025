<?php
require_once "../functions/db.php";
$conn = db();
$id = $_GET["id"];

// desativa setor + desativa todos os dispositivos dele
$conn->query("UPDATE setores SET status = NOT status WHERE id = $id");
$conn->query("UPDATE dispositivos SET status = (SELECT status FROM setores WHERE id = $id) WHERE setor_id = $id");

header("Location: setores.php");