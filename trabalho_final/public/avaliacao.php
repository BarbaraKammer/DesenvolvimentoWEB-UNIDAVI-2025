<?php
require_once "../functions/db.php";
$conn = db();

// pega o dispositivo da URL
$dispositivo_id = $_GET['device'] ?? null;

if (!$dispositivo_id) {
    header("Location: seletor.php");
    exit;
}

// consulta o setor vinculado ao dispositivo
$stmt = $conn->prepare("SELECT setor_id FROM dispositivos WHERE id = :id AND status = TRUE");
$stmt->execute(['id' => $dispositivo_id]);
$setor_id = $stmt->fetchColumn();

// valida se existe este dispositivo e está ativo
if (!$setor_id) {
    header("Location: seletor.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Avaliação</title>
<link rel="stylesheet" href="../assets/css/avaliacao.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="container"></div>

<footer>
  <p>Sua avaliação é anônima — nenhuma informação pessoal é solicitada ou armazenada.</p>
</footer>

<script>
/* Variáveis globais usadas no avaliacao.js */
const BASE_URL = "<?php echo dirname($_SERVER['SCRIPT_NAME'], 2); ?>";
const dispositivo_id = <?= $dispositivo_id ?>;
const setor_id = <?= $setor_id ?>;
</script>

<script src="../assets/js/avaliacao.js"></script>
</body>
</html>
