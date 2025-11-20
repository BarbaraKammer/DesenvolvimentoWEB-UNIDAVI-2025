<?php
require_once "../functions/db.php"; $conn = db();
$id = $_GET["id"];
$conn->query("UPDATE perguntas SET status = NOT status WHERE id = $id");
header("Location: perguntas.php");