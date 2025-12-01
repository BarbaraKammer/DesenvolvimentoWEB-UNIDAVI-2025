<?php
require_once "../functions/db.php";
$conn = db();

$setor  = isset($_GET["setor"])  && $_GET["setor"]  !== '' && is_numeric($_GET["setor"])  ? (int)$_GET["setor"]  : null;
$device = isset($_GET["device"]) && $_GET["device"] !== '' && is_numeric($_GET["device"]) ? (int)$_GET["device"] : null;

$sql = "
  SELECT p.texto AS pergunta, ROUND(AVG(a.nota), 1) AS media
  FROM avaliacoes a
  JOIN perguntas p ON p.id = a.pergunta_id
  WHERE 1 = 1
";

$params = [];

if ($setor !== null) {
  $sql .= " AND a.setor_id = :setor";
  $params["setor"] = $setor;
}
if ($device !== null) {
  $sql .= " AND a.dispositivo_id = :device";
  $params["device"] = $device;
}

$sql .= " GROUP BY p.id, p.texto ORDER BY p.id";
$stmt = $conn->prepare($sql);
$stmt->execute($params);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
