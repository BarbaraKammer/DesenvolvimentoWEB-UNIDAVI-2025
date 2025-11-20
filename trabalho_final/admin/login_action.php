<?php
session_start();
require_once "../functions/db.php";

$conn = db();
$login = $_POST["login"];
$senha = $_POST["senha"];

$stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE login = :l");
$stmt->execute(["l" => $login]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);

if ($u && password_verify($senha, $u["senha"])) {
    $_SESSION["user_id"] = $u["id"];
    header("Location: home.php");
} else {
    header("Location: login.php?err=1");
}