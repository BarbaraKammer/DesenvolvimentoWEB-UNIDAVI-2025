<?php require_once "auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Painel Administrativo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="sidebar">
  <h2>Sistema de Avaliação</h2>
  <a href="home.php" class="<?= basename($_SERVER['PHP_SELF'])=='home.php' ? 'active' : '' ?>">📊 Inicio</a>
  <a href="perguntas.php" class="<?= basename($_SERVER['PHP_SELF'])=='perguntas.php' ? 'active' : '' ?>">❓ Perguntas</a>
  <a href="setores.php" class="<?= basename($_SERVER['PHP_SELF'])=='setores.php' ? 'active' : '' ?>">🏢 Setores</a>
  <a href="dispositivos.php" class="<?= basename($_SERVER['PHP_SELF'])=='dispositivos.php' ? 'active' : '' ?>">📱 Dispositivos</a>
  <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF'])=='dashboard.php' ? 'active' : '' ?>">📈 Gráficos</a>
  <a href="logout.php">🚪 Sair</a>
</div>

<div class="content">
