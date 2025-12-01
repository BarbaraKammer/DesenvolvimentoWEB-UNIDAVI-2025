<?php
session_start();
require_once "../functions/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$conn  = db();
$login = isset($_POST["login"]) ? trim($_POST["login"]) : '';
$senha = $_POST["senha"] ?? '';

if ($login === '' || $senha === '') {
    header("Location: login.php?err=1");
    exit;
}

$login = mb_substr($login, 0, 50);

$stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE login = :l");
$stmt->execute(["l" => $login]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);

if ($u && password_verify($senha, $u["senha"])) {
    $_SESSION["user_id"] = (int)$u["id"];
    header("Location: home.php");
    exit;
}

header("Location: login.php?err=1");
exit;
